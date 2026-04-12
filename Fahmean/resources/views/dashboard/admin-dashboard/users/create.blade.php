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

        .form-section-title {
            position: relative;
            padding-bottom: 10px;
            margin-bottom: 30px;
            font-weight: 700;
            color: #222;
            border-bottom: 2px solid #f5f5f5;
        }

        .form-section-title::after {
            content: '';
            position: absolute;
            bottom: -2px;
            right: 0;
            width: 50px;
            height: 2px;
            background: var(--color-primary);
        }

        .role-option-card {
            border: 2px solid #f0f0f0;
            border-radius: 12px;
            padding: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-align: center;
        }

        .role-option-card:hover {
            border-color: var(--color-primary);
            background: #fdfdff;
        }

        .role-radio:checked + .role-option-card {
            border-color: var(--color-primary);
            background: rgba(var(--color-primary-rgb), 0.05);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .role-radio {
            display: none;
        }

        .role-option-card i {
            font-size: 24px;
            margin-bottom: 8px;
            display: block;
        }

        .input-group-text {
            background: #f8f9fa;
            border: 1px solid #eef0f2;
            border-left: none;
            color: #6b7385;
        }

        .form-control {
            border: 1px solid #eef0f2;
            padding: 12px 15px;
            border-radius: 10px;
        }

        .form-control:focus {
            border-color: var(--color-primary);
            box-shadow: 0 0 0 4px rgba(var(--color-primary-rgb), 0.1);
        }
    </style>

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="premium-form-card">
                <div class="d-flex justify-content-between align-items-center mb--40">
                    <div>
                        <h3 class="mb-0">إضافة عضو جديد</h3>
                        <p class="text-muted">قم بتعبئة البيانات لإنشاء حساب جديد في النظام.</p>
                    </div>
                    <a href="{{ route('admin.users.index') }}" class="rbt-btn btn-xs bg-primary-opacity radius-10">
                        <i class="feather-arrow-right me-1"></i> رجوع
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

                <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Section: Account Information -->
                    <h5 class="form-section-title">بيانات الحساب</h5>
                    <div class="row g-4 mb--40">
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">الاسم الكامل *</label>
                            <div class="input-group">
                                <input type="text" name="name" class="form-control" placeholder="أدخل الاسم الرباعي" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">البريد الإلكتروني *</label>
                            <input type="email" name="email" class="form-control" placeholder="example@domain.com" required>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">كلمة المرور *</label>
                            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-label fw-bold">رقم الهاتف (اختياري)</label>
                            <input type="text" name="student_phone_number" class="form-control" placeholder="01xxxxxxxxx">
                        </div>
                        <div class="col-lg-12">
                            <label class="form-label fw-bold">الصورة الشخصية</label>
                            <div class="p-4 border-2 border-dashed radius-10 text-center bg-gray-light">
                                <input type="file" name="profile_image" id="profile_image" class="d-none" accept="image/*">
                                <label for="profile_image" class="mb-0 cursor-pointer">
                                    <i class="feather-upload-cloud fs-2 color-primary mb-2"></i>
                                    <p class="mb-0">اسحب الصورة هنا أو اضغط للرفع</p>
                                    <span class="text-muted small">JPG, PNG up to 2MB</span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Section: Role Assignment -->
                    <h5 class="form-section-title">تحديد الصلاحية والدور</h5>
                    <div class="row g-3 mb--40">
                        @foreach ($roles as $role)
                            <div class="col-lg-3 col-md-6 text-center">
                                <input type="radio" name="role" value="{{ $role->name }}" id="role_{{ $role->id }}" 
                                       class="role-radio" onchange="handleRoleChange(this.value)" required>
                                <label for="role_{{ $role->id }}" class="role-option-card w-100">
                                    <i class="feather-{{ match($role->name) {
                                        'admin' => 'shield',
                                        'teacher' => 'user-check',
                                        'student' => 'book-open',
                                        'parent' => 'heart',
                                        default => 'user'
                                    } }} color-{{ match($role->name) {
                                        'admin' => 'primary',
                                        'teacher' => 'secondary',
                                        'student' => 'violet',
                                        'parent' => 'coral',
                                        default => 'body'
                                    } }}"></i>
                                    <span class="fw-bold d-block">{{ match($role->name) {
                                        'admin' => 'مدير نظام',
                                        'teacher' => 'معلم / محاضر',
                                        'student' => 'طالب',
                                        'parent' => 'ولي أمر',
                                        default => $role->name
                                    } }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <!-- Section: Dynamic Data -->
                    <div id="dynamicFieldsContainer">
                        <!-- Education & Grade (Shared by Teacher/Student) -->
                        <div id="eduFields" class="d-none">
                            <h5 class="form-section-title">المسار التعليمي</h5>
                            <div class="p-5 border radius-20 mb--40 bg-gray-light">
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        <div class="setup-field-card bg-white p-4 radius-15 h-100 border-0 shadow-sm">
                                            <label class="form-label fw-bold color-primary mb-3">
                                                <i class="feather-layers me-2"></i> المرحلة التعليمية
                                            </label>
                                            <select name="education_level_id[]" id="educationLevel" class="selectpicker form-control border-0 bg-gray-light radius-10" multiple data-live-search="true" title="اختر المرحلة">
                                                @foreach ($education_levels as $level)
                                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="setup-field-card bg-white p-4 radius-15 h-100 border-0 shadow-sm">
                                            <label class="form-label fw-bold color-secondary mb-3">
                                                <i class="feather-book me-2"></i> الصف الدراسي
                                            </label>
                                            <select name="grade_id[]" id="grade" class="selectpicker form-control border-0 bg-gray-light radius-10" multiple data-live-search="true" title="اختر الصف">
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 d-none" id="subjectsField">
                                        <div class="setup-field-card bg-white p-4 radius-15 h-100 border-0 shadow-sm">
                                            <label class="form-label fw-bold color-violet mb-3">
                                                <i class="feather-tag me-2"></i> المواد المسندة للمعلم
                                            </label>
                                            <select name="subject_id" id="subjects" class="selectpicker form-control border-0 bg-gray-light radius-10" data-live-search="true" title="اختر المادة">
                                                <!-- AJAX Loaded -->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Assistant Specific -->
                        <div id="assistantField" class="d-none">
                            <h5 class="form-section-title">بيانات العمل للمساعد</h5>
                            <div class="p-5 border radius-20 mb--40 grad-bg-primary text-white">
                                <div class="row g-4 align-items-center">
                                    <div class="col-lg-4 text-center">
                                        <i class="feather-user-plus display-2 opacity-50"></i>
                                    </div>
                                    <div class="col-lg-8">
                                        <label class="form-label fw-bold text-white mb-3">المعلم المسؤول (المشرف المباشر)</label>
                                        <select name="teacher_id" class="form-select border-0 bg-white radius-10 py-3">
                                            <option value="">— اختر المشرف —</option>
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                            @endforeach
                                        </select>
                                        <p class="small text-white-50 mt-3 mb-0">سيتم ربط جميع مهام هذا المساعد تحت إشراف المعلم المختار.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Parent Specific -->
                        <div id="parentFields" class="d-none">
                            <h5 class="form-section-title">إدارة الأبناء</h5>
                            <div class="p-5 border radius-20 mb--40 bg-white shadow-sm border-2 border-dashed">
                                <div class="row g-4">
                                    <div class="col-lg-12">
                                        <div class="d-flex align-items-center mb-4">
                                            <div class="icon-box bg-coral-opacity color-coral me-3 radius-10 p-3">
                                                <i class="feather-users fs-4"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0 fw-bold">ربط حساب الطلاب</h6>
                                                <p class="text-muted small mb-0">اختر ابن أو أكثر لربطهم بحساب ولي الأمر هذا.</p>
                                            </div>
                                        </div>
                                        <select name="students[]" class="form-select bg-gray-light border-0 radius-10 py-3" multiple style="height: 200px;">
                                            @foreach ($students as $student)
                                                <option value="{{ $student->id }}">{{ $student->user->name ?? 'N/A' }} ({{ $student->user->email ?? 'N/A' }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-end border-top pt--30">
                        <button type="submit" class="rbt-btn btn-gradient w-100 radius-10">
                            <i class="feather-check-circle me-2"></i> تأكيد وإنشاء الحساب
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function handleRoleChange(role) {
            // Reset visibility
            $('#eduFields, #assistantField, #parentFields, #subjectsField').addClass('d-none');
            
            var $eduSelect = $('#educationLevel');
            var $gradeSelect = $('#grade');

            if (role === 'student') {
                $('#eduFields').removeClass('d-none');
                
                // Force Single Select for Student
                $eduSelect.removeAttr('multiple');
                $gradeSelect.removeAttr('multiple');
                
                // Refresh Selectpicker
                if($.fn.selectpicker) {
                    $eduSelect.selectpicker('destroy').selectpicker(); 
                    $gradeSelect.selectpicker('destroy').selectpicker();
                }
            } 
            else if (role === 'teacher') {
                $('#eduFields, #subjectsField').removeClass('d-none');
                
                // Force Multi Select for Teacher
                $eduSelect.attr('multiple', 'multiple');
                $gradeSelect.attr('multiple', 'multiple');

                // Refresh Selectpicker
                if($.fn.selectpicker) {
                    $eduSelect.selectpicker('destroy').selectpicker();
                    $gradeSelect.selectpicker('destroy').selectpicker();
                }
            } 
            else if (role === 'assistant_teacher') {
                $('#assistantField').removeClass('d-none');
            } 
            else if (role === 'parent') {
                $('#parentFields').removeClass('d-none');
            }
        }
    </script>
    <script>
        $(document).on('change', '#educationLevel', function() {
            let levelIds = $(this).val(); // array
            if (!levelIds || levelIds.length === 0) {
                $('#grade').empty().selectpicker('refresh');
                $('#subjects').empty().selectpicker('refresh');
                return;
            }

            $.ajax({
                url: "{{ route('admin.get-grades-by-levels') }}",
                type: "GET",
                data: {
                    level_ids: levelIds
                },
                success: function(data) {
                    let gradeSelect = document.getElementById('grade');
                    gradeSelect.innerHTML = '';

                    data.forEach(function(g) {
                        let option = document.createElement("option");
                        option.value = g.id;
                        option.textContent = g.name;
                        gradeSelect.appendChild(option);
                    });

                    $('#grade').selectpicker('refresh');
                    $('#subjects').empty().selectpicker('refresh');
                }
            });
        });
    </script>
    <script>
        $(document).on('change', '#grade', function() {

            let gradeIds = $(this).val(); // array

            if (!gradeIds || gradeIds.length === 0) {
                $('#subjects').empty().selectpicker('refresh');
                return;
            }

            $.ajax({
                url: "{{ route('admin.get-subjects-by-grades') }}",
                type: "GET",
                data: {
                    grade_ids: gradeIds
                },
                success: function(data) {
                    let subjectsSelect = document.getElementById('subjects');
                    subjectsSelect.innerHTML = '';

                    data.forEach(function(item) {
                        let option = document.createElement("option");
                        option.value = item.id;
                        option.textContent = item.name;
                        subjectsSelect.appendChild(option);
                    });

                    $('#subjects').selectpicker('refresh');
                }
            });
        });
    </script>
@endsection