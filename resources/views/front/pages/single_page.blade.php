@extends('front.template.master')
@section('title', 'Home')
@section('content')

    <!-- Breadcrumb -->
    <!--<div class="breadcrumb-area" data-bgimage="assets/images/bg/breadcrumb-bg-1.jpg" data-black-overlay="4">-->
    <!--    <div class="container">-->
    <!--        <div class="in-breadcrumb">-->
    <!--            <div class="row align-items-center">-->
    <!--                <div class="col">-->
    <!--                    <ul>-->
    <!--                        <li><a href="{{ route('home') }}">Home</a></li>-->
    <!--                        <li>Contact</li>-->
    <!--                    </ul>-->
    <!--                </div>-->
    <!--                <div class="col">-->
    <!--                    <h6>Contact</h6>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--// Breadcrumb -->

    <!-- Page Conttent -->
    <main class="page-content">

        <!-- Contact Area -->
        <div class="contact-area in-section section-padding-lg">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title text-center">
                            <h2>{{ $pages->name }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-lg-12">
                        <!-- contact-form-warp Start -->
                        <div class="contact-form-warp">
                            <?php echo $pages->content; ?>
                        </div>
                        <!-- contact-form-warp End -->
                    </div>
                    
                </div>
            </div>
        </div>
        <!--// Services Area -->

    </main>
    
@endsection