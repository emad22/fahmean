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
                    <h4 class="rbt-title-style-3">ربط المواد بالمدرس: {{ $teacher->name }}</h4>
                </div>
                <div class="col-lg-6 text-end">
                    <a href="{{ route('admin.teacher-subjects.index') }}" class="rbt-btn btn-xs bg-primary-opacity radius-round"
                        title="رجوع">
                        <i class="feather-arrow-right"></i>
                    </a>
                </div>
            </div>

            <form action="{{ route('admin.teacher-subjects.update', $teacher->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">اختر المواد</label>
                    <div class="row g-3">
                        @foreach ($subjects as $subject)
                            <div class="col-lg-4 col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="subjects[]"
                                        value="{{ $subject->id }}" id="subject-{{ $subject->id }}"
                                        {{ $teacher->subjects->contains($subject->id) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="subject-{{ $subject->id }}">
                                        {{ $subject->name }} ({{ $subject->grade->name }} -
                                        {{ $subject->grade->level->name }})
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="mt--20">
                    <button class="rbt-btn btn-gradient w-100">حفظ التغييرات</button>
                </div>

            </form>

        </div>
    </div>
@endsection