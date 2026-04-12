@extends('layout.dashboard')

@php
    $header = 'false';
    $footer = 'false';
@endphp

@section('dashboard-content')
<div class="rbt-dashboard-content bg-color-white radius-10 shadow-sm p-4 p-md-5">
    <div class="content">
        <div class="section-title mb--30 d-flex justify-content-between align-items-center">
            <div>
                <h4 class="rbt-title-style-3 mb-0">الطلاب المسجلين في كورس: {{ $course->title }}</h4>
                <p class="text-muted small mb-0">قائمة بجميع الطلاب المشتركين حالياً في هذا المساق التعليمي.</p>
            </div>
            <a href="{{ route('courses.index') }}" class="rbt-btn btn-sm btn-border radius-10">
                <i class="feather-arrow-right me-1"></i> رجوع للكورسات
            </a>
        </div>

        <!-- Add Student Section -->
        <div class="card border-0 shadow-sm radius-15 overflow-hidden mb-5 animate__animated animate__fadeInUp">
            <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                <div class="d-flex align-items-center gap-2">
                    <div class="bg-primary-opacity p-2 radius-10">
                        <i class="feather-user-plus text-primary"></i>
                    </div>
                    <h5 class="fw-bold mb-0">إضافة طلاب جدد للكورس</h5>
                </div>
            </div>
            <div class="card-body p-4">
                <div class="row g-4">
                    <!-- Manual individual Add -->
                    <div class="col-lg-7 border-start-lg">
                        <div class="p-3 bg-white radius-10">
                            <h6 class="fw-bold mb-3 d-flex align-items-center">
                                <span class="bg-success-opacity text-success radius-circle p-1 me-2" style="width: 24px; height: 24px; display: inline-flex; align-items: center; justify-content: center; font-size: 12px;">1</span>
                                إضافة طلاب محددين
                            </h6>
                            
                            <form action="{{ route('courses.enroll-student', $course->id) }}" method="POST" id="manual_add_form">
                                @csrf
                                <div class="mb-4">
                                    <div class="position-relative search-container">
                                        <div class="input-group border-2 radius-10 overflow-hidden search-input-group transition-all">
                                            <span class="input-group-text bg-white border-0"><i class="feather-search text-muted"></i></span>
                                            <input type="text" id="student_search" class="form-control border-0 h--50" placeholder="ابحث عن الطالب بالاسم أو البريد..." autocomplete="off">
                                        </div>
                                        <div id="search_results" class="list-group position-absolute w-100 shadow-xl radius-10 d-none mt-2 animate__animated animate__fadeIn" style="z-index: 9999; max-height: 300px; overflow-y: auto; border: 1px solid #eee;"></div>
                                    </div>
                                </div>

                                <div id="selected_students_container" class="mb-4 d-none">
                                    <label class="form-label text-muted small fw-bold mb-2">الطلاب المختارون:</label>
                                    <div id="selected_students_list" class="d-flex flex-wrap gap-2 p-3 bg-light radius-10 border border-dashed"></div>
                                    <div id="hidden_inputs"></div>
                                </div>

                                <button type="submit" id="submit_btn" class="rbt-btn btn-gradient btn-sm radius-10 w-100 justify-content-center h--50" disabled>
                                    <i class="feather-plus me-2"></i> تأكيد إضافة المختارين
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Bulk Add by Grade -->
                    <div class="col-lg-5">
                        <div class="p-3 bg-light radius-10 h-100">
                            <h6 class="fw-bold mb-3 d-flex align-items-center">
                                <span class="bg-primary-opacity text-primary radius-circle p-1 me-2" style="width: 24px; height: 24px; display: inline-flex; align-items: center; justify-content: center; font-size: 12px;">2</span>
                                إضافة دفعة كاملة (بالصف)
                            </h6>
                            <p class="text-muted small mb-4">تسجيل كل طلاب صف دراسي معين في هذا الكورس بضغطة واحدة.</p>
                            
                            <form action="{{ route('courses.bulk-add-grade', $course->id) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label text-muted small fw-bold">المرحلة الدراسية</label>
                                    <select class="form-select border-2 radius-10 h--50 no-selectpicker" id="level_select">
                                        <option value="">اختر المرحلة</option>
                                        @foreach($levels as $level)
                                            <option value="{{ $level->id }}">{{ $level->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label text-muted small fw-bold">الصف الدراسي</label>
                                    <select name="grade_id" class="form-select border-2 radius-10 h--50 no-selectpicker" id="grade_select" disabled required>
                                        <option value="">اختر الصف</option>
                                    </select>
                                </div>
                                <button type="submit" class="rbt-btn btn-md btn-border radius-10 w-100 justify-content-center h--50">
                                    <i class="feather-zap me-2 text-warning"></i> تسجيل كل طلاب الصف
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @if ($errors->any() || session('success') || session('info'))
            <div class="card border-0 mb-4 animate__animated animate__fadeIn">
                @if ($errors->any())
                    <div class="alert alert-danger bg-white border-danger radius-10 mb-2 py-2">
                        <ul class="mb-0 small">
                            @foreach ($errors->all() as $error)
                                <li><i class="feather-alert-circle me-1 text-danger"></i> {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success bg-white border-success radius-10 mb-2 py-2 small">
                        <i class="feather-check-circle me-1 text-success"></i> {{ session('success') }}
                    </div>
                @endif
                @if (session('info'))
                    <div class="alert alert-info bg-white border-info radius-10 mb-2 py-2 small text-info">
                        <i class="feather-info me-1"></i> {{ session('info') }}
                    </div>
                @endif
            </div>
            @endif

            <!-- Enrolled Students Table -->
            <div class="card border-0 shadow-sm radius-15 overflow-hidden">
                <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                    <h5 class="fw-bold mb-0">قائمة الطلاب المسجلين حالياً</h5>
                </div>
                <div class="rbt-dashboard-table table-responsive p-4 pt-2">
                    <table class="rbt-table table table-borderless align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4">الطالب</th>
                                <th class="text-center">البريد الإلكتروني</th>
                                <th class="text-center">تاريخ الانضمام</th>
                                <th class="text-center">الاختبارات</th>
                                <th class="text-end pe-4">التحكم</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($course->students as $student)
                                <tr class="hover-row transition-all border-bottom">
                                    <td class="ps-4 py-4">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar bg-primary-opacity color-primary rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 45px; height: 45px;">
                                                {{ substr($student->name, 0, 1) }}
                                            </div>
                                            <div>
                                                <h6 class="mb-0 fw-bold text-dark">{{ $student->name }}</h6>
                                                <span class="small text-muted">{{ $student->student->grade->name ?? 'غير محدد' }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <span class="small text-muted">{{ $student->email }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="small fw-semibold">
                                            <i class="feather-calendar me-1"></i>
                                            {{ $student->pivot->created_at ? $student->pivot->created_at->format('Y/m/d') : '-' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        @php
                                            $completedQuizzes = $student->quizzes()->where('completed', 1)->whereHas('section', function($q) use ($course) {
                                                $q->where('course_id', $course->id);
                                            })->count();
                                            $totalQuizzes = $course->quizzes->count();
                                        @endphp
                                        <span class="badge rounded-pill bg-success-opacity color-success px-3">
                                            {{ $completedQuizzes }} / {{ $totalQuizzes }}
                                        </span>
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="btn-group">
                                            <a href="#" class="btn btn-sm btn-outline-primary radius-10 me-1" title="مراسلة الطالب"><i class="feather-mail"></i></a>
                                            <form action="#" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger radius-10" title="إزالة من الكورس"><i class="feather-user-minus"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <div class="empty-state py-5">
                                            <i class="feather-users display-1 text-muted opacity-25"></i>
                                            <p class="mt-3 text-muted">لا يوجد طلاب مسجلين في هذا الكورس بعد.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>

<style>
    .bg-primary-opacity { background: rgba(107, 76, 230, 0.08) !important; }
    .bg-success-opacity { background: rgba(16, 185, 129, 0.1) !important; }
    .bg-danger-opacity { background: rgba(255, 90, 95, 0.1) !important; }
    .color-primary { color: #6B4CE6 !important; }
    .color-success { color: #2BC48A !important; }
    .color-danger { color: #FF5A5F !important; }
    .radius-15 { border-radius: 15px !important; }
    .radius-10 { border-radius: 10px !important; }
    .hover-row:hover { background-color: #f8f9fc; }
    .transition-all { transition: all 0.3s ease; }
    .rbt-table thead th { font-size: 13px; font-weight: 700; color: #6b7385; border-bottom: 2px solid #edf2f7; }
    .search-input-group:focus-within {
        border-color: var(--color-primary) !important;
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
    }
    .shadow-xl { box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); }
    .border-start-lg { border-inline-start: 1px solid #f1f5f9; }
    @media (max-width: 991px) { .border-start-lg { border-inline-start: none; border-top: 1px solid #f1f5f9; } }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // --- 1. Student Search Logic ---
        const searchInput = document.getElementById('student_search');
        const resultsBox = document.getElementById('search_results');
        const selectedList = document.getElementById('selected_students_list');
        const selectedContainer = document.getElementById('selected_students_container');
        const hiddenInputs = document.getElementById('hidden_inputs');
        const submitBtn = document.getElementById('submit_btn');
        
        let selectedIds = new Set();
        let timeout = null;

        function updateUI() {
            if (selectedIds.size > 0) {
                selectedContainer.classList.remove('d-none');
                submitBtn.disabled = false;
            } else {
                selectedContainer.classList.add('d-none');
                submitBtn.disabled = true;
            }
        }

        function addStudent(user) {
            if (selectedIds.has(user.id)) return;
            selectedIds.add(user.id);
            
            const badge = document.createElement('div');
            badge.className = 'badge-student d-flex align-items-center gap-2 bg-white border p-2 radius-10 animate__animated animate__bounceIn';
            badge.dataset.id = user.id;
            badge.innerHTML = `
                <div class="avatar-xs rounded-circle bg-primary-opacity color-primary d-flex align-items-center justify-content-center fw-bold" style="width: 24px; height: 24px; font-size: 10px;">
                    ${user.name.charAt(0).toUpperCase()}
                </div>
                <div class="text-start">
                    <div class="fw-bold text-dark small" style="line-height: 1.2;">${user.name}</div>
                    <div class="text-muted" style="font-size: 9px;">${user.email}</div>
                </div>
                <button type="button" class="btn-remove border-0 bg-transparent p-0 ms-1" onclick="removeSelectedStudent(${user.id})">
                    <i class="feather-x text-danger opacity-50"></i>
                </button>
            `;
            selectedList.appendChild(badge);

            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'students[]';
            input.value = user.id;
            input.id = `input_student_${user.id}`;
            hiddenInputs.appendChild(input);

            updateUI();
            searchInput.value = '';
            resultsBox.classList.add('d-none');
        }

        window.removeSelectedStudent = function(id) {
            selectedIds.delete(id);
            document.querySelector(`.badge-student[data-id="${id}"]`).remove();
            document.getElementById(`input_student_${id}`).remove();
            updateUI();
        };

        searchInput.addEventListener('input', function() {
            clearTimeout(timeout);
            const query = this.value;
            if (query.length < 2) {
                resultsBox.classList.add('d-none');
                return;
            }

            timeout = setTimeout(() => {
                fetch(`{{ route('admin.search-students') }}?q=${query}`)
                    .then(response => response.json())
                    .then(data => {
                        resultsBox.innerHTML = '';
                        if (data.length > 0) {
                            data.forEach(user => {
                                const item = document.createElement('a');
                                item.href = '#';
                                item.className = 'list-group-item list-group-item-action border-0 py-3';
                                item.innerHTML = `
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <div class="fw-bold text-dark">${user.name}</div>
                                            <div class="small text-muted">${user.email}</div>
                                        </div>
                                        <i class="feather-plus-circle text-primary"></i>
                                    </div>
                                `;
                                item.onclick = (e) => {
                                    e.preventDefault();
                                    addStudent(user);
                                };
                                resultsBox.appendChild(item);
                            });
                            resultsBox.classList.remove('d-none');
                        } else {
                            resultsBox.classList.add('d-none');
                        }
                    });
            }, 300);
        });

        // --- 2. Bulk Add Grade Logic ---
        const rawLevels = @json($levels);
        const levels = Array.isArray(rawLevels) ? rawLevels : Object.values(rawLevels);
        const levelSelect = document.getElementById('level_select');
        const gradeSelect = document.getElementById('grade_select');

        function refreshSelects() {
            if (typeof $ !== 'undefined' && $.fn.selectpicker) {
                $(levelSelect).selectpicker('refresh');
                $(gradeSelect).selectpicker('refresh');
            }
        }

        if (levelSelect && gradeSelect) {
            levelSelect.addEventListener('change', function() {
                const levelId = this.value;
                gradeSelect.innerHTML = '<option value="">اختر الصف</option>';
                gradeSelect.disabled = true;
                
                if (levelId) {
                    const level = levels.find(l => String(l.id) == String(levelId));
                    if (level && level.grades) {
                        const grades = Array.isArray(level.grades) ? level.grades : Object.values(level.grades);
                        grades.forEach(grade => {
                            const opt = document.createElement('option');
                            opt.value = grade.id;
                            opt.textContent = grade.name;
                            gradeSelect.appendChild(opt);
                        });
                        if (grades.length > 0) {
                            gradeSelect.disabled = false;
                        }
                    }
                }
                refreshSelects();
            });
        }

        document.addEventListener('click', function(e) {
            if (!searchInput.contains(e.target) && !resultsBox.contains(e.target)) {
                resultsBox.classList.add('d-none');
            }
        });
    });
</script>
@endsection
