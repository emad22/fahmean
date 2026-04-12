@extends('layout.dashboard')
    
@php
    $header = 'false';
    $footer = 'false';
    $topToBottom = 'false';
    $bodyClass = '';
@endphp

@section('dashboard-content')
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="rbt-dashboard-content bg-color-white rbt-shadow-box mb--60">
                <div class="content">

                    <div class="section-title d-flex justify-content-between align-items-center mb--30">
                        <h4 class="rbt-title-style-3 mb-0">تعديل الدور: {{ $role->name }}</h4>
                        <a href="{{ route('admin.roles.index') }}" class="rbt-btn btn-xs bg-primary-opacity radius-round" title="رجوع">
                            <i class="feather-arrow-left"></i>
                        </a>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger rbt-alert-danger mb--20">
                            <ul class="mb-0 list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li><i class="feather-alert-triangle me-2"></i>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        {{-- Role Name --}}
                        <div class="rbt-form-group mb--40">
                            <label for="name" class="form-label">اسم الدور <span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" class="form-control rbt-custom-input" value="{{ $role->name }}" required>
                            <span class="focus-border"></span>
                        </div>

                        {{-- Permissions Grid --}}
                        <div class="rbt-form-group">
                            <label class="form-label mb-3">تعديل الصلاحيات لهذا الدور</label>
                            
                            <div class="rbt-checkbox-group-wrapper p-4 bg-light rounded radius-6 border">
                                <div class="row g-3">
                                    @foreach ($permissions as $permission)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-check rbt-checkbox-card bg-white p-3 rounded border">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" 
                                                    value="{{ $permission->id }}" 
                                                    id="perm-{{ $permission->id }}"
                                                    {{ $role->permissions->contains($permission->id) ? 'checked' : '' }}>
                                                <label class="form-check-label ps-2 user-select-none cursor-pointer fw-bold" for="perm-{{ $permission->id }}">
                                                    {{ $permission->name }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="form-submit-group mt--40 text-end">
                            <a href="{{ route('admin.roles.index') }}" class="rbt-btn btn-sm rbt-btn-border me-2">إلغاء</a>
                            <button type="submit" class="rbt-btn btn-sm btn-gradient hover-transform-none">
                                <span class="icon-reverse-wrapper">
                                    <span class="btn-text">حفظ التعديلات</span>
                                    <span class="btn-icon"><i class="feather-refresh-cw"></i></span>
                                    <span class="btn-icon"><i class="feather-refresh-cw"></i></span>
                                </span>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection