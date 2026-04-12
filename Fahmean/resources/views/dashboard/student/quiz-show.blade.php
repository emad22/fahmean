@extends('layout.dashboard')

@php
    $header = 'false';
    $footer = 'false';
    $topToBottom = 'false';
@endphp

@section('dashboard-content')
<div class="rbt-dashboard-content bg-color-white p-0 overflow-hidden" style="min-height: 100vh; background-color: #f0f2f5 !important;">
    
    <!-- Header: Professional & Fixed -->
    <div class="quiz-premium-header sticky-top p-4 bg-white shadow-sm border-bottom d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('student.my-quizzes') }}" class="btn-exit-quiz d-flex align-items-center justify-content-center" title="خروج">
                <i class="feather-arrow-right"></i>
            </a>
            <div>
                <h4 class="mb-0 fw-800 text-dark">{{ $quiz->title }}</h4>
                <div class="d-flex align-items-center gap-2 mt-1">
                    <span class="badge bg-primary-opacity color-primary px-3 rounded-pill small">
                        <i class="feather-book-open me-1"></i> {{ $quiz->section->course->title ?? 'اختبار عام' }}
                    </span>
                    <span class="text-muted small">•</span>
                    <span class="text-muted small fw-bold"><i class="feather-help-circle me-1"></i> {{ $quiz->questions->count() }} سؤال</span>
                </div>
            </div>
        </div>

        <div class="d-flex align-items-center gap-4">
             @if($attempt && $attempt->pivot->completed)
                <div class="score-pill d-flex align-items-center gap-2 px-4 py-2 bg-success-soft text-success rounded-pill fw-bold">
                    <i class="feather-award fs-5"></i>
                    <span>النتيجة: {{ $attempt->pivot->score }}%</span>
                </div>
            @endif
            
            <div class="d-none d-md-flex align-items-center gap-3 border-start ps-4">
                <div class="text-end">
                    <span class="d-block small text-muted">وقت البدء</span>
                    <span class="fw-bold text-dark">{{ now()->format('h:i A') }}</span>
                </div>
                <div class="icon-box bg-light-soft text-primary p-2 rounded-10">
                    <i class="feather-clock fs-4"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row items-center justify-content-center">
            <div class="col-lg-10 col-xl-9">
                
                @if(!$showResults)
                    <!-- Quiz Body: Form-based with Clear Buttons -->
                    <form action="{{ route('student.quizzes.submit', ['course_id' => $course_id, 'id' => $quiz->id]) }}" method="POST" id="main-quiz-form">
                        @csrf
                        
                        <div class="quiz-questions-list">
                            @forelse($quiz->questions as $index => $question)
                                <div class="question-card-v2 bg-white mb-5 shadow-sm overflow-hidden" style="border-radius: 24px; border: 1px solid #eef0f2;">
                                    <div class="card-header-q bg-light-soft p-4 d-flex align-items-center gap-3">
                                        <div class="q-index-badge bg-primary text-white d-flex align-items-center justify-content-center fw-bold shadow-sm" style="width: 36px; height: 36px; border-radius: 10px;">
                                            {{ $index + 1 }}
                                        </div>
                                        <h5 class="mb-0 fw-bold text-dark">{{ $question->question }}</h5>
                                    </div>

                                    <div class="card-body p-4 p-md-5">
                                        <div class="row g-3">
                                            @if(in_array($question->type, ['mcq', 'tf', 'multiple_choice', 'true_false']))
                                                @foreach($question->answers as $answer)
                                                    <div class="col-md-6">
                                                        <div class="premium-radio-choice">
                                                            <input type="radio" class="d-none" name="answers[{{ $question->id }}]" 
                                                                   id="ans-{{ $answer->id }}" value="{{ $answer->id }}">
                                                            <label for="ans-{{ $answer->id }}" class="choice-tile d-flex align-items-center p-3 px-4 w-100 transition-all cursor-pointer">
                                                                <div class="radio-circle me-3"></div>
                                                                <span class="fw-medium text-dark-50">{{ $answer->answer }}</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @elseif($question->type === 'essay')
                                                <div class="col-12">
                                                    <textarea name="answers[{{ $question->id }}]" class="form-control premium-textarea p-4" rows="4" placeholder="اكتب إجابتك هنا..."></textarea>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-5 bg-white rounded-20 shadow-sm">
                                    <i class="feather-help-circle display-1 text-muted opacity-25"></i>
                                    <p class="mt-3 text-muted">لا يوجد أسئلة حالياً.</p>
                                </div>
                            @endforelse
                        </div>

                        <!-- Final Action Button -->
                        @if($quiz->questions->count() > 0)
                            <div class="submit-action-area text-center py-5">
                                <button type="submit" class="rbt-btn btn-gradient btn-lg px-5 py-4 radius-round shadow-lg hover-transform">
                                    <span class="d-flex align-items-center gap-2 px-4">
                                        إنهاء الاختبار وإرسال الإجابات الآن <i class="feather-send"></i>
                                    </span>
                                </button>
                                <p class="text-muted small mt-3">تأكد من إجابة جميع الأسئلة قبل الضغط على الزر.</p>
                            </div>
                        @endif
                    </form>
                @else
                    <!-- Detailed Results Review: This is the important part -->
                    <div class="results-overview-container">
                        @php
                            $totalQuestions = $quiz->questions->count();
                            $score = $attempt->pivot->score;
                            $correctCount = round(($score / 100) * $totalQuestions);
                            $wrongCount = $totalQuestions - $correctCount;
                            $themeColor = $score >= 50 ? '#2BC48A' : '#FF5A5F';
                        @endphp

                        <!-- Score Hero Card -->
                        <div class="score-hero bg-white p-5 mb-5 shadow-sm text-center position-relative overflow-hidden" style="border-radius: 30px;">
                            <div class="z-index-1">
                                <h6 class="text-muted text-uppercase mb-2 ls-1">نتيجتك النهائية</h6>
                                <h2 class="display-1 fw-900 mb-0" style="color: {{ $themeColor }}">{{ $score }}%</h2>
                                <h4 class="fw-bold mt-2 {{ $score >= 50 ? 'text-success' : 'text-danger' }}">
                                    {{ $score >= 50 ? 'تهانينا! لقد اجتزت الاختبار بنجاح' : 'حظاً موفقاً، يمكنك المحاولة مرة أخرى' }}
                                </h4>
                                
                                <div class="row g-3 justify-content-center mt-5">
                                    <div class="col-md-3">
                                        <div class="stat-pill bg-light p-3 rounded-20">
                                            <h4 class="mb-0 fw-bold">{{ $totalQuestions }}</h4>
                                            <span class="text-muted small">إجمالي الأسئلة</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="stat-pill bg-success-soft p-3 rounded-20">
                                            <h4 class="mb-0 fw-bold text-success">{{ $correctCount }}</h4>
                                            <span class="text-muted small">إجابات صحيحة</span>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="stat-pill bg-danger-soft p-3 rounded-20">
                                            <h4 class="mb-0 fw-bold text-danger">{{ $wrongCount }}</h4>
                                            <span class="text-muted small">إجابات خاطئة</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5 d-flex gap-3 justify-content-center">
                                    @if($canRetake)
                                        <a href="{{ request()->url() }}?retake=1" class="rbt-btn btn-border btn-md px-5 radius-round">إعادة الاختبار</a>
                                    @endif
                                    <a href="{{ route('student.my-quizzes') }}" class="rbt-btn btn-gradient btn-md px-5 radius-round"> الاختبارات</a>
                                </div>
                            </div>
                        </div>

                        <!-- THE CORRECT/WRONG Questions List (Back by demand!) -->
                        <h4 class="fw-800 text-dark mb-4 ms-2">مراجعة الأسئلة تفصيلياً</h4>
                        
                        <div class="detailed-review-stack">
                            @foreach($quiz->questions as $index => $question)
                                @php
                                    $userAnswerId = $userAnswers[$question->id] ?? null;
                                    $correctAnswer = $question->answers->where('is_correct', 1)->first();
                                    $isUserCorrect = $userAnswerId == ($correctAnswer->id ?? null);
                                    $statusTheme = $isUserCorrect ? 'success' : 'danger';
                                @endphp
                                
                                <div class="review-item bg-white mb-4 shadow-sm border-start border-5 border-{{ $statusTheme }}" style="border-radius: 15px;">
                                    <div class="p-4 p-md-5">
                                        <div class="d-flex justify-content-between align-items-start mb-4">
                                            <div class="d-flex align-items-center gap-3">
                                                <span class="fw-bold fs-5">السؤال {{ $index + 1 }}</span>
                                                <span class="badge bg-{{ $statusTheme }} rounded-pill px-3">{{ $isUserCorrect ? 'صح ✓' : 'خطأ ✗' }}</span>
                                            </div>
                                        </div>
                                        
                                        <h5 class="fw-bold mb-4 text-dark">{{ $question->question }}</h5>

                                        <div class="row g-3">
                                            @foreach($question->answers as $answer)
                                                @php
                                                    $isCorrect = $answer->is_correct;
                                                    $isChosen = $userAnswerId == $answer->id;
                                                    
                                                    $borderClass = 'border-light bg-light opacity-75';
                                                    $icon = '';
                                                    $textColor = 'text-muted';

                                                    if($isCorrect) {
                                                        $borderClass = 'border-success bg-success-soft';
                                                        $icon = '<i class="feather-check-circle text-success ms-2"></i>';
                                                        $textColor = 'text-success fw-bold';
                                                    }
                                                    if($isChosen && !$isCorrect) {
                                                        $borderClass = 'border-danger bg-danger-soft';
                                                        $icon = '<i class="feather-x-circle text-danger ms-2"></i>';
                                                        $textColor = 'text-danger fw-bold';
                                                    }
                                                @endphp
                                                <div class="col-md-6">
                                                    <div class="p-3 border-2 rounded-15 d-flex align-items-center justify-content-between border {{ $borderClass }}">
                                                        <span class="{{ $textColor }}">{{ $answer->answer }}</span>
                                                        {!! $icon !!}
                                                        @if($isChosen)
                                                            <span class="badge bg-dark-opacity text-dark px-2 py-1 small" style="font-size: 8px;">إجابتك</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

