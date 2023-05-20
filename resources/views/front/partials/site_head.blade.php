<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name='keywords' content='' />
    <meta name='description' content='' />
    <title>Unilink Software Pvt. Ltd.</title>
	<link rel="icon" type="image/png" href="images/favicon.png">

		<!-- Bootstrap -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="{{ asset('front1/css/dropdown.css') }}" rel="stylesheet">    
		<link href="{{ asset('front1/css/getintouch.css') }}" rel="stylesheet">
		<link href="{{ asset('front1/css/bootstrap.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Courgette|Ubuntu:400,700" rel="stylesheet">
		<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	
	
	<!-- IR Theme css -->
	
	<link href="{{ asset('front1/css/unlmain.css') }}" rel="stylesheet">
	<link href="{{ asset('front1/css/unilink.css') }}" rel="stylesheet">
	<link href="{{ asset('front1/css/custom.css') }}" rel="stylesheet">
	<!--<link href="{{ asset('public/front1/css/unilinknew.css') }}" rel="stylesheet">-->
	
	<style>
	
			/*.carousel-indicators*/
			/*{*/
			/*	display:none;*/
			/*}*/
			/*.carousel-inner*/
			/*{*/
			/*	height:200px;*/
			/*}*/

			#knowmore
			{
				margin-top:-15px;
				font-size:10px;
			}
			#clientheading
			{
				text-transform:uppercase; font-size:30px; padding-top:50px;padding-bottom:20px; color:#5bc0de;line-height:20px;
			}
			#demobutton1
			{
				background:#E57709;
				padding:15px 35px 15px 35px;
				color:white;
				border-color:orange;
			}
			 .Container-image1
			 {
				 margin:-15px;
				 padding:0;
				 position:relative;
				 top:83px;
				 width:100;
				 height:100%;
				 display:none;
			}
			
			@media screen and (max-width:450px){
			#clientheading
			{
				font-size:20px;
			}
			#demobutton1
			{
				background:#E57709;
				padding:10px 30px 10px 30px;
				color:white;
				font-size:10px;
				border-color:orange;
			}
			}
			.features__title
			{
				font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;
			}
			features__content
			{
				font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;
			}
			 @media  (max-width: 767px) {

			 .accordion
			 {
				display:none;
			 }
			 .Container-image
			 {
				display:none;
			 }
			 #carouselcontainer
			 {
				display:block;
			 }
			 
		}

		
		/* Social Icons */
#social_side_links {
	position: fixed;
  
  top: 50%;
  left: 0;
  padding: 0;
  list-style: none;
  z-index: 99;
}

#social_side_links li a {display: block;}

#social_side_links li a img {
	display: block;
	max-width:40px;
  padding: 10px;
  -webkit-transition:  background .2s ease-in-out;
  -moz-transition:  background .2s ease-in-out;
  -o-transition:  background .2s ease-in-out;
  transition:  background .2s ease-in-out;
}

#social_side_links li a:hover img {background: rgba(0, 0, 0, .2);}

</style>
  
</head>
<!-- Start of LiveChat (www.livechatinc.com) code -->
<!-- End of LiveChat code -->
  <body>
		<header>
			<div id="header" class="header-fixed">
				<div class="container rel-pos">
					<nav class="navbar-default" role="navigation">
						<div class="navbar-header">
							<div class="logo pull-left">
                            <a href="{{ route('home') }}" title="UnilinkIndia"><img id="logobig" src="{{ asset('public/front1/images/logo.png') }}" alt="UnilinkIndia" /><img id="logosmall" src="{{ asset('public/front1/images/logo2.png') }}" alt="UnilinkIndia" /></a>
                          	</div>							
						</div>
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu" id="toggle">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
						</button>
                    	
						<div class="collapse navbar-collapse top-navigation" id="menu">
							<ul class="nav-menu pull-left">
								 <li>
									<a class="{{ Request::routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
								</li>
								
								<li><a href="#">Services</a>
									<ul>
									    <?php
									        $services = DB::table('services')->get();
									    ?>
									    @foreach($services as $service)
										    <li><a href="{{ route('servicedetails', $service->id) }}">{{$service->title}}</a></li>
										@endforeach
									</ul>
								</li>
								
								<li><a href="#">Solutions</a>
									<ul>
									    <?php
									        $banners = DB::table('banners')->where('id', '!=', '4')->get();
									    ?>
									    @foreach($banners as $banner)
										    <li><a href="{{ route('bannerdetails', $banner->id) }}">{{$banner->title}}</a></li>
										@endforeach
									</ul>
								</li>
								<li><a class="{{ Request::routeIs('exposure') ? 'active' : '' }}" href="{{ route('exposure') }}">Our Associates</a>
								</li>
								
								<li><a class="{{ Request::routeIs('clients') ? 'active' : '' }}" href="{{ route('clients') }}">Clients</a></li>
								<li><a class="{{ Request::routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact Us</a></li>
							 
							</ul>
							<a href="{{ route('schedule') }}"> <button class="btn navbar-btn" id="demobutton">SCHEDULE A DEMO</button></a>
							
						</div>                        
					</nav>
				</div>
			</div>

     
            
		</header>