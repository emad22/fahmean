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
                            <i class="feather-help-circle fs-3 text-white"></i>
                        </div>
                        <div>
                            <h2 class="mb-1 fw-bold">إدارة الاختبارات</h2>
                            <p class="text-muted mb-0">تصميم وإدارة اختبارات الطلاب وتقييم أدائهم</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 text-lg-end text-start">
                    @can('create quiz')
                    <a href="{{ route($routePrefix . '.create') }}" class="rbt-btn btn-gradient btn-md radius-10 shadow-sm">
                        <i class="feather-plus me-1"></i> إضافة اختبار جديد
                    </a>
                    @endcan
                </div>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="alert alert-success border-0 radius-10 shadow-sm mb--30 d-flex align-items-center">
                    <i class="feather-check-circle me-2 fs-5"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Quizzes Grid -->
            @if($quizzes->count() > 0)
                <div class="row g-4">
                    @foreach ($quizzes as $quiz)
                        <div class="col-lg-6 col-xl-4">
                            <div class="quiz-card radius-15 overflow-hidden shadow-sm h-100 transition-all">
                                <!-- Card Header with Gradient -->
                                <div class="card-header-gradient p-4 position-relative">
                                    <div class="d-flex justify-content-between align-items-start mb-3">
                                        <span class="badge bg-white text-dark px-3 py-2 radius-10 shadow-sm fw-bold">
                                            #{{ $quiz->id }}
                                        </span>
                                        @if($quiz->section && $quiz->section->course)
                                            <span class="badge bg-white-opacity text-white px-3 py-2 radius-10">
                                                <i class="feather-book-open me-1"></i> {{ Str::limit($quiz->section->course->title, 15) }}
                                            </span>
                                        @else
                                            <span class="badge bg-warning-opacity text-warning px-3 py-2 radius-10">
                                                <i class="feather-globe me-1"></i> اختبار عام
                                            </span>
                                        @endif
                                    </div>
                                    <h5 class="text-white fw-bold mb-2">{{ $quiz->title }}</h5>
                                    @if($quiz->lesson)
                                        <p class="text-white-70 small mb-0">
                                            <i class="feather-play-circle me-1"></i> {{ Str::limit($quiz->lesson->title, 30) }}
                                        </p>
                                    @endif
                                </div>

                                <!-- Card Body -->
                                <div class="card-body-custom p-4">
                                    <!-- Stats Row -->
                                    <div class="row g-3 mb-4">
                                        <div class="col-6">
                                            <div class="stat-box bg-light p-3 radius-10 text-center">
                                                <i class="feather-clock color-primary mb-1 fs-4"></i>
                                                <div class="fw-bold text-dark">{{ $quiz->time_limit ?? 'مفتوح' }}</div>
                                                <small class="text-muted">{{ $quiz->time_limit ? 'دقيقة' : 'الوقت' }}</small>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="stat-box bg-light p-3 radius-10 text-center">
                                                <i class="feather-help-circle color-secondary mb-1 fs-4"></i>
                                                <div class="fw-bold text-dark">{{ $quiz->questions->count() }}</div>
                                                <small class="text-muted">سؤال</small>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Student Attempts -->
                                    <div class="d-flex align-items-center justify-content-between mb-4 pb-3 border-bottom">
                                        <span class="text-muted small">محاولات الطلاب</span>
                                        <span class="badge bg-info-opacity color-info px-3 py-2 radius-10">
                                            <i class="feather-users me-1"></i> {{ $quiz->students->count() }} طالب
                                        </span>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="d-flex flex-column gap-2">
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('quizzes.attempts', $quiz->id) }}" class="btn-action btn-action-primary radius-10 flex-fill text-center">
                                                <i class="feather-bar-chart-2 me-2"></i> النتائج
                                            </a>
                                            <a href="{{ route('quizzes.students', $quiz->id) }}" class="btn-action btn-action-secondary radius-10 flex-fill text-center" style="background: rgba(43, 196, 138, 0.1); color: #2BC48A;">
                                                <i class="feather-users me-1"></i> الأعضاء
                                            </a>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('questions.index', $quiz->id) }}" class="btn-action btn-action-secondary radius-10 flex-fill text-center">
                                                <i class="feather-list me-1"></i> الأسئلة
                                            </a>
                                            @can('edit quiz')
                                            <a href="{{ route($routePrefix . '.edit', $quiz->id) }}" class="btn-action btn-action-edit radius-10 flex-fill text-center">
                                                <i class="feather-edit-2 me-1"></i> تعديل
                                            </a>
                                            @endcan
                                            @can('delete quiz')
                                            <button type="button" class="btn-action btn-action-danger radius-10 flex-shrink-0" style="width: 48px;" 
                                                    onclick="confirmDelete('{{ addslashes($quiz->title) }}', '{{ route($routePrefix . '.destroy', $quiz->id) }}')">
                                                <i class="feather-trash-2"></i>
                                            </button>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="row mt--40">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $quizzes->links() }}
                    </div>
                </div>
            @else
                <!-- Empty State -->
                <div class="empty-state-container text-center py-5">
                    <div class="icon-box bg-light rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4" style="width: 120px; height: 120px;">
                        <i class="feather-help-circle display-3 text-muted opacity-50"></i>
                    </div>
                    <h3 class="fw-bold text-dark mb-2">لا توجد اختبارات بعد</h3>
                    <p class="text-muted mb-4">ابدأ بإنشاء أول اختبار لتقييم طلابك</p>
                    @can('create quiz')
                    <a href="{{ route($routePrefix . '.create') }}" class="rbt-btn btn-gradient btn-md radius-10">
                        <i class="feather-plus me-1"></i> إضافة اختبار جديد
                    </a>
                    @endcan
                </div>
            @endif

        </div>
    </div>

    <style>

    <style>
        .radius-10 { border-radius: 10px !important; }
        .radius-15 { border-radius: 15px !important; }
        
        /* Gradient Background */
        .bg-gradient-primary {
            background: linear-gradient(135deg, #6B4CE6 0%, #8B5CF6 100%);
        }
        
        .card-header-gradient {
            background: linear-gradient(135deg, #6B4CE6 0%, #8B5CF6 100%);
        }
        
        /* Quiz Card */
        .quiz-card {
            border: 1px solid #f1f1f1;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .quiz-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(107, 76, 230, 0.15) !important;
            border-color: #6B4CE6;
        }
        
        /* Stat Box */
        .stat-box {
            transition: all 0.3s ease;
        }
        
        .stat-box:hover {
            background: #f8f9fc !important;
            transform: scale(1.05);
        }
        
        /* Action Buttons */
        .btn-action {
            padding: 12px 20px;
            border: none;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn-action-primary {
            background: linear-gradient(135deg, #6B4CE6 0%, #8B5CF6 100%);
            color: white;
        }
        
        .btn-action-primary:hover {
            background: linear-gradient(135deg, #5a3dd4 0%, #7a4de4 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(107, 76, 230, 0.3);
        }
        
        .btn-action-secondary {
            background: rgba(107, 76, 230, 0.08);
            color: #6B4CE6;
        }
        
        .btn-action-secondary:hover {
            background: rgba(107, 76, 230, 0.15);
            color: #6B4CE6;
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
        
        .bg-white-opacity { background: rgba(255, 255, 255, 0.2) !important; }
        .bg-warning-opacity { background: rgba(245, 158, 11, 0.1) !important; }
        .bg-info-opacity { background: rgba(14, 165, 233, 0.1) !important; }
        .bg-danger-opacity { background: rgba(255, 90, 95, 0.1) !important; }
        
        .text-white-70 { color: rgba(255, 255, 255, 0.7) !important; }
        
        /* Transition */
        .transition-all { transition: all 0.3s ease; }
    </style>
@endsection
