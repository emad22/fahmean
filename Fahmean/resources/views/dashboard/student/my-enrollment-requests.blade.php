@extends('layout.dashboard')

@php
    $header = 'false';
    $footer = 'false';
@endphp

@section('dashboard-content')
<style>
    .hero-header {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        padding: 45px 40px;
        border-radius: 25px;
        margin-bottom: 35px;
        position: relative; overflow: hidden;
    }
    .hero-header::before {
        content: ''; position: absolute;
        width: 300px; height: 300px;
        background: rgba(255,255,255,0.08);
        border-radius: 50%; top: -130px; right: -60px;
    }
    .hero-content { position: relative; z-index: 2; }
    .hero-title { font-size: 2.3rem; font-weight: 800; color: #fff; margin-bottom: 6px; }
    .hero-subtitle { color: rgba(255,255,255,0.85); font-size: 1.05rem; }

    .req-table-wrap {
        background: #fff;
        border-radius: 20px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.08);
        overflow: hidden;
    }
    .req-table thead th {
        background: #f8f9ff;
        font-weight: 700;
        color: #4a5568;
        border: none;
        padding: 18px 20px;
    }
    .req-table tbody td {
        padding: 16px 20px;
        border-bottom: 1px solid #f0f0f8;
        vertical-align: middle;
    }
    .req-table tbody tr:last-child td { border-bottom: none; }
    .req-table tbody tr:hover { background: #fafbff; }

    .status-badge {
        padding: 7px 16px; border-radius: 100px;
        font-size: 0.82rem; font-weight: 700;
        display: inline-flex; align-items: center; gap: 6px;
    }
    .status-pending  { background: #fef3c7; color: #92400e; }
    .status-approved { background: #d1fae5; color: #065f46; }
    .status-rejected { background: #fee2e2; color: #991b1b; }

    .course-mini-img {
        width: 50px; height: 50px;
        border-radius: 10px; object-fit: cover;
    }
</style>

<div class="hero-header">
    <div class="hero-content">
        <h1 class="hero-title">طلباتي للتسجيل</h1>
        <p class="hero-subtitle">تابع حالة طلباتك وانتظر التواصل من المدرس</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show rounded-4 mb-4">
        <i class="feather-check-circle me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="req-table-wrap">
    <table class="table req-table mb-0">
        <thead>
            <tr>
                <th>#</th>
                <th>الكورس</th>
                <th>المدرس</th>
                <th>المادة</th>
                <th>تاريخ الطلب</th>
                <th>الحالة</th>
                <th>ملاحظات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($requests as $req)
            <tr>
                <td class="text-muted fw-600">{{ $loop->iteration }}</td>
                <td>
                    <div class="d-flex align-items-center gap-3">
                        <img src="{{ $req->course->image ? asset('storage/'.$req->course->image) : asset('assets/images/course/course-01.jpg') }}"
                             class="course-mini-img" alt="{{ $req->course->title }}">
                        <span class="fw-700">{{ $req->course->title }}</span>
                    </div>
                </td>
                <td>{{ $req->course->teacher->name ?? '—' }}</td>
                <td>{{ $req->course->subject->name ?? '—' }}</td>
                <td>{{ $req->created_at->format('d/m/Y') }}</td>
                <td>
                    @php
                        $statusMap = [
                            'pending'  => ['label' => 'قيد الانتظار', 'class' => 'status-pending',  'icon' => 'feather-clock'],
                            'approved' => ['label' => 'مقبول',        'class' => 'status-approved', 'icon' => 'feather-check-circle'],
                            'rejected' => ['label' => 'مرفوض',        'class' => 'status-rejected', 'icon' => 'feather-x-circle'],
                        ];
                        $s = $statusMap[$req->status] ?? ['label' => $req->status, 'class' => 'status-pending', 'icon' => 'feather-help-circle'];
                    @endphp
                    <span class="status-badge {{ $s['class'] }}">
                        <i class="{{ $s['icon'] }}"></i>
                        {{ $s['label'] }}
                    </span>
                </td>
                <td class="text-muted small">{{ $req->notes ?? '—' }}</td>
                <td>
                    @if($req->status === 'rejected')
                        <form action="{{ route('student.enrollment-requests.store', $req->course_id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                <i class="feather-refresh-cw me-1"></i> إعادة المحاولة
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center py-5">
                    <i class="feather-inbox" style="font-size:3rem;color:#d1d5db;display:block;margin-bottom:12px;"></i>
                    <span class="text-muted">لا توجد طلبات حتى الآن</span>
                    <br>
                    <a href="{{ route('student.available-courses') }}" class="btn btn-primary mt-3 rounded-pill px-4">
                        تصفّح الكورسات المتاحة
                    </a>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Pagination --}}
@if($requests->hasPages())
<div class="d-flex justify-content-center mt-4">
    {{ $requests->links() }}
</div>
@endif
@endsection
