@extends('layout.layout', ['header' => 'false', 'topToBottom' => 'false'])

@section('content')

{{-- Google Fonts --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;700;800;900&display=swap" rel="stylesheet">

<style>
/* ===================================================
   FAHMEAN - Professional Registration Page 2026
=================================================== */

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

.freg-page {
    font-family: 'Tajawal', sans-serif;
    direction: rtl;
    min-height: 100vh;
    display: flex;
    align-items: stretch;
    background: #0f1923;
    position: relative;
    overflow: hidden;
}

/* ---------- Animated Background ---------- */
.freg-bg {
    position: fixed;
    inset: 0;
    z-index: 0;
    overflow: hidden;
    pointer-events: none;
}

.freg-orb {
    position: absolute;
    border-radius: 50%;
    filter: blur(80px);
    animation: orbFloat 12s infinite ease-in-out;
    opacity: 0.6;
}
.freg-orb-1 { width: 500px; height: 500px; background: radial-gradient(circle, #1e88e5 0%, transparent 70%); top: -150px; right: -100px; animation-delay: 0s; }
.freg-orb-2 { width: 400px; height: 400px; background: radial-gradient(circle, #7c3aed 0%, transparent 70%); bottom: -100px; left: -100px; animation-delay: 3s; }
.freg-orb-3 { width: 300px; height: 300px; background: radial-gradient(circle, #0891b2 0%, transparent 70%); top: 40%; left: 30%; animation-delay: 6s; }

@keyframes orbFloat {
    0%, 100% { transform: translateY(0px) scale(1); }
    50%       { transform: translateY(-40px) scale(1.05); }
}

/* Grid overlay */
.freg-bg-grid {
    position: fixed;
    inset: 0;
    z-index: 0;
    pointer-events: none;
    background-image:
        linear-gradient(rgba(255,255,255,0.02) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255,255,255,0.02) 1px, transparent 1px);
    background-size: 50px 50px;
}

/* ---------- Left Panel (Branding) ---------- */
.freg-left {
    flex: 0 0 420px;
    background: linear-gradient(165deg, #1a2a3a 0%, #0d1b2a 100%);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 60px 40px;
    position: relative;
    z-index: 10;
    border-left: 1px solid rgba(255,255,255,0.06);
}

.freg-left-logo {
    width: 130px;
    margin-bottom: 32px;
    filter: drop-shadow(0 8px 24px rgba(30,136,229,0.4));
}

.freg-left-title {
    font-size: 32px;
    font-weight: 900;
    color: #ffffff;
    text-align: center;
    line-height: 1.3;
    margin-bottom: 16px;
    background: linear-gradient(135deg, #fff 0%, #7ec8f7 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.freg-left-subtitle {
    font-size: 15px;
    color: rgba(255,255,255,0.55);
    text-align: center;
    line-height: 1.7;
    margin-bottom: 48px;
}

.freg-feature-list {
    list-style: none;
    width: 100%;
}

.freg-feature-item {
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 14px 0;
    border-bottom: 1px solid rgba(255,255,255,0.06);
    color: rgba(255,255,255,0.8);
    font-size: 14px;
    font-weight: 500;
}

.freg-feature-icon {
    width: 38px;
    height: 38px;
    border-radius: 10px;
    background: linear-gradient(135deg, rgba(30,136,229,0.25), rgba(124,58,237,0.15));
    border: 1px solid rgba(30,136,229,0.3);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    color: #60aef0;
    font-size: 16px;
}

.freg-tagline {
    margin-top: 40px;
    padding: 16px 24px;
    background: linear-gradient(135deg, rgba(30,136,229,0.15), rgba(124,58,237,0.1));
    border: 1px solid rgba(30,136,229,0.25);
    border-radius: 14px;
    text-align: center;
    color: rgba(255,255,255,0.7);
    font-size: 13px;
    line-height: 1.6;
}

/* ---------- Right Panel (Form) ---------- */
.freg-right {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 40px 60px;
    position: relative;
    z-index: 10;
    overflow-y: auto;
}

.freg-card {
    width: 100%;
    max-width: 700px;
    background: rgba(15, 25, 35, 0.85);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 28px;
    padding: 48px;
    backdrop-filter: blur(20px);
    box-shadow: 0 40px 80px rgba(0,0,0,0.5),
                0 0 0 1px rgba(255,255,255,0.04) inset;
    position: relative;
    overflow: hidden;
}

.freg-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0;
    height: 3px;
    background: linear-gradient(90deg, #1e88e5, #7c3aed, #0891b2);
    border-radius: 28px 28px 0 0;
}

/* ---------- Form Header ---------- */
.freg-form-header {
    margin-bottom: 36px;
}

.freg-step-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(30,136,229,0.15);
    border: 1px solid rgba(30,136,229,0.35);
    color: #60aef0;
    font-size: 12px;
    font-weight: 700;
    padding: 5px 14px;
    border-radius: 50px;
    margin-bottom: 16px;
    letter-spacing: 0.5px;
    text-transform: uppercase;
}

.freg-form-title {
    font-size: 26px;
    font-weight: 800;
    color: #ffffff;
    margin-bottom: 6px;
}

.freg-form-desc {
    font-size: 14px;
    color: rgba(255,255,255,0.45);
}

/* ---------- Section Divider ---------- */
.freg-section {
    margin-bottom: 8px;
}

.freg-section-label {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 16px;
    margin-top: 24px;
}

.freg-section-label span {
    font-size: 12px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: rgba(255,255,255,0.35);
    white-space: nowrap;
}

.freg-section-label::before,
.freg-section-label::after {
    content: '';
    flex: 1;
    height: 1px;
    background: rgba(255,255,255,0.08);
}

/* ---------- Form Grid ---------- */
.freg-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
}

.freg-grid-full {
    grid-column: 1 / -1;
}

/* ---------- Form Group ---------- */
.freg-group {
    display: flex;
    flex-direction: column;
}

.freg-label {
    font-size: 13px;
    font-weight: 700;
    color: rgba(255,255,255,0.75);
    margin-bottom: 8px;
    display: flex;
    align-items: center;
    gap: 6px;
}

.freg-label-required {
    color: #f87171;
    font-size: 16px;
    line-height: 1;
}

/* ---------- Input Wrapper ---------- */
.freg-input-wrap {
    position: relative;
}

.freg-input-icon {
    position: absolute;
    top: 50%;
    right: 16px;
    transform: translateY(-50%);
    color: rgba(255,255,255,0.3);
    font-size: 16px;
    pointer-events: none;
    transition: color 0.3s;
    z-index: 2;
}

.freg-input {
    width: 100%;
    height: 52px;
    background: rgba(255,255,255,0.05) !important;
    border: 1.5px solid rgba(255,255,255,0.1) !important;
    border-radius: 13px !important;
    padding: 0 48px 0 16px !important;
    font-size: 14px !important;
    color: #ffffff !important;
    font-family: 'Tajawal', sans-serif !important;
    transition: all 0.3s ease !important;
    outline: none !important;
    text-align: right !important;
    display: block !important;
    -webkit-appearance: none;
    appearance: none;
}

.freg-input::placeholder {
    color: rgba(255,255,255,0.2) !important;
}

.freg-input:focus {
    background: rgba(30,136,229,0.08) !important;
    border-color: rgba(30,136,229,0.6) !important;
    box-shadow: 0 0 0 4px rgba(30,136,229,0.12) !important;
    color: #ffffff !important;
}

.freg-input:focus + .freg-input-icon {
    color: #1e88e5;
}

.freg-input:focus ~ .freg-input-icon {
    color: #1e88e5;
}

/* Select styling */
select.freg-input {
    cursor: pointer;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='18' height='18' viewBox='0 0 24 24' fill='none' stroke='rgba(255,255,255,0.3)' stroke-width='2'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E") !important;
    background-repeat: no-repeat !important;
    background-position: left 14px center !important;
    background-color: rgba(255,255,255,0.05) !important;
}

select.freg-input option {
    background: #1a2a3a;
    color: #ffffff;
}

select.freg-input:disabled {
    opacity: 0.4;
    cursor: not-allowed;
}

/* Error */
.freg-error {
    color: #f87171;
    font-size: 12px;
    font-weight: 600;
    margin-top: 5px;
    display: flex;
    align-items: center;
    gap: 4px;
}

/* Password toggle */
.freg-pwd-toggle {
    position: absolute;
    left: 16px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    cursor: pointer;
    color: rgba(255,255,255,0.3);
    font-size: 16px;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: color 0.2s;
    z-index: 3;
}

.freg-pwd-toggle:hover { color: #1e88e5; }

/* Password input with two icons */
.freg-input.has-toggle {
    padding-right: 48px !important;
    padding-left: 48px !important;
}

/* ---------- Alert Error ---------- */
.freg-alert {
    background: rgba(239,68,68,0.12);
    border: 1px solid rgba(239,68,68,0.3);
    border-radius: 12px;
    padding: 14px 18px;
    margin-bottom: 24px;
    color: #fca5a5;
    font-size: 13px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 10px;
}

/* ---------- Terms ---------- */
.freg-terms {
    display: flex;
    align-items: flex-start;
    gap: 10px;
    margin-top: 20px;
    margin-bottom: 4px;
}

.freg-terms input[type="checkbox"] {
    width: 18px;
    height: 18px;
    accent-color: #1e88e5;
    flex-shrink: 0;
    margin-top: 2px;
    cursor: pointer;
}

.freg-terms label {
    font-size: 13px;
    color: rgba(255,255,255,0.5);
    line-height: 1.5;
    cursor: pointer;
}

.freg-terms a {
    color: #60aef0;
    text-decoration: none;
}

/* ---------- Submit Button ---------- */
.freg-btn-wrap {
    margin-top: 28px;
}

.freg-btn {
    width: 100%;
    height: 58px;
    background: linear-gradient(135deg, #1e88e5 0%, #7c3aed 100%);
    border: none;
    border-radius: 15px;
    color: #ffffff;
    font-size: 17px;
    font-weight: 800;
    font-family: 'Tajawal', sans-serif;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    transition: all 0.3s ease;
    box-shadow: 0 8px 32px rgba(30,136,229,0.35);
    position: relative;
    overflow: hidden;
}

.freg-btn::before {
    content: '';
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(255,255,255,0.12) 0%, transparent 60%);
    border-radius: 15px;
}

.freg-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 14px 42px rgba(30,136,229,0.5);
}

.freg-btn:active {
    transform: translateY(0);
}

.freg-btn i { font-size: 20px; }

/* ---------- Login Link ---------- */
.freg-login-link {
    text-align: center;
    margin-top: 28px;
    font-size: 14px;
    color: rgba(255,255,255,0.4);
}

.freg-login-link a {
    color: #60aef0;
    font-weight: 700;
    text-decoration: none;
    transition: color 0.2s;
}

.freg-login-link a:hover { color: #1e88e5; }

/* ---------- Loading Spinner ---------- */
.freg-spinner {
    display: none;
    width: 22px;
    height: 22px;
    border: 2.5px solid rgba(255,255,255,0.3);
    border-top-color: #fff;
    border-radius: 50%;
    animation: spin 0.7s linear infinite;
}

@keyframes spin { to { transform: rotate(360deg); } }

.freg-btn.loading .freg-btn-text { display: none; }
.freg-btn.loading .freg-btn-icon { display: none; }
.freg-btn.loading .freg-spinner { display: block; }

/* ---------- Strength Indicator ---------- */
.freg-strength {
    margin-top: 8px;
    display: flex;
    align-items: center;
    gap: 8px;
}

.freg-strength-bars {
    display: flex;
    gap: 4px;
    flex: 1;
}

.freg-strength-bar {
    flex: 1;
    height: 4px;
    border-radius: 2px;
    background: rgba(255,255,255,0.1);
    transition: background 0.35s;
}

.freg-strength-label {
    font-size: 11px;
    font-weight: 700;
    min-width: 40px;
    text-align: left;
}

/* ---------- Responsive ---------- */
@media (max-width: 1100px) {
    .freg-left { flex: 0 0 340px; padding: 40px 28px; }
    .freg-right { padding: 30px 30px; }
    .freg-card { padding: 36px 32px; }
}

@media (max-width: 900px) {
    .freg-page { flex-direction: column; }
    .freg-left {
        flex: none;
        padding: 40px 24px 32px;
        border-left: none;
        border-bottom: 1px solid rgba(255,255,255,0.06);
    }
    .freg-feature-list { display: none; }
    .freg-tagline { display: none; }
    .freg-left-title { font-size: 24px; }
    .freg-right { padding: 32px 20px; }
    .freg-card { padding: 28px 22px; }
}

@media (max-width: 600px) {
    .freg-grid { grid-template-columns: 1fr; }
    .freg-grid-full { grid-column: 1; }
}
/* ---------- Academic Path Cards ---------- */
.freg-academic-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
    gap: 15px;
    margin-top: 10px;
}

.freg-level-card {
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 16px;
    padding: 20px 15px;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.freg-level-card:hover {
    background: rgba(255, 255, 255, 0.06);
    transform: translateY(-5px);
    border-color: rgba(255, 255, 255, 0.2);
}

.freg-level-card.active {
    background: var(--color-primary);
    border-color: var(--color-primary);
    box-shadow: 0 10px 20px rgba(var(--color-primary-rgb), 0.3);
}

.freg-level-icon {
    font-size: 28px;
    margin-bottom: 12px;
    display: block;
    color: var(--color-primary);
    transition: all 0.3s;
}

.freg-level-card.active .freg-level-icon {
    color: #fff;
}

.freg-level-name {
    display: block;
    font-size: 14px;
    font-weight: 700;
    color: #fff;
}

.freg-level-card.active .freg-level-name {
    color: #fff;
}

.freg-level-card input {
    display: none;
}

.freg-academic-group {
    background: rgba(255, 255, 255, 0.02);
    border: 1px solid rgba(255, 255, 255, 0.05);
    border-radius: 20px;
    padding: 25px;
    margin-bottom: 30px;
}

/* Fix for Selectpicker overlapping */
.bootstrap-select .dropdown-toggle {
    background: rgba(255, 255, 255, 0.05) !important;
    border: 1px solid rgba(255, 255, 255, 0.1) !important;
    border-radius: 12px !important;
    color: #fff !important;
    padding: 12px 15px !important;
}

.bootstrap-select .dropdown-menu {
    background: #1a1a2e !important;
    border: 1px solid rgba(255,255,255,0.1) !important;
    box-shadow: 0 20px 40px rgba(0,0,0,0.4) !important;
}

.bootstrap-select .dropdown-menu li a {
    color: #fff !important;
}

.bootstrap-select .dropdown-menu li a:hover {
    background: var(--color-primary) !important;
}
</style>

<div class="freg-page">

    {{-- Animated Background --}}
    <div class="freg-bg">
        <div class="freg-orb freg-orb-1"></div>
        <div class="freg-orb freg-orb-2"></div>
        <div class="freg-orb freg-orb-3"></div>
    </div>
    <div class="freg-bg-grid"></div>

    {{-- Dummy SVG to prevent backtotop.js error (Cannot read properties of null (reading 'getTotalLength')) --}}
    <svg class="rbt-back-circle svg-inner" width="0" height="0" style="display:none;">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>

    {{-- ===== LEFT PANEL ===== --}}
    <div class="freg-left">
        <img src="{{ asset('assets/images/logo/logo.png') }}" alt="فاهمين" class="freg-left-logo"
             onerror="this.style.display='none'">

        <h1 class="freg-left-title">انضم إلى<br>منصة فاهمين</h1>
        <p class="freg-left-subtitle">
            ابدأ رحلتك التعليمية مع أفضل المعلمين<br>وأحدث الأساليب التفاعلية
        </p>

        <ul class="freg-feature-list">
            <li class="freg-feature-item">
                <span class="freg-feature-icon"><i class="feather-video"></i></span>
                <span>دروس مصورة تفاعلية وعالية الجودة</span>
            </li>
            <li class="freg-feature-item">
                <span class="freg-feature-icon"><i class="feather-check-circle"></i></span>
                <span>اختبارات وتقييم فوري لمستواك</span>
            </li>
            <li class="freg-feature-item">
                <span class="freg-feature-icon"><i class="feather-users"></i></span>
                <span>تواصل مباشر مع المعلمين</span>
            </li>
            <li class="freg-feature-item">
                <span class="freg-feature-icon"><i class="feather-award"></i></span>
                <span>شهادات معتمدة عند إتمام الكورسات</span>
            </li>
        </ul>

        <div class="freg-tagline">
            🎓 انضم إلى آلاف الطلاب الذين يثقون في فاهمين لتحقيق أهدافهم الدراسية
        </div>
    </div>

    {{-- ===== RIGHT PANEL (FORM) ===== --}}
    <div class="freg-right">
        <div class="freg-card">

            {{-- Header --}}
            <div class="freg-form-header">
                <div class="freg-step-badge">
                    <i class="feather-user-plus" style="font-size:12px;"></i>
                    تسجيل طالب جديد
                </div>
                <h2 class="freg-form-title">إنشاء حساب جديد</h2>
                <p class="freg-form-desc">أدخل بياناتك كاملةً للانضمام إلى المنصة</p>
            </div>

            {{-- Global Error --}}
            @if ($errors->has('error'))
                <div class="freg-alert">
                    <i class="feather-alert-circle"></i>
                    {{ $errors->first('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="freg-alert" style="background:rgba(16,185,129,0.12);border-color:rgba(16,185,129,0.3);color:#6ee7b7;">
                    <i class="feather-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('register.post') }}" method="POST" id="freg-form" novalidate>
                @csrf

                {{-- ===== SECTION 1: البيانات الشخصية ===== --}}
                <div class="freg-section-label">
                    <span>البيانات الشخصية</span>
                </div>

                <div class="freg-grid">

                    {{-- الاسم بالكامل --}}
                    <div class="freg-group freg-grid-full">
                        <label class="freg-label" for="reg_name">
                            الاسم بالكامل <span class="freg-label-required">*</span>
                        </label>
                        <div class="freg-input-wrap">
                            <input
                                type="text"
                                id="reg_name"
                                name="name"
                                class="freg-input"
                                placeholder="اسم الطالب كما في شهادة الميلاد"
                                value="{{ old('name') }}"
                                autocomplete="name"
                                required
                            >
                            <i class="feather-user freg-input-icon"></i>
                        </div>
                        @error('name')
                            <span class="freg-error"><i class="feather-alert-circle"></i> {{ $message }}</span>
                        @enderror
                    </div>

                    {{-- البريد الإلكتروني --}}
                    <div class="freg-group">
                        <label class="freg-label" for="reg_email">
                            البريد الإلكتروني <span class="freg-label-required">*</span>
                        </label>
                        <div class="freg-input-wrap">
                            <input
                                type="email"
                                id="reg_email"
                                name="email"
                                class="freg-input"
                                placeholder="example@gmail.com"
                                value="{{ old('email') }}"
                                autocomplete="email"
                                required
                                dir="ltr"
                                style="text-align:right!important;"
                            >
                            <i class="feather-mail freg-input-icon"></i>
                        </div>
                        @error('email')
                            <span class="freg-error"><i class="feather-alert-circle"></i> {{ $message }}</span>
                        @enderror
                    </div>

                {{-- ===== ACADEMIC SECTION: Academic Year + Education Level + Grade ===== --}}
                <div class="freg-academic-group">
                    <div class="freg-section-label" style="margin-top: 0;">
                        <span>المسار التعليمي</span>
                    </div>

                    <div class="mb--30">
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

                    <div class="mb--30">
                        <label class="freg-label">المرحلة الدراسية <span class="freg-label-required">*</span></label>
                        <input type="hidden" name="education_level_id" id="hidden_level_id" value="{{ old('education_level_id') }}">
                        <div class="freg-academic-cards">
                            @foreach($education_levels as $level)
                                <div class="freg-level-card {{ old('education_level_id') == $level->id ? 'active' : '' }}" 
                                     data-id="{{ $level->id }}">
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
                        @error('education_level_id')
                            <span class="freg-error"><i class="feather-alert-circle"></i> {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="freg-group mb-0">
                        <label class="freg-label" for="reg_grade">الصف الدراسي <span class="freg-label-required">*</span></label>
                        <div class="freg-input-wrap">
                            <select id="reg_grade" name="grade_id" class="freg-input selectpicker" required disabled data-live-search="true" title="اختر الصف الدراسي">
                                <option value="">اختر المرحلة أولاً</option>
                            </select>
                            <i class="feather-bookmark freg-input-icon"></i>
                        </div>
                        @error('grade_id')
                            <span class="freg-error"><i class="feather-alert-circle"></i> {{ $message }}</span>
                        @enderror
                    </div>
                </div>

                </div>

                {{-- ===== SECTION 2: أرقام التواصل ===== --}}
                <div class="freg-section-label">
                    <span>أرقام التواصل</span>
                </div>

                <div class="freg-grid">

                    {{-- رقم هاتف الطالب --}}
                    <div class="freg-group">
                        <label class="freg-label" for="reg_phone">
                            رقم هاتف الطالب <span class="freg-label-required">*</span>
                        </label>
                        <div class="freg-input-wrap">
                            <input
                                type="tel"
                                id="reg_phone"
                                name="phone_number"
                                class="freg-input"
                                placeholder="01xxxxxxxxx"
                                value="{{ old('phone_number') }}"
                                maxlength="11"
                                dir="ltr"
                                style="text-align:right!important;"
                                required
                            >
                            <i class="feather-smartphone freg-input-icon"></i>
                        </div>
                        @error('phone_number')
                            <span class="freg-error"><i class="feather-alert-circle"></i> {{ $message }}</span>
                        @enderror
                    </div>

                    {{-- رقم هاتف ولي الأمر --}}
                    <div class="freg-group">
                        <label class="freg-label" for="reg_parent_phone">
                            رقم هاتف ولي الأمر <span class="freg-label-required">*</span>
                        </label>
                        <div class="freg-input-wrap">
                            <input
                                type="tel"
                                id="reg_parent_phone"
                                name="parent_phone"
                                class="freg-input"
                                placeholder="01xxxxxxxxx"
                                value="{{ old('parent_phone') }}"
                                maxlength="11"
                                dir="ltr"
                                style="text-align:right!important;"
                                required
                            >
                            <i class="feather-phone freg-input-icon"></i>
                        </div>
                        @error('parent_phone')
                            <span class="freg-error"><i class="feather-alert-circle"></i> {{ $message }}</span>
                        @enderror
                    </div>

                </div>


                {{-- ===== SECTION 4: كلمة المرور ===== --}}
                <div class="freg-section-label">
                    <span>كلمة المرور</span>
                </div>

                <div class="freg-grid">

                    {{-- كلمة المرور --}}
                    <div class="freg-group">
                        <label class="freg-label" for="reg_password">
                            كلمة المرور <span class="freg-label-required">*</span>
                        </label>
                        <div class="freg-input-wrap">
                            <input
                                type="password"
                                id="reg_password"
                                name="password"
                                class="freg-input has-toggle"
                                placeholder="8 أحرف على الأقل"
                                required
                                autocomplete="new-password"
                            >
                            <i class="feather-lock freg-input-icon"></i>
                            <button type="button" class="freg-pwd-toggle" onclick="togglePassword('reg_password', this)">
                                <i class="feather-eye"></i>
                            </button>
                        </div>
                        {{-- Strength Bar --}}
                        <div class="freg-strength" id="strength-bar" style="display:none;">
                            <div class="freg-strength-bars">
                                <div class="freg-strength-bar" id="s1"></div>
                                <div class="freg-strength-bar" id="s2"></div>
                                <div class="freg-strength-bar" id="s3"></div>
                                <div class="freg-strength-bar" id="s4"></div>
                            </div>
                            <span class="freg-strength-label" id="strength-text"></span>
                        </div>
                        @error('password')
                            <span class="freg-error"><i class="feather-alert-circle"></i> {{ $message }}</span>
                        @enderror
                    </div>

                    {{-- تأكيد كلمة المرور --}}
                    <div class="freg-group">
                        <label class="freg-label" for="reg_password_confirm">
                            تأكيد كلمة المرور <span class="freg-label-required">*</span>
                        </label>
                        <div class="freg-input-wrap">
                            <input
                                type="password"
                                id="reg_password_confirm"
                                name="password_confirmation"
                                class="freg-input has-toggle"
                                placeholder="أعد كتابة كلمة المرور"
                                required
                                autocomplete="new-password"
                            >
                            <i class="feather-check-circle freg-input-icon"></i>
                            <button type="button" class="freg-pwd-toggle" onclick="togglePassword('reg_password_confirm', this)">
                                <i class="feather-eye"></i>
                            </button>
                        </div>
                        <span class="freg-error" id="pwd-match-error" style="display:none;">
                            <i class="feather-alert-circle"></i> كلمتا المرور غير متطابقتين
                        </span>
                    </div>

                </div>

                {{-- Terms --}}
                <div class="freg-terms">
                    <input type="checkbox" id="reg_terms" name="terms" required>
                    <label for="reg_terms">
                        أوافق على <a href="#">شروط الاستخدام</a> و<a href="#">سياسة الخصوصية</a> الخاصة بمنصة فاهمين
                    </label>
                </div>

                {{-- Submit --}}
                <div class="freg-btn-wrap">
                    <button type="submit" class="freg-btn" id="freg-submit-btn">
                        <span class="freg-btn-text">إنشاء الحساب الآن</span>
                        <i class="feather-arrow-left freg-btn-icon"></i>
                        <div class="freg-spinner"></div>
                    </button>
                </div>

                <div class="freg-login-link">
                    لديك حساب بالفعل؟
                    <a href="{{ route('login') }}">سجّل دخولك الآن</a>
                </div>

            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
/* ============================================
   Fahmean Registration JS
============================================ */

// 1. Toggle Password Visibility
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

// 2. Password Strength Meter
const pwdInput = document.getElementById('reg_password');
const strengthBar = document.getElementById('strength-bar');
const bars = [document.getElementById('s1'), document.getElementById('s2'), document.getElementById('s3'), document.getElementById('s4')];
const strengthText = document.getElementById('strength-text');

const strengths = [
    { color: '#ef4444', label: 'ضعيفة', text_color: '#ef4444' },
    { color: '#f97316', label: 'مقبولة', text_color: '#f97316' },
    { color: '#eab308', label: 'جيدة',  text_color: '#eab308' },
    { color: '#22c55e', label: 'قوية',  text_color: '#22c55e' },
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

    bars.forEach((bar, i) => {
        bar.style.background = i < score ? strengths[score - 1].color : 'rgba(255,255,255,0.1)';
    });
    strengthText.textContent = strengths[score - 1].label;
    strengthText.style.color = strengths[score - 1].text_color;
});

// 3. Password Match Check
document.getElementById('reg_password_confirm').addEventListener('input', function() {
    const matchErr = document.getElementById('pwd-match-error');
    if (this.value && this.value !== pwdInput.value) {
        matchErr.style.display = 'flex';
    } else {
        matchErr.style.display = 'none';
    }
});

// 4. Dynamic Grades via Card Selection or AJAX
$(document).ready(function () {
    // Level Card Click Handler
    $('.freg-level-card').on('click', function () {
        const levelId = $(this).data('id');
        
        // UI State
        $('.freg-level-card').removeClass('active');
        $(this).addClass('active');
        
        // Update hidden input
        $('#hidden_level_id').val(levelId);
        
        // Load Grades
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
            error: function (xhr, status, error) {
                gradeSelect.html('<option value="">حدث خطأ في تحميل البيانات</option>').prop('disabled', false);
                if (gradeSelect.hasClass('selectpicker')) gradeSelect.selectpicker('refresh');
            }
        });
    }

    // Restore state if old value exists
    const oldLevel = $('#hidden_level_id').val();
    const oldGrade = '{{ old("grade_id") }}';
    if (oldLevel) {
        loadGrades(oldLevel, oldGrade);
    }
});

// 5. Submit Loading State
document.getElementById('freg-form').addEventListener('submit', function(e) {
    const btn = document.getElementById('freg-submit-btn');
    const pwd = document.getElementById('reg_password').value;
    const pwdConfirm = document.getElementById('reg_password_confirm').value;
    const terms = document.getElementById('reg_terms').checked;

    if (pwd !== pwdConfirm) {
        document.getElementById('pwd-match-error').style.display = 'flex';
        e.preventDefault(); return;
    }
    if (!terms) {
        alert('يرجى الموافقة على شروط الاستخدام أولاً');
        e.preventDefault(); return;
    }

    btn.classList.add('loading');
    btn.disabled = true;
});

// 6. Phone number - numbers only
['reg_phone', 'reg_parent_phone'].forEach(function(id) {
    document.getElementById(id).addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
});
</script>

@endsection
