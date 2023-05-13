@extends('front.template.master')
@section('title', 'Service Detail')
@section('content')

	<section class="header-spacing">
		<div class="services-banner text-center" style="background: url({{ asset('storage/app/public/services/'.$services->image) }});">
		</div>
	</section>
	<article class="solutions-container">
		<div class="container rel-pos">
			<div class="row services" id="top">					
				<h2 id="showh2" class="text-left">{{$services->title}}</h2>
                <p class="header-small"></p>
				<div class="col-md-5 solutions-content">
					<?php echo $services->description; ?>
				</div>
				<div class="solutions-whitepapers">
                    <h3 class="text-upper" id="text-small">{{$services->short_description}}</h3>							
				</div>
			</div>
		</div>
	</article>

@endsection