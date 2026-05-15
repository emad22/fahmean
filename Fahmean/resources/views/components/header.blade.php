<!-- Start Header Area -->
<style>
    .fahmean-header-actions {
        display: flex;
        align-items: center;
        gap: 34px;
        padding: 20px 0;
    }

    .fahmean-header-buttons {
        display: flex;
        align-items: center;
        gap: 28px;
    }

    .fahmean-header-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        min-width: 218px;
        height: 56px;
        padding: 0 26px;
        border-radius: 8px;
        font-size: 15px;
        font-weight: 700;
        line-height: 1;
        transition: 0.3s;
        text-decoration: none !important;
    }

    .fahmean-header-btn i {
        font-size: 20px;
    }

    .fahmean-header-btn-primary {
        min-width: 276px;
        border-radius: 8px;
        padding: 0 30px;
        font-size: 15px;
        box-shadow: none;
    }

    .fahmean-header-btn-login {
        background: transparent;
        color: #1f1f25;
        min-width: auto;
        padding: 14px 18px;
        height: auto;
        font-size: 15px;
        font-weight: 700;
        border-radius: 12px;
        transition: 0.3s;
        overflow: hidden;
    }

    .fahmean-header-btn-login .icon-reverse-wrapper {
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .fahmean-header-btn-login .btn-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 18px;
        transition: 0.3s;
    }

    .fahmean-header-btn-login .btn-icon:first-child {
        width: 0;
        opacity: 0;
        transform: translateX(12px);
        overflow: hidden;
    }

    .fahmean-header-btn-login .btn-icon:last-child {
        opacity: 1;
        transform: translateX(0);
    }

    .fahmean-header-btn-login .btn-text-primary,
    .fahmean-header-btn-login .btn-icon i {
        background: linear-gradient(90deg, #3559ea 0%, #b15fe4 100%);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        color: transparent;
    }

    .fahmean-header-btn-login i {
        font-size: 22px;
    }

    .fahmean-header-btn-login:hover {
        color: #1f1f25;
        background: #ffffff;
        box-shadow: 0 10px 24px rgba(15, 23, 42, 0.12);
        text-decoration: none !important;
    }

    .fahmean-header-btn-login .btn-text-secondary {
        color: #1f1f25;
    }

    .fahmean-header-btn-login:hover .btn-icon:first-child {
        width: 18px;
        opacity: 1;
        transform: translateX(0);
    }

    .fahmean-header-btn-login:hover .btn-icon:last-child {
        width: 0;
        opacity: 0;
        transform: translateX(-12px);
        overflow: hidden;
    }

    .fahmean-header-btn-primary,
    .fahmean-header-btn-primary span,
    .fahmean-header-btn-primary i,
    .fahmean-header-btn-login,
    .fahmean-header-btn-login span,
    .fahmean-header-btn-login i {
        text-decoration: none !important;
    }

    .fahmean-header-search {
        display: flex;
        align-items: center;
    }

    .fahmean-header-search .rbt-round-btn {
        width: auto;
        height: auto;
        padding: 0;
        background: transparent;
        border: 0;
        box-shadow: none;
        border-radius: 0;
        text-decoration: none !important;
    }

    .fahmean-header-search .rbt-round-btn i {
        font-size: 28px;
        background: linear-gradient(90deg, #3559ea 0%, #b15fe4 100%);
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        color: transparent;
    }

    @media (max-width: 1199px) {
        .fahmean-header-actions {
            gap: 18px;
        }

        .fahmean-header-buttons {
            gap: 16px;
        }

        .fahmean-header-btn {
            min-width: auto;
            height: 46px;
            padding: 0 16px;
            font-size: 14px;
        }

        .fahmean-header-btn-primary {
            min-width: auto;
            padding: 0 20px;
        }

        .fahmean-header-btn i {
            font-size: 18px;
        }

        .fahmean-header-search .rbt-round-btn i {
            font-size: 22px;
        }
    }

    @media (max-width: 767px) {
        .fahmean-header-buttons {
            display: none;
        }
    }
</style>
<header class="rbt-header rbt-header-10">
    <div class="rbt-sticky-placeholder"></div>

    <!-- Start Header Top  -->
     <div class="rbt-header-top rbt-header-top-1 header-space-betwween bg-not-transparent bg-color-darker top-expended-activation d-none">
        <div class="container-fluid">
            <div class="top-expended-wrapper">
                <div class="top-expended-inner rbt-header-sec align-items-center ">
                    <div class="rbt-header-sec-col rbt-header-left d-none d-xl-block">
                        <div class="rbt-header-content">
                            <!-- Start Header Information List  -->
                            <div class="header-info">
                                <ul class="rbt-information-list">
                                    <li>
                                        <a href="#"><i class="fab fa-instagram"></i>100k <span class="d-none d-xxl-block">Followers</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-facebook-square"></i>500k <span class="d-none d-xxl-block">Followers</span></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="feather-phone"></i>+1-202-555-0174</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Header Information List  -->
                        </div>
                    </div>
                    
                    <div class="rbt-header-sec-col rbt-header-right mt_md--10 mt_sm--10">
                        <div class="rbt-header-content justify-content-start justify-content-lg-end">
                            <div class="header-info d-none d-xl-block">
                                <ul class="social-share-transparent">
                                    <li>
                                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>

                          
                        </div>
                    </div>
                </div>
                <div class="header-info">
                    <div class="top-bar-expended d-block d-lg-none">
                        <button class="topbar-expend-button rbt-round-btn"><i class="feather-plus"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top  -->
    <div class="rbt-header-wrapper header-space-betwween header-sticky">
        <div class="container-fluid">
            <div class="mainbar-row rbt-navigation-center align-items-center">
                <div class="header-left rbt-header-content">
                    <div class="header-info">
                        <div class="logo logo-dark">
                            <a href="/">
                                <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Education Logo Images">
                            </a>
                        </div>

                        <div class="logo d-none logo-light">
                            <a href="/">
                                <img src="{{ asset('assets/images/dark/logo/logo-light.png') }}" alt="Education Logo Images">
                            </a>
                        </div>
                    </div>
                    
                </div>

               

                <div class="header-right">
                    <div class="fahmean-header-actions">
                        <div class="fahmean-header-buttons">
                            <a class="rbt-btn btn-md btn-gradient hover-icon-reverse fahmean-header-btn fahmean-header-btn-primary" href="{{ route('register') }}">
                                <span class="icon-reverse-wrapper">
                                    <span class="btn-text">اعمل حساب جديد !</span>
                                    <span class="btn-icon"><i class="feather-user-plus"></i></span>
                                    <span class="btn-icon"><i class="feather-user-plus"></i></span>
                                </span>
                            </a>

                            <a class="fahmean-header-btn fahmean-header-btn-login" href="{{ route('login') }}">
                                <span class="icon-reverse-wrapper">
                                    <span class="btn-icon"><i class="feather-user"></i></span>
                                    <span class="btn-text btn-text-primary">سجل</span>
                                    <span class="btn-text btn-text-secondary">دخولك</span>
                                    <span class="btn-icon"><i class="feather-user"></i></span>
                                </span>
                            </a>
                        </div>

                        <div class="fahmean-header-search">
                            <a class="search-trigger-active rbt-round-btn" href="#">
                                <i class="feather-search"></i>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Start Search Dropdown  -->
        <div class="rbt-search-dropdown">
            <div class="wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="#">
                            <input type="text" placeholder="What are you looking for?">
                            <div class="submit-btn">
                                <a class="rbt-btn btn-gradient btn-md" href="#">Search</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="rbt-separator-mid">
                    <hr class="rbt-separator m-0">
                </div>
            </div>
        </div>
        <!-- End Search Dropdown  -->
    </div>
    <!-- Start Side Vav -->
    <div class="rbt-offcanvas-side-menu rbt-category-sidemenu">
        <div class="inner-wrapper">
            <div class="inner-top">
                <div class="inner-title">
                    <h4 class="title">Menu</h4>
                </div>
                <div class="rbt-btn-close">
                    <button class="rbt-close-offcanvas rbt-round-btn"><i class="feather-x"></i></button>
                </div>
            </div>
            <nav class="side-nav w-100">
                <ul class="mainmenu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('courseFilterOneToggle') }}">Courses</a></li>
                    <li><a href="{{ route('teachersCoaches') }}">Teachers</a></li>
                    <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                    <li><a href="{{ route('aboutus01') }}">About Us</a></li>
                    <li><a href="{{ route('contact.show') }}">Contact Us</a></li>
                </ul>

                <div class="read-more-btn">
                    <div class="rbt-btn-wrapper mt--20">
                        <a class="rbt-btn btn-border-gradient radius-round btn-sm hover-transform-none w-100 justify-content-center text-center" href="#">
                            <span>Learn More</span>
                        </a>
                    </div>
                </div>
            </nav>
            <div class="rbt-offcanvas-footer">

            </div>
        </div>
    </div>
    <!-- End Side Vav -->
    <a class="rbt-close_side_menu" href="javascript:void(0);"></a>

</header>
