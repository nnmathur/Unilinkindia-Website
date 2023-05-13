@extends('front.template.master')

@section('content')

<main id="content">

    <div class="container">

    	<!--<h1 class="text-center my-5">LEGISLATION</h1>-->
    	<center>
    	    <a href="{{ route('csrInsight') }}">
    	        <img src="{{asset('public/front/images/insight/inews.jpg')}}" style="width: 100px; height: 100px; margin-bottom: 15px;">
    	    </a>
    	</center>

        <div class="row">

	        <div class="col-md-12 px-5"> 

	            <div class="row personal-section mt-0" style="padding: 5px 0px;">

	            	<div class="col-md-12 text-center">

			            <div class="knowledge-section">



			            	@foreach($section as $s)

				            	<span class="btn btn-primary m-2">

								    <a href="#section-{{ $s->id }}" class="text-white">{{ $s->name }}</a>

								</span>

							@endforeach



						</div>

					</div>

				</div>

			</div>


		</div>



		@foreach($section as $s)

			<div class="row tab-content" id="section-{{ $s->id }}">

				<div class="col-md-12 px-5"> 

		            <div class="row personal-section mb-5">

		            	<h3 class="pl-4" style="font-size: 1.25rem;">{{ $s->name }}</h3>

			            <div class="col-md-12">

			            	<div class="row">

								@foreach($sub_section as $ss)

			                	    @if($s->id == $ss->section_id) 

					                <div class="col-md-3">

					                	<div class="knowledge-box">

						                	<a href="#knowledge-box-{{ $ss->id }}" id="knowledge-box-{{ $ss->id }}link">
							                    
                    			                	@if($s->id == $ss->section_id)		                	
                    
                    				                	@php
                    
                    							    		$count=0; 
                    
                    							    	@endphp
                    
                    						        	@if(count($knowledge) > 0)        	
                    
                    							        	@foreach($knowledge as $k)
                    
                    							            	@if($ss->id == $k->sub_section)
                    
                    							            	@php
                    
                    							            		$count++; 
                    
                    							            	@endphp
                    
                    							            	@endif
                    
                    							        	@endforeach
                    
                    						        	@endif
                    						        	
                    						        @endif
                    						    
                    						    <h4 style="color: #595757;">{{ $ss->name }} <span class="badge ml-3">{{$count}}</span></h2></h4>

							                    <p style="color: #595757;">{{ $ss->description }}</p>

							                </a>

							            </div>

					                </div>

					                @endif

				                @endforeach

							</div>

			            </div>

	                </div>

	                <div class="row personal-section mb-5">

				        <div class="col-md-12"> 

			            	@foreach($sub_section as $ss)

			                	@if($s->id == $ss->section_id)		                	

				                	@php

							    		$count=0; 

							    	@endphp

						        	@if(count($knowledge) > 0)        	

							        	@foreach($knowledge as $k)

							            	@if($ss->id == $k->sub_section)

							            	@php

							            		$count++; 

							            	@endphp

							            	@endif

							        	@endforeach

						        	@endif

			                        <div id="knowledge-box-{{ $ss->id }}" class="section">

									    <h4><strong>{{ $ss->name }} - {{ $ss->description }}</strong> <span class="badge ml-3">{{$count}}</span></h4>
									    <hr>
									    
									    <div class="row">
									        
    									    @foreach($knowledge as $k)
    
    							            	@if($ss->id == $k->sub_section)	
    							            	
    							            	    <div class="col-md-6">
    							            	        <div class="row" style="border: 2px solid rgba(0, 0, 0, 0.23); padding-bottom: 10px; border-radius: 10px; margin: 5px auto; transition: box-shadow .3s; cursor: pointer;">
            							            		<div class="col-md-8">
            							            			<p class="my-3">{{ $k->name }}</p>
            							            	        <h6>{{ $k->description }}</h6>
            							            		</div>
            							            		<div class="col-md-4">
            							            			<a href="storage/app/public/knowledgebase/{{ $k->attachment }}" target="_blank">
            							            				<button class="btn btn-primary mt-4">
            							            				    <i class="fa fa-book" aria-hidden="true"></i> Read More..
            							            				</button>
            							            			</a>
            							            		</div>
            							            	</div>
            							            </div>
    							            		
    							           
    							            	@endif
    
    						            	@endforeach
						            	
						            	</div>
									</div>					            

								@endif

							@endforeach

					    </div>

					</div>

		        </div>



	        </div>

        @endforeach

    </div>

</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready(function () {

    $('.knowledge-section span:first').addClass('active');

    $('.tab-content:not(:first)').hide();

    $('.knowledge-section span a').click(function (event) {

        event.preventDefault();

        var content = $(this).attr('href');

        $(this).parent().addClass('active');

        $(this).parent().siblings().removeClass('active');

        $(content).show();

        $(content).siblings('.tab-content').hide();



     

    });

});


$(document).ready(function () {
    $('.knowledge-box:first').addClass('active1');
    $('.section:not(:first)').hide();
    $('.knowledge-box a').click(function (event) {
        event.preventDefault();
        var content = $(this).attr('href');
        $(this).parent().addClass('active1');
        $(this).parent().siblings().removeClass('active1');
        $(content).show();
        $(content).siblings('.section').hide();
    });
});


</script>

<script type="text/javascript">
      function goToByScroll(id){
          // Reove "link" from the ID
        // id = id.replace("link", "");
          // Scroll
        $('html,body').animate({
            scrollTop: $("#"+id).offset().top},
            'slow');
    }

    $(".knowledge-box > a").click(function(e) { 
          // Prevent a page reload when a link is pressed
        e.preventDefault(); 
          // Call the scroll function
        goToByScroll($(this).attr("id"));           
    });
</script>

@endsection







