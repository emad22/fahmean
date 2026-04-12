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

            <!-- Sidebar -->
            <div class="col-lg-3">
                @include('layout.sidebar')
            </div>

            <!-- Main Content -->
            <div class="col-lg-9">
                <div class="rbt-dashboard-content bg-color-white rbt-shadow-box mb--60">
                    <div class="content">

                        <div class="row mb--20 align-items-center">
                            <div class="col-lg-3">
                                <h4 class="rbt-title-style-3">إدارة الكورسات</h4>
                            </div>

                            <div class="col-lg-9 text-end">
                                <a href="{{ route('courses.create') }}" class="rbt-btn btn-gradient rbt-sm me-1">
                                    <span class="btn-text">إضافة كورس جديد</span>
                                    <span class="btn-icon"><i class="feather-plus"></i></span>
                                </a>
                            </div>
                        </div>

                        {{-- Alerts --}}
                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        @endif

                        @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        @endif

                        {{-- Table --}}
                        <div class="rbt-dashboard-table table-responsive">
                            <table class="rbt-table table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        {{-- <th>صورة الكورس</th> --}}
                                        <th>اسم الكورس</th>
                                        <th>الماده </th>
                                        <th>المدرس</th>
                                        <th>السعر</th>
                                        <th>الحالة</th>
                                        <th>التحكم</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($courses as $course)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $course->title }}</td>
                                        <td>{{ $course->subject->name ?? '-' }}</td>
                                        <td>{{ $course->teacher->name ?? '-' }}</td>
                                        <td>{{ $course->price }}</td>
                                        <td>
                                            @if($course->status == 'published')
                                            <span class="badge bg-success">منشور</span>
                                            @else
                                            <span class="badge bg-warning text-dark">مسودة</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('courses.edit', $course->id) }}"
                                                class="btn btn-sm btn-secondary">تعديل</a>

                                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger"
                                                    onclick="return confirm('هل أنت متأكد من حذف هذا الكورس؟')">حذف</button>
                                            </form>

                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#enrollModal{{ $course->id }}">
                                                تسجيل طلاب
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                           
                            </table>
                        </div>

                        <div class="mt-4">
                            {{ $courses->links() }}
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Main Content -->

        </div>
    </div>
</div>
{{-- Modals لكل الكورسات بعد انتهاء الجدول --}}
@foreach($courses as $course)
<div class="modal fade" id="enrollModal{{ $course->id }}" tabindex="-1"
    aria-labelledby="enrollModalLabel{{ $course->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('enrollMultipleStudents', $course->id) }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">تسجيل طلاب في {{ $course->title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    @foreach($students as $student)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="students[]" value="{{ $student->id }}"
                            id="student{{ $course->id }}-{{ $student->id }}">
                        <label class="form-check-label" for="student{{ $course->id }}-{{ $student->id }}">
                            {{ $student->user->name }} ({{ $student->user->email }})
                        </label>
                    </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-primary">تسجيل الطلاب</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Modal -->

<x-separator />

@endsection