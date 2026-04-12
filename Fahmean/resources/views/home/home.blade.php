@extends('layout.layout')

@php
    $topToBottom = 'true';
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
                                <img src="{{ asset('assets/images/dark/logo/logo-light.png') }}"
                                    alt="Education Logo Images">
                            </a>
                        </div>
                    </div>
                    <div class="rbt-btn-close">
                        <button class="close-button rbt-round-btn"><i class="feather-x"></i></button>
                    </div>
                </div>
                <p class="description">منصة فاهمين التعليمية طريقك الأمثل للوصول لما تريد</p>
                <ul class="navbar-top-left rbt-information-list justify-content-start">
                    <li>
                        <a href="mailto:info@fahmean.com"><i class="feather-mail"></i>info@fahmean.com</a>
                    </li>
                    <li>
                        <a href="#"><i class="feather-phone"></i>(010) 735-8555</a>
                    </li>
                </ul>
            </div>

            <nav class="mainmenu-nav">
                <ul class="mainmenu">
                    <li class="with-megamenu position-static">
                        <a href="#">الرئيسية <i class="feather-chevron-down"></i></a>
                       
                    </li>

                    <li class="with-megamenu has-menu-child-item">
                        <a href="#">Courses <i class="feather-chevron-down"></i></a>
                        <!-- Start Mega Menu  -->
                        <div class="rbt-megamenu grid-item-2">
                            <div class="wrapper">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mega-top-banner">
                                            <div class="content">
                                                <h4 class="title">Developer hub</h4>
                                                <p class="description">Start building fast, with code samples, key resources
                                                    and more.</p>
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
                                            <li><a href="{{ route('lesson') }}">Course Lesson <span
                                                        class="rbt-badge-card">New</span></a></li>
                                            <li><a href="{{ route('createCourse') }}">Create Course <span
                                                        class="rbt-badge-card">New</span></a></li>
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
                        <a href="#">Dashboard
                            <i class="feather-chevron-down"></i>
                        </a>
                        <ul class="submenu">
                            <li class="has-dropdown"><a href="#">teacher Dashboard</a>
                               
                            </li>
                            <li class="has-dropdown"><a href="#">Student Dashboard</a>
                                
                            </li>
                        </ul>
                    </li>

                    <li class="with-megamenu has-menu-child-item position-static">
                        <a href="#">Pages <i class="feather-chevron-down"></i></a>
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
                                            <li><a href="{{ route('shop') }}">Shop <span class="rbt-badge-card">Sale
                                                        Anything</span></a></li>
                                            <li><a href="{{ route('singleProduct') }}">Single Product</a></li>
                                            <li><a href="{{ route('cart') }}">Cart Page</a></li>
                                            <li><a href="{{ route('checkout') }}">Checkout</a></li>
                                            <li><a href="{{ route('wishlist') }}">Wishlist Page</a></li>
                                            <li><a href="{{ route('myAccount') }}">My Acount</a></li>
                                            <li><a href="{{ route('login') }}">Login</a></li>
                                            <li><a href="{{ route('register') }}">Register</a></li>
                                            <li><a href="{{ route('subscription') }}">Subscription</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-12 col-xl-3 col-xxl-3 single-mega-item">
                                        <div class="mega-category-item">
                                            <!-- Start Single Category  -->
                                            <div class="nav-category-item">
                                                <div class="thumbnail">
                                                    <div class="image"><img
                                                            src="{{ asset('assets/images/course/category-2.png') }}"
                                                            alt="Course images"></div>
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
                                                    <div class="image"><img
                                                            src="{{ asset('assets/images/course/category-1.png') }}"
                                                            alt="Course images"></div>
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
                                                    <div class="image"><img
                                                            src="{{ asset('assets/images/course/category-4.png') }}"
                                                            alt="Course images"></div>
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
                                                    <div class="image"><img
                                                            src="{{ asset('assets/images/course/category-9.png') }}"
                                                            alt="Course images"></div>
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
                        <a href="#">Elements <i class="feather-chevron-down"></i></a>
                        <!-- Start Mega Menu  -->
                        <div class="rbt-megamenu grid-item-3">
                            <div class="wrapper">
                                <div class="row row--15 single-dropdown-menu-presentation">
                                    <div class="col-lg-4 col-xxl-4 single-mega-item">
                                        <ul class="mega-menu-item">
                                            <li><a href="{{ route('styleGuide') }}">Style Guide <span
                                                        class="rbt-badge-card">Hot</span></a></li>
                                            <li><a href="{{ route('accordion') }}">Accordion</a></li>
                                            <li><a href="{{ route('advancetab') }}">Advance Tab</a></li>
                                            <li><a href="{{ route('about') }}">About <span
                                                        class="rbt-badge-card">New</span></a></li>
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
                                            <a class="rbt-btn btn-gradient hover-icon-reverse square btn-xl w-100 text-center mt--30 hover-transform-none"
                                                href="#">
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
                        <a href="#">Blog <i class="feather-chevron-down"></i></a>
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
                                            <li><a href="#">Media Under Title <span class="rbt-badge-card">Coming</span></a>
                                            </li>
                                            <li><a href="#">Sticky Sidebar <span class="rbt-badge-card">Coming</span></a>
                                            </li>
                                            <li><a href="#">Auto Masonry <span class="rbt-badge-card">Coming</span></a></li>
                                            <li><a href="#">Meta Overlaid <span class="rbt-badge-card">Coming</span></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-lg-12 col-xl-4 col-xxl-4 single-mega-item">
                                        <div class="rbt-ads-wrapper">
                                            <a class="d-block" href="#"><img
                                                    src="{{ asset('assets/images/service/mobile-cat.jpg') }}"
                                                    alt="Education Images"></a>
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
                    <a class="rbt-btn btn-border-gradient radius-round btn-sm hover-transform-none w-100 justify-content-center text-center"
                        href="{{ route('register') }}">
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
    <x-sideVav />
    <!-- End Side Vav -->

    <a class="close_side_menu" href="javascript:void(0);"></a>
    <!-- Start Banner Area -->
    <div class="rbt-banner-area rbt-banner-3 header-transperent-spacer">
        <div class="wrapper">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-7 order-1 order-lg-1">
                        <div class="banner-content ">
                            <div class="inner">
                                <div class="section-title text-start">
                                    <span class="subtitle bg-pink-opacity"><span class="rbt-new-badge-icon">🏆</span> هتفهما
                                        صح وهتوصل لما تريد</span>
                                </div>
                                <!--  <h1 class="title">
                                                                                                                                                                                                فاهمين<img src="{{ asset('assets/images/banner/title-h-1.png') }}" style="vertical-align: bottom;"> وحط خط <br> تحت كلمة <img src="{{ asset('assets/images/banner/title-h-2.png') }}">
                                                                                                                                                                                            </h1> -->
                                <h1 class="title">
                                    فاهمين
                                    <span class="highlight-text">
                                        صح<span style="margin-right: 5px;">✔</span>
                                    </span>
                                    وحط خط
                                    تحت كلمة <span class="header-caption">
                                        <span class="cd-headline loading-bar">
                                            <span class="cd-words-wrapper" style="padding-top: 0px;">
                                                <b class="is-visible theme-gradient">فاهمين</b>
                                            </span>
                                        </span>
                                    </span>
                                </h1>
                                <p class="description">
                                    أقوى منصة تعليمية للمواد الأدبية واللغة الإنجليزية.. شرح مبسط، متابعة دقيقة،
                                    <strong>ونتائج مضمونة.</strong>
                                </p>
                                {{--<div class="rating mb--20">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                </div>--}}
                                {{-- <div class="rbt-like-total">
                                    <div class="profile-share">
                                        <a href="#" class="avatar" data-tooltip="Mark JOrdan" tabindex="0"><img
                                                src="{{ asset('assets/images/testimonial/client-03.png') }}"
                                                alt="education"></a>
                                        <a href="#" class="avatar" data-tooltip="Mark" tabindex="0"><img
                                                src="{{ asset('assets/images/testimonial/client-04.png') }}"
                                                alt="education"></a>
                                        <a href="#" class="avatar" data-tooltip="Jordan" tabindex="0"><img
                                                src="{{ asset('assets/images/testimonial/client-06.png') }}"
                                                alt="education"></a>
                                        <br /><br />
                                        <div class="more-author-text">
                                            <h5 class="total-join-students">انضم لأكثر من 3000+ طالب</h5>
                                            <p class="subtitle">خطوة جديدة نحو التفوق كل أسبوع.</p>
                                        </div>
                                    </div>
                                </div>--}}
                                <div class="slider-btn">
                                    <a class="rbt-btn btn-gradient hover-icon-reverse" href="{{ route('register') }}">
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text">ابدأ الفهم الصح الآن</span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 order-2 order-lg-2">
                        <div class="rbt-contact-form contact-form-style-1 max-width-auto">

                            <center>
                                <h2 class="title">تسجيل الدخول</h2>
                            </center>
                            <form class="max-width-auto" action="{{ route('login.post') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input name="email" type="text" />
                                    <label>البريد الإلكتروني *</label>
                                    <span class="focus-border"></span>
                                </div>
                                <div class="form-group">
                                    <input name="password" type="password">
                                    <label>كلمة السر *</label>
                                    <span class="focus-border"></span>
                                </div>

                                <div class="row mb--30">
                                    <div class="col-lg-6">
                                        <div class="rbt-checkbox">
                                            <input type="checkbox" id="rememberme" name="remember">
                                            <label for="rememberme">افتكرني</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="rbt-lost-password text-end">
                                            <a class="rbt-btn-link" href="#">نسيت كلمة السر؟</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-submit-group">
                                    <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text">دخول</span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </span>
                                    </button>
                                </div>

                                <div class="mt--30 text-center">
                                    <span id="sso-forms__toggle"
                                        style="font-size: 14px; font-weight: 500; text-align: center;">جديد معنا؟
                                        <a class="rbt-btn-link" href="{{ route('register') }}">أنشئ حساب
                                            جديد</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-wrapper">
            <div class="left-shape">
                <img src="{{ asset('assets/images/banner/right-shape.png') }}" alt="Banner Images">
            </div>
            <div class="top-shape">
                <img src="{{ asset('assets/images/banner/top-shape.png') }}" alt="Banner Images">
            </div>
            <div class="marque-images edumarque"></div>
        </div>
    </div>
    <!-- End Banner Area -->
    <main class="rbt-main-wrapper">
        <!-- Start Banner Area -->
        {{-- <div class="rbt-banner-area rbt-banner-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 pb--120 pt--70">
                        <div class="content">
                            <div class="inner">
                                <div class="rbt-new-badge rbt-new-badge-one">
                                    <span class="rbt-new-badge-icon">🏆</span> هتفهما صح وهتوصل لما تريد
                                </div>

                                <h1 class="title">
                                    فاهمين<img src="{{ asset('assets/images/banner/title-h-1.png') }}"
                                        style="vertical-align: bottom;"> وحط خط <br> تحت كلمة <img
                                        src="{{ asset('assets/images/banner/title-h-2.png') }}">
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
                                    <img src="{{ asset('assets/images/shape/shape-01.png') }}"
                                        alt="Hero Image Background Shape">
                                </div>
                                <div class="hero-bg-shape-2 layer" data-depth="0.4">
                                    <img src="{{ asset('assets/images/shape/shape-02.png') }}"
                                        alt="Hero Image Background Shape">
                                </div>
                            </div>

                            <div class="banner-card pb--60 mb--50 swiper rbt-dot-bottom-center banner-swiper-active">
                                <div class="swiper-wrapper">
                                    <div class="rbt-contact-form contact-form-style-2">
                                        <h3 class="title">لو عندك حساب <a href="#">دوس هنا</a></h3>
                                        <form id="contact-form">
                                            <div class="form-group">
                                                <input name="con_name" type="text">
                                                <label>اسم المستخدم</label>
                                                <span class="focus-border"></span>
                                            </div>
                                            <div class="form-group">
                                                <input name="password" type="password">
                                                <label>كلمة المرور</label>
                                                <span class="focus-border"></span>
                                            </div>
                                            <div class="form-group">
                                                <input name="con_email" type="text">
                                                <label>البريد الإلكتروني</label>
                                                <span class="focus-border"></span>
                                            </div>
                                            <div class="form-group">
                                                <input name="con_email" type="text">
                                                <label>رقم التليفون</label>
                                                <span class="focus-border"></span>
                                            </div>
                                            <div class="form-submit-group">
                                                <button type="submit" class="rbt-btn btn-gradient hover-icon-reverse">
                                                    <span class="icon-reverse-wrapper">
                                                        <span class="btn-text">سجل</span>
                                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                                    </span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                    {{-- <!-- Start Single Card  -->
                                    <div class="swiper-slide">
                                        <div class="rbt-card variation-01 rbt-hover">
                                            <div class="rbt-card-img">
                                                <a href="{{ route('courseDetails') }}">
                                                    <img src="{{ asset('assets/images/course/course-01.jpg') }}"
                                                        alt="Card image">
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
                                                    <span class="rating-count"> (15 Reviews)</span>
                                                </div>
                                                <div class="rbt-card-bottom">
                                                    <div class="rbt-price">
                                                        <span class="current-price">$70</span>
                                                        <span class="off-price">$120</span>
                                                    </div>
                                                    <a class="rbt-btn-link" href="{{ route('courseDetails') }}">Learn More<i
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
                                                    <img src="{{ asset('assets/images/course/classic-lms-01.jpg') }}"
                                                        alt="Card image">
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
                                                    <span class="rating-count"> (15 Reviews)</span>
                                                </div>
                                                <div class="rbt-card-bottom">
                                                    <div class="rbt-price">
                                                        <span class="current-price">$70</span>
                                                        <span class="off-price">$120</span>
                                                    </div>
                                                    <a class="rbt-btn-link" href="{{ route('courseDetails') }}">Learn More<i
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
                                                    <img src="{{ asset('assets/images/course/course-online-02.jpg') }}"
                                                        alt="Card image">
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
                                                    <span class="rating-count"> (15 Reviews)</span>
                                                </div>
                                                <div class="rbt-card-bottom">
                                                    <div class="rbt-price">
                                                        <span class="current-price">$70</span>
                                                        <span class="off-price">$120</span>
                                                    </div>
                                                    <a class="rbt-btn-link" href="{{ route('courseDetails') }}">Learn More<i
                                                            class="feather-arrow-right"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Single Card  -->--}}

                                </div>
                                <div class="rbt-swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Banner Area -->
        <!-- Start Counterup Area  -->
        <div class="rbt-counterup-area rbt-section-gapBottom rbt-section-gapTop bg-color-white">
            <div class="container">
                <div class="row mb--60">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            {{--<span class="subtitle bg-primary-opacity">ما لدينا</span>--}}
                            <h2 class="title">إنشاء مجتمع من المتعلمين <br /> مدى الحياة.</h2>
                        </div>
                    </div>
                </div>
                <div class="row g-5 hanger-line">
                    <!-- Start Single Counter  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="rbt-counterup rbt-hover-03 border-bottom-gradient">
                            <div class="top-circle-shape"></div>
                            <div class="inner">
                                <div class="rbt-round-icon">
                                    <img src="{{ asset('assets/images/icons/counter-01.png') }}" alt="Icons Images">
                                </div>
                                <div class="content">
                                    <h3 class="counter"><span class="odometer" data-count="500">00</span>
                                    </h3>
                                    <span class="subtitle">طالب مشترك</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Counter  -->

                    <!-- Start Single Counter  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt--60 mt_md--30 mt_sm--30 mt_mobile--60">
                        <div class="rbt-counterup rbt-hover-03 border-bottom-gradient">
                            <div class="top-circle-shape"></div>
                            <div class="inner">
                                <div class="rbt-round-icon">
                                    <img src="{{ asset('assets/images/icons/counter-02.png') }}" alt="Icons Images">
                                </div>
                                <div class="content">
                                    <h3 class="counter"><span class="odometer" data-count="800">00</span>
                                    </h3>
                                    <span class="subtitle">ساعة شرح مسجلة</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Counter  -->

                    <!-- Start Single Counter  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt_md--60 mt_sm--60">
                        <div class="rbt-counterup rbt-hover-03 border-bottom-gradient">
                            <div class="top-circle-shape"></div>
                            <div class="inner">
                                <div class="rbt-round-icon">
                                    <img src="{{ asset('assets/images/icons/counter-03.png') }}" alt="Icons Images">
                                </div>
                                <div class="content">
                                    <h3 class="counter"><span class="odometer" data-count="1000">00</span>
                                    </h3>
                                    <span class="subtitle">سؤال في بنك الأسئلة</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Counter  -->

                    <!-- Start Single Counter  -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt--60 mt_md--30 mt_sm--30 mt_mobile--60">
                        <div class="rbt-counterup rbt-hover-03 border-bottom-gradient">
                            <div class="top-circle-shape"></div>
                            <div class="inner">
                                <div class="rbt-round-icon">
                                    <img src="{{ asset('assets/images/category/infographic.png') }}" alt="Icons Images">
                                </div>
                                <div class="content">
                                    <h3 class="counter"><span class="odometer" data-count="100">00</span>
                                    </h3>
                                    <span class="subtitle">تقرير متابعة</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Counter  -->
                </div>
            </div>
        </div>
        <!-- End Counterup Area  -->
        <div class="rbt-categories-area bg-color-white rbt-section-gapBottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            {{--<span class="subtitle bg-primary-opacity">الدورات التعليمية</span>--}}
                            <h2 class="title">المواد الدراسية</h2>
                        </div>
                    </div>
                </div>
                <div class="row g-5 mt--20">
                    <!-- Start Category Box Layout  -->
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <a class="rbt-cat-box rbt-cat-box-1 text-center" href="{{ route('courseFilterOneToggle') }}">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{ asset('assets/images/category/web-design.png') }}" alt="Icons Images">
                                </div>
                                <div class="content">
                                    <h5 class="title">مادة التاريخ</h5>
                                    <div class="read-more-btn">
                                        <span class="rbt-btn-link">المرحلة الثانوية<i
                                                class="feather-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Category Box Layout  -->

                    <!-- Start Category Box Layout  -->
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <a class="rbt-cat-box rbt-cat-box-1 text-center" href="{{ route('courseFilterOneToggle') }}">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{ asset('assets/images/category/design.png') }}" alt="Icons Images">
                                </div>
                                <div class="content">
                                    <h5 class="title">مادة الجغرافيا</h5>
                                    <div class="read-more-btn">
                                        <span class="rbt-btn-link">المرحلة الثانوية<i
                                                class="feather-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Category Box Layout  -->

                    <!-- Start Category Box Layout  -->
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <a class="rbt-cat-box rbt-cat-box-1 text-center" href="{{ route('courseFilterOneToggle') }}">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{ asset('assets/images/category/personal.png') }}" alt="Icons Images">
                                </div>
                                <div class="content">
                                    <h5 class="title">مادة اللغة الإنجليزية</h5>
                                    <div class="read-more-btn">
                                        <span class="rbt-btn-link">المرحلة الثانوية<i
                                                class="feather-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Category Box Layout  -->

                    {{-- <!-- Start Category Box Layout  -->
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <a class="rbt-cat-box rbt-cat-box-1 text-center" href="{{ route('courseFilterOneToggle') }}">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{ asset('assets/images/category/server.png') }}" alt="Icons Images">
                                </div>
                                <div class="content">
                                    <h5 class="title">مادة التاريخ</h5>
                                    <div class="read-more-btn">
                                        <span class="rbt-btn-link">الصف الثاني الثانوي<i
                                                class="feather-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Category Box Layout  -->--}}

                    {{-- <!-- Start Category Box Layout  -->
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <a class="rbt-cat-box rbt-cat-box-1 text-center" href="{{ route('courseFilterOneToggle') }}">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{ asset('assets/images/category/pantone.png') }}" alt="Icons Images">
                                </div>
                                <div class="content">
                                    <h5 class="title">اللغة الإنجليزية</h5>
                                    <div class="read-more-btn">
                                        <span class="rbt-btn-link">الصف الأول الثانوي<i
                                                class="feather-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Category Box Layout  -->--}}

                    {{-- <!-- Start Category Box Layout  -->
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <a class="rbt-cat-box rbt-cat-box-1 text-center" href="{{ route('courseFilterOneToggle') }}">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{ asset('assets/images/category/paint-palette.png') }}" alt="Icons Images">
                                </div>
                                <div class="content">
                                    <h5 class="title">اللغة الأنجليزية</h5>
                                    <div class="read-more-btn">
                                        <span class="rbt-btn-link">الصف الثاني الثانوي<i
                                                class="feather-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Category Box Layout  -->--}}

                    {{-- <!-- Start Category Box Layout  -->
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <a class="rbt-cat-box rbt-cat-box-1 text-center" href="{{ route('courseFilterOneToggle') }}">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{ asset('assets/images/category/smartphone.png') }}" alt="Icons Images">
                                </div>
                                <div class="content">
                                    <h5 class="title">مادة التاريخ</h5>
                                    <div class="read-more-btn">
                                        <span class="rbt-btn-link">الصف الثالث الثانوي<i
                                                class="feather-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Category Box Layout  --> --}}

                    {{--<!-- Start Category Box Layout  -->
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <a class="rbt-cat-box rbt-cat-box-1 text-center" href="{{ route('courseFilterOneToggle') }}">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{ asset('assets/images/category/infographic.png') }}" alt="Icons Images">
                                </div>
                                <div class="content">
                                    <h5 class="title">مادة الجغرافيا</h5>
                                    <div class="read-more-btn">
                                        <span class="rbt-btn-link">الصف الثالث الثانوي<i
                                                class="feather-arrow-right"></i></span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End Category Box Layout  -->--}}
                </div>
            </div>
        </div>
        <!-- Start Teacher Area  -->
        <div class="rbt-team-area bg-color-white rbt-section-gapBottom">
            <div class="container">
                <div class="row mb--60">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            {{--<span class="subtitle bg-secondary-opacity">Instructor</span>--}}
                            <h2 class="title">تعرف على مدرسينا</h2>
                            <p class="description has-medium-font-size mt--20">تقدر تتعرف على المدرسين إلي هتفهم منهم وإلي
                                هيوصلوك للحصول على أعلى الدرجات
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row row--15 mt_dec--30">
                    <!-- Start Single Team  -->
                    <div class="col-lg-4 col-md-6 col-12 mt--30">
                        <div class="rbt-team team-style-default style-three rbt-hover">
                            <div class="inner">
                                <div class="thumbnail"><img src="{{ asset('assets/images/team/team-07.jpg') }}"
                                        alt="Corporate Template"></div>
                                <div class="content">
                                    <a href="{{ route('courseFilterOneToggle') }}">
                                        <h2 class="title">أ. محمد صلاح</h2>
                                    </a>
                                    <h6 class="subtitle theme-gradient">مدرس اللغة العربية</h6>
                                    <span class="team-form">
                                        <i class="feather-map-pin"></i>
                                        <span class="location">القاهرة، ج.م.ع</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Team  -->

                    <!-- Start Single Team  -->
                    <div class="col-lg-4 col-md-6 col-12 mt--30">
                        <div class="rbt-team team-style-default style-three rbt-hover">
                            <div class="inner">
                                <div class="thumbnail"><img src="{{ asset('assets/images/team/team-08.jpg') }}"
                                        alt="Corporate Template"></div>
                                <div class="content">
                                    <h2 class="title">أ. سامح أحمد</h2>
                                    <h6 class="subtitle theme-gradient">مدرس التاريخ</h6>
                                    <span class="team-form">
                                        <i class="feather-map-pin"></i>
                                        <span class="location">القاهرة، ج.م.ع</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Team  -->

                    <!-- Start Single Team  -->
                    <div class="col-lg-4 col-md-6 col-12 mt--30">
                        <div class="rbt-team team-style-default style-three rbt-hover">
                            <div class="inner">
                                <div class="thumbnail"><img src="{{ asset('assets/images/team/team-09.jpg') }}"
                                        alt="Corporate Template"></div>
                                <div class="content">
                                    <h2 class="title">أ. عايدة رياض</h2>
                                    <h6 class="subtitle theme-gradient">مدرس الرياضيات</h6>
                                    <span class="team-form">
                                        <i class="feather-map-pin"></i>
                                        <span class="location">القاهرة، ج.م.ع</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Team  -->
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="load-more-btn mt--60 text-center">
                            <a class="rbt-btn btn-gradient btn-lg hover-icon-reverse" href="#">
                                <span class="icon-reverse-wrapper">
                                    <span class="btn-text">تعرف على كل المدرسين</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                {{--<div class="row">
                    <div class="col-lg-12">
                        <div class="load-more-btn mt--60 text-center">
                            <a class="rbt-btn rbt-marquee-btn" href="#">
                                <span data-text="تعرف المدرسين">
                                    تعرف المدرسين
                                </span>
                            </a>
                        </div>
                    </div>
                </div>--}}

            </div>
        </div><!-- end Teacher Area  -->
        <!-- Start Course Area -->
        <div class="rbt-course-area bg-color-extra2 rbt-section-gap">
            <div class="container">
                <div class="row mb--60">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            {{-- <span class="subtitle bg-secondary-opacity">Top Popular Course</span>--}}
                            <h2 class="title">أهم الدورات المفهومة <br /> دورات تضمن لك الدرجة النهائية </h2>
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
                                        <span>خصم</span>
                                    </div>
                                </a>
                            </div>
                            <div class="rbt-card-body">

                                {{--<div class="rbt-card-top">
                                    <div class="rbt-review">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="rating-count"> (15 Reviews)</span>
                                    </div>
                                    <div class="rbt-bookmark-btn">
                                        <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                class="feather-bookmark"></i></a>
                                    </div>
                                </div>--}}

                                <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">اللغة العربية أولى
                                        ثانوي</a>
                                </h4>
                                <ul class="rbt-meta">
                                    <li><i class="feather-book"></i>20 درس</li>
                                    <li><i class="feather-users"></i>40 طالب</li>
                                </ul>
                                <p class="rbt-card-text">اللغة العربية للصف الأول الثانوي متعة تعلم العربية والتعامل مع
                                    أسئلة قواعد النحو والبلاغة</p>
                                <div class="rbt-author-meta mb--20">
                                    <div class="rbt-avater">
                                        <a href="#">
                                            <img src="{{ asset('assets/images/client/avater-01.png') }}"
                                                alt="Sophia Jaymes">
                                        </a>
                                    </div>
                                    <div class="rbt-author-info">
                                        أستاذ <a href="{{ route('profile') }}">سامح أحمد</a> مادة <a href="#">اللغة
                                            العربية</a>
                                    </div>
                                </div>

                                <div class="rbt-card-bottom">
                                    {{-- <div class="rbt-price">
                                        <span class="current-price">$60</span>
                                        <span class="off-price">$120</span>
                                    </div>--}}
                                    <a class="rbt-btn-link" href="{{ route('courseDetails') }}">احجز الدورة<i
                                            class="feather-arrow-right"></i></a>
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
                                    <img src="{{ asset('assets/images/course/course-01.jpg') }}" alt="Card image">
                                    <div class="rbt-badge-3">
                                        <span>-50%</span>
                                        <span>خصم</span>
                                    </div>
                                </a>
                            </div>
                            <div class="rbt-card-body">

                                {{--<div class="rbt-card-top">
                                    <div class="rbt-review">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="rating-count"> (15 Reviews)</span>
                                    </div>
                                    <div class="rbt-bookmark-btn">
                                        <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                class="feather-bookmark"></i></a>
                                    </div>
                                </div>--}}

                                <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">اللغة العربية أولى
                                        ثانوي</a>
                                </h4>
                                <ul class="rbt-meta">
                                    <li><i class="feather-book"></i>20 درس</li>
                                    <li><i class="feather-users"></i>40 طالب</li>
                                </ul>
                                <p class="rbt-card-text">اللغة العربية للصف الأول الثانوي متعة تعلم العربية والتعامل مع
                                    أسئلة قواعد النحو والبلاغة</p>
                                <div class="rbt-author-meta mb--20">
                                    <div class="rbt-avater">
                                        <a href="#">
                                            <img src="{{ asset('assets/images/client/avater-01.png') }}"
                                                alt="Sophia Jaymes">
                                        </a>
                                    </div>
                                    <div class="rbt-author-info">
                                        أستاذ <a href="{{ route('profile') }}">سامح أحمد</a> مادة <a href="#">اللغة
                                            العربية</a>
                                    </div>
                                </div>

                                <div class="rbt-card-bottom">
                                    {{-- <div class="rbt-price">
                                        <span class="current-price">$60</span>
                                        <span class="off-price">$120</span>
                                    </div>--}}
                                    <a class="rbt-btn-link" href="{{ route('courseDetails') }}">احجز الدورة<i
                                            class="feather-arrow-right"></i></a>
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
                                    <img src="{{ asset('assets/images/course/course-01.jpg') }}" alt="Card image">
                                    <div class="rbt-badge-3">
                                        <span>-50%</span>
                                        <span>خصم</span>
                                    </div>
                                </a>
                            </div>
                            <div class="rbt-card-body">

                                {{--<div class="rbt-card-top">
                                    <div class="rbt-review">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                        <span class="rating-count"> (15 Reviews)</span>
                                    </div>
                                    <div class="rbt-bookmark-btn">
                                        <a class="rbt-round-btn" title="Bookmark" href="#"><i
                                                class="feather-bookmark"></i></a>
                                    </div>
                                </div>--}}

                                <h4 class="rbt-card-title"><a href="{{ route('courseDetails') }}">اللغة العربية أولى
                                        ثانوي</a>
                                </h4>
                                <ul class="rbt-meta">
                                    <li><i class="feather-book"></i>20 درس</li>
                                    <li><i class="feather-users"></i>40 طالب</li>
                                </ul>
                                <p class="rbt-card-text">اللغة العربية للصف الأول الثانوي متعة تعلم العربية والتعامل مع
                                    أسئلة قواعد النحو والبلاغة</p>
                                <div class="rbt-author-meta mb--20">
                                    <div class="rbt-avater">
                                        <a href="#">
                                            <img src="{{ asset('assets/images/client/avater-01.png') }}"
                                                alt="Sophia Jaymes">
                                        </a>
                                    </div>
                                    <div class="rbt-author-info">
                                        أستاذ <a href="{{ route('profile') }}">سامح أحمد</a> مادة <a href="#">اللغة
                                            العربية</a>
                                    </div>
                                </div>

                                <div class="rbt-card-bottom">
                                    {{-- <div class="rbt-price">
                                        <span class="current-price">$60</span>
                                        <span class="off-price">$120</span>
                                    </div>--}}
                                    <a class="rbt-btn-link" href="{{ route('courseDetails') }}">احجز الدورة<i
                                            class="feather-arrow-right"></i></a>
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
                                    <span class="btn-text">تعرف على كل الدورات لدينا</span>
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
                                <img data-parallax='{"x": 0, "y": -20}'
                                    src="{{ asset('assets/images/about/about-01.png') }}" alt="Education Images">
                            </div>
                            <div class="thumbnail image-2 d-none d-xl-block">
                                <img data-parallax='{"x": 0, "y": 60}' src="{{ asset('assets/images/about/about-02.png') }}"
                                    alt="Education Images">
                            </div>
                            <div class="thumbnail image-3 d-none d-md-block">
                                <img data-parallax='{"x": 0, "y": 80}' src="{{ asset('assets/images/about/about-03.png') }}"
                                    alt="Education Images">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="inner pl--50 pl_sm--0 pl_md--0">
                            <div class="section-title text-start">
                                <span class="subtitle bg-coral-opacity">أعرف إحنا مين</span>
                                <h2 class="title">منصة فاهمين <br /> منصة تعليمية رائدة</h2>
                            </div>

                            <p class="description mt--30">في مكانٍ قصيٍّ وراء جبال الكلمات، بعيدًا عن بلاد فوكاليا
                                وكونسونانتيا، تعيش النصوص العمياء. يعيشون منفصلين في بوكماركسجروف على ساحل علم الدلالة، وهو
                                محيط لغوي واسع.</p>

                            <!-- Start Feature List  -->

                            <div class="rbt-feature-wrapper mt--20 ml_dec_20">
                                <div class="rbt-feature feature-style-2 rbt-radius">
                                    <div class="icon bg-pink-opacity">
                                        <i class="feather-heart"></i>
                                    </div>
                                    <div class="feature-content">
                                        <h6 class="feature-title">فصول تناسب وقتك</h6>
                                        <p class="feature-description">من الحقائق الراسخة أن القارئ سينشغل بهذا الأمر عند
                                            النظر إلى المحتوى المقروء أو تصميم الكتاب.</p>
                                    </div>
                                </div>

                                <div class="rbt-feature feature-style-2 rbt-radius">
                                    <div class="icon bg-primary-opacity">
                                        <i class="feather-book"></i>
                                    </div>
                                    <div class="feature-content">
                                        <h6 class="feature-title">ذاكر في أي مكان</h6>
                                        <p class="feature-description">
                                            ومع ذلك، فإن الرفض الواضح للعمالة الموصوفة لا يعني أنني أرغب في العمل كما أنني
                                            لا أرغب في ذلك.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- End Feature List  -->
                            <div class="about-btn mt--40">
                                <a class="rbt-btn btn-gradient hover-icon-reverse" href="#">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">أفهم أكثر عنا</span>
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
        <!-- Start Accordion Area  -->
        <div class="rbt-accordion-area accordion-style-1 bg-color-white rbt-section-gap">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6 order-2 order-lg-1 mt_md--40 mt_sm--40">
                        <div class="rbt-accordion-style accordion">
                            <div class="section-title text-start">
                                <span class="subtitle bg-pink-opacity">الأسئلة الشائعة</span>
                                <h2 class="title">لو عندك أي سؤال <br /> أسأل فاهمين</h2>
                                <p class="description has-medium-font-size mt--20 mb--40"><strong>فاهمين منصة
                                        تعليمية</strong> لوريم إيبسوم هو ببساطة نص شكلي (أو نص تجريبي) يُستخدم في صناعة
                                    الطباعة والتنضيد. وقد ظل لوريم إيبسوم النص الشكلي القياسي في هذه الصناعة منذ ذلك الحين.
                                </p>
                            </div>
                            <div class="rbt-accordion-style rbt-accordion-02 accordion">
                                <div class="accordion" id="accordionExampleb2">
                                    <div class="accordion-item card">
                                        <h2 class="accordion-header card-header" id="headingTwo1">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapseTwo1" aria-expanded="true"
                                                aria-controls="collapseTwo1">
                                                إيه هي منصة فاهمين؟ وبتشتغل إزاي؟
                                            </button>
                                        </h2>
                                        <div id="collapseTwo1" class="accordion-collapse collapse show"
                                            aria-labelledby="headingTwo1" data-bs-parent="#accordionExampleb2">
                                            <div class="accordion-body card-body">
                                                يمكنك تشغيل منصة فاهمين بسهولة. يمكن لأي مدرسة أو جامعة أو كلية استخدام قالب
                                                فاهمين التعليمي لأغراضها التعليمية. كما يمكن للجامعات إدارة نظامها التعليمي
                                                الإلكتروني باستخدام هذا القالب.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item card">
                                        <h2 class="accordion-header card-header" id="headingTwo2">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo2"
                                                aria-expanded="false" aria-controls="collapseTwo2">
                                                إزاي ممكن أتواصل مع الدعم الفني؟
                                            </button>
                                        </h2>
                                        <div id="collapseTwo2" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo2" data-bs-parent="#accordionExampleb2">
                                            <div class="accordion-body card-body">
                                                بعد ما تشترك معانا وتتواصل مع المدرس وحدث لك مشكلة يمكنك التواصل معنا عبر
                                                البريد اللإلكتروني <a href="mailto:info@fahmean.com">info@fahmean.com</a> أو
                                                التواصل من خلال الواتس أب على الرقم دة 01112556498.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item card">
                                        <h2 class="accordion-header card-header" id="headingTwo3">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo3"
                                                aria-expanded="false" aria-controls="collapseTwo3">
                                                هل يمكن الحصول على التحديثات بشكل منتظم؟
                                            </button>
                                        </h2>
                                        <div id="collapseTwo3" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo3" data-bs-parent="#accordionExampleb2">
                                            <div class="accordion-body card-body">
                                                نعم، سنقوم بتحديث سجل التحديثات. ويمكنك الحصول عليه في أي وقت. في المرة
                                                القادمة، سنضيف المزيد من الميزات. يمكنك الحصول على التحديثات لعدد غير محدود
                                                من المرات. فريقنا المتخصص يعمل على التحديثات باستمرار.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="accordion-item card">
                                        <h2 class="accordion-header card-header" id="headingTwo4">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo4"
                                                aria-expanded="false" aria-controls="collapseTwo4">
                                                15 معلومة يجب معرفتها عن التعليم؟
                                            </button>
                                        </h2>
                                        <div id="collapseTwo4" class="accordion-collapse collapse"
                                            aria-labelledby="headingTwo4" data-bs-parent="#accordionExampleb2">
                                            <div class="accordion-body card-body">
                                                إذا كنت تبحث عن فقرات عشوائية، فأنت في المكان الصحيح. عندما لا تكفي كلمة
                                                عشوائية أو جملة عشوائية، فإن الخطوة المنطقية التالية هي العثور على فقرة
                                                عشوائية.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 order-1 order-lg-2">
                        <div class="thumbnail rbt-image-gallery-1 mb--80 text-end">
                            <img class="image-1 rbt-radius" data-parallax='{"x": 0, "y": 30}'
                                src="{{ asset('assets/images/about/about-01.jpg') }}" alt="Education Images">
                            <img class="image-2 rbt-radius" data-parallax='{"x": 0, "y": 80}'
                                src="{{ asset('assets/images/about/about-10.jpg') }}" alt="Education Images">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Accordion Area  -->
        {{-- <!-- Start Call To Action  -->
        <div class="rbt-callto-action-area rbt-section-gapBottom">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6">
                        <div class="rbt-callto-action callto-action-default bg-color-white rbt-radius shadow-1">
                            <div class="row align-items-center">
                                <div class="col-lg-12 col-xl-5">
                                    <div class="inner">
                                        <div class="rbt-category mb--20">
                                            <a href="#">New Collection</a>
                                        </div>
                                        <h4 class="title mb--15">Online Courses from Histudy</h4>
                                        <p class="mb--15">Top teachers from around the world</p>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-xl-7">
                                    <div class="video-popup-wrapper mt_lg--10 mt_md--20 mt_sm--20">
                                        <img class="w-100 rbt-radius" src="{{ asset('assets/images/others/video-01.jpg') }}"
                                            alt="Video Images">
                                        <a class="rbt-btn rounded-player-2 sm-size popup-video position-to-top with-animation"
                                            href="https://www.youtube.com/watch?v=nA1Aqp0sPQo">
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
                                            <a href="#">Top Teacher</a>
                                        </div>
                                        <h4 class="title mb--10">Free Online Courses from Histudy School To Education</h4>
                                        <p class="mb--15">Top teachers from around the world</p>
                                        <div class="read-more-btn">
                                            <a class="rbt-btn rbt-switch-btn btn-gradient btn-sm" href="#">
                                                <span data-text="Join Now">Join Now</span>
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
        <!-- End Call To Action  -->--}}



        {{--<!-- Start Testimonial Area   -->
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
                                            <img src="{{ asset('assets/images/testimonial/client-01.png') }}"
                                                alt="Clint Images">
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
                                            <img src="{{ asset('assets/images/testimonial/client-02.png') }}"
                                                alt="Clint Images">
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
                                    <img src="{{ asset('assets/images/icons/yelp.png') }}" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">Our educational, vulputate at sapien sit amet,
                                        auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/testimonial/client-03.png') }}"
                                                alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">Valerie J., <span>CEO</span></h5>
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
                                    <img src="{{ asset('assets/images/icons/facebook.png') }}" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">People says about, vulputate at sapien sit amet,
                                        auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/testimonial/client-04.png') }}"
                                                alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">Hannah R., <span>CEO</span></h5>
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
                                    <img src="{{ asset('assets/images/icons/bing.png') }}" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">Like this histudy, vulputate at sapien sit amet,
                                        auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/testimonial/client-05.png') }}"
                                                alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">Pearl B. Hill, <span>Marketing</span></h5>
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
                                    <img src="{{ asset('assets/images/icons/facebook.png') }}" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">Educational template, vulputate at sapien sit amet,
                                        auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/testimonial/client-01.png') }}"
                                                alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">Mandy F. Wood, <span>SR Designer</span></h5>
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
                                    <img src="{{ asset('assets/images/icons/hubs.png') }}" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">Online leaning, vulputate at sapien sit amet,
                                        auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/testimonial/client-07.png') }}"
                                                alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">Mildred W. Diaz, <span>Executive</span></h5>
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
                                    <img src="{{ asset('assets/images/icons/bing.png') }}" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">Remote learning, vulputate at sapien sit amet,
                                        auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/testimonial/client-08.png') }}"
                                                alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">Christopher, <span>CEO</span></h5>
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
                                    <img src="{{ asset('assets/images/icons/yelp.png') }}" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">University managemnet, vulputate at sapien sit amet,
                                        auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/testimonial/client-06.png') }}"
                                                alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">Fatima, <span>Child</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->
                </div>
            </div>

            <div class="scroll-animation-wrapper no-overlay mt--30">
                <div class="scroll-animation scroll-left-right">

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-even">
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
                                            <img src="{{ asset('assets/images/testimonial/client-01.png') }}"
                                                alt="Clint Images">
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
                    <div class="single-column-20 bg-theme-gradient-even">
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
                                            <img src="{{ asset('assets/images/testimonial/client-02.png') }}"
                                                alt="Clint Images">
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
                    <div class="single-column-20 bg-theme-gradient-even">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{ asset('assets/images/icons/yelp.png') }}" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">Our educational, vulputate at sapien sit amet,
                                        auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/testimonial/client-03.png') }}"
                                                alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">Valerie J., <span>CEO</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-even">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{ asset('assets/images/icons/bing.png') }}" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">People says about, vulputate at sapien sit amet,
                                        auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/testimonial/client-04.png') }}"
                                                alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">Hannah R., <span>CEO</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->
                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-even">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{ asset('assets/images/icons/hubs.png') }}" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">Like this histudy, vulputate at sapien sit amet,
                                        auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/testimonial/client-05.png') }}"
                                                alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">Pearl B. Hill, <span>Marketing</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-even">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{ asset('assets/images/icons/yelp.png') }}" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">Educational template, vulputate at sapien sit amet,
                                        auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/testimonial/client-01.png') }}"
                                                alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">Mandy F. Wood, <span>SR Designer</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-even">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{ asset('assets/images/icons/bing.png') }}" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">Online leaning, vulputate at sapien sit amet,
                                        auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/testimonial/client-07.png') }}"
                                                alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">Mildred W. Diaz, <span>Executive</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-even">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{ asset('assets/images/icons/facebook.png') }}" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">Remote learning, vulputate at sapien sit amet,
                                        auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/testimonial/client-08.png') }}"
                                                alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">Christopher, <span>CEO</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->

                    <!-- Start Single Testimonial  -->
                    <div class="single-column-20 bg-theme-gradient-even">
                        <div class="rbt-testimonial-box style-2">
                            <div class="inner">
                                <div class="icons">
                                    <img src="{{ asset('assets/images/icons/yelp.png') }}" alt="Clint Images">
                                </div>
                                <div class="description">
                                    <p class="subtitle-3">University managemnet, vulputate at sapien sit amet,
                                        auctor iaculis lorem. In vel hend rerit nisi. Vestibulum eget risus velit.</p>
                                    <div class="clint-info-wrapper">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/testimonial/client-06.png') }}"
                                                alt="Clint Images">
                                        </div>
                                        <div class="client-info">
                                            <h5 class="title">Fatima, <span>Child</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Testimonial  -->
                </div>
            </div>
        </div>
        <!-- End Testimonial Area   -->--}}

        {{-- <!-- Start Event Area  -->
        <div class="rbt-event-area rbt-section-gap bg-gradient-3">
            <div class="container">
                <div class="row mb--55">
                    <div class="section-title text-center">
                        <span class="subtitle bg-white-opacity">STIMULATED TO TAKE PART IN?</span>
                        <h2 class="title color-white">Upcoming Events</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div
                            class="swiper event-activation-1 rbt-arrow-between rbt-dot-bottom-center pb--60 icon-bg-primary">

                            <div class="swiper-wrapper">
                                <!-- Start Single Slide  -->
                                <div class="swiper-slide">
                                    <div class="single-slide">
                                        <div class="rbt-card event-grid-card variation-01 rbt-hover">
                                            <div class="rbt-card-img">
                                                <a href="{{ route('eventDetails') }}">
                                                    <img src="{{ asset('assets/images/event/grid-type-02.jpg') }}"
                                                        alt="Card image">
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
                                                <h4 class="rbt-card-title"><a href="{{ route('eventDetails') }}">Painting
                                                        Art Contest 2020 for histudy
                                                        Clud</a></h4>

                                                <div class="read-more-btn">
                                                    <a class="rbt-btn btn-border hover-icon-reverse btn-sm radius-round"
                                                        href="{{ route('eventDetails') }}">
                                                        <span class="icon-reverse-wrapper">
                                                            <span class="btn-text">Get Ticket</span>
                                                            <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span>
                                                            <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span>
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
                                                    <img src="{{ asset('assets/images/event/grid-type-04.jpg') }}"
                                                        alt="Card image">
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
                                                <h4 class="rbt-card-title"><a href="{{ route('eventDetails') }}">Elegant
                                                        Light Box Paper Cut Dioramas in
                                                        UK</a></h4>

                                                <div class="read-more-btn">
                                                    <a class="rbt-btn btn-border hover-icon-reverse btn-sm radius-round"
                                                        href="{{ route('eventDetails') }}">
                                                        <span class="icon-reverse-wrapper">
                                                            <span class="btn-text">Get Ticket</span>
                                                            <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span>
                                                            <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span>
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
                                                    <img src="{{ asset('assets/images/event/grid-type-05.jpg') }}"
                                                        alt="Card image">
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
                                                <h4 class="rbt-card-title"><a href="{{ route('eventDetails') }}">Most
                                                        Effective Ways for Education's
                                                        Problem</a></h4>

                                                <div class="read-more-btn">
                                                    <a class="rbt-btn btn-border hover-icon-reverse btn-sm radius-round"
                                                        href="{{ route('eventDetails') }}">
                                                        <span class="icon-reverse-wrapper">
                                                            <span class="btn-text">Get Ticket</span>
                                                            <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span>
                                                            <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span>
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
                                                    <img src="{{ asset('assets/images/event/grid-type-01.jpg') }}"
                                                        alt="Card image">
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
                                                <h4 class="rbt-card-title"><a
                                                        href="{{ route('eventDetails') }}">International Education Fair
                                                        2024</a>
                                                </h4>

                                                <div class="read-more-btn">
                                                    <a class="rbt-btn btn-border hover-icon-reverse btn-sm radius-round"
                                                        href="{{ route('eventDetails') }}">
                                                        <span class="icon-reverse-wrapper">
                                                            <span class="btn-text">Get Ticket</span>
                                                            <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span>
                                                            <span class="btn-icon"><i
                                                                    class="feather-arrow-right"></i></span>
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

        <!-- End Event Area  -->--}}
        {{--<div class="rbt-team-area bg-color-white rbt-section-gap">
            <div class="container">
                <div class="row mb--60">
                    <div class="col-lg-12">
                        <div class="section-title text-center">
                            <span class="subtitle bg-primary-opacity">Our Teacher</span>
                            <h2 class="title">Whose Inspirations You</h2>
                        </div>
                    </div>
                </div>
                <div class="row g-5">

                    <div class="col-lg-7">
                        <!-- Start Tab Content  -->
                        <div class="rbt-team-tab-content tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="team-tab1" role="tabpanel"
                                aria-labelledby="team-tab1-tab">
                                <div class="inner">
                                    <div class="rbt-team-thumbnail">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/team/team-01.jpg') }}"
                                                alt="Testimonial Images">
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
                                        <p>Histudy The standard chunk of Lorem Ipsum used since the 1500s is reproduced
                                            below for those interested.</p>
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
                                                <a href="mailto:hello@example.com"><i
                                                        class="feather-mail"></i>example@gmail.com</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="team-tab2" role="tabpanel" aria-labelledby="team-tab2-tab">
                                <div class="inner">
                                    <div class="rbt-team-thumbnail">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/team/team-02.jpg') }}"
                                                alt="Testimonial Images">
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
                                        <p>Education The standard chunk of Lorem Ipsum used since the 1500s is reproduced
                                            below for those interested.</p>
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
                                                <a href="mailto:hello@example.com"><i
                                                        class="feather-mail"></i>example@gmail.com</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="team-tab3" role="tabpanel" aria-labelledby="team-tab3-tab">
                                <div class="inner">
                                    <div class="rbt-team-thumbnail">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/team/team-03.jpg') }}"
                                                alt="Testimonial Images">
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
                                        <p>React The standard chunk of Lorem Ipsum used since the 1500s is reproduced below
                                            for those interested.</p>
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
                                                <a href="mailto:hello@example.com"><i
                                                        class="feather-mail"></i>example@gmail.com</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="team-tab4" role="tabpanel" aria-labelledby="team-tab4-tab">
                                <div class="inner">
                                    <div class="rbt-team-thumbnail">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/team/team-04.jpg') }}"
                                                alt="Testimonial Images">
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
                                        <p>Histudy The standard chunk of Lorem Ipsum used since the 1500s is reproduced
                                            below for those interested.</p>
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
                                                <a href="mailto:hello@example.com"><i
                                                        class="feather-mail"></i>example@gmail.com</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="team-tab5" role="tabpanel" aria-labelledby="team-tab5-tab">
                                <div class="inner">
                                    <div class="rbt-team-thumbnail">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/team/team-05.jpg') }}"
                                                alt="Testimonial Images">
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
                                        <p>Histudy The standard chunk of Lorem Ipsum used since the 1500s is reproduced
                                            below for those interested.</p>
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
                                                <a href="mailto:hello@example.com"><i
                                                        class="feather-mail"></i>example@gmail.com</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="team-tab6" role="tabpanel" aria-labelledby="team-tab6-tab">
                                <div class="inner">
                                    <div class="rbt-team-thumbnail">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/team/team-06.jpg') }}"
                                                alt="Testimonial Images">
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
                                        <p>Histudy The standard chunk of Lorem Ipsum used since the 1500s is reproduced
                                            below for those interested.</p>
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
                                                <a href="mailto:hello@example.com"><i
                                                        class="feather-mail"></i>example@gmail.com</a>
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
                                <a class="active" id="team-tab1-tab" data-bs-toggle="tab" data-bs-target="#team-tab1"
                                    role="tab" aria-controls="team-tab1" aria-selected="true">
                                    <div class="rbt-team-thumbnail">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/team/team-01.jpg') }}"
                                                alt="Testimonial Images">
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a id="team-tab2-tab" data-bs-toggle="tab" data-bs-target="#team-tab2" role="tab"
                                    aria-controls="team-tab2" aria-selected="false">
                                    <div class="rbt-team-thumbnail">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/team/team-02.jpg') }}"
                                                alt="Testimonial Images">
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a id="team-tab3-tab" data-bs-toggle="tab" data-bs-target="#team-tab3" role="tab"
                                    aria-controls="team-tab3" aria-selected="false">
                                    <div class="rbt-team-thumbnail">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/team/team-03.jpg') }}"
                                                alt="Testimonial Images">
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a id="team-tab4-tab" data-bs-toggle="tab" data-bs-target="#team-tab4" role="tab"
                                    aria-controls="team-tab4" aria-selected="false">
                                    <div class="rbt-team-thumbnail">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/team/team-04.jpg') }}"
                                                alt="Testimonial Images">
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a id="team-tab5-tab" data-bs-toggle="tab" data-bs-target="#team-tab5" role="tab"
                                    aria-controls="team-tab5" aria-selected="false">
                                    <div class="rbt-team-thumbnail">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/team/team-05.jpg') }}"
                                                alt="Testimonial Images">
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <li>
                                <a id="team-tab6-tab" data-bs-toggle="tab" data-bs-target="#team-tab6" role="tab"
                                    aria-controls="team-tab6" aria-selected="false">
                                    <div class="rbt-team-thumbnail">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/team/team-06.jpg') }}"
                                                alt="Testimonial Images">
                                        </div>
                                    </div>
                                </a>
                            </li>

                        </ul>
                        <!-- End Tab Content  -->
                    </div>
                </div>
            </div>
        </div>--}}

        {{-- <!-- Start Blog Style -->
        <div class="rbt-rbt-blog-area rbt-section-gap bg-color-extra2">
            <div class="container">
                <div class="row g-5 align-items-center mb--30">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="section-title">
                            <span class="subtitle bg-pink-opacity">Blog Post</span>
                            <h2 class="title">Post Popular Post.</h2>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="read-more-btn text-start text-md-end">
                            <a class="rbt-btn btn-gradient hover-icon-reverse" href="{{ route('blog') }}">
                                <div class="icon-reverse-wrapper">
                                    <span class="btn-text">See All Articles</span>
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
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt--30" data-sal-delay="150" data-sal="slide-up"
                        data-sal-duration="800">
                        <div class="rbt-card variation-02 height-330 rbt-hover">
                            <div class="rbt-card-img">
                                <a href="{{ route('blogDetails') }}">
                                    <img src="{{ asset('assets/images/blog/blog-card-01.jpg') }}" alt="Card image"> </a>
                            </div>
                            <div class="rbt-card-body">
                                <h3 class="rbt-card-title"><a href="{{ route('blogDetails') }}">React</a></h3>
                                <p class="rbt-card-text">It is a long established fact that a reader.</p>
                                <div class="rbt-card-bottom">
                                    <a class="transparent-button" href="{{ route('blogDetails') }}">Learn More<i><svg
                                                width="17" height="12" xmlns="http://www.w3.org/2000/svg">
                                                <g stroke="#27374D" fill="none" fill-rule="evenodd">
                                                    <path d="M10.614 0l5.629 5.629-5.63 5.629" />
                                                    <path stroke-linecap="square" d="M.663 5.572h14.594" />
                                                </g>
                                            </svg></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt--30" data-sal-delay="150" data-sal="slide-up"
                        data-sal-duration="800">

                        <!-- Start Single Card  -->
                        <div class="rbt-card card-list variation-02 rbt-hover">
                            <div class="rbt-card-img">
                                <a href="{{ route('blogDetails') }}">
                                    <img src="{{ asset('assets/images/blog/blog-card-02.jpg') }}" alt="Card image"> </a>
                            </div>
                            <div class="rbt-card-body">
                                <h5 class="rbt-card-title"><a href="{{ route('blogDetails') }}">Why Is Education So
                                        Famous?</a></h5>
                                <div class="rbt-card-bottom">
                                    <a class="transparent-button" href="{{ route('blogDetails') }}">Read Article<i><svg
                                                width="17" height="12" xmlns="http://www.w3.org/2000/svg">
                                                <g stroke="#27374D" fill="none" fill-rule="evenodd">
                                                    <path d="M10.614 0l5.629 5.629-5.63 5.629" />
                                                    <path stroke-linecap="square" d="M.663 5.572h14.594" />
                                                </g>
                                            </svg></i></a>
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
                                <h5 class="rbt-card-title"><a href="{{ route('blogDetails') }}">Difficult Things About
                                        Education.</a></h5>
                                <div class="rbt-card-bottom">
                                    <a class="transparent-button" href="{{ route('blogDetails') }}">Read Article<i><svg
                                                width="17" height="12" xmlns="http://www.w3.org/2000/svg">
                                                <g stroke="#27374D" fill="none" fill-rule="evenodd">
                                                    <path d="M10.614 0l5.629 5.629-5.63 5.629" />
                                                    <path stroke-linecap="square" d="M.663 5.572h14.594" />
                                                </g>
                                            </svg></i></a>
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
                                <h5 class="rbt-card-title"><a href="{{ route('blogDetails') }}">Education Is So Famous, But
                                        Why?</a></h5>
                                <div class="rbt-card-bottom">
                                    <a class="transparent-button" href="{{ route('blogDetails') }}">Read Article<i><svg
                                                width="17" height="12" xmlns="http://www.w3.org/2000/svg">
                                                <g stroke="#27374D" fill="none" fill-rule="evenodd">
                                                    <path d="M10.614 0l5.629 5.629-5.63 5.629" />
                                                    <path stroke-linecap="square" d="M.663 5.572h14.594" />
                                                </g>
                                            </svg></i></a>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Card  -->
                    </div>
                </div>
                <!-- End Card Area -->
            </div>
        </div>
        <!-- End Blog Style --> --}}

        {{-- <div class="rbt-newsletter-area newsletter-style-2 bg-color-primary rbt-section-gap">
            <div class="container">
                <div class="row row--15 align-items-center">
                    <div class="col-lg-12">
                        <div class="inner text-center">
                            <div class="section-title text-center">
                                <span class="subtitle bg-white-opacity">Get Latest Histudy Update</span>
                                <h2 class="title color-white"><strong>Subscribe</strong> Our Newsletter</h2>
                                <p class="description color-white mt--20">Lorem ipsum, dolor sit amet consectetur
                                    adipisicing elit. Ipsam explicabo sit est eos earum reprehenderit inventore nam autem
                                    corrupti rerum!</p>
                            </div>
                            <form action="#" class="newsletter-form-1 mt--40">
                                <input type="email" placeholder="Enter Your E-Email">
                                <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Subscribe</span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </span>
                                </button>
                            </form>
                            <span class="note-text color-white mt--20">No ads, No trails, No commitments</span>

                            <div class="row row--15 mt--50">
                                <!-- Start Single Counter -->
                                <div class="col-lg-3 offset-lg-3 col-md-6 col-sm-6 single-counter">
                                    <div class="rbt-counterup rbt-hover-03 style-2 text-color-white">
                                        <div class="inner">
                                            <div class="content">
                                                <h3 class="counter color-white"><span class="odometer"
                                                        data-count="500">00</span>
                                                </h3>
                                                <h5 class="title color-white">Successfully Trained</h5>
                                                <span class="subtitle color-white">Learners &amp; counting</span>
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
                                                <h3 class="counter color-white"><span class="odometer"
                                                        data-count="100">00</span>
                                                </h3>
                                                <h5 class="title color-white">Certification Students</h5>
                                                <span class="subtitle color-white">Online Course</span>
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
        </div>--}}

        <!-- Start Footer aera -->
        <footer class="rbt-footer footer-style-1 bg-color-extra2" style="font-family: var(--font-secondary) !important;">
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

                                <p class="description mt--20">نحن دائمًا نبحث عن الأشخاص الموهوبين والمتحمسين. لا تتردد قدم
                                    نفسك!
                                </p>

                                <div class="contact-btn mt--30">
                                    <a class="rbt-btn hover-icon-reverse btn-border-gradient radius-round" href="#">
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
                                <h3 class="ft-title">روابط مفيدة</h3>
                                <ul class="ft-link">
                                    <li>
                                        <a href="{{ route('marketplace') }}">المتجر</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('kindergarten') }}">روضة أطفال</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('universityClassic') }}">الجامعة</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('gymCoaching') }}">تدريب الجيم</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('faqs') }}">الأسئلة الشائعة</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6 col-sm-6 col-12 mt--30">
                            <div class="footer-widget">
                                <h3 class="ft-title">شركتنا</h3>
                                <ul class="ft-link">
                                    <li>
                                        <a href="{{ route('contact') }}">اتصل بنا</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('becomeTeacher') }}">كن معلمًا</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('blog') }}">المدونة</a>
                                    </li>
                                    <li>
                                        <a href="#">المحاضر</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('eventList') }}">الأحداث</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt--30">
                            <div class="footer-widget">
                                <h3 class="ft-title">معلومات الاتصال</h3>
                                <ul class="ft-link">
                                    <li><span>الهاتف:</span> <a href="#">(406) 555-0120</a></li>
                                    <li><span>البريد الإلكتروني:</span> <a href="mailto:hr@example.com">info@fahmean.com</a>
                                    </li>
                                    <li><span>العنوان:</span> القاهرة، ج.م.ع</li>
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
                        <p class="rbt-link-hover text-center text-lg-start">حقوق النشر © 2025 <a
                                href="https://www.fahmean.com/">Fahmean.com</a> جميع الحقوق محفوظة</p>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12">
                        <ul
                            class="copyright-link rbt-link-hover justify-content-center justify-content-lg-end mt_sm--10 mt_md--10">
                            <li><a href="#">شروط الخدمة</a></li>
                            <li><a href="{{ route('privacyPolicy') }}">سياسة الخصوصية</a></li>
                            <li><a href="{{ route('subscription') }}">الاشتراك</a></li>
                            <li><a href="{{ route('login') }}">تسجيل الدخول والتسجيل</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Copyright Area  -->

    </main>
    <!-- End Page Wrapper Area -->

@endsection