@extends('layout.dashboard')

@php
    $header = 'false';
    $footer = 'false';
    $topToBottom = 'false';
@endphp

@section('dashboard-content')
    <div class="rbt-dashboard-content bg-color-white radius-10 shadow-sm p-4 p-md-5">
        <div class="content">

            <!-- Header Section -->
            <div class="row mb--40 align-items-center">
                <div class="col-lg-12">
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon-box bg-gradient-primary rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 60px; height: 60px;">
                            <i class="feather-award fs-3 text-white"></i>
                        </div>
                        <div>
                            <h2 class="mb-1 fw-bold">اختباراتي</h2>
                            <p class="text-muted mb-0">جميع الاختبارات والامتحانات المتاحة لك من دوراتك أو الامتحانات العامة.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quizzes Grid -->
            @if($allQuizzes->count() > 0)
                <div class="row g-4">
                    @foreach ($allQuizzes as $quiz)
                        @php
                            // Get student pivot data
                            $studentData = $quiz->students->first()?->pivot;
                            $isCompleted = $studentData && $studentData->completed;
                            $score = $studentData ? $studentData->score : null;
                        @endphp

                        <div class="col-lg-6 col-xl-4">
                            <div class="quiz-card radius-15 overflow-hidden shadow-sm h-100 transition-all d-flex flex-column">
                                <div class="card-header-gradient p-4 position-relative">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        @if($quiz->section && $quiz->section->course)
                                            <span class="badge bg-white-opacity text-white px-3 py-2 radius-10">
                                                <i class="feather-book-open me-1"></i> {{ Str::limit($quiz->section->course->title, 15) }}
                                            </span>
                                        @else
                                            <span class="badge bg-warning-opacity text-warning px-3 py-2 radius-10 fw-bold">
                                                <i class="feather-globe me-1"></i> امتحان عام
                                            </span>
                                        @endif

                                        @if($isCompleted)
                                            <span class="badge bg-success text-white px-2 py-1 radius-round" title="مكتمل"><i class="feather-check"></i></span>
                                        @endif
                                    </div>
                                    <h5 class="text-white fw-bold mb-1">{{ $quiz->title }}</h5>
                                    @if($quiz->lesson)
                                        <p class="text-white-70 small mb-0"><i class="feather-play-circle me-1"></i> {{ Str::limit($quiz->lesson->title, 30) }}</p>
                                    @endif
                                </div>

                                <div class="card-body-custom p-4 flex-grow-1 d-flex flex-column justify-content-between">
                                    <div>
                                        <div class="d-flex align-items-center justify-content-between mb-4 pb-3 border-bottom">
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="feather-clock color-primary"></i>
                                                <span class="text-dark fw-bold">{{ $quiz->time_limit ? $quiz->time_limit . ' دقيقة' : 'وقت مفتوح' }}</span>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <i class="feather-help-circle color-secondary"></i>
                                                <span class="text-dark fw-bold">{{ $quiz->questions_count ?? $quiz->questions->count() }} سؤال</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        @if($isCompleted)
                                            <div class="text-center mb-3">
                                                <div class="score-display d-inline-block px-4 py-2 radius-10 bg-success-opacity color-success fw-bold fs-5">
                                                    الدرجة: {{ $score }}%
                                                </div>
                                            </div>
                                            <a href="{{ route('student.quizzes.show_direct', $quiz->id) }}" class="rbt-btn btn-sm btn-border w-100 radius-10 justify-content-center">
                                                <i class="feather-eye me-2"></i> مراجعة الإجابات
                                            </a>
                                        @else
                                            <a href="{{ route('student.quizzes.show_direct', $quiz->id) }}" class="rbt-btn btn-gradient btn-md w-100 radius-10 justify-content-center">
                                                <i class="feather-play me-2"></i> ابدأ الاختبار الآن
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state-container text-center py-5">
                    <div class="icon-box bg-light rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4" style="width: 120px; height: 120px;">
                        <i class="feather-layers display-3 text-muted opacity-50"></i>
                    </div>
                    <h3 class="fw-bold text-dark mb-2">لا توجد اختبارات متاحة حالياً</h3>
                    <p class="text-muted mb-4">عندما يتم إضافة اختبارات لكورساتك أو اختبارات عامة، ستظهر هنا.</p>
                    <a href="{{ route('courses.index') }}" class="rbt-btn btn-gradient btn-md radius-10">
                        <i class="feather-book-open me-1"></i> تصفح الكورسات
                    </a>
                </div>
            @endif

        </div>
    </div>

    <style>
        .radius-10 { border-radius: 10px !important; }
        .radius-15 { border-radius: 15px !important; }
        
        .bg-gradient-primary { background: linear-gradient(135deg, #6B4CE6 0%, #8B5CF6 100%); }
        .card-header-gradient { background: linear-gradient(135deg, #6B4CE6 0%, #8B5CF6 100%); }
        
        .quiz-card {
            border: 1px solid #f1f1f1;
            background: white;
            transition: all 0.3s ease;
        }
        
        .quiz-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(107, 76, 230, 0.15) !important;
            border-color: #6B4CE6;
        }
        
        .bg-white-opacity { background: rgba(255, 255, 255, 0.2) !important; }
        .bg-warning-opacity { background: rgba(245, 158, 11, 0.1) !important; }
        .bg-success-opacity { background: rgba(43, 196, 138, 0.1) !important; }
        
        .text-white-70 { color: rgba(255, 255, 255, 0.7) !important; }
        .color-primary { color: #6B4CE6 !important; }
        .color-secondary { color: #f59e0b !important; }
        .color-success { color: #2BC48A !important; }
        
        .transition-all { transition: all 0.3s ease; }
    </style>
@endsection
