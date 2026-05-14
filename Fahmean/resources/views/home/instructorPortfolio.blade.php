@extends('layout.layout')

@php
    $topToBottom = 'true';
    $footer = 'true';
@endphp

@section('content')

    <!-- Start Banner Area -->
    <div class="rbt-banner-area rbt-banner-8 variation-02 bg_image bg_image--14 header-transperent-spacer" data-black-overlay="7">
        <div class="wrapper w-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="inner text-center">
                            <div class="badge-top mb--30">
                                <span class="rbt-badge">أهلاً بك في صفحة المعلم</span>
                            </div>
                            <h1 class="title">أ. <span class="theme-gradient">{{ $teacher->name }}</span></h1>
                            <p class="description">{{ $teacher->headline ?? 'نخبة من كبار معجمي المواد التعليمية في مصر' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Banner Area -->

    <!-- Start About Area -->
    <div class="rbt-about-area bg-color-white rbt-section-gap">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6">
                    <div class="thumbnail">
                        <img class="w-100 radius-10" src="{{ $teacher->profile_image ? asset($teacher->profile_image) : asset('assets/images/about/about-12.jpg') }}" alt="Teacher Images">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="inner pl--50 pl_sm--0 pl_md--0">
                        <div class="section-title text-start">
                            <span class="subtitle bg-coral-opacity">نبذة عن المعلم</span>
                            <h2 class="title">رحلة نجاح مع <br /> أ. <span class="theme-gradient">{{ $teacher->name }}</span></h2>
                        </div>
                        <p class="description mt--30">
                            {{ $teacher->headline ?? 'معلم خبير يسعى دائماً لتبسيط المعلومة ووصول الطالب لأقصى درجات الفهم والإتقان في المادة العلمية، من خلال أحدث الوسائل التعليمية والمتابعة الدقيقة.' }}
                        </p>
                        <!-- Start Feature List  -->
                        <div class="rbt-feature-wrapper mt--40">
                            <div class="rbt-feature feature-style-2 rbt-radius">
                                <div class="icon bg-pink-opacity">
                                    <i class="feather-book"></i>
                                </div>
                                <div class="feature-content">
                                    <h6 class="feature-title">شرح وافٍ ومبسط</h6>
                                    <p class="feature-description">يتم تقديم المحتوى التعليمي بأسلوب شيق يسهل على الطالب استيعاب أصعب النقاط.</p>
                                </div>
                            </div>
                            <div class="rbt-feature feature-style-2 rbt-radius mt--30">
                                <div class="icon bg-primary-opacity">
                                    <i class="feather-monitor"></i>
                                </div>
                                <div class="feature-content">
                                    <h6 class="feature-title">حصص تفاعلية ومسجلة</h6>
                                    <p class="feature-description">إمكانية مشاهدة الحصص في أي وقت مع جودة عالية في الصوت والصورة.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End About Area -->

    <!-- Start Counter Up Area -->
    <div class="rbt-counterup-area bg-gradient-6 rbt-section-gap">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="rbt-counterup style-3">
                        <div class="inner">
                            <div class="content">
                                <h2 class="counter"><span class="odometer" data-count="3000">00</span>+</h2>
                                <span class="subtitle">طالب انضموا إلينا</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="rbt-counterup style-3 border-left-right">
                        <div class="inner">
                            <div class="content">
                                <h2 class="counter"><span class="odometer" data-count="150">00</span>+</h2>
                                <span class="subtitle">فيديو تعليمي متميز</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="rbt-counterup style-3">
                        <div class="inner">
                            <div class="content">
                                <h2 class="counter"><span class="odometer" data-count="100">00</span>%</h2>
                                <span class="subtitle">ضمان الفهم والوصول للهدف</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Counter Up Area -->

    <!-- Start Course Area -->
    <div class="rbt-course-area bg-color-extra2 rbt-section-gap">
        <div class="container">
            <div class="row mb--60">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <span class="subtitle bg-secondary-opacity">كورسات المدرس</span>
                        <h2 class="title">استكشف دوراتنا المتاحة</h2>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                @php
                    $courses = \App\Models\Course::where('teacher_id', $teacher->id)->get();
                @endphp
                @forelse($courses as $course)
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="rbt-card variation-01 rbt-hover">
                        <div class="rbt-card-img">
                            <a href="{{ route('courseDetails', ['id' => $course->id]) }}">
                                <img src="{{ $course->image ? asset($course->image) : asset('assets/images/course/course-01.jpg') }}" alt="{{ $course->title }}">
                            </a>
                        </div>
                        <div class="rbt-card-body">
                            <h4 class="rbt-card-title"><a href="{{ route('courseDetails', ['id' => $course->id]) }}">{{ $course->title }}</a></h4>
                            <p class="rbt-card-text">{{ Str::limit($course->description, 80) }}</p>
                            <div class="rbt-card-bottom">
                                <div class="rbt-price">
                                    <span class="current-price">{{ $course->price }} ج.م</span>
                                </div>
                                <a class="rbt-btn-link" href="{{ route('courseDetails', ['id' => $course->id]) }}">احجز الآن<i class="feather-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <p>لا توجد كورسات متاحة لهذا المعلم حالياً.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
    <!-- End Course Area -->

    <!-- Start Testimonial Area -->
    <div class="rbt-testimonial-area bg-color-white rbt-section-gap">
        <div class="container">
            <div class="row mb--60">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <span class="subtitle bg-primary-opacity">آراء الطلاب</span>
                        <h2 class="title">ماذا يقول طلابنا؟</h2>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 col-12">
                    <div class="rbt-testimonial-box">
                        <div class="inner">
                            <div class="clint-info-wrapper">
                                <div class="client-info">
                                    <h5 class="title">أحمد محمد</h5>
                                    <span>طالب بالصف الثالث الثانوي</span>
                                </div>
                            </div>
                            <div class="description">
                                <p class="subtitle-3">"أفضل تجربة تعليمية مريحة جداً والشرح مبسط لأقصى درجة، قدرت أفهم دروس كنت بعاني فيها."</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 mt_md--30 mt_sm--30">
                    <div class="rbt-testimonial-box">
                        <div class="inner">
                            <div class="clint-info-wrapper">
                                <div class="client-info">
                                    <h5 class="title">سارة علي</h5>
                                    <span>طالبة بالصف الثاني الثانوي</span>
                                </div>
                            </div>
                            <div class="description">
                                <p class="subtitle-3">"المنصة سهلة جداً في التعامل ومستر {{ $teacher->name }} بيوصل المعلومة بشكل ممتاز."</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonial Area -->

@endsection