@extends('front.template.master')
@section('title', 'Exposure')
@section('content')

<style>
	.footer{
    position:relative;
    
    }
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
    .clientp{
    	font-size:18px;
    	text-align:center;
    	padding: 10px 10px 25px 10px;
    	font-family:GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;
    }
    #clientdiv{
    background:white;margin:0 auto;margin:20px;height:245px;
    }
</style>

<section class="header-spacing">
	<div class="customers-banner">
	</div>
</section>

<section class="features" style="background:#DCDCDC;margin:0 auto;">
	<h2 style="font-family:GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;"> OUR CLIENTS</h2>
    @foreach($clients as $client)
    	<div class="col-sm-3 col-md-3" id="clientdiv"> <img src="{{ asset('uploads/clients/'.$client->image) }}">
    		<p class="clientp">{{ $client->title }}</p>
    	</div>
    @endforeach
	
</section>

@endsection