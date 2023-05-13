@extends('front.template.master')
@section('title', 'About')
@section('content')
		
	<section class="header-spacing">
		<div id="carousel-feedback" class="carousel slide aboutus-slider" data-ride="">
			<!-- Indicators -->				
			<ol class="carousel-indicators small-slider-incicators" id="ol-team">
				<li id="li-team" data-target="#carousel-feedback" data-slide-to="0" class="active"><span>Company</span></li>
				<li id="li-team" data-target="#carousel-feedback" data-slide-to="1"><span>Team</span></li>
			</ol>  
            
            <hr class="horizontal-brcolor career-horizontal-brcolor">           
			<!-- Wrapper for slides -->
			<div class="carousel-inner small-slider">
				<div class="item active">
					<div class="inner-banner">
						<div class="aboutus-companybanner"></div>	
					</div>
					
					<div class="company">    
                        <div class="container" style="margin-top:100px;">
                            <div class="col-md-3" style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;">
                                <h3>WHO WE ARE</h3>
                            </div>
                            <div class="col-md-9">
                                <?php echo $about->who_we_are; ?>
                            </div>
                            <div class="clear"></div>	
                            <hr class="horizontal-brcolor">
                            
                            <div class="col-md-3" style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;">
                                <h3>OUR GOAL</h3>
                            </div>
                            <div class="col-md-9">
                                <?php echo $about->our_global; ?>
                            </div>
                            <div class="clear"></div> 
							<hr class="horizontal-brcolor">
							 
							 <div class="col-md-3" style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;">
							     <h3>WHAT WE DO</h3>
							 </div>
							 <div class="col-md-9">
							     <?php echo $about->what_we_do; ?>
							 </div>
							 <div class="clear"></div> 
                             <hr class="horizontal-brcolor horizontal-fullbr">
                            
                        	<div class="col-md-4 text-center company-highlighted-text"><h2 class="growing"><span>{{ $about->it_year }}+</span><br/><small>Years in Information Technology</small></h2></div>
                            <div class="col-md-4 text-center company-highlighted-text"><h2 class="fortune"><span>{{ $about->exp_year }}+</span><br/><small>Years of experienced team</small></h2></div>					
                        	<div class="col-md-4 text-center company-highlighted-text"><h2 class="strategic"><span>{{ $about->comp_project }}+</span><br/><small>Completed projects</small></h2></div>					
                        	<div class="col-md-4 text-center company-highlighted-text"><h2 class="customer"><span>{{ $about->cust_success }}%</span><br/><small>Customer success</small></h2></div>
                        </div>
						
                        <div class="clear"></div>                            
					</div>	
				</div>
				
				<div class="item">							  
					<div class="inner-banner">
						<div class="aboutus-leadershipbanner"></div>
					</div>						
					<div class="container leadership">							
						<h2 class="text-center career-header">MEET THE TEAM</h2>
						<br/>
						<br/>
						@foreach($teams as $team)
    						<div class="col-md-6">
    							<img id="img-team" src="{{ asset('storage/app/public/team/'.$team->image) }}" alt="{{$team->name}}" class="pull-left" />
    							<div class="col-md-7 about-leadership">
    								<h4>{{$team->name}}
    								<br/>
    								<small>{{$team->designation}}</small></h4>
    								<br/>
    								<p>{{$team->short_description}}</p>
    							</div>
    							<div class="clear"></div>
                           </div>
                        @endforeach
					</div>
				</div>
			</div>
			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-feedback" data-slide="prev">
				<span class="glyphicon"><img src="images/arrow_left.png" alt="Previous" /></span>
			</a>
			<a class="right carousel-control" href="#carousel-feedback" data-slide="next">
				<span class="glyphicon"><img src="images/arrow_right.png" alt="Next" /></span>
		  </a>
		</div>
		
	</section>

@endsection