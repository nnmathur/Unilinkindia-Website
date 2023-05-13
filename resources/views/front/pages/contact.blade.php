@extends('front.template.master')
@section('title', 'Home')
@section('content')

<style>
.footer{
		position:relative;

}

section#contact
{
    background-color:#C0C0C0;
    background-image: url({{ asset('public/front1/images/map-image.png') }});
    background-repeat: no-repeat;
    background-position: center;
	
}

section#contact .section-heading
{
    color: black;
	font-family:GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;
}

section#contact .form-group
{
    margin-bottom: 25px;
	margin-right:5px;
}

section#contact .form-group input,section#contact .form-group textarea
{
    padding: 20px;
}

section#contact .form-group input.form-control
{
    height:auto;
}

section#contact .form-group textarea.form-control
{
    height: 235px;
}

section#contact .form-control:focus
{
    border-color: #fed136;
    box-shadow: none;
}

section#contact ::-webkit-input-placeholder
{
    font-weight: 700;
    color: #ced4da;
    font-family:GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;
}

section#contact :-moz-placeholder
{
    font-weight: 700;
    color: #ced4da;
    font-family:GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;
}

section#contact ::-moz-placeholder
{
    font-weight: 700;
    color: #ced4da;
    font-family:GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;
}

section#contact :-ms-input-placeholder
{
    font-weight: 700;
    color: #ced4da;
    font-family:GothamRnd-Light', 'GothamRnd-Medium', Arial, Tahoma, Verdana;
}

section#contact
{
    padding: 40px 0;
}

section#contact h2.section-heading
{
    font-size: 40px;
    margin-top: 0;
    margin-bottom: 15px;
	
}

section#contact h3.section-subheading
{
    font-size: 16px;
    font-weight: 400;
    font-style: italic;
    margin-bottom: 75px;
	line-height:30px;
    text-transform: none;
	font-family: 'Droid Serif','Helvetica Neue',Helvetica,Arial,sans-serif;
}
 @media  (max-width: 767px) {
._16{
	text-align:center;
 }
 ._14{
	display:none;
}

}

  .active{
	font-size:20px;
	border-top:2px solid orange;
}
.aboutus-companybanner
{
	background:url({{ asset('public/front1/images/contactbanner.png') }}) no-repeat right center;
	background-size:cover;
}


</style>

    <div class="inner-banner">
		<div class="aboutus-companybanner"></div>	
	</div>
	
	<section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Contact Us</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="status alert alert-success" style="display: none"></div>
                    @include('admin.partials.flash_message')
                    <form action="{{ route('contactForm') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input class="form-control" name="name" id="name" type="text" placeholder="Your Name *" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="email" id="email" type="email" placeholder="Your Email *" required data-validation-required-message="Please enter your email address.">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="phone" id="phone" type="tel" placeholder="Your Phone *" pattern="^[0-9-+s()]*$" required data-validation-required-message="Please enter your phone number.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" name="message" id="message" placeholder="Your Message *" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button id="sendMessageButton" class="btn navbar-btn" name="submit" type="submit" required="required">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection