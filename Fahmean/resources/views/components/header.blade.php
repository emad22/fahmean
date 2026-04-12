<!-- Start Header Area -->
<header class="rbt-header rbt-header-10">
    <div class="rbt-sticky-placeholder"></div>

    <!-- Start Header Top  -->
     <div class="rbt-header-top rbt-header-top-1 header-space-betwween bg-not-transparent bg-color-darker top-expended-activation">
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

                <div class="rbt-main-navigation d-none d-xl-block">
                    <nav class="mainmenu-nav">
                        <ul class="mainmenu">
                            <li class="with-megamenu has-menu-child-item position-static">
                                <a href="/">الرئيسية </i></a>
                                
                            </li>

                            <li class="with-megamenu">
                                <a href="#">دروسنا <i class="feather-chevron-down"></i></a>
                                
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
                                                    <li><a href="#">teacher</a></li>
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
                </div>

                <div class="header-right">

                    <!-- Navbar Icons -->
                    <ul class="quick-access">
                        <li class="access-icon">
                            <a class="search-trigger-active rbt-round-btn" href="#">
                                <i class="feather-search"></i>
                            </a>
                        </li>

                        <li class="access-icon rbt-mini-cart">
                            <a class="rbt-cart-sidenav-activation rbt-round-btn" href="#">
                                <i class="feather-shopping-cart"></i>
                                <span class="rbt-cart-count">4</span>
                            </a>
                        </li>


                        <li class="access-icon rbt-user-wrapper d-block d-xl-none">
                            <a class="rbt-round-btn" href="#"><i class="feather-user"></i></a>
                            <div class="rbt-user-menu-list-wrapper">
                                <div class="inner">
                                    <div class="rbt-admin-profile">
                                        <div class="admin-thumbnail">
                                            <img src="{{ asset('assets/images/team/avatar.jpg') }}" alt="User Images">
                                        </div>
                                        <div class="admin-info">
                                            <span class="name">PixcelsIT</span>
                                            <a class="rbt-btn-link color-primary" href="{{ route('profile') }}">View Profile</a>
                                        </div>
                                    </div>
                                    
                                    <hr class="mt--10 mb--10">
                                    <ul class="user-list-wrapper">
                                        <li>
                                            <a href="#">
                                                <i class="feather-book-open"></i>
                                                <span>Getting Started</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <hr class="mt--10 mb--10">
                                    <ul class="user-list-wrapper">
                                       
                                    </ul>
                                </div>
                            </div>
                        </li>

                    </ul>

                    <div class="rbt-btn-wrapper d-none d-xl-block">
                        <a class="rbt-btn rbt-marquee-btn marquee-auto btn-border-gradient radius-round btn-sm hover-transform-none" href="{{ route('register') }}">
                            <span data-text="Enroll Now">Enroll Now</span>
                        </a>
                    </div>

                    <!-- Start Mobile-Menu-Bar -->
                    <div class="mobile-menu-bar d-block d-xl-none">
                        <div class="hamberger">
                            <button class="hamberger-button rbt-round-btn">
                                <i class="feather-menu"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Start Mobile-Menu-Bar -->

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

                <div class="row g-4 pt--30 pb--60">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <h5 class="rbt-title-style-2">Our Top Course</h5>
                        </div>
                    </div>

                    <!-- Start Single Card  -->
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <a href="{{ route('courseDetails') }}">
                                    <img src="{{ asset('assets/images/course/course-online-01.jpg') }}" alt="Card image">
                                </a>
                            </div>
                            <div class="rbt-card-body">
                                <h5 class="rbt-card-title"><a href="{{ route('courseDetails') }}">React Js</a>
                                </h5>
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
                                        <span class="current-price">$15</span>
                                        <span class="off-price">$25</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->

                    <!-- Start Single Card  -->
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <a href="{{ route('courseDetails') }}">
                                    <img src="{{ asset('assets/images/course/course-online-02.jpg') }}" alt="Card image">
                                </a>
                            </div>
                            <div class="rbt-card-body">
                                <h5 class="rbt-card-title"><a href="{{ route('courseDetails') }}">Java Program</a>
                                </h5>
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
                                        <span class="current-price">$10</span>
                                        <span class="off-price">$40</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->

                    <!-- Start Single Card  -->
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <a href="{{ route('courseDetails') }}">
                                    <img src="{{ asset('assets/images/course/course-online-03.jpg') }}" alt="Card image">
                                </a>
                            </div>
                            <div class="rbt-card-body">
                                <h5 class="rbt-card-title"><a href="{{ route('courseDetails') }}">Web Design</a>
                                </h5>
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
                                        <span class="current-price">$10</span>
                                        <span class="off-price">$20</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->

                    <!-- Start Single Card  -->
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="rbt-card variation-01 rbt-hover">
                            <div class="rbt-card-img">
                                <a href="{{ route('courseDetails') }}">
                                    <img src="{{ asset('assets/images/course/course-online-04.jpg') }}" alt="Card image">
                                </a>
                            </div>
                            <div class="rbt-card-body">
                                <h5 class="rbt-card-title"><a href="{{ route('courseDetails') }}">Web Design</a>
                                </h5>
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
                                        <span class="current-price">$20</span>
                                        <span class="off-price">$40</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Card  -->
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
                    <h4 class="title">Course Category</h4>
                </div>
                <div class="rbt-btn-close">
                    <button class="rbt-close-offcanvas rbt-round-btn"><i class="feather-x"></i></button>
                </div>
            </div>
            <nav class="side-nav w-100">
                <ul class="rbt-vertical-nav-list-wrapper vertical-nav-menu">
                    <li class="vertical-nav-item">
                        <a href="#">Course School</a>
                        <div class="vartical-nav-content-menu-wrapper">
                            <div class="vartical-nav-content-menu">
                                <h3 class="rbt-short-title">Course Title</h3>
                                <ul class="rbt-vertical-nav-list-wrapper">
                                    <li><a href="#">Web Design</a></li>
                                    <li><a href="#">Art</a></li>
                                    <li><a href="#">Figma</a></li>
                                    <li><a href="#">Adobe</a></li>
                                </ul>
                            </div>
                            <div class="vartical-nav-content-menu">
                                <h3 class="rbt-short-title">Course Title</h3>
                                <ul class="rbt-vertical-nav-list-wrapper">
                                    <li><a href="#">Photo</a></li>
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">Math</a></li>
                                    <li><a href="#">Read</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="vertical-nav-item">
                        <a href="#">Online School</a>
                        <div class="vartical-nav-content-menu-wrapper">
                            <div class="vartical-nav-content-menu">
                                <h3 class="rbt-short-title">Course Title</h3>
                                <ul class="rbt-vertical-nav-list-wrapper">
                                    <li><a href="#">Photo</a></li>
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">Math</a></li>
                                    <li><a href="#">Read</a></li>
                                </ul>
                            </div>
                            <div class="vartical-nav-content-menu">
                                <h3 class="rbt-short-title">Course Title</h3>
                                <ul class="rbt-vertical-nav-list-wrapper">
                                    <li><a href="#">Web Design</a></li>
                                    <li><a href="#">Art</a></li>
                                    <li><a href="#">Figma</a></li>
                                    <li><a href="#">Adobe</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="vertical-nav-item">
                        <a href="#">kindergarten</a>
                        <div class="vartical-nav-content-menu-wrapper">
                            <div class="vartical-nav-content-menu">
                                <h3 class="rbt-short-title">Course Title</h3>
                                <ul class="rbt-vertical-nav-list-wrapper">
                                    <li><a href="#">Photo</a></li>
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">Math</a></li>
                                    <li><a href="#">Read</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class="vertical-nav-item">
                        <a href="#">Classic LMS</a>
                        <div class="vartical-nav-content-menu-wrapper">
                            <div class="vartical-nav-content-menu">
                                <h3 class="rbt-short-title">Course Title</h3>
                                <ul class="rbt-vertical-nav-list-wrapper">
                                    <li><a href="#">Web Design</a></li>
                                    <li><a href="#">Art</a></li>
                                    <li><a href="#">Figma</a></li>
                                    <li><a href="#">Adobe</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
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