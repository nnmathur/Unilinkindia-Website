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
        <!--                    <h6>Blog Details</h6>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!--// Breadcrumb -->

        <!-- Page Conttent -->
    <main class="page-content">

        <!-- Blog Details -->
        <div class="blog-details-area section-padding-lg bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog-details-wrap">
                            <div class="blog-content">
                                <div class="in-blog-metatop">
                                    <span>{{ Carbon\Carbon::parse($blogs->created_at)->format('d M, Y') }}</span>
                                    <span><a href="#">
                                        @foreach($blog_cat as $cat)
                                            @if($cat->id == $blogs->category)
                                            {{ $cat->title }}
                                            @endif
                                        @endforeach
                                    </a></span>
                                </div>
                                
                                <h4 class="in-blog-title"><a href="blog-details.html">{{ $blogs->title }}</a></h4>
                                
                                <p>{{ $blogs->short_description }}</p>
                                    
                                <div class="blog-details-image mt-30 mb-30">
                                    <img src="{{ env('APP_URL')}}/storage/app/public/blogs/{{ $blogs->image }}" alt="blog image" style="height: 400px;">
                                </div>
                                
                                <?php echo $blogs->description; ?>
                                
                                <!--<div class="in-blog-metabottom mt-30">-->
                                <!--    <span><a href="#"><i class="zmdi zmdi-favorite-outline"></i> Like : 08</a> / <a href="#"><i class="zmdi zmdi-comment-outline"></i>-->
                                <!--            Comment</a></span>-->
                                <!--</div>-->
                                
                                <div class="admin-author-details section-padding-lg">
                                    <h4 class="mb-30">Credit: <a href="{{ $blogs->credit_url }}" target="_blank">{{ $blogs->credit }}</a></h4>
                                    
                                    <!--<div class="admin-aouthor">-->
                                    <!--    <div class="admin-image">-->
                                    <!--        <img src="assets/images/blog/author-image/admin01.jpg" alt="">-->
                                    <!--    </div>-->
                                    <!--    <div class="admin-info">-->
                                    <!--        <div class="name">-->
                                    <!--            <h5>Siddharth Shetty</h5>-->
                                    <!--            <p>Admin Of Blog Post</p>-->
                                    <!--        </div>-->
                                            
                                    <!--        <p>dolore magna aliqua. Ut enim ad consequat. Duis aute irure dolor veritaexplicaaquuntu consectetur</p>-->
                                    <!--        <ul class="author-socialicons">-->
                                    <!--            <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>-->
                                    <!--            <li><a href="#"><i class="zmdi zmdi-google-plus"></i></a></li>-->
                                    <!--            <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>-->
                                    <!--            <li><a href="#"><i class="zmdi zmdi-instagram"></i></a></li>-->
                                    <!--        </ul>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    
                                </div>
                                <!-- blog-details-wrapper -->  
                                <!--<div class="review_address_inner">-->
                                <!--    <h4>Comments</h4>-->
                                    <!-- Single Review -->
                                <!--    <div class="pro_review">-->
                                <!--        <div class="review_thumb">-->
                                <!--            <img alt="review images" src="assets/images/blog/author-image/comment-01.jpg">-->
                                <!--        </div>-->
                                <!--        <div class="review_details">-->
                                <!--            <div class="review_info">-->
                                <!--                <h5><a href="#">Siddharth Shetty</a></h5>-->
                                <!--                <div class="rating_send">-->
                                <!--                    <a href="#"><span class="zmdi zmdi-mail-reply"></span></a>-->
                                <!--                </div>-->
                                <!--            </div>-->
                                <!--            <div class="review_date">-->
                                <!--                <span>Sep 22, 2018</span>-->
                                <!--            </div>-->
                                <!--            <p>dolore magna aliqua. Ut enim ad con Duis aute irur eritae pliciav aquuntu consectetur dunt ut labore et dolore magna aliqua. Ut enim adabz.</p>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                    <!--// Single Review -->
                                    <!-- Single Review -->
                                <!--    <div class="pro_review">-->
                                <!--        <div class="review_thumb">-->
                                <!--            <img alt="review images" src="assets/images/blog/author-image/comment-02.jpg">-->
                                <!--        </div>-->
                                <!--        <div class="review_details">-->
                                <!--            <div class="review_info">-->
                                <!--                <h5><a href="#">tome Shetty</a></h5>-->
                                <!--                <div class="rating_send">-->
                                <!--                    <a href="#"><span class="zmdi zmdi-mail-reply"></span></a>-->
                                <!--                </div>-->
                                <!--            </div>-->
                                <!--            <div class="review_date">-->
                                <!--                <span>Sep 11, 2018</span>-->
                                <!--            </div>-->
                                <!--            <p>Con Duis aute irur eritae pliciav aquuntu consectetur dunt ut labore et dolore magna aliqua. Ut enim adabz.</p>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                    <!--// Single Review -->
                                    <!-- Single Review -->
                                <!--    <div class="pro_review">-->
                                <!--        <div class="review_thumb">-->
                                <!--            <img alt="review images" src="assets/images/blog/author-image/comment-03.jpg">-->
                                <!--        </div>-->
                                <!--        <div class="review_details">-->
                                <!--            <div class="review_info">-->
                                <!--                <h5><a href="#">Siddharth Shetty</a></h5>-->
                                <!--                <div class="rating_send">-->
                                <!--                    <a href="#"><span class="zmdi zmdi-mail-reply"></span></a>-->
                                <!--                </div>-->
                                <!--            </div>-->
                                <!--            <div class="review_date">-->
                                <!--                <span>Sep 25, 2018</span>-->
                                <!--            </div>-->
                                <!--            <p>dolore magna aliqua. Ut enim ad con Duis aute irur eritae pliciav aquuntu consectetur dunt ut labore et dolore magna aliqua. Ut enim adabz.</p>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                    <!--// Single Review -->
                                <!--</div>-->
                                <!--<div class="comments-area comments-reply-area">-->
                                <!--    <div class="row">-->
                                <!--        <div class="col-lg-12">-->
                                <!--            <h4 class="comment-reply-title mb-50">Leave a Reply</h4>-->
                                <!--            <form action="#" class="comment-form-area">-->
                                <!--                <div class="comment-input">-->
                                <!--                    <div class="row">-->
                                <!--                        <div class="col-lg-6">-->
                                <!--                            <p class="comment-form-author">-->
                                <!--                                <input type="text" required="required" name="Name" placeholder="Name *">-->
                                <!--                            </p>-->
                                <!--                        </div>-->
                                <!--                        <div class="col-lg-6">-->
                                <!--                            <p class="comment-form-email">-->
                                <!--                                <input type="email" required="required" name="email" placeholder="Email *">-->
                                <!--                            </p>-->
                                <!--                        </div>-->
                                <!--                    </div>-->
                                <!--                    <p class="comment-form-url">-->
                                <!--                        <input type="text" name="url" placeholder="Website *">-->
                                <!--                    </p>-->
                                <!--                    <p class="comment-form-comment">-->
                                <!--                        <textarea class="comment-notes" required="required" placeholder="Comment *"></textarea>-->
                                <!--                    </p>-->
                                <!--                </div>-->
                                <!--                <div class="comment-form-submit">-->
                                <!--                    <button class="comment-submit">SUBMIT</button>-->
                                <!--                </div>-->
                                <!--            </form>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <!--// blog-details-wrapper -->               
                            </div>
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
                                <div class="single-widget widget-latestblog">
                                    <h4 class="widget-title">
                                        <span>Latest Blog</span>
                                    </h4>
                                    <ul>
                                        @foreach($lat_blogs as $lat_blog)
                                            <li>
                                                <div class="widget-latestblog-image">
                                                    <a href="{{ route('blogdetails', $lat_blog->slug) }}">
                                                        <img src="{{ env('APP_URL')}}/storage/app/public/blogs/{{ $lat_blog->image }}" alt="blog image" style="height: 70px;">
                                                    </a>
                                                </div>
                                                <span>{{ Carbon\Carbon::parse($lat_blog->created_at)->format('d M, Y') }}</span>
                                                <h5><a href="{{ route('blogdetails', $lat_blog->slug) }}">{{ str_limit(strip_tags(html_entity_decode($lat_blog->title)), $limit = 100, $end = '...') }}</a></h5>
                                            </li>
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
        <!--// Blog Details -->

    </main>
        <!--// Page Conttent -->

@endsection