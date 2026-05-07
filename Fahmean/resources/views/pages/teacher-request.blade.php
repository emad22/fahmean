@extends('layout.layout')

@php
    $topToBottom = 'true';
    $footer = 'true';
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
                                <img src="{{ asset('assets/images/dark/logo/logo-light.png') }}"
                                    alt="Education Logo Images">
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

    <div class="rbt-banner-area rbt-banner-3 header-transperent-spacer fahmean-teacher-page">
        <div class="wrapper">
            <div class="container">
                <div class="row g-5 align-items-start fahmean-teacher-row">
                    <!-- Visual Column (1/3) -->
                    <div class="col-lg-4 order-1 order-lg-1 fahmean-teacher-visual-col">
                        <div class="fahmean-teacher-visual">
                            <div class="fahmean-teacher-visual-card">
                                <div class="fahmean-teacher-visual-header">كن معلماً</div>
                                <div class="fahmean-teacher-visual-copy">
                                    ابدأ رحلتك كمعلم على منصة فاهمين وسجّل بياناتك كاملة للانضمام إلى فريق فاهمين وتمتع
                                    بسهولة استخدام المنصة التعليمية
                                </div>
                                <div class="fahmean-teacher-visual-image-wrap">
                                    <img src="{{ asset('assets/images/banner/banner-01.png') }}" alt="Teacher Illustration">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form Column (2/3) -->
                    <div class="col-lg-8 order-2 order-lg-2 fahmean-teacher-form-col">
                        <div class="rbt-contact-form contact-form-style-1 max-width-auto fahmean-teacher-form-shell">
                            <div class="fahmean-teacher-form-header">
                                <h2 class="title">انضم إلينا كمعلم</h2>
                                <p>املأ البيانات التالية وسنقوم بالتواصل معك في أقرب وقت.</p>
                            </div>

                            @if(session('success'))
                                <div class="alert alert-success mb--30">{{ session('success') }}</div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger mb--30">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('teacher.request.store') }}" method="POST" id="teacher-form" novalidate>
                                @csrf

                                <div class="freg-grid">
                                    <div class="freg-group">
                                        <label class="freg-label" for="academic_level">المرحلة الدراسية <span
                                                class="freg-label-required">*</span></label>
                                        <div class="freg-input-wrap">
                                            <select id="academic_level" name="academic_level"
                                                class="freg-input freg-line-input" required
                                                style="padding: 18px 0 8px !important; height: auto;">
                                                <option value="" disabled selected>اختر المرحلة الدراسية</option>
                                                <option value="المرحلة الإعدادية" {{ old('academic_level') == 'المرحلة الإعدادية' ? 'selected' : '' }}>المرحلة الإعدادية</option>
                                                <option value="المرحلة الثانوية" {{ old('academic_level') == 'المرحلة الثانوية' ? 'selected' : '' }}>المرحلة الثانوية</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="freg-group">
                                        <label class="freg-label" for="subject_name">المادة الدراسية <span
                                                class="freg-label-required">*</span></label>
                                        <div class="freg-input-wrap">
                                            <input type="text" id="subject_name" name="subject_name"
                                                class="freg-input freg-line-input" value="{{ old('subject_name') }}"
                                                required style="padding: 18px 0 8px !important;">
                                        </div>
                                    </div>
                                </div>

                                <div class="freg-grid">
                                    <div class="freg-group freg-line-group {{ old('frist_name') ? 'focused' : '' }}">
                                        <div class="freg-input-wrap">
                                            <input type="text" id="frist_name" name="frist_name"
                                                class="freg-input freg-line-input" value="{{ old('frist_name') }}" required>
                                            <label class="freg-floating-label" for="frist_name">الاسم الأول <span
                                                    class="freg-label-required">*</span></label>
                                            <span class="focus-border"></span>
                                        </div>
                                    </div>

                                    <div class="freg-group freg-line-group {{ old('last_name') ? 'focused' : '' }}">
                                        <div class="freg-input-wrap">
                                            <input type="text" id="last_name" name="last_name"
                                                class="freg-input freg-line-input" value="{{ old('last_name') }}" required>
                                            <label class="freg-floating-label" for="last_name">اسم العائلة <span
                                                    class="freg-label-required">*</span></label>
                                            <span class="focus-border"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="freg-grid">
                                    <div class="freg-group freg-line-group {{ old('email') ? 'focused' : '' }}">
                                        <div class="freg-input-wrap">
                                            <input type="email" id="email" name="email" class="freg-input freg-line-input"
                                                value="{{ old('email') }}" required dir="ltr">
                                            <label class="freg-floating-label" for="email">البريد الإلكتروني <span
                                                    class="freg-label-required">*</span></label>
                                            <span class="focus-border"></span>
                                        </div>
                                    </div>

                                    <div class="freg-group freg-line-group {{ old('phone_num') ? 'focused' : '' }}">
                                        <div class="freg-input-wrap">
                                            <input type="tel" id="phone_num" name="phone_num"
                                                class="freg-input freg-line-input" value="{{ old('phone_num') }}" required
                                                dir="ltr">
                                            <label class="freg-floating-label" for="phone_num">رقم الهاتف <span
                                                    class="freg-label-required">*</span></label>
                                            <span class="focus-border"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="freg-group freg-line-group {{ old('address') ? 'focused' : '' }}">
                                    <div class="freg-input-wrap">
                                        <input type="text" id="address" name="address" class="freg-input freg-line-input"
                                            value="{{ old('address') }}" required>
                                        <label class="freg-floating-label" for="address">العنوان <span
                                                class="freg-label-required">*</span></label>
                                        <span class="focus-border"></span>
                                    </div>
                                </div>

                                <div class="freg-group freg-line-group {{ old('work_experience') ? 'focused' : '' }}">
                                    <div class="freg-input-wrap">
                                        <textarea id="work_experience" name="work_experience"
                                            class="freg-input freg-line-textarea" rows="2"
                                            required>{{ old('work_experience') }}</textarea>
                                        <label class="freg-floating-label" for="work_experience">الخبرة السابقة <span
                                                class="freg-label-required">*</span></label>
                                        <span class="focus-border"></span>
                                    </div>
                                </div>

                                <div class="freg-grid">
                                    <div class="freg-group freg-line-group {{ old('facebook_link') ? 'focused' : '' }}">
                                        <div class="freg-input-wrap">
                                            <input type="text" id="facebook_link" name="facebook_link"
                                                class="freg-input freg-line-input" value="{{ old('facebook_link') }}">
                                            <label class="freg-floating-label" for="facebook_link">رابط صفحة التواصل
                                                الاجتماعي</label>
                                            <span class="focus-border"></span>
                                        </div>
                                    </div>

                                    <div class="freg-group freg-line-group {{ old('students_num') ? 'focused' : '' }}">
                                        <div class="freg-input-wrap">
                                            <input type="number" id="students_num" name="students_num"
                                                class="freg-input freg-line-input" value="{{ old('students_num') }}">
                                            <label class="freg-floating-label" for="students_num">عدد الطلاب المتوقع</label>
                                            <span class="focus-border"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="freg-btn-wrap">
                                    <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse freg-btn">
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text">إرسال الطلب</span>
                                            <span class="btn-icon"><i class="feather-arrow-left"></i></span>
                                            <span class="btn-icon"><i class="feather-arrow-left"></i></span>
                                        </span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="shape-wrapper">
                <div class="left-shape"><img src="{{ asset('assets/images/banner/right-shape.png') }}" alt="Banner Images">
                </div>
                <div class="top-shape"><img src="{{ asset('assets/images/banner/top-shape.png') }}" alt="Banner Images">
                </div>
                <div class="marque-images edumarque"></div>
            </div>
        </div>
    </div>

    <style>
        .fahmean-teacher-page {
            overflow: hidden;
        }

        .fahmean-teacher-row {
            min-height: 920px;
        }

        .fahmean-teacher-form-col {
            width: 60%;
            flex: 0 0 60%;
            max-width: 60%;
        }

        .fahmean-teacher-visual-col {
            width: 40%;
            flex: 0 0 40%;
            max-width: 40%;
        }

        .fahmean-teacher-form-shell {
            width: 100% !important;
            max-width: 100% !important;
            margin: 0;
            position: relative;
            z-index: 2;
            padding: 35px 34px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.05);
        }

        .fahmean-teacher-form-header {
            margin-bottom: 28px;
            text-align: center;
        }

        .fahmean-teacher-form-header .title {
            margin-bottom: 10px;
        }

        .fahmean-teacher-form-header p {
            margin: 0;
            color: var(--color-body);
            font-size: 15px;
        }

        .freg-label {
            font-size: 14px;
            font-weight: 600;
            color: #344767;
            display: block;
            margin-bottom: 8px;
        }

        .freg-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .freg-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 24px;
        }

        .freg-label-required {
            color: #ec5b87;
        }

        .freg-input-wrap {
            position: relative;
        }

        .freg-line-input,
        .freg-line-textarea {
            width: 100% !important;
            border: 0 !important;
            border-bottom: 2px solid var(--color-border) !important;
            background: transparent !important;
            border-radius: 0 !important;
            padding: 24px 0 8px !important;
            box-shadow: none !important;
            color: #1f1f25 !important;
            font-size: 15px !important;
        }

        .freg-line-textarea {
            height: auto !important;
            padding-top: 32px !important;
        }

        .freg-line-input:focus,
        .freg-line-textarea:focus {
            border-color: transparent !important;
            outline: none;
        }

        .freg-floating-label {
            position: absolute;
            right: 0;
            top: 12px;
            font-size: 18px;
            line-height: 28px;
            color: var(--color-body);
            transition: 0.3s;
            pointer-events: none;
        }

        .freg-line-group .focus-border {
            position: absolute;
            right: 0;
            bottom: 0;
            width: 0;
            height: 2px;
            background-color: var(--color-primary);
            transition: 0.4s;
        }

        .freg-line-group.focused .freg-floating-label {
            top: -10px;
            font-size: 12px;
            color: var(--color-primary);
        }

        .freg-line-group.focused .focus-border {
            width: 100%;
        }

        .freg-btn-wrap {
            margin-top: 24px;
        }

        .freg-btn {
            width: 100%;
            min-height: 58px;
            border-radius: 14px;
            position: relative;
            justify-content: center;
        }

        .fahmean-teacher-visual {
            position: relative;
            min-height: 760px;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 0;
        }

        .fahmean-teacher-visual-card {
            width: 100%;
            max-width: 100%;
            min-height: 700px;
            border-radius: 24px;
            background: linear-gradient(180deg, rgba(158, 220, 251, 0.8) 0%, rgba(185, 236, 255, 0.8) 100%);
            box-shadow: 0 24px 60px rgba(38, 82, 156, 0.12);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            overflow: hidden;
            position: relative;
            padding-top: 20px;
        }

        .fahmean-teacher-visual-card::before,
        .fahmean-teacher-visual-card::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
        }

        .fahmean-teacher-visual-card::before {
            width: 200px;
            height: 200px;
            top: 40px;
            right: 40px;
        }

        .fahmean-teacher-visual-card::after {
            width: 120px;
            height: 120px;
            top: 220px;
            left: 48px;
        }

        .fahmean-teacher-visual-header {
            margin-top: 18px;
            background: #211644;
            color: #ff9f10;
            font-size: 48px;
            font-weight: 800;
            line-height: 1.1;
            border-radius: 999px;
            padding: 18px 48px;
            position: relative;
            z-index: 2;
        }

        .fahmean-teacher-visual-copy {
            position: relative;
            z-index: 2;
            margin-top: 16px;
            max-width: 520px;
            text-align: center;
            font-size: 22px;
            line-height: 1.8;
            font-weight: 700;
            color: #22304d;
            padding: 0 24px;
        }

        .fahmean-teacher-visual-image-wrap {
            width: 100%;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            flex: 1;
            position: relative;
            z-index: 2;
            padding: 0 20px 0;
            margin-top: 8px;
        }

        .fahmean-teacher-visual-image-wrap img {
            width: 100%;
            max-width: 560px;
            max-height: 430px;
            object-fit: contain;
            filter: drop-shadow(0 18px 35px rgba(29, 45, 88, 0.16));
        }

        @media (max-width: 1199px) {
            .fahmean-teacher-row {
                min-height: auto;
            }

            .fahmean-teacher-form-col,
            .fahmean-teacher-visual-col {
                width: 100%;
                flex: 0 0 100%;
                max-width: 100%;
            }

            .fahmean-teacher-form-shell {
                max-width: 100%;
                padding: 30px 24px;
            }

            .fahmean-teacher-visual {
                min-height: 620px;
                padding: 0;
            }

            .fahmean-teacher-visual-card {
                min-height: 620px;
            }

            .fahmean-teacher-visual-header {
                font-size: 38px;
            }

            .fahmean-teacher-visual-copy {
                font-size: 18px;
            }
        }

        @media (max-width: 991px) {
            .freg-grid {
                grid-template-columns: 1fr;
            }

            .fahmean-teacher-visual {
                display: none;
            }

            .fahmean-teacher-form-shell {
                margin: 0 auto 40px;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.freg-line-group input, .freg-line-group textarea, .freg-line-group select').forEach(function (el) {
                const group = el.closest('.freg-line-group');

                const syncState = () => {
                    if (el.value.trim() !== '') {
                        group.classList.add('focused');
                    } else if (document.activeElement !== el) {
                        group.classList.remove('focused');
                    }
                };

                el.addEventListener('focus', () => group.classList.add('focused'));
                el.addEventListener('blur', syncState);
                el.addEventListener('input', syncState);
                syncState();
            });
        });
    </script>
@endsection