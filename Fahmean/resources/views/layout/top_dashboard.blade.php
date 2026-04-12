@php
    $student = auth()->user()->student; // User → Student
    
    // dd($student);
    $enrolledCoursesCount = $student->courses()->count();
@endphp


<div class="rbt-dashboard-content-wrapper">
    <div class="tutor-bg-photo bg_image bg_image--23 height-350"></div>
    <!-- Start Tutor Information  -->
    <div class="rbt-tutor-information">
        <div class="rbt-tutor-information-left">
            <div class="thumbnail rbt-avatars size-lg">
                <img src="  {{ Auth::user()->profile_image ? asset('uploads/profiles/'.Auth::user()->profile_image) : asset('default-avatar.png') }}"
                    alt="teacher">
            </div>
            <div class="tutor-content">
                <h5 class="title">{{ Auth::user()->name }}</h5>
                <ul class="rbt-meta rbt-meta-white mt--5">
                    <li><i class="feather-book"></i>{{ $enrolledCoursesCount }} الدورات المسجلة</li>
                    {{-- <li><i class="feather-award"></i>4 Certificate</li> --}}
                </ul>
            </div>
        </div>
        <div class="rbt-tutor-information-right">
            <div class="tutor-btn">
                {{-- <a class="rbt-btn btn-md hover-icon-reverse" href="#">
                    <span class="icon-reverse-wrapper">
                        <span class="btn-text">Become an teacher</span>
                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                        <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                    </span>
                </a> --}}
            </div>
        </div>
    </div>
    <!-- End Tutor Information  -->
</div>