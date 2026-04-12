@extends('layout.layout')

@php
     $topToBottom='false';
     $header = 'false';
@endphp

@section('content')

    <div class="rbt-elements-area bg-color-white rbt-section-gap">
        <div class="container">
            <div class="row gy-5 row--30">

                <div class="col-lg-6">
                    <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                        <h3 class="title">Login</h3>
                        <form class="max-width-auto">
                            <div class="form-group">
                                <input name="con_name" type="text" />
                                <label>Username or email *</label>
                                <span class="focus-border"></span>
                            </div>
                            <div class="form-group">
                                <input name="con_email" type="email">
                                <label>Password *</label>
                                <span class="focus-border"></span>
                            </div>

                            <div class="row mb--30">
                                <div class="col-lg-6">
                                    <div class="rbt-checkbox">
                                        <input type="checkbox" id="rememberme" name="rememberme">
                                        <label for="rememberme">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="rbt-lost-password text-end">
                                        <a class="rbt-btn-link" href="#">Lost your password?</a>
                                    </div>
                                </div>
                            </div>

                            <div class="form-submit-group">
                                <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Log In</span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    <span class="btn-icon"><i class="feather-arrow-right"></i></span>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="rbt-contact-form contact-form-style-1 max-width-auto">
                        <h3 class="title">Register</h3>
                        <form class="max-width-auto">
                            <div class="form-group">
                                <input name="register-email" type="text" />
                                <label>Email address *</label>
                                <span class="focus-border"></span>
                            </div>

                            <div class="form-group">
                                <input name="register_user" type="text">
                                <label>Username *</label>
                                <span class="focus-border"></span>
                            </div>

                            <div class="form-group">
                                <input name="register_password" type="password">
                                <label>Password *</label>
                                <span class="focus-border"></span>
                            </div>

                            <div class="form-group">
                                <input name="register_conpassword" type="password">
                                <label>Confirm Password *</label>
                                <span class="focus-border"></span>
                            </div>

                            <div class="form-submit-group">
                                <button type="submit" class="rbt-btn btn-md btn-gradient hover-icon-reverse w-100">
                                    <span class="icon-reverse-wrapper">
                                        <span class="btn-text">Register</span>
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

  



    <x-separator/>

    <!-- Start Copyright Area  -->
    <div class="copyright-area copyright-style-1 ptb--20">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12">
                    <p class="rbt-link-hover text-center text-lg-start">Copyright © 2025 <a href="https://www.pixcelsthemes.com/">Pixcels Themes.</a> All Rights Reserved</p>
                </div>
                {{-- <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12">
                    <ul class="copyright-link rbt-link-hover justify-content-center justify-content-lg-end mt_sm--10 mt_md--10">
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="{{ route('privacyPolicy') }}">Privacy policy</a></li>
                        <li><a href="{{ route('subscription') }}">Subscription</a></li>
                        <li><a href="{{ route('login') }}">Login & Register</a></li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </div>
    <!-- End Copyright Area  -->
     
@endsection