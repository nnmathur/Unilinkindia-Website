@extends('front.template.master')
@section('title', 'Home')
@section('content')

<style type="text/css">
	
	.section-padding-lg {
    padding: 50px 0px 0px 0px;
}
.bg-shape {
    background-image: url(../images/bg/bg-shape.jpg);
    background-repeat: no-repeat;
    background-position: center center;
    background-attachment: scroll;
    background-size: cover;
}


.section-title h6 {
    color: #777777;
    font-family: "Open Sans", sans-serif;
    margin-bottom: 5px;
    margin-top: -5px;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Page Conttent -->
        <main class="page-content">

            <!-- Services Area -->
            <div class="services-area in-section section-padding-lg bg-shape">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section-title text-center">
                                <h6>BEST Portfolio FOR YOU</h6>
                                <h2>What We Provide</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        @foreach($service as $serv)
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="in-service mt-30">
                                    <span class="in-service-icon">
                                        <i class="fa fa-{{ $serv->icon ?? '' }}"></i>
                                    </span>
                                    <h5><a href="{{route('portfolio').'/'.$serv->slug}}">{{ $serv->title }}</a></h5>
                                    <p>{{ $serv->short_description }}</p>
                                    <span class="in-service-transparenticon">
                                        <i class="flaticon-life-insurence"></i>
                                    </span>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <!--// Services Area -->

        </main>
        <!--// Page Conttent -->

@endsection