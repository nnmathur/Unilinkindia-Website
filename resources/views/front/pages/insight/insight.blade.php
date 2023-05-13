@extends('front.template.master')
@section('content')

<main id="content">
    <div class="container">
    	<h1 class="text-center my-5">The Safety Point Insights</h1>
        <div class="row mt-5">
	        <div class="col-md-12 px-5"> 
	            <div class="row personal-section mt-0" style="margin-top: 70px !important;">
	            	<div class="col-md-12 text-center">
			            <div class="knowledge-section">
			                <div class="row">
    			            	@foreach($insight as $s)
    			            	    <div class="col-md-7">
        								<a href="{{ $s->page }}">
        								    <img src="{{asset('public/front/images/insight/'.$s->image)}}" style="width: 200px; height: 200px;">
        								    <p style="font-size: 17px;">{{ $s->page }}</p>
        								</a>
        							</div>
    							@endforeach
    						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

@endsection