@extends('front.template.master')
@section('title', 'Schedule')
@section('content')

<style>
    .footer{
    	position:relative;
    
    }
    
    section#contact
    {
        background-color:#CBF9E5;
         
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
    	background:url("images/contactbanner.png") no-repeat right center;
    	background-size:cover;
    }
    .navbar-btn1{
    	margin:15px;
    	color:white;
    	background-color:blue;
    	border:1px solid blue;
    }
    .navbar-btn1:hover{
    	color:white;
    	background-color:orange;
    	border:1px solid orange;
    	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.8), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
</style>

    <section id="contact">
    <div class="container" style="margin-top:45px;">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Schedule a Demo</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            @include('admin.partials.flash_message')
            <form method="post" action="{{ route('scheduleForm') }}">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" name="first_name" type="text" placeholder="First Name *" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="last_name" type="text" placeholder="Last Name *" required data-validation-required-message="Please enter your Last name.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="email" id="email" type="email" placeholder="Email *" required data-validation-required-message="Please enter your email address.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="phone" id="phone" type="tel" placeholder="Phone *" pattern="^[0-9-+s()]*$" required data-validation-required-message="Please enter your phone number.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="jobtitle" id="jobtitle" type="text" placeholder="Job title">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="company" id="company" type="text" placeholder="Company">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <select id="mySelect" name="employee" class="form-control" style="height:58px; color:#ced4da;">
                                    <option selected value="#Employees">#Employees</option>
                                    <option value="0-20">0-20</option>
                                    <option value="20-50">20-50</option>
                                    <option value="50 & More">50 & More</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select id="mySelect" name="product" class="form-control" style="height:58px; color:#ced4da;" required data-validation-required-message="Please select a product.">
                                    <option selected value="#product">Product interested in *</option>
                                    <option value="Swift authorizExpense">Swift authorizExpense</option>
                                    <option value="Swift Compliance+">Swift Compliance+</option>
                                    <option value="Clock-in">Clock-in</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea maxlength="250" name="message" placeholder="Your message" class="form-control" id="message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="clearfix"></div>
                        <div class="col-lg-12 text-center">
                            <div id="success"></div>
                            <button id="sendMessageButton" class="btn navbar-btn1" name="submit" type="submit" required="required">Send Message</button>
                        </div>
                    </div>
            </form>
            </div>
        </div>
    </div>
</section>

@endsection