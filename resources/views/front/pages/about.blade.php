@extends('front.template.master')
@section('title', 'About')
@section('content')
    <section class="header-spacing">
		<div class="inner-banner">
			<div class="aboutus-companybanner"></div>
		</div>
        <section class="company-block pt-4">
			<div class="company">
				<div class="container">
					<h2 class="text-center career-header common-title">ABOUT COMPANY</h2>
					<div class="row align-items-center">
						<div class="col-md-5">
							<img src="{{ asset('/front1/images/industry1.png') }}" class="pic zoom" />
						</div>
						<div class="col-md-7">
							<h3>WHO WE ARE</h3>
							<div class="mxh-auto"><?php echo $about->who_we_are; ?></div>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col-md-5 order-2">
							<img src="{{ asset('/front1/images/industry1.png') }}" class="pic zoom" />
						</div>
						<div class="col-md-7">
							<h3>OUR GOAL</h3>
							<div class="mxh-auto"><?php echo $about->our_global; ?></div>
						</div>
					</div>
					<div class="row align-items-center">
						<div class="col-md-5">
							<img src="{{ asset('/front1/images/industry1.png') }}" class="pic zoom" />
						</div>
						<div class="col-md-7">
							<h3>WHAT WE DO</h3>
							<div class="mxh-auto"><?php echo $about->what_we_do; ?></div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
        <section class="leadership-block">
			<div class="container leadership">
				<h2 class="text-center career-header">MEET THE TEAM</h2>
				<div class="leadership-list">
					<div class="row align-items-center">
					@foreach ($teams as $team)
						<div class="col-md-6">
							<div class="row align-items-center">
								<div class="col-md-4">
									{{-- <img id="img-team" src="{{ asset('storage/app/public/team/' . $team->image) }}"
										alt="{{ $team->name }}" class="pull-left" /> --}}
									<img id="img-team" src="{{ asset('/front1/images/team/' . $team->image) }}"
										alt="{{ $team->name }}" class="pull-left zoom" />
								</div>
								<div class="col-md-8 about-leadership">
									<h4>{{ $team->name }}
										<br />
										<small>{{ $team->designation }}</small>
									</h4>
									<div class="mxh-auto mxw-150"><p>{{ $team->short_description }}</p></div>
								</div>
							</div>
						</div>
					@endforeach
					</div>
				</div>
			</div>
		</section>
		
        <section class="company-block">
			<div class="company">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-4 text-center company-highlighted-text zoom">
							<h2 class="growing"><span>{{ $about->it_year }}+</span><br /><small>Years in Information
									Technology</small></h2>
						</div>
						<div class="col-md-4 text-center company-highlighted-text zoom">
							<h2 class="fortune"><span>{{ $about->exp_year }}+</span><br /><small>Years of experienced
									team</small></h2>
						</div>
						<div class="col-md-4 text-center company-highlighted-text zoom">
							<h2 class="strategic"><span>{{ $about->comp_project }}+</span><br /><small>Completed
									projects</small></h2>
						</div>
						<div class="col-md-4 text-center company-highlighted-text zoom">
							<h2 class="customer"><span>{{ $about->cust_success }}%</span><br /><small>Customer
									success</small></h2>
						</div>
					</div>
				</div>
			</div>
		</section>
    </section>

@endsection