<style>
    /* Premium Design System */
    .fw-800 { font-weight: 800; }
    .fw-900 { font-weight: 900; }
    .ls-1 { letter-spacing: 1px; }
    .rounded-20 { border-radius: 20px !important; }
    .rounded-15 { border-radius: 15px !important; }
    .bg-light-soft { background-color: #f8fafc !important; }
    .bg-primary-opacity { background: rgba(107, 76, 230, 0.1) !important; }
    .bg-success-soft { background-color: #ecfdf5 !important; }
    .bg-danger-soft { background-color: #fff1f2 !important; }
    .bg-dark-opacity { background: rgba(0, 0, 0, 0.05) !important; }
    .color-primary { color: #6B4CE6 !important; }
    
    .btn-exit-quiz { width: 45px; height: 45px; background: #fee2e2; color: #ef4444; border-radius: 12px; transition: 0.3s; }
    .btn-exit-quiz:hover { background: #ef4444; color: white; transform: rotate(180deg); }

    /* Answer Tiles Logic */
    .choice-tile { border: 2px solid #f1f5f9; border-radius: 18px; background: #fff; }
    .choice-tile:hover { border-color: #6B4CE6; background: #f5f3ff; }
    .radio-circle { width: 22px; height: 22px; border: 2px solid #cbd5e1; border-radius: 50%; background: #fff; transition: 0.3s; }
    
    .premium-radio-choice input:checked + .choice-tile { border-color: #6B4CE6; background: #f5f3ff; box-shadow: 0 4px 15px rgba(107, 76, 230, 0.1); }
    .premium-radio-choice input:checked + .choice-tile .radio-circle { border-color: #6B4CE6; border-width: 6px; }
    .premium-radio-choice input:checked + .choice-tile span { color: #6B4CE6 !important; font-weight: bold; }

    /* Custom Textarea */
    .premium-textarea { border-radius: 20px; border: 2px solid #f1f5f9; background: #f8fafc; }
    .premium-textarea:focus { border-color: #6B4CE6; background: #fff; box-shadow: none; }

    /* Transitions & Shadow */
    .shadow-sm { box-shadow: 0 1px 3px rgba(0,0,0,0.05), 0 1px 2px rgba(0,0,0,0.03) !important; }
    .hover-transform:hover { transform: translateY(-3px); }
    .transition-all { transition: all 0.3s ease; }
    
    .z-index-1 { z-index: 1; }
</style>
@endsection
