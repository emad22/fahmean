@extends('layout.layout')

@php
    $topToBottom = 'true';
    $footer = 'true';
@endphp

@section('content')


    <div class="rbt-banner-area rbt-banner-3 header-transperent-spacer fahmean-contact-page">
        <div class="wrapper">
            <div class="container">
                <div class="row g-5 align-items-start fahmean-contact-row">
                    <div class="col-lg-4 order-1 order-lg-1 fahmean-contact-visual-col">
                        <div class="fahmean-contact-visual">
                            <div class="fahmean-contact-visual-card">
                                <div class="fahmean-contact-visual-header">اتصل بنا</div>
                                <div class="fahmean-contact-visual-copy">
                                    نحن هنا للإجابة عن استفساراتك ومساعدتك في كل ما يخص المنصة والدورات والحسابات.
                                </div>
                                <div class="fahmean-contact-visual-image-wrap">
                                    <img src="{{ asset('assets/images/banner/banner-01.png') }}" alt="Contact Illustration">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 order-2 order-lg-2 fahmean-contact-form-col">
                        <div class="rbt-contact-form contact-form-style-1 max-width-auto fahmean-contact-form-shell">
                            <div class="fahmean-contact-form-header">
                                <h2 class="title">اتصل بنا</h2>
                                <p>أرسل لنا رسالتك وسنقوم بالرد عليك في أقرب وقت ممكن.</p>
                            </div>

                            @if(session('success'))
                                <div class="alert alert-success mb--30">{{ session('success') }}</div>
                            @endif

                            <form action="{{ route('contact.send') }}" method="POST" class="max-width-auto" novalidate>
                                @csrf

                                <div class="freg-grid">
                                    <div class="freg-group freg-line-group {{ old('name') ? 'focused' : '' }}">
                                        <div class="freg-input-wrap">
                                            <input type="text" id="name" name="name" class="freg-input freg-line-input"
                                                value="{{ old('name') }}" required>
                                            <label class="freg-floating-label" for="name">الاسم <span
                                                    class="freg-label-required">*</span></label>
                                            <span class="focus-border"></span>
                                        </div>
                                    </div>

                                    <div class="freg-group freg-line-group {{ old('email') ? 'focused' : '' }}">
                                        <div class="freg-input-wrap">
                                            <input type="email" id="email" name="email" class="freg-input freg-line-input"
                                                value="{{ old('email') }}" required dir="ltr">
                                            <label class="freg-floating-label" for="email">البريد الإلكتروني <span
                                                    class="freg-label-required">*</span></label>
                                            <span class="focus-border"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="freg-group freg-line-group {{ old('subject') ? 'focused' : '' }}">
                                    <div class="freg-input-wrap">
                                        <input type="text" id="subject" name="subject" class="freg-input freg-line-input"
                                            value="{{ old('subject') }}" required>
                                        <label class="freg-floating-label" for="subject">عنوان الرسالة <span
                                                class="freg-label-required">*</span></label>
                                        <span class="focus-border"></span>
                                    </div>
                                </div>

                                <div class="freg-group freg-line-group {{ old('message') ? 'focused' : '' }}">
                                    <div class="freg-input-wrap">
                                        <textarea id="message" name="message" class="freg-input freg-line-textarea" rows="5"
                                            required>{{ old('message') }}</textarea>
                                        <label class="freg-floating-label" for="message">الرسالة <span
                                                class="freg-label-required">*</span></label>
                                        <span class="focus-border"></span>
                                    </div>
                                </div>

                                <div class="freg-btn-wrap">
                                    <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse freg-btn">
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text freg-btn-text">إرسال الرسالة</span>
                                            <span class="btn-icon freg-btn-icon"><i class="feather-send"></i></span>
                                            <span class="btn-icon freg-btn-icon"><i class="feather-send"></i></span>
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
        .fahmean-contact-page {
            overflow: hidden;
        }

        .fahmean-contact-row {
            min-height: 920px;
        }

        .fahmean-contact-form-col {
            width: 60%;
            flex: 0 0 60%;
            max-width: 60%;
        }

        .fahmean-contact-visual-col {
            width: 40%;
            flex: 0 0 40%;
            max-width: 40%;
        }

        .fahmean-contact-form-shell {
            width: 100% !important;
            max-width: 100% !important;
            margin: 0;
            position: relative;
            z-index: 2;
            padding: 35px 34px;
        }

        .fahmean-contact-form-header {
            margin-bottom: 28px;
            text-align: center;
        }

        .fahmean-contact-form-header .title {
            margin-bottom: 10px;
        }

        .fahmean-contact-form-header p {
            margin: 0;
            color: var(--color-body);
            font-size: 15px;
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
            box-shadow: none !important;
            color: #1f1f25 !important;
            font-size: 15px !important;
            padding-right: 0 !important;
            padding-left: 0 !important;
        }

        .freg-line-input {
            min-height: 58px;
            padding-top: 24px !important;
            padding-bottom: 8px !important;
        }

        .freg-line-textarea {
            min-height: 140px;
            padding-top: 32px !important;
            padding-bottom: 12px !important;
            resize: vertical;
        }

        .freg-line-input:focus,
        .freg-line-textarea:focus {
            border-color: transparent !important;
            box-shadow: none !important;
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

        .freg-line-group input[dir="ltr"] {
            text-align: right !important;
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

        .fahmean-contact-visual {
            position: relative;
            min-height: 760px;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 0;
        }

        .fahmean-contact-visual-card {
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

        .fahmean-contact-visual-card::before,
        .fahmean-contact-visual-card::after {
            content: '';
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
        }

        .fahmean-contact-visual-card::before {
            width: 200px;
            height: 200px;
            top: 40px;
            right: 40px;
        }

        .fahmean-contact-visual-card::after {
            width: 120px;
            height: 120px;
            top: 220px;
            left: 48px;
        }

        .fahmean-contact-visual-header {
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

        .fahmean-contact-visual-copy {
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

        .fahmean-contact-visual-image-wrap {
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

        .fahmean-contact-visual-image-wrap img {
            width: 100%;
            max-width: 560px;
            max-height: 430px;
            object-fit: contain;
            filter: drop-shadow(0 18px 35px rgba(29, 45, 88, 0.16));
        }

        @media (max-width: 1199px) {
            .fahmean-contact-row {
                min-height: auto;
            }

            .fahmean-contact-form-col,
            .fahmean-contact-visual-col {
                width: 100%;
                flex: 0 0 100%;
                max-width: 100%;
            }

            .fahmean-contact-form-shell {
                max-width: 100%;
                padding: 30px 24px;
            }

            .fahmean-contact-visual {
                min-height: 620px;
                padding: 0;
            }

            .fahmean-contact-visual-card {
                min-height: 620px;
            }

            .fahmean-contact-visual-header {
                font-size: 38px;
            }

            .fahmean-contact-visual-copy {
                font-size: 18px;
            }
        }

        @media (max-width: 991px) {
            .freg-grid {
                grid-template-columns: 1fr;
            }

            .fahmean-contact-visual {
                display: none;
            }

            .fahmean-contact-form-shell {
                margin: 0 auto 40px;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('.freg-line-group').forEach(function (group) {
                const field = group.querySelector('input, textarea');
                if (!field) {
                    return;
                }

                const syncState = function () {
                    if (field.value.trim()) {
                        group.classList.add('focused');
                    } else {
                        group.classList.remove('focused');
                    }
                };

                field.addEventListener('focus', function () {
                    group.classList.add('focused');
                });

                field.addEventListener('blur', syncState);
                field.addEventListener('input', syncState);
                syncState();
            });
        });
    </script>
@endsection
