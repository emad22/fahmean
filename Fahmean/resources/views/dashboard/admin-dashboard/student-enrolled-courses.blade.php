@extends('layout.dashboard')

@php
    $header = 'false';
    $footer = 'false';
@endphp

@section('dashboard-content')
    <style>
        /* Modern Variables */
        :root {
            --gradient-primary: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            --gradient-success: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            --gradient-info: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            --shadow-soft: 0 10px 40px rgba(0,0,0,0.08);
            --shadow-hover: 0 20px 60px rgba(0,0,0,0.15);
        }

        /* Hero Header */
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
            width: 400px;
            height: 400px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            top: -200px;
            right: -100px;
        }

        .hero-header::after {
            content: '';
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(255,255,255,0.08);
            border-radius: 50%;
            bottom: -150px;
            left: -50px;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 800;
            color: white;
            margin-bottom: 10px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .hero-subtitle {
            color: rgba(255,255,255,0.9);
            font-size: 1.3rem;
            font-weight: 400;
        }

        .stats-badge {
            background: white;
            color: #667eea;
            padding: 15px 30px;
            border-radius: 100px;
            font-size: 1.3rem;
            font-weight: 800;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        /* Premium Course Card */
        .course-card {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
            border: 2px solid transparent;
            height: 100%;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .course-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 24px;
            padding: 2px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .course-card:hover::before {
            opacity: 1;
        }

        .course-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 30px 60px rgba(102, 126, 234, 0.3);
        }

        /* Thumbnail */
        .course-image-wrapper {
            height: 240px;
            overflow: hidden;
            position: relative;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .course-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .course-card:hover .course-image-wrapper img {
            transform: scale(1.15) rotate(2deg);
        }

        /* Floating Badge */
        .subject-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(20px);
            padding: 10px 20px;
            border-radius: 100px;
            font-size: 0.85rem;
            font-weight: 700;
            color: #667eea;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            z-index: 10;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Card Body */
        .course-body {
            padding: 30px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .course-title-link {
            font-size: 1.5rem;
            font-weight: 800;
            color: #1a1a2e;
            line-height: 1.4;
            margin-bottom: 20px;
            display: block;
            transition: color 0.3s ease;
        }

        .course-title-link:hover {
            color: #667eea;
        }

        /* Meta Info */
        .course-meta-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 2px solid #f0f0f5;
        }

        .meta-badge {
            background: linear-gradient(135deg, #f8f9ff 0%, #f0f2ff 100%);
            padding: 14px 18px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1rem;
            color: #4a5568;
            font-weight: 600;
        }

        .meta-badge i {
            color: #667eea;
            font-size: 1.1rem;
        }

        /* Progress Section */
        .progress-wrapper {
            margin-top: auto;
        }

        .progress-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }

        .progress-label {
            font-size: 1rem;
            font-weight: 700;
            color: #4a5568;
        }

        .progress-percentage {
            font-size: 1.3rem;
            font-weight: 800;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .progress-track {
            height: 10px;
            background: #e8eaf6;
            border-radius: 100px;
            overflow: hidden;
            position: relative;
        }

        .progress-bar-fill {
            height: 100%;
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            border-radius: 100px;
            position: relative;
            transition: width 1s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .progress-bar-fill::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        /* Action Button */
        .continue-btn {
            margin-top: 25px;
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 16px;
            font-weight: 700;
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
        }

        .continue-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.5);
            color: white;
        }

        /* Empty State */
        .empty-state-box {
            text-align: center;
            padding: 100px 50px;
            background: linear-gradient(135deg, #f8f9ff 0%, #f0f2ff 100%);
            border-radius: 30px;
            border: 3px dashed #d0d5ff;
        }

        .empty-icon {
            font-size: 5rem;
            color: #667eea;
            opacity: 0.3;
            margin-bottom: 25px;
        }

        .empty-title {
            font-size: 1.8rem;
            font-weight: 800;
            color: #1a1a2e;
            margin-bottom: 15px;
        }

        .empty-text {
            font-size: 1.1rem;
            color: #6b7280;
        }
    </style>

    <!-- Hero Header -->
    <div class="hero-header">
        <div class="hero-content">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="hero-title">📚 كورساتي</h1>
                    <p class="hero-subtitle">استكمل رحلتك التعليمية وحقق أهدافك</p>
                </div>
                <div class="col-lg-4 text-end">
                    <div class="stats-badge">
                        <i class="feather-award"></i>
                        <span>{{ $enrolled->count() }}</span>
                        <span>كورس نشط</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Courses Grid -->
    <div class="row g-4">
        @forelse ($enrolled as $course)
            <div class="col-lg-4 col-md-6 col-12">
                <div class="course-card">
                    <!-- Image -->
                    <div class="course-image-wrapper">
                        <span class="subject-badge">
                            <i class="feather-bookmark"></i>
                            {{ $course->subject->name ?? 'عام' }}
                        </span>
                        <a href="{{ route('courses.show', $course->id) }}">
                            <img src="{{ $course->image ? asset('storage/' . $course->image) : asset('assets/images/course/course-01.jpg') }}" alt="{{ $course->title }}">
                        </a>
                    </div>

                    <!-- Body -->
                    <div class="course-body">
                        <a href="{{ route('courses.show', $course->id) }}" class="course-title-link">
                            {{ $course->title }}
                        </a>

                        <!-- Meta Grid -->
                        <div class="course-meta-grid">
                            <div class="meta-badge">
                                <i class="feather-user"></i>
                                <span>{{ Str::limit($course->teacher->name ?? 'المدرس', 12) }}</span>
                            </div>
                            <div class="meta-badge">
                                <i class="feather-folder"></i>
                                <span>{{ $course->sections_count ?? 0 }} وحدة</span>
                            </div>
                        </div>

                        <!-- Progress -->
                        <div class="progress-wrapper">
                            @php
                                $progress = rand(20, 90);
                            @endphp
                            <div class="progress-header">
                                <span class="progress-label">نسبة الإنجاز</span>
                                <span class="progress-percentage">{{ $progress }}%</span>
                            </div>
                            <div class="progress-track">
                                <div class="progress-bar-fill" style="width: {{ $progress }}%"></div>
                            </div>
                        </div>

                        <!-- Button -->
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
                    <h3 class="empty-title">لا توجد كورسات حالياً</h3>
                    <p class="empty-text">سيتم عرض الكورسات المسجلة لك هنا</p>
                </div>
            </div>
        @endforelse
    </div>
@endsection
