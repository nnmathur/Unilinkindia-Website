@extends('front.template.master')
@section('title', 'Exposure Detail')
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
        
        .box h3{
            text-align:center;
        	position:relative;
        	top:80px;
        }
        
        .box {
        	width:80%;
        	height:345px;
        	background:#FFF;
        	margin:40px auto;
        }
        
        .effect5
        {
            position: relative;
        }
        
        .effect5:before, .effect5:after
        {
          z-index: -1;
          position: absolute;
          content: "";
          bottom: 25px;
          left: 10px;
          width: 50%;
          top: 80%;
          max-width:300px;
          background: #777;
          -webkit-box-shadow: 0 35px 20px #777;
          -moz-box-shadow: 0 35px 20px #777;
          box-shadow: 0 35px 20px #777;
          -webkit-transform: rotate(-8deg);
          -moz-transform: rotate(-8deg);
          -o-transform: rotate(-8deg);
          -ms-transform: rotate(-8deg);
          transform: rotate(-8deg);
        }
        
        .effect5:after
        {
          -webkit-transform: rotate(8deg);
          -moz-transform: rotate(8deg);
          -o-transform: rotate(8deg);
          -ms-transform: rotate(8deg);
          transform: rotate(8deg);
          right: 10px;
          left: auto;
        }
        
        .demoh3{
            color:orange;
            text-align:center;
            font-size:30px;
            font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;
        }
        
        .glyphicon-ok{
            color:orange;
        }
        
        .small02{
        	font-size:15px;
        	color:#0000FF;
        	font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;
        }
        
        .topp{
        	font-size:18px;
        	font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;
        }
        
        .panel-keypoint02{
        	color:#0000FF;
        	font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;
        }
        
        .active{
        	font-size:20px;
        	border-top:2px solid orange;
        }
        
        .list-unstyled li a:hover{
        text-decoration:none;
        }
        
        #smallpservices{
        	font-size:15px;
        	font-family:GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;
        }
        
        @media screen and (max-width:450px){
            #smallpservices{
            	font-size:12px;
            }
            
            .topp{
            	font-size:15px;
            	font-family:GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;	
            }
            
            .demoh3{
                font-size:20px;
            }
            
            .navbar-btn1{
            	padding:10px;
            	font-size:10px;
            }
        }
        
        .navbar-btn1{
        	margin:40px 0px 50px 0px;
        	color:white;
        	padding:15px;
        	background-color:blue;
        	border:1px solid blue;
        }
        .navbar-btn1:hover{
        	color:white;
        	background-color:orange;
        	border:1px solid orange;
        	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.8), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        .divClass{
    		display:none;
    		background:gray;
    		height:100%;
    		margin:20px 5px 20px 5px;
    		padding:10px;
    		font-family:GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;
    		line-height:5px;
    		width:100%;
        }
        #successheader{
        	color:darkblue;
        }
        #casestudy{
            background:white;
            width:100%;
            padding:5%;
        }
	</style>
		
	<section class="header-spacing">			
		<div class="inner-banner-prodetails dummy-banner industry-verticals-banner" style="background-image: url({{ asset('storage/app/public/exposures/'.$banner->image) }}); background-size: cover;)">
            <div class="container">
            	<div class="prodetails-banner-header" id="top-banner"> 	 <br/>
				<span> </span></div>
            </div>
		</div>
	</section>
	
	<article>
		<div class="container product-details solution-details">
			<div class="row" id="top">
				<div class="col-md-8">
					<h2 style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;"> {{ $banner->title }} </h2>
					<div class="clear"></div>
					<p class="topp" style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;"> 
					    {{ $banner->short_description }}
					</p>
					<?php echo $banner->description; ?>
				</div>
				
				<div class="col-md-4 pull-right otherproduct-links" style="margin-top:45px;">
					<h4>Browse our other signature products</h4>
					<br/>
					<ol class="list-unstyled">
					    @foreach($banners as $ban)
						    <li><a href="{{ route('bannerdetails', $ban->id) }}" class="small02" title="{{ $ban->title }}">{{ $ban->title }}</a></li>
					    @endforeach
					</ol>
				</div>
			</div>
         
            <div class="row">
				<div class="container product-details solution-details">
					<h3 class="demoh3"> View a Demo </h3>
				</div>	
			
				<div class="box effect5">
				    <iframe width="100%" height="345" src="{{ $banner->video }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
		    </div>
		    
    		<div class="container product-details solution-details col-sm-12" style="text-align:center;">
    		    <button id="btn1" onclick="scrollWin()" class="navbar-btn1" data-toggle="tooltip" data-placement="top" title="View Our Success Story">The Success Story &nbsp </button>
    		  
    		    <a href="{{ asset('storage/app/public/exposures/'.$banner->attachment) }}" download> 
    		        <button id="btn1" class="navbar-btn1" data-toggle="tooltip" data-placement="top" title="Download Our Success Story">
    		            <i class="glyphicon glyphicon-download-alt"></i> 
    		        </button>
    		    </a>
      
                <div class="divClass" style="text-align:left;">
                    <div id="casestudy">
                		<?php echo $banner->success_story; ?>
                    </div>
                </div>
    		</div>	
    	</div>
    </article>
    
    <script> 
        $(document).ready(function(){
          $("#btn1").click(function(){
            $(".divClass").slideToggle("slow",function ()
            {
               $("#textMsg").text("Slide Down completed.");
            });
          });
        });
        
        function scrollWin() {
            window.scrollTo(0, 8000);
        }
        
    	$(document).ready(function(){
    	  $("#toggle").click(function(){
    		$(".top-navigation").slideToggle("slow",function ()
    		{
    		   $("#textMsg").text("Slide Down completed.");
    		});
    	  });
    	});
        	
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>

@endsection