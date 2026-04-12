@extends('layout.dashboard')

@php
    $header = 'false';
    $footer = 'false';
    $topToBottom = 'false';
@endphp

@section('dashboard-content')
    <div class="rbt-dashboard-content bg-color-transparent p-0">
        <!-- Navigation Back -->
        <div class="mb-4">
             <a href="{{ route('dashboard.index') }}" class="btn-link text-muted hover-primary d-inline-flex align-items-center gap-2 transition-all">
                <i class="feather-arrow-right"></i> العودة للرئيسية
            </a>
        </div>

        <!-- Student Profile Header -->
        <div class="card bg-white radius-15 border-0 shadow-sm mb-4 overflow-hidden">
            <div class="card-body p-4 p-md-5 d-flex flex-column flex-md-row align-items-center align-items-md-start gap-4">
                 <div class="flex-shrink-0">
                    <div class="avatar-xxl rounded-circle border border-4 border-light shadow-sm p-1 position-relative">
                         @if(isset($child->user->profile_image) && $child->user->profile_image)
                            <img src="{{ asset($child->user->profile_image) }}" alt="{{ $child->user->name }}" class="w-100 h-100 rounded-circle object-fit-cover" style="width: 120px; height: 120px;">
                        @else
                             <div class="bg-gradient-primary w-100 h-100 rounded-circle d-flex align-items-center justify-content-center text-white fs-1 fw-bold" style="width: 120px; height: 120px;">
                                {{ strtoupper(substr($child->user->name ?? 'S', 0, 1)) }}
                             </div>
                        @endif
                        <span class="position-absolute bottom-0 end-0 p-2 bg-success border border-4 border-white rounded-circle me-2 mb-2"></span>
                    </div>
                </div>
                
                <div class="flex-grow-1 text-center text-md-end">
                    <h2 class="fw-bold mb-2">{{ $child->user->name }}</h2>
                    <p class="text-muted d-flex align-items-center justify-content-center justify-content-md-start gap-3 mb-3">
                        <span><i class="feather-mail me-1"></i> {{ $child->user->email }}</span>
                        <span class="bullet-separator">•</span>
                        <span><i class="feather-book me-1"></i> {{ $child->level->name ?? 'غير محدد' }}</span>
                    </p>
                    
                    <!-- Quick Stats Badges -->
                    <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-3">
                         <div class="stats-badge bg-light px-3 py-2 radius-10 d-flex align-items-center gap-2">
                            <i class="feather-book-open color-secondary"></i>
                            <span class="fw-bold">{{ $child->courses->count() }}</span> <span class="text-muted small">كورس</span>
                        </div>
                        <div class="stats-badge bg-light px-3 py-2 radius-10 d-flex align-items-center gap-2">
                            <i class="feather-check-circle color-success"></i>
                            <span class="fw-bold">{{ $child->quizzes->count() }}</span> <span class="text-muted small">اختبار</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Tabs & Sections -->
        <div class="row g-4">
            <div class="col-12">
                 <div class="card bg-white radius-15 border-0 shadow-sm h-100">
                    <div class="card-header bg-transparent border-bottom p-4 pb-0">
                        <ul class="nav nav-pills rbt-modern-tabs gap-3 mb-4" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active fw-bold px-4 py-2 radius-round transition-all" id="pills-courses-tab" data-bs-toggle="pill" data-bs-target="#pills-courses" type="button" role="tab">
                                    <i class="feather-book me-2"></i> الكورسات
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fw-bold px-4 py-2 radius-round transition-all" id="pills-quizzes-tab" data-bs-toggle="pill" data-bs-target="#pills-quizzes" type="button" role="tab">
                                    <i class="feather-award me-2"></i> الاختبارات
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fw-bold px-4 py-2 radius-round transition-all" id="pills-login-tab" data-bs-toggle="pill" data-bs-target="#pills-login" type="button" role="tab">
                                    <i class="feather-activity me-2"></i> سجل الدخول (Login History)
                                </button>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body p-4">
                        <div class="tab-content" id="pills-tabContent">
                            <!-- Courses Tab -->
                            <div class="tab-pane fade show active" id="pills-courses" role="tabpanel">
                                @if($child->courses->count() > 0)
                                    <div class="row g-4">
                                        @foreach($child->courses as $course)
                                            <div class="col-md-6 col-lg-4">
                                                <div class="course-card-modern border radius-10 p-4 h-100 hover-border-primary transition-all d-flex flex-column">
                                                    <div class="d-flex align-items-start justify-content-between mb-3">
                                                        <div class="icon-box bg-secondary-opacity color-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                                            <i class="feather-book-open"></i>
                                                        </div>
                                                        <span class="badge bg-light text-muted radius-round px-3 py-1">{{ $course->lessons->count() }} درس</span>
                                                    </div>
                                                    <h5 class="fw-bold mb-3 line-clam-2">{{ $course->title }}</h5>
                                                    
                                                     @php
                                                        $courseCompletedLessons = $child->user->lessons()
                                                            ->whereHas('section', function($q) use ($course) {
                                                                $q->where('course_id', $course->id);
                                                            })
                                                            ->wherePivot('completed', 1)
                                                            ->count();
                                                        
                                                        $totalCourseLessons = $course->lessons()->count();
                                                        $progress = $totalCourseLessons > 0 ? round(($courseCompletedLessons / $totalCourseLessons) * 100) : 0;
                                                    @endphp

                                                    <div class="mt-auto">
                                                        <div class="d-flex justify-content-between align-items-end mb-2">
                                                            <span class="text-muted small fw-bold">نسبة التقدم</span>
                                                            <span class="fw-bold color-primary">{{ $progress }}%</span>
                                                        </div>
                                                        <div class="progress radius-round bg-light" style="height: 6px;">
                                                            <div class="progress-bar bg-gradient-primary" role="progressbar" style="width: {{ $progress }}%"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-center py-5 text-muted">
                                        <i class="feather-book-open display-4 opacity-25 mb-3"></i>
                                        <p>لا يوجد كورسات مسجلة.</p>
                                    </div>
                                @endif
                            </div>

                            <!-- Quizzes Tab -->
                            <div class="tab-pane fade" id="pills-quizzes" role="tabpanel">
                                @if($child->quizzes->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table table-hover align-middle">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th class="py-3 ps-4 border-0 radius-start-10">الاختبار</th>
                                                    <th class="py-3 text-center border-0">الدرجة</th>
                                                    <th class="py-3 text-center border-0">الحالة</th>
                                                    <th class="py-3 text-end pe-4 border-0 radius-end-10">التاريخ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($child->quizzes as $quiz)
                                                    <tr>
                                                        <td class="ps-4 fw-bold text-dark">{{ $quiz->title }}</td>
                                                        <td class="text-center">
                                                            @if($quiz->pivot->score >= 50)
                                                                <span class="fw-bold text-success">{{ $quiz->pivot->score }}%</span>
                                                            @else
                                                                <span class="fw-bold text-danger">{{ $quiz->pivot->score }}%</span>
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                             @if($quiz->pivot->score >= 50)
                                                                <span class="badge bg-success-opacity color-success radius-round px-3">ناجح</span>
                                                            @else
                                                                <span class="badge bg-danger-opacity color-danger radius-round px-3">راسب</span>
                                                            @endif
                                                        </td>
                                                        <td class="text-end pe-4 text-muted small">
                                                            {{ $quiz->pivot->updated_at->format('Y/m/d H:i A') }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                     <div class="text-center py-5 text-muted">
                                        <i class="feather-award display-4 opacity-25 mb-3"></i>
                                        <p>لا يوجد اختبارات مسجلة.</p>
                                    </div>
                                @endif
                            </div>

                            <!-- Login History Tab (NEW) -->
                            <div class="tab-pane fade" id="pills-login" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle">
                                        <thead class="bg-light">
                                            <tr>
                                                <th class="py-3 ps-4 border-0 radius-start-10">الجهاز / المتصفح</th>
                                                <th class="py-3 border-0">IP Address</th>
                                                <th class="py-3 text-end pe-4 border-0 radius-end-10">وقت الدخول</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($child->user->loginActivities->count() > 0)
                                                @foreach($child->user->loginActivities->take(20) as $activity)
                                                    <tr>
                                                        <td class="ps-4 text-muted small" style="max-width: 300px;">
                                                            <div class="d-flex align-items-center gap-2">
                                                                @if(Str::contains(strtolower($activity->user_agent), 'mobile'))
                                                                    <i class="feather-smartphone fs-5"></i>
                                                                @else
                                                                    <i class="feather-monitor fs-5"></i>
                                                                @endif
                                                                <span class="text-truncate d-inline-block" style="max-width: 250px;" title="{{ $activity->user_agent }}">{{ $activity->user_agent }}</span>
                                                            </div>
                                                        </td>
                                                        <td class="text-dark fw-bold font-monospace small">{{ $activity->ip_address }}</td>
                                                        <td class="text-end pe-4 text-muted small">
                                                            <div class="fw-bold text-dark">{{ $activity->created_at->format('Y-m-d') }}</div>
                                                            <div>{{ $activity->created_at->format('h:i A') }}</div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td colspan="3" class="text-center py-5 text-muted">لا يوجد سجلات دخول حتى الآن.</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>

    <style>
        .radius-10 { border-radius: 10px !important; }
        .radius-15 { border-radius: 15px !important; }
        .radius-round { border-radius: 50px !important; }
        .radius-start-10 { border-top-right-radius: 10px; border-bottom-right-radius: 10px; } /* RTL */
        .radius-end-10 { border-top-left-radius: 10px; border-bottom-left-radius: 10px; } /* RTL */
        
        .bg-color-transparent { background-color: transparent !important; }
        
        .bg-gradient-primary { background: linear-gradient(135deg, #6B4CE6 0%, #8B5CF6 100%); }
        .bg-secondary-opacity { background: rgba(245, 158, 11, 0.1) !important; }
        .bg-success-opacity { background: rgba(43, 196, 138, 0.1) !important; }
        .bg-danger-opacity { background: rgba(255, 90, 95, 0.1) !important; }
        
        .color-primary { color: #6B4CE6 !important; }
        .color-secondary { color: #f59e0b !important; }
        .color-success { color: #2BC48A !important; }
        .color-danger { color: #FF5A5F !important; }
        
        .hover-primary:hover { color: #6B4CE6 !important; }
        .hover-border-primary:hover { border-color: #6B4CE6 !important; }
        .transition-all { transition: all 0.3s ease; }
        
        /* Modern Tabs Pill Style */
        .nav-pills .nav-link { color: #6b7385; background: #f8f9fc; border: 1px solid transparent; }
        .nav-pills .nav-link.active { background-color: #6B4CE6; color: white; box-shadow: 0 4px 10px rgba(107, 76, 230, 0.3); }
        .nav-pills .nav-link:hover:not(.active) { background: #eef1f6; color: #6B4CE6; }
        
        .bullet-separator { font-size: 20px; line-height: 0; color: #cbd5e1; }
        .line-clam-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
        .font-monospace { font-family: monospace; }
        
    </style>
@endsection
