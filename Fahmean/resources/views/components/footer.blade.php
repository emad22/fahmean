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
                            <a class="rbt-btn hover-icon-reverse btn-border-gradient radius-round"
                                href="{{ route('contact.show') }}">
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
                                <a href="#">المتجر</a>
                            </li>
                            <li>
                                <a href="#">روضة أطفال</a>
                            </li>
                            <li>
                                <a href="#">الجامعة</a>
                            </li>

                            <li>
                                <a href="{{ route('faqs') }}">الأسئلة الشائعة</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 col-sm-6 col-12 mt--30">
                    <div class="footer-widget">
                        <h3 class="ft-title">منصة فاهمين</h3>
                        <ul class="ft-link">
                            <li>
                                <a href="{{ route('contact.show') }}">اتصل بنا</a>
                            </li>
                            <li>
                                <a href="{{ route('teacher.request.create') }}">كن معلمًا</a>
                            </li>
                            <li>
                                <a href="#">المدونة</a>
                            </li>
                            <li>
                                <a href="#">المحاضر</a>
                            </li>

                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt--30">
                    <div class="footer-widget">
                        <h3 class="ft-title">معلومات الاتصال</h3>
                        <ul class="ft-link">
                            <li><span>الهاتف والواتس:</span> <a href="tel:01007358554">01007358554</a></li>
                            <li><span>البريد الإلكتروني:</span> <a href="mailto:info@ustazy.com">info@ustazy.com</a>
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
                        href="https://fahmean.ustazy.com">Fahmean.ustazy.com</a> جميع الحقوق محفوظة</p>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12">
                <ul
                    class="copyright-link rbt-link-hover justify-content-center justify-content-lg-end mt_sm--10 mt_md--10">
                    <li><a href="#">شروط الخدمة</a></li>
                    <li><a href="{{ route('privacyPolicy') }}">سياسة الخصوصية</a></li>
                    <li><a href="#">الاشتراك</a></li>
                    <li><a href="{{ route('login') }}">تسجيل الدخول والتسجيل</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Copyright Area  -->
