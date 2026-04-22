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
        --shadow-soft: 0 10px 40px rgba(0,0,0,0.08);
        --shadow-hover: 0 20px 60px rgba(102,126,234,0.2);
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
        width: 400px; height: 400px;
        background: rgba(255,255,255,0.08);
        border-radius: 50%;
        top: -200px; right: -100px;
    }
    .hero-content { position: relative; z-index: 2; }
    .hero-title   { font-size: 3rem; font-weight: 800; color: #fff; margin-bottom: 10px; }
    .hero-subtitle { color: rgba(255,255,255,0.9); font-size: 1.2rem; }

    .stats-badge {
        background: #fff;
        color: var(--primary);
        padding: 14px 28px;
        border-radius: 100px;
        font-size: 1.2rem;
        font-weight: 800;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        display: inline-flex;
        align-items: center;
        gap: 10px;
    }

    .course-card {
        background: #fff;
        border-radius: 24px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.23,1,0.32,1);
        border: 2px solid transparent;
        height: 100%;
        display: flex;
        flex-direction: column;
        box-shadow: var(--shadow-soft);
    }
    .course-card:hover {
        transform: translateY(-12px);
        box-shadow: var(--shadow-hover);
        border-color: var(--primary);
    }

    .course-image-wrapper {
        height: 220px;
        overflow: hidden;
        position: relative;
        background: linear-gradient(135deg, var(--primary), var(--primary-end));
    }
    .course-image-wrapper img {
        width: 100%; height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }
    .course-card:hover .course-image-wrapper img { transform: scale(1.12); }

    .subject-badge {
        position: absolute; top: 18px; right: 18px;
        background: rgba(255,255,255,0.93);
        backdrop-filter: blur(10px);
        padding: 8px 18px;
        border-radius: 100px;
        font-size: 0.82rem; font-weight: 700;
        color: var(--primary);
        display: flex; align-items: center; gap: 7px;
        z-index: 5;
    }

    .course-body {
        padding: 28px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }
    .course-title-link {
        font-size: 1.25rem; font-weight: 800;
        color: #1a1a2e; margin-bottom: 18px;
        display: block; transition: color 0.3s;
        line-height: 1.4;
    }
    .course-title-link:hover { color: var(--primary); }

    .course-meta-grid {
        display: grid; grid-template-columns: 1fr 1fr;
        gap: 10px; margin-bottom: 22px;
        padding-bottom: 18px;
        border-bottom: 2px solid #f0f0f8;
    }
    .meta-badge {
        background: #f8f9ff;
        padding: 12px 16px;
        border-radius: 12px;
        display: flex; align-items: center; gap: 8px;
        font-size: 0.9rem; color: #4a5568; font-weight: 600;
    }
    .meta-badge i { color: var(--primary); }

    .progress-wrapper { margin-top: auto; }
    .progress-header {
        display: flex; justify-content: space-between;
        align-items: center; margin-bottom: 10px;
    }
    .progress-label { font-size: 0.95rem; font-weight: 700; color: #4a5568; }
    .progress-percentage {
        font-size: 1.2rem; font-weight: 800;
        background: linear-gradient(135deg, var(--primary), var(--primary-end));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .progress-track {
        height: 9px; background: #e8eaf6;
        border-radius: 100px; overflow: hidden;
    }
    .progress-bar-fill {
        height: 100%;
        background: linear-gradient(90deg, var(--primary), var(--primary-end));
        border-radius: 100px;
        transition: width 1s cubic-bezier(0.23,1,0.32,1);
    }

    .continue-btn {
        margin-top: 22px; width: 100%; padding: 15px;
        background: linear-gradient(135deg, var(--primary), var(--primary-end));
        color: #fff; border: none; border-radius: 14px;
        font-weight: 700; font-size: 1rem;
        display: flex; align-items: center; justify-content: center; gap: 8px;
        transition: all 0.35s;
        box-shadow: 0 8px 20px rgba(102,126,234,0.3);
        text-decoration: none;
    }
    .continue-btn:hover {
        color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 14px 30px rgba(102,126,234,0.5);
    }

    .empty-state-box {
        text-align: center;
        padding: 90px 40px;
        background: #f8f9ff;
        border-radius: 28px;
        border: 3px dashed #d0d5ff;
    }
    .empty-icon { font-size: 5rem; color: var(--primary); opacity: 0.25; margin-bottom: 20px; display: block; }
    .empty-title { font-size: 1.7rem; font-weight: 800; color: #1a1a2e; margin-bottom: 12px; }
    .empty-text { color: #6b7280; font-size: 1rem; margin-bottom: 24px; }
</style>

{{-- Hero --}}
<div class="hero-header">
    <div class="hero-content">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="hero-title">كورساتي</h1>
                <p class="hero-subtitle">استكمل رحلتك التعليمية وحقق أهدافك</p>
            </div>
            <div class="col-lg-4 text-end">
                <div class="stats-badge">
                    <i class="feather-award"></i>
                    <span>{{ $enrolled->count() }}</span>
                    <span>{{ $enrolled->count() == 1 ? 'كورس' : 'كورسات' }}</span>
                </div>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-4 mb-4">
        <i class="feather-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif
@if(session('info'))
    <div class="alert alert-info alert-dismissible fade show rounded-4 mb-4">
        <i class="feather-info me-2"></i>{{ session('info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

{{-- Courses Grid --}}
<div class="row g-4">
    @forelse ($enrolled as $course)
        @php
            $progress = $course->pivot->progress ?? 0;
        @endphp
        <div class="col-lg-4 col-md-6 col-12">
            <div class="course-card">
                <div class="course-image-wrapper">
                    <span class="subject-badge">
                        <i class="feather-bookmark"></i>
                        {{ $course->subject->name ?? 'عام' }}
                    </span>
                    <a href="{{ route('courses.show', $course->id) }}">
                        <img src="{{ $course->image ? asset('storage/'.$course->image) : asset('assets/images/course/course-01.jpg') }}"
                             alt="{{ $course->title }}">
                    </a>
                </div>

                <div class="course-body">
                    <a href="{{ route('courses.show', $course->id) }}" class="course-title-link">
                        {{ $course->title }}
                    </a>

                    <div class="course-meta-grid">
                        <div class="meta-badge">
                            <i class="feather-user"></i>
                            <span>{{ Str::limit($course->teacher->name ?? 'المدرس', 14) }}</span>
                        </div>
                        <div class="meta-badge">
                            <i class="feather-folder"></i>
                            <span>{{ $course->sections_count ?? 0 }} وحدة</span>
                        </div>
                    </div>

                    <div class="progress-wrapper">
                        <div class="progress-header">
                            <span class="progress-label">نسبة الإنجاز</span>
                            <span class="progress-percentage">{{ $progress }}%</span>
                        </div>
                        <div class="progress-track">
                            <div class="progress-bar-fill" style="width: {{ $progress }}%"></div>
                        </div>
                    </div>

                    <a href="{{ route('courses.show', $course->id) }}" class="continue-btn">
                        <i class="feather-play-circle"></i>
                        <span>متابعة التعلم</span>
                    </a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="empty-state-box">
                <i class="feather-book-open empty-icon"></i>
                <h3 class="empty-title">لا توجد كورسات مسجّلة بعد</h3>
                <p class="empty-text">تصفّح الكورسات المتاحة وأرسل طلب التسجيل</p>
                <a href="{{ route('student.available-courses') }}"
                   class="btn btn-primary rounded-pill px-5 py-3 fw-700">
                    <i class="feather-grid me-2"></i> تصفّح الكورسات المتاحة
                </a>
            </div>
        </div>
    @endforelse
</div>
@endsection
