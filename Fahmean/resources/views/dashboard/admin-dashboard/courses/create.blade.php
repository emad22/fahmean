@extends('layout.dashboard')

@php
    $header = 'false';
    $footer = 'false';
    $topToBottom = 'false';
    $bodyClass = '';
@endphp

@section('dashboard-content')
    <style>
        .premium-form-card {
            background: #fff;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.05);
            border: 1px solid #f0f0f0;
        }

        .step-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
            position: relative;
        }

        .step-indicator::before {
            content: '';
            position: absolute;
            top: 24px;
            left: 0;
            right: 0;
            height: 2px;
            background: #f0f0f0;
            z-index: 1;
        }

        .step-item {
            position: relative;
            z-index: 2;
            text-align: center;
            width: 120px;
        }

        .step-number {
            width: 50px;
            height: 50px;
            background: #fff;
            border: 2px solid #f0f0f0;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-weight: 700;
            color: #999;
            transition: all 0.3s ease;
        }

        .step-item.active .step-number {
            border-color: var(--color-primary);
            color: var(--color-primary);
            box-shadow: 0 0 0 5px rgba(var(--color-primary-rgb), 0.1);
        }

        .step-item.completed .step-number {
            background: var(--color-primary);
            border-color: var(--color-primary);
            color: #fff;
        }

        .rbt-course-field-wrapper label {
            font-weight: 700;
            color: #222;
            margin-bottom: 10px;
            display: block;
            font-size: 0.95rem;
        }

        .premium-input {
            border: 1px solid #eef0f2 !important;
            padding: 15px 20px !important;
            border-radius: 12px !important;
            background-color: #fcfdfe !important;
            transition: all 0.3s ease !important;
        }

        .premium-input:focus {
            border-color: var(--color-primary) !important;
            background-color: #fff !important;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05) !important;
        }

        .section-builder-card {
            background: #f9faff;
            border-radius: 15px;
            border: 2px dashed #e0e6ed;
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .section-builder-card:hover {
            border-color: var(--color-primary);
            background: #f4f6ff;
        }

        .course-content-preview {
            max-height: 600px;
            overflow-y: auto;
            padding-inline-end: 10px;
        }

        .course-content-preview::-webkit-scrollbar {
            width: 6px;
        }

        .course-content-preview::-webkit-scrollbar-thumb {
            background: #e0e6ed;
            border-radius: 10px;
        }

        .accordion-button:not(.collapsed) {
            background-color: rgba(var(--color-primary-rgb), 0.05);
            color: var(--color-primary);
            font-weight: 700;
        }

        .accordion-item {
            border: 1px solid #f0f0f0;
            border-radius: 15px !important;
            overflow: hidden;
            margin-bottom: 15px;
        }
        
        .border-dashed {
            border-style: dashed !important;
        }
        
        .bg-gray-light {
            background-color: #fcfdfe !important;
        }
        
        .cursor-pointer {
            cursor: pointer;
        }

        #imagePreviewContainer img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            border-radius: 15px;
        }
    </style>

    <div class="row justify-content-center mb--60">
        <div class="col-lg-12">
            <div class="premium-form-card">
                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb--40">
                    <div>
                        <h2 class="mb-2 fw-bold">إعداد مساق تعليمي جديد</h2>
                        <p class="text-muted">صمم تجربة تعليمية فريدة لطلابك من خلال تنظيم المحتوى والدروس.</p>
                    </div>
                    <a href="{{ route('courses.index') }}" class="rbt-btn btn-xs bg-primary-opacity radius-10">
                        <i class="feather-arrow-right me-1"></i> رجوع للقائمة
                    </a>
                </div>

                <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data" id="courseCreateForm">
                    @csrf
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
                                                    <input type="text" name="title" class="form-control premium-input" placeholder="مثال: دورة احتراف اللغة الإنجليزية" required>
                                                </div>
                                                <div class="col-12">
                                                    <label>نبذة عن الكورس</label>
                                                    <textarea name="description" class="form-control premium-input" rows="4" placeholder="اكتب وصفاً جذاباً يشجع الطلاب على الالتحاق..."></textarea>
                                                </div>
                                                @role('admin')
                                                <div class="col-12">
                                                    <label>المعلم المحاضر</label>
                                                    <select name="teacher_id" class="form-select premium-input">
                                                        <option value="">اختر المعلم من القائمة</option>
                                                        @foreach ($teachers as $teacher)
                                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @endrole
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
                                                    <div class="input-group">
                                                        <input type="number" name="price" class="form-control premium-input" placeholder="0.00" required>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-4">
                                                    <label class="form-label fw-bold">غلاف الكورس *</label>
                                                    <div class="p-5 border-2 border-dashed radius-15 text-center bg-gray-light position-relative overflow-hidden" id="imageDropzone">
                                                        <input type="file" name="image" id="course_image_input" class="d-none" accept="image/*" required onchange="previewCourseImage(this)">
                                                        <label for="course_image_input" class="mb-0 cursor-pointer w-100 h-100" style="z-index: 2; position: relative;">
                                                            <div id="uploadPlaceholder">
                                                                <i class="feather-image display-4 color-primary mb-3 d-block"></i>
                                                                <h6 class="mb-2">اختر صورة غلاف جذابة</h6>
                                                                <p class="text-muted small mb-0">يفضل استخدام أبعاد 800x600 بكسل على الأقل</p>
                                                                <span class="badge bg-primary-opacity color-primary mt-3">رفع من الجهاز</span>
                                                            </div>
                                                            <div id="imagePreviewContainer" class="d-none">
                                                                <img id="courseImagePreview" src="#" alt="Preview" class="img-fluid radius-10 mb-3 shadow-sm">
                                                                <p class="mb-0 small text-primary fw-bold"><i class="feather-refresh-cw me-1"></i>تغيير الصورة</p>
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label>فيديو المقدمة (YouTube / Vimeo / Local)</label>
                                                    <div class="row g-3">
                                                        <div class="col-md-4">
                                                            <select class="form-select premium-input" name="video_source">
                                                                <option value="youtube">يوتيوب</option>
                                                                <option value="vimeo">فيميو</option>
                                                                <option value="local">رابط مباشر</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input name="video_url" type="text" class="form-control premium-input" placeholder="رابط الفيديو التعريفي...">
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
                                                <h6 class="mb-3 fw-bold color-primary">ماذا تود أن تضيف الآن؟</h6>
                                                <div class="d-flex gap-3 justify-content-center flex-wrap">
                                                    <button class="rbt-btn btn-white btn-sm radius-10 shadow-sm" type="button" onclick="openActivityModal('explanation')">
                                                        <i class="feather-play-circle me-1 color-primary"></i> أضف شرح
                                                    </button>
                                                    <button class="rbt-btn btn-white btn-sm radius-10 shadow-sm" type="button" onclick="openActivityModal('practice')">
                                                        <i class="feather-edit-3 me-1 color-success"></i> أضف تدريبات (أسئلة)
                                                    </button>
                                                </div>
                                                <p class="text-muted small mt-3 mb-0">يمكنك ترتيب الأنشطة سحباً وإسقاطاً بعد إضافتها.</p>
                                            </div>
                                            
                                            <div id="activitiesWrapper" class="course-content-preview">
                                                <!-- Dynamic Activities via JS -->
                                                <div id="emptyState" class="text-center py-5 opacity-50">
                                                    <i class="feather-layers display-4 mb-2 d-block"></i>
                                                    <p>لم يتم إضافة أي أنشطة بعد.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column: Summary & Actions -->
                        <div class="col-lg-5">
                            <div class="bg-gray-light p-5 radius-20 position-sticky" style="top: 120px;">
                                <h5 class="fw-bold mb-4">ملخص المساق</h5>
                                <div id="liveSummary">
                                    <div class="d-flex justify-content-between mb-3 pb-3 border-bottom d-none">
                                        <span class="text-muted">إجمالي الوحدات</span>
                                        <span class="fw-bold" id="totalSectionsCount">1</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-3 pb-3 border-bottom">
                                        <span class="text-muted">إجمالي الدروس</span>
                                        <span class="fw-bold" id="totalLessonsCount">0</span>
                                    </div>
                                    <div class="d-flex justify-content-between mb-4">
                                        <span class="text-muted">التمارين والامتحانات</span>
                                        <span class="fw-bold" id="totalQuizzesCount">0</span>
                                    </div>
                                </div>

                                <div class="mt--40">
                                    <button type="submit" class="rbt-btn btn-gradient w-100 shadow-lg mb-3">
                                        <i class="feather-check-circle me-1"></i> اعتماد وحفظ الكورس
                                    </button>
                                    <button type="button" class="rbt-btn btn-border w-100 mb-3" onclick="alert('تم تفعيل المعاينة!')">
                                        <i class="feather-eye me-1"></i> معاينة أولية
                                    </button>
                                    <p class="text-center small text-muted mt-3">
                                        <i class="feather-shield me-1"></i> سيتم حفظ الكورس كـ "مسودة" حتى تقوم بنشره يدوياً.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
        </div>
    </div>

    @endsection

    @push('modals')
    <!-- Modals (moved to root for correct z-index) -->
    <!-- بداية نافذة الإضافة -->
    <div class="rbt-default-modal modal fade" id="sectionModal" tabindex="-1" aria-labelledby="sectionModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="rbt-round-btn" data-bs-dismiss="modal" aria-label="إغلاق">
                        <i class="feather-x"></i>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="inner rbt-default-form">

                        {{-- ✅ فورم حقيقي --}}
                        <form id="sectionForm">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5 class="modal-title mb--20" id="sectionModalLabel">
                                        إضافة وحدة جديدة
                                    </h5>

                                    <!-- اسم الوحدة -->
                                    <div class="course-field mb--20">
                                        <label for="section-title">اسم الوحدة</label>
                                        <input id="section-title" type="text" name="title" class="form-control"
                                            required>
                                        <small>
                                            <i class="feather-info"></i>
                                            يمكن أن تحتوي الوحدة على دروس، اختبارات أو واجبات.
                                        </small>
                                    </div>

                                    <!-- ملخص الوحدة -->
                                    <div class="course-field mb--20">
                                        <label for="section-summary">ملخص الوحدة (اختياري)</label>
                                        <textarea id="section-summary" name="summary" class="form-control" rows="3"></textarea>
                                        <small>
                                            <i class="feather-info"></i>
                                            يظهر هذا الملخص بجانب اسم الوحدة في صفحة الكورس.
                                        </small>
                                    </div>

                                </div>
                            </div>

                            <!-- أزرار -->
                            <div class="modal-footer pt--30 px-0">
                                <button type="button" class="rbt-btn btn-border btn-md radius-round-10"
                                    data-bs-dismiss="modal">
                                    إلغاء
                                </button>

                                <button type="submit" class="rbt-btn btn-gradient btn-md radius-round-10">
                                    حفظ الوحدة
                                </button>
                            </div>

                        </form>
                        {{-- نهاية الفورم --}}

                    </div>
                </div>

                <div class="top-circle-shape"></div>
            </div>
        </div>
    </div>
    <!-- نهاية نافذة الإضافة -->

    <!-- نافذة إضافة الدرس -->
    <div class="rbt-default-modal modal fade" id="Lesson" tabindex="-1" aria-labelledby="LessonLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <form id="lessonForm" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="LessonLabel">إضافة درس</h5>
                        <button type="button" class="rbt-round-btn" data-bs-dismiss="modal" aria-label="إغلاق">
                            <i class="feather-x"></i>
                        </button>
                    </div>

                    <!-- Body -->
                    <div class="modal-body">

                        <!-- اسم الدرس -->
                        <div class="course-field mb--20">
                            <label>اسم الدرس</label>
                            <input type="text" id="lessonTitle" name="title" class="form-control" required>
                        </div>

                        <!-- ملخص / محتوى الدرس -->
                        <div class="course-field mb--20">
                            <label>ملخص الدرس</label>
                            <textarea id="lessonSummary" name="content" class="form-control" rows="3"></textarea>
                        </div>

                        <!-- مدة الدرس -->
                        <div class="course-field mb--20">
                            <label>مدة الدرس</label>
                            <input type="text" id="lessonDuration" name="duration" class="form-control"
                                placeholder="مثال: 15:30">
                        </div>

                        <!-- مصدر الفيديو -->
                        <div class="course-field mb--20">
                            <label>مصدر الفيديو</label>
                            <select name="video_source" id="videoSource" class="form-control">
                                <option value="">اختر مصدر الفيديو</option>
                                <option value="upload">رفع فيديو</option>
                                <option value="youtube">YouTube</option>
                                <option value="vimeo">Vimeo</option>
                                <option value="external">رابط خارجي</option>
                            </select>
                        </div>

                        <!-- فيديو مرفوع -->
                        <div class="course-field mb--20 d-none" id="videoUpload">
                            <label>رفع فيديو</label>
                            <input type="file" id="lessonVideoFile" name="video" class="form-control"
                                onchange="uploadLessonFile(this, 'video')">
                            <input type="hidden" id="lessonVideoPath">
                            <div class="upload-progress d-none" id="video-progress">جاري الرفع...</div>
                        </div>

                        <!-- رابط فيديو -->
                        <div class="course-field mb--20 d-none" id="videoLink">
                            <label>رابط الفيديو</label>
                            <input type="url" name="video" class="form-control">
                        </div>

                        <!-- PDF -->
                        <div class="course-field mb--20">
                            <label>ملف PDF</label>
                            <input type="file" id="lessonPdfFile" name="pdf" class="form-control"
                                onchange="uploadLessonFile(this, 'pdf')">
                            <input type="hidden" id="lessonPdfPath">
                            <div class="upload-progress d-none" id="pdf-progress">جاري الرفع...</div>
                        </div>

                        <!-- Audio -->
                        <div class="course-field mb--20">
                            <label>ملف صوتي</label>
                            <input type="file" id="lessonAudioFile" name="audio" class="form-control"
                                onchange="uploadLessonFile(this, 'audio')">
                            <input type="hidden" id="lessonAudioPath">
                            <div class="upload-progress d-none" id="audio-progress">جاري الرفع...</div>
                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="modal-footer">
                        <button type="button" class="rbt-btn btn-border btn-md radius-round-10"
                            data-bs-dismiss="modal">
                            إلغاء
                        </button>

                        <button type="submit" class="rbt-btn btn-gradient btn-md radius-round-10">
                            حفظ الدرس
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- نهاية نافذة الدرس -->

    <!-- نافذة الاختبار (Question Builder) -->
    <div class="rbt-default-modal modal fade" id="Quiz" tabindex="-1" aria-labelledby="QuizLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header bg-primary-opacity border-0">
                    <h5 class="modal-title fw-bold color-primary" id="QuizLabel">بناء التدريبات والأسئلة</h5>
                    <button type="button" class="rbt-round-btn" data-bs-dismiss="modal" aria-label="إغلاق">
                        <i class="feather-x"></i>
                    </button>
                </div>
                <div class="modal-body p-5">
                    <div class="row g-5">
                        <!-- Left: Quiz Info & Question Form -->
                        <div class="col-lg-7 border-end">
                            <div class="quiz-main-info mb--30 pb--30 border-bottom">
                                <label class="form-label fw-bold">اسم التدريب / النشاط</label>
                                <input id="quiz-title-input" type="text" class="form-control premium-input" placeholder="مثال: اختبار قصير على الدرس الأول">
                            </div>

                            <div class="question-form-box p-4 radius-15 bg-gray-light">
                                <h6 class="fw-bold mb-4"><i class="feather-plus-circle me-1"></i> إضافة سؤال جديد</h6>
                                
                                <div class="mb-3">
                                    <label class="small text-muted mb-1">نص السؤال</label>
                                    <textarea id="question-text" class="form-control radius-10" rows="2" placeholder="اكتب السؤال هنا..."></textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="small text-muted mb-1">نوع السؤال</label>
                                    <select id="question-type" class="form-select radius-10" onchange="toggleQuestionUI()">
                                        <option value="mcq">اختيار من متعدد</option>
                                        <option value="tf">صح أو خطأ</option>
                                        <option value="essay">سؤال مقالي</option>
                                        <option value="matching">سؤال التوصيل (المزاوجة)</option>
                                    </select>
                                </div>

                                <div id="answers-container" class="mt-4">
                                    <!-- MCQ Answers -->
                                    <div id="mcq-ui">
                                        <label class="small text-muted mb-2 d-flex justify-content-between">
                                            <span>الخيارات (حدد الإجابة الصحيحة)</span>
                                            <button type="button" class="btn btn-sm p-0 color-primary" onclick="addMcqOption()"><i class="feather-plus-circle"></i> خيار إضافي</button>
                                        </label>
                                        <div id="mcq-options-list">
                                            <div class="d-flex align-items-center gap-2 mb-2 mcq-option-item">
                                                <input type="radio" name="correct_mcq" class="form-check-input" checked>
                                                <input type="text" class="form-control form-control-sm radius-10 option-text" placeholder="الخيار الأول">
                                            </div>
                                            <div class="d-flex align-items-center gap-2 mb-2 mcq-option-item">
                                                <input type="radio" name="correct_mcq" class="form-check-input">
                                                <input type="text" class="form-control form-control-sm radius-10 option-text" placeholder="الخيار الثاني">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- TF Answers -->
                                    <div id="tf-ui" class="d-none">
                                        <label class="small text-muted mb-2">الإجابة الصحيحة</label>
                                        <div class="d-flex gap-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="tf_correct" id="tf_true" value="true" checked>
                                                <label class="form-check-label" for="tf_true">صح</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="tf_correct" id="tf_false" value="false">
                                                <label class="form-check-label" for="tf_false">خطأ</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Essay Answers -->
                                    <div id="essay-ui" class="d-none">
                                        <label class="small text-muted mb-2">كلمات مفتاحية للإجابة (اختياري)</label>
                                        <input type="text" id="essay-keywords" class="form-control radius-10" placeholder="مثال: تعريف، قانون، أهمية">
                                    </div>

                                    <!-- Matching Answers -->
                                    <div id="matching-ui" class="d-none">
                                        <label class="small text-muted mb-2 d-flex justify-content-between">
                                            <span>أضف أزواج التوصيل</span>
                                            <button type="button" class="btn btn-sm p-0 color-primary" onclick="addMatchingPair()"><i class="feather-plus-circle"></i> زوج إضافي</button>
                                        </label>
                                        <div id="matching-pairs-list">
                                            <div class="d-flex align-items-center gap-2 mb-2 m-pair-item">
                                                <input type="text" class="form-control form-control-sm radius-10 pair-left" placeholder="العمود أ">
                                                <i class="feather-arrow-right small text-muted"></i>
                                                <input type="text" class="form-control form-control-sm radius-10 pair-right" placeholder="العمود ب">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="rbt-btn btn-sm btn-gradient w-100 mt-4 radius-10" onclick="addQuestionToQuiz()">
                                    <i class="feather-plus me-1"></i> حفظ السؤال للتدريب
                                </button>
                            </div>
                        </div>

                        <!-- Right: Questions Preview List -->
                        <div class="col-lg-5">
                            <h6 class="fw-bold mb-4 d-flex justify-content-between">
                                <span>الأسئلة المضافة</span>
                                <span class="badge bg-primary-opacity color-primary rounded-pill px-3" id="modal-q-count">0</span>
                            </h6>
                            <div id="modal-q-empty" class="text-center py-5 text-muted opacity-50">
                                <i class="feather-help-circle display-4 mb-2 d-block"></i>
                                <p class="small">لم يتم إضافة أسئلة بعد</p>
                            </div>
                            <div id="modal-questions-list" style="max-height: 400px; overflow-y: auto;">
                                <!-- Questions will be injected here -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-gray-light justify-content-between p-4">
                    <button type="button" class="rbt-btn btn-border btn-md radius-10" data-bs-dismiss="modal">إلغاء</button>
                    <button type="button" class="rbt-btn btn-gradient btn-md radius-10" id="quiz-save-btn">حفظ التدريب بالكامل</button>
                </div>
            </div>
        </div>
    </div>
    @endpush

    @push('scripts')
    <!-- Scripts here -->
    <script>
        // Start with one default section
        var sections = [{
            title: 'محتوى الكورس',
            summary: '',
            lessons: [],
            quizzes: []
        }];
        var currentSectionIndex = 0; 
        var currentQuizQuestions = [];
        var currentQuizType = 'daily';

        function updateCounters() {
            let lessons = 0;
            let quizzes = 0;
            sections.forEach(s => {
                lessons += s.lessons.length;
                quizzes += s.quizzes.length;
                s.lessons.forEach(l => {
                    quizzes += (l.quizzes ? l.quizzes.length : 0);
                });
            });
            
            // UI elements check
            const totalLessons = document.getElementById('totalLessonsCount');
            const totalQuizzes = document.getElementById('totalQuizzesCount');
            const emptyState = document.getElementById('emptyState');

            if(totalLessons) totalLessons.innerText = lessons;
            if(totalQuizzes) totalQuizzes.innerText = quizzes;
            
            if(emptyState) {
                if(lessons > 0 || quizzes > 0) {
                    emptyState.classList.add('d-none');
                } else {
                    emptyState.classList.remove('d-none');
                }
            }
        }

        function openActivityModal(type) {
            if (type === 'explanation') {
                bootstrap.Modal.getOrCreateInstance(document.getElementById('Lesson')).show();
            } else if (type === 'practice') {
                openQuizModal(0, 'daily');
            } else if (type === 'exam') {
                openQuizModal(0, 'monthly');
            }
        }

        document.getElementById('lessonForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const title = document.getElementById('lessonTitle').value;
            const content = document.getElementById('lessonSummary').value;
            const duration = document.getElementById('lessonDuration').value;
            const video_source = document.getElementById('videoSource').value;

            if (!title) {
                showToast('اكتب اسم الدرس', 'error');
                return;
            }

            const video_url = document.getElementById('videoLink').querySelector('input')?.value || '';
            const pdf_path = document.getElementById('lessonPdfPath').value;
            const audio_path = document.getElementById('lessonAudioPath').value;
            const video_path = document.getElementById('lessonVideoPath').value;

            const lessonIndex = sections[currentSectionIndex].lessons.length;

            sections[currentSectionIndex].lessons.push({
                title: title,
                content: content,
                duration: duration,
                video_source: video_source,
                video_url: video_url,
                pdf: pdf_path,
                audio: audio_path,
                video: video_path,
                quizzes: []
            });

            document.getElementById('sectionsData').value = JSON.stringify(sections);
            updateCounters();

            const lessonHTML = `
                <div class="d-flex justify-content-between align-items-center mb-3 p-4 bg-white radius-15 shadow-sm border border-light lesson-item" id="lesson-item-0-${lessonIndex}">
                    <div class="inner d-flex align-items-center gap-3">
                        <div class="bg-primary-opacity color-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="feather-play-circle"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold">${title} <span class="badge bg-primary-opacity color-primary ms-2" style="font-size: 10px;">شرح</span></h6>
                            <small class="text-muted"><i class="feather-clock me-1"></i> ${duration || 'مدة غير محددة'}</small>
                        </div>
                    </div>
                    <div class="inner d-flex align-items-center gap-2">
                        <button type="button" class="btn btn-sm bg-danger-opacity color-danger radius-10 p-2" onclick="removeActivity(this, 'lesson', ${lessonIndex})">
                            <i class="feather-trash-2"></i>
                        </button>
                    </div>
                </div>
            `;

            document.getElementById('activitiesWrapper').insertAdjacentHTML('beforeend', lessonHTML);
            this.reset();
            bootstrap.Modal.getOrCreateInstance(document.getElementById('Lesson')).hide();
            showToast('تمت إضافة الدرس بنجاح', 'success');
        });

        function removeActivity(btn, type, index) {
            if(confirm('هل أنت متأكد من الحذف؟')) {
                if(type === 'lesson') {
                    sections[0].lessons.splice(index, 1);
                } else {
                    sections[0].quizzes.splice(index, 1);
                }
                btn.closest('.lesson-item, .quiz-item').remove();
                document.getElementById('sectionsData').value = JSON.stringify(sections);
                updateCounters();
                showToast('تم الحذف بنجاح', 'success');
            }
        }



        function toggleQuestionUI() {
            const type = document.getElementById('question-type').value;
            document.getElementById('mcq-ui').classList.toggle('d-none', type !== 'mcq');
            document.getElementById('tf-ui').classList.toggle('d-none', type !== 'tf');
            document.getElementById('essay-ui').classList.toggle('d-none', type !== 'essay');
            document.getElementById('matching-ui').classList.toggle('d-none', type !== 'matching');
        }

        function addMcqOption() {
            const list = document.getElementById('mcq-options-list');
            const html = `
                <div class="d-flex align-items-center gap-2 mb-2 mcq-option-item">
                    <input type="radio" name="correct_mcq" class="form-check-input">
                    <input type="text" class="form-control form-control-sm radius-10 option-text" placeholder="خيار جديد">
                    <button type="button" class="btn btn-sm text-danger" onclick="this.closest('.mcq-option-item').remove()"><i class="feather-trash-2"></i></button>
                </div>
            `;
            list.insertAdjacentHTML('beforeend', html);
        }

        function addMatchingPair() {
            const list = document.getElementById('matching-pairs-list');
            const html = `
                <div class="d-flex align-items-center gap-2 mb-2 m-pair-item">
                    <input type="text" class="form-control form-control-sm radius-10 pair-left" placeholder="العمود أ">
                    <i class="feather-arrow-right small text-muted"></i>
                    <input type="text" class="form-control form-control-sm radius-10 pair-right" placeholder="العمود ب">
                    <button type="button" class="btn btn-sm text-danger" onclick="this.closest('.m-pair-item').remove()"><i class="feather-trash-2"></i></button>
                </div>
            `;
            list.insertAdjacentHTML('beforeend', html);
        }

        function addQuestionToQuiz() {
            const text = document.getElementById('question-text').value;
            const type = document.getElementById('question-type').value;
            
            if(!text) { showToast('اكتب السؤال أولاً', 'error'); return; }

            let answers = [];
            if(type === 'mcq') {
                const items = document.querySelectorAll('.mcq-option-item');
                items.forEach(item => {
                    const ansText = item.querySelector('.option-text').value;
                    const isCorrect = item.querySelector('input[type="radio"]').checked;
                    if(ansText) answers.push({ text: ansText, is_correct: isCorrect });
                });
                if(answers.length < 2) { showToast('يجب إضافة خيارين على الأقل', 'error'); return; }
            } else if(type === 'tf') {
                const isTrueCorrect = document.getElementById('tf_true').checked;
                answers.push({ text: 'صح', is_correct: isTrueCorrect });
                answers.push({ text: 'خطأ', is_correct: !isTrueCorrect });
            } else if(type === 'essay') {
                const keywords = document.getElementById('essay-keywords').value;
                if(keywords) answers.push({ text: keywords, is_correct: true });
            } else if(type === 'matching') {
                const pairs = document.querySelectorAll('.m-pair-item');
                pairs.forEach(pair => {
                    const left = pair.querySelector('.pair-left').value;
                    const right = pair.querySelector('.pair-right').value;
                    if(left && right) {
                        answers.push({ text: left + ' | ' + right, is_correct: true });
                    }
                });
                if(answers.length < 1) { alert('أضف زوجاً واحداً على الأقل'); return; }
            }

            currentQuizQuestions.push({ text, type, answers });
            renderModalQuestionsList();
            
            // Reset question form
            document.getElementById('question-text').value = '';
            document.getElementById('essay-keywords').value = '';
            document.getElementById('mcq-options-list').innerHTML = `
                <div class="d-flex align-items-center gap-2 mb-2 mcq-option-item">
                    <input type="radio" name="correct_mcq" class="form-check-input" checked>
                    <input type="text" class="form-control form-control-sm radius-10 option-text" placeholder="الخيار الأول">
                </div>
                <div class="d-flex align-items-center gap-2 mb-2 mcq-option-item">
                    <input type="radio" name="correct_mcq" class="form-check-input">
                    <input type="text" class="form-control form-control-sm radius-10 option-text" placeholder="الخيار الثاني">
                </div>
            `;
            document.getElementById('matching-pairs-list').innerHTML = `
                <div class="d-flex align-items-center gap-2 mb-2 m-pair-item">
                    <input type="text" class="form-control form-control-sm radius-10 pair-left" placeholder="العمود أ">
                    <i class="feather-arrow-right small text-muted"></i>
                    <input type="text" class="form-control form-control-sm radius-10 pair-right" placeholder="العمود ب">
                </div>
            `;
        }

        function renderModalQuestionsList() {
            const list = document.getElementById('modal-questions-list');
            const empty = document.getElementById('modal-q-empty');
            const count = document.getElementById('modal-q-count');

            count.innerText = currentQuizQuestions.length;
            if(currentQuizQuestions.length > 0) empty.classList.add('d-none');
            else empty.classList.remove('d-none');

            list.innerHTML = '';
            currentQuizQuestions.forEach((q, i) => {
                const typeLabels = {
                    'mcq': 'اختيار من متعدد',
                    'tf': 'صح أو خطأ',
                    'essay': 'سؤال مقالي',
                    'matching': 'سؤال توصيل'
                };
                const typeClasses = {
                    'mcq': 'bg-primary-opacity color-primary',
                    'tf': 'bg-success-opacity color-success',
                    'essay': 'bg-info-opacity color-info',
                    'matching': 'bg-warning-opacity color-warning'
                };

                const html = `
                    <div class="p-3 mb-2 bg-white border radius-10 d-flex justify-content-between align-items-start">
                        <div>
                            <span class="badge ${typeClasses[q.type]} mb-1" style="font-size: 10px;">
                                ${typeLabels[q.type]}
                            </span>
                            <p class="mb-0 fw-bold small">${q.text}</p>
                        </div>
                        <button type="button" class="btn btn-sm text-danger p-0" onclick="removeQuestionFromModal(${i})"><i class="feather-x"></i></button>
                    </div>
                `;
                list.insertAdjacentHTML('beforeend', html);
            });
        }

        function removeQuestionFromModal(index) {
            currentQuizQuestions.splice(index, 1);
            renderModalQuestionsList();
        }

        function openQuizModal(sectionIndex, type) {
            currentQuizType = type;
            currentQuizQuestions = [];
            const mapTitle = {
                'daily': 'إضافة تدريبات سريعة',
                'monthly': 'إضافة اختبار كامل'
            };
            document.getElementById('quiz-title-input').value = '';
            document.getElementById('QuizLabel').innerText = mapTitle[type] || 'بناء الأسئلة';
            renderModalQuestionsList();
            bootstrap.Modal.getOrCreateInstance(document.getElementById('Quiz')).show();
        }

        document.getElementById('quiz-save-btn').addEventListener('click', function() {
            const quizTitle = document.getElementById('quiz-title-input').value;
            if (!quizTitle) { alert('يرجى كتابة عنوان النشاط'); return; }
            if (currentQuizQuestions.length === 0) { alert('يرجى إضافة سؤال واحد على الأقل'); return; }

            const quizObject = {
                title: quizTitle,
                type: currentQuizType,
                questions: currentQuizQuestions
            };

            const quizIndex = sections[0].quizzes.length;
            sections[0].quizzes.push(quizObject);

            document.getElementById('sectionsData').value = JSON.stringify(sections);
            updateCounters();

            const typeLabel = currentQuizType === 'monthly' ? 'امتحان' : 'تدريب';
            const typeClass = currentQuizType === 'monthly' ? 'bg-danger-opacity color-danger' : 'bg-success-opacity color-success';
            const icon = currentQuizType === 'monthly' ? 'feather-award' : 'feather-edit-3';

            const quizHTML = `
                <div class="d-flex justify-content-between align-items-center mb-3 p-4 bg-white radius-15 shadow-sm border border-light quiz-item" id="quiz-item-0-${quizIndex}">
                    <div class="inner d-flex align-items-center gap-3">
                        <div class="${typeClass} rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i class="${icon}"></i>
                        </div>
                        <div>
                            <h6 class="mb-0 fw-bold">${quizTitle} <span class="badge ${typeClass} ms-2" style="font-size: 10px;">${typeLabel}</span></h6>
                            <small class="text-muted"><i class="feather-help-circle me-1"></i> ${currentQuizQuestions.length} سؤال</small>
                        </div>
                    </div>
                    <div class="inner d-flex align-items-center gap-2">
                        <button type="button" class="btn btn-sm bg-danger-opacity color-danger radius-10 p-2" onclick="removeActivity(this, 'quiz', ${quizIndex})">
                            <i class="feather-trash-2"></i>
                        </button>
                    </div>
                </div>
            `;

            document.getElementById('activitiesWrapper').insertAdjacentHTML('beforeend', quizHTML);
            bootstrap.Modal.getOrCreateInstance(document.getElementById('Quiz')).hide();
        });

        document.getElementById('videoSource').addEventListener('change', function() {
            const uploadDiv = document.getElementById('videoUpload');
            const linkDiv = document.getElementById('videoLink');
            uploadDiv.classList.add('d-none');
            linkDiv.classList.add('d-none');
            if (this.value === 'upload') uploadDiv.classList.remove('d-none');
            if (['youtube', 'vimeo', 'external'].includes(this.value)) linkDiv.classList.remove('d-none');
        });

        function uploadLessonFile(input, type) {
            const file = input.files[0];
            if (!file) return;
            const progressBar = document.getElementById(`${type}-progress`);
            const pathInput = document.getElementById(`lesson${type.charAt(0).toUpperCase() + type.slice(1)}Path`);
            const formData = new FormData();
            formData.append('file', file);
            formData.append('type', type);
            formData.append('_token', '{{ csrf_token() }}');
            progressBar.classList.remove('d-none');
            fetch('{{ route('temp.upload') }}', { method: 'POST', body: formData })
                .then(response => response.json())
                .then(data => { progressBar.innerText = 'تم الرفع بنجاح'; pathInput.value = data.path; })
                .catch(error => { console.error('Error:', error); progressBar.innerText = 'فشل الرفع'; });
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

        window.openActivityModal = openActivityModal;
        window.openQuizModal = openQuizModal;
        window.addMcqOption = addMcqOption;
        window.addMatchingPair = addMatchingPair;
        window.addQuestionToQuiz = addQuestionToQuiz;
        window.removeQuestionFromModal = removeQuestionFromModal;
        window.removeActivity = removeActivity;
        window.uploadLessonFile = uploadLessonFile;
        window.updateCounters = updateCounters;
        window.previewCourseImage = previewCourseImage;
    </script>
    @endpush
