@extends('front.template.master')
@section('title', 'Home')
@section('content')


    <main class="page-content">

            <!-- Services Details Area -->
            <div class="services-details-area in-section section-padding-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="service-details-content">
                               
                                <!-- service-details-img -->
                                <div class="service-details-img" data-black-overlay="4">
                                    <img src="{{ asset('uploads/policy/'.$portfolio->image) }}" alt="service Details" style="width: 100%; height: 300px;">
                                </div>
                                <!--// service-details-img -->
                                
                                <div class="car-insurance mt-50">
                                    <h4>{{ $portfolio->title }}</h4>
                                    <div class="car-insurance mt-50">
                                        <div class="row">
                                            <div class="col-md-6">
                                                @if($portfolio->template == 1)
                                                    <p>{{ $portfolio->short_description }}</p>
                                                @else
                                                    <img src="{{ asset('uploads/policy/'.$portfolio->image1) }}" style="width:100%; height: 300px;">
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                @if($portfolio->template == 1)
                                                    <img src="{{ asset('uploads/policy/'.$portfolio->image1) }}" style="width:100%; height: 300px;">
                                                @else
                                                    <p>{{ $portfolio->short_description }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="row my-3">
                                            <p><strong>{{ $portfolio->short_description2 }}</strong></p>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                @if($portfolio->template == 1)
                                                    <img src="{{ asset('uploads/policy/'.$portfolio->image2) }}" style="width:100%; height: 300px;">
                                                @else
                                                    {{ $portfolio->short_description3 }}
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                @if($portfolio->template == 1)
                                                    {{ $portfolio->short_description3 }}
                                                @else
                                                    <img src="{{ asset('uploads/policy/'.$portfolio->image2) }}" style="width:100%; height: 300px;">
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="row my-3">
                                            <p>{!! $portfolio->description !!}</p>
                                        </div>
                                        
                                        <div class="row">
                                            <video width="100%" height="300" controls>
                                                <source src="{{ asset('uploads/policy/'.$portfolio->video) }}" type="video/mp4">
                                            </video>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                      
                            
                       
                        </div>
                 
                    </div>
                </div>
            </div>
            <!--// Services Details Area -->

        </main>

@endsection