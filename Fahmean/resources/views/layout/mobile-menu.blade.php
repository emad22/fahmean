<!-- Start Mobile Menu Section -->
<div class="popup-mobile-menu">
    <div class="inner-wrapper">
        <div class="inner-top">
            <div class="content">
                <div class="logo">
                    <div class="logo logo-dark">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Education Logo Images">
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
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('courseFilterOneToggle') }}">Courses</a></li>
                <li><a href="{{ route('teachersCoaches') }}">Teachers</a></li>
                <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                <li><a href="{{ route('aboutus01') }}">About Us</a></li>
                <li><a href="{{ route('contact.show') }}">Contact Us</a></li>
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
                    <li><a href="https://www.facebook.com/"><i class="feather-facebook"></i></a></li>
                    <li><a href="https://www.twitter.com"><i class="feather-twitter"></i></a></li>
                    <li><a href="https://www.instagram.com/"><i class="feather-instagram"></i></a></li>
                    <li><a href="https://www.linkdin.com/"><i class="feather-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Mobile Menu Section -->
