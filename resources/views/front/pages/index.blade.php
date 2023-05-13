@extends('front.template.master')
@section('title', 'Home')
@section('content')

<style>
    /* Slider */
    
    .slick-slide {
        margin: 0px 20px;
    }
    
    .slick-slide img {
        width: 100%;
    }
    
    .slick-slider
    {
        position: relative;
        display: block;
        box-sizing: border-box;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
                user-select: none;
        -webkit-touch-callout: none;
        -khtml-user-select: none;
        -ms-touch-action: pan-y;
            touch-action: pan-y;
        -webkit-tap-highlight-color: transparent;
    }
    
    .slick-list
    {
        position: relative;
        display: block;
        overflow: hidden;
        margin: 0;
        padding: 0;
    }
    .slick-list:focus
    {
        outline: none;
    }
    .slick-list.dragging
    {
        cursor: pointer;
        cursor: hand;
    }
    
    .slick-slider .slick-track,
    .slick-slider .slick-list
    {
        -webkit-transform: translate3d(0, 0, 0);
           -moz-transform: translate3d(0, 0, 0);
            -ms-transform: translate3d(0, 0, 0);
             -o-transform: translate3d(0, 0, 0);
                transform: translate3d(0, 0, 0);
    }
    
    .slick-track
    {
        position: relative;
        top: 0;
        left: 0;
        display: block;
    }
    .slick-track:before,
    .slick-track:after
    {
        display: table;
        content: '';
    }
    .slick-track:after
    {
        clear: both;
    }
    .slick-loading .slick-track
    {
        visibility: hidden;
    }
    
    .slick-slide
    {
        display: none;
        float: left;
        height: 100%;
        min-height: 1px;
    }
    [dir='rtl'] .slick-slide
    {
        float: right;
    }
    .slick-slide img
    {
        display: block;
    }
    .slick-slide.slick-loading img
    {
        display: none;
    }
    .slick-slide.dragging img
    {
        pointer-events: none;
    }
    .slick-initialized .slick-slide
    {
        display: block;
    }
    .slick-loading .slick-slide
    {
        visibility: hidden;
    }
    .slick-vertical .slick-slide
    {
        display: block;
        height: auto;
        border: 1px solid transparent;
    }
    .slick-arrow.slick-hidden {
        display: none;
    }
</style>

