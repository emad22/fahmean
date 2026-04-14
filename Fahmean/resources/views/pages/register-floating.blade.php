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
                <p class="description">منصة فهيمن التعليمية طريقك الأمثل للوصول لما تريد</p>
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

    <div class="rbt-banner-area rbt-banner-3 header-transperent-spacer fahmean-login-page fahmean-register-floating-page">
        <div class="wrapper">
            <div class="container">
                <div class="row g-5 align-items-center fahmean-login-row">
                    <div class="col-lg-7 order-1 order-lg-1">
                        <div class="fahmean-login-visual">
                            <div class="fahmean-login-visual-card">
                                <div class="fahmean-login-visual-header">إنشاء حساب جديد</div>
                                <div class="fahmean-login-visual-image-wrap">
                                    <img src="{{ asset('assets/images/banner/banner-group-image.png') }}" alt="Register Illustration">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 order-2 order-lg-2">
                        <div class="rbt-contact-form contact-form-style-1 max-width-auto fahmean-login-form fahmean-register-form">
                            <center>
                                <h2 class="title">إنشاء حساب جديد</h2>
                            </center>

                            @if ($errors->has('error'))
                                <div class="alert alert-danger mb--30">{{ $errors->first('error') }}</div>
                            @endif

                            <form class="max-width-auto" action="{{ route('register.post') }}" method="POST" id="register-form" novalidate>
                                @csrf

                                <div class="form-group {{ old('name') ? 'focused' : '' }}">
                                    <input id="reg_name" name="name" type="text" value="{{ old('name') }}" autocomplete="name" />
                                    <label for="reg_name">الاسم بالكامل *</label>
                                    <span class="focus-border"></span>
                                    @error('name')<span class="register-error">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group {{ old('email') ? 'focused' : '' }}">
                                    <input id="reg_email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" dir="ltr" />
                                    <label for="reg_email">البريد الإلكتروني *</label>
                                    <span class="focus-border"></span>
                                    @error('email')<span class="register-error">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group form-group-select {{ old('academic_year') ? 'focused' : '' }}">
                                    <select id="reg_academic_year" name="academic_year">
                                        <option value=""></option>
                                        <option value="2024-2025" {{ old('academic_year') == '2024-2025' ? 'selected' : '' }}>2024 - 2025 (الحالي)</option>
                                        <option value="2025-2026" {{ old('academic_year') == '2025-2026' ? 'selected' : '' }}>2025 - 2026</option>
                                    </select>
                                    <label for="reg_academic_year">العام الدراسي الحالي *</label>
                                    <span class="focus-border"></span>
                                </div>

                                <div class="form-group form-group-select {{ old('education_level_id') ? 'focused' : '' }}">
                                    <select id="reg_level" name="education_level_id">
                                        <option value=""></option>
                                        @foreach($education_levels as $level)
                                            <option value="{{ $level->id }}" {{ old('education_level_id') == $level->id ? 'selected' : '' }}>{{ $level->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="reg_level">المرحلة الدراسية *</label>
                                    <span class="focus-border"></span>
                                    @error('education_level_id')<span class="register-error">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group form-group-select {{ old('grade_id') ? 'focused' : '' }}">
                                    <select id="reg_grade" name="grade_id" {{ old('education_level_id') ? '' : 'disabled' }}>
                                        <option value=""></option>
                                    </select>
                                    <label for="reg_grade">الصف الدراسي *</label>
                                    <span class="focus-border"></span>
                                    @error('grade_id')<span class="register-error">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group {{ old('phone_number') ? 'focused' : '' }}">
                                    <input id="reg_phone" name="phone_number" type="tel" value="{{ old('phone_number') }}" maxlength="11" dir="ltr" />
                                    <label for="reg_phone">رقم هاتف الطالب *</label>
                                    <span class="focus-border"></span>
                                    @error('phone_number')<span class="register-error">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group {{ old('parent_phone') ? 'focused' : '' }}">
                                    <input id="reg_parent_phone" name="parent_phone" type="tel" value="{{ old('parent_phone') }}" maxlength="11" dir="ltr" />
                                    <label for="reg_parent_phone">رقم هاتف ولي الأمر *</label>
                                    <span class="focus-border"></span>
                                    @error('parent_phone')<span class="register-error">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group {{ old('password') ? 'focused' : '' }}">
                                    <input id="reg_password" name="password" type="password" autocomplete="new-password" />
                                    <label for="reg_password">كلمة السر *</label>
                                    <button class="freg-password-toggle" type="button" data-target="reg_password">
                                        <i class="feather-eye"></i>
                                    </button>
                                    <span class="focus-border"></span>
                                    @error('password')<span class="register-error">{{ $message }}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <input id="reg_password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" />
                                    <label for="reg_password_confirmation">تأكيد كلمة السر *</label>
                                    <button class="freg-password-toggle" type="button" data-target="reg_password_confirmation">
                                        <i class="feather-eye"></i>
                                    </button>
                                    <span class="focus-border"></span>
                                    <span class="register-error" id="pwd-match-error" style="display:none;">كلمتا المرور غير متطابقتين</span>
                                </div>

                                <div class="row mb--30">
                                    <div class="col-lg-12">
                                        <div class="rbt-checkbox register-terms">
                                            <input type="checkbox" id="reg_terms" name="terms">
                                            <label for="reg_terms">أوافق على شروط الاستخدام وسياسة الخصوصية</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-submit-group">
                                    <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100" id="register-submit-btn">
                                        <span class="icon-reverse-wrapper">
                                            <span class="btn-text">إنشاء حساب</span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                            <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        </span>
                                    </button>
                                </div>

                                <div class="mt--30 text-center">
                                    <span style="font-size: 14px; font-weight: 500; text-align: center;">
                                        لديك حساب بالفعل؟ <a class="rbt-btn-link" href="{{ route('login') }}">سجل دخولك</a>
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
        .fahmean-register-form .form-group {
            margin-bottom: 24px;
        }

        .fahmean-register-form .form-group label {
            z-index: 1;
            pointer-events: none;
        }

        .fahmean-register-form .form-group input,
        .fahmean-register-form .form-group select {
            width: 100%;
            border: 0;
            border-bottom: 2px solid var(--color-border);
            background: transparent;
            padding: 20px 0 8px;
            border-radius: 0;
            color: var(--color-heading);
            font-size: 17px;
        }

        .fahmean-register-form .form-group select {
            appearance: none;
            cursor: pointer;
        }

        .fahmean-register-form .form-group select:disabled {
            opacity: 0.55;
            cursor: not-allowed;
        }

        .fahmean-register-form .form-group.focused label {
            top: -10px;
            font-size: 12px;
            color: var(--color-primary);
        }

        .fahmean-register-form .form-group.focused .focus-border {
            width: 100%;
        }

        .fahmean-register-form .form-group-select::after {
            content: "\e92e";
            font-family: feather !important;
            position: absolute;
            left: 0;
            top: 22px;
            color: var(--color-body);
            font-size: 18px;
            pointer-events: none;
        }

        .freg-password-toggle {
            position: absolute;
            left: 0;
            top: 22px;
            background: transparent;
            border: 0;
            color: var(--color-body);
            padding: 0;
            z-index: 2;
        }

        .register-error {
            display: block;
            margin-top: 8px;
            font-size: 13px;
            color: #d9534f;
        }

        .register-terms label {
            position: static !important;
            width: auto !important;
            top: auto !important;
            z-index: auto !important;
            font-size: 16px !important;
            color: var(--color-heading) !important;
        }

        @media (max-width: 991px) {
            .fahmean-register-form .form-group input,
            .fahmean-register-form .form-group select {
                font-size: 16px;
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const formGroups = document.querySelectorAll('.fahmean-register-form .form-group');

            formGroups.forEach(function (group) {
                const field = group.querySelector('input, select, textarea');
                if (!field) {
                    return;
                }

                const syncFocusState = function () {
                    if (field.value) {
                        group.classList.add('focused');
                    } else {
                        group.classList.remove('focused');
                    }
                };

                field.addEventListener('focus', function () {
                    group.classList.add('focused');
                });

                field.addEventListener('blur', syncFocusState);
                field.addEventListener('input', syncFocusState);
                field.addEventListener('change', syncFocusState);
                syncFocusState();
            });

            const levelSelect = document.getElementById('reg_level');
            const gradeSelect = document.getElementById('reg_grade');
            const oldGrade = @json(old('grade_id'));

            const fillGrades = function (levelId, selectedGrade) {
                if (!levelId) {
                    gradeSelect.innerHTML = '<option value=""></option>';
                    gradeSelect.disabled = true;
                    gradeSelect.closest('.form-group').classList.remove('focused');
                    return;
                }

                gradeSelect.disabled = true;
                gradeSelect.innerHTML = '<option value="">جار التحميل</option>';
                gradeSelect.closest('.form-group').classList.add('focused');

                fetch("{{ url('get-grades') }}/" + levelId)
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (data) {
                        gradeSelect.innerHTML = '<option value=""></option>';

                        data.forEach(function (grade) {
                            const option = document.createElement('option');
                            option.value = grade.id;
                            option.textContent = grade.name;

                            if (String(selectedGrade) === String(grade.id)) {
                                option.selected = true;
                            }

                            gradeSelect.appendChild(option);
                        });

                        gradeSelect.disabled = false;
                        gradeSelect.dispatchEvent(new Event('change'));
                    })
                    .catch(function () {
                        gradeSelect.innerHTML = '<option value="">تعذر تحميل الصفوف</option>';
                        gradeSelect.disabled = false;
                    });
            };

            if (levelSelect) {
                levelSelect.addEventListener('change', function () {
                    fillGrades(this.value, null);
                });

                if (levelSelect.value) {
                    fillGrades(levelSelect.value, oldGrade);
                }
            }

            ['reg_phone', 'reg_parent_phone'].forEach(function (id) {
                const input = document.getElementById(id);
                if (!input) {
                    return;
                }

                input.addEventListener('input', function () {
                    this.value = this.value.replace(/[^0-9]/g, '');
                });
            });

            document.querySelectorAll('.freg-password-toggle').forEach(function (button) {
                button.addEventListener('click', function () {
                    const input = document.getElementById(this.dataset.target);
                    const icon = this.querySelector('i');
                    const isPassword = input.type === 'password';
                    input.type = isPassword ? 'text' : 'password';
                    icon.className = isPassword ? 'feather-eye-off' : 'feather-eye';
                });
            });

            const form = document.getElementById('register-form');
            const password = document.getElementById('reg_password');
            const passwordConfirmation = document.getElementById('reg_password_confirmation');
            const matchError = document.getElementById('pwd-match-error');

            if (password && passwordConfirmation) {
                const syncMatch = function () {
                    if (passwordConfirmation.value && password.value !== passwordConfirmation.value) {
                        matchError.style.display = 'block';
                    } else {
                        matchError.style.display = 'none';
                    }
                };

                password.addEventListener('input', syncMatch);
                passwordConfirmation.addEventListener('input', syncMatch);
            }

            if (form) {
                form.addEventListener('submit', function (event) {
                    if (password.value !== passwordConfirmation.value) {
                        matchError.style.display = 'block';
                        event.preventDefault();
                    }
                });
            }
        });
    </script>
@endsection
