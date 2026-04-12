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
                    <h2 class="mb-0 fw-bold">إضافة سؤال جديد</h2>
                    <p class="text-muted mb-0">للاختبار: <span class="color-primary fw-bold">{{ $quiz->title }}</span></p>
                </div>
                <div class="col-lg-6 text-end">
                    <a href="{{ route($routePrefix . '.index', $quiz->id) }}" class="rbt-btn btn-xs btn-border radius-10" title="رجوع">
                        <i class="feather-arrow-right me-1"></i> رجوع للقائمة
                    </a>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger border-0 radius-10 shadow-sm mb--30">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li><i class="feather-alert-circle me-1"></i> {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route($routePrefix . '.store', $quiz->id) }}" method="POST" class="rbt-default-form">
                @csrf

                <!-- Question Text -->
                <div class="form-group mb--30">
                    <label class="fw-bold text-dark mb-2"><i class="feather-help-circle me-1 color-primary"></i> نص السؤال</label>
                    <textarea name="question" class="form-control border-2 radius-10" required 
                              placeholder="أدخل نص السؤال هنا..." style="height: 120px;">{{ old('question') }}</textarea>
                </div>

                <div class="row g-5 mb--30">
                    <!-- Type -->
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="fw-bold text-dark mb-2"><i class="feather-layers me-1 color-secondary"></i> نوع السؤال</label>
                            <select name="type" id="question-type" class="form-select border-2 radius-10 h--60" required>
                                <option value="">اختر النوع...</option>
                                <option value="multiple_choice" {{ old('type') == 'multiple_choice' ? 'selected' : '' }}>اختيار من متعدد</option>
                                <option value="true_false" {{ old('type') == 'true_false' ? 'selected' : '' }}>صح / خطأ</option>
                                <option value="essay" {{ old('type') == 'essay' ? 'selected' : '' }}>سؤال مقالي</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Answers Section -->
                <div id="answers-section" style="display:none;" class="mb--40">
                    <div class="section-title mb--20">
                        <h6 class="fw-bold text-dark mb-1">تحديد الإجابات</h6>
                        <p class="small text-muted mb-0">قم بإضافة الاختيارات وتحديد الإجابة الصحيحة بالضغط على الرمز الأخضر.</p>
                    </div>
                    
                    <div id="answers-wrapper" class="d-flex flex-column gap-3"></div>
                    
                    <button type="button" id="add-answer" class="rbt-btn btn-xs btn-border radius-10 mt-3">
                        <i class="feather-plus me-1"></i> إضافة اختيار آخر
                    </button>
                </div>

                <div class="mt--40 pt--20 border-top">
                    <div class="d-flex gap-3">
                        <button type="submit" class="rbt-btn btn-gradient btn-md radius-10">
                            <i class="feather-save me-1"></i> حفظ السؤال
                        </button>
                        <a href="{{ route($routePrefix . '.index', $quiz->id) }}" class="rbt-btn btn-md btn-border radius-10">إلغاء</a>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <style>
        .radius-10 { border-radius: 10px !important; }
        .h--60 { height: 60px !important; }
        .color-primary { color: #6B4CE6 !important; }
        .color-secondary { color: #f59e0b !important; }
        .form-select, .form-control { border-color: #f1f1f1; transition: all 0.3s ease; }
        .form-select:focus, .form-control:focus { border-color: #6B4CE6; box-shadow: 0 0 0 4px rgba(107, 76, 230, 0.1); }
        
        /* Answer Field Styling */
        .answer-input-group { 
            background: #fbfbfb; 
            padding: 15px; 
            border-radius: 12px; 
            border: 2px solid #f1f1f1;
            transition: all 0.2s ease;
        }
        .answer-input-group:focus-within { border-color: #6B4CE6; background: #fff; }
        .correct-check { 
            cursor: pointer;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            border: 2px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            color: transparent;
        }
        .correct-check:hover { border-color: #2BC48A; color: #2BC48A; }
        .correct-input:checked + .correct-check {
            background: #2BC48A;
            border-color: #2BC48A;
            color: white;
            transform: scale(1.1);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const typeSelect = document.getElementById('question-type');
            const answersSection = document.getElementById('answers-section');
            const answersWrapper = document.getElementById('answers-wrapper');
            const addAnswerBtn = document.getElementById('add-answer');
            let answerIndex = 0;

            function escapeHtml(text) {
                return String(text).replace(/&/g, "&amp;")
                    .replace(/</g, "&lt;")
                    .replace(/>/g, "&gt;")
                    .replace(/"/g, "&quot;");
            }

            function addAnswerField(answerText = '', checked = false) {
                const div = document.createElement('div');
                div.className = 'answer-input-group d-flex align-items-center gap-3';
                div.innerHTML = `
                    <div class="position-relative">
                        <input type="checkbox" class="correct-input d-none" id="answer-${answerIndex}" name="answers[${answerIndex}][is_correct]" value="1" ${checked ? 'checked' : ''}>
                        <label for="answer-${answerIndex}" class="correct-check" title="الإجابة الصحيحة">
                            <i class="feather-check"></i>
                        </label>
                    </div>
                    <input type="text" name="answers[${answerIndex}][answer]" class="form-control border-0 bg-transparent p-0" placeholder="أدخل نص الإجابة..." value="${escapeHtml(answerText)}">
                    <button type="button" class="btn btn-sm text-danger p-0" onclick="this.closest('.answer-input-group').remove()" title="حذف">
                        <i class="feather-x"></i>
                    </button>
                `;
                answersWrapper.appendChild(div);
                answerIndex++;
            }

            function renderAnswersFor(type) {
                answersWrapper.innerHTML = '';
                if (type === 'multiple_choice') {
                    answersSection.style.display = 'block';
                    addAnswerField('', true);
                    addAnswerField();
                    addAnswerField();
                    addAnswerBtn.style.display = 'inline-block';
                } else if (type === 'true_false') {
                    answersSection.style.display = 'block';
                    addAnswerField('صواب', true);
                    addAnswerField('خطأ');
                    addAnswerBtn.style.display = 'none';
                } else {
                    answersSection.style.display = 'none';
                }
            }

            typeSelect.addEventListener('change', function() {
                renderAnswersFor(this.value);
            });

            addAnswerBtn.addEventListener('click', function() {
                addAnswerField();
            });

            if (typeSelect.value) {
                // If it's a redirect-back from error, don't re-render everything
                if(answersWrapper.children.length === 0) {
                    renderAnswersFor(typeSelect.value);
                } else {
                    answersSection.style.display = typeSelect.value !== 'essay' ? 'block' : 'none';
                }
            }
        });
    </script>
@endsection
