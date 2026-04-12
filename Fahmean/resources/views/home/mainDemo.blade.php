@extends('layout.layout')

@php
     $topToBottom='true';
@endphp

@section('content')

    <!-- Mobile Menu Section -->
    <div class="popup-mobile-menu">
        <div class="inner-wrapper">
            <div class="inner-top">
                <div class="content">
                    <div class="logo">
                        <div class="logo logo-dark">
                            <a href="#">
                                <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Education Logo Images">
                            </a>
                        </div>

                        <div class="logo d-none logo-light">
                            <a href="#">
                                <img src="{{ asset('assets/images/dark/logo/logo-light.png') }}" alt="Education Logo Images">
                            </a>
                        </div>
                    </div>
                    <div class="rbt-btn-close">
                        <button class="close-button rbt-round-btn"><i class="feather-x"></i></button>
                    </div>
                </div>
                <p class="description">Histudy is a education website template. You can customize all.</p>
                <ul class="navbar-top-left rbt-information-list justify-content-start">
                    <li>
                        <a href="mailto:hello@example.com"><i class="feather-mail"></i>example@gmail.com</a>
                    </li>
                    <li>
                        <a href="#"><i class="feather-phone"></i>(302) 555-0107</a>
                    </li>
                </ul>
            </div>

            <nav class="mainmenu-nav">
                <ul class="mainmenu">
                    <li class="with-megamenu has-menu-child-item position-static">
                        <a href="#">الرئيسية <i class="feather-chevron-down"></i></a>
                        <!-- Start Mega Menu  -->
                        <div class="rbt-megamenu menu-skin-dark">
                            <div class="wrapper">
                                <div class="row row--15 home-plesentation-wrapper single-dropdown-menu-presentation">

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('mainDemo') }}"><img src="{{ asset('assets/images/splash/demo/h1.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('mainDemo') }}">Home Demo <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('marketplace') }}"><img src="{{ asset('assets/images/splash/demo/h12.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('marketplace') }}">Marketplace <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('kindergarten') }}"><img src="{{ asset('assets/images/splash/demo/h4.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('kindergarten') }}">kindergarten <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('universityClassic') }}"><img src="{{ asset('assets/images/splash/demo/h13.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('universityClassic') }}">University Classic <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('homeElegant') }}"><img src="{{ asset('assets/images/splash/demo/h14.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('homeElegant') }}">Home Elegant <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('gymCoaching') }}"><img src="{{ asset('assets/images/splash/demo/h9.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('gymCoaching') }}">Gym Coaching <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('onlineSchool') }}"><img src="{{ asset('assets/images/splash/demo/h3.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('onlineSchool') }}">Online School <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('universityStatus') }}"><img src="{{ asset('assets/images/splash/demo/h6.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('universityStatus') }}">University Status <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('homeTechnology') }}"><img src="{{ asset('assets/images/splash/demo/h15.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('homeTechnology') }}">Home Technology <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('teacherPortfolio') }}"><img src="{{ asset('assets/images/splash/demo/h7.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('teacherPortfolio') }}">teacher Portfolio <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('languageAcademy') }}"><img src="{{ asset('assets/images/splash/demo/h8.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('languageAcademy') }}">المهارات اللغوية <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('singleCourse') }}"><img src="{{ asset('assets/images/splash/demo/h11.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('singleCourse') }}">Single Course <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('onlineCourse') }}"><img src="{{ asset('assets/images/splash/demo/h10.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('onlineCourse') }}">Online Course <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('classicLms') }}"><img src="{{ asset('assets/images/splash/demo/h5.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('classicLms') }}">Classic Lms <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('courseSchool') }}"><img src="{{ asset('assets/images/splash/demo/h2.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('courseSchool') }}">Course School <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('udemyAffiliate') }}"><img src="{{ asset('assets/images/splash/demo/h16.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('udemyAffiliate') }}">Udemy Affiliate <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('onlineAcademy') }}"><img src="{{ asset('assets/images/splash/demo/h17.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('onlineAcademy') }}">Online Academy <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('teachersCoaches') }}"><img src="{{ asset('assets/images/splash/demo/h18.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('teachersCoaches') }}">teacher Coaches <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('modernUniversity') }}"><img src="{{ asset('assets/images/splash/demo/h19.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('modernUniversity') }}">Modern University <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('multilingual') }}"><img src="{{ asset('assets/images/splash/demo/h20.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('multilingual') }}">Multilingual <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('artDesignSchool') }}"><img src="{{ asset('assets/images/splash/demo/h21.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('artDesignSchool') }}">Art Design School <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('wishlist') }}"><img src="{{ asset('assets/images/splash/demo/h22.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('wishlist') }}">Wishlist <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('coaching') }}"><img src="{{ asset('assets/images/splash/demo/h23.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('coaching') }}">Coaching <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('healthWellnessInstitute') }}"><img src="{{ asset('assets/images/splash/demo/h24.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('healthWellnessInstitute') }}">Health Institute <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('lifeCoach') }}"><img src="{{ asset('assets/images/splash/demo/h25.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('lifeCoach') }}">Life Coach <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                    <!-- Start Single Demo  -->
                                    <div class="col-lg-12 col-xl-2 col-xxl-2 col-md-12 col-sm-12 col-12 single-mega-item">
                                        <div class="demo-single">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="{{ route('islamicCenter') }}"><img src="{{ asset('assets/images/splash/demo/h26.jpg') }}" alt="Demo Images"></a>
                                                </div>
                                                <div class="content">
                                                    <h4 class="title"><a href="{{ route('islamicCenter') }}">Islamic Center <span class="btn-icon"><i class="feather-arrow-right"></i></span></a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Demo  -->

                                </div>

                                <div class="load-demo-btn-wrap">
                                    <div class="load-demo-btn text-center">
                                        <span class="color-white b3">Scroll to view more <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-up" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M11.5 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L11 2.707V14.5a.5.5 0 0 0 .5.5zm-7-14a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L4 13.293V1.5a.5.5 0 0 1 .5-.5z"/>
                              </svg></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Mega Menu  -->
                    </li>

                    <li class="with-megamenu has-menu-child-item">
                        <a href="#">دروسنا <i class="feather-chevron-down"></i></a>
                        <!-- Start Mega Menu  -->
                        <div class="rbt-megamenu grid-item-2">
                            <div class="wrapper">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mega-top-banner">
                                            <div class="content">
                                                <h4 class="title">Developer hub</h4>
                                                <p class="description">Start building fast, with code samples, key resources and more.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row row--15">
                                    <div class="col-lg-12 col-xl-6 col-xxl-6 single-mega-item">
                                        <h3 class="rbt-short-title">Course Layout</h3>
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('courseFilterOneToggle') }}">Filter One Toggle</a></li>
                                            <li><a href="{{ route('courseFilterOneOpen') }}">Filter One Open</a></li>
                                            <li><a href="{{ route('courseFilterTwoToggle') }}">Filter Two Toggle</a></li>
                                            <li><a href="{{ route('courseFilterTwoOpen') }}">Filter Two Open</a></li>
                                            <li><a href="{{ route('courseWithTab') }}">Course With Tab</a></li>
                                            <li><a href="{{ route('courseWithTabTwo') }}">Course With Tab Two</a></li>
                                            <li><a href="{{ route('courseCard2') }}">Course Card Two</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-12 col-xl-6 col-xxl-6 single-mega-item">
                                        <h3 class="rbt-short-title">Course Layout</h3>
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('courseCard3') }}">Course Card Three</a></li>
                                            <li><a href="{{ route('courseMasonry') }}">Course Masonry</a></li>
                                            <li><a href="{{ route('courseWithSidebar') }}">Course With Sidebar</a></li>
                                            <li><a href="{{ route('courseDetails') }}">Course Details</a></li>
                                            <li><a href="{{ route('courseDetails2') }}">Course Details Two</a></li>
                                            <li><a href="{{ route('lesson') }}">Course Lesson <span class="rbt-badge-card">New</span></a></li>
                                            <li><a href="{{ route('createCourse') }}">Create Course <span class="rbt-badge-card">New</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <ul class="nav-quick-access">
                                            <li><a href="#"><i class="feather-folder-minus"></i> Quick Start Guide</a></li>
                                            <li><a href="#"><i class="feather-folder-minus"></i> For Open Source</a></li>
                                            <li><a href="#"><i class="feather-folder-minus"></i> API Status</a></li>
                                            <li><a href="#"><i class="feather-folder-minus"></i> Support</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Mega Menu  -->
                    </li>

                    <li class="has-dropdown has-menu-child-item">
                        <a href="#">لوحة التحكم
                            <i class="feather-chevron-down"></i>
                        </a>
                        <ul class="submenu">
                            <li class="has-dropdown"><a href="#">teacher Dashboard</a>
                                <ul class="submenu">
                                    <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                    <li><a href="{{ route('teacher.profile') }}">Profile</a></li>
                                    <li><a href="{{ route('teacher.enrolled-courses') }}">Enrolled Courses</a></li>
                                    <li><a href="{{ route('teacher.wishlist') }}">Wishlist</a></li>
                                    <li><a href="{{ route('teacher.reviews') }}">Reviews</a></li>
                                    <li><a href="{{ route('teacher.my-quiz-attempts') }}">My Quiz Attempts</a></li>
                                    <li><a href="{{ route('teacher.order-history') }}">Order History</a></li>
                                    <li><a href="{{ route('teacher.courses.index') }}">My Course</a></li>
                                    <li><a href="{{ route('teacher.announcements') }}">Announcements</a></li>
                                    <li><a href="{{ route('teacher.quiz-attempts') }}">Quiz Attempts</a></li>
                                    <li><a href="{{ route('teacher.assignments') }}">Assignments</a></li>
                                    <li><a href="{{ route('teacher.settings') }}">Settings</a></li>
                                </ul>
                            </li>
                            <li class="has-dropdown"><a href="#">Student Dashboard</a>
                                <ul class="submenu">
                                    <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                                    <li><a href="{{ route('student.profile') }}">Profile</a></li>
                                    <li><a href="{{ route('student.enrolled-courses') }}">Enrolled Courses</a></li>
                                    <li><a href="{{ route('student.wishlist') }}">Wishlist</a></li>
                                    <li><a href="{{ route('student.reviews') }}">Reviews</a></li>
                                    <li><a href="{{ route('student.my-quiz-attempts') }}">My Quiz Attempts</a></li>
                                    <li><a href="{{ route('student.order-history') }}">Order History</a></li>
                                    <li><a href="{{ route('student.settings') }}">Settings</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="with-megamenu has-menu-child-item position-static">
                        <a href="#">الصفحات <i class="feather-chevron-down"></i></a>
                        <!-- Start Mega Menu  -->
                        <div class="rbt-megamenu grid-item-4">
                            <div class="wrapper">
                                <div class="row row--15">
                                    <div class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item">
                                        <h3 class="rbt-short-title">Get Started</h3>
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('aboutus01') }}">About Us</a></li>
                                            <li><a href="{{ route('aboutus02') }}">About Us 02</a></li>
                                            <li><a href="{{ route('eventGrid') }}">Event Grid</a></li>
                                            <li><a href="{{ route('eventList') }}">Event List</a></li>
                                            <li><a href="{{ route('eventSidebar') }}">Event Sidebar</a></li>
                                            <li><a href="{{ route('eventDetails') }}">Event Details</a></li>
                                            <li><a href="{{ route('academyGallery') }}">Academy Gallery</a></li>
                                            <li><a href="{{ route('admissionGuide') }}">Admission Guide</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item">
                                        <h3 class="rbt-short-title">Get Started</h3>
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('profile') }}">Profile</a></li>
                                            <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                            <li><a href="{{ route('becomeTeacher') }}">Become a Teacher</a></li>
                                            
                                            <li><a href="{{ route('faqs') }}">FAQS</a></li>
                                            <li><a href="{{ route('privacyPolicy') }}">Privacy Policy</a></li>
                                            <li><a href="{{ route('pageError') }}">404 Page</a></li>
                                            <li><a href="{{ route('maintenance') }}">Maintenance</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item">
                                        <h3 class="rbt-short-title">Shop Pages</h3>
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('shop') }}">Shop <span class="rbt-badge-card">Sale Anything</span></a></li>
                                            <li><a href="{{ route('singleProduct') }}">Single Product</a></li>
                                            <li><a href="{{ route('cart') }}">Cart Page</a></li>
                                            <li><a href="{{ route('checkout') }}">Checkout</a></li>
                                            <li><a href="{{ route('wishlist') }}">Wishlist Page</a></li>
                                            <li><a href="{{ route('myAccount') }}">My Acount</a></li>
                                            <li><a href="{{ route('login') }}">Login & Register</a></li>
                                            <li><a href="{{ route('subscription') }}">Subscription</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item">
                                        <div class="mega-category-item">
                                            <!-- Start Single Category  -->
                                            <div class="nav-category-item">
                                                <div class="thumbnail">
                                                    <div class="image"><img src="{{ asset('assets/images/course/category-2.png') }}" alt="Course images"></div>
                                                    <a href="{{ route('courseFilterOneToggle') }}">
                                                        <span>Online Education</span>
                                                        <i class="feather-chevron-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- End Single Category  -->

                                            <!-- Start Single Category  -->
                                            <div class="nav-category-item">
                                                <div class="thumbnail">
                                                    <div class="image"><img src="{{ asset('assets/images/course/category-1.png') }}" alt="Course images"></div>
                                                    <a href="{{ route('courseFilterOneToggle') }}">
                                                        <span>Language Club</span>
                                                        <i class="feather-chevron-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- End Single Category  -->

                                            <!-- Start Single Category  -->
                                            <div class="nav-category-item">
                                                <div class="thumbnail">
                                                    <div class="image"><img src="{{ asset('assets/images/course/category-4.png') }}" alt="Course images"></div>
                                                    <a href="{{ route('courseFilterOneToggle') }}">
                                                        <span>University Status</span>
                                                        <i class="feather-chevron-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- End Single Category  -->

                                            <!-- Start Single Category  -->
                                            <div class="nav-category-item">
                                                <div class="thumbnail">
                                                    <a href="{{ route('courseFilterOneToggle') }}">
                                                        <span>Course School</span>
                                                        <i class="feather-chevron-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- End Single Category  -->

                                            <!-- Start Single Category  -->
                                            <div class="nav-category-item">
                                                <div class="thumbnail">
                                                    <div class="image"><img src="{{ asset('assets/images/course/category-9.png') }}" alt="Course images"></div>
                                                    <a href="{{ route('courseFilterOneToggle') }}">
                                                        <span>Academy</span>
                                                        <i class="feather-chevron-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- End Single Category  -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Mega Menu  -->
                    </li>

                    <li class="with-megamenu has-menu-child-item position-static">
                        <a href="#">العناصر <i class="feather-chevron-down"></i></a>
                        <!-- Start Mega Menu  -->
                        <div class="rbt-megamenu grid-item-3">
                            <div class="wrapper">
                                <div class="row row--15 single-dropdown-menu-presentation">
                                    <div class="col-lg-4 col-xxl-4 single-mega-item">
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('styleGuide') }}">Style Guide <span class="rbt-badge-card">Hot</span></a></li>
                                            <li><a href="{{ route('accordion') }}">Accordion</a></li>
                                            <li><a href="{{ route('advancetab') }}">Advance Tab</a></li>
                                            <li><a href="{{ route('about') }}">About <span class="rbt-badge-card">New</span></a></li>
                                            <li><a href="{{ route('brand') }}">Brand</a></li>
                                            <li><a href="{{ route('button') }}">Button</a></li>
                                            <li><a href="{{ route('badge') }}">Badge</a></li>
                                            <li><a href="{{ route('card') }}">Card</a></li>
                                            <li><a href="#">& More Coming</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-4 col-xxl-4 single-mega-item">
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('callToAction') }}">Call To Action</a></li>
                                            <li><a href="{{ route('counterup') }}">Counter</a></li>
                                            <li><a href="{{ route('category') }}">Categories</a></li>
                                            <li><a href="{{ route('header') }}">Header Style</a></li>
                                            <li><a href="{{ route('newsletter') }}">Newsletter</a></li>
                                            <li><a href="{{ route('team') }}">Team</a></li>
                                            <li><a href="{{ route('social') }}">Social</a></li>
                                            <li><a href="{{ route('listStyle') }}">List Style</a></li>
                                            <li><a href="#">& More Coming</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-4 col-xxl-4 single-mega-item">
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('gallery') }}">Gallery</a></li>
                                            <li><a href="{{ route('pricing') }}">Pricing</a></li>
                                            <li><a href="{{ route('progressbar') }}">Progressbar</a></li>
                                            <li><a href="{{ route('testimonial') }}">Testimonial</a></li>
                                            <li><a href="{{ route('service') }}">Service</a></li>
                                            <li><a href="{{ route('split') }}">Split Area</a></li>
                                            <li><a href="{{ route('search') }}">Search Style</a></li>
                                            <li><a href="{{ route('instagram') }}">Instagram Style</a></li>
                                            <li><a href="#">& More Coming</a></li>
                                        </ul>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="btn-wrapper">
                                            <a class="rbt-btn btn-gradient hover-icon-reverse square btn-xl w-100 text-center mt--30 hover-transform-none" href="#">
                                                <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Visit Histudy Template</span>
                                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Mega Menu  -->
                    </li>

                    <li class="with-megamenu has-menu-child-item position-static">
                        <a href="#">الأخبار <i class="feather-chevron-down"></i></a>
                        <!-- Start Mega Menu  -->
                        <div class="rbt-megamenu grid-item-3">
                            <div class="wrapper">
                                <div class="row row--15">
                                    <div class="col-lg-12 col-xl-4 col-xxl-4 single-mega-item">
                                        <h3 class="rbt-short-title">Blog Styles</h3>
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('blogList') }}">Blog List</a></li>
                                            <li><a href="{{ route('blog') }}">Blog Grid</a></li>
                                            <li><a href="{{ route('blogGridMinimal') }}">Blog Grid Minimal</a></li>
                                            <li><a href="{{ route('blogWithSidebar') }}">Blog With Sidebar</a></li>
                                            <li><a href="{{ route('blogDetails') }}">Blog Details</a></li>
                                            <li><a href="{{ route('postFormatStandard') }}">Post Format Standard</a></li>
                                            <li><a href="{{ route('postFormatGallery') }}">Post Format Gallery</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-12 col-xl-4 col-xxl-4 single-mega-item">
                                        <h3 class="rbt-short-title">Get Started</h3>
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('postFormatQuote') }}">Post Format Quote</a></li>
                                            <li><a href="{{ route('postFormatAudio') }}">Post Format Audio</a></li>
                                            <li><a href="{{ route('postFormatVideo') }}">Post Format Video</a></li>
                                            <li><a href="#">Media Under Title <span class="rbt-badge-card">Coming</span></a></li>
                                            <li><a href="#">Sticky Sidebar <span class="rbt-badge-card">Coming</span></a></li>
                                            <li><a href="#">Auto Masonry <span class="rbt-badge-card">Coming</span></a></li>
                                            <li><a href="#">Meta Overlaid <span class="rbt-badge-card">Coming</span></a></li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-12 col-xl-4 col-xxl-4 single-mega-item">
                                        <div class="rbt-ads-wrapper">
                                            <a class="d-block" href="#"><img src="{{ asset('assets/images/service/mobile-cat.jpg') }}" alt="Education Images"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Mega Menu  -->
                    </li>
                </ul>
            </nav>

            <div class="mobile-menu-bottom">
                <div class="rbt-btn-wrapper mb--20">
                    <a class="rbt-btn btn-border-gradient radius-round btn-sm hover-transform-none w-100 justify-content-center text-center" href="#">
                        <span>Enroll Now</span>
                    </a>
                </div>

                <div class="social-share-wrapper">
                    <span class="rbt-short-title d-block">Find With Us</span>
                    <ul class="social-icon social-default transparent-with-border justify-content-start mt--20">
                        <li><a href="https://www.facebook.com/">
                                <i class="feather-facebook"></i>
                            </a>
                        </li>
                        <li><a href="https://www.twitter.com">
                                <i class="feather-twitter"></i>
                            </a>
                        </li>
                        <li><a href="https://www.instagram.com/">
                                <i class="feather-instagram"></i>
                            </a>
                        </li>
                        <li><a href="https://www.linkdin.com/">
                                <i class="feather-linkedin"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <!-- Start Side Vav -->
    <x-sideVav/>
    <!-- End Side Vav -->

    <a class="close_side_menu" href="javascript:void(0);"></a>

    <main class="rbt-main-wrapper">
        <!-- Start Banner Area -->
        <div class="rbt-banner-area rbt-banner-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 pb--120 pt--70">
                        <div class="content">
                            <div class="inner">
                                <div class="rbt-new-badge rbt-new-badge-one">
                                    <span class="rbt-new-badge-icon">🏆</span> هتفهما صح وهتوصل لما تريد
                                </div>

                                <h1 class="title">
                                    فاهمين<img src="{{ asset('assets/images/banner/title-h-1.png') }}" style="vertical-align: bottom;"> وحط خط <br> تحت كلمة <img src="{{ asset('assets/images/banner/title-h-2.png') }}">
                                </h1>
                                <p class="description">
                                    أقوى منصة تعليمية للمواد الأدبية واللغة الإنجليزية.. شرح مبسط، متابعة دقيقة، 
                                    <strong>ونتائج مضمونة.</strong>
                                </p>
                                <div class="slider-btn">
                                    <a class="rbt-btn btn-gradient hover-icon-reverse" href="#">
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text">ابدأ الفهم الصح الآن</span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="shape-wrapper" id="scene">
                                <img src="{{ asset('assets/images/banner/banner-01.png') }}" alt="Hero Image">
                                <div class="hero-bg-shape-1 layer" data-depth="0.4">
                                    <img src="{{ asset('assets/images/shape/shape-01.png') }}" alt="Hero Image Background Shape">
                                </div>
                                <div class="hero-bg-shape-2 layer" data-depth="0.4">
                                    <img src="{{ asset('assets/images/shape/shape-02.png') }}" alt="Hero Image Background Shape">
                                </div>
                            </div>

                            <div class="banner-card pb--60 mb--50 swiper rbt-dot-bottom-center banner-swiper-active">
                                <div class="swiper-wrapper">

                                    <!-- Start Single Card  -->
                                    <div class="swiper-slide">
                                        <div class="rbt-card variation-01 rbt-hover">
                                            <div class="rbt-card-img">
                                                <a href="{{ route('courseDetails') }}">
                                                    <img src="{{ asset('assets/images/course/course-01.jpg') }}" alt="Card image">
                                                    <div class="rbt-badge-3">
                                                        <span>-40%</span>
                                                        <span>Off</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="rbt-card-body">
                                                <ul class="rbt-meta">
                                                    <li><i class="feather-book"></i>12 Lessons</li>
                                                    <li><i class="feather-users"></i>50 Students</li>
                                                </ul>
                                                <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">React</a>
                                                </h4>
                                                <p class="rbt-card-text">It is a long established fact that a reader
                                                    will be distracted.</p>
                                                <div class="rbt-review">
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <span class="rating-count"> (15 تقييم)</span>
                                                </div>
                                                <div class="rbt-card-bottom">
                                                    <div class="rbt-price">
                                                        <span class="current-price">$70</span>
                                                        <span class="off-price">$120</span>
                                                    </div>
                                                    <a class="rbt-btn-link" href="{{ route('courseDetails') }}">معرفة المزيد<i
                                                            class="feather-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Card  -->

                                    <!-- Start Single Card  -->
                                    <div class="swiper-slide">
                                        <div class="rbt-card variation-01 rbt-hover">
                                            <div class="rbt-card-img">
                                                <a href="{{ route('courseDetails') }}">
                                                    <img src="{{ asset('assets/images/course/classic-lms-01.jpg') }}" alt="Card image">
                                                    <div class="rbt-badge-3">
                                                        <span>-40%</span>
                                                        <span>Off</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="rbt-card-body">
                                                <ul class="rbt-meta">
                                                    <li><i class="feather-book"></i>12 Lessons</li>
                                                    <li><i class="feather-users"></i>50 Students</li>
                                                </ul>
                                                <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">React</a>
                                                </h4>
                                                <p class="rbt-card-text">It is a long established fact that a reader
                                                    will be distracted.</p>
                                                <div class="rbt-review">
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <span class="rating-count"> (15 تقييم)</span>
                                                </div>
                                                <div class="rbt-card-bottom">
                                                    <div class="rbt-price">
                                                        <span class="current-price">$70</span>
                                                        <span class="off-price">$120</span>
                                                    </div>
                                                    <a class="rbt-btn-link" href="{{ route('courseDetails') }}">معرفة المزيد<i
                                                            class="feather-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Card  -->

                                    <!-- Start Single Card  -->
                                    <div class="swiper-slide">
                                        <div class="rbt-card variation-01 rbt-hover">
                                            <div class="rbt-card-img">
                                                <a href="{{ route('courseDetails') }}">
                                                    <img src="{{ asset('assets/images/course/course-online-02.jpg') }}" alt="Card image">
                                                    <div class="rbt-badge-3">
                                                        <span>-40%</span>
                                                        <span>Off</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="rbt-card-body">
                                                <ul class="rbt-meta">
                                                    <li><i class="feather-book"></i>12 Lessons</li>
                                                    <li><i class="feather-users"></i>50 Students</li>
                                                </ul>
                                                <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">React</a>
                                                </h4>
                                                <p class="rbt-card-text">It is a long established fact that a reader
                                                    will be distracted.</p>
                                                <div class="rbt-review">
                                                    <div class="rating">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <span class="rating-count"> (15 تقييم)</span>
                                                </div>
                                                <div class="rbt-card-bottom">
                                                    <div class="rbt-price">
                                                        <span class="current-price">$70</span>
                                                        <span class="off-price">$120</span>
                                                    </div>
                                                    <a class="rbt-btn-link" href="{{ route('courseDetails') }}">معرفة المزيد<i
                                                            class="feather-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Card  -->

                                </div>
                                <div class="rbt-swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner Area -->

        <div class="rbt-categories-area bg-color-white rbt-section-gapBottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <span class="subtitle bg-primary-opacity">التصنيفات</span>
                            <h2 class="title">استكشف تصنيفاتنا التعليمية <br /> التي ستغير مستواك</h2>
                        </div>
                    </div>
                </div>
                <div class="row g-5 mt--20">
                    <!-- Start Category Box Layout  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a class="rbt-cat-box rbt-cat-box-1 text-center" href="{{ route('courseFilterOneToggle') }}">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{ asset('assets/images/category/web-design.png') }}" alt="Icons Images">
                                </div>
                                <div class="content">
                                    <h5 class="title">تصميم المواقع</h5>
                                    <div class="read-more-btn">
                                        <span class="rbt-btn-link">25 كورس<i class="feather-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Category Box Layout  -->

                    <!-- Start Category Box Layout  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a class="rbt-cat-box rbt-cat-box-1 text-center" href="{{ route('courseFilterOneToggle') }}">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{ asset('assets/images/category/design.png') }}" alt="Icons Images">
                                </div>
                                <div class="content">
                                    <h5 class="title">الجرافيك ديزاين</h5>
                                    <div class="read-more-btn">
                                        <span class="rbt-btn-link">30 كورس<i class="feather-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Category Box Layout  -->

                    <!-- Start Category Box Layout  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a class="rbt-cat-box rbt-cat-box-1 text-center" href="{{ route('courseFilterOneToggle') }}">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{ asset('assets/images/category/personal.png') }}" alt="Icons Images">
                                </div>
                                <div class="content">
                                    <h5 class="title">التنمية البشرية</h5>
                                    <div class="read-more-btn">
                                        <span class="rbt-btn-link">20 كورس<i class="feather-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Category Box Layout  -->

                    <!-- Start Category Box Layout  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a class="rbt-cat-box rbt-cat-box-1 text-center" href="{{ route('courseFilterOneToggle') }}">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{ asset('assets/images/category/server.png') }}" alt="Icons Images">
                                </div>
                                <div class="content">
                                    <h5 class="title">تكنولوجيا المعلومات</h5>
                                    <div class="read-more-btn">
                                        <span class="rbt-btn-link">15 Courses<i class="feather-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Category Box Layout  -->

                    <!-- Start Category Box Layout  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a class="rbt-cat-box rbt-cat-box-1 text-center" href="{{ route('courseFilterOneToggle') }}">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{ asset('assets/images/category/pantone.png') }}" alt="Icons Images">
                                </div>
                                <div class="content">
                                    <h5 class="title">التسويق والمبيعات</h5>
                                    <div class="read-more-btn">
                                        <span class="rbt-btn-link">15 Courses<i class="feather-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Category Box Layout  -->

                    <!-- Start Category Box Layout  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a class="rbt-cat-box rbt-cat-box-1 text-center" href="{{ route('courseFilterOneToggle') }}">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{ asset('assets/images/category/paint-palette.png') }}" alt="Icons Images">
                                </div>
                                <div class="content">
                                    <h5 class="title">الفنون والآداب</h5>
                                    <div class="read-more-btn">
                                        <span class="rbt-btn-link">15 Courses<i class="feather-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Category Box Layout  -->

                    <!-- Start Category Box Layout  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a class="rbt-cat-box rbt-cat-box-1 text-center" href="{{ route('courseFilterOneToggle') }}">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{ asset('assets/images/category/smartphone.png') }}" alt="Icons Images">
                                </div>
                                <div class="content">
                                    <h5 class="title">تطبيقات الموبايل</h5>
                                    <div class="read-more-btn">
                                        <span class="rbt-btn-link">15 Courses<i class="feather-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Category Box Layout  -->

                    <!-- Start Category Box Layout  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <a class="rbt-cat-box rbt-cat-box-1 text-center" href="{{ route('courseFilterOneToggle') }}">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{ asset('assets/images/category/infographic.png') }}" alt="Icons Images">
                                </div>
                                <div class="content">
                                    <h5 class="title">المحاسبة والمالية</h5>
                                    <div class="read-more-btn">
                                        <span class="rbt-btn-link">15 Courses<i class="feather-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Category Box Layout  -->
                </div>
            </div>
        </div>

        <!-- Start Course Area -->
        <div class="rbt-course-area bg-color-extra2 rbt-section-gap">
            <div class="container">
                <div class="row mb--60">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <span class="subtitle bg-secondary-opacity">أشهر الكورسات المتاحة</span>
                            <h2 class="title">انضم إلى طلابنا المتفوقين في <br /> هذه الدورات التعليمية.</h2>
                        </div>
                    </div>
                </div>
                <!-- Start Card Area -->
                <div class="row g-5">
                    <!-- Start Single Course  -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <a href="{{ route('courseDetails') }}">
                                    <img src="{{ asset('assets/images/course/course-01.jpg') }}" alt="Card image">
                                    <div class="rbt-badge-3">
                                        <span>-50%</span>
                                        <span>Off</span>
                                    </div>
                                </a>
                            </div>
                            <div class="rbt-card-body">

                                <div class="rbt-card-top">
                                    <div class="rbt-review">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="rating-count"> (15 تقييم)</span>
                                    </div>
                                    <div class="rbt-bookmark-btn">
                                        <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                class="feather-bookmark"></i></a>
                                    </div>
                                </div>

                                <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">React Front To Back</a>
                                </h4>
                                <ul class="rbt-meta">
                                    <li><i class="feather-book"></i>20 درس</li>
                                    <li><i class="feather-users"></i>40 طالب</li>
                                </ul>
                                <p class="rbt-card-text">React Js long fact that a reader will be distracted by
                                    the readable.</p>
                                <div class="rbt-author-meta mb--20">
                                    <div class="rbt-avater">
                                        <a href="#">
                                            <img src="{{ asset('assets/images/client/avater-01.png') }}" alt="Sophia Jaymes">
                                        </a>
                                    </div>
                                    <div class="rbt-author-info">
                                        بواسطة <a href="{{ route('profile') }}">باتريك</a> في <a href="#">اللغات</a>
                                    </div>
                                </div>

                                <div class="rbt-card-bottom">
                                    <div class="rbt-price">
                                        <span class="current-price">$60</span>
                                        <span class="off-price">$120</span>
                                    </div>
                                    <a class="rbt-btn-link" href="{{ route('courseDetails') }}">معرفة المزيد<i class="feather-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Course  -->

                    <!-- Start Single Course  -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <a href="{{ route('courseDetails') }}">
                                    <img src="{{ asset('assets/images/course/course-02.jpg') }}" alt="Card image">
                                    <div class="rbt-badge-3">
                                        <span>-40%</span>
                                        <span>Off</span>
                                    </div>
                                </a>
                            </div>
                            <div class="rbt-card-body">
                                <div class="rbt-card-top">
                                    <div class="rbt-review">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="rating-count"> (15 تقييم)</span>
                                    </div>
                                    <div class="rbt-bookmark-btn">
                                        <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                class="feather-bookmark"></i></a>
                                    </div>
                                </div>
                                <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">PHP Beginner + Advanced</a>
                                </h4>
                                <ul class="rbt-meta">
                                    <li><i class="feather-book"></i>12 درس</li>
                                    <li><i class="feather-users"></i>50 طالب</li>
                                </ul>
                                <p class="rbt-card-text">It is a long established fact that a reader will be distracted
                                    by the readable.</p>
                                <div class="rbt-author-meta mb--20">
                                    <div class="rbt-avater">
                                        <a href="#">
                                            <img src="{{ asset('assets/images/client/avatar-02.png') }}" alt="Sophia Jaymes">
                                        </a>
                                    </div>
                                    <div class="rbt-author-info">
                                        بواسطة <a href="{{ route('profile') }}">أنجيلا</a> في <a href="#">التطوير</a>
                                    </div>
                                </div>
                                <div class="rbt-card-bottom">
                                    <div class="rbt-price">
                                        <span class="current-price">$60</span>
                                        <span class="off-price">$120</span>
                                    </div>
                                    <a class="rbt-btn-link left-icon" href="{{ route('courseDetails') }}"><i
                                            class="feather-shopping-cart"></i> أضف إلى السلة</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Course  -->

                    <!-- Start Single Course  -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <a href="{{ route('courseDetails') }}">
                                    <img src="{{ asset('assets/images/course/course-03.jpg') }}" alt="Card image">
                                    <div class="rbt-badge-3">
                                        <span>-40%</span>
                                        <span>Off</span>
                                    </div>
                                </a>
                            </div>
                            <div class="rbt-card-body">
                                <div class="rbt-card-top">
                                    <div class="rbt-review">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="rating-count"> (5 تقييمات)</span>
                                    </div>
                                    <div class="rbt-bookmark-btn">
                                        <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                class="feather-bookmark"></i></a>
                                    </div>
                                </div>
                                <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">Angular Zero to Mastery</a>
                                </h4>
                                <ul class="rbt-meta">
                                    <li><i class="feather-book"></i>8 درس</li>
                                    <li><i class="feather-users"></i>30 طالب</li>
                                </ul>
                                <p class="rbt-card-text">Angular Js long fact that a reader will be distracted by
                                    the readable.</p>

                                <div class="rbt-author-meta mb--20">
                                    <div class="rbt-avater">
                                        <a href="#">
                                            <img src="{{ asset('assets/images/client/avatar-03.png') }}" alt="Sophia Jaymes">
                                        </a>
                                    </div>
                                    <div class="rbt-author-info">
                                        بواسطة <a href="{{ route('profile') }}">سلوتر</a> في <a href="#">اللغات</a>
                                    </div>
                                </div>
                                <div class="rbt-card-bottom">
                                    <div class="rbt-price">
                                        <span class="current-price">$80</span>
                                        <span class="off-price">$100</span>
                                    </div>
                                    <a class="rbt-btn-link" href="{{ route('courseDetails') }}">معرفة المزيد<i class="feather-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Course  -->
                </div>
                <!-- End Card Area -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="load-more-btn mt--60 text-center">
                            <a class="rbt-btn btn-gradient btn-lg hover-icon-reverse" href="#">
                                <span class="icon-reverse-wrapper">
                                    <span class="btn-text">عرض المزيد من الكورسات (40)</span>
                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Course Area -->

        <!-- Start About Area  -->
        <div class="rbt-about-area bg-color-white rbt-section-gapTop pb_md--80 pb_sm--80 about-style-1">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="thumbnail-wrapper">
                            <div class="thumbnail image-1">
                                <img data-parallax='{"x": 0, "y": -20}' src="{{ asset('assets/images/about/about-01.png') }}" alt="Education Images">
                            </div>
                            <div class="thumbnail image-2 d-none d-xl-block">
                                <img data-parallax='{"x": 0, "y": 60}' src="{{ asset('assets/images/about/about-02.png') }}" alt="Education Images">
                            </div>
                            <div class="thumbnail image-3 d-none d-md-block">
                                <img data-parallax='{"x": 0, "y": 80}' src="{{ asset('assets/images/about/about-03.png') }}" alt="Education Images">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="inner pl--50 pl_sm--0 pl_md--0">
                            <div class="section-title text-start">
                                <span class="subtitle bg-coral-opacity">حول المنصة</span>
                                <h2 class="title">منصة فاهمين <br /> التعليمية المتكاملة</h2>
                            </div>

                            <p class="description mt--30">فاهمين هي منصة تعليمية إلكترونية متكاملة تتيح لكل مدرس إنشاء وإدارة محتواه التعليمي بسهولة واحترافية، مع توفير كافة الأدوات اللازمة لنجاح العملية التعليمية الرقمية.</p>

                            <!-- Start Feature List  -->

                            <div class="rbt-feature-wrapper mt--20 ml_dec_20">
                                <div class="rbt-feature feature-style-2 rbt-radius">
                                    <div class="icon bg-pink-opacity">
                                        <i class="feather-video"></i>
                                    </div>
                                    <div class="feature-content">
                                        <h6 class="feature-title">محتوى غني</h6>
                                        <p class="feature-description">شرح الدروس بجميع الوسائط (فيديو، صوت، ملفات PDF) لتجربة تعليمية شاملة.</p>
                                    </div>
                                </div>

                                <div class="rbt-feature feature-style-2 rbt-radius">
                                    <div class="icon bg-primary-opacity">
                                        <i class="feather-check-square"></i>
                                    </div>
                                    <div class="feature-content">
                                        <h6 class="feature-title">اختبارات تفاعلية</h6>
                                        <p class="feature-description">إنشاء اختبارات تفاعلية مع نظام تصحيح تلقائي ونتائج فورية للطلاب.</p>
                                    </div>
                                </div>

                                <div class="rbt-feature feature-style-2 rbt-radius">
                                    <div class="icon bg-secondary-opacity">
                                        <i class="feather-pie-chart"></i>
                                    </div>
                                    <div class="feature-content">
                                        <h6 class="feature-title">تقارير لحظية</h6>
                                        <p class="feature-description">متابعة دقيقة لأداء الطلاب عبر تقارير وإحصائيات محدثة لحظة بلحظة.</p>
                                    </div>
                                </div>

                                <div class="rbt-feature feature-style-2 rbt-radius">
                                    <div class="icon bg-success-opacity">
                                        <i class="feather-message-circle"></i>
                                    </div>
                                    <div class="feature-content">
                                        <h6 class="feature-title">تواصل مباشر</h6>
                                        <p class="feature-description">قنوات تواصل فعالة بين المعلم والطالب وولي الأمر لمتابعة مستمرة.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- End Feature List  -->
                            <div class="about-btn mt--40">
                                <a class="rbt-btn btn-gradient hover-icon-reverse" href="#">
                                    <span class="icon-reverse-wrapper">
                            <span class="btn-text">اكتشف المزيد عنا</span>
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
        <!-- End About Area  -->

        <!-- Start Call To Action  -->
        <div class="rbt-callto-action-area mt_dec--half">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6">
                        <div class="rbt-callto-action callto-action-default bg-color-white rbt-radius shadow-1">
                            <div class="row align-items-center">
                                <div class="col-lg-12 col-xl-5">
                                    <div class="inner">
                                        <div class="rbt-category mb--20">
                                            <a href="#">مجموعة جديدة</a>
                                        </div>
                                        <h4 class="title mb--15">كورسات تعليمية من فاهمين</h4>
                                        <p class="mb--15">أفضل المعلمين من جميع أنحاء الجمهورية</p>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-7">
                                    <div class="video-popup-wrapper mt_lg--10 mt_md--20 mt_sm--20">
                                        <img class="w-100 rbt-radius" src="{{ asset('assets/images/others/video-01.jpg') }}" alt="Video Images">
                                        <a class="rbt-btn rounded-player-2 sm-size popup-video position-to-top with-animation" href="https://www.youtube.com/watch?v=nA1Aqp0sPQo">
                                            <span class="play-icon"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="rbt-callto-action callto-action-default bg-color-white rbt-radius shadow-1">
                            <div class="row align-items-center">
                                <div class="col-lg-12">
                                    <div class="inner">
                                        <div class="rbt-category mb--20">
                                            <a href="#">كبار المعلمين</a>
                                        </div>
                                        <h4 class="title mb--10">دورات تدريبية مجانية من مدرسة فاهمين</h4>
                                        <p class="mb--15">نخبة من خبراء التعليم في خدمتك</p>
                                        <div class="read-more-btn">
                                            <a class="rbt-btn rbt-switch-btn btn-gradient btn-sm" href="#">
                                                <span data-text="انضم الآن">انضم الآن</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Call To Action  -->

        <!-- Start Counterup Area  -->
        <div class="rbt-counterup-area bg-color-extra2 rbt-section-gapBottom default-callto-action-overlap">
            <div class="container">
                <div class="row mb--60">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <span class="subtitle bg-primary-opacity">الفئات المستهدفة</span>
                            <h2 class="title">لمن تم تصميم <br /> منصة فاهمين؟</h2>
                        </div>
                    </div>
                </div>
                <div class="row g-5 hanger-line">
                    <!-- Start Single Item  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="rbt-counterup rbt-hover-03 border-bottom-gradient">
                            <div class="top-circle-shape"></div>
                            <div class="inner">
                                <div class="rbt-round-icon">
                                    <i class="feather-user-check" style="font-size: 40px; color: var(--color-primary);"></i>
                                </div>
                                <div class="content">
                                    <h3 class="title" style="font-size: 20px; font-weight: 600; margin-bottom: 5px;">المعلمون</h3>
                                    <span class="subtitle">لبناء هويتهم التعليمية المستقلة وإدارة طلابهم</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item  -->

                    <!-- Start Single Item  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt--60 mt_md--30 mt_sm--30 mt_mobile--60">
                        <div class="rbt-counterup rbt-hover-03 border-bottom-gradient">
                            <div class="top-circle-shape"></div>
                            <div class="inner">
                                <div class="rbt-round-icon">
                                    <i class="feather-book-open" style="font-size: 40px; color: var(--color-primary);"></i>
                                </div>
                                <div class="content">
                                    <h3 class="title" style="font-size: 20px; font-weight: 600; margin-bottom: 5px;">أصحاب السناتر</h3>
                                    <span class="subtitle">لرقمنة المحتوى التعليمي وتوسيع نطاق الانتشار</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item  -->

                    <!-- Start Single Item  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt_md--60 mt_sm--60">
                        <div class="rbt-counterup rbt-hover-03 border-bottom-gradient">
                            <div class="top-circle-shape"></div>
                            <div class="inner">
                                <div class="rbt-round-icon">
                                    <i class="feather-edit-3" style="font-size: 40px; color: var(--color-primary);"></i>
                                </div>
                                <div class="content">
                                    <h3 class="title" style="font-size: 20px; font-weight: 600; margin-bottom: 5px;">مؤلفو الكتب</h3>
                                    <span class="subtitle">لتقديم محتواهم بشكل تفاعلي آمن ومحمي</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item  -->

                    <!-- Start Single Item  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt--60 mt_md--30 mt_sm--30 mt_mobile--60">
                        <div class="rbt-counterup rbt-hover-03 border-bottom-gradient">
                            <div class="top-circle-shape"></div>
                            <div class="inner">
                                <div class="rbt-round-icon">
                                    <i class="feather-users" style="font-size: 40px; color: var(--color-primary);"></i>
                                </div>
                                <div class="content">
                                    <h3 class="title" style="font-size: 20px; font-weight: 600; margin-bottom: 5px;">أولياء الأمور</h3>
                                    <span class="subtitle">لمتابعة مستوى أبنائهم وضمان أفضل جودة تعليمية</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Item  -->
                </div>
            </div>
        </div>
        <!-- End Counterup Area  -->

        <!-- Start Testimonial Area   -->
        <div class="rbt-testimonial-area bg-color-white rbt-section-gap overflow-hidden">
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title text-center mb--10">
                                <span class="subtitle bg-primary-opacity">EDUCATION FOR EVERYONE</span>
                                <h2 class="title">People like histudy education. <br /> No joking - here’s the proof!
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="scroll-animation-wrapper no-overlay mt--50">
                <div class="scroll-animation scroll-right-left">

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-odd">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{ asset('assets/images/icons/facebook.png') }}" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">After the launch, vulputate at sapien sit amet,
                                        auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/testimonial/client-01.png') }}" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">Martha Maldonado, <span>CEO</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-odd">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{ asset('assets/images/icons/google.png') }}" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">Histudy education, vulputate at sapien sit amet,
                                        auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/testimonial/client-02.png') }}" alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">Michael D., <span>CEO</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-odd">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                      <!-- Start How It Works Area -->
        <div class="rbt-service-area bg-color-white rbt-section-gap">
            <div class="container">
                <div class="row mb--60">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <span class="subtitle bg-primary-opacity">خطوات بسيطة</span>
                            <h2 class="title">كيف تعمل المنصة؟</h2>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <!-- Start Single Service  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="service-card service-style-1 bg-color-extra2 rbt-radius text-center">
                            <div class="inner">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/icons/service-01.png') }}" alt="Service Images">
                                </div>
                                <div class="content">
                                    <h4 class="title">إنشاء حساب</h4>
                                    <p class="description">سجل بسهولة كمعلم لتبدأ رحلتك التعليمية أو كطالب لتكتشف عالماً من المعرفة.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Service  -->

                    <!-- Start Single Service  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="service-card service-style-1 bg-color-extra2 rbt-radius text-center">
                            <div class="inner">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/icons/service-02.png') }}" alt="Service Images">
                                </div>
                                <div class="content">
                                    <h4 class="title">المحتوى التعليمي</h4>
                                    <p class="description">يقوم المعلم برفع دروسه واختباراته، ويقوم الطالب بالاشتراك في الكورسات المناسبة له.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Service  -->

                    <!-- Start Single Service  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="service-card service-style-1 bg-color-extra2 rbt-radius text-center">
                            <div class="inner">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/icons/service-03.png') }}" alt="Service Images">
                                </div>
                                <div class="content">
                                    <h4 class="title">المتابعة والتقييم</h4>
                                    <p class="description">نظام دقيق لمتابعة التقدم الدراسي وحل الاختبارات التفاعلية مع تصحيح فوري.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Service  -->

                    <!-- Start Single Service  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="service-card service-style-1 bg-color-extra2 rbt-radius text-center">
                            <div class="inner">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/icons/service-04.png') }}" alt="Service Images">
                                </div>
                                <div class="content">
                                    <h4 class="title">النتائج والنجاح</h4>
                                    <p class="description">تواصل مباشر، تقارير أداء شاملة، وضمان الوصول لأفضل المستويات التعليمية.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Service  -->
                </div>
            </div>
        </div>
        <!-- End How It Works Area -->

        <!-- Start Event Area  -->
        <div class="rbt-event-area rbt-section-gap bg-gradient-3">
            <div class="container">
                <div class="row mb--55">
                    <div class="section-title text-center">
                        <span class="subtitle bg-white-opacity">هل أنت مستعد للمشاركة؟</span>
                        <h2 class="title color-white">الفعاليات والندوات القادمة</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="swiper event-activation-1 rbt-arrow-between rbt-dot-bottom-center pb--60 icon-bg-primary">

                            <div class="swiper-wrapper">
                                <!-- Start Single Slide  -->
                                <div class="swiper-slide">
                                    <div class="single-slide">
                                        <div class="rbt-card event-grid-card variation-01 rbt-hover">
                                            <div class="rbt-card-img">
                                                <a href="{{ route('eventDetails') }}">
                                                    <img src="{{ asset('assets/images/event/grid-type-02.jpg') }}" alt="Card image">
                                                    <div class="rbt-badge-3">
                                                        <span>11 Mar</span>
                                                        <span>2024</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="rbt-card-body">
                                                <ul class="rbt-meta">
                                                    <li><i class="feather-map-pin"></i>Vancouver</li>
                                                    <li><i class="feather-clock"></i>8:00 am - 5:00 pm</li>
                                                </ul>
                                                <h4 class="rbt-card-title"><a href="{{ route('eventDetails') }}">مسابقة الرسم الإبداعي لمنصة فاهمين</a></h4>

                                                <div class="read-more-btn">
                                                    <a class="rbt-btn btn-border hover-icon-reverse btn-sm radius-round" href="{{ route('eventDetails') }}">
                                                        <span class="icon-reverse-wrapper">
                                    <span class="btn-text">Get Ticket</span>
                                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Slide  -->
                                <!-- Start Single Slide  -->
                                <div class="swiper-slide">
                                    <div class="single-slide">
                                        <div class="rbt-card event-grid-card variation-01 rbt-hover">
                                            <div class="rbt-card-img">
                                                <a href="{{ route('eventDetails') }}">
                                                    <img src="{{ asset('assets/images/event/grid-type-04.jpg') }}" alt="Card image">
                                                    <div class="rbt-badge-3">
                                                        <span>11 Jan</span>
                                                        <span>2024</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="rbt-card-body">
                                                <ul class="rbt-meta">
                                                    <li><i class="feather-map-pin"></i>IAC Building</li>
                                                    <li><i class="feather-clock"></i>8:00 am - 5:00 pm</li>
                                                </ul>
                                                <h4 class="rbt-card-title"><a href="{{ route('eventDetails') }}">Elegant Light Box Paper Cut Dioramas in
                                                        UK</a></h4>

                                                <div class="read-more-btn">
                                                    <a class="rbt-btn btn-border hover-icon-reverse btn-sm radius-round" href="{{ route('eventDetails') }}">
                                                        <span class="icon-reverse-wrapper">
                                    <span class="btn-text">Get Ticket</span>
                                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Slide  -->

                                <!-- Start Single Slide  -->
                                <div class="swiper-slide">
                                    <div class="single-slide">
                                        <div class="rbt-card event-grid-card variation-01 rbt-hover">
                                            <div class="rbt-card-img">
                                                <a href="{{ route('eventDetails') }}">
                                                    <img src="{{ asset('assets/images/event/grid-type-05.jpg') }}" alt="Card image">
                                                    <div class="rbt-badge-3">
                                                        <span>11 Mar</span>
                                                        <span>2024</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="rbt-card-body">
                                                <ul class="rbt-meta">
                                                    <li><i class="feather-map-pin"></i>Vancouver</li>
                                                    <li><i class="feather-clock"></i>8:00 am - 5:00 pm</li>
                                                </ul>
                                                <h4 class="rbt-card-title"><a href="{{ route('eventDetails') }}">Most Effective Ways for Education's
                                                        Problem</a></h4>

                                                <div class="read-more-btn">
                                                    <a class="rbt-btn btn-border hover-icon-reverse btn-sm radius-round" href="{{ route('eventDetails') }}">
                                                        <span class="icon-reverse-wrapper">
                                    <span class="btn-text">Get Ticket</span>
                                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Slide  -->

                                <!-- Start Single Slide  -->
                                <div class="swiper-slide">
                                    <div class="single-slide">
                                        <div class="rbt-card event-grid-card variation-01 rbt-hover">
                                            <div class="rbt-card-img">
                                                <a href="{{ route('eventDetails') }}">
                                                    <img src="{{ asset('assets/images/event/grid-type-01.jpg') }}" alt="Card image">
                                                    <div class="rbt-badge-3">
                                                        <span>11 Jan</span>
                                                        <span>2024</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="rbt-card-body">
                                                <ul class="rbt-meta">
                                                    <li><i class="feather-map-pin"></i>IAC Building</li>
                                                    <li><i class="feather-clock"></i>8:00 am - 5:00 pm</li>
                                                </ul>
                                                <h4 class="rbt-card-title"><a href="{{ route('eventDetails') }}">International Education Fair 2024</a>
                                                </h4>

                                                <div class="read-more-btn">
                                                    <a class="rbt-btn btn-border hover-icon-reverse btn-sm radius-round" href="{{ route('eventDetails') }}">
                                                        <span class="icon-reverse-wrapper">
                                    <span class="btn-text">Get Ticket</span>
                                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Slide  -->
                            </div>

                            <div class="rbt-swiper-arrow rbt-arrow-left">
                                <div class="custom-overfolow">
                                    <i class="rbt-icon feather-arrow-left"></i>
                                    <i class="rbt-icon-top feather-arrow-left"></i>
                                </div>
                            </div>

                            <div class="rbt-swiper-arrow rbt-arrow-right">
                                <div class="custom-overfolow">
                                    <i class="rbt-icon feather-arrow-right"></i>
                                    <i class="rbt-icon-top feather-arrow-right"></i>
                                </div>
                            </div>

                            <div class="rbt-swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- End Event Area  -->
        <div class="rbt-team-area bg-color-white rbt-section-gap">
            <div class="container">
                <div class="row mb--60">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <span class="subtitle bg-primary-opacity">معلمونا المتميزون</span>
                            <h2 class="title">نخبة من أفضل المعلمين لإلهامك</h2>
                        </div>
                    </div>
                </div>
                <div class="row g-5">

                    <div class="col-lg-7">
                        <!-- Start Tab Content  -->
                        <div class="rbt-team-tab-content tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="team-tab1" role="tabpanel" aria-labelledby="team-tab1-tab">
                                <div class="inner">
                                    <div class="rbt-team-thumbnail">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/team/team-01.jpg') }}" alt="Testimonial Images">
                                        </div>
                                    </div>
                                    <div class="rbt-team-details">
                                        <div class="author-info">
                                            <h4 class="title">Mames Mary</h4>
                                            <span class="designation theme-gradient">English Teacher</span>
                                            <span class="team-form">
                                <i class="feather-map-pin"></i>
                                <span class="location">CO Miego, AD,USA</span>
                                            </span>
                                        </div>
                                        <p>Histudy The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.</p>
                                        <ul class="social-icon social-default mt--20 justify-content-start">
                                            <li><a href="https://www.facebook.com/">
                                                    <i class="feather-facebook"></i>
                                                </a>
                                            </li>
                                            <li><a href="https://www.twitter.com">
                                                    <i class="feather-twitter"></i>
                                                </a>
                                            </li>
                                            <li><a href="https://www.instagram.com/">
                                                    <i class="feather-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="rbt-information-list mt--25">
                                            <li>
                                                <a href="#"><i class="feather-phone"></i>+1-202-555-0174</a>
                                            </li>
                                            <li>
                                                <a href="mailto:hello@example.com"><i class="feather-mail"></i>example@gmail.com</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="team-tab2" role="tabpanel" aria-labelledby="team-tab2-tab">
                                <div class="inner">
                                    <div class="rbt-team-thumbnail">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/team/team-02.jpg') }}" alt="Testimonial Images">
                                        </div>
                                    </div>
                                    <div class="rbt-team-details">
                                        <div class="author-info">
                                            <h4 class="title">Robert Song</h4>
                                            <span class="designation theme-gradient">Math Teacher</span>
                                            <span class="team-form">
                                <i class="feather-map-pin"></i>
                                <span class="location">CO Miego, AD,USA</span>
                                            </span>
                                        </div>
                                        <p>Education The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.</p>
                                        <ul class="social-icon social-default mt--20 justify-content-start">
                                            <li><a href="https://www.facebook.com/">
                                                    <i class="feather-facebook"></i>
                                                </a>
                                            </li>
                                            <li><a href="https://www.twitter.com">
                                                    <i class="feather-twitter"></i>
                                                </a>
                                            </li>
                                            <li><a href="https://www.instagram.com/">
                                                    <i class="feather-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="rbt-information-list mt--25">
                                            <li>
                                                <a href="#"><i class="feather-phone"></i>+1-202-555-0174</a>
                                            </li>
                                            <li>
                                                <a href="mailto:hello@example.com"><i class="feather-mail"></i>example@gmail.com</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="team-tab3" role="tabpanel" aria-labelledby="team-tab3-tab">
                                <div class="inner">
                                    <div class="rbt-team-thumbnail">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/team/team-03.jpg') }}" alt="Testimonial Images">
                                        </div>
                                    </div>
                                    <div class="rbt-team-details">
                                        <div class="author-info">
                                            <h4 class="title">William Susan</h4>
                                            <span class="designation theme-gradient">React Teacher</span>
                                            <span class="team-form">
                                <i class="feather-map-pin"></i>
                                <span class="location">CO Miego, AD,USA</span>
                                            </span>
                                        </div>
                                        <p>React The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.</p>
                                        <ul class="social-icon social-default mt--20 justify-content-start">
                                            <li><a href="https://www.facebook.com/">
                                                    <i class="feather-facebook"></i>
                                                </a>
                                            </li>
                                            <li><a href="https://www.twitter.com">
                                                    <i class="feather-twitter"></i>
                                                </a>
                                            </li>
                                            <li><a href="https://www.instagram.com/">
                                                    <i class="feather-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="rbt-information-list mt--25">
                                            <li>
                                                <a href="#"><i class="feather-phone"></i>+1-202-555-0174</a>
                                            </li>
                                            <li>
                                                <a href="mailto:hello@example.com"><i class="feather-mail"></i>example@gmail.com</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="team-tab4" role="tabpanel" aria-labelledby="team-tab4-tab">
                                <div class="inner">
                                    <div class="rbt-team-thumbnail">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/team/team-04.jpg') }}" alt="Testimonial Images">
                                        </div>
                                    </div>
                                    <div class="rbt-team-details">
                                        <div class="author-info">
                                            <h4 class="title">Soseph Sara</h4>
                                            <span class="designation theme-gradient">Web Teacher</span>
                                            <span class="team-form">
                                <i class="feather-map-pin"></i>
                                <span class="location">CO Miego, AD,USA</span>
                                            </span>
                                        </div>
                                        <p>Histudy The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.</p>
                                        <ul class="social-icon social-default mt--20 justify-content-start">
                                            <li><a href="https://www.facebook.com/">
                                                    <i class="feather-facebook"></i>
                                                </a>
                                            </li>
                                            <li><a href="https://www.twitter.com">
                                                    <i class="feather-twitter"></i>
                                                </a>
                                            </li>
                                            <li><a href="https://www.instagram.com/">
                                                    <i class="feather-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="rbt-information-list mt--25">
                                            <li>
                                                <a href="#"><i class="feather-phone"></i>+1-202-555-0174</a>
                                            </li>
                                            <li>
                                                <a href="mailto:hello@example.com"><i class="feather-mail"></i>example@gmail.com</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="team-tab5" role="tabpanel" aria-labelledby="team-tab5-tab">
                                <div class="inner">
                                    <div class="rbt-team-thumbnail">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/team/team-05.jpg') }}" alt="Testimonial Images">
                                        </div>
                                    </div>
                                    <div class="rbt-team-details">
                                        <div class="author-info">
                                            <h4 class="title">Thomas Dal</h4>
                                            <span class="designation theme-gradient">Graphic Teacher</span>
                                            <span class="team-form">
                                <i class="feather-map-pin"></i>
                                <span class="location">CO Miego, AD,USA</span>
                                            </span>
                                        </div>
                                        <p>Histudy The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.</p>
                                        <ul class="social-icon social-default mt--20 justify-content-start">
                                            <li><a href="https://www.facebook.com/">
                                                    <i class="feather-facebook"></i>
                                                </a>
                                            </li>
                                            <li><a href="https://www.twitter.com">
                                                    <i class="feather-twitter"></i>
                                                </a>
                                            </li>
                                            <li><a href="https://www.instagram.com/">
                                                    <i class="feather-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="rbt-information-list mt--25">
                                            <li>
                                                <a href="#"><i class="feather-phone"></i>+1-202-555-0174</a>
                                            </li>
                                            <li>
                                                <a href="mailto:hello@example.com"><i class="feather-mail"></i>example@gmail.com</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="team-tab6" role="tabpanel" aria-labelledby="team-tab6-tab">
                                <div class="inner">
                                    <div class="rbt-team-thumbnail">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/team/team-06.jpg') }}" alt="Testimonial Images">
                                        </div>
                                    </div>
                                    <div class="rbt-team-details">
                                        <div class="author-info">
                                            <h4 class="title">Christopher Lisa</h4>
                                            <span class="designation theme-gradient">English Teacher</span>
                                            <span class="team-form">
                                <i class="feather-map-pin"></i>
                                <span class="location">CO Miego, AD,USA</span>
                                            </span>
                                        </div>
                                        <p>Histudy The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.</p>
                                        <ul class="social-icon social-default mt--20 justify-content-start">
                                            <li><a href="https://www.facebook.com/">
                                                    <i class="feather-facebook"></i>
                                                </a>
                                            </li>
                                            <li><a href="https://www.twitter.com">
                                                    <i class="feather-twitter"></i>
                                                </a>
                                            </li>
                                            <li><a href="https://www.instagram.com/">
                                                    <i class="feather-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="rbt-information-list mt--25">
                                            <li>
                                                <a href="#"><i class="feather-phone"></i>+1-202-555-0174</a>
                                            </li>
                                            <li>
                                                <a href="mailto:hello@example.com"><i class="feather-mail"></i>example@gmail.com</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="top-circle-shape"></div>
                        </div>
                        <!-- End Tab Content  -->
                    </div>

                    <div class="col-lg-5">
                        <!-- Start Tab Nav  -->
                        <ul class="rbt-team-tab-thumb nav nav-tabs" id="myTab" role="tablist">
                            <li>
                                <a class="active" id="team-tab1-tab" data-bs-toggle="tab" data-bs-target="#team-tab1" role="tab" aria-controls="team-tab1" aria-selected="true">
                                    <div class="rbt-team-thumbnail">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/team/team-01.jpg') }}" alt="Testimonial Images">
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a id="team-tab2-tab" data-bs-toggle="tab" data-bs-target="#team-tab2" role="tab" aria-controls="team-tab2" aria-selected="false">
                                    <div class="rbt-team-thumbnail">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/team/team-02.jpg') }}" alt="Testimonial Images">
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a id="team-tab3-tab" data-bs-toggle="tab" data-bs-target="#team-tab3" role="tab" aria-controls="team-tab3" aria-selected="false">
                                    <div class="rbt-team-thumbnail">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/team/team-03.jpg') }}" alt="Testimonial Images">
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a id="team-tab4-tab" data-bs-toggle="tab" data-bs-target="#team-tab4" role="tab" aria-controls="team-tab4" aria-selected="false">
                                    <div class="rbt-team-thumbnail">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/team/team-04.jpg') }}" alt="Testimonial Images">
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a id="team-tab5-tab" data-bs-toggle="tab" data-bs-target="#team-tab5" role="tab" aria-controls="team-tab5" aria-selected="false">
                                    <div class="rbt-team-thumbnail">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/team/team-05.jpg') }}" alt="Testimonial Images">
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a id="team-tab6-tab" data-bs-toggle="tab" data-bs-target="#team-tab6" role="tab" aria-controls="team-tab6" aria-selected="false">
                                    <div class="rbt-team-thumbnail">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/team/team-06.jpg') }}" alt="Testimonial Images">
                                        </div>
                                    </div>
                                </a>
                            </li>

                        </ul>
                        <!-- End Tab Content  -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Blog Style -->
        <div class="rbt-rbt-blog-area rbt-section-gap bg-color-extra2">
            <div class="container">
                <div class="row g-5 align-items-center mb--30">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="section-title">
                            <span class="subtitle bg-pink-opacity">أخبار المنصة</span>
                            <h2 class="title">أحدث المقالات التعليمية</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="read-more-btn text-start text-md-end">
                            <a class="rbt-btn btn-gradient hover-icon-reverse" href="{{ route('blog') }}">
                                <div class="icon-reverse-wrapper">
                                    <span class="btn-text">عرض جميع المقالات</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Start Card Area -->
                <div class="row row--15">
                    <!-- Start Single Card  -->
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt--30" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                        <div class="rbt-card variation-02 height-330 rbt-hover">
                            <div class="rbt-card-img">
                                <a href="{{ route('blogDetails') }}">
                                    <img src="{{ asset('assets/images/blog/blog-card-01.jpg') }}" alt="Card image"> </a>
                            </div>
                            <div class="rbt-card-body">
                                <h3 class="rbt-card-title"><a href="{{ route('blogDetails') }}">التفوق الدراسي</a></h3>
                                <p class="rbt-card-text">تعرف على أفضل الطرق لتنظيم وقتك وزيادة تحصيلك الدراسي مع منصة فاهمين.</p>
                                <div class="rbt-card-bottom">
                                    <a class="transparent-button" href="{{ route('blogDetails') }}">اقرأ المزيد<i><svg width="17" height="12" xmlns="http://www.w3.org/2000/svg"><g stroke="#27374D" fill="none" fill-rule="evenodd"><path d="M10.614 0l5.629 5.629-5.63 5.629"/><path stroke-linecap="square" d="M.663 5.572h14.594"/></g></svg></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt--30" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">

                        <!-- Start Single Card  -->
                        <div class="rbt-card card-list variation-02 rbt-hover">
                            <div class="rbt-card-img">
                                <a href="{{ route('blogDetails') }}">
                                    <img src="{{ asset('assets/images/blog/blog-card-02.jpg') }}" alt="Card image"> </a>
                            </div>
                            <div class="rbt-card-body">
                                <h5 class="rbt-card-title"><a href="{{ route('blogDetails') }}">لماذا التعليم الإلكتروني هو الاختيار الأفضل؟</a></h5>
                                <div class="rbt-card-bottom">
                                    <a class="transparent-button" href="{{ route('blogDetails') }}">اقرأ المقال<i><svg width="17" height="12" xmlns="http://www.w3.org/2000/svg"><g stroke="#27374D" fill="none" fill-rule="evenodd"><path d="M10.614 0l5.629 5.629-5.63 5.629"/><path stroke-linecap="square" d="M.663 5.572h14.594"/></g></svg></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Card  -->

                        <!-- Start Single Card  -->
                        <div class="rbt-card card-list variation-02 rbt-hover mt--30">
                            <div class="rbt-card-img">
                                <a href="{{ route('blogDetails') }}">
                                    <img src="{{ asset('assets/images/blog/blog-card-03.jpg') }}" alt="Card image"> </a>
                            </div>
                            <div class="rbt-card-body">
                                <h5 class="rbt-card-title"><a href="{{ route('blogDetails') }}">Difficult Things About Education.</a></h5>
                                <div class="rbt-card-bottom">
                                    <a class="transparent-button" href="{{ route('blogDetails') }}">Read Article<i><svg width="17" height="12" xmlns="http://www.w3.org/2000/svg"><g stroke="#27374D" fill="none" fill-rule="evenodd"><path d="M10.614 0l5.629 5.629-5.63 5.629"/><path stroke-linecap="square" d="M.663 5.572h14.594"/></g></svg></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Card  -->

                        <!-- Start Single Card  -->
                        <div class="rbt-card card-list variation-02 rbt-hover mt--30">
                            <div class="rbt-card-img">
                                <a href="{{ route('blogDetails') }}">
                                    <img src="{{ asset('assets/images/blog/blog-card-04.jpg') }}" alt="Card image"> </a>
                            </div>
                            <div class="rbt-card-body">
                                <h5 class="rbt-card-title"><a href="{{ route('blogDetails') }}">أسرار النجاح في الثانوية العامة</a></h5>
                                <div class="rbt-card-bottom">
                                    <a class="transparent-button" href="{{ route('blogDetails') }}">اقرأ المقال<i><svg width="17" height="12" xmlns="http://www.w3.org/2000/svg"><g stroke="#27374D" fill="none" fill-rule="evenodd"><path d="M10.614 0l5.629 5.629-5.63 5.629"/><path stroke-linecap="square" d="M.663 5.572h14.594"/></g></svg></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Card  -->
                    </div>
                </div>
                <!-- End Card Area -->
            </div>
        </div>
        <!-- End Blog Style -->

        <div class="rbt-newsletter-area newsletter-style-2 bg-color-primary rbt-section-gap">
            <div class="container">
                <div class="row row--15 align-items-center">
                    <div class="col-lg-12">
                        <div class="inner text-center">
                            <div class="section-title text-center">
                                <span class="subtitle bg-white-opacity">كن أول من يعلم بجديدنا</span>
                                <h2 class="title color-white"><strong>اشترك</strong> في نشرتنا البريدية</h2>
                                <p class="description color-white mt--20">اشترك لتصلك أحدث المواد التعليمية، مواعيد المراجعات، ونصائح المعلمين مباشرة على بريدك الإلكتروني.</p>
                            </div>
                            <form action="#" class="newsletter-form-1 mt--40">
                                <input type="email" placeholder="أدخل بريدك الإلكتروني">
                                <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse">
                                    <span class="icon-reverse-wrapper">
                            <span class="btn-text">اشترك الآن</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </span>
                                </button>
                            </form>
                            <span class="note-text color-white mt--20">لا إعلانات مزعجة.. فقط محتوى تعليمي مفيد.</span>

                            <div class="row row--15 mt--50">
                                <!-- Start Single Counter -->
                                <div class="col-lg-3 offset-lg-3 col-md-6 col-sm-6 single-counter">
                                    <div class="rbt-counterup rbt-hover-03 style-2 text-color-white">
                                        <div class="inner">
                                            <div class="content">
                                                <h3 class="counter color-white"><span class="odometer" data-count="500">00</span>
                                                </h3>
                                                <h5 class="title color-white">طالب استفاد من المنصة</h5>
                                                <span class="subtitle color-white">وما زلنا فخورين بطلابنا</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Counter -->

                                <!-- Start Single Counter -->
                                <div class="col-lg-3 col-md-6 col-sm-6 single-counter mt_mobile--30">
                                    <div class="rbt-counterup rbt-hover-03 style-2 text-color-white">
                                        <div class="inner">
                                            <div class="content">
                                                <h3 class="counter color-white"><span class="odometer" data-count="100">00</span>
                                                </h3>
                                                <h5 class="title color-white">كورس تعليمي متاح</h5>
                                                <span class="subtitle color-white">بمحتوى عالي الجودة</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Counter -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Footer aera -->
        <footer class="rbt-footer footer-style-1">
            <div class="footer-top">
                <div class="container">
                    <div class="row row--15 mt_dec--30">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--30">
                            <div class="footer-widget">
                                <div class="logo logo-dark">
                                    <a href="#">
                                        <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Edu-cause">
                                    </a>
                                </div>
                                <div class="logo d-none logo-light">
                                    <a href="#">
                                        <img src="{{ asset('assets/images/dark/logo/logo-light.png') }}" alt="Edu-cause">
                                    </a>
                                </div>

                                <p class="description mt--20">منصة فاهمين هي رفيقك في رحلة النجاح، نؤمن بأن الفهم هو أساس التعلم ونسعى لتقديم محتوى تعليمي متميز لكل طالب.
                                </p>

                                <div class="contact-btn mt--30">
                                    <a class="rbt-btn hover-icon-reverse btn-border-gradient radius-round" href="{{ route('contact') }}">
                                        <div class="icon-reverse-wrapper">
                                            <span class="btn-text">تواصل معنا</span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6 col-12 mt--30">
                            <div class="footer-widget">
                                <h5 class="ft-title">روابط مفيدة</h5>
                                <ul class="ft-link">
                                    <li>
                                        <a href="{{ route('marketplace') }}">المتجر</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('kindergarten') }}">التأسيس</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('universityClassic') }}">الجامعة</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('faqs') }}">الأسئلة الشائعة</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6 col-sm-6 col-12 mt--30">
                            <div class="footer-widget">
                                <h5 class="ft-title">عن المنصة</h5>
                                <ul class="ft-link">
                                    <li>
                                        <a href="{{ route('contact') }}">اتصل بنا</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('becomeTeacher') }}">كن معلماً معنا</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('blog') }}">الأخبار</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('instructor') }}">المعلمون</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('eventList') }}">الفعاليات</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt--30">
                            <div class="footer-widget">
                                <h5 class="ft-title">Get Contact</h5>
                                <ul class="ft-link">
                                    <li><span>Phone:</span> <a href="#">(406) 555-0120</a></li>
                                    <li><span>E-mail:</span> <a href="mailto:hr@example.com">pixcels@example.com</a></li>
                                    <li><span>Location:</span> North America, USA</li>
                                </ul>
                                <ul class="social-icon social-default icon-naked justify-content-start mt--20">
                                    <li><a href="https://www.facebook.com/">
                                            <i class="feather-facebook"></i>
                                        </a>
                                    </li>
                                    <li><a href="https://www.twitter.com">
                                            <i class="feather-twitter"></i>
                                        </a>
                                    </li>
                                    <li><a href="https://www.instagram.com/">
                                            <i class="feather-instagram"></i>
                                        </a>
                                    </li>
                                    <li><a href="https://www.linkdin.com/">
                                            <i class="feather-linkedin"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer aera -->

        <div class="rbt-separator-mid">
            <div class="container">
                <hr class="rbt-separator m-0">
            </div>
        </div>
        
        <!-- Start Copyright Area  -->
        <div class="copyright-area copyright-style-1 ptb--20">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12">
                        <p class="rbt-link-hover text-center text-lg-start">Copyright © 2025 <a href="https://www.pixcelsthemes.com/">Pixcels Themes.</a> All Rights Reserved</p>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12">
                        <ul class="copyright-link rbt-link-hover justify-content-center justify-content-lg-end mt_sm--10 mt_md--10">
                            <li><a href="#">Terms of service</a></li>
                            <li><a href="{{ route('privacyPolicy') }}">Privacy policy</a></li>
                            <li><a href="{{ route('subscription') }}">Subscription</a></li>
                            <li><a href="{{ route('login') }}">Login & Register</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright Area  -->

    </main>
    <!-- End Page Wrapper Area -->
     
@endsection