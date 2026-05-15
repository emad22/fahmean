@extends('layout.layout')

@php
    $footer = 'true';
    $topToBottom = 'true';
    $bodyClass = '';
@endphp

<style>
    .rbt-article-content-wrapper .content h4 {
        font-size: 24px !important;
        /* Larger headers */
        margin-bottom: 20px;
    }

    .rbt-article-content-wrapper .content ol li {
        font-size: 18px !important;
        line-height: 1.8;
        margin-bottom: 15px;
        color: var(--color-body);
    }

    .breadcrumb-inner .title {
        font-size: 40px !important;
    }

    .breadcrumb-inner .page-list li {
        font-size: 18px !important;
    }
</style>

@section('content')



    <!-- Start Breadcrumb Area -->
    <div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30 bg-gradient-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="title">سياسة الخصوصية</h2>
                        <!-- <ul class="page-list">
                                    <li class="rbt-breadcrumb-item"><a href="/">الرئيسية</a></li>
                                    <li>
                                        <div class="icon-right"><i class="feather-chevron-left"></i></div>
                                    </li>
                                    <li class="rbt-breadcrumb-item active">سياسة الخصوصية</li>
                                </ul>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <div class="rbt-privacy-policy-area rbt-section-gap">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-10 offset-lg-1">
                    <div class="rbt-article-content-wrapper">
                        <div class="post-thumbnail mb--30 position-relative wp-block-image alignwide">
                            <img class="w-100" src="{{ asset('assets/images/blog/blog-card-01.jpg') }}" alt="Blog Images">
                        </div>
                        <div class="content">
                            <h4>نحن نهتم بخصوصيتك</h4>
                            <ol>
                                <li>تلتزم منصة فاهمين بحماية خصوصية كافة مستخدميها. توضح هذه السياسة كيف نقوم بجمع واستخدام
                                    وحماية المعلومات الشخصية التي تقدمها لنا.</li>
                                <li>باستخدامك للمنصة، فإنك توافق على ممارسات البيانات الموضحة في هذه السياسة.</li>
                                <li>نحن نقوم بتحديث هذه السياسة من وقت لآخر، لذا يرجى مراجعتها بشكل دوري لتبقى على اطلاع بأي
                                    تغييرات.</li>
                            </ol>

                            <h4>المعلومات التي نجمعها</h4>
                            <ol>
                                <li>المعلومات الشخصية: مثل الاسم، البريد الإلكتروني، ورقم الهاتف التي تقدمها عند التسجيل.
                                </li>
                                <li>معلومات الاستخدام: نجمع بيانات حول كيفية تفاعلك مع المنصة لتحسين خدماتنا.</li>
                                <li>ملفات تعريف الارتباط (Cookies): نستخدمها لتخصيص تجربتك وحفظ تفضيلاتك.</li>
                            </ol>

                            <h4>كيفية استخدام معلوماتك</h4>
                            <ol>
                                <li>لتقديم وتحسين الخدمات التعليمية المتاحة عبر المنصة.</li>
                                <li>للتواصل معك بخصوص حسابك أو إرسال تحديثات هامة حول المنصة.</li>
                                <li>لأغراض أمنية وحماية المنصة من أي أنشطة غير قانونية.</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
