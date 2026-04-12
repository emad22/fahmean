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
                    <h4 class="rbt-title-style-3">إدارة الدروس</h4>
                </div>
                <div class="col-lg-6 text-end">
                    @can('create lesson')
                    <a href="{{ route($routePrefix . '.create') }}" class="rbt-btn btn-gradient rbt-sm me-1">
                        <span class="btn-text">إضافة درس جديد</span>
                        <span class="btn-icon"><i class="feather-plus"></i></span>
                    </a>
                    @endcan
                </div>
            </div>

            {{-- Alerts --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Table --}}
            <div class="rbt-dashboard-table table-responsive">
                <table class="rbt-table table table-borderless">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم الدرس</th>
                            <th>الكورس</th>
                            <th>الفيديو</th>
                            <th>PDF</th>
                            <th>الصوت</th>
                            <th>المدة</th>
                            <th>التحكم</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($lessons as $lesson)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $lesson->title }}</td>
                                <td>{{ $lesson->course->title ?? '-' }}</td>
                                <td>
                                    @if ($lesson->video_url)
                                        <a href="{{ $lesson->video_url }}" target="_blank" class="rbt-btn btn-xs bg-primary-opacity">عرض</a>
                                    @endif
                                </td>
                                <td>
                                    @if ($lesson->pdf)
                                        <a href="{{ asset('storage/' . $lesson->pdf) }}" target="_blank" class="rbt-btn btn-xs bg-secondary-opacity">PDF</a>
                                    @endif
                                </td>
                                <td>
                                    @if ($lesson->audio)
                                        <i class="feather-volume-2"></i>
                                    @endif
                                </td>
                                <td>{{ $lesson->duration }}</td>
                                <td>
                                    <div class="rbt-button-group justify-content-end">
                                        @can('edit lesson')
                                        <a href="{{ route($routePrefix . '.edit', $lesson->id) }}"
                                            class="rbt-btn btn-xs bg-secondary-opacity radius-round" title="تعديل"><i
                                                class="feather-edit pl--0"></i></a>
                                        @endcan
                                        @can('delete lesson')
                                        <button class="rbt-btn btn-xs bg-color-danger-opacity radius-round color-danger"
                                            onclick="confirmDelete('{{ addslashes($lesson->title) }}', '{{ route($routePrefix . '.destroy', $lesson->id) }}')" title="حذف">
                                            <i class="feather-trash-2 pl--0"></i>
                                        </button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $lessons->links() }}
            </div>

        </div>
    </div>
@endsection