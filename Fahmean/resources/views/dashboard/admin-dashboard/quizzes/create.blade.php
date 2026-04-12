@extends('layout.dashboard')

@php
    $header = 'false';
    $footer = 'false';
    $topToBottom = 'false';
@endphp

@section('dashboard-content')
    <div class="rbt-dashboard-content bg-color-white radius-10 shadow-sm p-4 p-md-5">
        <div class="content">

            <div class="row mb--40 align-items-center">
                <div class="col-lg-6">
                    <h2 class="mb-0 fw-bold">إضافة اختبار جديد</h2>
                    <p class="text-muted mb-0">قم بتصميم اختبارك لتقييم أداء الطلاب في دروسك.</p>
                </div>
                <div class="col-lg-6 text-end">
                    <a href="{{ route($routePrefix . '.index') }}" class="rbt-btn btn-xs btn-border radius-10" title="رجوع">
                        <i class="feather-arrow-right me-1"></i> رجوع للقائمة
                    </a>
                </div>
            </div>

            {{-- Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger border-0 radius-10 shadow-sm mb--30">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li><i class="feather-alert-circle me-1"></i> {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route($routePrefix . '.store') }}" method="POST" class="rbt-default-form row g-5">
                @csrf

                <!-- Course Selection (Optional) -->
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="fw-bold text-dark mb-2">
                            <i class="feather-book-open me-1 color-primary"></i> الكورس المستهدف 
                            <span class="text-muted fw-normal fs-6">(اختياري)</span>
                        </label>
                        <select name="course_id" id="course_id" class="form-select border-2 radius-10 h--60">
                            <option value="">لا يوجد (اختبار عام)</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                    {{ $course->title }}
                                </option>
                            @endforeach
                        </select>
                        <small class="text-muted ms-1">اتركه فارغاً إذا كان الاختبار عاماً (مثل امتحان آخر العام).</small>
                    </div>
                </div>

                <!-- Lesson Selection (Optional) -->
                <div class="col-lg-6">
                    <div class="form-group position-relative">
                        <label class="fw-bold text-dark mb-2">
                            <i class="feather-play-circle me-1 color-secondary"></i> الدرس المرتبط
                            <span class="text-muted fw-normal fs-6">(اختياري)</span>
                        </label>
                        <select name="lesson_id" id="lesson_id" class="form-select border-2 radius-10 h--60" {{ old('course_id') ? '' : 'disabled' }}>
                            <option value="">اختر الكورس أولاً أو اتركه فارغاً</option>
                        </select>
                        <div id="lesson_loader" class="spinner-border spinner-border-sm text-primary position-absolute top--50 end-0 m-4 d-none" style="margin-top: 45px !important;"></div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label class="fw-bold text-dark mb-2"><i class="feather-type me-1 color-info"></i> عنوان الاختبار</label>
                        <input type="text" name="title" class="form-control border-2 radius-10 h--60" required 
                               placeholder="مثال: اختبار تحديد المستوى - امتحان نهاية العام" value="{{ old('title') }}">
                    </div>
                </div>

                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="fw-bold text-dark mb-2"><i class="feather-clock me-1 color-warning"></i> الوقت المتاح (بالدقائق)</label>
                            <div class="input-group">
                                <input type="number" name="time_limit" class="form-control border-2 radius-10 h--60" 
                                       placeholder="0 = بدون وقت" value="{{ old('time_limit') }}">
                                <span class="input-group-text bg-light border-2 border-start-0 radius-10-end">دقيقة</span>
                            </div>
                            <small class="text-muted">اتركه فارغاً لجعل وقت الاختبار مفتوحاً بالكامل.</small>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="fw-bold text-dark mb-2"><i class="feather-repeat me-1 color-info"></i> عدد المحاولات المسموحة</label>
                            <div class="input-group">
                                <input type="number" name="attempts_limit" class="form-control border-2 radius-10 h--60" 
                                       placeholder="0 = غير محدود" value="{{ old('attempts_limit') }}">
                                <span class="input-group-text bg-light border-2 border-start-0 radius-10-end">محاولة</span>
                            </div>
                            <small class="text-muted">اتركه فارغاً أو 0 للسماح بمحاولات غير محدودة.</small>
                        </div>
                    </div>
                </div>

                <div class="col-12 mt--40">
                    <div class="d-flex flex-column flex-md-row gap-3">
                        <button type="submit" class="rbt-btn btn-gradient btn-md radius-10 flex-grow-1">
                            <i class="feather-save me-1"></i> حفظ الاختبار والبدء في إضافة الأسئلة
                        </button>
                        <a href="{{ route($routePrefix . '.index') }}" class="rbt-btn btn-md btn-border radius-10">إلغاء والعودة</a>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <style>
        .radius-10 { border-radius: 10px !important; }
        .radius-10-end { border-top-right-radius: 10px !important; border-bottom-right-radius: 10px !important; }
        .h--60 { height: 60px !important; font-weight: 500; }
        .color-primary { color: #6B4CE6 !important; }
        .color-secondary { color: #f59e0b !important; }
        .color-info { color: #0ea5e9 !important; }
        .color-warning { color: #facc15 !important; }
        .form-select, .form-control { border-color: #f1f1f1; transition: all 0.3s ease; }
        .form-select:focus, .form-control:focus { border-color: #6B4CE6; box-shadow: 0 0 0 4px rgba(107, 76, 230, 0.1); }
        .input-group-text { border-color: #f1f1f1; }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#course_id').on('change', function() {
                let courseId = $(this).val();
                let lessonSelect = $('#lesson_id');
                
                if (courseId) {
                    lessonSelect.prop('disabled', false).empty().append('<option value="">جارٍ تحميل الدروس...</option>');
                    
                    let url = "{{ route('courses.lessons-list', ':id') }}";
                    url = url.replace(':id', courseId);
                    
                    $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            lessonSelect.empty().append('<option value="">اختر الدرس</option>');
                            $.each(data, function(key, lesson) {
                                lessonSelect.append($('<option>', {
                                    value: lesson.id,
                                    text: lesson.title
                                }));
                            });
                        },
                        error: function() {
                            lessonSelect.empty().append('<option value="">خطأ في تحميل الدروس</option>');
                        }
                    });
                } else {
                    lessonSelect.prop('disabled', true).empty().append('<option value="">اختر الكورس أولاً</option>');
                }
            });

            // Trigger change if course is pre-selected (by old input)
            if($('#course_id').val()) {
                $('#course_id').trigger('change');
            }
        });
    </script>
@endsection
