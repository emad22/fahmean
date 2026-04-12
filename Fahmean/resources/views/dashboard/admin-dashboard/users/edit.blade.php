@extends('layout.dashboard')

@php
    $header = 'false';
    $footer = 'false';
    $topToBottom = 'false';
    $bodyClass = '';
@endphp

@section('dashboard-content')
    <style>
        .edit-user-hero {
            background: linear-gradient(135deg, #1a1a1a 0%, #333 100%);
            border-radius: 20px;
            padding: 30px;
            display: flex;
            align-items: center;
            margin-bottom: 30px;
            color: #fff;
        }

        .edit-hero-avatar {
            width: 80px;
            height: 80px;
            border-radius: 15px;
            object-fit: cover;
            margin-inline-end: 20px;
            border: 3px solid rgba(255, 255, 255, 0.1);
        }

        .premium-card {
            background: #fff;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.04);
            border: 1px solid #f0f0f0;
        }

        .section-separator {
            padding-bottom: 10px;
            margin-bottom: 30px;
            border-bottom: 2px solid #f8f9fa;
            font-weight: 700;
            color: #222;
        }

        .form-control, .form-select {
            border: 1px solid #eef0f2;
            padding: 12px 15px;
            border-radius: 12px;
            background-color: #fcfdfe;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--color-primary);
            box-shadow: 0 0 0 4px rgba(var(--color-primary-rgb), 0.1);
            background-color: #fff;
        }

        .role-badge-edit {
            background: rgba(255, 255, 255, 0.1);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            color: #ccc;
        }
    </style>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Hero Header for Edit Page -->
            <div class="edit-user-hero">
                <img src="{{ $user->profile_image ? asset('uploads/' . $user->profile_image) : asset('assets/images/team/avatar.jpg') }}" class="edit-hero-avatar">
                <div>
                    <h3 class="mb-1 text-white">تعديل بيانات: {{ $user->name }}</h3>
                    <div class="d-flex align-items-center gap-2">
                        <span class="role-badge-edit"><i class="feather-shield me-1"></i>{{ $user->roles->first()?->name }}</span>
                        <small class="text-white-50"><i class="feather-mail me-1"></i>{{ $user->email }}</small>
                    </div>
                </div>
                <div class="ms-auto">
                    <a href="{{ route('admin.users.index') }}" class="rbt-btn btn-sm btn-white radius-10">الرجوع للقائمة</a>
                </div>
            </div>

            <div class="premium-card">
                @if ($errors->any())
                    <div class="alert alert-danger border-0 radius-10 mb-5">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row g-5">
                        <!-- Left Column: Primary Data -->
                        <div class="col-lg-7">
                            <h5 class="section-separator">المعلومات الأساسية</h5>
                            <div class="row g-4 mb-5">
                                <div class="col-12">
                                    <label class="form-label fw-bold small text-uppercase">الاسم الكامل</label>
                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold small text-uppercase">البريد الإلكتروني</label>
                                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold small text-uppercase">رقم الهاتف</label>
                                    <input type="text" name="student_phone_number" value="{{ $user->student->student_phone_number ?? '' }}" class="form-control">
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold small text-uppercase">كلمة المرور الجديدة</label>
                                    <input type="password" name="password" class="form-control" placeholder="اتركها فارغة لعدم التغيير">
                                </div>
                            </div>

                            <h5 class="section-separator">تغيير الصورة الشخصية</h5>
                            <div class="d-flex align-items-center gap-4 bg-gray-light p-4 radius-15">
                                <img src="{{ $user->profile_image ? asset('uploads/' . $user->profile_image) : asset('assets/images/team/avatar.jpg') }}" 
                                     class="radius-10 shadow-sm" width="80" height="80" style="object-fit:cover;">
                                <div class="flex-grow-1">
                                    <input type="file" name="profile_image" class="form-control" accept="image/*">
                                    <small class="text-muted mt-1 d-block">يفضل استخدام صورة مربعة بجودة عالية.</small>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column: Role & Specific Data -->
                        <div class="col-lg-5">
                            <h5 class="section-separator">الصلاحيات والدور</h5>
                            <div class="mb-5">
                                <label class="form-label fw-bold small text-uppercase">الدور الحالي</label>
                                <select name="role" id="roleSelect" class="form-select shadow-none">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                            {{ match($role->name) {
                                                'admin' => 'مدير نظام',
                                                'teacher' => 'معلم / محاضر',
                                                'student' => 'طالب',
                                                'parent' => 'ولي أمر',
                                                default => $role->name
                                            } }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div id="roleDetails" class="bg-gray-light p-4 radius-20 mt-4">
                                <!-- Dynamic Content Based on JS -->
                                <div id="educationFields" class="d-none">
                                    <div class="mb-4">
                                        <label class="form-label fw-bold small text-uppercase">المرحلة التعليمية</label>
                                        <select name="education_level_id[]" class="form-select" multiple style="height: 100px;">
                                            @foreach ($education_levels as $level)
                                                @php
                                                    $selected = false;
                                                    if ($user->hasRole('student') && optional($user->student)->education_level_id == $level->id) {
                                                        $selected = true;
                                                    } elseif ($user->hasRole('teacher') && $user->educationLevels->contains($level->id)) {
                                                        $selected = true;
                                                    }
                                                @endphp
                                                <option value="{{ $level->id }}" {{ $selected ? 'selected' : '' }}>
                                                    {{ $level->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-0">
                                        <label class="form-label fw-bold small text-uppercase">الصف الدراسي</label>
                                        <select name="grade_id[]" class="form-select" multiple style="height: 100px;">
                                            @foreach ($grades as $grade)
                                                @php
                                                    $selected = false;
                                                    if ($user->hasRole('student') && optional($user->student)->grade_id == $grade->id) {
                                                        $selected = true;
                                                    } elseif ($user->hasRole('teacher') && $user->grades->contains($grade->id)) {
                                                        $selected = true;
                                                    }
                                                @endphp
                                                <option value="{{ $grade->id }}" {{ $selected ? 'selected' : '' }}>
                                                    {{ $grade->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div id="teacherFields" class="d-none">
                                    <label class="form-label fw-bold small text-uppercase">المادة المسندة</label>
                                    <select name="subject_id" class="form-select" data-live-search="true">
                                        <option value="">اختر المادة</option>
                                        @foreach ($subjects as $subject)
                                            <option value="{{ $subject->id }}" {{ $user->subjects->contains('id', $subject->id) ? 'selected' : '' }}>
                                                {{ $subject->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div id="assistantFields" class="d-none">
                                    <label class="form-label fw-bold small text-uppercase">المعلم المشرف</label>
                                    <select name="teacher_id" class="form-select">
                                        @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}" {{ $user->teacher_id == $teacher->id ? 'selected' : '' }}>
                                                {{ $teacher->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div id="parentFields" class="d-none">
                                    <label class="form-label fw-bold small text-uppercase">الطلاب التابعين</label>
                                    <select name="students[]" class="form-select" multiple style="height: 150px;">
                                        @foreach ($students as $student)
                                            <option value="{{ $student->id }}" {{ $user->children && $user->children->contains('id', $student->id) ? 'selected' : '' }}>
                                                {{ $student->user->name ?? '' }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 border-top pt-4">
                        <button type="submit" class="rbt-btn btn-gradient w-100 radius-10">
                            <i class="feather-save me-2"></i> حفظ التغييرات والبيانات
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function toggleFormFields() {
                const role = $('#roleSelect').val();
                
                // Reset
                $('#educationFields, #teacherFields, #assistantFields, #parentFields').addClass('d-none');
                
                if (role === 'student') {
                    $('#educationFields').removeClass('d-none');
                } else if (role === 'teacher') {
                    $('#educationFields, #teacherFields').removeClass('d-none');
                } else if (role === 'assistant_teacher') {
                    $('#assistantFields').removeClass('d-none');
                } else if (role === 'parent') {
                    $('#parentFields').removeClass('d-none');
                }
            }

            $('#roleSelect').on('change', toggleFormFields);
            toggleFormFields();
        });
    </script>
    

@endsection