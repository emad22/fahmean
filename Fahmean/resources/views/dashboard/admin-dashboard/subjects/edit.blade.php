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

        .icon-addon {
            background: #f8faff;
            border: 1px solid #eef0f2;
            border-inline-end: 0;
            border-radius: 12px 0 0 12px;
            display: flex;
            align-items: center;
            padding: 0 15px;
            color: #6b7385;
        }
    </style>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="premium-form-card">
                <div class="d-flex justify-content-between align-items-center mb--40">
                    <div>
                        <h3 class="mb-0">تعديل المادة الدراسية</h3>
                        <p class="text-muted small">أنت تقوم بتحديث بيانات مادة: <strong class="color-primary">{{ $subject->name }}</strong></p>
                    </div>
                    <a href="{{ route('admin.subjects.index') }}" class="rbt-btn btn-xs bg-primary-opacity radius-10">
                        <i class="feather-arrow-right"></i>
                    </a>
                </div>

                <form action="{{ route('admin.subjects.update', $subject->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb--30">
                        <label class="form-label fw-bold small text-uppercase mb-2">اسم المادة الدراسية</label>
                        <div class="input-group">
                            <span class="icon-addon"><i class="feather-edit-3"></i></span>
                            <input type="text" name="name" class="form-control radius-end-12" value="{{ $subject->name }}" required>
                        </div>
                    </div>

                    <div class="mb--40">
                        <label class="form-label fw-bold small text-uppercase mb-2">الصف الدراسي المرتبط</label>
                        <div class="input-group">
                            <span class="icon-addon"><i class="feather-layers"></i></span>
                            <select name="grade_id" class="form-select radius-end-12" required>
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade->id }}" {{ $subject->grade_id == $grade->id ? 'selected' : '' }}>
                                        {{ $grade->level->name }} — {{ $grade->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <button class="rbt-btn btn-gradient w-100 radius-10 py-3">
                        <i class="feather-save me-1"></i> حفظ التعديلات الجديدة
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection