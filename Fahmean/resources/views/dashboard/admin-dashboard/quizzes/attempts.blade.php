@extends('layout.dashboard')

@php
    $header = 'false';
    $footer = 'false';
    $topToBottom = 'false';
@endphp

@section('dashboard-content')
<div class="rbt-dashboard-content bg-color-white radius-10 shadow-sm p-4 p-md-5">
    <div class="content">
        <div class="row mb--40 align-items-center g-3">
            <div class="col-lg-8">
                <div class="d-flex align-items-center gap-3">
                    <div class="icon-box bg-primary-opacity rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                        <i class="feather-users fs-3 color-primary"></i>
                    </div>
                    <div>
                        <h2 class="mb-1 fw-bold">محاولات الطلاب</h2>
                        <p class="text-muted mb-0">نتائج محاولات الاختبار: <span class="color-primary fw-bold">{{ $quiz->title }}</span></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-lg-end text-start">
                <a href="{{ route('quizzes.index') }}" class="rbt-btn btn-xs btn-border radius-10">
                    <i class="feather-arrow-right me-1"></i> رجوع للاختبارات
                </a>
            </div>
        </div>

        <div class="rbt-dashboard-table table-responsive mobile-table-750">
            <table class="rbt-table table table-borderless align-middle">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4">الطالب</th>
                        <th class="text-center">الدرجة</th>
                        <th class="text-center">تاريخ ووقت المحاولة</th>
                        <th class="text-center">حالة النتائج</th>
                        <th class="text-end pe-4">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($quiz->students as $student)
                        <tr class="hover-row transition-all">
                            <td class="ps-4 py-4">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-group me-3">
                                        <div class="avatar bg-primary-opacity rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 45px; height: 45px; border: 2px solid white;">
                                            <span class="fw-bold color-primary">{{ mb_substr($student->name, 0, 1) }}</span>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-bold text-dark">{{ $student->name }}</h6>
                                        <small class="text-muted"><i class="feather-mail small me-1"></i>{{ $student->email }}</small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                @php
                                    $score = $student->pivot->score;
                                    $scoreClass = $score >= 80 ? 'bg-success' : ($score >= 50 ? 'bg-warning' : 'bg-danger');
                                @endphp
                                <div class="d-flex flex-column align-items-center">
                                    <div class="fw-bold fs-5 mb-1 {{ $score >= 50 ? 'color-success' : 'color-danger' }}">{{ $score }}%</div>
                                    <div class="progress w-100" style="height: 4px; max-width: 80px; background-color: #eee;">
                                        <div class="progress-bar {{ $scoreClass }}" role="progressbar" style="width: {{ $score }}%"></div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <div class="d-inline-flex flex-column align-items-center gap-1 bg-light p-2 px-3 radius-10">
                                    <span class="text-dark small fw-bold"><i class="feather-calendar me-1 color-primary"></i>{{ $student->pivot->created_at->format('Y-m-d') }}</span>
                                    <span class="text-muted extra-small"><i class="feather-clock me-1"></i>{{ $student->pivot->created_at->format('h:i A') }}</span>
                                </div>
                            </td>
                            <td class="text-center">
                                @if($student->pivot->completed)
                                    <span class="badge bg-success-opacity color-success radius-10 px-3 py-2">
                                        <i class="feather-check-circle me-1"></i> مكتمل
                                    </span>
                                @else
                                    <span class="badge bg-warning-opacity text-warning radius-10 px-3 py-2">
                                        <i class="feather-loader me-1"></i> قيد الحل
                                    </span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('quizzes.attempts.details', [$quiz->id, $student->id]) }}" 
                                       class="rbt-btn btn-xs bg-primary-opacity color-primary radius-10" title="عرض تفاصيل الإجابات">
                                        <i class="feather-eye me-1"></i> تفاصيل
                                    </a>
                                    <button type="button" 
                                            class="rbt-btn btn-xs bg-color-danger-opacity color-danger radius-10" 
                                            onclick="confirmReset('{{ $student->name }}', '{{ route('quizzes.reset-attempt', [$quiz->id, $student->id]) }}')"
                                            title="إعادة تصفير المحاولة">
                                        <i class="feather-refresh-cw"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <div class="empty-state py-5">
                                    <div class="icon-box bg-light rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4" style="width: 100px; height: 100px;">
                                        <i class="feather-file-text display-4 text-muted opacity-50"></i>
                                    </div>
                                    <h4 class="fw-bold text-dark">لا توجد محاولات</h4>
                                    <p class="text-muted">لم يقم أي طالب ببدء هذا الاختبار حتى الآن.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('modals')
<!-- Custom Modern Confirm Modal -->
<div class="modal fade" id="resetConfirmModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content radius-15 overflow-hidden border-0 shadow-lg">
            <div class="modal-body p-5 text-center">
                <div class="icon-box mb-4 mx-auto bg-danger-opacity rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                    <i class="feather-alert-triangle color-danger display-4"></i>
                </div>
                <h4 class="fw-bold mb-3">تأكيد إعادة المحاولة؟</h4>
                <p class="text-muted mb-4 px-3">
                    أنت على وشك حذف محاولة الطالب 
                    <strong id="confirmStudentName" class="text-dark"></strong>.
                    <br>
                    <span class="text-danger small">سيتم مسح الدرجة الحالية وسيتمكن الطالب من دخول الاختبار مرة أخرى.</span>
                </p>
                <div class="d-flex justify-content-center gap-3">
                    <button type="button" class="rbt-btn btn-md btn-border radius-round" data-bs-dismiss="modal">إلغاء</button>
                    <form id="resetForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="rbt-btn btn-md btn-gradient radius-round">نعم، تصفير الآن</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function confirmReset(studentName, actionUrl) {
        document.getElementById('confirmStudentName').innerText = studentName;
        document.getElementById('resetForm').action = actionUrl;
        const modal = new bootstrap.Modal(document.getElementById('resetConfirmModal'));
        modal.show();
    }
</script>

<style>
    .radius-10 { border-radius: 10px !important; }
    .radius-15 { border-radius: 15px !important; }
    .bg-primary-opacity { background: rgba(107, 76, 230, 0.08) !important; }
    .bg-success-opacity { background: rgba(43, 196, 138, 0.1) !important; }
    .bg-warning-opacity { background: rgba(245, 158, 11, 0.1) !important; }
    .bg-danger-opacity { background: rgba(255, 90, 95, 0.1) !important; }
    .bg-color-danger-opacity { background: rgba(255, 90, 95, 0.1) !important; }
    .color-primary { color: #6B4CE6 !important; }
    .color-success { color: #2BC48A !important; }
    .color-danger { color: #FF5A5F !important; }
    .extra-small { font-size: 11px; }
    .hover-row:hover { background-color: #f8f9fc; }
    .transition-all { transition: all 0.3s ease; }
    .rbt-table thead th { font-size: 13px; font-weight: 700; color: #6b7385; border-bottom: 2px solid #edf2f7; }
</style>
@endsection
