@extends('layout.dashboard')

@php
    $header = 'false';
    $footer = 'false';
    $topToBottom = 'false';
    $bodyClass = '';
@endphp

@section('dashboard-content')
    <style>
        .premium-course-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            border: 1px solid #f0f0f0;
            height: 100%;
            display: flex;
            flex-direction: column;
            position: relative;
        }

        .premium-course-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            border-color: var(--color-primary);
        }

        .course-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            z-index: 10;
            padding: 8px 18px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 700;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .course-thumbnail {
            height: 280px; /* Increased height */
            overflow: hidden;
            position: relative;
        }

        .course-thumbnail img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .premium-course-card:hover .course-thumbnail img {
            transform: scale(1.1);
        }

        .course-content {
            padding: 30px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .teacher-info {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .course-meta-icons {
            display: flex;
            gap: 20px;
            margin-top: auto;
            padding-top: 20px;
            border-top: 1px solid #f5f5f5;
        }

        .meta-item {
            font-size: 0.9rem;
            color: #6b7385;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .status-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
            margin-inline-end: 8px;
        }

        .dot-published { background: #28a745; box-shadow: 0 0 5px #28a745; }
        .dot-draft { background: #ffc107; box-shadow: 0 0 5px #ffc107; }

        .price-tag {
            font-weight: 800;
            color: var(--color-primary);
            font-size: 1.4rem; /* Larger font */
        }
        
        .radius-15 { border-radius: 15px !important; }
        /* SweetAlert overrides if needed */
        .swal2-popup {
            font-family: 'Tajawal', sans-serif !important;
        }
    </style>

    <!-- Header & Statistics -->
    <div class="row align-items-center mb--40 g-4">
        <div class="col-lg-6">
            <h2 class="mb-0 fw-bold">إدارة الكورسات التعليمية</h2>
            <p class="text-muted mb-0">تحكم بمساقك التعليمي، الدروس، والطلاب المسجلين.</p>
        </div>
        <div class="col-lg-6 text-end">
            <a href="{{ route('courses.create') }}" class="rbt-btn btn-gradient btn-md radius-10 shadow-lg">
                <i class="feather-plus-circle me-1"></i> إنشاء كورس جديد
            </a>
        </div>
    </div>

    <!-- Course Grid -->
    <div class="row g-5">
        @forelse ($courses as $course)
            <div class="col-lg-6 col-md-12 col-12"> <!-- Larger Columns -->
                <div class="premium-course-card shadow-sm">
                    <!-- Badge for Subject -->
                    <span class="course-badge bg-white color-primary shadow-sm border">
                        <i class="feather-layers me-1 small"></i> {{ $course->subject->name ?? 'مادة عامة' }}
                    </span>

                    <!-- Thumbnail -->
                    <div class="course-thumbnail">
                        <img src="{{ asset('uploads/'.$course->image) }}" alt="{{ $course->title }}">
                    </div>

                    <div class="course-content">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="small text-uppercase fw-bold text-muted">
                                <span class="status-dot {{ $course->status == 'published' ? 'dot-published' : 'dot-draft' }}"></span>
                                {{ $course->status == 'published' ? 'منشور' : 'مسودة' }}
                            </span>
                            <div class="dropdown">
                                <button class="btn btn-sm p-0 border-0 bg-transparent text-muted" data-bs-toggle="dropdown">
                                    <i class="feather-more-horizontal scale-150"></i> <!-- Larger icon -->
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 radius-10 p-2">
                                    <li>
                                        <form action="{{ route('courses.update-status', $course->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="{{ $course->status == 'published' ? 'draft' : 'published' }}">
                                            <button type="submit" class="dropdown-item radius-10 small">
                                                <i class="feather-refresh-cw me-2"></i> {{ $course->status == 'published' ? 'تحويل لمسودة' : 'نشر الكورس' }}
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <h4 class="fw-bold mb-3" style="line-height: 1.4; font-size: 1.5rem;">{{ $course->title }}</h4>

                        <div class="teacher-info">
                            <i class="feather-user text-muted small"></i>
                            <span class="small fw-bold">{{ $course->teacher->name ?? 'غير محدد' }}</span>
                        </div>

                        <div class="price-tag mb-4">{{ number_format($course->price, 0) }} <small class="fw-normal" style="font-size: 0.6em;">ج.م</small></div>

                        <div class="course-meta-icons">
                            <div class="meta-item"><i class="feather-folder"></i> {{ $course->sections_count ?? 0 }} وحدات</div>
                            <div class="meta-item"><i class="feather-play-circle"></i> {{ $course->lessons_count ?? 0 }} دروس</div>
                            <a href="{{ route('courses.enrolled-students', $course->id) }}" class="meta-item text-primary">
                                <i class="feather-users"></i> {{ $course->students_count ?? 0 }} طالب
                            </a>
                        </div>

                        <div class="d-flex gap-2 mt-4 pt-3 border-top">
                            <!-- Enroll Students - Primary Action -->
                            <button type="button" class="rbt-btn btn-md btn-gradient radius-10 flex-grow-1 text-center justify-content-center" 
                                    data-bs-toggle="modal" data-bs-target="#enrollModal{{ $course->id }}">
                                <i class="feather-user-plus me-2"></i> تسجيل طلاب
                            </button>
                            
                            <!-- Edit -->
                            <a href="{{ route('courses.edit', $course->id) }}" class="rbt-btn btn-md bg-secondary-opacity radius-10" title="تعديل بانات الكورس">
                                <i class="feather-edit"></i>
                            </a>
                            
                            <!-- Delete -->
                            <button type="button" 
                                    class="rbt-btn btn-md bg-color-danger-opacity color-danger radius-10" 
                                    onclick="confirmDelete('{{ addslashes($course->title) }}', '{{ route('courses.destroy', $course->id) }}')"
                                    title="حذف الكورس">
                                <i class="feather-trash-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="feather-box display-1 text-muted opacity-25 mb-3"></i>
                <h4 class="text-muted">لا يوجد كورسات حالياً</h4>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt--50 d-flex justify-content-center">
        {{ $courses->links() }}
    </div>

  

    <!-- Modals -->
    @foreach ($courses as $course)
        <div class="modal fade" id="enrollModal{{ $course->id }}" tabindex="-1"
            aria-labelledby="enrollModalLabel{{ $course->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow-lg radius-10">
                    <form action="{{ route('courses.enroll-student', $course->id) }}" method="POST">
                        @csrf
                        <div class="modal-header border-0 pb-0">
                            <h5 class="modal-title fw-bold" id="enrollModalLabel{{ $course->id }}">
                                تسجيل طلاب في: {{ $course->title }}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body py-4">
                            <div class="mb-3">
                                <label for="students" class="form-label fw-bold">اختر الطلاب المسجلين</label>
                                <select name="students[]" class="form-select border-2 radius-10" multiple required style="height: 250px;">
                                    @php
                                        // الحصول على IDs الطلاب المسجلين بالفعل
                                        $enrolledIds = $course->students->pluck('id')->toArray();
                                    @endphp
                                    @foreach ($students as $student)
                                        @if(!in_array($student->id, $enrolledIds))
                                            <option value="{{ $student->id }}">{{ $student->name }} ({{ $student->email }})
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                <div class="form-text mt-2">
                                    <i class="feather-info small"></i> يمكنك اختيار أكثر من طالب بالضغط على Ctrl (Windows) أو Command (Mac).
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0 pt-0">
                            <button type="button" class="rbt-btn btn-sm bg-secondary-opacity radius-10" data-bs-dismiss="modal">إغلاق</button>
                            <button type="submit" class="rbt-btn btn-sm btn-gradient radius-10">تأكيد التسجيل</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Move modals to body using vanilla JS to avoid "$ is not defined" error
            // if jQuery hasn't loaded yet.
            var modals = document.querySelectorAll('.modal');
            modals.forEach(function(modal) {
                document.body.appendChild(modal);
            });
        });
    </script>
@endsection
