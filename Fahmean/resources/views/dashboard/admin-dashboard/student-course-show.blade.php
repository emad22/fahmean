@extends('layout.dashboard')

@php
    $header = 'false';
    $footer = 'false';
@endphp

@section('dashboard-content')
    <style>
        /* Ultra Modern Hero */
        .ultra-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 30px;
            padding: 60px 50px;
            margin-bottom: 40px;
            position: relative;
            overflow: hidden;
        }

        .ultra-hero::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(255,255,255,0.15) 0%, transparent 70%);
            top: -250px;
            right: -100px;
            animation: float 6s ease-in-out infinite;
        }

        .ultra-hero::after {
            content: '';
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            bottom: -200px;
            left: -100px;
            animation: float 8s ease-in-out infinite reverse;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .hero-inner {
            position: relative;
            z-index: 2;
        }

        .course-main-title {
            font-size: 3.2rem;
            font-weight: 900;
            color: white;
            margin-bottom: 25px;
            text-shadow: 0 4px 15px rgba(0,0,0,0.2);
            line-height: 1.2;
        }

        .meta-pills {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .meta-pill {
            background: rgba(255,255,255,0.2);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255,255,255,0.3);
            padding: 14px 28px;
            border-radius: 100px;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.3s ease;
        }

        .meta-pill:hover {
            background: rgba(255,255,255,0.3);
            transform: translateY(-2px);
        }

        .back-btn-hero {
            background: white;
            color: #667eea;
            padding: 14px 30px;
            border-radius: 100px;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .back-btn-hero:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
            color: #667eea;
        }

        /* Featured Image */
        .featured-image-box {
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 25px 60px rgba(0,0,0,0.15);
            margin-bottom: 40px;
            position: relative;
        }

        .featured-image-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.1), rgba(118, 75, 162, 0.1));
            z-index: 1;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .featured-image-box:hover::before {
            opacity: 1;
        }

        .featured-image-box img {
            width: 100%;
            height: 450px;
            object-fit: cover;
            transition: transform 0.7s cubic-bezier(0.23, 1, 0.32, 1);
        }

        .featured-image-box:hover img {
            transform: scale(1.05);
        }

        /* Content Cards */
        .content-card {
            background: white;
            border-radius: 25px;
            padding: 40px;
            margin-bottom: 30px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.06);
            border: 1px solid #f0f0f5;
            transition: all 0.4s ease;
        }

        .content-card:hover {
            box-shadow: 0 20px 60px rgba(102, 126, 234, 0.15);
            transform: translateY(-5px);
        }

        .card-header-custom {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 3px solid #f0f0f5;
        }

        .header-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.3rem;
        }

        .card-title-custom {
            font-size: 1.6rem;
            font-weight: 800;
            color: #1a1a2e;
            margin: 0;
        }

        .description-text {
            font-size: 1.3rem;
            line-height: 2;
            color: #4a5568;
        }

        /* Section Accordion */
        .section-accordion-item {
            background: white;
            border-radius: 20px;
            margin-bottom: 20px;
            overflow: hidden;
            border: 2px solid #f0f0f5;
            transition: all 0.4s ease;
        }

        .section-accordion-item:hover {
            border-color: #667eea;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.1);
        }

        .section-header-btn {
            width: 100%;
            background: linear-gradient(135deg, #f8f9ff 0%, #f0f2ff 100%);
            border: none;
            padding: 25px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .section-header-btn:hover {
            background: linear-gradient(135deg, #e8eaff 0%, #dce0ff 100%);
        }

        .section-header-btn.active {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
        }

        .section-title-area {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .section-icon-box {
            width: 45px;
            height: 45px;
            background: white;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #667eea;
            font-size: 1.2rem;
        }

        .section-header-btn.active .section-icon-box {
            background: rgba(255,255,255,0.2);
            color: white;
        }

        .section-name {
            font-size: 1.4rem;
            font-weight: 800;
            color: #1a1a2e;
        }

        .section-header-btn.active .section-name {
            color: white;
        }

        .lessons-count-badge {
            background: #667eea;
            color: white;
            padding: 8px 18px;
            border-radius: 100px;
            font-size: 0.85rem;
            font-weight: 700;
        }

        .section-header-btn.active .lessons-count-badge {
            background: white;
            color: #667eea;
        }

        .chevron-icon {
            transition: transform 0.3s ease;
        }

        .section-header-btn.active .chevron-icon {
            transform: rotate(180deg);
            color: white;
        }

        /* Lessons List */
        .lessons-container {
            padding: 0;
        }

        .lesson-row {
            padding: 20px 30px;
            border-bottom: 1px solid #f0f0f5;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
        }

        .lesson-row:last-child {
            border-bottom: none;
        }

        .lesson-row:hover {
            background: linear-gradient(90deg, #f8f9ff 0%, transparent 100%);
            padding-left: 40px;
        }

        .lesson-row.has-pdf {
            cursor: pointer;
        }

        .lesson-row.has-pdf:hover {
            background: linear-gradient(90deg, #e8eaff 0%, transparent 100%);
        }

        .lesson-row.has-pdf:hover .lesson-icon-circle {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            transform: scale(1.15);
        }

        .lesson-row:not(.has-pdf) {
            opacity: 0.6;
        }

        .lesson-left {
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .lesson-icon-circle {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #667eea20, #764ba220);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #667eea;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .lesson-row:hover .lesson-icon-circle {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            transform: scale(1.1);
        }

        .lesson-name {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1a1a2e;
        }

        .lesson-duration-tag {
            background: linear-gradient(135deg, #f0f2ff, #e8eaff);
            color: #667eea;
            padding: 8px 20px;
            border-radius: 100px;
            font-size: 0.9rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Empty State */
        .ultra-empty-state {
            text-align: center;
            padding: 100px 60px;
            background: linear-gradient(135deg, #f8f9ff 0%, #f0f2ff 100%);
            border-radius: 30px;
            border: 3px dashed #d0d5ff;
        }

        .empty-icon-ultra {
            font-size: 6rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            opacity: 0.4;
            margin-bottom: 30px;
        }

        .empty-title-ultra {
            font-size: 2rem;
            font-weight: 900;
            color: #1a1a2e;
            margin-bottom: 15px;
        }

        .empty-subtitle-ultra {
            font-size: 1.2rem;
            color: #6b7280;
        }
        .quiz-row:hover {
        background: rgba(var(--color-primary-rgb), 0.08) !important;
    }
    .lesson-row {
        transition: all 0.2s ease;
        cursor: pointer;
    }
    .lesson-row:hover {
        border-right: 4px solid var(--color-primary);
        padding-right: 15px;
    }
</style>

    <!-- Ultra Hero -->
    <div class="ultra-hero">
        <div class="hero-inner">
            <div class="row align-items-center">
                <div class="col-lg-9">
                    <h1 class="course-main-title">{{ $course->title }}</h1>
                    <div class="meta-pills">
                        <div class="meta-pill">
                            <i class="feather-user"></i>
                            <span>{{ $course->teacher->name ?? 'المدرس' }}</span>
                        </div>
                        <div class="meta-pill">
                            <i class="feather-book-open"></i>
                            <span>{{ $course->subject->name ?? 'المادة' }}</span>
                        </div>
                        <div class="meta-pill">
                            <i class="feather-folder"></i>
                            <span>{{ $course->sections->count() }} وحدات دراسية</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 text-end">
                    <a href="{{ route('courses.index') }}" class="back-btn-hero">
                        <i class="feather-arrow-right"></i>
                        <span>رجوع</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Image -->
    <div class="featured-image-box">
        <img src="{{ $course->image ? asset('storage/' . $course->image) : asset('assets/images/course/course-bg-01.jpg') }}" alt="{{ $course->title }}">
    </div>

    <!-- Description Card -->
    @if($course->description)
    <div class="content-card">
        <div class="card-header-custom">
            <div class="header-icon">
                <i class="feather-file-text"></i>
            </div>
            <h3 class="card-title-custom">نبذة عن الكورس</h3>
        </div>
        <p class="description-text">{{ $course->description }}</p>
    </div>
    @endif

    <!-- Course Content Card -->
    <div class="content-card">
        <div class="card-header-custom">
            <div class="header-icon">
                <i class="feather-list"></i>
            </div>
            <h3 class="card-title-custom">محتوى الكورس</h3>
        </div>

        <div class="accordion" id="sectionsAccordion">
            @forelse($course->sections as $index => $section)
                <div class="section-accordion-item">
                    <button class="section-header-btn {{ $index == 0 ? 'active' : '' }}" 
                            type="button" 
                            data-bs-toggle="collapse" 
                            data-bs-target="#section{{ $index }}" 
                            aria-expanded="{{ $index == 0 ? 'true' : 'false' }}">
                        <div class="section-title-area">
                            <div class="section-icon-box">
                                <i class="feather-folder"></i>
                            </div>
                            <span class="section-name">{{ $section->title }}</span>
                            <span class="lessons-count-badge">{{ $section->lessons->count() }} دروس</span>
                        </div>
                        <i class="feather-chevron-down chevron-icon"></i>
                    </button>
                    
                    <div id="section{{ $index }}" 
                         class="collapse {{ $index == 0 ? 'show' : '' }}" 
                         data-bs-parent="#sectionsAccordion">
                        <div class="lessons-container">
                            @foreach($section->lessons as $lesson)
                                <div class="lesson-row {{ $lesson->pdf ? 'has-pdf' : '' }}">
                                    <div class="lesson-left">
                                        <div class="lesson-icon-circle">
                                            @if($lesson->pdf)
                                                <i class="feather-file-text"></i>
                                            @else
                                                <i class="feather-book"></i>
                                            @endif
                                        </div>
                                        @if($lesson->pdf)
                                            @php
                                                $pdfViewerUrl = route('lesson.pdf.viewer', ['path' => $lesson->pdf, 'title' => $lesson->title]);
                                            @endphp
                                            <a href="{{ $pdfViewerUrl }}" class="lesson-name text-decoration-none" style="color: inherit;">
                                                {{ $lesson->title }}
                                                <i class="feather-external-link small ms-2 text-primary"></i>
                                            </a>
                                        @else
                                            <span class="lesson-name">{{ $lesson->title }}</span>
                                        @endif
                                    </div>

                                    <!-- Lesson Quizzes -->
                                    @foreach($lesson->quizzes as $quiz)
                                        <div class="ms-5 mt-2">
                                            <a href="{{ route('student.quizzes.show', [$course->id, $quiz->id]) }}" class="rbt-btn btn-sm btn-border radius-round px-3 py-1 color-primary" style="font-size: 11px;">
                                                <i class="feather-edit-3 me-1"></i> تدريب: {{ $quiz->title }}
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach

                            <!-- Section Quizzes (Monthly/Daily) -->
                            @foreach($section->quizzes as $quiz)
                                @if(!$quiz->lesson_id)
                                    <div class="lesson-row bg-primary-opacity-hover quiz-row" style="background: rgba(var(--color-primary-rgb), 0.03);">
                                        <div class="lesson-left">
                                            <div class="lesson-icon-circle bg-primary color-white">
                                                <i class="feather-award"></i>
                                            </div>
                                            <a href="{{ route('student.quizzes.show', [$course->id, $quiz->id]) }}" class="lesson-name fw-bold text-primary text-decoration-none">
                                                {{ $quiz->title }} ({{ $quiz->type == 'monthly' ? 'امتحان شهر' : 'اختبار' }})
                                            </a>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span class="badge bg-primary text-white radius-10">متاح الآن</span>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            @empty
                <div class="ultra-empty-state">
                    <i class="feather-inbox empty-icon-ultra"></i>
                    <h4 class="empty-title-ultra">لا يوجد محتوى متاح</h4>
                    <p class="empty-subtitle-ultra">سيتم إضافة الدروس قريباً</p>
                </div>
            @endforelse
        </div>
    </div>

    <script>
        // Add active class toggle for accordion buttons
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Bootstrap tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });

            const accordionButtons = document.querySelectorAll('.section-header-btn');
            accordionButtons.forEach(button => {
                button.addEventListener('click', function() {
                    accordionButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                });
            });

            // Make entire lesson row clickable if it has PDF
            const lessonRows = document.querySelectorAll('.lesson-row.has-pdf');
            lessonRows.forEach(row => {
                row.addEventListener('click', function(e) {
                    // Don't trigger if clicking on the link itself
                    if (e.target.tagName !== 'A' && !e.target.closest('a')) {
                        const link = this.querySelector('a');
                        if (link) {
                            link.click();
                        }
                    }
                });
            });
        });
    </script>
@endsection
