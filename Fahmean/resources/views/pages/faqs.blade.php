@extends('layout.layout')

@php
    $footer = 'true';
    $topToBottom = 'true';
    $bodyClass = '';
@endphp

@section('content')

    <!-- Start Breadcrumb Area -->
    <div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30 bg-gradient-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="title">الأسئلة الشائعة</h2>
                        {{--<ul class="page-list">
                            <li class="rbt-breadcrumb-item"><a href="/">الرئيسية</a></li>
                            <li>
                                <div class="icon-right"><i class="feather-chevron-left"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">الأسئلة الشائعة</li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Start Accordion Area  -->
    <div class="rbt-accordion-area accordion-style-1 bg-color-white rbt-section-gap">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="rbt-accordion-style accordion">
                        <div class="section-title text-start mb--60">
                            <h4 class="title">الدعم والمساعدة</h4>
                        </div>
                        <div class="rbt-accordion-style rbt-accordion-04 accordion">
                            <div class="accordion" id="accordionExamplec3">
                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="headingThree1">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseThree1" aria-expanded="true"
                                            aria-controls="collapseThree1">
                                            ما هي منصة فاهمين وكيف تعمل؟
                                        </button>
                                    </h2>
                                    <div id="collapseThree1" class="accordion-collapse collapse show"
                                        aria-labelledby="headingThree1" data-bs-parent="#accordionExamplec3">
                                        <div class="accordion-body card-body">
                                            منصة فاهمين هي منصة تعليمية رائدة تهدف إلى توفير محتوى تعليمي متميز للطلاب في
                                            مختلف المراحل الدراسية. تتيح المنصة للطلاب الوصول إلى دروس تفاعلية، اختبارات،
                                            ومتابعة أكاديمية مستمرة.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="headingThree2">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseThree2" aria-expanded="false"
                                            aria-controls="collapseThree2">
                                            كيف يمكنني الحصول على الدعم الفني؟
                                        </button>
                                    </h2>
                                    <div id="collapseThree2" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree2" data-bs-parent="#accordionExamplec3">
                                        <div class="accordion-body card-body">
                                            يمكنك التواصل معنا عبر البريد الإلكتروني أو من خلال صفحة "تواصل معنا" المتاحة
                                            على المنصة. فريق الدعم متاح للرد على استفساراتك على مدار الساعة.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="headingThree3">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseThree3" aria-expanded="false"
                                            aria-controls="collapseThree3">
                                            هل تتوفر تحديثات دورية للمحتوى؟
                                        </button>
                                    </h2>
                                    <div id="collapseThree3" class="accordion-collapse collapse"
                                        aria-labelledby="headingThree3" data-bs-parent="#accordionExamplec3">
                                        <div class="accordion-body card-body">
                                            نعم، نقوم بتحديث المحتوى التعليمي باستمرار ليتماشى مع أحدث المناهج الدراسية، كما
                                            نضيف ميزات جديدة لتحسين تجربة التعلم.
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="rbt-accordion-style accordion">
                        <div class="section-title text-start mb--60">
                            <h4 class="title">التسجيل والاشتراكات</h4>
                        </div>
                        <div class="rbt-accordion-style rbt-accordion-04 accordion">
                            <div class="accordion" id="faqs-accordionExamplec3">
                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="faqs-headingThree1">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faqs-collapseThree1" aria-expanded="true"
                                            aria-controls="faqs-collapseThree1">
                                            كيف يمكنني إنشاء حساب جديد؟
                                        </button>
                                    </h2>

                                    <div id="faqs-collapseThree1" class="accordion-collapse collapse show"
                                        aria-labelledby="faqs-headingThree1" data-bs-parent="#faqs-accordionExamplec3">
                                        <div class="accordion-body card-body">
                                            يمكنك الضغط على زر "إنشاء حساب" في الصفحة الرئيسية، وملء البيانات المطلوبة مثل
                                            الاسم، البريد الإلكتروني، والصف الدراسي.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="faqs-headingThree2">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faqs-collapseThree2" aria-expanded="false"
                                            aria-controls="faqs-collapseThree2">
                                            هل يمكنني استرداد قيمة الاشتراك؟
                                        </button>
                                    </h2>
                                    <div id="faqs-collapseThree2" class="accordion-collapse collapse"
                                        aria-labelledby="faqs-headingThree2" data-bs-parent="#faqs-accordionExamplec3">
                                        <div class="accordion-body card-body">
                                            نحن نقدم سياسة استرداد مرنة وفقاً لشروط الاستخدام. يرجى مراجعة صفحة "سياسة
                                            الخصوصية والشروط" لمزيد من التفاصيل.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item card">
                                    <h2 class="accordion-header card-header" id="faqs-headingThree3">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faqs-collapseThree3" aria-expanded="false"
                                            aria-controls="faqs-collapseThree3">
                                            هل المنصة تدعم جميع الأجهزة؟
                                        </button>
                                    </h2>
                                    <div id="faqs-collapseThree3" class="accordion-collapse collapse"
                                        aria-labelledby="faqs-headingThree3" data-bs-parent="#faqs-accordionExamplec3">
                                        <div class="accordion-body card-body">
                                            نعم، منصة فاهمين مصممة لتعمل بكفاءة على جميع الأجهزة بما في ذلك الحواسيب،
                                            الأجهزة اللوحية، والهواتف الذكية.
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Accordion Area  -->

    <x-separator />

    <!-- Start Contact Area  -->
    <div class="rbt-contact-address rbt-section-gap">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="thumbnail">
                        <img class="w-100 radius-6" src="{{ asset('assets/images/about/contact.jpg') }}"
                            alt="Contact Images">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                        <div class="section-title text-start">
                            <span class="subtitle bg-primary-opacity">تواصل معنا</span>
                        </div>
                        <h3 class="title">لديك استفسار آخر؟ لا تتردد في مراسلتنا</h3>
                        <form id="contact-form" class="max-width-auto">
                            <div class="form-group">
                                <input name="con_name" type="text">
                                <label>الاسم</label>
                                <span class="focus-border"></span>
                            </div>
                            <div class="form-group">
                                <input name="con_email" type="email">
                                <label>البريد الإلكتروني</label>
                                <span class="focus-border"></span>
                            </div>
                            <div class="form-group">
                                <input type="text">
                                <label>رقم الهاتف</label>
                                <span class="focus-border"></span>
                            </div>
                            <div class="form-group">
                                <textarea></textarea>
                                <label>الرسالة</label>
                                <span class="focus-border"></span>
                            </div>
                            <div class="form-submit-group">
                                <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">إرسال الآن</span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Area  -->

@endsection
