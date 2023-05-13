@extends('front.template.master')
@section('title', 'Home')
@section('content')
        <!--// Header -->

        <!-- Breadcrumb -->
        <!--<div class="breadcrumb-area" data-bgimage="assets/images/bg/breadcrumb-bg-1.jpg" data-black-overlay="4">-->
        <!--    <div class="container">-->
        <!--        <div class="in-breadcrumb">-->
        <!--            <div class="row align-items-center">-->
        <!--                <div class="col">-->
        <!--                    <ul>-->
        <!--                        <li><a href="{{ route('home') }}">Home</a></li>-->
        <!--                        <li>Service</li>-->
        <!--                    </ul>-->
        <!--                </div>-->
        <!--                <div class="col">-->
        <!--                    <h6>Service Grid</h6>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!--// Breadcrumb -->

        <!-- Page Conttent -->
        <main class="page-content">

            <!-- Services Area -->
            <div class="services-area in-section section-padding-lg bg-shape">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section-title text-center">
                                <h6>BEST SERVICES FOR YOU</h6>
                                <h2>What We Provide</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        @foreach($services as $service)
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="in-service mt-30">
                                    <span class="in-service-icon">
                                        <i class="fa fa-{{ $service->icon }}"></i>
                                    </span>
                                    <h5><a href="{{ route('listservices',$service->slug) }}">{{ $service->title }}</a></h5>
                                    <p>{{ $service->short_description }}</p>
                                    <span class="in-service-transparenticon">
                                        <i class="flaticon-life-insurence"></i>
                                    </span>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <!--// Services Area -->

        </main>
        <!--// Page Conttent -->

        <!-- Footer -->
@endsection