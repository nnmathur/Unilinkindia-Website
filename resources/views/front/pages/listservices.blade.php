@extends('front.template.master')
@section('title', 'Home')
@section('content')

    <!-- Breadcrumb -->
    <!--<div class="breadcrumb-area" data-bgimage="{{ asset('public/front/images/bg/breadcrumb-bg-1.jpg') }}" data-black-overlay="4">-->
    <!--    <div class="container">-->
    <!--        <div class="in-breadcrumb">-->
    <!--            <div class="row align-items-center">-->
    <!--                <div class="col">-->
    <!--                    <ul>-->
    <!--                        <li><a href="{{ route('home') }}">Home</a></li>-->
    <!--                        <li>{{ $content->title }}</li>-->
    <!--                    </ul>-->
    <!--                </div>-->
    <!--                <div class="col">-->
    <!--                    <h6>{{ $content->title }}</h6>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--// Breadcrumb -->

    <!-- Page Conttent -->
    <main class="page-content">

		<div class="services-area in-section section-padding-lg bg-shape">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6">
						<div class="section-title text-center">
							<h6>BEST SERVICES FOR YOU</h6>
							<h2>{{ $content->title }}</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-8">
						<div class="row">
						    @foreach($policies as $policy)
						    	<div class="col-md-4">
						    		<div class="service-border">
							    		@if($policy->image)
						                    <img src="{{ env('APP_URL')}}/storage/app/public/policy/{{ $policy->image }}" style="width: 100%; height: 150px;">
						                @else
						                    <img src="{{ asset('assets/admin/images/dummy-logo.jpg')}}" id="imagePreview" class="organisation-logo" alt="Your image will appear here.">
						                @endif
						                <a href="{{ route('servicedetails',$policy->slug) }}"><h5 class="my-2">{{ $policy->title }}</h5></a>
							    		<p>{{ str_limit(strip_tags(html_entity_decode($policy->short_description)), $limit = 200, $end = '...') }}    </p>
							    	</div>
						    	</div>
						    @endforeach
						</div>						
					</div>
					<div class="col-lg-4">
                        <div class="row widgets right-sidebar">

                            <div class="col-lg-12">
                                <div class="single-widget widget-categories">
                                    <h4 class="widget-title">
                                        <span>Other Services</span>
                                    </h4>
                                    <ul>
                                    	@foreach($services as $service)
                                            <li>
                                            	<a href="{{ route('listservices',$service->slug) }}">
                                            		<span>
                                            			{{ $service->title }}
                                            		</span>
                                            	</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <!--<div class="col-lg-12">-->
                            <!--    <div class="single-widget widget-newsletter">-->
                            <!--        <h4 class="widget-title">-->
                            <!--            <span>Newsletter</span>-->
                            <!--        </h4>-->
                            <!--        <p>Lorem ipsum dolor sit amet, coadipisicint, sed do eiusmod tempor incididunt</p>-->
                            <!--        <form action="#" class="widget-newsletter-form">-->
                            <!--            <input type="text" placeholder="Your email...">-->
                            <!--            <button type="submit"><img src="{{ asset('public/front/images/icons/paper-plane-white.png') }}" alt="send"></button>-->
                            <!--        </form>-->
                            <!--    </div>-->
                            <!--</div>-->
                            
                        </div>
                    </div>
				</div>
			</div>
		</div>

	</main>

@endsection