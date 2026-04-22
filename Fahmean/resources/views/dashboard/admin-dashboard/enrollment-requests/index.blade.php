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
        --success: #10b981;
        --warning: #f59e0b;
        --danger: #ef4444;
        --shadow-soft: 0 10px 40px rgba(0,0,0,0.08);
    }
    .hero-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 45px 40px;
        border-radius: 25px;
        margin-bottom: 35px;
        position: relative; overflow: hidden;
    }
    .hero-header::before {
        content: ''; position: absolute;
        width: 350px; height: 350px;
        background: rgba(255,255,255,0.08);
        border-radius: 50%; top: -150px; right: -80px;
    }
    .hero-content { position: relative; z-index: 2; }
    .hero-title { font-size: 2.4rem; font-weight: 800; color: #fff; margin-bottom: 8px; }
    .hero-subtitle { color: rgba(255,255,255,0.85); font-size: 1.1rem; }

    .stats-strip {
        display: flex; gap: 16px; flex-wrap: wrap; margin-bottom: 30px;
    }
    .stat-card {
        background: #fff; border-radius: 16px; padding: 20px 28px;
        box-shadow: var(--shadow-soft);
        display: flex; align-items: center; gap: 16px;
        flex: 1; min-width: 160px;
    }
    .stat-icon {
        width: 52px; height: 52px; border-radius: 14px;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.4rem; color: #fff;
    }
    .stat-icon.pending-bg  { background: linear-gradient(135deg, #f59e0b, #d97706); }
    .stat-icon.approved-bg { background: linear-gradient(135deg, #10b981, #059669); }
    .stat-icon.rejected-bg { background: linear-gradient(135deg, #ef4444, #dc2626); }
    .stat-icon.total-bg    { background: linear-gradient(135deg, #667eea, #764ba2); }
    .stat-num  { font-size: 1.8rem; font-weight: 800; color: #1a1a2e; line-height: 1; }
    .stat-label { font-size: 0.85rem; color: #6b7280; font-weight: 600; }

    .filter-card {
        background: #fff; border-radius: 18px; padding: 22px 28px;
        box-shadow: var(--shadow-soft); margin-bottom: 28px;
    }

    .table-wrap {
        background: #fff; border-radius: 20px;
        box-shadow: var(--shadow-soft); overflow: hidden;
    }
    .main-table thead th {
        background: #f8f9ff; font-weight: 700;
        color: #4a5568; border: none; padding: 18px 16px;
        font-size: 0.88rem;
    }
    .main-table tbody td {
        padding: 15px 16px;
        border-bottom: 1px solid #f0f0f8;
        vertical-align: middle;
    }
    .main-table tbody tr:last-child td { border-bottom: none; }
    .main-table tbody tr:hover { background: #fafbff; }

    .student-info { display: flex; align-items: center; gap: 10px; }
    .avatar {
        width: 42px; height: 42px; border-radius: 12px;
        background: linear-gradient(135deg, var(--primary), var(--primary-end));
        display: flex; align-items: center; justify-content: center;
        font-weight: 800; font-size: 1rem; color: #fff; flex-shrink: 0;
    }
    .student-name { font-weight: 700; color: #1a1a2e; font-size: 0.92rem; }
    .student-code { font-size: 0.78rem; color: #9ca3af; }

    .course-mini { display: flex; align-items: center; gap: 10px; }
    .course-thumb {
        width: 46px; height: 46px; border-radius: 10px;
        object-fit: cover;
    }
    .course-name { font-weight: 700; font-size: 0.9rem; color: #1a1a2e; }
    .course-teacher { font-size: 0.78rem; color: #9ca3af; }

    .status-badge {
        padding: 6px 14px; border-radius: 100px;
        font-size: 0.8rem; font-weight: 700;
        display: inline-flex; align-items: center; gap: 5px;
    }
    .status-pending  { background: #fef3c7; color: #92400e; }
    .status-approved { background: #d1fae5; color: #065f46; }
    .status-rejected { background: #fee2e2; color: #991b1b; }

    .action-group { display: flex; gap: 8px; flex-wrap: wrap; }

    .btn-enroll {
        padding: 8px 16px; border-radius: 10px; border: none;
        background: linear-gradient(135deg, #10b981, #059669);
        color: #fff; font-weight: 700; font-size: 0.82rem;
        display: flex; align-items: center; gap: 5px;
        cursor: pointer; transition: all 0.25s;
    }
    .btn-enroll:hover { transform: translateY(-2px); box-shadow: 0 6px 16px rgba(16,185,129,0.4); }

    .btn-reject {
        padding: 8px 16px; border-radius: 10px; border: none;
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: #fff; font-weight: 700; font-size: 0.82rem;
        display: flex; align-items: center; gap: 5px;
        cursor: pointer; transition: all 0.25s;
    }
    .btn-reject:hover { transform: translateY(-2px); box-shadow: 0 6px 16px rgba(239,68,68,0.4); }

    .btn-unenroll {
        padding: 8px 16px; border-radius: 10px; border: none;
        background: linear-gradient(135deg, #f59e0b, #d97706);
        color: #fff; font-weight: 700; font-size: 0.82rem;
        display: flex; align-items: center; gap: 5px;
        cursor: pointer; transition: all 0.25s;
    }
    .btn-unenroll:hover { transform: translateY(-2px); box-shadow: 0 6px 16px rgba(245,158,11,0.4); }

    /* Reject Modal */
    .modal-content { border-radius: 20px; border: none; }
    .modal-header { border-radius: 20px 20px 0 0; border-bottom: 1px solid #f0f0f8; padding: 22px 28px; }
    .modal-body { padding: 28px; }
    .modal-footer { border-top: 1px solid #f0f0f8; padding: 18px 28px; }
</style>

{{-- Hero --}}
<div class="hero-header">
    <div class="hero-content row align-items-center">
        <div class="col-lg-8">
            <h1 class="hero-title">طلبات التسجيل</h1>
            <p class="hero-subtitle">إدارة طلبات الطلاب للانضمام إلى الكورسات</p>
        </div>
        <div class="col-lg-4 text-end">
            @if($pendingCount > 0)
                <span class="badge bg-warning text-dark fs-5 px-4 py-3 rounded-pill shadow">
                    <i class="feather-bell me-2"></i>
                    {{ $pendingCount }} طلب جديد
                </span>
            @endif
        </div>
    </div>
</div>

{{-- Stats --}}
<div class="stats-strip">
    <div class="stat-card">
        <div class="stat-icon pending-bg"><i class="feather-clock"></i></div>
        <div>
            <div class="stat-num">{{ $requests->total() }}</div>
            <div class="stat-label">إجمالي الطلبات</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon pending-bg"><i class="feather-alert-circle"></i></div>
        <div>
            <div class="stat-num">{{ $pendingCount }}</div>
            <div class="stat-label">قيد الانتظار</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon approved-bg"><i class="feather-check-circle"></i></div>
        <div>
            <div class="stat-num">{{ $requests->where('status','approved')->count() }}</div>
            <div class="stat-label">مقبولة</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon rejected-bg"><i class="feather-x-circle"></i></div>
        <div>
            <div class="stat-num">{{ $requests->where('status','rejected')->count() }}</div>
            <div class="stat-label">مرفوضة</div>
        </div>
    </div>
</div>

{{-- Alerts --}}
@foreach(['success','info','warning'] as $type)
    @if(session($type))
        <div class="alert alert-{{ $type }} alert-dismissible fade show rounded-4 mb-4">
            {{ session($type) }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
@endforeach
@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show rounded-4 mb-4">
        {{ $errors->first() }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

{{-- Filters --}}
<div class="filter-card">
    <form method="GET" action="{{ route('admin.enrollment-requests.index') }}" class="row g-3 align-items-end">
        <div class="col-md-4">
            <label class="form-label fw-700 small">الحالة</label>
            <select name="status" class="form-select rounded-3">
                <option value="">كل الحالات</option>
                <option value="pending"  {{ request('status') === 'pending'  ? 'selected' : '' }}>قيد الانتظار</option>
                <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>مقبولة</option>
                <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>مرفوضة</option>
            </select>
        </div>
        <div class="col-md-5">
            <label class="form-label fw-700 small">الكورس</label>
            <select name="course_id" class="form-select rounded-3">
                <option value="">كل الكورسات</option>
                @foreach($courses as $c)
                    <option value="{{ $c->id }}" {{ request('course_id') == $c->id ? 'selected' : '' }}>{{ $c->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-primary w-100 rounded-3 fw-700">
                <i class="feather-filter me-1"></i> تصفية
            </button>
        </div>
    </form>
</div>

{{-- Table --}}
<div class="table-wrap">
    <table class="table main-table mb-0">
        <thead>
            <tr>
                <th>#</th>
                <th>الطالب</th>
                <th>الكورس</th>
                <th>تاريخ الطلب</th>
                <th>الحالة</th>
                <th>معالَج بواسطة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($requests as $req)
            <tr>
                <td class="text-muted fw-600 small">{{ $req->id }}</td>
                <td>
                    <div class="student-info">
                        <div class="avatar">{{ mb_substr($req->student->name ?? 'ط', 0, 1) }}</div>
                        <div>
                            <div class="student-name">{{ $req->student->name }}</div>
                            <div class="student-code">{{ $req->student->student->student_code ?? '' }}</div>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="course-mini">
                        <img src="{{ $req->course->image ? asset('storage/'.$req->course->image) : asset('assets/images/course/course-01.jpg') }}"
                             class="course-thumb" alt="{{ $req->course->title }}">
                        <div>
                            <div class="course-name">{{ Str::limit($req->course->title, 30) }}</div>
                            <div class="course-teacher">{{ $req->course->teacher->name ?? '—' }}</div>
                        </div>
                    </div>
                </td>
                <td class="text-muted small">{{ $req->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    @php
                        $map = [
                            'pending'  => ['label' => 'قيد الانتظار', 'class' => 'status-pending',  'icon' => 'feather-clock'],
                            'approved' => ['label' => 'مقبول',        'class' => 'status-approved', 'icon' => 'feather-check-circle'],
                            'rejected' => ['label' => 'مرفوض',        'class' => 'status-rejected', 'icon' => 'feather-x-circle'],
                        ];
                        $s = $map[$req->status] ?? ['label' => $req->status, 'class' => 'status-pending', 'icon' => 'feather-help-circle'];
                    @endphp
                    <span class="status-badge {{ $s['class'] }}">
                        <i class="{{ $s['icon'] }}"></i>
                        {{ $s['label'] }}
                    </span>
                </td>
                <td class="text-muted small">{{ $req->processor->name ?? '—' }}</td>
                <td>
                    <div class="action-group">
                        @if($req->isPending())
                            {{-- زر Enroll --}}
                            <form action="{{ route('admin.enrollment-requests.enroll', $req->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn-enroll"
                                    onclick="return confirm('هل تأكدت من عملية الدفع؟ سيتم تسجيل الطالب في الكورس.')">
                                    <i class="feather-user-check"></i> تسجيل
                                </button>
                            </form>
                            {{-- زر Reject --}}
                            <button class="btn-reject"
                                data-bs-toggle="modal"
                                data-bs-target="#rejectModal"
                                data-req-id="{{ $req->id }}"
                                data-student="{{ $req->student->name }}"
                                data-course="{{ $req->course->title }}">
                                <i class="feather-x"></i> رفض
                            </button>
                        @elseif($req->isApproved())
                            {{-- زر Unenroll --}}
                            <form action="{{ route('admin.enrollment-requests.unenroll', [$req->course_id, $req->student_id]) }}"
                                  method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-unenroll"
                                    onclick="return confirm('سيتم إلغاء تسجيل الطالب من الكورس مع الاحتفاظ بكل بياناته وأنشطته. هل تريد المتابعة؟')">
                                    <i class="feather-user-minus"></i> إلغاء التسجيل
                                </button>
                            </form>
                        @else
                            <span class="text-muted small">—</span>
                        @endif
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center py-5">
                    <i class="feather-inbox" style="font-size:3rem;color:#d1d5db;display:block;margin-bottom:14px;"></i>
                    <span class="text-muted fs-6">لا توجد طلبات تسجيل حالياً</span>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Pagination --}}
@if($requests->hasPages())
<div class="d-flex justify-content-center mt-4">
    {{ $requests->appends(request()->query())->links() }}
</div>
@endif

{{-- Reject Modal --}}
<div class="modal fade" id="rejectModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-800">رفض طلب التسجيل</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="rejectForm" method="POST">
                @csrf
                <div class="modal-body">
                    <p class="mb-3 text-muted">
                        سيتم رفض طلب <strong id="rejectStudentName"></strong> في كورس
                        <strong id="rejectCourseName"></strong>.
                    </p>
                    <div class="mb-0">
                        <label class="form-label fw-700">سبب الرفض (اختياري)</label>
                        <textarea name="notes" class="form-control rounded-3" rows="3"
                                  placeholder="اكتب ملاحظة للطالب..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light rounded-3" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-danger rounded-3 fw-700">
                        <i class="feather-x me-1"></i> تأكيد الرفض
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('rejectModal').addEventListener('show.bs.modal', function (e) {
        const btn = e.relatedTarget;
        document.getElementById('rejectStudentName').textContent = btn.dataset.student;
        document.getElementById('rejectCourseName').textContent  = btn.dataset.course;
        const reqId = btn.dataset.reqId;
        document.getElementById('rejectForm').action = `/dashboard/enrollment-requests/${reqId}/reject`;
    });
</script>
@endsection
