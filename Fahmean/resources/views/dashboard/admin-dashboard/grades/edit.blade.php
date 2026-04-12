@extends('layout.dashboard')

@php
    $header = 'false';
    $footer = 'false';
    $topToBottom = 'false';
    $bodyClass = '';
@endphp

@section('dashboard-content')
    <style>
        .premium-form-card {
            background: #fff;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.05);
            border: 1px solid #f0f0f0;
        }

        .form-control, .form-select {
            border: 1px solid #eef0f2;
            padding: 12px 15px;
            border-radius: 12px;
            background-color: #fcfdfe;
        }

        .form-control:focus {
            border-color: var(--color-primary);
            box-shadow: 0 0 0 4px rgba(var(--color-primary-rgb), 0.1);
            background-color: #fff;
        }
    </style>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="premium-form-card">
                <div class="d-flex justify-content-between align-items-center mb--40">
                    <div>
                        <h3 class="mb-0">تعديل الصف</h3>
                        <p class="text-muted">أنت تقوم بتعديل بيانات الصف: <strong class="color-primary">{{ $grade->name }}</strong></p>
                    </div>
                    <a href="{{ route('admin.grades.index') }}" class="rbt-btn btn-xs bg-primary-opacity radius-10">
                        <i class="feather-arrow-right"></i>
                    </a>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger border-0 radius-10 mb--30">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.grades.update', $grade->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb--30">
                        <label class="form-label fw-bold small text-uppercase">اسم الصف الدراسي</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0 radius-start-10"><i class="feather-edit-3"></i></span>
                            <input type="text" name="name" class="form-control border-start-0 radius-end-10 shadow-none" value="{{ $grade->name }}" required>
                        </div>
                    </div>

                    <div class="mb--40">
                        <label class="form-label fw-bold small text-uppercase">المرحلة التعليمية التابعة</label>
                        <div class="input-group">
                            <span class="input-group-text bg-transparent border-end-0 radius-start-10"><i class="feather-layers"></i></span>
                            <select name="education_level_id" class="form-select border-start-0 radius-end-10 shadow-none" required>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}" {{ $grade->education_level_id == $level->id ? 'selected' : '' }}>
                                        {{ $level->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button class="rbt-btn btn-gradient w-100 radius-10">
                        <i class="feather-save me-1"></i> حفظ التغييرات
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection