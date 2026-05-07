@extends('layout.dashboard')

@php
    $header = 'false';
    $footer = 'false';
@endphp

@section('dashboard-content')
<style>
    :root {
        --primary: #667eea;
        --primary-end: #764ba2;
        --shadow-soft: 0 10px 40px rgba(0,0,0,0.08);
    }
    .hero-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 45px 40px;
        border-radius: 25px;
        margin-bottom: 35px;
        position: relative; overflow: hidden;
    }
    .hero-title { font-size: 2.4rem; font-weight: 800; color: #fff; margin-bottom: 8px; }
    .hero-subtitle { color: rgba(255,255,255,0.85); font-size: 1.1rem; }
    .table-wrap { background: #fff; border-radius: 20px; box-shadow: var(--shadow-soft); overflow: hidden; }
    .main-table thead th { background: #f8f9ff; font-weight: 700; color: #4a5568; border: none; padding: 18px 16px; font-size: 0.88rem; }
    .main-table tbody td { padding: 15px 16px; border-bottom: 1px solid #f0f0f8; vertical-align: middle; }
    .main-table tbody tr:hover { background: #fafbff; }
</style>

<div class="hero-header">
    <div class="hero-content row align-items-center">
        <div class="col-lg-12">
            <h1 class="hero-title">طلبات المعلمين</h1>
            <p class="hero-subtitle">إدارة ومراجعة طلبات الانضمام كمعلم للمنصة</p>
        </div>
    </div>
</div>

<div class="table-wrap">
    <table class="table main-table mb-0">
        <thead>
            <tr>
                <th>الاسم</th>
                <th>المرحلة</th>
                <th>المادة</th>
                <th>رقم الهاتف</th>
                <th>البريد الإلكتروني</th>
                <th>التاريخ</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($requests as $req)
            <tr>
                <td>
                    <div class="fw-700 color-darker">{{ $req->frist_name }} {{ $req->last_name }}</div>
                </td>
                <td><span class="badge bg-light text-dark px-3 py-2 rounded-pill">{{ $req->academic_level }}</span></td>
                <td class="fw-600">{{ $req->subject_name }}</td>
                <td dir="ltr" class="text-end">{{ $req->phone_num }}</td>
                <td dir="ltr" class="text-end">{{ $req->email }}</td>
                <td class="text-muted small">{{ $req->created_at->format('d/m/Y') }}</td>
                <td>
                    <button class="btn btn-sm btn-primary rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#detailModal{{ $req->id }}">
                        <i class="feather-eye me-1"></i> التفاصيل
                    </button>

                    <!-- Details Modal -->
                    <div class="modal fade" id="detailModal{{ $req->id }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content" style="border-radius: 20px; border: none;">
                                <div class="modal-header border-bottom-0 pt-4 px-4">
                                    <h5 class="modal-title fw-800">تفاصيل الطلب: {{ $req->frist_name }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body px-4 pb-4">
                                    <div class="mb-3">
                                        <label class="text-muted small d-block mb-1">العنوان</label>
                                        <div class="fw-600">{{ $req->address }}</div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="text-muted small d-block mb-1">الخبرة السابقة</label>
                                        <div class="p-3 bg-light rounded-3" style="white-space: pre-line;">{{ $req->work_experience }}</div>
                                    </div>
                                    @if($req->facebook_link)
                                    <div class="mb-3">
                                        <label class="text-muted small d-block mb-1">رابط الفيسبوك</label>
                                        <a href="{{ $req->facebook_link }}" target="_blank" class="text-primary fw-600">{{ $req->facebook_link }}</a>
                                    </div>
                                    @endif
                                    @if($req->students_num)
                                    <div>
                                        <label class="text-muted small d-block mb-1">عدد الطلاب المتوقع</label>
                                        <div class="fw-600">{{ $req->students_num }} طالب</div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center py-5 text-muted">
                    <i class="feather-inbox d-block mb-2" style="font-size: 2rem;"></i>
                    لا توجد طلبات حالياً
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($requests->hasPages())
<div class="d-flex justify-content-center mt-4">
    {{ $requests->links() }}
</div>
@endif
@endsection
