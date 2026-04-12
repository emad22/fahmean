@extends('layout.layout')

@section('content')
    {{-- Mobile Menu --}}
    @if(view()->exists('layout.mobile-menu'))
        @include('layout.mobile-menu')
    @endif

    <a class="close_side_menu" href="javascript:void(0);"></a>

    <x-background/>

    <div class="rbt-dashboard-area rbt-section-overlayping-top rbt-section-gapBottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    

                    <div class="row g-5">
                        <div class="col-lg-3">
                            @include('layout.sidebar')
                        </div>
                        <div class="col-lg-9">
                            @yield('dashboard-content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-separator/>
@endsection
