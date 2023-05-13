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
    <!--                        <li><a href="index-2.html">Home</a></li>-->
    <!--                        <li>Blog</li>-->
    <!--                    </ul>-->
    <!--                </div>-->
    <!--                <div class="col">-->
    <!--                    <h6>Blog</h6>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--// Breadcrumb -->

    <!-- Page Conttent -->
    <main class="page-content">
        <div class="blog-details-area section-padding-lg bg-white">
            <div class="container">
                <div class="row justify-content-center">
					<div class="col-lg-8">
						<div class="section-title text-center">
							<h6>BLOGS</h6>
							<h2>BLOGS</h2>
						</div>
					</div>
				</div>
                <div class="row">
                    <div class="col-lg-8">
                        
                        <div class="row">
                            <!-- Single Blog -->
                            @foreach($blogs as $blog)
                                <div class="col-lg-12">
                                    <div class="in-blog mb-30">
                                        <div class="in-blog-image-list">
                                            <a href="{{ route('blogdetails', $blog->slug) }}">
                                                <img src="{{ env('APP_URL')}}/storage/app/public/blogs/{{ $blog->image }}" alt="blog image" style="height: 400px;">
                                            </a>
                                        </div>
                                        <div class="in-blog-content">
                                            <div class="in-blog-metatop">
                                                <span>{{ Carbon\Carbon::parse($blog->created_at)->format('d M, Y') }}</span>
                                                <span>
                                                    <a href="#">
                                                        @foreach($blog_cat as $cat)
                                                        @if($cat->id == $blog->category)
                                                        {{ $cat->title }}
                                                        @endif
                                                        @endforeach
                                                    </a>
                                                </span>
                                            </div>
                                            <h4 class="in-blog-title"><a href="{{ route('blogdetails', $blog->slug) }}">{{ $blog->title }}</a></h4>
                                            <p>{{ $blog->short_description }}</p>
                                            <div class="in-blog-authorimage">
                                                <span>
                                                    <img src="{{ env('APP_URL')}}/public/front/images/logo/logo5.png" alt="author image">
                                                </span>
                                            </div>
                                            <div class="in-blog-metabottom">
                                                <span>Credit : <a href="{{ $blog->credit_url }}" target="_blank">{{ $blog->credit }}</a></span>
                                                <!--<span><a href="#"><i class="zmdi zmdi-favorite-outline"></i> Like : 05</a> / <a href="#"><i class="zmdi zmdi-comment-outline"></i>-->
                                                <!--        Comment</a></span>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!--// Single Blog -->    
                        </div>
                        
                    </div>
                    <div class="col-lg-4">
                        <div class="row widgets right-sidebar">

                            <div class="col-lg-12">
                                <div class="single-widget widget-search">
                                    <form action="#" class="widget-search-form">
                                        <input type="text" placeholder="Search...">
                                        <button type="submit"><i class="zmdi zmdi-search"></i></button>
                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="single-widget widget-categories">
                                    <h4 class="widget-title">
                                        <span>Categories</span>
                                    </h4>
                                    <ul>
                                        @foreach($blog_cat as $cat)
                                            <li><a href="#"><span>{{ $cat->title }}</span></a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                           <div class="col-lg-12">
                                <div class="single-widget widget-newsletter">
                                    <h4 class="widget-title">
                                        <span>Tag</span>
                                    </h4>
                                    <div class="tag-list">
                                        @foreach($blog_tag as $tag)
                                            <a href="#">{{ $tag->title }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--// Page Conttent -->

@endsection