<link href="{{ asset('public/front1/css/unilinknew.css') }}" rel="stylesheet">
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    	<div class="Container-image" style="background-image:url(images/Accordion/Accimg1.jpg); background-repeat:no-repeat;"></div>	
		
		<div class="Container-image1" id="carouselcontainer">
			<div class="row">
				<div class="col-sm-12 col-md-12">
                	<div id="carousel-feedback" class="carousel slide" data-ride="carousel">
			  			<ol class="carousel-indicators">
							<li data-target="#carousel-feedback" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-feedback" data-slide-to="1"></li>
							<li data-target="#carousel-feedback" data-slide-to="2"></li>
							<li data-target="#carousel-feedback" data-slide-to="3"></li>
			  			</ol>
						<div class="carousel-inner" style="width:100%;height:100%;">
						    @foreach($banners as $banner)
                                <div class="item <?php if($banner->id == '4'){ echo 'active text-center'; } ?>">
                                    <div class="col-sm-12 col-md-12 client" style="position:relative;">
                                        <img class="img-responsive" src="{{asset('storage/app/public/banner/'.$banner->image)}}" alt="Image">
                                        <div id="minibox" class="col-sm-3 col-md-3" style="position:absolute; top:40px;left:30px;">
                                            <h1 class="miniacch1" style="opacity:1;">{{$banner->title}}</h1>
                                            <p class="miniaccp">{{$banner->short_description}}
                                            <div class="clear"></div>
                                            @if($banner->id == '4')
                                                <a href="{{ route('about') }}"><button class="btn miniacc-btn">KNOW MORE</button></a></p>
                                            @else
                                                <a href="{{ route('bannerdetails', $banner->id) }}"><button class="btn miniacc-btn">KNOW MORE</button></a></p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
			  		    </div>
                        <div align="center">
							<a class="left" href="#carousel-feedback" data-slide="prev">
								<span class="glyphicon glyphicon-chevron-left"></span>
							</a>
							<a class="right" href="#carousel-feedback" data-slide="next">
								<span class="glyphicon glyphicon-chevron-right"></span>
							</a>
						</div>
					</div>
				</div>
                <div class="clear"></div>
                        
			</div>
		</div>
		

    <div class="container">
        <div class="accordion uniacc">
            <ul>
                @foreach($banners as $banner)
                    <li>
                        <input type="radio" name="select" class="accordion-select" <?php if($banner->id == '4'){ echo 'checked'; } ?> />
                        <div class="accordion-title">
                            <span>{{ $banner->title }}</span>
                        </div>
                        <div class="accordion-content" style="background-image:url({{asset('storage/app/public/banner/'.$banner->image)}})">
                            <div class="transbox">
                                <h1 class="acch1" style="opacity:1;">{{ $banner->title }}</h1>
                                <p class="accp">{{ $banner->short_description }}
                                <div class="clear"></div>
                                @if($banner->id == '4')
                                    <a href="{{ route('about') }}"><button class="btn acc-btn">KNOW MORE</button></a></p>
                                @else
                                    <a href="{{ route('bannerdetails', $banner->id) }}"><button class="btn acc-btn">KNOW MORE</button></a></p>
                                @endif
                            </div>
                        </div>
                        <div class="accordion-separator"></div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    
    
    <ul id="social_side_links">
        <li><a style="background-color: #3c5a96;" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fwww.unilinkindia.com%2F" target="_blank"><img src="{{asset('public/front1/images/facebook-icon.png')}}" alt="" /></a></li>
        <li><a style="background-color: #1dadeb;" href="https://twitter.com/share?url=http%3A%2F%2Fwww.unilinkindia.com%2F" target="_blank"><img src="{{asset('public/front1/images/twitter-icon.png')}}" alt="" /></a></li>
        <li><a style="background-color: #1178b3;" href="https://www.linkedin.com/shareArticle?mini=true&url=http%3A%2F%2Fwww.unilinkindia.com%2F" target="_blank"><img src="{{asset('public/front1/images/linkedin-icon.png')}}" alt="" /></a></li>
    </ul>
    <section class="features" style="background:#DCDCDC;">
        <!-- <script type="text/javascript">document.querySelector('section.features').className+=' features-hide';</script> -->
        <div class="wrapper">
            <div class="features__item">
                <div class="features__item__link">
                    <div class="features__icon" title="ECOMMERCE PROJECTS">
                        <div class="features__icon__active" style="background-image:url(images/enterprise.png)"></div>
                        <div class="features__icon__hover" style=""></div>
                    </div>
                    <h2 class="features__title">
                        ECOMMERCE PROJECTS 
                    </h2>
                    <div class="features__content">
                        <p style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;">Our professional team of talented and experienced developers is adept at creating the right solutions based on your business needs.</p>
                    </div>
                    <div class="features__footer">
                        <a href="solutions.html">
                        See more </a>
                    </div>
                </div>
            </div>
            <div class="features__item">
                <div class="features__item__link">
                    <div class="features__icon" title="INDUSTRY SPECIFIC PRODUCTS">
                        <div class="features__icon__active" style="background-image:url(images/indeximg1.png)"></div>
                        <div class="features__icon__hover" style=""></div>
                    </div>
                    <h2 class="features__title">
                        INDUSTRY SPECIFIC PRODUCTS
                    </h2>
                    <div class="features__content">
                        <div>
                            <p style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;">We have experts for designing and developing solutions who work to achieve what our clients look for.</p>
                        </div>
                    </div>
                    <div class="features__footer">
                        <a href="industry.html">
                        See more </a>
                    </div>
                </div>
            </div>
            <div class="features__item">
                <div class="features__item__link">
                    <div class="features__icon" title="MANAGEMENT INFORMATION SYSTEMS">
                        <div class="features__icon__active" style="background-image:url(images/indeximg6.png)"></div>
                        <div class="features__icon__hover" style=""></div>
                    </div>
                    <h2 class="features__title">
                        MANAGEMENT INFORMATION SYSTEMS 
                    </h2>
                    <div class="features__content">
                        <p style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;">This section demonstrates our expertise in building IT based solutions with multi-platform support.</p>
                    </div>
                    <div class="features__footer">
                        <a href="solutions.html">
                        See more </a>
                    </div>
                </div>
            </div>
            <div class="features__item">
                <div class="features__item__link">
                    <div class="features__icon" title="ROBUST SERVICES">
                        <div class="features__icon__active" style="background-image:url(images/indeximg2.png)"></div>
                        <div class="features__icon__hover" style=""></div>
                    </div>
                    <h2 class="features__title">
                        ROBUST SERVICES 
                    </h2>
                    <div class="features__content">
                        <p style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;">We ensure reliability and multi-platform support as our 
                            responsibility  and  continue  to  serve  our  customers  in  the  best 
                            possible way.  
                        </p>
                    </div>
                    <div class="features__footer">
                        <a href="services.html">
                        See more </a>
                    </div>
                </div>
            </div>
            <div class="features__item">
                <div class="features__item__link">
                    <div class="features__icon" title="CLIENT-SERVER TECH PRODUCTS">
                        <div class="features__icon__active" style="background-image:url(images/indeximg5.png)"></div>
                        <div class="features__icon__hover" style=""></div>
                    </div>
                    <h2 class="features__title">
                        CLIENT-SERVER TECH PRODUCTS 
                    </h2>
                    <div class="features__content">
                        <p style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;">Unilink provides wide range of client-server technology products designed by skilled UnilinkIndia team.</p>
                    </div>
                    <div class="features__footer">
                        <a href="clientsever.html">
                        See more </a>
                    </div>
                </div>
            </div>
            <div class="features__item">
                <div class="features__item__link">
                    <div class="features__icon" title="DIGITAL MARKETING SERVICES">
                        <div class="features__icon__active" style="background-image:url(images/digital.png)"></div>
                        <div class="features__icon__hover" style=""></div>
                    </div>
                    <h2 class="features__title">
                        DIGITAL MARKETING SERVICES 
                    </h2>
                    <div class="features__content">
                        <p style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;">We have expertise in keeping you in touch with your customers with new-age Digital Media Marketing Services.</p>
                    </div>
                    <div class="features__footer">
                        <a href="digitalmarketing.html">
                        See more </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="achievement">
        <div class="achievement__wrap">
            <div class="partners__wrap">
                <div class="achievement__wrap_items">
                    <div class="achievement__item">
                        <div class="achievement-content">
                            <h2 style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;">{{$about->exp_year}}+</h2>
                            <h3 style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;">years of experienced team</h3>
                            <p style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;">Assisting you with all your IT-related needs. Whether it's designing and setting up your Business processes or development of software application, we're here for you.</p>
                        </div>
                    </div>
                    <div class="achievement__item">
                        <div class="achievement-content">
                            <h2 style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;">{{$about->it_year}}+</h2>
                            <h3 style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;">years in IT business</h3>
                            <p style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;">We offer a variety of services and strive to be the best in customer service, knowledge, teamwork, and communication. </p>
                        </div>
                    </div>
                    <div class="achievement__item">
                        <div class="achievement-content">
                            <h2 style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;">{{$about->comp_project}}+</h2>
                            <h3 style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;">completed projects</h3>
                            <p style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;">We consult, design, develop, manage and support software solutions using cutting-edge technology. With the utmost quality and consistency. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <aside class="customer-board">
        <div class="container">
            <h2 style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;" class="text-center">UnilinkIndia</h2>
            <p class="customer-boardcomment text-center" style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;">A one stop solution for all your IT needs.</p>
            <div class="text-center customer-readtag">
                <div class="customer-readtagbg"><a href="solutions.html" style="text-decoration:none;color:white;"><button class="btn navbar-btn" id="demobutton1"> KNOW OUR PRODUCTS &nbsp&nbsp <i class="fa fa-arrow-circle-right"></i></button></a></div>
            </div>
        </div>
    </aside>
    <div class="clear-fix"></div>
    <article>
        <div class="container" style="padding:60px;">
            <div class="row">
                <h2 class="text-center" id="clientheading" style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;">Our Clients</h2>
                <div class="col-sm-12 col-md-12">
                    <section class="customer-logos slider">
                        @foreach($clients as $client)
                            <div class="slide">
                                <img class="img-responsive" src="{{asset('storage/app/public/clients/'.$client->image)}}" alt="{{$client->title}}">
                            </div>
                        @endforeach
                    </section>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </article>
    <script> 
        $(document).ready(function(){
            $('.customer-logos').slick({
                slidesToShow: 6,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1500,
                arrows: false,
                dots: false,
                pauseOnHover: false,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 4
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 3
                    }
                }]
            });
        });

        $(document).ready(function(){
          $("#toggle").click(function(){
        	$(".top-navigation").slideToggle("slow",function ()
        	{
        	   $("#textMsg").text("Slide Down completed.");
        	});
          });
        });
    </script>

@endsection