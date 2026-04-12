@extends('layout.dashboard')

@php
    $header = 'false';
    $footer = 'false';
    $topToBottom = 'false';
@endphp

@section('dashboard-content')
<div class="rbt-dashboard-content bg-color-white radius-10 shadow-sm p-4 p-md-5">
    <div class="content">
        <div class="section-title mb--30 d-flex justify-content-between align-items-center">
            <div>
                <h4 class="rbt-title-style-3 mb-0">سجل الاختبارات والنتائج</h4>
                <p class="text-muted small mb-0">استعرض أداءك وتطورك في جميع الاختبارات التي خضتها خلال مسيرتك التعليمية.</p>
            </div>
            <div class="icon bg-primary-opacity color-primary rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 60px; height: 60px;">
                <i class="feather-award fs-3"></i>
            </div>
        </div>

        <div class="rbt-dashboard-table table-responsive mt--30">
            <table class="rbt-table table table-borderless align-middle">
                <thead class="bg-light contrast-bg">
                    <tr>
                        <th class="ps-4">الاختبار / المساق</th>
                        <th class="text-center">التاريخ</th>
                        <th class="text-center">المحاولات</th>
                        <th class="text-center">الدرجة النهائية</th>
                        <th class="text-center">الحالة</th>
                        <th class="text-end pe-4">الإجراء</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($attempts as $quiz)
                        <tr class="hover-row">
                            <td class="ps-4 py-4">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="activity-icon bg-primary-opacity color-primary rounded-3 d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                        <i class="feather-file-text"></i>
                                    </div>
                                    <div class="info">
                                        <h6 class="mb-0 fw-bold text-dark">{{ $quiz->title }}</h6>
                                        <small class="text-muted d-flex align-items-center gap-1">
                                            <i class="feather-bookmark small"></i>
                                            {{ $quiz->section->course->title ?? '-' }}
                                        </small>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="small fw-semibold text-muted">
                                    <i class="feather-calendar me-1"></i>
                                    {{ $quiz->pivot->updated_at->format('Y/m/d') }}
                                </span>
                            </td>
                            <td class="text-center">
                                <span class="badge rounded-pill bg-light text-dark border px-3">
                                    {{ $quiz->pivot->attempt_count ?? 1 }} محاولة
                                </span>
                            </td>
                            <td class="text-center" style="min-width: 150px;">
                                <div class="d-inline-block text-start w-100 px-lg-4">
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <span class="fw-bold {{ $quiz->pivot->score >= 50 ? 'color-success' : 'color-danger' }}" style="font-size: 1.1rem;">
                                            {{ $quiz->pivot->score ?? 0 }}%
                                        </span>
                                    </div>
                                    <div class="progress" style="height: 6px; background-color: #f1f1f1; border-radius: 10px;">
                                        <div class="progress-bar {{ $quiz->pivot->score >= 50 ? 'bg-success' : 'bg-danger' }}" 
                                             role="progressbar" 
                                             style="width: {{ $quiz->pivot->score ?? 0 }}%; border-radius: 10px;" 
                                             aria-valuenow="{{ $quiz->pivot->score ?? 0 }}" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                @if($quiz->pivot->completed)
                                    <span class="badge-custom badge-success">
                                        <i class="feather-check-circle me-1"></i> مكتمل
                                    </span>
                                @else
                                    <span class="badge-custom badge-warning">
                                        <i class="feather-clock me-1"></i> مستمر
                                    </span>
                                @endif
                            </td>
                            <td class="text-end pe-4">
                                <a href="{{ route('student.quizzes.show', ['course_id' => $quiz->section->course_id, 'id' => $quiz->id]) }}" 
                                   class="rbt-btn btn-xs bg-primary-opacity color-primary hover-white radius-round">
                                    <i class="feather-eye me-1"></i> مراجعة
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div class="empty-state py-5">
                                    <div class="icon-box mb-4 mx-auto bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                                        <i class="feather-clipboard display-4 text-muted opacity-50"></i>
                                    </div>
                                    <h5 class="fw-bold">لا توجد محاولات سابقة</h5>
                                    <p class="text-muted">ابدأ رحلتك التعليمية الآن بالانضمام إلى اختبارات الكورسات.</p>
                                    <a href="{{ route('courses.index') }}" class="rbt-btn btn-gradient btn-sm radius-10 mt-3">تصفح الكورسات</a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    .contrast-bg { background-color: #f8f9fc !important; border-bottom: 2px solid #edf2f7; }
    .hover-row { transition: all 0.2s ease; border-bottom: 1px solid #f2f2f2; }
    .hover-row:hover { background-color: #fcfdfe; transform: scale(1.002); }
    
    .badge-custom {
        padding: 6px 14px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
    }
    .badge-success { background: rgba(43, 196, 138, 0.1); color: #2BC48A; }
    .badge-warning { background: rgba(255, 193, 7, 0.1); color: #FFC107; }
    
    .bg-primary-opacity { background: rgba(107, 76, 230, 0.08) !important; }
    .color-primary { color: #6B4CE6 !important; }
    .color-success { color: #2BC48A !important; }
    .color-danger { color: #FF5A5F !important; }
    .bg-success { background-color: #2BC48A !important; }
    .bg-danger { background-color: #FF5A5F !important; }
    
    .hover-white:hover { color: white !important; background: #6B4CE6 !important; }
    
    .rbt-table thead th {
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #6b7385;
        font-weight: 700;
        padding: 15px;
    }
</style>
@endsection
