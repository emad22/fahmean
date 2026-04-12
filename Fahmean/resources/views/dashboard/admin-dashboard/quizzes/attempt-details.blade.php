@extends('layout.dashboard')

@php
    $header = 'false';
    $footer = 'false';
@endphp

@section('dashboard-content')
<div class="rbt-dashboard-content bg-color-white radius-10 shadow-sm p-4">
    <div class="content">
        <div class="section-title d-flex justify-content-between align-items-center mb--30">
            <div>
                <h4 class="rbt-title-style-3 mb-0">تفاصيل محاولة الطالب: {{ $student->name }}</h4>
                <p class="text-muted mb-0">الاختبار: {{ $quiz->title }} | الدرجة: <span class="fw-bold color-primary">{{ $student->pivot->score }}%</span></p>
            </div>
            <a href="{{ route('quizzes.attempts', $quiz->id) }}" class="rbt-btn btn-sm btn-border">
                <i class="feather-arrow-right me-1"></i> رجوع للقائمة
            </a>
        </div>

        <div class="quiz-questions-review-list">
            @foreach($quiz->questions as $index => $question)
                @php
                    $userAnswerId = $userAnswers[$question->id] ?? null;
                    $correctAnswer = $question->answers->where('is_correct', 1)->first();
                    $isUserCorrect = $userAnswerId == ($correctAnswer->id ?? null);
                @endphp
                
                <div class="single-review-card mb--30 p-0 border radius-15 bg-white overflow-hidden shadow-sm transition-all">
                    <div class="card-header-status px-4 py-3 d-flex justify-content-between align-items-center {{ $isUserCorrect ? 'bg-success-opacity' : 'bg-danger-opacity' }}">
                        <span class="fw-bold {{ $isUserCorrect ? 'color-success' : 'color-danger' }}">
                            السؤال {{ $index + 1 }}: {{ $isUserCorrect ? 'إجابة الطالب صحيحة' : 'إجابة الطالب خاطئة' }}
                        </span>
                        <i class="{{ $isUserCorrect ? 'feather-check' : 'feather-x' }} bg-{{ $isUserCorrect ? 'success' : 'danger' }} color-white rounded-circle p-1" style="font-size: 14px;"></i>
                    </div>
                    
                    <div class="card-body p-4">
                        <h6 class="fw-bold mb-4">{{ $question->question }}</h6>
                        
                        <div class="answers-grid row g-3">
                            @foreach($question->answers as $answer)
                                @php
                                    $isCorrect = $answer->is_correct;
                                    $isChosen = $userAnswerId == $answer->id;
                                    
                                    $cardClass = 'bg-light border-light opacity-75';
                                    if ($isCorrect) $cardClass = 'bg-success-opacity border-success color-success fw-bold';
                                    if ($isChosen && !$isCorrect) $cardClass = 'bg-danger-opacity border-danger color-danger';
                                @endphp
                                
                                <div class="col-md-6">
                                    <div class="p-3 radius-10 border {{ $cardClass }} position-relative">
                                        @if($isCorrect)
                                            <span class="badge bg-success color-white radius-10 position-absolute end-0 top-0 mt--10 me-3 shadow-sm" style="font-size: 9px; z-index: 2;">الإجابة الصحيحة</span>
                                        @endif
                                        
                                        <div class="d-flex align-items-center gap-2">
                                            @if($isChosen)
                                                <i class="feather-user text-dark opacity-50 small" title="إجابة الطالب"></i>
                                            @endif
                                            <span>{{ $answer->answer }}</span>
                                            
                                            @if($isChosen)
                                                <small class="ms-auto fw-normal opacity-75">(إجابة الطالب)</small>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    .bg-success-opacity { background: rgba(43, 196, 138, 0.1) !important; }
    .bg-danger-opacity { background: rgba(255, 90, 95, 0.1) !important; }
    .color-success { color: #2BC48A !important; }
    .color-danger { color: #FF5A5F !important; }
    .radius-15 { border-radius: 15px !important; }
    .transition-all { transition: all 0.3s ease; }
    .single-review-card:hover { transform: translateY(-3px); box-shadow: 0 5px 15px rgba(0,0,0,0.05) !important; }
</style>
@endsection
