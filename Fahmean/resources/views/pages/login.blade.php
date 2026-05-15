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
                    <li>
                        <a href="mailto:info@fahmean.com"><i class="feather-mail"></i>info@fahmean.com</a>
                    </li>
                    <li>
                        <a href="#"><i class="feather-phone"></i>(010) 735-8555</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <x-sideVav />
    <a class="close_side_menu" href="javascript:void(0);"></a>

    <div class="rbt-banner-area rbt-banner-3 header-transperent-spacer fahmean-login-page">
        <div class="wrapper">
            <div class="container">
                <div class="row g-5 align-items-center fahmean-login-row">
                    <div class="col-lg-7 order-1 order-lg-1">
                        <div class="fahmean-login-visual">
                            <div class="fahmean-login-visual-card">
                                <div class="fahmean-login-visual-header">تسجيل الدخول</div>
                                <div class="fahmean-login-visual-image-wrap">
                                    <img src="{{ asset('assets/images/banner/banner-01.png') }}" alt="Login Illustration">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 order-2 order-lg-2">
                        <div class="rbt-contact-form contact-form-style-1 max-width-auto fahmean-login-form">
                            <center>
                                <h2 class="title">تسجيل الدخول</h2>
                            </center>

                            @if ($errors->any())
                                <div class="alert alert-danger mb--30" role="alert">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="max-width-auto" action="{{ route('login.post') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input name="email" type="text" value="{{ old('email') }}" />
                                    <label>البريد الإلكتروني *</label>
                                    <span class="focus-border"></span>
                                </div>

                                <div class="form-group">
                                    <input name="password" type="password" />
                                    <label>كلمة السر *</label>
                                    <span class="focus-border"></span>
                                </div>

                                <div class="row mb--30">
                                    <div class="col-lg-6">
                                        <div class="rbt-checkbox">
                                            <input type="checkbox" id="rememberme" name="remember" {{ old('remember') ? 'checked' : '' }}>
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
                                        style="font-size: 14px; font-weight: 500; text-align: center;">
                                        جديد معنا؟ <a class="rbt-btn-link" href="{{ route('register') }}">أنشئ حساب جديد</a>
                                    </span>
                                </div>
                            </form>
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
    </div>


    <style>
        .fahmean-login-page {
            overflow: hidden;
        }

        .fahmean-login-row {
            min-height: 640px;
        }

        .fahmean-login-form {
            max-width: 560px;
            margin: 0;
            position: relative;
            z-index: 2;
        }

        .fahmean-login-form .alert ul {
            padding-right: 18px;
        }

        .fahmean-login-form .title {
            margin-bottom: 35px;
        }

        .fahmean-login-visual {
            position: relative;
            min-height: 560px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 10px 0 40px;
        }

        .fahmean-login-visual-card {
            width: 100%;
            max-width: 720px;
            min-height: 560px;
            border-radius: 24px;
            background: linear-gradient(180deg, rgba(158, 220, 251, 0.8) 0%, rgba(185, 236, 255, 0.8) 100%);
            box-shadow: 0 24px 60px rgba(38, 82, 156, 0.12);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            overflow: hidden;
            position: relative;
        }

        .fahmean-login-visual-card::before,
        .fahmean-login-visual-card::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
        }

        .fahmean-login-visual-card::before {
            width: 180px;
            height: 180px;
            top: 40px;
            right: 40px;
        }

        .fahmean-login-visual-card::after {
            width: 110px;
            height: 110px;
            top: 180px;
            left: 55px;
        }

        .fahmean-login-visual-header {
            margin-top: 34px;
            background: #211644;
            color: #ff9f10;
            font-size: 54px;
            font-weight: 800;
            line-height: 1.1;
            border-radius: 999px;
            padding: 18px 54px;
            position: relative;
            z-index: 2;
        }

        .fahmean-login-visual-image-wrap {
            width: 100%;
            display: flex;
            align-items: flex-end;
            justify-content: center;
            flex: 1;
            position: relative;
            z-index: 2;
            padding: 10px 30px 0;
        }

        .fahmean-login-visual-image-wrap img {
            width: 100%;
            max-width: 560px;
            max-height: 460px;
            object-fit: contain;
            filter: drop-shadow(0 18px 35px rgba(29, 45, 88, 0.18));
        }

        @media (max-width: 1199px) {
            .fahmean-login-row {
                min-height: auto;
            }

            .fahmean-login-form {
                max-width: 100%;
            }

            .fahmean-login-visual {
                min-height: 500px;
                padding: 0;
            }

            .fahmean-login-visual-card {
                min-height: 500px;
            }

            .fahmean-login-visual-header {
                font-size: 42px;
            }
        }

        @media (max-width: 991px) {
            .fahmean-login-visual {
                display: none;
            }

            .fahmean-login-form {
                margin: 0 auto 40px;
            }
        }
    </style>
@endsection
