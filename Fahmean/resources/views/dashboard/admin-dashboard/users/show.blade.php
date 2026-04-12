@extends('layout.dashboard')
@php
    $header = 'false';
    $footer = 'false';
    $topToBottom = 'false';
    $bodyClass = '';
@endphp

@section('dashboard-content')
    <style>
        .profile-hero-wrapper {
            position: relative;
            margin-bottom: 80px;
        }

        .profile-hero-bg {
            background: linear-gradient(135deg, #1d1d1d 0%, #434343 100%);
            height: 220px;
            border-radius: 30px;
            position: relative;
            overflow: hidden;
        }

        .profile-hero-bg::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://www.transparenttextures.com/patterns/carbon-fibre.png');
            opacity: 0.1;
        }

        .profile-hero-content {
            position: absolute;
            bottom: 40px;
            left: 40px;
            right: 40px;
            display: flex;
            align-items: flex-end;
            gap: 30px;
        }

        .profile-avatar-big {
            width: 160px;
            height: 160px;
            border-radius: 35px;
            border: 8px solid #fff;
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            object-fit: cover;
            background: #fff;
        }

        .profile-hero-info {
            padding-bottom: 20px;
            flex-grow: 1;
        }

        .insight-card {
            background: #fff;
            border-radius: 20px;
            padding: 25px;
            transition: all 0.3s ease;
            border: 1px solid #f0f0f0;
            height: 100%;
        }

        .insight-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.05);
        }

        .insight-icon {
            width: 45px;
            height: 45px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            margin-bottom: 15px;
        }

        .data-box {
            background: #f8faff;
            border: 1px solid #eef2f6;
            border-radius: 15px;
            padding: 20px;
            height: 100%;
        }

        .data-box i {
            color: var(--color-primary);
            margin-inline-end: 10px;
        }

        .status-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
            margin-inline-end: 8px;
            background: #28a745;
            box-shadow: 0 0 10px rgba(40, 167, 69, 0.4);
        }
    </style>

    <div class="row justify-content-center">
        <div class="col-lg-12">
            
            <!-- Enhanced Hero Section -->
            <div class="profile-hero-wrapper">
                <div class="profile-hero-bg"></div>
                <div class="profile-hero-content">
                    <img src="{{ $user->profile_image ? asset('uploads/' . $user->profile_image) : asset('assets/images/team/avatar.jpg') }}" 
                         class="profile-avatar-big shadow-lg" alt="{{ $user->name }}">
                    <div class="profile-hero-info d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <div>
                            <h1 class="mb-1 text-white fw-bold" style="text-shadow: 0 2px 10px rgba(0,0,0,0.2);">{{ $user->name }}</h1>
                            <div class="d-flex align-items-center gap-3">
                                <span class="badge bg-white color-primary px-3 py-2 radius-10 fw-bold">
                                    <i class="feather-shield me-1"></i> {{ $user->roles->first()?->name ?? 'User' }}
                                </span>
                                <span class="text-white-50"><i class="feather-mail me-1"></i>{{ $user->email }}</span>
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="rbt-btn btn-sm btn-gradient radius-10 px-4">
                                <i class="feather-edit me-2"></i> تعديل
                            </a>
                            <a href="{{ route('admin.users.index') }}" class="rbt-btn btn-sm bg-white color-body radius-10 px-4 shadow-sm border">
                                <i class="feather-list me-2"></i> كل المستخدمين
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-5">
                <!-- Data Columns -->
                <div class="col-lg-8">
                    
                    <!-- Quick Stats Layout -->
                    <div class="row mb--40 g-4">
                        <div class="col-md-4">
                            <div class="insight-card">
                                <div class="insight-icon bg-primary-opacity color-primary">
                                    <i class="feather-calendar"></i>
                                </div>
                                <span class="text-muted small d-block mb-1">تاريخ الإنضمام</span>
                                <h5 class="mb-0">{{ $user->created_at->format('M Y') }}</h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="insight-card">
                                <div class="insight-icon bg-success-opacity color-success">
                                    <i class="feather-activity"></i>
                                </div>
                                <span class="text-muted small d-block mb-1">حالة النشاط</span>
                                <h5 class="mb-0"><span class="status-dot"></span> نشط حالياً</h5>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="insight-card">
                                <div class="insight-icon bg-violet-opacity color-violet">
                                    <i class="feather-star"></i>
                                </div>
                                <span class="text-muted small d-block mb-1">نوع الحساب</span>
                                <h5 class="mb-0">بريميوم</h5>
                            </div>
                        </div>
                    </div>

                    <!-- Detailed Data Sections -->
                    <div class="row g-4 mb--40">
                        <div class="col-12">
                            <div class="premium-data-card">
                                <h5 class="mb--30 fw-bold"><i class="feather-info me-2 text-primary"></i> البيانات التعليمية والتفصيلية</h5>
                                <div class="row g-4">
                                    @if ($user->hasRole('student') && $user->student)
                                        <div class="col-md-6">
                                            <div class="data-box">
                                                <span class="data-label">المرحلة التعليمية</span>
                                                <span class="data-value"><i class="feather-layers"></i>{{ $user->student->educationLevel->name ?? 'غير محدد' }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="data-box">
                                                <span class="data-label">الصف الدراسي</span>
                                                <span class="data-value"><i class="feather-book"></i>{{ $user->student->grade->name ?? 'غير محدد' }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="data-box">
                                                <span class="data-label">رقم التواصل المسجل</span>
                                                <span class="data-value"><i class="feather-phone"></i>{{ $user->student->student_phone_number ?? 'لا يوجد' }}</span>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($user->hasRole('teacher') && $user->subjects->count() > 0)
                                        <div class="col-12">
                                            <div class="data-box bg-violet-opacity" style="border-color: rgba(111, 66, 193, 0.1);">
                                                <span class="data-label color-violet fw-bold">المواد المسندة للمعلم</span>
                                                <div class="d-flex flex-wrap gap-2 mt-2">
                                                    @foreach ($user->subjects as $subject)
                                                        <span class="badge bg-white color-violet px-3 py-2 radius-10 border shadow-sm">{{ $subject->name }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="col-md-6">
                                        <div class="data-box">
                                            <span class="data-label">تاريخ آخر تحديث</span>
                                            <span class="data-value"><i class="feather-refresh-cw"></i>{{ $user->updated_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="data-box">
                                            <span class="data-label">معرف المستخدم (ID)</span>
                                            <span class="data-value">#{{ $user->id }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Sidebar: Relationship Management -->
                <div class="col-lg-4">
                    @if ($user->hasRole('parent'))
                        <div class="premium-data-card mb--30 border-0 shadow-sm" style="background: #fbfbfc;">
                            <h5 class="mb--25 fw-bold"><i class="feather-users me-2 text-primary"></i> الأبناء المرتبطين</h5>
                            <div class="rbt-course-grid-column">
                                @forelse($user->children as $child)
                                    <a href="{{ route('admin.users.show', $child->user_id) }}" class="d-flex align-items-center p-3 mb-3 bg-white radius-15 shadow-sm border-0 transition-all hover-translate-y">
                                        <img src="{{ $child->user->profile_image ? asset('uploads/profiles/'.$child->user->profile_image) : asset('assets/images/team/avatar.jpg') }}" 
                                             class="radius-10 me-3 shadow-sm" style="width: 50px; height: 50px; object-fit: cover;">
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0 small fw-bold">{{ $child->user->name }}</h6>
                                            <span class="text-muted" style="font-size: 0.75rem;">{{ $child->grade->name ?? 'غير محدد' }}</span>
                                        </div>
                                        <i class="feather-chevron-left text-muted opacity-50"></i>
                                    </a>
                                @empty
                                    <div class="text-center py-4 bg-white radius-15 border dashed">
                                        <p class="text-muted small mb-0">لا يوجد أبناء مرتبطين بحساب ولي الأمر.</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    @endif

                    @if ($user->hasRole('assistant_teacher'))
                        <div class="premium-data-card grad-bg-primary text-white" style="background: linear-gradient(to bottom, var(--color-primary), #6f42c1);">
                            <h5 class="mb--25 fw-bold text-white"><i class="feather-user-check me-2"></i> المشرف المباشر</h5>
                            @if($user->teacher)
                                <div class="d-flex align-items-center p-3 bg-white-opacity radius-15">
                                    <img src="{{ $user->teacher->profile_image ? asset('uploads/profiles/'.$user->teacher->profile_image) : asset('assets/images/team/avatar.jpg') }}" 
                                         class="radius-round me-3 border border-2 border-white" style="width: 50px; height: 50px; object-fit: cover;">
                                    <div>
                                        <h6 class="mb-0 fw-bold text-white">{{ $user->teacher->name }}</h6>
                                        <span class="text-white-50 small">معلم / مشرف</span>
                                    </div>
                                </div>
                            @else
                                <div class="alert bg-white-opacity text-white border-0 small">لم يتم تعيين مشرف لهذا المساعد حتى الآن.</div>
                            @endif
                        </div>
                    @endif

                    <!-- Account Actions Card -->
                    <div class="premium-data-card mt-4 border-0 shadow-sm">
                        <h6 class="mb-3 fw-bold small text-uppercase text-muted">إجراءات سريعة</h6>
                        <div class="d-grid gap-2">
                            <button class="rbt-btn btn-sm bg-primary-opacity color-primary radius-10 text-start w-100"><i class="feather-mail me-2"></i> إرسال رسالة</button>
                            <button class="rbt-btn btn-sm bg-color-danger-opacity color-danger radius-10 text-start w-100"><i class="feather-lock me-2"></i> تجميد الحساب</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
@endsection