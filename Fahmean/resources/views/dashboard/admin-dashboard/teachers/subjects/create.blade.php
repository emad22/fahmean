@extends('layout.layout')

@php
$header='false';
$footer='false';
$topToBottom='false';
$bodyClass='';
@endphp

@section('content')

<x-background />

<div class="rbt-dashboard-area rbt-section-overlayping-top rbt-section-gapBottom">
    <div class="container">
        <div class="row">

            <div class="col-lg-3">
                @include('layout.sidebar')
            </div>

            <div class="col-lg-9">
                <div class="rbt-dashboard-content bg-color-white rbt-shadow-box mb--60">
                    <div class="content">

                        <h4 class="rbt-title-style-3 mb--20">إضافة مادة جديدة</h4>

                        <form action="{{ route('admin.subjects.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">اسم المادة</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">اختر الصف</label>
                                <select name="grade_id" class="form-control" required>
                                    <option value="">— اختر —</option>
                                    @foreach ($grades as $grade)
                                    <option value="{{ $grade->id }}">
                                        {{ $grade->level->name }} — {{ $grade->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <button class="rbt-btn btn-gradient w-100">حفظ</button>

                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<x-separator />

@endsection