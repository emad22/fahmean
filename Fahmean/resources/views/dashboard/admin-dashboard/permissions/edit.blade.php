@extends('layout.dashboard')
    
@php
    $header = 'false';
    $footer = 'false';
    $topToBottom = 'false';
    $bodyClass = '';
@endphp

@section('dashboard-content')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="rbt-dashboard-content bg-color-white rbt-shadow-box mb--60">
                <div class="content">

                    <div class="section-title d-flex justify-content-between align-items-center mb--30">
                        <h4 class="rbt-title-style-3 mb-0">تعديل الصلاحية</h4>
                        <a href="{{ route('admin.permissions.index') }}" class="rbt-btn btn-xs bg-primary-opacity radius-round" title="رجوع">
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

                    <form action="{{ route('admin.permissions.update', $permission->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="rbt-form-group">
                            <label for="name" class="form-label">اسم الصلاحية <span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" class="form-control rbt-custom-input" value="{{ $permission->name }}" required>
                            <span class="focus-border"></span>
                        </div>

                        <div class="form-submit-group mt--40 text-end">
                            <a href="{{ route('admin.permissions.index') }}" class="rbt-btn btn-sm rbt-btn-border me-2">إلغاء</a>
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