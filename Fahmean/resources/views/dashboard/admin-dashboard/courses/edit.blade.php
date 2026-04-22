@extends('layout.dashboard')
    
    @php
        $header = 'false';
        $footer = 'false';
        $topToBottom = 'false';
        $bodyClass = '';
        
        // Prepare Full Data for JS Builder
        $jsSections = $course->sections()->with(['lessons', 'quizzes.questions.answers'])->get()->map(function($section) {
            return [
                'id' => $section->id,
                'title' => $section->title,
                'summary' => $section->description,
                'lessons' => $section->lessons->map(function($lesson) {
                    return [
                        'id' => $lesson->id,
                        'title' => $lesson->title,
                        'content' => $lesson->content,
                        'duration' => $lesson->duration,
                        'video_url' => $lesson->video_url,
                        'video_source' => $lesson->video_source,
                        'pdf' => $lesson->pdf,
                        'audio' => $lesson->audio,
                        'video' => $lesson->video,
                        'quizzes' => $lesson->quizzes->map(function($quiz) {
                             return [
                                'id' => $quiz->id,
                                'title' => $quiz->title,
                                'type' => $quiz->type,
                                'questions' => $quiz->questions->map(function($q) {
                                     return [
                                         'id' => $q->id,
                                         'text' => $q->question,
                                         'type' => $q->type,
                                         'answers' => $q->answers->map(function($a){ 
                                            return ['text' => $a->answer, 'is_correct' => $a->is_correct]; 
                                         })
                                     ];
                                })
                             ];
                        })
                    ];
                }),
                'quizzes' => $section->quizzes->where('lesson_id', null)->map(function($quiz) {
                     return [
                        'id' => $quiz->id,
                        'title' => $quiz->title,
                        'type' => $quiz->type,
                        'questions' => $quiz->questions->map(function($q) {
                             return [
                                 'id' => $q->id,
                                 'text' => $q->question,
                                 'type' => $q->type,
                                 'answers' => $q->answers->map(function($a){ 
                                    return ['text' => $a->answer, 'is_correct' => $a->is_correct]; 
                                 })
                             ];
                        })
                     ];
                })
            ];
        });

        if ($jsSections->isEmpty()) {
            $jsSections = collect([[
                'id' => null,
                'title' => 'محتوى الكورس',
                'summary' => '',
                'lessons' => [],
                'quizzes' => []
            ]]);
        }
    @endphp
    
    @section('dashboard-content')
        <style>
            .premium-form-card { background: #fff; border-radius: 24px; padding: 40px; box-shadow: 0 20px 60px rgba(0, 0, 0, 0.05); border: 1px solid #f0f0f0; }
            .premium-input { border: 1px solid #eef0f2 !important; padding: 15px 20px !important; border-radius: 12px !important; background-color: #fcfdfe !important; transition: all 0.3s ease !important; }
            .premium-input:focus { border-color: var(--color-primary) !important; background-color: #fff !important; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05) !important; }
            .course-content-preview { max-height: 600px; overflow-y: auto; padding-inline-end: 10px; }
            .course-content-preview::-webkit-scrollbar { width: 6px; }
            .course-content-preview::-webkit-scrollbar-thumb { background: #e0e6ed; border-radius: 10px; }
            .accordion-button:not(.collapsed) { background-color: rgba(var(--color-primary-rgb), 0.05); color: var(--color-primary); font-weight: 700; }
            .accordion-item { border: 1px solid #f0f0f0; border-radius: 15px !important; overflow: hidden; margin-bottom: 15px; }
            
            .border-dashed { border-style: dashed !important; }
            .bg-gray-light { background-color: #fcfdfe !important; }
            .cursor-pointer { cursor: pointer; }
            #imagePreviewContainer img { width: 100%; height: 250px; object-fit: cover; border-radius: 15px; }
            
            .correct-badge { font-size: 10px; background: #2bc48a; color: #fff; padding: 2px 8px; border-radius: 4px; display: none; margin-inline-start: 10px; }
            .mcq-option-item input[type="radio"]:checked ~ .correct-badge { display: inline-block; }
        </style>
    
        <div class="row justify-content-center mb--60">
            <div class="col-lg-12">
                <div class="premium-form-card">
                    
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb--40">
                        <div>
                            <h2 class="mb-2 fw-bold">تعديل المساق: <span class="color-primary">{{ $course->title }}</span></h2>
                            <p class="text-muted">التحكم الكامل في المحتوى والاختبارات بتجربة عصرية.</p>
                        </div>
                        <a href="{{ route('courses.index') }}" class="rbt-btn btn-xs bg-primary-opacity radius-10">
                            <i class="feather-arrow-right me-1"></i> رجوع للقائمة
                        </a>
                    </div>

                    @if($errors->any())
                        <div class="alert alert-danger radius-10 mb-4">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
    
                    <form action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data" id="courseCreateForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="sections_data" id="sectionsData">
    
                        <div class="row">
                            <!-- Left Column: Form Fields -->
                            <div class="col-lg-7">
                                <div class="rbt-accordion-style rbt-accordion-01 rbt-accordion-06 accordion" id="courseAccordion">
                                    
                                    <!-- Step 1: Basic Info -->
                                    <div class="accordion-item card mb--20">
                                        <h2 class="accordion-header card-header" id="headingBasic">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBasic" aria-expanded="true">
                                                <i class="feather-info me-2"></i> المعلومات الأساسية
                                            </button>
                                        </h2>
                                        <div id="collapseBasic" class="accordion-collapse collapse show" data-bs-parent="#courseAccordion">
                                            <div class="accordion-body card-body rbt-course-field-wrapper">
                                                <div class="row g-4">
                                                    <div class="col-12">
                                                        <label>عنوان الكورس *</label>
                                                        <input type="text" name="title" class="form-control premium-input" value="{{ $course->title }}" required>
                                                    </div>
                                                    <div class="col-12">
                                                        <label>نبذة عن الكورس</label>
                                                        <textarea name="description" class="form-control premium-input" rows="4">{{ $course->description }}</textarea>
                                                    </div>
                                                    @role('admin')
                                                    <div class="col-md-6">
                                                        <label>المعلم المحاضر</label>
                                                        <select name="teacher_id" class="form-select premium-input">
                                                            <option value="">اختر المعلم من القائمة</option>
                                                            @foreach ($teachers as $teacher)
                                                                <option value="{{ $teacher->id }}" {{ $course->teacher_id == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @endrole
                                                    <div class="col-md-{{ auth()->user()->hasRole('admin') ? '6' : '12' }}">
                                                        <label>السنة الدراسية *</label>
                                                        <select name="academic_year" class="form-select premium-input" required>
                                                            <option value="">اختر السنة الدراسية</option>
                                                            <option value="2023/2024" {{ $course->academic_year == '2023/2024' ? 'selected' : '' }}>2023/2024</option>
                                                            <option value="2024/2025" {{ $course->academic_year == '2024/2025' ? 'selected' : '' }}>2024/2025</option>
                                                            <option value="2025/2026" {{ $course->academic_year == '2025/2026' ? 'selected' : '' }}>2025/2026</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <!-- Step 2: Pricing & Media -->
                                    <div class="accordion-item card mb--20">
                                        <h2 class="accordion-header card-header" id="headingPricing">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePricing">
                                                <i class="feather-dollar-sign me-2"></i> الخطة السعرية والوسائط
                                            </button>
                                        </h2>
                                        <div id="collapsePricing" class="accordion-collapse collapse" data-bs-parent="#courseAccordion">
                                            <div class="accordion-body card-body rbt-course-field-wrapper">
                                                <div class="row g-4">
                                                    <div class="col-md-6">
                                                        <label>السعر الأساسي (ج.م)</label>
                                                        <input type="number" name="price" class="form-control premium-input" value="{{ $course->price }}" required>
                                                    </div>
                                                    <div class="col-12 mt-4">
                                                        <label class="form-label fw-bold">غلاف الكورس *</label>
                                                        <div class="p-5 border-2 border-dashed radius-15 text-center bg-gray-light position-relative overflow-hidden" id="imageDropzone">
                                                            <input type="file" name="image" id="course_image_input" class="d-none" accept="image/*" onchange="previewCourseImage(this)">
                                                            <label for="course_image_input" class="mb-0 cursor-pointer w-100 h-100" style="z-index: 2; position: relative;">
                                                                <div id="uploadPlaceholder" class="{{ $course->image ? 'd-none' : '' }}">
                                                                    <i class="feather-image display-4 color-primary mb-3 d-block"></i>
                                                                    <h6 class="mb-2">اختر صورة غلاف جذابة</h6>
                                                                    <p class="text-muted small mb-0">يفضل استخدام أبعاد 800x600 بكسل على الأقل</p>
                                                                    <span class="badge bg-primary-opacity color-primary mt-3">رفع من الجهاز</span>
                                                                </div>
                                                                <div id="imagePreviewContainer" class="{{ $course->image ? '' : 'd-none' }}">
                                                                    <img id="courseImagePreview" src="{{ $course->image ? asset('uploads/' . $course->image) : '#' }}" alt="Preview" class="img-fluid radius-10 mb-3 shadow-sm">
                                                                    <p class="mb-0 small text-primary fw-bold"><i class="feather-refresh-cw me-1"></i>تغيير الصورة</p>
                                                                </div>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <label>فيديو المقدمة (YouTube / Vimeo / Local)</label>
                                                        <div class="row g-3">
                                                            <div class="col-md-4">
                                                                <select class="form-select premium-input" name="video_source" id="videoSourceMain">
                                                                    <option value="youtube" {{ $course->video_source == 'youtube' ? 'selected' : '' }}>يوتيوب</option>
                                                                    <option value="vimeo" {{ $course->video_source == 'vimeo' ? 'selected' : '' }}>فيميو</option>
                                                                    <option value="local" {{ $course->video_source == 'local' ? 'selected' : '' }}>رابط مباشر</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input name="video_url" type="text" class="form-control premium-input" placeholder="رابط الفيديو التعريفي..." value="{{ $course->video_url }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
    
                                    <!-- Step 3: Activities Builder -->
                                    <div class="accordion-item card mb--20">
                                        <h2 class="accordion-header card-header" id="headingContent">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseContent">
                                                <i class="feather-activity me-2"></i> أنشطة المساق (شرح، تدريب، امتحان)
                                            </button>
                                        </h2>
                                        <div id="collapseContent" class="accordion-collapse collapse" data-bs-parent="#courseAccordion">
                                            <div class="accordion-body card-body">
                                                <div class="p-4 bg-primary-opacity radius-15 mb--30 border-dashed-primary text-center">
                                                    <h6 class="mb-3 fw-bold color-primary">إضافة نشاط جديد</h6>
                                                    <div class="d-flex gap-3 justify-content-center flex-wrap">
                                                        <button class="rbt-btn btn-white btn-sm radius-10 shadow-sm" type="button" onclick="openActivityModal('explanation')">
                                                            <i class="feather-play-circle me-1 color-primary"></i> أضف شرح
                                                        </button>
                                                        <button class="rbt-btn btn-white btn-sm radius-10 shadow-sm" type="button" onclick="openActivityModal('practice')">
                                                            <i class="feather-edit-3 me-1 color-success"></i> أضف تدريب/امتحان
                                                        </button>
                                                    </div>
                                                </div>
                                                
                                                <div id="activitiesWrapper" class="course-content-preview">
                                                    <!-- Dynamic Activities via JS -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <!-- Right Column: Summary & Actions -->
                            <div class="col-lg-5">
                                <div class="bg-gray-light p-5 radius-20 position-sticky" style="top: 120px;">
                                    <h5 class="fw-bold mb-4">الحالة والنشر</h5>
                                    <div id="liveSummary">
                                        <div class="d-flex justify-content-between mb-3 pb-3 border-bottom">
                                            <span class="text-muted">الحالة الحالية</span>
                                            <select name="status" class="form-select form-select-sm w-auto">
                                                <option value="draft" {{ $course->status == 'draft' ? 'selected' : '' }}>مسودة</option>
                                                <option value="published" {{ $course->status == 'published' ? 'selected' : '' }}>منشور</option>
                                            </select>
                                        </div>
                                        <div class="d-flex justify-content-between mb-3 pb-3 border-bottom">
                                            <span class="text-muted">عدد الدروس</span>
                                            <span class="fw-bold" id="totalLessonsCount">0</span>
                                        </div>
                                         <div class="d-flex justify-content-between mb-3 pb-3 border-bottom">
                                            <span class="text-muted">عدد الامتحانات</span>
                                            <span class="fw-bold" id="totalQuizzesCount">0</span>
                                        </div>
                                    </div>
    
                                    <div class="mt--40">
                                        <button type="submit" class="rbt-btn btn-gradient w-100 shadow-lg mb-3">
                                            <i class="feather-refresh-cw me-1"></i> حفظ كافة التعديلات
                                        </button>
                                        <button type="button" class="rbt-btn btn-border w-100 mb-3" onclick="alert('جاري التحضير للمعاينة...')">
                                            <i class="feather-eye me-1"></i> معاينة الكورس
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @push('modals')
        <!-- Modal for Lesson -->
        <div class="rbt-default-modal modal fade" id="Lesson" tabindex="-1" aria-labelledby="LessonLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <form id="lessonForm">
                        <div class="modal-header bg-primary-opacity border-0">
                            <h5 class="modal-title fw-bold color-primary" id="lessonModalTitle">إضافة درس جديد</h5>
                            <button type="button" class="rbt-round-btn" data-bs-dismiss="modal"><i class="feather-x"></i></button>
                        </div>
                        <div class="modal-body p-5">
                             <input type="hidden" id="lesson_edit_index" value="-1">
                            <div class="course-field mb--20">
                                <label class="form-label fw-bold">عنوان الدرس *</label>
                                <input type="text" id="lessonTitle" class="form-control premium-input" required placeholder="مثلاً: الفصل الأول - مقدمة">
                            </div>
                            <div class="course-field mb--20">
                                <label class="form-label fw-bold">وصف الدرس</label>
                                <textarea id="lessonContent" class="form-control premium-input" rows="3" placeholder="نبذة مختصرة عما سيتم شرحه..."></textarea>
                            </div>
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <div class="course-field mb--20">
                                        <label class="form-label fw-bold">مصدر الفيديو</label>
                                        <select id="videoSource" class="form-select premium-input" onchange="toggleVideoInputs()">
                                            <option value="external">يوتيوب / فيميو</option>
                                            <option value="upload">رفع ملف فيديو</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="course-field mb--20">
                                        <label class="form-label fw-bold">المدة الزمنية</label>
                                        <input type="text" id="lessonDuration" class="form-control premium-input" placeholder="00:15:00">
                                    </div>
                                </div>
                            </div>
                             <div class="course-field mb--20" id="video_url_container">
                                <label class="form-label fw-bold">رابط الفيديو</label>
                                <input type="text" id="lessonVideoUrl" class="form-control premium-input" placeholder="https://youtube.com/watch?v=...">
                            </div>
                            <div class="course-field mb--20 d-none" id="video_upload_container">
                                <label class="form-label fw-bold">ملف الفيديو</label>
                                <div class="p-4 border-2 border-dashed radius-15 text-center bg-gray-light">
                                    <input type="file" class="form-control d-none" id="video_file_input" onchange="uploadLessonFile(this, 'video')">
                                    <label for="video_file_input" class="mb-0 cursor-pointer">
                                        <i class="feather-upload-cloud color-primary h4 d-block mb-2"></i>
                                        <span class="small text-muted">اضغط هنا لرفع فيديو (MP4)</span>
                                    </label>
                                    <input type="hidden" id="lessonVideoPath">
                                    <div class="upload-progress d-none mt-2" id="video-progress">جاري الرفع...</div>
                                </div>
                            </div>
                            <div class="course-field mb--20">
                                <label class="form-label fw-bold">ملفات مرفقة (PDF)</label>
                                <div class="p-4 border-2 border-dashed radius-15 text-center bg-gray-light">
                                    <input type="file" class="form-control d-none" id="pdf_file_input" onchange="uploadLessonFile(this, 'pdf')">
                                    <label for="pdf_file_input" class="mb-0 cursor-pointer">
                                        <i class="feather-file-text color-primary h4 d-block mb-2"></i>
                                        <span class="small text-muted">ارفق ملخص الدرس أو ورق عمل</span>
                                    </label>
                                    <input type="hidden" id="lessonPdfPath">
                                    <div class="upload-progress d-none mt-2" id="pdf-progress">جاري الرفع...</div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-gray-light">
                            <button type="button" class="rbt-btn btn-border btn-md" data-bs-dismiss="modal">إلغاء</button>
                            <button type="submit" class="rbt-btn btn-gradient btn-md">حفظ البيانات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal for Quiz (Advanced Builder) -->
        <div class="rbt-default-modal modal fade" id="Quiz" tabindex="-1" aria-labelledby="QuizLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header bg-primary-opacity border-0">
                        <h5 class="modal-title fw-bold color-primary">بناء التدريبات والأسئلة</h5>
                        <button type="button" class="rbt-round-btn" data-bs-dismiss="modal"><i class="feather-x"></i></button>
                    </div>
                    <div class="modal-body p-5">
                         <input type="hidden" id="quiz_edit_index" value="-1">
                        <div class="row g-5">
                            <div class="col-lg-7 border-end">
                                <div class="quiz-main-info mb--30 pb--30 border-bottom">
                                    <div class="row">
                                        <div class="col-8">
                                            <label class="form-label fw-bold">عنوان الامتحان</label>
                                            <input id="quiz-title-input" type="text" class="form-control premium-input" placeholder="اسم الامتحان...">
                                        </div>
                                        <div class="col-4">
                                            <label class="form-label fw-bold">عدد المحاولات</label>
                                            <input id="quiz-attempts-input" type="number" class="form-control premium-input" value="1" min="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="question-form-box p-4 radius-15 bg-gray-light">
                                    <h6 class="fw-bold mb-4">إضافة سؤال جديد</h6>
                                    <div class="mb-3">
                                        <label class="small text-muted mb-1">السؤال</label>
                                        <textarea id="question-text" class="form-control radius-10" rows="2" placeholder="اكتب نص السؤال هنا..."></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="small text-muted mb-1">النوع</label>
                                        <select id="question-type" class="form-select radius-10" onchange="toggleQuestionUI()">
                                            <option value="multiple_choice">اختيار من متعدد</option>
                                            <option value="true_false">صح أو خطأ</option>
                                        </select>
                                    </div>
                                    <div id="answers-container">
                                        <div id="mcq-ui">
                                            <div id="mcq-options-list">
                                                <div class="d-flex align-items-center gap-2 mb-2 mcq-option-item">
                                                    <input type="radio" name="correct_mcq" class="form-check-input" checked>
                                                    <input type="text" class="form-control form-control-sm option-text" placeholder="الخيار الأول">
                                                    <span class="correct-badge"><i class="feather-check"></i> الإجابة الصحيحة</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-2 mb-2 mcq-option-item">
                                                    <input type="radio" name="correct_mcq" class="form-check-input">
                                                    <input type="text" class="form-control form-control-sm option-text" placeholder="الخيار الثاني">
                                                    <span class="correct-badge"><i class="feather-check"></i> الإجابة الصحيحة</span>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-sm color-primary mt-2" onclick="addMcqOption()">+ إضافة خيار جديد</button>
                                        </div>
                                        <div id="tf-ui" class="d-none">
                                            <div class="d-flex gap-4">
                                                <div class="form-check">
                                                    <input type="radio" name="tf_correct" id="tf_true" value="true" checked class="form-check-input">
                                                    <label class="form-check-label ps-2" for="tf_true" style="cursor: pointer;">صح</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" name="tf_correct" id="tf_false" value="false" class="form-check-input">
                                                    <label class="form-check-label ps-2" for="tf_false" style="cursor: pointer;">خطأ</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="rbt-btn btn-sm btn-gradient w-100 mt-4" onclick="addQuestionToQuiz()">حفظ السؤال في القائمة</button>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <h6 class="fw-bold mb-4">الأسئلة الحالية ( <span id="modal-q-count">0</span> )</h6>
                                <div id="modal-questions-list" style="max-height: 400px; overflow-y: auto;">
                                    <!-- Questions via JS -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-gray-light">
                        <button type="button" class="rbt-btn btn-border btn-md" data-bs-dismiss="modal">إلغاء</button>
                        <button type="button" class="rbt-btn btn-gradient btn-md" id="quiz-save-btn">حفظ الامتحان بالكامل</button>
                    </div>
                </div>
            </div>
        </div>
    @endpush

    @push('scripts')
        <script>
            let sections = @json($jsSections);
            if (!Array.isArray(sections) || sections.length === 0) {
                sections = [{ title: 'محتوى الكورس', summary: '', lessons: [], quizzes: [] }];
            }
            let currentQuizQuestions = [];
            let currentQuizType = 'monthly';
            let currentSectionIndex = 0;

            // Global Builder Functions
            function openActivityModal(type) {
                if (type === 'explanation') {
                    document.getElementById('lesson_edit_index').value = "-1";
                    document.getElementById('lessonForm').reset();
                    document.getElementById('lessonModalTitle').innerText = "إضافة درس جديد";
                    new bootstrap.Modal(document.getElementById('Lesson')).show();
                } else {
                    currentQuizType = 'daily';
                    currentQuizQuestions = [];
                    document.getElementById('quiz_edit_index').value = "-1";
                    document.getElementById('quiz-title-input').value = "";
                    renderModalQuestions();
                    new bootstrap.Modal(document.getElementById('Quiz')).show();
                }
            }

            function renderActivities() {
                const wrapper = document.getElementById('activitiesWrapper');
                if (!wrapper) return;
                wrapper.innerHTML = '';
                let lCount = 0;
                let qCount = 0;

                const section = sections[0];
                
                // Render Lessons
                if (section.lessons) {
                    section.lessons.forEach((lesson, index) => {
                        lCount++;
                        wrapper.insertAdjacentHTML('beforeend', `
                            <div class="d-flex justify-content-between align-items-center mb-3 p-4 bg-white radius-15 shadow-sm border border-light lesson-item">
                                <div class="inner d-flex align-items-center gap-3">
                                    <div class="bg-primary-opacity color-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="feather-play-circle"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-bold">${lesson.title} <span class="badge bg-primary-opacity color-primary ms-2" style="font-size: 10px;">شرح</span></h6>
                                        <small class="text-muted"><i class="feather-clock me-1"></i> ${lesson.duration || 'مدة غير محددة'}</small>
                                    </div>
                                </div>
                                <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-sm bg-primary-opacity color-primary radius-10 p-2" onclick="editLesson(${index})"><i class="feather-edit"></i></button>
                                    <button type="button" class="btn btn-sm bg-danger-opacity color-danger radius-10 p-2" onclick="removeActivity('lesson', ${index})"><i class="feather-trash-2"></i></button>
                                </div>
                            </div>
                        `);
                    });
                }

                // Render Quizzes
                if (section.quizzes) {
                    section.quizzes.forEach((quiz, index) => {
                        qCount++;
                        const typeLabel = quiz.type === 'monthly' ? 'امتحان' : 'تدريب';
                        const typeClass = quiz.type === 'monthly' ? 'bg-danger-opacity color-danger' : 'bg-success-opacity color-success';
                        const icon = quiz.type === 'monthly' ? 'feather-award' : 'feather-edit-3';

                        wrapper.insertAdjacentHTML('beforeend', `
                            <div class="d-flex justify-content-between align-items-center mb-3 p-4 bg-white radius-15 shadow-sm border border-light quiz-item">
                                <div class="inner d-flex align-items-center gap-3">
                                    <div class="${typeClass} rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="${icon}"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 fw-bold">${quiz.title} <span class="badge ${typeClass} ms-2" style="font-size: 10px;">${typeLabel}</span></h6>
                                        <small class="text-muted"><i class="feather-help-circle me-1"></i> ${quiz.questions ? quiz.questions.length : 0} سؤال</small>
                                    </div>
                                </div>
                                <div class="d-flex gap-2">
                                    ${quiz.id ? `
                                        <a href="${'{{ route('questions.index', ':id') }}'.replace(':id', quiz.id)}" class="btn btn-sm btn-outline-primary radius-10 p-2" title="تعديل الأسئلة"><i class="feather-help-circle"></i></a>
                                    ` : ''}
                                    <button type="button" class="btn btn-sm ${typeClass} radius-10 p-2" onclick="editQuiz(${index})"><i class="feather-edit"></i></button>
                                    <button type="button" class="btn btn-sm bg-danger-opacity color-danger radius-10 p-2" onclick="removeActivity('quiz', ${index})"><i class="feather-trash-2"></i></button>
                                </div>
                            </div>
                        `);
                    });
                }

                document.getElementById('totalLessonsCount').innerText = lCount;
                document.getElementById('totalQuizzesCount').innerText = qCount;
                document.getElementById('sectionsData').value = JSON.stringify(sections);
            }

            function removeActivity(type, index) {
                const item = type === 'lesson' ? sections[0].lessons[index] : sections[0].quizzes[index];
                if(confirm(`هل أنت متأكد من حذف ${item.title}؟`)) {
                    if(type === 'lesson') sections[0].lessons.splice(index, 1);
                    else sections[0].quizzes.splice(index, 1);
                    renderActivities();
                }
            }

            function editLesson(index) {
                const lesson = sections[0].lessons[index];
                document.getElementById('lesson_edit_index').value = index;
                document.getElementById('lessonTitle').value = lesson.title;
                document.getElementById('lessonContent').value = lesson.content || '';
                document.getElementById('lessonDuration').value = lesson.duration || '';
                document.getElementById('videoSource').value = lesson.video_source || 'external';
                document.getElementById('lessonVideoUrl').value = lesson.video_url || '';
                document.getElementById('lessonVideoPath').value = lesson.video || '';
                document.getElementById('lessonPdfPath').value = lesson.pdf || '';
                toggleVideoInputs();
                document.getElementById('lessonModalTitle').innerText = "تعديل الدرس";
                new bootstrap.Modal(document.getElementById('Lesson')).show();
            }

            document.getElementById('lessonForm').addEventListener('submit', function(e) {
                e.preventDefault();
                const index = parseInt(document.getElementById('lesson_edit_index').value);
                const data = {
                    title: document.getElementById('lessonTitle').value,
                    content: document.getElementById('lessonContent').value,
                    duration: document.getElementById('lessonDuration').value,
                    video_source: document.getElementById('videoSource').value,
                    video_url: document.getElementById('lessonVideoUrl').value,
                    video: document.getElementById('lessonVideoPath').value,
                    pdf: document.getElementById('lessonPdfPath').value,
                    quizzes: (index >= 0) ? (sections[0].lessons[index].quizzes || []) : []
                };
                if(index >= 0) {
                    const existing = sections[0].lessons[index];
                    if (existing.id) data.id = existing.id;
                    sections[0].lessons[index] = data;
                }
                else sections[0].lessons.push(data);
                renderActivities();
                bootstrap.Modal.getInstance(document.getElementById('Lesson')).hide();
            });

            function editQuiz(index) {
                const quiz = sections[0].quizzes[index];
                document.getElementById('quiz_edit_index').value = index;
                document.getElementById('quiz-title-input').value = quiz.title;
                document.getElementById('quiz-attempts-input').value = quiz.attempts_limit || 1;
                currentQuizQuestions = JSON.parse(JSON.stringify(quiz.questions || []));
                renderModalQuestions();
                new bootstrap.Modal(document.getElementById('Quiz')).show();
            }

            function addQuestionToQuiz() {
                const text = document.getElementById('question-text').value;
                const type = document.getElementById('question-type').value;
                if(!text) return;
                let answers = [];
                if(type === 'multiple_choice') {
                    document.querySelectorAll('.mcq-option-item').forEach(i => {
                        const txt = i.querySelector('.option-text').value;
                        if(txt) answers.push({ text: txt, is_correct: i.querySelector('input').checked });
                    });
                } else if(type === 'true_false') {
                    answers = [{text:'صح', is_correct: document.getElementById('tf_true').checked}, {text:'خطأ', is_correct: document.getElementById('tf_false').checked}];
                }
                currentQuizQuestions.push({ text, type, answers });
                renderModalQuestions();
                document.getElementById('question-text').value = "";
            }

            function renderModalQuestions() {
                const list = document.getElementById('modal-questions-list');
                list.innerHTML = "";
                currentQuizQuestions.forEach((q, i) => {
                    list.insertAdjacentHTML('beforeend', `
                        <div class="p-3 bg-white border radius-10 mb-2 d-flex justify-content-between align-items-center">
                            <span>${q.text} <small class="text-muted">(${q.type})</small></span>
                            <button type="button" class="btn btn-sm text-danger" onclick="removeQuestionFromModal(${i})">
                                <i class="feather-x"></i>
                            </button>
                        </div>
                    `);
                });
                document.getElementById('modal-q-count').innerText = currentQuizQuestions.length;
            }

            function removeQuestionFromModal(index) {
                currentQuizQuestions.splice(index, 1);
                renderModalQuestions();
            }

            document.getElementById('quiz-save-btn').onclick = function() {
                const title = document.getElementById('quiz-title-input').value;
                if(!title) return;
                const index = parseInt(document.getElementById('quiz_edit_index').value);
                const data = { 
                    title, 
                    attempts_limit: document.getElementById('quiz-attempts-input').value,
                    questions: currentQuizQuestions, 
                    type: currentQuizType 
                };
                if(index >= 0) {
                    const existing = sections[0].quizzes[index];
                    if (existing.id) data.id = existing.id;
                    sections[0].quizzes[index] = data;
                }
                else sections[0].quizzes.push(data);
                renderActivities();
                bootstrap.Modal.getInstance(document.getElementById('Quiz')).hide();
            };

            function toggleVideoInputs() {
                const source = document.getElementById('videoSource').value;
                document.getElementById('video_url_container').classList.toggle('d-none', source === 'upload');
                document.getElementById('video_upload_container').classList.toggle('d-none', source !== 'upload');
            }

            function previewCourseImage(input) {
                const placeholder = document.getElementById('uploadPlaceholder');
                const previewContainer = document.getElementById('imagePreviewContainer');
                const previewImage = document.getElementById('courseImagePreview');
                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        placeholder.classList.add('d-none');
                        previewContainer.classList.remove('d-none');
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            function uploadLessonFile(input, type) {
                const progressBar = document.getElementById(`${type}-progress`);
                const pathInput = document.getElementById(`lesson${type.charAt(0).toUpperCase() + type.slice(1)}Path`);
                progressBar.classList.remove('d-none');
                progressBar.innerText = "جاري الرفع...";
                
                const formData = new FormData();
                formData.append('file', input.files[0]);
                formData.append('type', type);
                formData.append('_token', '{{ csrf_token() }}');

                fetch('{{ route('temp.upload') }}', { method: 'POST', body: formData })
                    .then(r => r.json())
                    .then(data => {
                        pathInput.value = data.path;
                        progressBar.innerText = "تم الرفع بنجاح!";
                    })
                    .catch(e => {
                        progressBar.innerText = "فشل الرفع.";
                    });
            }

            function addMcqOption() {
                document.getElementById('mcq-options-list').insertAdjacentHTML('beforeend', `
                    <div class="d-flex align-items-center gap-2 mb-2 mcq-option-item">
                        <input type="radio" name="correct_mcq" class="form-check-input">
                        <input type="text" class="form-control form-control-sm option-text" placeholder="خيار">
                        <button type="button" class="btn btn-sm text-danger" onclick="this.parentElement.remove()">x</button>
                    </div>
                `);
            }

            function toggleQuestionUI() {
                const t = document.getElementById('question-type').value;
                document.getElementById('mcq-ui').classList.toggle('d-none', t !== 'multiple_choice');
                document.getElementById('tf-ui').classList.toggle('d-none', t !== 'true_false');
            }

            // Explicitly attach to window
            window.openActivityModal = openActivityModal;
            window.renderActivities = renderActivities;
            window.editLesson = editLesson;
            window.editQuiz = editQuiz;
            window.removeActivity = removeActivity;
            window.addQuestionToQuiz = addQuestionToQuiz;
            window.addMcqOption = addMcqOption;
            window.toggleQuestionUI = toggleQuestionUI;
            window.removeQuestionFromModal = removeQuestionFromModal;
            window.uploadLessonFile = uploadLessonFile;
            window.previewCourseImage = previewCourseImage;
            window.toggleVideoInputs = toggleVideoInputs;

            renderActivities();
        </script>
    @endpush