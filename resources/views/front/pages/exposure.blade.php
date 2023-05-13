@extends('front.template.master')
@section('title', 'Exposure')
@section('content')

<style>
	@media  (max-width: 767px) {
		._16{
		 text-align:center;
		 }
		 ._14{
		display:none;
		}
	}
    h2{
      text-align:center;
      padding: 20px 20px 50px 20px;
      font-family:'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;
    }
    
    .customers-banner
    {
    	background:url({{ asset('public/front1/images/clientsbanner.png') }}) no-repeat right center;
    	background-size:cover;
    }
    .active{
    	font-size:20px;
    	border-top:5px solid orange;
    }
    
    .features .container {
        position: relative;
        width: 100%;
    }
    
    .features .image {
      opacity: 1;
      display: block;
      width: 100%;
      height: auto;
      transition: .5s ease;
      backface-visibility: hidden;
    }
    .features .text2{
    	position:absolute;
    	opacity:1;
    	top: 50%;
    	left:50%;
    }
    .features .middle {
      transition: .5s ease;
      opacity: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      text-align: center;
    }
    
    .features .container:hover .image {
      opacity: 0.3;
    }
    
    .features .container:hover .middle {
      opacity: 1;
    }
    .features .text1 {
      background-color: #0021A5;
      color: white;
      font-size: 16px;
      padding: 16px 32px;
      font-family:'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;
      
    }
    .features .text2 {
      background-color: #E57709;
      color: white;
      font-size: 16px;
      padding: 16px 32px;
      font-family:'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;
    }
    .features .text {
      background-color: #4CAF50;
      color: white;
      font-size: 16px;
      padding: 16px 32px;
      font-family:'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;
    }
    .text-block {
        position: absolute;
    	
        bottom: 50%;
        right: 50%;
        background-color: black;
        color: white;
        padding-left: 20px;
        padding-right: 20px;
    	font-family:'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;
    }
    a:hover {
    text-decoration:none;
    }
    .customers-banner
     {
    	background:url({{ asset('public/front1/images/industry_specific_banner.png') }}) no-repeat right center;
    	background-size:cover;
    }
    @media screen and (max-width:450px){
    .features .text {
      
      font-size: 10px;
     }
     .features .text1 {
      
      font-size: 12px;
    }
    }
</style>

    <section class="header-spacing">
		<div class="customers-banner">
		</div>
	</section>
	
	<section class="features col-md-12" style="background:#DCDCDC;margin:0 auto;">
		<h2 style="font-family:GothamRnd-Light','GothamRnd-Medium', Arial, Tahoma, Verdana;">OUR ASSOCIATES</h2>
		@foreach($exposures as $exposure)
    		<div class="col-md-4" style="margin-bottom:50px;">
        		<div class="container">
        			<img src="{{ asset('storage/app/public/exposures/'. $exposure->image) }}" alt="Avatar" class="image" style="width:100%">
    			    <p class="text1">{{$exposure->title}}</p>
    			    <div class="middle">
    			        <a href="{{ route('exposuredetails', $exposure->id) }}"><div class="text"> Solutions </div></a>
    			    </div>
    			</div>
    		</div>
    	@endforeach
	</section>
		
@endsection