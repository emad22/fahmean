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
            <div class="row mb--40 align-items-center g-3">
                <div class="col-lg-7">
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon-box bg-gradient-primary rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 60px; height: 60px;">
                            <i class="feather-list fs-3 text-white"></i>
                        </div>
                        <div>
                            <h2 class="mb-1 fw-bold">بنك الأسئلة</h2>
                            <p class="text-muted mb-0">اختبار: <span class="color-primary fw-bold">{{ $quiz->title }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 text-lg-end text-start">
                    <div class="d-flex justify-content-lg-end gap-2 flex-wrap">
                        <a href="{{ route('quizzes.index') }}" class="rbt-btn btn-md btn-border radius-10">
                            <i class="feather-arrow-right me-1"></i> رجوع
                        </a>
                        <a href="{{ route($routePrefix . '.create', $quiz->id) }}" class="rbt-btn btn-gradient btn-md radius-10 shadow-sm">
                            <i class="feather-plus me-1"></i> إضافة سؤال
                        </a>
                    </div>
                </div>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="alert alert-success border-0 radius-10 shadow-sm mb--30 d-flex align-items-center">
                    <i class="feather-check-circle me-2 fs-5"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Questions List -->
            @if($quiz->questions->count() > 0)
                <div class="questions-container">
                    @foreach ($quiz->questions as $question)
                        <div class="question-card radius-15 p-4 mb-3 shadow-sm transition-all">
                            <div class="row align-items-start g-3">
                                <!-- Question Number -->
                                <div class="col-auto">
                                    <div class="question-number bg-gradient-primary text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 45px; height: 45px;">
                                        {{ $loop->iteration }}
                                    </div>
                                </div>

                                <!-- Question Content -->
                                <div class="col">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <h6 class="mb-0 fw-bold text-dark flex-grow-1 me-3">{{ $question->question }}</h6>
                                        @php
                                            $typeMap = [
                                                'multiple_choice' => ['text' => 'اختيار من متعدد', 'class' => 'bg-primary-opacity color-primary', 'icon' => 'check-square'],
                                                'true_false' => ['text' => 'صح / خطأ', 'class' => 'bg-secondary-opacity color-secondary', 'icon' => 'toggle-right'],
                                                'essay' => ['text' => 'مقالي', 'class' => 'bg-info-opacity color-info', 'icon' => 'file-text']
                                            ];
                                            $type = $typeMap[$question->type] ?? ['text' => $question->type, 'class' => 'bg-light text-muted', 'icon' => 'help-circle'];
                                        @endphp
                                        <span class="badge {{ $type['class'] }} radius-10 px-3 py-2">
                                            <i class="feather-{{ $type['icon'] }} me-1"></i> {{ $type['text'] }}
                                        </span>
                                    </div>

                                    <!-- Answers Section -->
                                    @if ($question->type != 'essay')
                                        <div class="answers-section bg-light p-3 radius-10 mb-3">
                                            <div class="d-flex flex-wrap gap-2">
                                                @foreach ($question->answers as $answer)
                                                    <div class="answer-badge {{ $answer->is_correct ? 'answer-correct' : 'answer-normal' }} radius-10 px-3 py-2">
                                                        @if($answer->is_correct)
                                                            <i class="feather-check-circle me-1"></i>
                                                        @else
                                                            <i class="feather-circle me-1"></i>
                                                        @endif
                                                        {{ $answer->answer }}
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @else
                                        <div class="bg-light p-3 radius-10 mb-3">
                                            <small class="text-muted">
                                                <i class="feather-edit-3 me-1"></i> سؤال مقالي - يتطلب إجابة نصية من الطالب
                                            </small>
                                        </div>
                                    @endif

                                    <!-- Action Buttons -->
                                    <div class="d-flex gap-2">
                                        <a href="{{ route($routePrefix . '.edit', [$quiz->id, $question->id]) }}" class="btn-action btn-action-edit radius-10 flex-fill text-center">
                                            <i class="feather-edit-2 me-1"></i> تعديل
                                        </a>
                                        <button type="button" class="btn-action btn-action-danger radius-10 flex-shrink-0" style="width: 48px;"
                                                onclick="confirmDelete('{{ $question->question }}', '{{ route($routePrefix . '.destroy', [$quiz->id, $question->id]) }}')">
                                            <i class="feather-trash-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="empty-state-container text-center py-5">
                    <div class="icon-box bg-light rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4" style="width: 120px; height: 120px;">
                        <i class="feather-help-circle display-3 text-muted opacity-50"></i>
                    </div>
                    <h3 class="fw-bold text-dark mb-2">لا توجد أسئلة بعد</h3>
                    <p class="text-muted mb-4">ابدأ بإضافة أول سؤال لهذا الاختبار</p>
                    <a href="{{ route($routePrefix . '.create', $quiz->id) }}" class="rbt-btn btn-gradient btn-md radius-10">
                        <i class="feather-plus me-1"></i> إضافة سؤال جديد
                    </a>
                </div>
            @endif

        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content radius-15 border-0 shadow-lg">
                <div class="modal-body p-5 text-center">
                    <div class="icon-box mb-4 mx-auto bg-danger-opacity rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <i class="feather-alert-triangle color-danger display-4"></i>
                    </div>
                    <h4 class="fw-bold mb-3">تأكيد الحذف</h4>
                    <p class="text-muted mb-4">
                        هل أنت متأكد من حذف السؤال؟
                        <br><span class="text-danger small">لا يمكن التراجع عن هذا الإجراء!</span>
                    </p>
                    <div class="d-flex justify-content-center gap-3">
                        <button type="button" class="rbt-btn btn-md btn-border radius-round" data-bs-dismiss="modal">إلغاء</button>
                        <form id="deleteForm" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rbt-btn btn-md btn-gradient radius-round">نعم، احذف الآن</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(title, actionUrl) {
            document.getElementById('deleteForm').action = actionUrl;
            const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
            modal.show();
        }
    </script>

    <style>
        .radius-10 { border-radius: 10px !important; }
        .radius-15 { border-radius: 15px !important; }
        
        /* Gradient */
        .bg-gradient-primary {
            background: linear-gradient(135deg, #6B4CE6 0%, #8B5CF6 100%);
        }
        
        /* Question Card */
        .question-card {
            border: 1px solid #f1f1f1;
            background: white;
            transition: all 0.3s ease;
        }
        
        .question-card:hover {
            border-color: #6B4CE6;
            box-shadow: 0 5px 20px rgba(107, 76, 230, 0.1) !important;
            transform: translateX(-5px);
        }
        
        /* Answer Badges */
        .answer-badge {
            font-size: 13px;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        
        .answer-correct {
            background: #2BC48A;
            color: white;
            border: 2px solid #2BC48A;
        }
        
        .answer-normal {
            background: white;
            color: #6b7385;
            border: 2px solid #e5e7eb;
        }
        
        .answer-badge:hover {
            transform: scale(1.05);
        }
        
        /* Action Buttons */
        .btn-action {
            padding: 10px 20px;
            border: none;
            font-weight: 600;
            font-size: 13px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-action-edit {
            background: rgba(245, 158, 11, 0.1);
            color: #f59e0b;
        }
        
        .btn-action-edit:hover {
            background: rgba(245, 158, 11, 0.2);
            color: #f59e0b;
        }
        
        .btn-action-danger {
            background: rgba(255, 90, 95, 0.1);
            color: #FF5A5F;
        }
        
        .btn-action-danger:hover {
            background: rgba(255, 90, 95, 0.2);
            color: #FF5A5F;
        }
        
        /* Colors */
        .color-primary { color: #6B4CE6 !important; }
        .color-secondary { color: #f59e0b !important; }
        .color-info { color: #0ea5e9 !important; }
        .color-danger { color: #FF5A5F !important; }
        
        .bg-primary-opacity { background: rgba(107, 76, 230, 0.08) !important; }
        .bg-secondary-opacity { background: rgba(245, 158, 11, 0.1) !important; }
        .bg-info-opacity { background: rgba(14, 165, 233, 0.1) !important; }
        .bg-danger-opacity { background: rgba(255, 90, 95, 0.1) !important; }
        
        .transition-all { transition: all 0.3s ease; }
    </style>
@endsection
