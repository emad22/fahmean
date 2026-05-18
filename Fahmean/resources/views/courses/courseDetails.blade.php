@extends('layout.layout')

@php
     $footer='true';
     $topToBottom='true';
     $bodyClass='';
@endphp

@section('content')

    <!-- Start Banner Area -->
    <div class="rbt-banner-area rbt-banner-8 variation-02 bg_image bg_image--10 header-transperent-spacer" data-black-overlay="2">
        <div class="wrapper w-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="inner text-center">
                            <h1 class="title text-white" style="font-weight: 800; font-size: 42px; margin-bottom: 15px;">{{ $course->title }}</h1>
                            <p class="description text-white font-system" style="font-size: 20px; font-weight: 500;">
                                {{ $course->level }} @if($course->level && ($course->subject || $course->academic_year)) - @endif {{ $course->subject ? $course->subject->name : $course->academic_year }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner Area -->

    <div class="rbt-course-details-area ptb--60">
        <div class="container">
            <div class="row g-5">

                <div class="col-lg-8 col-md-12">
                    <div class="course-details-content">
                        <!-- Main Course Cover Image -->
                        <div class="rbt-course-feature-box rbt-shadow-box thumbnail mb--30" style="border-radius: 12px; overflow: hidden;">
                            <img class="w-100" src="{{ $course->image ? asset('uploads/' . $course->image) : asset('assets/images/course/course-01.jpg') }}" alt="{{ $course->title }}">
                        </div>

                        <div class="rbt-inner-onepage-navigation sticky-top mt--30 mb--30">
                            <nav class="mainmenu-nav onepagenav">
                                <ul class="mainmenu" style="display: flex; gap: 20px; list-style: none; padding: 0;">
                                    <li class="current">
                                        <a href="#overview">تفاصيل الكورس</a>
                                    </li>
                                    <li>
                                        <a href="#coursecontent">محتوى الكورس</a>
                                    </li>
                                    <li>
                                        <a href="#details">الصف الدراسي</a>
                                    </li>
                                    @if($course->teacher)
                                        <li>
                                            <a href="#intructor">المعلم</a>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>

                        <!-- Start Course Description Box -->
                        <div class="rbt-course-feature-box overview-wrapper rbt-shadow-box mt--30 has-show-more" id="overview">
                            <div class="rbt-course-feature-inner has-show-more-inner-content">
                                <div class="section-title">
                                    <h4 class="rbt-title-style-3" style="font-weight: 700; color: #1f1f25;">وصف الكورس</h4>
                                </div>
                                <div class="description-text font-system" style="font-size: 16px; line-height: 1.8; color: #555;">
                                    {!! $course->description !!}
                                </div>
                            </div>
                            <div class="rbt-show-more-btn">عرض المزيد</div>
                        </div>
                        <!-- End Course Description Box -->

                        <!-- Start Course Content -->
                        <div class="course-content rbt-shadow-box coursecontent-wrapper mt--30" id="coursecontent">
                            <div class="rbt-course-feature-inner">
                                <div class="section-title mb--20">
                                    <h4 class="rbt-title-style-3" style="font-weight: 700; color: #1f1f25;">محتوى الكورس</h4>
                                </div>
                                <div class="rbt-accordion-style rbt-accordion-02 accordion">
                                    <div class="accordion" id="accordionExampleb2">
                                        @forelse($course->sections as $index => $section)
                                            <div class="accordion-item card" style="border: 1px solid #eef2f6; border-radius: 8px; margin-bottom: 12px; overflow: hidden; box-shadow: 0 2px 6px rgba(0,0,0,0.02);">
                                                <h2 class="accordion-header card-header" id="heading-{{ $section->id }}">
                                                    <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $section->id }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse-{{ $section->id }}" style="font-weight: 600; font-size: 16px; padding: 18px 20px; background-color: #f8fafc;">
                                                        {{ $section->title }} 
                                                        <span class="rbt-badge-5 ml--10" style="background-color: #e2e8f0; color: #475569; font-size: 12px; padding: 3px 10px; border-radius: 20px; margin-right: auto; margin-left: 10px;">
                                                            {{ $section->lessons->count() }} درس
                                                        </span>
                                                    </button>
                                                </h2>
                                                <div id="collapse-{{ $section->id }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading-{{ $section->id }}" data-bs-parent="#accordionExampleb2">
                                                    <div class="accordion-body card-body pr--0" style="padding: 10px 20px;">
                                                        <ul class="rbt-course-main-content liststyle" style="padding: 0; list-style: none;">
                                                            @forelse($section->lessons as $lesson)
                                                                <li style="border-bottom: 1px solid #f1f5f9; padding: 12px 0; display: flex; justify-content: space-between; align-items: center;">
                                                                    <div class="course-content-left" style="display: flex; align-items: center; gap: 10px;">
                                                                        <i class="feather-play-circle" style="color: var(--color-primary); font-size: 18px;"></i>
                                                                        <span class="text" style="font-size: 15px; color: #334155; font-weight: 500;">{{ $lesson->title }}</span>
                                                                    </div>
                                                                    <div class="course-content-right" style="display: flex; align-items: center; gap: 15px;">
                                                                        @if($lesson->duration)
                                                                            <span class="min-lable" style="font-size: 12px; color: #64748b; background-color: #f1f5f9; padding: 2px 8px; border-radius: 4px;">{{ $lesson->duration }} دقيقة</span>
                                                                        @endif
                                                                        <span class="course-lock"><i class="feather-lock" style="color: #94a3b8;"></i></span>
                                                                    </div>
                                                                </li>
                                                            @empty
                                                                <li class="text-center p-3 text-muted">لا يوجد دروس في هذا القسم بعد.</li>
                                                            @endforelse

                                                            @foreach($section->quizzes as $quiz)
                                                                <li style="border-bottom: 1px solid #f1f5f9; padding: 12px 0; display: flex; justify-content: space-between; align-items: center;">
                                                                    <div class="course-content-left" style="display: flex; align-items: center; gap: 10px;">
                                                                        <i class="feather-help-circle" style="color: #ec4899; font-size: 18px;"></i>
                                                                        <span class="text" style="font-size: 15px; color: #334155; font-weight: 500;">اختبار: {{ $quiz->title }}</span>
                                                                    </div>
                                                                    <div class="course-content-right" style="display: flex; align-items: center; gap: 15px;">
                                                                        <span class="course-lock"><i class="feather-lock" style="color: #94a3b8;"></i></span>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="text-center p-5 text-muted">لم يتم إضافة أقسام أو دروس لهذا الكورس بعد.</div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Course Content -->

                        <!-- Start Course Grade Section -->
                        <div class="rbt-course-feature-box rbt-shadow-box details-wrapper mt--30" id="details">
                            <div class="row g-5">
                                <div class="col-lg-12">
                                    <div class="section-title">
                                        <h4 class="rbt-title-style-3 mb--20" style="font-weight: 700;">الصف الدراسي</h4>
                                    </div>
                                    <div class="font-system" style="font-size: 18px; line-height: 1.8; color: var(--color-primary); font-weight: 700; display: flex; align-items: center; gap: 10px;">
                                        <i class="feather-bookmark" style="font-size: 22px;"></i>
                                        <span>{{ ($course->subject && $course->subject->grade) ? $course->subject->grade->name : ($course->academic_year ?? 'غير محدد') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Course Grade Section -->

                        <!-- Start Instructor Area -->
                        @if($course->teacher)
                            <div class="rbt-instructor rbt-shadow-box intructor-wrapper mt--30" id="intructor">
                                <div class="about-author border-0 pb--0 pt--0">
                                    <div class="section-title mb--30">
                                        <h4 class="rbt-title-style-3" style="font-weight: 700;">معلم الكورس</h4>
                                    </div>
                                    <div class="media align-items-center d-flex flex-column flex-md-row gap-4">
                                        <div class="thumbnail">
                                            <a href="{{ route('instructorPortfolio', $course->teacher->id) }}">
                                                <img src="{{ $course->teacher->profile_image ? asset('uploads/' . $course->teacher->profile_image) : asset('assets/images/team/team-07.jpg') }}" alt="{{ $course->teacher->name }}" style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover;">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <div class="author-info">
                                                <h5 class="title mb--5">
                                                    <a class="hover-flip-item-wrapper" href="{{ route('instructorPortfolio', $course->teacher->id) }}" style="font-weight: 700; color: #1f1f25; font-size: 20px;">أ. {{ $course->teacher->name }}</a>
                                                </h5>
                                                <span class="subtitle d-block mb--15" style="color: var(--color-primary); font-weight: 500; font-size: 14px;">{{ $course->teacher->headline ?? 'معلم المواد التعليمية' }}</span>
                                            </div>
                                            <div class="content">
                                                <p class="description font-system" style="font-size: 15px; color: #64748b; line-height: 1.6;">{{ $course->teacher->bio ?? '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!-- End Instructor Area -->

                    </div>
                </div>

                <!-- Right Floating Sidebar Card -->
                <div class="col-lg-4 col-md-12">
                    <div class="course-sidebar sticky-top rbt-shadow-box course-sidebar-top rbt-gradient-border" style="top: 100px; margin-top: 0px !important;">
                        <div class="inner" style="padding: 24px;">

                            <!-- Sidebar Course Media -->
                            @if($course->video_url)
                                <a class="video-popup-with-text video-popup-wrapper text-center popup-video sidebar-video-hidden mb--25" href="{{ $course->video_url }}" style="display: block; position: relative; border-radius: 8px; overflow: hidden;">
                                    <div class="video-content">
                                        <img class="w-100 rbt-radius" src="{{ $course->image ? asset('uploads/' . $course->image) : asset('assets/images/course/course-01.jpg') }}" alt="{{ $course->title }}" style="object-fit: cover; height: 200px;">
                                        <div class="position-to-top" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2;">
                                            <span class="rbt-btn rounded-player-2 with-animation">
                                                <span class="play-icon"></span>
                                            </span>
                                        </div>
                                        <span class="play-view-text d-block color-white" style="position: absolute; bottom: 10px; width: 100%; text-align: center; color: white; background: rgba(0,0,0,0.5); padding: 5px 0;"><i class="feather-eye"></i> شاهد الفيديو التعريفي</span>
                                    </div>
                                </a>
                            @else
                                <div class="text-center mb--25" style="border-radius: 8px; overflow: hidden;">
                                    <img class="w-100 rbt-radius" src="{{ $course->image ? asset('uploads/' . $course->image) : asset('assets/images/course/course-01.jpg') }}" alt="{{ $course->title }}" style="object-fit: cover; height: 200px;">
                                </div>
                            @endif

                            <div class="content-item-content">
                                <!-- Price and Academic Year Badge -->
                                <div class="rbt-price-wrapper d-flex align-items-center justify-content-between mb--20" style="flex-wrap: wrap; gap: 10px;">
                                    <div class="rbt-price">
                                        @if($course->price == 0)
                                            <span class="current-price" style="font-size: 22px; font-weight: 800; color: #10b981;">هذا الكورس مجاني</span>
                                        @else
                                            <span class="current-price" style="font-size: 26px; font-weight: 800; color: var(--color-primary);">{{ $course->price }} ج.م</span>
                                        @endif
                                    </div>
                                    @if(($course->subject && $course->subject->grade) || $course->academic_year)
                                        <div class="discount-time">
                                            <span class="rbt-badge color-primary bg-color-primary-opacity" style="font-size: 14px; padding: 6px 14px; font-weight: 700; border-radius: 8px;">
                                                {{ ($course->subject && $course->subject->grade) ? $course->subject->grade->name : $course->academic_year }}
                                            </span>
                                        </div>
                                    @endif
                                </div>

                                <!-- Center-aligned Teacher Link -->
                                @if($course->teacher)
                                    <div class="text-center mb--25" style="background: #f8fafc; padding: 15px; border-radius: 8px; border: 1px solid #f1f5f9;">
                                        <span class="subtitle d-block mb--5" style="color: #64748b; font-size: 13px; font-weight: 500;">مقدم الكورس</span>
                                        <h5 class="title mb--0">
                                            <a href="{{ route('instructorPortfolio', $course->teacher->id) }}" style="color: #1f1f25; font-weight: 700; font-size: 16px;">أ. {{ $course->teacher->name }}</a>
                                        </h5>
                                    </div>
                                @endif

                                <!-- Styled Subscribe Action Button -->
                                <div class="subscribe-btn-wrapper mt--20">
                                    <a class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100 justify-content-center text-center fahmean-header-btn fahmean-header-btn-primary" href="{{ route('checkout', ['id' => $course->id]) }}" style="border-radius: 8px; font-size: 16px; font-weight: 700; height: 56px; display: inline-flex; align-items: center; justify-content: center; gap: 10px; width: 100%;">
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text">اشترك الآن !</span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </span>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Start Course Action Bottom -->
    <div class="rbt-course-action-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="section-title text-center text-md-start">
                        <h5 class="title mb--0" style="font-weight: 700; font-size: 18px;">{{ $course->title }}</h5>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12 mt_sm--15">
                    <div class="course-action-bottom-right rbt-single-group" style="display: flex; gap: 20px; align-items: center; justify-content: flex-end;">
                        <div class="rbt-single-list rbt-price large-size justify-content-center">
                            @if($course->price == 0)
                                <span class="current-price color-primary" style="font-weight: 700;">هذا الكورس مجاني</span>
                            @else
                                <span class="current-price color-primary" style="font-weight: 700;">{{ $course->price }} ج.م</span>
                            @endif
                        </div>
                        <div class="rbt-single-list action-btn">
                            <a class="rbt-btn btn-gradient hover-icon-reverse btn-md" href="{{ route('checkout', ['id' => $course->id]) }}">
                                <span class="icon-reverse-wrapper">
                                    <span class="btn-text">اشترك الآن</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Course Action Bottom -->
     
    <x-separator/>
    
@endsection
