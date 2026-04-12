@extends('layout.layout', ['header' => 'false', 'topToBottom' => 'false'])

@section('content')

<style>
    /* Premium Login Page Styles */
    :root {
        --primary-color: #22a7f0;
        --primary-dark: #1c8cb4;
        --secondary-color: #34495e;
        --bg-gradient-start: #1f2d3d;
        --bg-gradient-end: #2c3e50;
        --glass-bg: rgba(255, 255, 255, 0.95);
        --input-bg: #f5f6fa;
        --border-color: #e1e1e1;
    }

    body {
        margin: 0;
        font-family: "Tajawal", sans-serif;
        background: var(--bg-gradient-start);
    }

    .login-wrapper {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, var(--bg-gradient-start) 0%, #16222e 100%);
        position: relative;
        overflow: hidden;
        padding: 20px;
    }

    /* Animated Background Shapes */
    .shape {
        position: absolute;
        border-radius: 50%;
        filter: blur(50px);
        z-index: 0;
        opacity: 0.6;
        animation: float 10s infinite ease-in-out;
    }

    .shape-1 {
        top: -100px;
        right: -100px;
        width: 300px;
        height: 300px;
        background: var(--primary-color);
        animation-delay: 0s;
    }

    .shape-2 {
        bottom: -100px;
        left: -100px;
        width: 250px;
        height: 250px;
        background: #9b59b6; /* Accent color */
        animation-delay: 2s;
    }

    .shape-3 {
        top: 40%;
        left: 20%;
        width: 150px;
        height: 150px;
        background: #3498db;
        opacity: 0.4;
        animation-delay: 4s;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0) scale(1); }
        50% { transform: translateY(-20px) scale(1.05); }
    }

    .login-card {
        background: var(--glass-bg);
        width: 100%;
        max-width: 450px;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.2);
        z-index: 1;
        position: relative;
        backdrop-filter: blur(10px);
        transform: translateY(20px);
        opacity: 0;
        animation: slideUp 0.8s forwards ease-out 0.2s;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    @keyframes slideUp {
        to { opacity: 1; transform: translateY(0); }
    }

    .login-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .login-logo {
        max-width: 140px;
        margin-bottom: 20px;
        filter: drop-shadow(0 2px 4px rgba(0,0,0,0.1));
    }

    .login-title {
        font-size: 26px;
        font-weight: 800;
        color: var(--secondary-color);
        margin-bottom: 10px;
    }

    .login-subtitle {
        font-size: 15px;
        color: #7f8c8d;
    }

    .form-group {
        margin-bottom: 20px;
        position: relative;
    }

    .form-group label {
        font-size: 14px;
        font-weight: 600;
        color: #576574;
        margin-bottom: 8px;
        display: block;
    }

    .input-wrapper {
        position: relative;
    }

    .input-wrapper i {
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translateY(-50%);
        color: #bdc3c7;
        font-size: 16px;
        transition: 0.3s;
    }

    .form-control-custom {
        width: 100%;
        padding: 12px 45px 12px 15px;
        border: 2px solid var(--input-bg);
        background: var(--input-bg);
        border-radius: 12px;
        font-size: 15px;
        transition: all 0.3s ease;
        color: #2c3e50;
    }

    .form-control-custom:focus {
        background: #fff;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 4px rgba(34, 167, 240, 0.1);
        outline: none;
    }

    .form-control-custom:focus + i {
        color: var(--primary-color);
    }

    .custom-checkbox {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    .custom-checkbox input {
        display: none;
    }

    .checkmark {
        width: 20px;
        height: 20px;
        background: var(--input-bg);
        border-radius: 6px;
        margin-left: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.2s;
        border: 2px solid transparent;
    }

    .custom-checkbox input:checked ~ .checkmark {
        background: var(--primary-color);
        color: white;
    }

    .checkmark::after {
        content: '\2713';
        font-size: 14px;
        color: white;
        display: none;
    }

    .custom-checkbox input:checked ~ .checkmark::after {
        display: block;
    }

    .custom-checkbox span {
        font-size: 14px;
        color: #636e72;
    }

    .forget-link {
        font-size: 14px;
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
        transition: 0.2s;
    }

    .forget-link:hover {
        color: var(--primary-dark);
        text-decoration: underline;
    }

    .btn-submit {
        background: linear-gradient(to right, var(--primary-color), #2980b9);
        color: white;
        width: 100%;
        padding: 14px;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 5px 15px rgba(34, 167, 240, 0.4);
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(34, 167, 240, 0.5);
    }

    .btn-submit:active {
        transform: translateY(0);
    }

    /* RTL Adjustments */
    .input-wrapper input {
        text-align: right;
    }
    
    .form-group {
        text-align: right;
    }

</style>

<div class="login-wrapper">

    <!-- Background Shapes -->
    <div class="shape shape-1"></div>
    <div class="shape shape-2"></div>
    <div class="shape shape-3"></div>

    <div class="login-card">
        
        <div class="login-header">
            <img src="{{ asset('assets/images/logo.png') }}" class="login-logo" alt="Fahmean Logo">
            <h3 class="login-title">أهلاً بك مجدداً</h3>
            <p class="login-subtitle">سجل دخولك للمتابعة إلى لوحة التحكم</p>
        </div>

        <form action="{{ route('login.post') }}" method="POST">
            @csrf

            <!-- Email Field -->
            <div class="form-group">
                <label>البريد الإلكتروني</label>
                <div class="input-wrapper">
                    <input type="email" name="email" required class="form-control-custom" placeholder="name@example.com" value="{{ old('email') }}">
                    <i class="feather-mail"></i> <!-- Assuming Feather Icons are available -->
                </div>
            </div>

            <!-- Password Field -->
            <div class="form-group">
                <label>كلمة المرور</label>
                <div class="input-wrapper">
                    <input type="password" name="password" required class="form-control-custom" placeholder="••••••••">
                    <i class="feather-lock"></i>
                </div>
            </div>

            <!-- Actions -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <label class="custom-checkbox">
                    <input type="checkbox" name="remember" id="remember">
                    <div class="checkmark"></div>
                    <span>تذكرني</span>
                </label>

                <a href="#" class="forget-link">نسيت كلمة المرور؟</a>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn-submit">
                تسجيل الدخول <i class="feather-arrow-left ms-2"></i>
            </button>

        </form>
    </div>

</div>

@endsection
