@extends('layout.layout')

@php
    $topToBottom = 'true';
    $footer = 'true';
@endphp

@section('content')

    <!-- Start Breadcrumb Area -->
    <div class="rbt-breadcrumb-default ptb--100 ptb_md--50 ptb_sm--30 bg-gradient-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <h2 class="title">نخبة معلمي فاهمين</h2>
                        <ul class="page-list">
                            <li class="rbt-breadcrumb-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                            <li>
                                <div class="icon-right"><i class="feather-chevron-left"></i></div>
                            </li>
                            <li class="rbt-breadcrumb-item active">كل المدرسين</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumb Area -->

    <!-- Start Teacher Area  -->
    <div class="rbt-team-area bg-color-white rbt-section-gap">
        <div class="container">
            <div class="row g-5">
                @forelse($teachers as $teacher)
                    <!-- Start Single Team  -->
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="rbt-team team-style-default style-three rbt-hover">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="{{ route('instructorPortfolio', $teacher->id) }}">
                                        <img src="{{ $teacher->profile_image ? asset('uploads/'.$teacher->profile_image) : asset('assets/images/team/team-07.jpg') }}"
                                             alt="{{ $teacher->name }}" style="height: 300px; object-fit: cover;">
                                    </a>
                                </div>
                                <div class="content">
                                    <h2 class="title"><a href="{{ route('instructorPortfolio', $teacher->id) }}">أ. {{ $teacher->name }}</a></h2>
                                    <h6 class="subtitle theme-gradient">{{ $teacher->subjects->first()->name ?? 'مدرس خبير' }}</h6>
                                    <p class="description">{{ Str::limit($teacher->headline ?? 'معلم خبير يسعى دائماً لتبسيط المعلومة ووصول الطالب لأقصى درجات الفهم والإتقان.', 60) }}</p>
                                    <div class="team-footer">
                                        <a class="rbt-btn-link" href="{{ route('instructorPortfolio', $teacher->id) }}">مشاهدة الملف الشخصي<i class="feather-arrow-left"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Team  -->
                @empty
                    <div class="col-12 text-center rbt-section-gap">
                        <div class="section-title">
                            <h3 class="title">لا يوجد مدرسين مسجلين حالياً.</h3>
                            <p>سيتم إضافة المدرسين قريباً، انتظرونا!</p>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Start Pagination -->
            <div class="row mt--60">
                <div class="col-lg-12">
                    <nav class="rbt-pagination justify-content-center">
                        {{ $teachers->links() }}
                    </nav>
                </div>
            </div>
            <!-- End Pagination -->

        </div>
    </div>
    <!-- End Teacher Area  -->

@endsection
