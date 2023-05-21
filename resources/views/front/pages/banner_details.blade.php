@extends('front.template.master')
@section('title', 'Home')
@section('content')

    <style>
        .footer {
            position: relative;
        }

        @media (max-width: 767px) {
            ._16 {
                text-align: center;
            }

            ._14 {
                display: none;
            }
        }

        .box h3 {
            text-align: center;
            position: relative;
            top: 80px;
        }

        .box {
            width: 80%;
            height: 345px;
            background: #FFF;
            margin: 40px auto;
        }

        .effect5 {
            position: relative;
        }

        .effect5:before,
        .effect5:after {
            z-index: -1;
            position: absolute;
            content: "";
            bottom: 25px;
            left: 10px;
            width: 50%;
            top: 80%;
            max-width: 300px;
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

        .effect5:after {
            -webkit-transform: rotate(8deg);
            -moz-transform: rotate(8deg);
            -o-transform: rotate(8deg);
            -ms-transform: rotate(8deg);
            transform: rotate(8deg);
            right: 10px;
            left: auto;
        }

        .demoh3 {
            color: orange;
            text-align: center;
            font-size: 30px;
            font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;
        }

        .glyphicon-ok {
            color: orange;
        }

        .small02 {
            font-size: 15px;
            color: #0000FF;
            font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;
        }

        .topp {
            font-size: 18px;
            font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;
        }

        .panel-keypoint02 {
            color: #0000FF;
            font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;
        }

        .active {
            font-size: 20px;
            border-top: 2px solid orange;
        }

        .list-unstyled li a:hover {
            text-decoration: none;
        }

        #smallpservices {
            font-size: 15px;
            font-family: GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;

        }

        @media screen and (max-width:450px) {
            #smallpservices {
                font-size: 12px;
            }

            .topp {
                font-size: 15px;
                font-family: GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;

            }

            .demoh3 {
                font-size: 20px;
            }

            .navbar-btn1 {
                padding: 10px;
                font-size: 10px;
            }
        }

        .navbar-btn1 {
            margin: 0 0px 50px 0px;
            color: white;
            padding: 15px;
            background-color: blue;
            border: 1px solid blue;
        }

        .navbar-btn1:hover {
            color: white;
            background-color: orange;
            border: 1px solid orange;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.8), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        .divClass {
            display: none;
            background: gray;
            height: 100%;
            margin: 20px 5px 20px 5px;
            padding: 10px;
            font-family: GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;
    line-height:5px;
            width: 100%;
        }

        #successheader {
            color: darkblue;
        }

        #casestudy {
            background: white;
            width: 100%;
            padding: 5%;
        }
    </style>

    {{-- <section class="header-spacing">
        style="background-image: url({{ asset('storage/app/public/banner/'.$banner->image) }}); background-size: cover;)"	 
        <div class="inner-banner-prodetails dummy-banner industry-verticals-banner">
            <div class="container">
                <div class="prodetails-banner-header" id="top-banner"> <br />
                    <span> </span>
                </div>
            </div>
        </div>
    </section>--}}
    <section class="gradient-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-items-center gh-box">
                    <div>
                        <h2 style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;">
                        {{ $banner->title }} </h2>
                        <div class="content">
                            <p>{{ $banner->short_description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="video-block">
                <iframe width="100%" height="450" src="{{ $banner->video }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div>
    </section>

    <article>
        <div class="container product-details solution-details">
            <div class="row pt-30" id="top">
                <div class="col-md-7">
                    <div class="dtl-content">
                        {{-- <h2 style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;">
                            {{ $banner->title }} </h2>
                        <div class="content">
                            <p>{{ $banner->short_description }}</p>
                        </div> --}}

                        <?php //echo $banner->description;
                        ?>
                        <div class="content">
                            <ul>
                                <li>The system manages organization expenses through well-defined ‘Authority Norms’.</li>
                                <li>Offers controls through ‘Centralized and Cost Center based budgets'.</li>
                                <li>Up-to 8 Tier Approval Matrix for each transaction.</li>
                                <li>Work-flows based on Monitory controls</li>
                                <li>Offers Unlimited Branches and Zonal office controls.</li>
                                <li>Separate Approval Matrix for Branch Office/Zonal Office and Head Office.</li>
                                <li>Comprehensive Contract Management.</li>
                                <li>Employee Based Expense Management.
                                    <ul>
                                        <li>Travel Expenses</li>
                                        <li>Personal Advances, Adjustments & Reimbusements</li>
                                        <li>Current Working Expenses</li>
                                        <li>Medical Expenses</li>
                                </li>
                            </ul>
                            </li>
                            <li>CAPEX – Capital Goods & Services Purchase</li>
                            </ul>
                            <p>The system is a browser based application which can be used on a cloude installation or on a
                                central server which has organization wide usage.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 otherproduct-links">
                    <div class="ol-box zoom gradient-bg gradient-bg5">
                        <div class="br-inner">
                            <h4><a href="#">Odoo ERP Consulting</a></h4>
                        </div>
                    </div>
                    <div class="ol-box zoom gradient-bg gradient-bg2">
                        <div class="br-inner">
                            <h4><a href="#">Software Export Solutions</a></h4>
                        </div>
                    </div>
                    <div class="ol-box zoom gradient-bg gradient-bg7">
                        <div class="br-inner">
                            <h4><a href="#">Shopify E-commerce Development</a></h4>
                        </div>
                    </div>
                    <div class="ol-box zoom gradient-bg gradient-bg8">
                        <div class="br-inner">
                            <h4><a href="#">Laravel E-commerce Development</a></h4>
                        </div>
                    </div>
                    <div class="ol-box zoom gradient-bg gradient-bg2">
                        <div class="br-inner">
                            <h4>Other Development</h4>
                            {{-- <ol class="list-unstyled">
                                @foreach ($banners as $ban)
                                    <li><a href="{{ route('bannerdetails', $ban->id) }}" class="small02"
                                            title="{{ $ban->title }}">{{ $ban->title }}</a></li>
                                @endforeach
                            </ol> --}}

                            <ol class="list-unstyled">
                                <li><a href="#" class="small02" title="Odoo ERP Consulting">Odoo ERP Consulting  </a></li>
                                <li><a href="#" class="small02" title="Soft Expert Solutions">Software Export
                                        Solutions </a></li>
                                <li><a href="#" class="small02" title="Odoo ERP Consulting">Shopify E-commerce
                                        Development </a></li>
                                <li><a href="#" class="small02" title="Soft Expert Solutions">Laravel E-commerce
                                        Development</a></li>
                                <li><a href="#" class="small02" title="Odoo ERP Consulting">Odoo ERP Consulting</a></li>
                                <li><a href="#" class="small02" title="Soft Expert Solutions">Software Export
                                        Solutions</a></li>
                                <li><a href="#" class="small02" title="Odoo ERP Consulting">Shopify E-commerce
                                        Development</a></li>
                                <li><a href="#" class="small02" title="Soft Expert Solutions">Laravel E-commerce
                                        Development</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row story-block">
                <div class="col-xs-12">
                    <h3 class="common-title" style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;"> The Success
                        Stories </h3>
                </div>
                <div class="col-md-7">
                    <div class="row mt-3 clspam-2">
                        <div class="col-md-6">
                            <div class="features__item w-100 zoom gradient-bg gradient-bg1">
                                <div class="br-inner">
                                    <div class="features__item__link">
                                        <h2 class="features__title">
                                            ECOMMERCE PROJECTS
                                        </h2>
                                        <div class="features__content">
                                            <p
                                                style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;">
                                                Our professional team of talented and experienced developers is adept at
                                                creating the right solutions based on your business needs.</p>
                                        </div>
                                        <div class="features__footer">
                                            <a href="solutions.html">
                                                See more </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="features__item w-100 zoom gradient-bg gradient-bg2">
                                <div class="br-inner">
                                    <div class="features__item__link">
                                        <h2 class="features__title">
                                            ECOMMERCE PROJECTS
                                        </h2>
                                        <div class="features__content">
                                            <p
                                                style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;">
                                                Our professional team of talented and experienced developers is adept at
                                                creating the right solutions based on your business needs.</p>
                                        </div>
                                        <div class="features__footer">
                                            <a href="solutions.html">
                                                See more </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="features__item w-100 zoom gradient-bg gradient-bg3">
                                <div class="br-inner">
                                    <div class="features__item__link">
                                        <h2 class="features__title">
                                            ECOMMERCE PROJECTS
                                        </h2>
                                        <div class="features__content">
                                            <p
                                                style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;">
                                                Our professional team of talented and experienced developers is adept at
                                                creating the right solutions based on your business needs.</p>
                                        </div>
                                        <div class="features__footer">
                                            <a href="solutions.html">
                                                See more </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="features__item w-100 zoom gradient-bg gradient-bg4">
                                <div class="br-inner">
                                    <div class="features__item__link">
                                        <h2 class="features__title">
                                            ECOMMERCE PROJECTS
                                        </h2>
                                        <div class="features__content">
                                            <p
                                                style="font-family: 'GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;">
                                                Our professional team of talented and experienced developers is adept at
                                                creating the right solutions based on your business needs.</p>
                                        </div>
                                        <div class="features__footer">
                                            <a href="solutions.html">
                                                See more </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 otherproduct-links desc-right-box mt-0">
                    <div class="row  mt-0">
                        <div class="col-md-6">
                            <div class="ol-box zoom gradient-bg gradient-bg5">
                                <div class="br-inner">
                                    <h4>Related Blogs</h4>
                                    <ol class="list-unstyled">
                                        <li><a href="ht#/2" class="small02" title="Odoo ERP Consulting">Odoo ERP
                                                Consulting</a></li>
                                        <li><a href="#" class="small02" title="Soft Expert Solutions">Soft Expert
                                                Solutions</a></li>
                                                <li><a href="ht#/2" class="small02" title="Odoo ERP Consulting">Odoo ERP
                                                        Consulting</a></li>
                                                <li><a href="#" class="small02" title="Soft Expert Solutions">Soft Expert
                                                        Solutions</a></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ol-box zoom gradient-bg gradient-bg6">
                                <div class="br-inner">
                                    <h4>Case Studios</h4>
                                    <ol class="list-unstyled">
                                        <li><a href="ht#/2" class="small02" title="Odoo ERP Consulting">Odoo ERP
                                                Consulting</a></li>
                                        <li><a href="#" class="small02" title="Soft Expert Solutions">Soft Expert
                                                Solutions</a></li>
                                                <li><a href="ht#/2" class="small02" title="Odoo ERP Consulting">Odoo ERP
                                                        Consulting</a></li>
                                                <li><a href="#" class="small02" title="Soft Expert Solutions">Soft Expert
                                                        Solutions</a></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ol-box zoom gradient-bg gradient-bg7">
                                <div class="br-inner">
                                    <h4>Knowledge base</h4>
                                    <ol class="list-unstyled">
                                        <li><a href="ht#/2" class="small02" title="Odoo ERP Consulting">Odoo ERP
                                                Consulting</a></li>
                                        <li><a href="#" class="small02" title="Soft Expert Solutions">Soft Expert
                                                Solutions</a></li>
                                                <li><a href="ht#/2" class="small02" title="Odoo ERP Consulting">Odoo ERP
                                                        Consulting</a></li>
                                                <li><a href="#" class="small02" title="Soft Expert Solutions">Soft Expert
                                                        Solutions</a></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="ol-box zoom gradient-bg gradient-bg8">
                                <div class="br-inner">
                                    <h4>Documents</h4>
                                    <ol class="list-unstyled">
                                        <li><a href="ht#/2" class="small02" title="Odoo ERP Consulting">Odoo ERP
                                                Consulting</a></li>
                                        <li><a href="#" class="small02" title="Soft Expert Solutions">Soft Expert
                                                Solutions</a></li>
                                                <li><a href="ht#/2" class="small02" title="Odoo ERP Consulting">Odoo ERP
                                                        Consulting</a></li>
                                                <li><a href="#" class="small02" title="Soft Expert Solutions">Soft Expert
                                                        Solutions</a></li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row">
				<div class="container product-details solution-details">
					<h3 class="demoh3"> View a Demo </h3>
				</div>	
			
				<div class="box effect5">
				    <iframe width="100%" height="345" src="{{ $banner->video }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>
		    </div>
		     --}}
            <div class="container product-details solution-details col-sm-12" style="text-align:center;">
                <button id="btn1" onclick="scrollWin()" class="navbar-btn1" data-toggle="tooltip"
                    data-placement="top" title="View Our Success Story">The Success Story &nbsp </button>

                <a href="{{ asset('storage/app/public/banner/' . $banner->attachment) }}" download>
                    <button id="btn1" class="navbar-btn1" data-toggle="tooltip" data-placement="top"
                        title="Download Our Success Story">
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
        $(document).ready(function() {
            $("#btn1").click(function() {
                $(".divClass").slideToggle("slow", function() {
                    $("#textMsg").text("Slide Down completed.");
                });
            });
        });

        function scrollWin() {
            window.scrollTo(0, 8000);
        }

        $(document).ready(function() {
            $("#toggle").click(function() {
                $(".top-navigation").slideToggle("slow", function() {
                    $("#textMsg").text("Slide Down completed.");
                });
            });
        });

        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

@endsection
