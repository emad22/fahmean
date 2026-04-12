<!-- Start Mobile Menu Section -->
<div class="popup-mobile-menu">
    <div class="inner-wrapper">
        <div class="inner-top">
            <div class="content">
                <div class="logo">
                    <div class="logo logo-dark">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Education Logo Images">
                        </a>
                    </div>
                </div>
                <div class="rbt-btn-close">
                    <button class="close-button rbt-round-btn"><i class="feather-x"></i></button>
                </div>
            </div>
            <nav class="mainmenu-nav">
                <ul class="mainmenu">
                    {{-- Common Links for Mobile Menu --}}
                    <li><a href="{{ url('/') }}">الرئيسية</a></li>
                    @auth
                        <li><a href="{{ url('/dashboard') }}">لوحة التحكم</a></li>
                    @endauth
                </ul>
            </nav>
        </div>

        <div class="mobile-menu-bottom">
            <div class="social-share-wrapper">
                <span class="rbt-short-title d-block">تابعنا على</span>
                <ul class="social-icon social-default transparent-with-border justify-content-start mt--20">
                    <li><a href="#"><i class="feather-facebook"></i></a></li>
                    <li><a href="#"><i class="feather-twitter"></i></a></li>
                    <li><a href="#"><i class="feather-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Mobile Menu Section -->
