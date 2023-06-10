@extends('front.template.master')
@section('title', 'Home')
@section('content')



    <!-- Page Conttent -->
    <main class="page-content">

        <div class="services-area in-section section-padding-lg bg-shape">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title text-center">
                            <h6>BEST PORTFOLIO FOR YOU</h6>
                            <h2>{{ $service->title ?? '' }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            @foreach($portfolios as $portfolio)
                                <div class="col-md-4">
                                    <div class="service-border">
                                        @if($portfolio->image)
                                            <img src="{{ asset('uploads/policy/'.$portfolio->image) }}" style="width: 100%; height: 150px;">
                                        @else
                                            <img src="{{ asset('assets/admin/images/dummy-logo.jpg')}}" id="imagePreview" class="organisation-logo" alt="Your image will appear here.">
                                        @endif
                                        <a href="{{ route('portfolio-details').'/'.$portfolio->slug}}"><h5 class="my-2">{{ $portfolio->title }}</h5></a>
                                        <p>{{ str_limit(strip_tags(html_entity_decode($portfolio->short_description)), $limit = 200, $end = '...') }}    </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>                      
                    </div>

            </div>
        </div>

    </main>

@endsection