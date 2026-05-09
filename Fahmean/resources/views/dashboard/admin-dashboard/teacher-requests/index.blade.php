@extends('layout.dashboard')

@php
    $header = 'false';
    $footer = 'false';
    $topToBottom = 'true';
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

    .modal-backdrop {
        position: fixed;
        top: 0;
        right: 0;
        z-index: 1 !important;
        width: 100vw;
        height: 100vh;
        background-color: rgba(0,0,0,0.5) !important;
    }

    /* Dark Mode Support for Modals */
    .active-dark-mode .modal-content {
        background-color: #1a1a2e !important;
        color: #e2e8f0 !important;
        border: 1px solid rgba(255,255,255,0.1) !important;
    }
    .active-dark-mode .modal-header .modal-title,
    .active-dark-mode .modal-body .fw-600 {
        color: #ffffff !important;
    }
    .active-dark-mode .modal-body .text-muted {
        color: #a0aec0 !important;
    }
    .active-dark-mode .modal-body .bg-light {
        background-color: rgba(255,255,255,0.05) !important;
        color: #cbd5e0 !important;
    }
    .active-dark-mode .btn-close {
        filter: invert(1) grayscale(100%) brightness(200%);
    }
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

@foreach($requests as $req)
<div class="modal fade" id="detailModal{{ $req->id }}" tabindex="-1" aria-hidden="true" style="z-index: 9999;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 20px; border: none; box-shadow: 0 15px 50px rgba(0,0,0,0.15);">
            <div class="modal-header border-bottom-0 pt-4 px-4">
                <h5 class="modal-title fw-800">تفاصيل الطلب: {{ $req->frist_name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4 pb-4">
                <div class="mb-3">
                    <label class="text-muted small d-block mb-1">العنوان</label>
                    <div class="fw-600">{{ $req->address }}</div>
                </div>
                <div class="mb-3">
                    <label class="text-muted small d-block mb-1">الخبرة السابقة</label>
                    <div class="p-3 bg-light rounded-3" style="white-space: pre-line; font-size: 0.95rem; line-height: 1.6;">{{ $req->work_experience }}</div>
                </div>
                @if($req->facebook_link)
                <div class="mb-3">
                    <label class="text-muted small d-block mb-1">رابط الفيسبوك</label>
                    <a href="{{ $req->facebook_link }}" target="_blank" class="text-primary fw-600 text-break">{{ $req->facebook_link }}</a>
                </div>
                @endif
                @if($req->students_num)
                <div>
                    <label class="text-muted small d-block mb-1">عدد الطلاب المتوقع</label>
                    <div class="fw-600">{{ $req->students_num }} طالب</div>
                </div>
                @endif
            </div>
            <div class="modal-footer border-top-0 px-4 pb-4">
                <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal" data-dismiss="modal">إغلاق</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle all close buttons
        const closeButtons = document.querySelectorAll('[data-bs-dismiss="modal"], [data-dismiss="modal"]');
        closeButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                const modal = this.closest('.modal');
                if (modal) {
                    // Try Bootstrap 5 way
                    if (window.bootstrap && bootstrap.Modal) {
                        const modalInstance = bootstrap.Modal.getInstance(modal);
                        if (modalInstance) modalInstance.hide();
                    }
                    // Fallback: manual cleanup
                    setTimeout(() => {
                        modal.classList.remove('show');
                        modal.style.display = 'none';
                        document.querySelectorAll('.modal-backdrop').forEach(b => b.remove());
                        document.body.classList.remove('modal-open');
                        document.body.style.overflow = '';
                        document.body.style.paddingRight = '';
                    }, 100);
                }
            });
        });

        // Mark as read when clicking details
        document.querySelectorAll('[data-bs-target^="#detailModal"]').forEach(btn => {
            btn.addEventListener('click', function() {
                const modalId = this.getAttribute('data-bs-target').replace('#detailModal', '');
                
                fetch(`/dashboard/teacher-requests/${modalId}/mark-as-read`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Hide the badge in the sidebar
                        const sidebarBadge = document.querySelector('.badge.bg-primary');
                        if (sidebarBadge && sidebarBadge.closest('a').getAttribute('href').includes('teacher-requests')) {
                            // Only hide if it's the teacher requests badge
                            // We can use a more specific selector if needed
                            sidebarBadge.style.display = 'none';
                        }
                    }
                });
            });
        });

        // Also fix the backdrop issue if it persists
        document.querySelectorAll('.modal').forEach(modal => {
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    const btn = modal.querySelector('[data-bs-dismiss="modal"]');
                    if (btn) btn.click();
                }
            });
        });
    });
</script>
@endsection
