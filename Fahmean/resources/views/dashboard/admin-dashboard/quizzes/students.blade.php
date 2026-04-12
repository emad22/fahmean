@extends('layout.dashboard')

@php
    $header = 'false';
    $footer = 'false';
    $topToBottom = 'false';
@endphp

@section('dashboard-content')
    <div class="rbt-dashboard-content bg-color-white radius-10 shadow-sm p-4 p-md-5">
        <div class="content">

            <!-- Header Section -->
            <div class="row mb--40 align-items-center g-3">
                <div class="col-lg-7">
                    <div class="d-flex align-items-center gap-3">
                        <div class="icon-box bg-gradient-success rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 60px; height: 60px;">
                            <i class="feather-users fs-3 text-white"></i>
                        </div>
                        <div>
                            <h2 class="mb-1 fw-bold">الطلاب المسجلين</h2>
                            <p class="text-muted mb-0">إدارة صلاحيات الوصول للاختبار: <span class="color-primary fw-bold">{{ $quiz->title }}</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 text-lg-end text-start">
                    <a href="{{ route('quizzes.index') }}" class="rbt-btn btn-md btn-border radius-10">
                        <i class="feather-arrow-right me-1"></i> رجوع للاختبارات
                    </a>
                </div>
            </div>

            <!-- Add Student Section -->
                <div class="card border-0 shadow-sm radius-15 overflow-hidden mb-5">
                    <div class="card-header bg-white border-bottom-0 pt-4 px-4">
                        <div class="d-flex align-items-center gap-2">
                            <div class="bg-primary-opacity p-2 radius-10">
                                <i class="feather-users text-primary"></i>
                            </div>
                            <h5 class="fw-bold mb-0">إدارة تسجيل الطلاب</h5>
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
                                    
                                    <form action="{{ route('quizzes.students.add', $quiz->id) }}" method="POST" id="manual_add_form">
                                        @csrf
                                        <div class="mb-4">
                                            <div class="position-relative search-container">
                                                <div class="input-group border-2 radius-10 overflow-hidden search-input-group transition-all">
                                                    <span class="input-group-text bg-white border-0"><i class="feather-search text-muted"></i></span>
                                                    <input type="text" id="student_search" class="form-control border-0 h--50" placeholder="ابحث عن الطالب بالاسم أو البريد الإلكتروني..." autocomplete="off">
                                                </div>
                                                <!-- Search Results Results Dropdown -->
                                                <div id="search_results" class="list-group position-absolute w-100 shadow-xl radius-10 d-none mt-2 animate__animated animate__fadeIn" style="z-index: 9999; max-height: 300px; overflow-y: auto; border: 1px solid #eee;"></div>
                                            </div>
                                        </div>

                                        <!-- Selected Students Placeholder -->
                                        <div id="selected_students_container" class="mb-4 d-none">
                                            <label class="form-label text-muted small fw-bold mb-2">الطلاب المختارون:</label>
                                            <div id="selected_students_list" class="d-flex flex-wrap gap-2 p-3 bg-light radius-10 border border-dashed">
                                                <!-- Dynamic Content -->
                                            </div>
                                            <div id="hidden_inputs"></div>
                                        </div>

                                        <div class="text-start">
                                            <button type="submit" id="submit_btn" class="rbt-btn btn-gradient btn-sm radius-10 w-100 justify-content-center h--50" disabled>
                                                <i class="feather-user-plus me-2"></i> تأكيد إضافة المختارين
                                            </button>
                                        </div>
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
                                    <p class="text-muted small mb-4">يمكنك إضافة كل طلاب صف دراسي معين بضغطة واحدة.</p>
                                    
                                    <form action="{{ route('quizzes.students.bulk-add-grade', $quiz->id) }}" method="POST">
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
                    <div class="card-footer bg-white border-top-0 p-4 pt-0">
                        @if ($errors->any())
                            <div class="alert alert-danger bg-white border-danger radius-10 mb-0 py-2">
                                <ul class="mb-0 small">
                                    @foreach ($errors->all() as $error)
                                        <li><i class="feather-alert-circle me-1 text-danger"></i> {{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success bg-white border-success radius-10 mb-0 py-2 small">
                                <i class="feather-check-circle me-1 text-success"></i> {{ session('success') }}
                            </div>
                        @endif
                        @if (session('info'))
                            <div class="alert alert-info bg-white border-info radius-10 mb-0 py-2 small text-info">
                                <i class="feather-info me-1"></i> {{ session('info') }}
                            </div>
                        @endif
                    </div>
                    @endif
                </div>

            <!-- Students List -->
            @if($mergedStudents->count() > 0)
                <div class="rbt-dashboard-table table-responsive mobile-table-750">
                    <table class="rbt-table table table-borderless align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-4">#</th>
                                <th>اسم الطالب</th>
                                <th>البريد الإلكتروني</th>
                                <th class="text-center">المصدر</th>
                                <th class="text-center">الحالة</th>
                                <th class="text-center">الدرجة</th>
                                <th class="text-end pe-4">تحكم</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mergedStudents as $student)
                                <tr class="hover-row transition-all">
                                    <td class="ps-4 fw-bold text-muted">{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            <div class="avatar-sm rounded-circle bg-gray-200 d-flex align-items-center justify-content-center fw-bold color-primary" style="width: 35px; height: 35px;">
                                                {{ strtoupper(substr($student->name, 0, 1)) }}
                                            </div>
                                            <span class="fw-bold text-dark">{{ $student->name }}</span>
                                        </div>
                                    </td>
                                    <td class="text-muted">{{ $student->email }}</td>
                                    <td class="text-center">
                                        @if($student->is_enrolled_in_course)
                                            <span class="badge bg-primary-opacity color-primary px-2 py-1 radius-round" style="font-size: 10px;">طالب بالكورس</span>
                                        @else
                                            <span class="badge bg-info-opacity color-info px-2 py-1 radius-round" style="font-size: 10px;">إضافة يدوية</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($student->quiz_pivot && $student->quiz_pivot->completed)
                                            <span class="badge bg-success-opacity color-success px-3 py-1 radius-round">مكتمل</span>
                                        @elseif($student->quiz_pivot && $student->quiz_pivot->score !== null)
                                             <span class="badge bg-warning-opacity color-warning px-3 py-1 radius-round">قيد التنفيذ</span>
                                        @else
                                            <span class="badge bg-gray-200 text-muted px-3 py-1 radius-round">لم يبدأ بعد</span>
                                        @endif
                                    </td>
                                    <td class="text-center fw-bold">
                                        @if($student->quiz_pivot && $student->quiz_pivot->score !== null)
                                            {{ $student->quiz_pivot->score }}%
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-end pe-4">
                                        @if(!$student->is_enrolled_in_course)
                                            <form action="{{ route('quizzes.students.remove', [$quiz->id, $student->id]) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="rbt-btn btn-xs bg-color-danger-opacity color-danger radius-10" 
                                                        onclick="return confirm('هل أنت متأكد من إزالة هذا الطالب من الاختبار؟')" title="إزالة الصلاحية">
                                                    <i class="feather-user-x"></i>
                                                </button>
                                            </form>
                                        @else
                                            <span class="text-muted small" title="لا يمكن إزالته لأنه مسجل في الكورس"><i class="feather-lock"></i></span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state-container text-center py-5">
                    <div class="icon-box bg-light rounded-circle d-flex align-items-center justify-content-center mx-auto mb-4" style="width: 100px; height: 100px;">
                        <i class="feather-users display-4 text-muted opacity-50"></i>
                    </div>
                    <h4 class="fw-bold text-dark mb-2">لا يوجد طلاب مسجلين</h4>
                    <p class="text-muted">قم بإضافة الطلاب عن طريق البريد الإلكتروني للسماح لهم بدخول الاختبار.</p>
                </div>
            @endif

        </div>
    </div>

    <style>
        .radius-10 { border-radius: 10px !important; }
        .h--50 { height: 50px !important; }
        .bg-gradient-success { background: linear-gradient(135deg, #2BC48A 0%, #1ea672 100%); }
        .bg-primary-opacity { background: rgba(107, 76, 230, 0.08) !important; }
        .bg-success-opacity { background: rgba(43, 196, 138, 0.1) !important; }
        .bg-warning-opacity { background: rgba(245, 158, 11, 0.1) !important; }
        .bg-secondary-opacity { background: rgba(107, 114, 128, 0.1) !important; }
        .bg-color-danger-opacity { background: rgba(255, 90, 95, 0.1) !important; }
        
        .color-primary { color: #6B4CE6 !important; }
        .bg-primary-opacity { background: rgba(59, 130, 246, 0.1); }
        .bg-success-opacity { background: rgba(16, 185, 129, 0.1); }
        .bg-warning-opacity { background: rgba(245, 158, 11, 0.1); }
        .search-input-group:focus-within {
            border-color: var(--color-primary) !important;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }
        .animate__fadeIn { animation-duration: 0.3s; }
        .shadow-xl { box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04); }
        .border-start-lg { border-inline-start: 1px solid #f1f5f9; }
        @media (max-width: 991px) { .border-start-lg { border-inline-start: none; border-top: 1px solid #f1f5f9; } }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
                
                // Add badge
                const badge = document.createElement('div');
                badge.className = 'badge-student d-flex align-items-center gap-2 bg-light border p-2 radius-10';
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

                // Add hidden input
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'student_ids[]';
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

            // Bulk Add Grade Logic
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
                    refreshSelects(); // Refresh bootstrap-select if exists
                });
            }

            // Close results when clicking outside
            document.addEventListener('click', function(e) {
                if (!searchInput.contains(e.target) && !resultsBox.contains(e.target)) {
                    resultsBox.classList.add('d-none');
                }
            });
        });
    </script>
@endsection
