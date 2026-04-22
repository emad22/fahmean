@extends('layout.dashboard')

@php
    $header = 'false';
    $footer = 'false';
    $topToBottom = 'true';
    $bodyClass = '';
@endphp

@section('dashboard-content')
    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --secondary-gradient: linear-gradient(135deg, #a18cd1 0%, #fbc2eb 100%);
            --accent-gradient: linear-gradient(135deg, #89f7fe 0%, #66a6ff 100%);
            --success-gradient: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%);
            --glass-bg: rgba(255, 255, 255, 0.95);
            --glass-border: 1px solid rgba(255, 255, 255, 0.5);
            --shadow-soft: 0 10px 40px rgba(0,0,0,0.06);
            --shadow-hover: 0 20px 60px rgba(102, 126, 234, 0.15);
        }

        /* Welcome Section */
        .welcome-card {
            background: var(--primary-gradient);
            border-radius: 30px;
            padding: 40px;
            position: relative;
            overflow: hidden;
            color: white;
            box-shadow: 0 15px 40px rgba(102, 126, 234, 0.3);
            margin-bottom: 40px;
        }

        .welcome-card::before {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 60%);
            top: -150px;
            right: -100px;
            border-radius: 50%;
        }

        .welcome-card::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 60%);
            bottom: -100px;
            left: -50px;
            border-radius: 50%;
        }

        .user-info-wrapper {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .user-avatar-box {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            border: 4px solid rgba(255,255,255,0.3);
            padding: 3px;
            background: rgba(255,255,255,0.1);
        }

        .user-avatar-box img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
            object-fit: cover;
        }

        .welcome-text h2 {
            font-size: 2.2rem;
            font-weight: 800;
            color: white;
            margin-bottom: 8px;
        }

        .welcome-text p {
            color: rgba(255,255,255,0.9);
            font-size: 1.1rem;
            margin: 0;
            font-weight: 400;
        }

        /* Stats Grid */
        .dashboard-stat-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            height: 100%;
            transition: all 0.4s ease;
            border: 1px solid #f0f0f5;
            position: relative;
            overflow: hidden;
        }

        .dashboard-stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
            border-color: #667eea;
        }

        a:has(.dashboard-stat-card):hover .dashboard-stat-card {
            transform: translateY(-5px);
            box-shadow: var(--shadow-hover);
            border-color: #667eea;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .dashboard-stat-card:hover .stat-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .stat-count {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 5px;
            color: #1a1a2e;
            line-height: 1;
        }

        .stat-label {
            color: #6b7280;
            font-size: 1rem;
            font-weight: 600;
        }

        /* Icon Colors */
        .icon-primary { background: rgba(102, 126, 234, 0.1); color: #667eea; }
        .icon-success { background: rgba(33, 197, 94, 0.1); color: #21c55e; }
        .icon-warning { background: rgba(245, 158, 11, 0.1); color: #f59e0b; }
        .icon-purple  { background: rgba(168, 85, 247, 0.1); color: #a855f7; }

        /* Course Card Horizontal */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            margin-top: 40px;
        }

        .section-header h4 {
            font-size: 1.5rem;
            font-weight: 800;
            color: #1a1a2e;
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0;
        }

        .section-header h4 i {
            color: #667eea;
        }

        .view-all-btn {
            color: #667eea;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 20px;
            background: rgba(102, 126, 234, 0.08);
            border-radius: 100px;
            transition: all 0.3s ease;
        }

        .view-all-btn:hover {
            background: #667eea;
            color: white;
            transform: translateX(-5px);
        }

        .course-card-horizontal {
            background: white;
            border-radius: 20px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 25px;
            border: 1px solid #f0f0f5;
            transition: all 0.4s ease;
            margin-bottom: 20px;
        }

        .course-card-horizontal:hover {
            box-shadow: 0 15px 40px rgba(0,0,0,0.08);
            transform: translateX(-5px);
            border-color: #667eea;
        }

        .course-thumb-h {
            width: 140px;
            height: 100px;
            border-radius: 15px;
            overflow: hidden;
            flex-shrink: 0;
        }

        .course-thumb-h img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .course-card-horizontal:hover .course-thumb-h img {
            transform: scale(1.1);
        }

        .course-info-h {
            flex-grow: 1;
        }

        .course-title-h {
            font-size: 1.2rem;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 15px;
            display: block;
        }
        
        .progress-wrapper-h {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .progress-bar-h {
            flex-grow: 1;
            height: 8px;
            background: #f0f0f5;
            border-radius: 10px;
            overflow: hidden;
        }

        .progress-fill-h {
            height: 100%;
            background: linear-gradient(90deg, #667eea, #764ba2);
            border-radius: 10px;
        }

        .progress-text-h {
            font-size: 0.9rem;
            font-weight: 700;
            color: #667eea;
        }

        .continue-btn-sm {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .course-card-horizontal:hover .continue-btn-sm {
            background: #667eea;
            color: white;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        /* Modern Table */
        .modern-table-wrapper {
            background: white;
            border-radius: 20px;
            padding: 5px;
            border: 1px solid #f0f0f5;
        }

        .modern-table {
            width: 100%;
            border-collapse: collapse;
        }

        .modern-table th {
            text-align: right;
            padding: 20px;
            color: #6b7280;
            font-weight: 600;
            font-size: 0.95rem;
            border-bottom: 1px solid #f0f0f5;
        }

        .modern-table td {
            padding: 20px;
            vertical-align: middle;
            border-bottom: 1px solid #f0f0f5;
            color: #1a1a2e;
            font-weight: 600;
        }

        .modern-table tr:last-child td {
            border-bottom: none;
        }
        
        .status-badge {
            padding: 8px 16px;
            border-radius: 100px;
            font-size: 0.85rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .badge-success { background: rgba(33, 197, 94, 0.1); color: #21c55e; }
        .badge-danger { background: rgba(239, 68, 68, 0.1); color: #ef4444; }

        /* Admin Quick Actions */
        .action-card {
            background: white;
            border-radius: 20px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid #f0f0f5;
            height: 100%;
        }

        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.08);
            border-color: #667eea;
        }

        .action-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin: 0 auto 15px;
        }
    </style>

    {{-- Welcome Section --}}
    <div class="welcome-card">
        <div class="user-info-wrapper">
            <div class="user-avatar-box">
                <img src="{{ Auth::user()->profile_image ?  asset('uploads/'.Auth::user()->profile_image)  : asset('assets/images/team/avatar.jpg') }}" alt="User">
            </div>
            <div class="welcome-text">
                <h2>مرحباً، {{ explode(' ', Auth::user()->name)[0] }}! 👋</h2>
                <p>سعداء برؤيتك مجدداً. لنواصل تحقيق أهدافك التعليمية اليوم.</p>
            </div>
        </div>
    </div>

    {{-- Student Dashboard --}}
    @role('student')
        <!-- Stats Row -->
        <div class="row g-4 mb-5">
            <div class="col-lg-3 col-md-6 col-12">
                <a href="{{ route('courses.index') }}" class="text-decoration-none">
                <div class="dashboard-stat-card">
                    <div class="stat-icon icon-primary">
                        <i class="feather-book-open"></i>
                    </div>
                    <div class="stat-count">{{ $enrolledCoursesCount ?? 0 }}</div>
                    <div class="stat-label">كورسات مسجلة</div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <a href="{{ route('student.available-courses') }}" class="text-decoration-none">
                <div class="dashboard-stat-card">
                    <div class="stat-icon icon-purple">
                        <i class="feather-grid"></i>
                    </div>
                    @php
                        $availableCount = 0;
                        $studentProfile = auth()->user()->student;
                        if ($studentProfile) {
                            $enrolledIds  = $studentProfile->activeCourses()->pluck('courses.id')->toArray();
                            $requestedIds = \App\Models\EnrollmentRequest::where('student_id', auth()->id())->pluck('course_id')->toArray();
                            $availableCount = \App\Models\Course::where('status','published')
                                ->where('academic_year', $studentProfile->academic_year)
                                ->whereHas('subject', fn($q) => $q->where('grade_id', $studentProfile->grade_id))
                                ->whereNotIn('id', $enrolledIds)
                                ->count();
                        }
                    @endphp
                    <div class="stat-count">{{ $availableCount }}</div>
                    <div class="stat-label">كورسات متاحة</div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <a href="{{ route('student.my-enrollment-requests') }}" class="text-decoration-none">
                <div class="dashboard-stat-card">
                    <div class="stat-icon icon-warning">
                        <i class="feather-clock"></i>
                    </div>
                    <div class="stat-count">{{ $activeCoursesCount ?? 0 }}</div>
                    <div class="stat-label">قيد الدراسة</div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="dashboard-stat-card">
                    <div class="stat-icon icon-success">
                        <i class="feather-award"></i>
                    </div>
                    <div class="stat-count">{{ $completedCoursesCount ?? 0 }}</div>
                    <div class="stat-label">شهادات مكتملة</div>
                </div>
            </div>
        </div>

        <div class="row g-5">
            <!-- Recent Courses Column -->
            <div class="col-lg-7">
                <div class="section-header">
                    <h4><i class="feather-play-circle"></i> استكمل التعلم</h4>
                    <a href="{{ route('student.available-courses') }}" class="view-all-btn">
                        تصفح الكل <i class="feather-arrow-left"></i>
                    </a>
                </div>

                <div class="courses-list">
                    @forelse ($recentCourses as $course)
                        <div class="course-card-horizontal">
                            <div class="course-thumb-h">
                                <a href="{{ route('courses.show', $course->id) }}">
                                    <img src="{{ $course->image ? asset('storage/' . $course->image) : asset('assets/images/course/course-01.jpg') }}" alt="Course">
                                </a>
                            </div>
                            <div class="course-info-h">
                                <a href="{{ route('courses.show', $course->id) }}" class="course-title-h">{{ $course->title }}</a>
                                <div class="progress-wrapper-h">
                                    @php $progress = rand(10, 90); @endphp
                                    <div class="progress-bar-h">
                                        <div class="progress-fill-h" style="width: {{ $progress }}%"></div>
                                    </div>
                                    <span class="progress-text-h">{{ $progress }}%</span>
                                </div>
                            </div>
                            <a href="{{ route('courses.show', $course->id) }}" class="continue-btn-sm">
                                <i class="feather-play"></i>
                            </a>
                        </div>
                    @empty
                        <div class="text-center p-5 bg-white rounded-4 border">
                            <i class="feather-book-open display-4 text-muted opacity-25 mb-3"></i>
                            <h5 class="mb-2">لا توجد كورسات نشطة</h5>
                            <p class="text-muted">ابدأ بتصفح الكورسات وسجل الآن</p>
                            <a href="{{ route('student.available-courses') }}" class="rbt-btn btn-sm btn-gradient mt-3">تصفح الكورسات</a>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Quiz Attempts Column -->
            <div class="col-lg-5">
                <div class="section-header">
                    <h4><i class="feather-check-square"></i> آخر الاختبارات</h4>
                </div>
                
                <div class="modern-table-wrapper">
                    <table class="modern-table">
                        <thead>
                            <tr>
                                <th>الاختبار</th>
                                <th>النتيجة</th>
                                <th>التاريخ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($quizAttempts as $attempt)
                            <tr>
                                <td>
                                    <div class="d-flex flex-column">
                                        <span class="fw-bold text-dark">{{ Str::limit($attempt->title ?? 'اختبار عام', 25) }}</span>
                                        <small class="text-muted" style="font-size: 10px;">
                                            <i class="feather-user me-1"></i> محاولة رقم {{ $attempt->pivot->attempt_count ?? 1 }}
                                        </small>
                                    </div>
                                </td>
                                <td>
                                    @php $score = $attempt->pivot->score ?? 0; @endphp
                                    @if($score >= 50)
                                        <span class="status-badge badge-success" style="padding: 5px 12px; border-radius: 6px;">
                                            <i class="feather-check-circle me-1"></i> {{ $score }}%
                                        </span>
                                    @else
                                        <span class="status-badge badge-danger" style="padding: 5px 12px; border-radius: 6px;">
                                            <i class="feather-alert-circle me-1"></i> {{ $score }}%
                                        </span>
                                    @endif
                                </td>
                                <td class="text-muted" style="font-size: 12px;">
                                    {{ $attempt->pivot->updated_at ? $attempt->pivot->updated_at->format('d/m') : '-' }}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted py-5">
                                    لا توجد محاولات سابقة
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endrole

    {{-- Admin & Teacher Sections (Preserved but styled) --}}
    {{-- Admin & Teacher Sections --}}
    @role('admin|teacher|assistant_teacher')
        <!-- Stats Row -->
        <div class="row g-4 mb-5">
            {{-- Unified Stat Display Logic --}}
            @php
                $stats = [];
                if(auth()->user()->hasRole('admin')) {
                    $stats = [
                        ['label' => 'الطلاب', 'count' => $students ?? 0, 'icon' => 'feather-users', 'class' => 'icon-primary'],
                        ['label' => 'المعلمين', 'count' => $teachers ?? 0, 'icon' => 'feather-user', 'class' => 'icon-purple'],
                        ['label' => 'الكورسات', 'count' => $courses_count ?? $courses ?? 0, 'icon' => 'feather-monitor', 'class' => 'icon-success'],
                    ];
                } else {
                    $stats = [
                        ['label' => 'كورساتي', 'count' => $totalCourses ?? 0, 'icon' => 'feather-book', 'class' => 'icon-primary'],
                        ['label' => 'إجمالي الطلاب', 'count' => $totalStudents ?? 0, 'icon' => 'feather-users', 'class' => 'icon-purple'],
                        ['label' => 'أرباح تقديرية', 'count' => number_format($totalEarnings ?? 0) . ' ج.م', 'icon' => 'feather-dollar-sign', 'class' => 'icon-success'],
                    ];
                }
            @endphp

            @foreach($stats as $stat)
                <div class="col-lg-4 col-md-6">
                    <div class="dashboard-stat-card">
                        <div class="stat-icon {{ $stat['class'] }}">
                            <i class="{{ $stat['icon'] }}"></i>
                        </div>
                        <div class="stat-count" style="font-size: 1.8rem;">{{ $stat['count'] }}</div>
                        <div class="stat-label">{{ $stat['label'] }}</div>
                    </div>
                </div>
            @endforeach
        </div>

        @role('teacher|assistant_teacher')
            <div class="section-header">
                <h4><i class="feather-grid"></i> كورساتي التعليمية</h4>
                <a href="{{ route('courses.index') }}" class="view-all-btn">
                    إدارة الكل <i class="feather-arrow-left"></i>
                </a>
            </div>

            <div class="row g-4 mb-5">
                @forelse ($courses_list ?? $courses ?? [] as $course)
                    @if(is_object($course))
                        <div class="col-xl-4 col-md-6">
                            <div class="dashboard-stat-card p-0 overflow-hidden border-0 shadow-sm" style="transition: transform 0.3s ease;">
                                <div class="position-relative">
                                    <img src="{{ $course->image ? asset('uploads/' . $course->image) : asset('assets/images/course/course-01.jpg') }}" 
                                         class="w-100" style="height: 160px; object-fit: cover;" alt="">
                                    <span class="badge {{ $course->status == 'published' ? 'bg-success' : 'bg-warning' }} position-absolute top-0 end-0 m-3 radius-10">
                                        {{ $course->status == 'published' ? 'منشور' : 'مسودة' }}
                                    </span>
                                </div>
                                <div class="p-4">
                                    <h6 class="fw-bold text-dark mb-2">{{ Str::limit($course->title, 40) }}</h6>
                                    <div class="d-flex justify-content-between align-items-center mt-3">
                                        <div class="d-flex align-items-center gap-2">
                                            <i class="feather-users text-muted small"></i>
                                            <span class="small fw-bold">{{ $course->students_count ?? 0 }} طالب</span>
                                        </div>
                                        <a href="{{ route('courses.edit', $course->id) }}" class="rbt-btn btn-xs btn-border radius-round">
                                            تعديل <i class="feather-edit-2 ms-1" style="font-size: 10px;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="col-12">
                        <div class="text-center p-5 bg-white rounded-4 border">
                            <i class="feather-plus-circle display-4 text-muted opacity-25 mb-3"></i>
                            <h5 class="mb-2">لم تقم بإنشاء كورسات بعد</h5>
                            <a href="{{ route('courses.create') }}" class="rbt-btn btn-sm btn-gradient mt-3">إنشاء كورس جديد</a>
                        </div>
                    </div>
                @endforelse
            </div>
        @endrole

        @role('admin')
            <div class="section-header">
                <h4><i class="feather-sliders"></i> إجراءات سريعة</h4>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-6">
                    <a href="{{ route('admin.users.create') }}" class="action-card d-block text-dark">
                        <div class="action-icon icon-primary"><i class="feather-user-plus"></i></div>
                        <h5 class="fs-6 mb-0">مستخدم جديد</h5>
                    </a>
                </div>
                <div class="col-lg-3 col-6">
                    <a href="{{ route('courses.create') }}" class="action-card d-block text-dark">
                        <div class="action-icon icon-purple"><i class="feather-plus-circle"></i></div>
                        <h5 class="fs-6 mb-0">كورس جديد</h5>
                    </a>
                </div>
                <div class="col-lg-3 col-6">
                    <a href="{{ route('courses.index') }}" class="action-card d-block text-dark">
                        <div class="action-icon icon-warning"><i class="feather-list"></i></div>
                        <h5 class="fs-6 mb-0">كل الكورسات</h5>
                    </a>
                </div>
                <div class="col-lg-3 col-6">
                    <a href="{{ route('admin.roles.index') }}" class="action-card d-block text-dark">
                        <div class="action-icon icon-success"><i class="feather-shield"></i></div>
                        <h5 class="fs-6 mb-0">الصلاحيات</h5>
                    </a>
                </div>
            </div>
        @endrole
    @endrole
@endsection
