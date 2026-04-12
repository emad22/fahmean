@extends('layout.dashboard')

@php
    $header = 'false';
    $footer = 'false';
    $topToBottom = 'false';
    $bodyClass = '';
@endphp

@section('dashboard-content')
    <div class="rbt-dashboard-content bg-color-white rbt-shadow-box mb--60">
        <div class="content">

            <div class="row mb--20 align-items-center">
                <div class="col-lg-6">
                    <h4 class="rbt-title-style-3">إضافة درس جديد</h4>
                </div>
                <div class="col-lg-6 text-end">
                    <a href="{{ route($routePrefix . '.index') }}" class="rbt-btn btn-xs bg-primary-opacity radius-round" title="رجوع">
                        <i class="feather-arrow-right"></i>
                    </a>
                </div>
            </div>

            {{-- Alerts --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route($routePrefix . '.store') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                @csrf

                <div class="col-md-12">
                    <label class="form-label">عنوان الدرس</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                </div>

                <div class="col-md-12">
                    <label class="form-label">الكورس</label>
                    <select name="course_id" class="form-control" required>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label">رابط الفيديو</label>
                    <input type="url" name="video_url" class="form-control" value="{{ old('video_url') }}">
                </div>

                <div class="col-md-6">
                    <label class="form-label">PDF</label>
                    <input type="file" name="pdf" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">ملف صوتي</label>
                    <input type="file" name="audio" class="form-control">
                </div>

                <div class="col-md-6">
                    <label class="form-label">مدة الدرس (مثال: 01:30:00)</label>
                    <input type="text" name="duration" class="form-control" value="{{ old('duration') }}">
                </div>

                <div class="col-md-12 mt-3">
                    <button type="submit" class="rbt-btn btn-gradient">
                        <span class="btn-text">حفظ الدرس</span>
                        <span class="btn-icon"><i class="feather-save"></i></span>
                    </button>
                </div>

            </form>

        </div>
    </div>
@endsection