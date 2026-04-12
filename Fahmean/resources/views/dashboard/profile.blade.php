@extends('layout.dashboard')

@php
    $header = 'false';
    $footer = 'false';
    $topToBottom = 'false';
    
    // Prepare phone value based on role
    $phone = '';
    if($user->hasRole('student') && $user->student) {
        $phone = $user->student->student_phone_number;
    } elseif($user->hasRole('parent')) {
        $phone = $user->phone_number;
    }
@endphp

@section('dashboard-content')
<div class="rbt-dashboard-content bg-color-transparent p-0">
    <div class="content">
        <!-- Profile Cover & Header -->
        <div class="row mb-5">
            <div class="col-12">
                 <div class="profile-header card radius-15 border-0 shadow-sm overflow-hidden bg-white">
                    <div class="profile-cover bg-gradient-profile position-relative" style="height: 180px;">
                        <!-- Optional: Add a pattern or shape here -->
                        <div class="position-absolute top-0 end-0 h-100 w-50 bg-white opacity-10" style="clip-path: polygon(100% 0, 0 0, 100% 100%);"></div>
                    </div>
                    
                    <div class="card-body p-4 p-md-5 position-relative">
                        <div class="d-flex flex-column flex-md-row align-items-center align-items-md-end gap-4" style="margin-top: -100px;">
                            <!-- Avatar Upload -->
                            <div class="position-relative group-image-upload">
                                <div class="avatar-xxl rounded-circle border border-4 border-white shadow-lg bg-white p-1 position-relative overflow-hidden" style="width: 150px; height: 150px;">
                                    <img src="{{ $user->profile_image ? asset('uploads/profiles/' . $user->profile_image) : asset('assets/images/team/avatar.jpg') }}" 
                                         alt="Profile Image" 
                                         class="w-100 h-100 rounded-circle object-fit-cover"
                                         id="profilePreview">
                                </div>
                                <label for="profile_image" class="upload-btn position-absolute bottom-0 end-0 bg-white shadow-sm rounded-circle p-2 cursor-pointer border hover-primary transition-all mb-2 me-2" title="تغيير الصورة">
                                    <i class="feather-camera text-dark fs-5"></i>
                                </label>
                            </div>

                            <!-- User Info -->
                            <div class="text-center text-md-end flex-grow-1 pb-2">
                                <h2 class="fw-bold mb-1">{{ $user->name }}</h2>
                                <p class="text-muted d-flex align-items-center justify-content-center justify-content-md-start gap-2 mb-2">
                                    <span>{{ $user->email }}</span>
                                    <span class="text-muted">•</span> 
                                    <span class="color-primary fw-bold text-uppercase">{{ $user->roles->first()->name ?? 'User' }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-lg-10">
                <div class="card bg-white radius-15 border-0 shadow-sm p-4 p-md-5">
                    <div class="card-header bg-white border-bottom-0 px-0 pt-0 pb-4">
                        <h4 class="fw-bold fs-4 mb-1">تعديل البيانات الشخصية</h4>
                        <p class="text-muted small">قم بتحديث بياناتك ومعلومات التواصل الخاصة بك.</p>
                    </div>

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" id="profile_image" name="profile_image" class="d-none" accept="image/*" onchange="previewImage(this)">

                         <!-- Section: Basic Info -->
                        <div class="row g-4 mb-5">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label fw-bold small text-muted text-uppercase mb-2">الاسم الكامل</label>
                                    <div class="position-relative">
                                         <i class="feather-user position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                                        <input type="text" name="name" class="form-control form-control-lg bg-light border-0 ps-5 radius-10 fs-6" value="{{ old('name', $user->name) }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label fw-bold small text-muted text-uppercase mb-2">البريد الإلكتروني</label>
                                    <div class="position-relative">
                                        <i class="feather-mail position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                                        <input type="email" name="email" class="form-control form-control-lg bg-light border-0 ps-5 radius-10 fs-6" value="{{ old('email', $user->email) }}" required>
                                    </div>
                                </div>
                            </div>

                             @if($user->hasRole('student') || $user->hasRole('parent'))
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label fw-bold small text-muted text-uppercase mb-2">رقم الهاتف</label>
                                         <div class="position-relative">
                                             <i class="feather-smartphone position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                                            <input type="text" name="phone" class="form-control form-control-lg bg-light border-0 ps-5 radius-10 fs-6" value="{{ old('phone', $phone) }}" placeholder="01xxxxxxxxx">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <hr class="my-5 opacity-10">

                        <!-- Section: Security -->
                        <div class="mb-4">
                             <h4 class="fw-bold fs-5 mb-1 text-danger-soft">الأمان وكلمة المرور</h4>
                             <p class="text-muted small">اترك الحقول فارغة إذا كنت لا ترغب بتغيير كلمة المرور.</p>
                        </div>

                        <div class="row g-4 mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label fw-bold small text-muted text-uppercase mb-2">كلمة المرور الجديدة</label>
                                    <div class="position-relative">
                                        <i class="feather-lock position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                                        <input type="password" name="password" class="form-control form-control-lg bg-light border-0 ps-5 radius-10 fs-6" placeholder="******">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label fw-bold small text-muted text-uppercase mb-2">تأكيد كلمة المرور</label>
                                    <div class="position-relative">
                                        <i class="feather-lock position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                                        <input type="password" name="password_confirmation" class="form-control form-control-lg bg-light border-0 ps-5 radius-10 fs-6" placeholder="******">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-5">
                            <button type="submit" class="rbt-btn btn-gradient btn-lg radius-10 px-5 shadow-lg hover-transform">
                                <span>حفظ التغييرات</span>
                                <i class="feather-arrow-left ms-2"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profilePreview').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<style>
    .radius-10 { border-radius: 10px !important; }
    .radius-15 { border-radius: 15px !important; }
    .bg-color-transparent { background-color: transparent !important; }
    .object-fit-cover { object-fit: cover; }
    
    .bg-gradient-profile { background: linear-gradient(135deg, #1e293b 0%, #334155 100%); }
    .bg-gray-light { background-color: #f8f9fc !important; }
    
    .form-control:focus { box-shadow: none; background-color: #fff !important; border: 1px solid #6B4CE6 !important; }
    
    .hover-transform:hover { transform: translateY(-2px); }
    .hover-primary:hover i { color: #6B4CE6 !important; }
    .transition-all { transition: all 0.3s ease; }
    
    .text-danger-soft { color: #ef4444; }
</style>
@endsection
