@extends('layout.layout')

@php
    $topToBottom = 'true';
    $footer = 'false';
@endphp

@section('content')
    <div class="popup-mobile-menu">
        <div class="inner-wrapper">
            <div class="inner-top">
                <div class="content">
                    <div class="logo">
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
                    <div class="rbt-btn-close">
                        <button class="close-button rbt-round-btn"><i class="feather-x"></i></button>
                    </div>
                </div>
                <p class="description">منصة فهمين التعليمية طريقك الأمثل للوصول لما تريد</p>
                <ul class="navbar-top-left rbt-information-list justify-content-start">
                    <li><a href="mailto:info@fahmean.com"><i class="feather-mail"></i>info@fahmean.com</a></li>
                    <li><a href="#"><i class="feather-phone"></i>(010) 735-8555</a></li>
                </ul>
            </div>
        </div>
    </div>

    <x-sideVav />
    <a class="close_side_menu" href="javascript:void(0);"></a>

    <div class="rbt-banner-area rbt-banner-3 header-transperent-spacer fahmean-register-page">
        <div class="wrapper">
            <div class="container">
                <div class="row g-5 align-items-start fahmean-register-row">
                    <div class="col-lg-4 order-1 order-lg-1 fahmean-register-visual-col">
                        <div class="fahmean-register-visual">
                            <div class="fahmean-register-visual-card">
                                <div class="fahmean-register-visual-header">اعمل حساب جديد</div>
                                <div class="fahmean-register-visual-copy">
                                    ابدأ رحلتك التعليمية على منصة فهمين وسجّل بياناتك كاملة للانضمام إلى المحتوى والدروس والمتابعة الأكاديمية.
                                </div>
                                <div class="fahmean-register-visual-image-wrap">
                                    <img src="{{ asset('assets/images/banner/banner-group-image.png') }}" alt="Register Illustration">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 order-2 order-lg-2 fahmean-register-form-col">
                        <div class="rbt-contact-form contact-form-style-1 max-width-auto fahmean-register-form-shell">
                            <div class="fahmean-register-form-header">
                                <h2 class="title">إنشاء حساب جديد</h2>
                                <p>املأ البيانات التالية للانضمام إلى منصة فهمين.</p>
                            </div>

                            @if ($errors->has('error'))
                                <div class="alert alert-danger mb--30">{{ $errors->first('error') }}</div>
                            @endif

                            @if(session('success'))
                                <div class="alert alert-success mb--30">{{ session('success') }}</div>
                            @endif

                            <form action="{{ route('register.post') }}" method="POST" id="freg-form" novalidate>
                                @csrf

                                <div class="freg-section-label"><span>البيانات الشخصية</span></div>
                                <div class="freg-grid">
                                    <div class="freg-group freg-grid-full freg-line-group {{ old('name') ? 'focused' : '' }}">
                                        <div class="freg-input-wrap">
                                            <input type="text" id="reg_name" name="name" class="freg-input freg-line-input" value="{{ old('name') }}" autocomplete="name" required>
                                            <label class="freg-floating-label" for="reg_name">الاسم بالكامل <span class="freg-label-required">*</span></label>
                                            <span class="focus-border"></span>
                                        </div>
                                        @error('name')<span class="freg-error"><i class="feather-alert-circle"></i> {{ $message }}</span>@enderror
                                    </div>

                                    <div class="freg-group freg-grid-full freg-line-group {{ old('email') ? 'focused' : '' }}">
                                        <div class="freg-input-wrap">
                                            <input type="email" id="reg_email" name="email" class="freg-input freg-line-input" value="{{ old('email') }}" autocomplete="email" required dir="ltr">
                                            <label class="freg-floating-label" for="reg_email">البريد الإلكتروني <span class="freg-label-required">*</span></label>
                                            <span class="focus-border"></span>
                                        </div>
                                        @error('email')<span class="freg-error"><i class="feather-alert-circle"></i> {{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="freg-section-label"><span>المسار التعليمي</span></div>
                                <div class="freg-academic-group">
                                    <div class="freg-group mb--30">
                                        <label class="freg-label">العام الدراسي الحالي <span class="freg-label-required">*</span></label>
                                        <div class="freg-input-wrap">
                                            <select id="reg_academic_year" name="academic_year" class="freg-input selectpicker" required>
                                                <option value="">اختر العام الدراسي</option>
                                                <option value="2024-2025" {{ old('academic_year') == '2024-2025' ? 'selected' : '' }}>2024 - 2025 (الحالي)</option>
                                                <option value="2025-2026" {{ old('academic_year') == '2025-2026' ? 'selected' : '' }}>2025 - 2026</option>
                                            </select>
                                            <i class="feather-calendar freg-input-icon"></i>
                                        </div>
                                    </div>

                                    <div class="freg-group mb--30">
                                        <label class="freg-label">المرحلة الدراسية <span class="freg-label-required">*</span></label>
                                        <input type="hidden" name="education_level_id" id="hidden_level_id" value="{{ old('education_level_id') }}">
                                        <div class="freg-academic-cards">
                                            @foreach($education_levels as $level)
                                                <div class="freg-level-card {{ old('education_level_id') == $level->id ? 'active' : '' }}" data-id="{{ $level->id }}">
                                                    <i class="freg-level-icon feather-{{ match(trim($level->name)) {
                                                        'المرحلة الابتدائية' => 'book',
                                                        'المرحلة الإعدادية' => 'award',
                                                        'المرحلة الثانوية' => 'user-check',
                                                        default => 'layers'
                                                    } }}"></i>
                                                    <span class="freg-level-name">{{ $level->name }}</span>
                                                </div>
                                            @endforeach
                                        </div>
                                        @error('education_level_id')<span class="freg-error"><i class="feather-alert-circle"></i> {{ $message }}</span>@enderror
                                    </div>

                                    <div class="freg-group mb-0">
                                        <label class="freg-label" for="reg_grade">الصف الدراسي <span class="freg-label-required">*</span></label>
                                        <div class="freg-input-wrap">
                                            <select id="reg_grade" name="grade_id" class="freg-input selectpicker" required disabled data-live-search="true" title="اختر الصف الدراسي">
                                                <option value="">اختر المرحلة أولاً</option>
                                            </select>
                                            <i class="feather-bookmark freg-input-icon"></i>
                                        </div>
                                        @error('grade_id')<span class="freg-error"><i class="feather-alert-circle"></i> {{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="freg-section-label"><span>أرقام التواصل</span></div>
                                <div class="freg-grid">
                                    <div class="freg-group freg-line-group {{ old('phone_number') ? 'focused' : '' }}">
                                        <div class="freg-input-wrap">
                                            <input type="tel" id="reg_phone" name="phone_number" class="freg-input freg-line-input" value="{{ old('phone_number') }}" maxlength="11" dir="ltr" required>
                                            <label class="freg-floating-label" for="reg_phone">رقم هاتف الطالب <span class="freg-label-required">*</span></label>
                                            <span class="focus-border"></span>
                                        </div>
                                        @error('phone_number')<span class="freg-error"><i class="feather-alert-circle"></i> {{ $message }}</span>@enderror
                                    </div>

                                    <div class="freg-group freg-line-group {{ old('parent_phone') ? 'focused' : '' }}">
                                        <div class="freg-input-wrap">
                                            <input type="tel" id="reg_parent_phone" name="parent_phone" class="freg-input freg-line-input" value="{{ old('parent_phone') }}" maxlength="11" dir="ltr" required>
                                            <label class="freg-floating-label" for="reg_parent_phone">رقم هاتف ولي الأمر <span class="freg-label-required">*</span></label>
                                            <span class="focus-border"></span>
                                        </div>
                                        @error('parent_phone')<span class="freg-error"><i class="feather-alert-circle"></i> {{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="freg-section-label"><span>كلمة المرور</span></div>
                                <div class="freg-grid">
                                    <div class="freg-group freg-line-group {{ old('password') ? 'focused' : '' }}">
                                        <div class="freg-input-wrap">
                                            <input type="password" id="reg_password" name="password" class="freg-input freg-line-input has-toggle freg-line-password" required autocomplete="new-password">
                                            <label class="freg-floating-label" for="reg_password">كلمة المرور <span class="freg-label-required">*</span></label>
                                            <button type="button" class="freg-pwd-toggle" onclick="togglePassword('reg_password', this)"><i class="feather-eye"></i></button>
                                            <span class="focus-border"></span>
                                        </div>
                                        <div class="freg-strength" id="strength-bar" style="display:none;">
                                            <div class="freg-strength-bars">
                                                <div class="freg-strength-bar" id="s1"></div>
                                                <div class="freg-strength-bar" id="s2"></div>
                                                <div class="freg-strength-bar" id="s3"></div>
                                                <div class="freg-strength-bar" id="s4"></div>
                                            </div>
                                            <span class="freg-strength-label" id="strength-text"></span>
                                        </div>
                                        @error('password')<span class="freg-error"><i class="feather-alert-circle"></i> {{ $message }}</span>@enderror
                                    </div>

                                    <div class="freg-group freg-line-group">
                                        <div class="freg-input-wrap">
                                            <input type="password" id="reg_password_confirm" name="password_confirmation" class="freg-input freg-line-input has-toggle freg-line-password" required autocomplete="new-password">
                                            <label class="freg-floating-label" for="reg_password_confirm">تأكيد كلمة المرور <span class="freg-label-required">*</span></label>
                                            <button type="button" class="freg-pwd-toggle" onclick="togglePassword('reg_password_confirm', this)"><i class="feather-eye"></i></button>
                                            <span class="focus-border"></span>
                                        </div>
                                        <span class="freg-error" id="pwd-match-error" style="display:none;"><i class="feather-alert-circle"></i> كلمتا المرور غير متطابقتين</span>
                                    </div>
                                </div>

                                <div class="freg-terms">
                                    <input type="checkbox" id="reg_terms" name="terms" required>
                                    <label for="reg_terms">أوافق على <a href="#">شروط الاستخدام</a> و<a href="#">سياسة الخصوصية</a> الخاصة بمنصة فاهمين</label>
                                </div>

                                <div class="freg-btn-wrap">
                                    <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse freg-btn" id="freg-submit-btn">
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text freg-btn-text">اعمل حساب جديد</span>
                                            <span class="btn-icon freg-btn-icon"><i class="feather-user-plus"></i></span>
                                            <span class="btn-icon freg-btn-icon"><i class="feather-user-plus"></i></span>
                                        </span>
                                        <div class="freg-spinner"></div>
                                    </button>
                                </div>

                                <div class="freg-login-link">لديك حساب بالفعل؟ <a href="{{ route('login') }}">سجّل دخولك الآن</a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="shape-wrapper">
                <div class="left-shape"><img src="{{ asset('assets/images/banner/right-shape.png') }}" alt="Banner Images"></div>
                <div class="top-shape"><img src="{{ asset('assets/images/banner/top-shape.png') }}" alt="Banner Images"></div>
                <div class="marque-images edumarque"></div>
            </div>
        </div>
    </div>

    <footer class="rbt-footer footer-style-1 bg-color-extra2" style="font-family: var(--font-secondary) !important;">
        <div class="footer-top">
            <div class="container">
                <div class="row row--15 mt_dec--30">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12 mt--30">
                        <div class="footer-widget">
                            <div class="logo logo-dark"><a href="#"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="Edu-cause"></a></div>
                            <div class="logo d-none logo-light"><a href="#"><img src="{{ asset('assets/images/dark/logo/logo-light.png') }}" alt="Edu-cause"></a></div>
                            <p class="description mt--20">نحن دائمًا نبحث عن الأشخاص الموهوبين والمتحمسين. لا تتردد قدم نفسك!</p>
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
                                <li><a href="{{ route('marketplace') }}">المتجر</a></li>
                                <li><a href="{{ route('kindergarten') }}">روضة أطفال</a></li>
                                <li><a href="{{ route('universityClassic') }}">الجامعة</a></li>
                                <li><a href="{{ route('gymCoaching') }}">تدريب الجيم</a></li>
                                <li><a href="{{ route('faqs') }}">الأسئلة الشائعة</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6 col-12 mt--30">
                        <div class="footer-widget">
                            <h3 class="ft-title">شركتنا</h3>
                            <ul class="ft-link">
                                <li><a href="{{ route('contact') }}">اتصل بنا</a></li>
                                <li><a href="{{ route('becomeTeacher') }}">كن معلمًا</a></li>
                                <li><a href="{{ route('blog') }}">المدونة</a></li>
                                <li><a href="#">المحاضر</a></li>
                                <li><a href="{{ route('eventList') }}">الأحداث</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt--30">
                        <div class="footer-widget">
                            <h3 class="ft-title">معلومات الاتصال</h3>
                            <ul class="ft-link">
                                <li><span>الهاتف:</span> <a href="#">(406) 555-0120</a></li>
                                <li><span>البريد الإلكتروني:</span> <a href="mailto:hr@example.com">info@fahmean.com</a></li>
                                <li><span>العنوان:</span> القاهرة، ج.م.ع</li>
                            </ul>
                            <ul class="social-icon social-default icon-naked justify-content-start mt--20">
                                <li><a href="https://www.facebook.com/"><i class="feather-facebook"></i></a></li>
                                <li><a href="https://www.twitter.com"><i class="feather-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/"><i class="feather-instagram"></i></a></li>
                                <li><a href="https://www.linkdin.com/"><i class="feather-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="rbt-separator-mid"><div class="container"><hr class="rbt-separator m-0"></div></div>
    <div class="copyright-area copyright-style-1 ptb--20">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12">
                    <p class="rbt-link-hover text-center text-lg-start">حقوق النشر © 2025 <a href="https://www.fahmean.com/">Fahmean.com</a> جميع الحقوق محفوظة</p>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12">
                    <ul class="copyright-link rbt-link-hover justify-content-center justify-content-lg-end mt_sm--10 mt_md--10">
                        <li><a href="#">شروط الخدمة</a></li>
                        <li><a href="{{ route('privacyPolicy') }}">سياسة الخصوصية</a></li>
                        <li><a href="{{ route('subscription') }}">الاشتراك</a></li>
                        <li><a href="{{ route('login') }}">تسجيل الدخول والتسجيل</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <style>
        .fahmean-register-page { overflow: hidden; }
        .fahmean-register-row { min-height: 920px; }
        .fahmean-register-form-col { width: 60%; flex: 0 0 60%; max-width: 60%; }
        .fahmean-register-visual-col { width: 40%; flex: 0 0 40%; max-width: 40%; }
        .fahmean-register-form-shell { width: 100% !important; max-width: 100% !important; margin: 0; position: relative; z-index: 2; padding: 35px 34px; }
        .fahmean-register-form-header { margin-bottom: 28px; text-align: center; }
        .fahmean-register-form-header .title { margin-bottom: 10px; }
        .fahmean-register-form-header p { margin: 0; color: var(--color-body); font-size: 15px; }
        .freg-section-label { display: flex; align-items: center; gap: 12px; margin: 26px 0 18px; }
        .freg-section-label::before, .freg-section-label::after { content: ''; flex: 1; height: 1px; background: rgba(69, 98, 155, 0.12); }
        .freg-section-label span { font-size: 13px; font-weight: 700; color: #45629b; white-space: nowrap; }
        .freg-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 18px; }
        .freg-grid-full { grid-column: 1 / -1; }
        .freg-group { display: flex; flex-direction: column; }
        .freg-label { font-size: 14px; font-weight: 600; color: #344767; margin-bottom: 10px; }
        .freg-label-required { color: #ec5b87; }
        .freg-input-wrap { position: relative; }
        .freg-input, .bootstrap-select > .dropdown-toggle { width: 100% !important; min-height: 58px; border: 1px solid rgba(69, 98, 155, 0.18) !important; background: #ffffff !important; border-radius: 14px !important; padding: 16px 48px 16px 16px !important; font-size: 15px !important; color: #1f1f25 !important; box-shadow: none !important; }
        .freg-input:focus, .bootstrap-select > .dropdown-toggle:focus { border-color: #7b61ff !important; box-shadow: 0 0 0 4px rgba(123, 97, 255, 0.08) !important; outline: none; }
        .bootstrap-select .filter-option, .bootstrap-select .dropdown-toggle .filter-option-inner-inner { text-align: right; color: #1f1f25; }
        .bootstrap-select .dropdown-menu { border-radius: 14px; border: 1px solid rgba(69, 98, 155, 0.14); box-shadow: 0 18px 35px rgba(31, 31, 37, 0.08); }
        .bootstrap-select .dropdown-menu li a { color: #1f1f25 !important; text-align: right; }
        .bootstrap-select .dropdown-menu li a:hover { background: rgba(123, 97, 255, 0.08) !important; }
        .freg-input-icon { position: absolute; top: 50%; right: 16px; transform: translateY(-50%); color: #7b61ff; font-size: 18px; pointer-events: none; z-index: 3; }
        .freg-pwd-toggle { position: absolute; top: 50%; left: 14px; transform: translateY(-50%); background: transparent; border: 0; color: #7c8aa5; padding: 0; }
        .freg-error { display: flex; align-items: center; gap: 6px; color: #d9534f; font-size: 13px; margin-top: 8px; }
        .freg-academic-group { margin-bottom: 6px; }
        .freg-academic-cards { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 12px; }
        .freg-level-card { background: #fff; border: 1px solid rgba(69, 98, 155, 0.16); border-radius: 16px; padding: 16px 12px; text-align: center; cursor: pointer; transition: 0.25s ease; }
        .freg-level-card:hover, .freg-level-card.active { border-color: #7b61ff; box-shadow: 0 12px 24px rgba(123, 97, 255, 0.12); transform: translateY(-2px); }
        .freg-level-icon { display: inline-flex; align-items: center; justify-content: center; width: 42px; height: 42px; border-radius: 50%; background: rgba(123, 97, 255, 0.08); color: #7b61ff; font-size: 18px; margin-bottom: 10px; }
        .freg-level-name { display: block; font-size: 13px; font-weight: 700; color: #344767; line-height: 1.6; }
        .freg-strength { display: flex; align-items: center; justify-content: space-between; gap: 12px; margin-top: 10px; }
        .freg-strength-bars { display: flex; gap: 8px; flex: 1; }
        .freg-strength-bar { height: 6px; border-radius: 999px; flex: 1; background: rgba(69, 98, 155, 0.12); }
        .freg-strength-label { font-size: 13px; font-weight: 700; }
        .freg-terms { display: flex; align-items: flex-start; gap: 10px; margin-top: 22px; color: #5f6b83; font-size: 14px; line-height: 1.8; }
        .freg-terms input { margin-top: 5px; }
        .freg-btn-wrap { margin-top: 24px; }
        .freg-btn { width: 100%; min-height: 58px; border-radius: 14px; position: relative; justify-content: center; }
        .freg-btn.loading { pointer-events: none; opacity: 0.8; }
        .freg-btn.loading .icon-reverse-wrapper { opacity: 0; }
        .freg-spinner { display: none; width: 22px; height: 22px; border: 3px solid rgba(255, 255, 255, 0.25); border-top-color: #fff; border-radius: 50%; animation: freg-spin 0.8s linear infinite; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); }
        .freg-btn.loading .freg-spinner { display: block; }
        .freg-login-link { text-align: center; margin-top: 20px; font-size: 15px; color: #5f6b83; }
        .freg-login-link a, .freg-terms a { color: #45629b; text-decoration: underline; }
        .fahmean-register-visual { position: relative; min-height: 760px; display: flex; align-items: flex-start; justify-content: center; padding: 0; }
        .fahmean-register-visual-card { width: 100%; max-width: 100%; min-height: 700px; border-radius: 24px; background: linear-gradient(180deg, rgba(158, 220, 251, 0.8) 0%, rgba(185, 236, 255, 0.8) 100%); box-shadow: 0 24px 60px rgba(38, 82, 156, 0.12); display: flex; flex-direction: column; align-items: center; justify-content: flex-start; overflow: hidden; position: relative; padding-top: 20px; }
        .fahmean-register-visual-card::before, .fahmean-register-visual-card::after { content: ''; position: absolute; border-radius: 50%; background: rgba(255, 255, 255, 0.2); }
        .fahmean-register-visual-card::before { width: 200px; height: 200px; top: 40px; right: 40px; }
        .fahmean-register-visual-card::after { width: 120px; height: 120px; top: 220px; left: 48px; }
        .fahmean-register-visual-header { margin-top: 18px; background: #211644; color: #ff9f10; font-size: 48px; font-weight: 800; line-height: 1.1; border-radius: 999px; padding: 18px 48px; position: relative; z-index: 2; }
        .fahmean-register-visual-copy { position: relative; z-index: 2; margin-top: 16px; max-width: 520px; text-align: center; font-size: 22px; line-height: 1.8; font-weight: 700; color: #22304d; padding: 0 24px; }
        .fahmean-register-visual-image-wrap { width: 100%; display: flex; align-items: flex-start; justify-content: center; flex: 1; position: relative; z-index: 2; padding: 0 20px 0; margin-top: 8px; }
        .fahmean-register-visual-image-wrap img { width: 100%; max-width: 560px; max-height: 430px; object-fit: contain; filter: drop-shadow(0 18px 35px rgba(29, 45, 88, 0.16)); }
        .freg-line-group .freg-input-wrap { position: relative; }
        .freg-line-input { border: 0 !important; border-bottom: 2px solid var(--color-border) !important; background: transparent !important; border-radius: 0 !important; padding: 24px 0 8px !important; box-shadow: none !important; }
        .freg-line-input:focus { border-color: transparent !important; box-shadow: none !important; }
        .freg-floating-label { position: absolute; right: 0; top: 12px; font-size: 18px; line-height: 28px; color: var(--color-body); transition: 0.3s; pointer-events: none; }
        .freg-line-group .focus-border { position: absolute; right: 0; bottom: 0; width: 0; height: 2px; background-color: var(--color-primary); transition: 0.4s; }
        .freg-line-group.focused .freg-floating-label { top: -10px; font-size: 12px; color: var(--color-primary); }
        .freg-line-group.focused .focus-border { width: 100%; }
        .freg-line-group input[dir="ltr"] { text-align: right !important; }
        .freg-line-password { padding-left: 32px !important; }
        .active-dark-mode .freg-label,
        .active-dark-mode .freg-terms label {
            color: #ffffff;
        }
        .active-dark-mode .freg-input::placeholder,
        .active-dark-mode .freg-input::-webkit-input-placeholder,
        .active-dark-mode .freg-input::-moz-placeholder,
        .active-dark-mode .freg-input:-ms-input-placeholder,
        .active-dark-mode .freg-input::-ms-input-placeholder {
            color: #c7d0df !important;
            opacity: 1;
        }
        .active-dark-mode .bootstrap-select > .dropdown-toggle.bs-placeholder .filter-option-inner-inner,
        .active-dark-mode .bootstrap-select > .dropdown-toggle.bs-placeholder .filter-option {
            color: #c7d0df !important;
        }
        @keyframes freg-spin { to { transform: translate(-50%, -50%) rotate(360deg); } }
        @media (max-width: 1199px) {
            .fahmean-register-row { min-height: auto; }
            .fahmean-register-form-col, .fahmean-register-visual-col { width: 100%; flex: 0 0 100%; max-width: 100%; }
            .fahmean-register-form-shell { max-width: 100%; padding: 30px 24px; }
            .fahmean-register-visual { min-height: 620px; padding: 0; }
            .fahmean-register-visual-card { min-height: 620px; }
            .fahmean-register-visual-header { font-size: 38px; }
            .fahmean-register-visual-copy { font-size: 18px; }
        }
        @media (max-width: 991px) {
            .freg-grid { grid-template-columns: 1fr; }
            .freg-academic-cards { grid-template-columns: 1fr; }
            .fahmean-register-visual { display: none; }
            .fahmean-register-form-shell { margin: 0 auto 40px; }
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function togglePassword(inputId, btn) {
            const input = document.getElementById(inputId);
            const icon = btn.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'feather-eye-off';
            } else {
                input.type = 'password';
                icon.className = 'feather-eye';
            }
        }

        const pwdInput = document.getElementById('reg_password');
        const strengthBar = document.getElementById('strength-bar');
        const bars = [document.getElementById('s1'), document.getElementById('s2'), document.getElementById('s3'), document.getElementById('s4')];
        const strengthText = document.getElementById('strength-text');

        const strengths = [
            { color: '#ef4444', label: 'ضعيفة', text_color: '#ef4444' },
            { color: '#f97316', label: 'مقبولة', text_color: '#f97316' },
            { color: '#eab308', label: 'جيدة', text_color: '#eab308' },
            { color: '#22c55e', label: 'قوية', text_color: '#22c55e' },
        ];

        pwdInput.addEventListener('input', function() {
            const val = this.value;
            if (!val) { strengthBar.style.display = 'none'; return; }
            strengthBar.style.display = 'flex';
            let score = 0;
            if (val.length >= 8) score++;
            if (/[A-Z]/.test(val)) score++;
            if (/[0-9]/.test(val)) score++;
            if (/[^A-Za-z0-9]/.test(val)) score++;
            score = Math.max(1, score);
            bars.forEach((bar, i) => { bar.style.background = i < score ? strengths[score - 1].color : 'rgba(69, 98, 155, 0.12)'; });
            strengthText.textContent = strengths[score - 1].label;
            strengthText.style.color = strengths[score - 1].text_color;
        });

        document.getElementById('reg_password_confirm').addEventListener('input', function() {
            const matchErr = document.getElementById('pwd-match-error');
            if (this.value && this.value !== pwdInput.value) {
                matchErr.style.display = 'flex';
            } else {
                matchErr.style.display = 'none';
            }
        });

        $(document).ready(function () {
            $('.freg-line-group .freg-line-input').each(function () {
                const input = $(this);
                const group = input.closest('.freg-line-group');
                const syncState = () => {
                    if (input.val()) {
                        group.addClass('focused');
                    } else {
                        group.removeClass('focused');
                    }
                };

                input.on('focus', function () {
                    group.addClass('focused');
                });

                input.on('blur input', syncState);
                syncState();
            });

            $('.freg-level-card').on('click', function () {
                const levelId = $(this).data('id');
                $('.freg-level-card').removeClass('active');
                $(this).addClass('active');
                $('#hidden_level_id').val(levelId);
                loadGrades(levelId);
            });

            function loadGrades(levelId, savedGrade = null) {
                const gradeSelect = $('#reg_grade');
                if (!levelId) {
                    gradeSelect.html('<option value="">اختر المرحلة أولاً</option>').prop('disabled', true);
                    if (gradeSelect.hasClass('selectpicker')) gradeSelect.selectpicker('refresh');
                    return;
                }

                gradeSelect.html('<option value="">جاري التحميل...</option>').prop('disabled', true);
                if (gradeSelect.hasClass('selectpicker')) gradeSelect.selectpicker('refresh');

                const url = "{{ url('get-grades') }}/" + levelId;
                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function (data) {
                        gradeSelect.html('<option value="">اختر الصف الدراسي</option>');
                        if (data.length === 0) {
                            gradeSelect.append('<option value="">لا توجد صفوف لهذه المرحلة</option>');
                        } else {
                            $.each(data, function (i, grade) {
                                gradeSelect.append('<option value="' + grade.id + '"' + (grade.id == savedGrade ? ' selected' : '') + '>' + grade.name + '</option>');
                            });
                        }
                        gradeSelect.prop('disabled', false);
                        if (gradeSelect.hasClass('selectpicker')) gradeSelect.selectpicker('refresh');
                    },
                    error: function () {
                        gradeSelect.html('<option value="">حدث خطأ في تحميل البيانات</option>').prop('disabled', false);
                        if (gradeSelect.hasClass('selectpicker')) gradeSelect.selectpicker('refresh');
                    }
                });
            }

            const oldLevel = $('#hidden_level_id').val();
            const oldGrade = '{{ old("grade_id") }}';
            if (oldLevel) {
                loadGrades(oldLevel, oldGrade);
            }
        });

        document.getElementById('freg-form').addEventListener('submit', function(e) {
            const btn = document.getElementById('freg-submit-btn');
            const pwd = document.getElementById('reg_password').value;
            const pwdConfirm = document.getElementById('reg_password_confirm').value;
            const terms = document.getElementById('reg_terms').checked;
            if (pwd !== pwdConfirm) {
                document.getElementById('pwd-match-error').style.display = 'flex';
                e.preventDefault();
                return;
            }
            if (!terms) {
                alert('يرجى الموافقة على شروط الاستخدام أولاً');
                e.preventDefault();
                return;
            }
            btn.classList.add('loading');
            btn.disabled = true;
        });

        ['reg_phone', 'reg_parent_phone'].forEach(function(id) {
            document.getElementById(id).addEventListener('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
        });
    </script>
@endsection
