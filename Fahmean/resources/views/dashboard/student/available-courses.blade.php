@extends('layout.dashboard')

@php
    $header = 'false';
    $footer = 'false';
@endphp

@section('dashboard-content')
<style>
    :root {
        --primary: #667eea;
        --primary-end: #764ba2;
        --success: #10b981;
        --warning: #f59e0b;
        --danger: #ef4444;
        --gray-100: #f8f9ff;
        --shadow-soft: 0 10px 40px rgba(0,0,0,0.08);
    }

    .hero-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 50px 40px;
        border-radius: 25px;
        margin-bottom: 40px;
        position: relative;
        overflow: hidden;
    }
    .hero-header::before {
        content: '';
        position: absolute;
        width: 350px; height: 350px;
        background: rgba(255,255,255,0.08);
        border-radius: 50%;
        top: -150px; right: -80px;
    }
    .hero-content { position: relative; z-index: 2; }
    .hero-title { font-size: 2.6rem; font-weight: 800; color: #fff; margin-bottom: 8px; }
    .hero-subtitle { color: rgba(255,255,255,0.85); font-size: 1.15rem; }

    .filter-bar {
        background: #fff;
        border-radius: 16px;
        padding: 20px 28px;
        margin-bottom: 30px;
        box-shadow: var(--shadow-soft);
        display: flex;
        gap: 16px;
        flex-wrap: wrap;
        align-items: center;
    }
    .filter-bar a {
        padding: 10px 22px;
        border-radius: 100px;
        font-weight: 600;
        font-size: 0.95rem;
        text-decoration: none;
        color: #6b7280;
        background: #f3f4f6;
        transition: all 0.25s;
    }
    .filter-bar a.active, .filter-bar a:hover {
        background: linear-gradient(135deg, var(--primary), var(--primary-end));
        color: #fff;
    }

    .course-card {
        background: #fff;
        border-radius: 22px;
        overflow: hidden;
        box-shadow: var(--shadow-soft);
        transition: all 0.4s cubic-bezier(0.23,1,0.32,1);
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .course-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 60px rgba(102,126,234,0.2);
    }
    .course-img-wrap {
        height: 210px;
        overflow: hidden;
        position: relative;
        background: linear-gradient(135deg, var(--primary), var(--primary-end));
    }
    .course-img-wrap img {
        width: 100%; height: 100%; object-fit: cover;
        transition: transform 0.6s ease;
    }
    .course-card:hover .course-img-wrap img { transform: scale(1.1); }

    .subject-chip {
        position: absolute; top: 16px; right: 16px;
        background: rgba(255,255,255,0.92);
        backdrop-filter: blur(12px);
        padding: 7px 16px;
        border-radius: 100px;
        font-size: 0.8rem; font-weight: 700;
        color: var(--primary);
        display: flex; align-items: center; gap: 6px;
    }

    .course-body {
        padding: 24px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
    .course-title {
        font-size: 1.2rem; font-weight: 800;
        color: #1a1a2e; margin-bottom: 14px;
        line-height: 1.4;
    }
    .meta-row {
        display: flex; gap: 10px; flex-wrap: wrap;
        margin-bottom: 20px;
    }
    .meta-chip {
        background: var(--gray-100);
        padding: 7px 14px;
        border-radius: 8px;
        font-size: 0.85rem; font-weight: 600;
        color: #4a5568;
        display: flex; align-items: center; gap: 6px;
    }
    .meta-chip i { color: var(--primary); }

    .enroll-btn {
        margin-top: auto;
        width: 100%; padding: 14px;
        border: none; border-radius: 14px;
        font-weight: 700; font-size: 0.95rem;
        display: flex; align-items: center; justify-content: center; gap: 8px;
        transition: all 0.35s;
        cursor: pointer;
    }
    .enroll-btn.btn-request {
        background: linear-gradient(135deg, var(--primary), var(--primary-end));
        color: #fff;
        box-shadow: 0 8px 20px rgba(102,126,234,0.35);
    }
    .enroll-btn.btn-request:hover {
        transform: translateY(-3px);
        box-shadow: 0 14px 30px rgba(102,126,234,0.5);
    }
    .enroll-btn.btn-pending {
        background: #f3f4f6; color: #9ca3af;
        cursor: not-allowed;
    }
    .enroll-btn.btn-enrolled {
        background: linear-gradient(135deg, #10b981, #059669);
        color: #fff;
        cursor: default;
        box-shadow: 0 8px 20px rgba(16,185,129,0.3);
    }

    .empty-state {
        text-align: center;
        padding: 80px 40px;
        background: var(--gray-100);
        border-radius: 24px;
        border: 3px dashed #d0d5ff;
    }
    .empty-state i { font-size: 4.5rem; color: var(--primary); opacity: 0.25; margin-bottom: 20px; display: block; }
    .empty-state h3 { font-size: 1.6rem; font-weight: 800; color: #1a1a2e; margin-bottom: 10px; }
    .empty-state p { color: #6b7280; font-size: 1rem; }
</style>

{{-- Hero --}}
<div class="hero-header">
    <div class="hero-content">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="hero-title">الكورسات المتاحة لك</h1>
                <p class="hero-subtitle">اختر الكورس الذي تريد التسجيل فيه وأرسل طلبك</p>
            </div>
            <div class="col-lg-4 text-end">
                <span class="badge bg-white text-primary fs-5 px-4 py-3 rounded-pill shadow">
                    <i class="feather-book me-2"></i>
                    {{ $availableCourses->count() }} كورس متاح
                </span>
            </div>
        </div>
    </div>
</div>

{{-- Alerts --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-4 mb-4" role="alert">
        <i class="feather-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
@if(session('info'))
    <div class="alert alert-info alert-dismissible fade show rounded-4 mb-4" role="alert">
        <i class="feather-info me-2"></i>{{ session('info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show rounded-4 mb-4" role="alert">
        <i class="feather-alert-circle me-2"></i>{{ $errors->first() }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

{{-- Quick Links --}}
<div class="filter-bar mb-4">
    <span class="fw-700 text-muted me-2">انتقل إلى:</span>
    <a href="{{ route('student.available-courses') }}" class="{{ !request('status') ? 'active' : '' }}">
        <i class="feather-grid me-1"></i>الكورسات المتاحة
    </a>
    <a href="{{ route('student.my-enrollment-requests') }}">
        <i class="feather-clock me-1"></i>طلباتي
    </a>
    <a href="{{ route('courses.index') }}">
        <i class="feather-book-open me-1"></i>كورساتي المسجّلة
    </a>
</div>

{{-- Courses Grid --}}
<div class="row g-4">
    @forelse($availableCourses as $course)
        @php
            $isEnrolled  = in_array($course->id, $enrolledCourseIds);
            $reqStatus   = $myRequests[$course->id] ?? null;
            $isRequested = in_array($course->id, $requestedCourseIds);
        @endphp
        <div class="col-lg-4 col-md-6 col-12">
            <div class="course-card">
                <div class="course-img-wrap">
                    <span class="subject-chip">
                        <i class="feather-bookmark"></i>
                        {{ $course->subject->name ?? 'عام' }}
                    </span>
                    <img src="{{ $course->image ? asset('storage/'.$course->image) : asset('assets/images/course/course-01.jpg') }}"
                         alt="{{ $course->title }}">
                </div>

                <div class="course-body">
                    <h3 class="course-title">{{ $course->title }}</h3>

                    <div class="meta-row">
                        <span class="meta-chip">
                            <i class="feather-user"></i>
                            {{ Str::limit($course->teacher->name ?? 'غير محدد', 15) }}
                        </span>
                        <span class="meta-chip">
                            <i class="feather-folder"></i>
                            {{ $course->sections_count }} وحدة
                        </span>
                        @if($course->price)
                        <span class="meta-chip">
                            <i class="feather-tag"></i>
                            {{ number_format($course->price) }} ج.م
                        </span>
                        @endif
                    </div>

                    {{-- Action Button --}}
                    @if($isEnrolled)
                        <a href="{{ route('courses.show', $course->id) }}" class="enroll-btn btn-enrolled">
                            <i class="feather-check-circle"></i> مسجّل بالفعل
                        </a>
                    @elseif($isRequested && $reqStatus === 'pending')
                        <button class="enroll-btn btn-pending" disabled>
                            <i class="feather-clock"></i> في انتظار الموافقة
                        </button>
                    @elseif($isRequested && $reqStatus === 'rejected')
                        <form action="{{ route('student.enrollment-requests.store', $course->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="enroll-btn btn-request bg-danger">
                                <i class="feather-refresh-cw"></i> إعادة طلب التسجيل
                            </button>
                        </form>
                    @else
                        <form action="{{ route('student.enrollment-requests.store', $course->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="enroll-btn btn-request">
                                <i class="feather-send"></i> طلب التسجيل
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="empty-state">
                <i class="feather-search"></i>
                <h3>لا توجد كورسات متاحة حالياً</h3>
                <p>لم يتم نشر كورسات لصفّك الدراسي بعد، تفقّد لاحقاً.</p>
            </div>
        </div>
    @endforelse
</div>
@endsection
