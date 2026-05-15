@extends('layout.layout')

@php
     $footer='true';
     $topToBottom='true';
     
@endphp

@section('content')


    <div class="rbt-overlay-page-wrapper">
        <div class="breadcrumb-image-container breadcrumb-style-max-width">
            <div class="breadcrumb-image-wrapper">
                <img src="{{ asset('assets/images/bg/bg-image-10.jpg') }}" alt="Education Images">
            </div>
            <div class="breadcrumb-content-top text-center">
                <h1 class="title">Purchase Guide</h1>
                <p class="mb--20">Histudy Course Purchase Guide Here.</p>
                <ul class="page-list">
                    <li class="rbt-breadcrumb-item"><a href="#">Home</a></li>
                    <li>
                        <div class="icon-right"><i class="feather-chevron-right"></i></div>
                    </li>
                    <li class="rbt-breadcrumb-item active">Purchase Guide</li>
                </ul>
            </div>
        </div>
        <div class="rbt-putchase-guide-area breadcrumb-style-max-width rbt-section-gapBottom">
            <div class="rbt-article-content-wrapper">
                <div class="post-thumbnail mb--30 position-relative wp-block-image alignwide">
                    <img class="w-100" src="{{ asset('assets/images/blog/blog-bl-02.jpg') }}" alt="Blog Images">
                </div>
                <div class="content">
                    <h4>Histudy Currency</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, nam id necessitatibus dolorem odit possimus perferendis non ipsa amet eveniet blanditiis esse omnis dignissimos exercitationem nobis ex earum quae deleniti.</p>
                    <h4>Account Registering</h4>
                    <p>These landing pages expose people’s struggles, show how your product helps, and acts as a 24/7 sales team that creates new business opportunities for you. </p>
                    <ul>
                        <li>Name (required)</li>
                        <li>Age (required)</li>
                        <li>Date of birth (required)</li>
                        <li>Passport/ ID no (required)</li>
                        <li>Current career (required)</li>
                        <li>Mobile phone numbers (required)</li>
                        <li>Email address (required)</li>
                        <li>Hobbies & interests (required)</li>
                        <li>Social profiles (required)</li>
                    </ul>

                    <h4>Membership Policy</h4>
                    <p>A buyer’s guide is an online article that helps customers make a purchasing decision. It provides considerations for a specific product, including functionality, size, maintenance, price, and different features betweens models or brands. Buyer’s guides are helpful for selling high-ticket items such as outdoor gear, furniture, or appliances.</p>

                    <h4>How to Purchase a Course?</h4>
                    <p>Buyer’s guides convey general recommendations and tips outside the standard product description. This helps coach buyers through the decision-making process so they can determine the best setup for themselves.</p>

                    <h4>Why to Buy our Histudy Course?</h4>

                    <ul>
                        <li>Updated content on a regular basis</li>
                        <li>1-click checkout</li>
                        <li>Easy access & smart user dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection

