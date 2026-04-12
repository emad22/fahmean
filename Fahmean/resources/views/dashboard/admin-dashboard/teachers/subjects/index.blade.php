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

            <div class="section-title">
                <h4 class="rbt-title-style-3">ربط المواد بالمدرسين</h4>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="rbt-dashboard-table table-responsive mt--30">
                <table class="rbt-table table table-borderless">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم المدرس</th>
                            <th>المواد الحالية</th>
                            <th>التحكم</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($teachers as $teacher)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $teacher->name }}</td>
                                <td>
                                    @foreach ($teacher->subjects as $sub)
                                        <span class="badge bg-primary">{{ $sub->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    <div class="rbt-button-group justify-content-end">
                                        <a href="{{ route('admin.teacher-subjects.edit', $teacher->id) }}"
                                            class="rbt-btn btn-xs bg-secondary-opacity radius-round" title="تعديل"><i
                                                class="feather-edit pl--0"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $teachers->links() }}
            </div>
        </div>
    </div>
@endsection