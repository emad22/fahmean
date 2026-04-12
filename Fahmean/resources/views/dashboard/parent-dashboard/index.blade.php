@extends('layout.dashboard')

@php
    $header = 'false';
    $footer = 'false';
    $topToBottom = 'false';
@endphp

@section('dashboard-content')
    <div class="rbt-dashboard-content bg-color-transparent p-0">
        <div class="content">
            
            <!-- Welcome Header -->
            <div class="row mb-5">
                <div class="col-12">
                     <div class="welcome-box bg-white radius-10 border-0 shadow-sm p-4 p-md-5 position-relative overflow-hidden d-flex align-items-center justify-content-between">
                        <div class="position-relative z-index-1">
                            <h2 class="fw-bold mb-2 display-6 text-dark">مرحباً، <span class="color-primary">{{ auth()->user()->name }}</span> 👋</h2>
                            <p class="text-muted mb-0 fs-5">تابع مسيرة تعلم أبنائك وكن شريكاً في نجاحهم.</p>
                        </div>
                        <div class="d-none d-md-block opacity-25">
                             <i class="feather-users text-primary" style="font-size: 8rem;"></i>
                        </div>
                        <!-- Abstract Shape -->
                        <div class="position-absolute top-0 end-0 h-100 w-50 bg-gradient-primary opacity-5" style="clip-path: polygon(20% 0%, 100% 0, 100% 100%, 0% 100%);"></div>
                    </div>
                </div>
            </div>

            <!-- Stats strip -->
            <div class="row g-4 mb-5">
                <div class="col-lg-4">
                    <div class="d-flex align-items-center bg-white p-4 radius-10 shadow-sm border-start border-4 border-primary h-100">
                        <div class="flex-grow-1">
                            <h6 class="text-muted text-uppercase fs-6 mb-2 fw-bold ls-1">عدد الأبناء</h6>
                            <h2 class="mb-0 fw-bold">{{ $children->count() }}</h2>
                        </div>
                        <div class="icon-lg bg-primary-opacity color-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <i class="feather-users fs-3"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                     <div class="d-flex align-items-center bg-white p-4 radius-10 shadow-sm border-start border-4 border-warning h-100">
                        <div class="flex-grow-1">
                            <h6 class="text-muted text-uppercase fs-6 mb-2 fw-bold ls-1">الكورسات المسجلة</h6>
                             <h2 class="mb-0 fw-bold">{{ $children->sum(fn($c) => $c->courses->count()) }}</h2>
                        </div>
                         <div class="icon-lg bg-warning-opacity color-warning rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <i class="feather-book-open fs-3"></i>
                        </div>
                    </div>
                </div>
                 <div class="col-lg-4">
                     <div class="d-flex align-items-center bg-white p-4 radius-10 shadow-sm border-start border-4 border-success h-100">
                        <div class="flex-grow-1">
                            <h6 class="text-muted text-uppercase fs-6 mb-2 fw-bold ls-1">الاختبارات المجتازة</h6>
                             <h2 class="mb-0 fw-bold">{{ $children->sum(fn($c) => $c->quizzes->where('pivot.score', '>=', 50)->count()) }}</h2>
                        </div>
                         <div class="icon-lg bg-success-opacity color-success rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                            <i class="feather-award fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Children Grid -->
            <div class="row g-4">
                <div class="col-12 mb-2">
                    <h4 class="fw-bold section-header position-relative ps-3 border-start border-4 border-primary">أبنائي</h4>
                </div>

                 @if($children->count() > 0)
                    @foreach($children as $child)
                        <div class="col-lg-12 col-xl-6">
                            <div class="child-card bg-white radius-15 p-4 shadow-sm border transaction-card hover-lift transition-all position-relative overflow-hidden">
                                <div class="d-flex flex-column flex-sm-row align-items-center gap-4 position-relative z-index-1">
                                    <div class="avatar-group position-relative">
                                         <div class="avatar-xl rounded-circle border border-4 border-light shadow-sm bg-white overflow-hidden p-1 d-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                                            @if(isset($child->user->profile_image) && $child->user->profile_image)
                                                <img src="{{ asset($child->user->profile_image) }}" alt="{{ $child->user->name }}" class="w-100 h-100 rounded-circle object-fit-cover">
                                            @else
                                                 <div class="w-100 h-100 bg-light rounded-circle d-flex align-items-center justify-content-center fs-2 fw-bold color-primary">
                                                    {{ strtoupper(substr($child->user->name ?? 'S', 0, 1)) }}
                                                 </div>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="flex-grow-1 text-center text-sm-start">
                                        <h4 class="fw-bold mb-1 text-dark">{{ $child->user->name }}</h4>
                                        <p class="text-muted mb-3 small"><i class="feather-mail me-1"></i> {{ $child->user->email }}</p>
                                        
                                        <div class="d-flex align-items-center justify-content-center justify-content-sm-start gap-2 flex-wrap">
                                            <span class="badge bg-primary-opacity color-primary px-3 py-2 radius-round">
                                                <i class="feather-book me-1"></i> {{ $child->courses->count() }} كورس
                                            </span>
                                             <span class="badge bg-secondary-opacity color-secondary px-3 py-2 radius-round">
                                                <i class="feather-check-square me-1"></i> {{ $child->quizzes->count() }} اختبار
                                            </span>
                                        </div>
                                    </div>

                                    <div class="ms-sm-auto mt-3 mt-sm-0">
                                        <a href="{{ route('parent.child-progress', $child->id) }}" class="rbt-btn btn-sm btn-gradient radius-10 shadow-sm d-flex align-items-center gap-2">
                                            <span>التفاصيل</span> <i class="feather-arrow-left"></i>
                                        </a>
                                    </div>
                                </div>
                                <!-- Background decoration -->
                                <div class="circle-decoration bg-light opacity-50 rounded-circle position-absolute top-0 start-0 translate-middle" style="width: 200px; height: 200px; margin-left: -50px; margin-top: -50px;"></div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                         <div class="empty-state text-center py-5 bg-white radius-10 border border-dashed text-muted">
                            <i class="feather-users display-3 opacity-25 mb-3"></i>
                            <h5 class="fw-bold">لا يوجد أبناء مرتبطين</h5>
                            <p>تواصل مع الإدارة لإضافة أبنائك.</p>
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </div>

    <style>
        .radius-10 { border-radius: 10px !important; }
        .radius-15 { border-radius: 15px !important; }
        .radius-round { border-radius: 50px !important; }
        
        .bg-color-transparent { background-color: transparent !important; }
        
        /* Typography */
        .color-primary { color: #6B4CE6 !important; }
        .color-warning { color: #f59e0b !important; }
        .color-success { color: #2BC48A !important; }
        .color-secondary { color: #f59e0b !important; }
        
        /* Backgrounds */
        .bg-gradient-primary { background: linear-gradient(135deg, #6B4CE6 0%, #8B5CF6 100%); }
        .bg-primary-opacity { background: rgba(107, 76, 230, 0.08) !important; }
        .bg-warning-opacity { background: rgba(245, 158, 11, 0.1) !important; }
        .bg-success-opacity { background: rgba(43, 196, 138, 0.1) !important; }
        .bg-secondary-opacity { background: rgba(245, 158, 11, 0.1) !important; }
        
        /* Utils */
        .ls-1 { letter-spacing: 0.5px; }
        .z-index-1 { z-index: 1; }
        .object-fit-cover { object-fit: cover; }
        
        /* Hover Effects */
        .hover-lift { transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .hover-lift:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important; border-color: #6B4CE6 !important; }
        
        /* RTL Fixes if needed */
        .border-start { border-right: 4px solid !important; border-left: none !important; } 
    </style>
@endsection
