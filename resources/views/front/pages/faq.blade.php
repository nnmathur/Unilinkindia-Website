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
    <!--                        <li>Frequently Ask Question</li>-->
    <!--                    </ul>-->
    <!--                </div>-->
    <!--                <div class="col">-->
    <!--                    <h6>FAQ</h6>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--// Breadcrumb -->

    <!-- Page Conttent -->
    <main class="page-content">
       
        <!-- Frequently Ask Question Area -->
		<div class="frequently-ask-question-area in-section section-padding-lg bg-white">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="section-title text-center">
							<h6>BEST SERVICES FOR YOU</h6>
							<h2>Frequently Ask Question</h2>
						</div>
					</div>
				</div>
				<div class="row">
                    <div class="col-lg-12">
                        <div class="faequently-accordion">
                            <!--panel body start-->
                            @foreach($faqs as $k=>$faq)
                                <h4 class="<?php if(++$k == '1'){ echo "open"; } ?>">{{ ++$k-1 }}. {{ $faq->title }}</h4>
                                <div class="faequently-description">
                                    {!! $faq->short_description !!}
                                </div>
                            @endforeach
                            <!--panel body end-->      
                        </div>
                    </div>
				</div>
			</div>
		</div>
		<!--// Frequently Ask Question Area -->
        

    </main>
    <!--// Page Conttent -->

@endsection        