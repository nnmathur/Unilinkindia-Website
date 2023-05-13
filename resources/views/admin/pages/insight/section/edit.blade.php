@extends('admin.template.master') 
@section('title', $title)
@section('content')

@php

$inname = '';
if(isset($sectionData))
{
	$inname = $sectionData->name;
	$inpage = $sectionData->page_id;
}

@endphp

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
	            <h3 class="content-header-title mb-0 d-inline-block">Sections</h3>
	            <div class="row breadcrumbs-top d-inline-block">
	                <div class="breadcrumb-wrapper col-12">
		                <ol class="breadcrumb">
		                    <li class="breadcrumb-item"><a href="{{ route('auth.dashboard') }}">Home</a></li>
		                    <li class="breadcrumb-item"><a href="{{ route('auth.insightsection.index') }}">Edit Sections</a></li>
		                    <li class="breadcrumb-item active">Data</li>
		                </ol>
	                </div>
	            </div>
            </div>
        </div>
        <div class="content-body">
        	<!-- Basic form layout section start -->
			<section id="horizontal-form-layouts">
				<div class="row">
					<div class="col-md-12">
				        <div class="card">
				            <div class="card-header">
				                <h4 class="card-title" id="horz-layout-colored-controls">Sections</h4>
				                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
			        			<div class="heading-elements">
				                    <ul class="list-inline mb-0">
				                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
				                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
				                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
				                        <li><a data-action="close"><i class="ft-x"></i></a></li>
				                    </ul>
				                </div>
				            </div>
				            <div class="card-content collpase show">
				                <div class="card-body">
				                    @include('admin.partials.flash_message') 					

									<form action="{{ $action }}" method="post" enctype="multipart/form-data" class="form form-horizontal">
										@csrf()
										@if(!empty($method)) @method($method) @endif
				                    	<div class="form-body">
				                    		<h4 class="form-section"><i class="fa fa-eye"></i> Edit Sections</h4>
							                <div class="row">
							                    <div class="col-md-12">
						                        	<div class="form-group row">
							                        	<label class="col-md-3 label-control" for="userinput3">Page <span class="text-danger">*</span> :</label>
							                        	<div class="col-md-9">
							                            	<select class="form-control" name="page_id" id="mainpage" required>
													        	@foreach($page as $k=>$c)
													        	    @if($c->id == $inpage)
													        	        <option value="{{ trim($inpage) }}" selected="">{{ $c->page }}</option>
													        	    @endif
													        	@endforeach		        							
							        							@foreach($page as $k=>$c)
							        							
							        							<option value="{{ $c->id }}" id="{{ $c->id }}">{{ $c->page }}</option>
							        							
							        							@endforeach
													        </select>
						                        		</div>
						                       		</div>
						                       	</div>
					                        </div>
					                        <div class="row">
							                    <div class="col-md-12">
						                        	<div class="form-group row">
							                        	<label class="col-md-3 label-control" for="userinput3">Section Title <span class="text-danger">*</span> :</label>
							                        	<div class="col-md-9">
							                            	<input class="form-control border-primary" type="text" placeholder="Section Title" id="userinput5" name="name" value="{{ trim($inname) }}" required="">
						                        		</div>
						                       		</div>
						                       	</div>
					                        </div>
										</div>

				                        <div class="form-actions right">
				                            <button type="submit" class="btn btn-primary" name="publish">
				                                <i class="fa fa-check-square-o"></i> Submit
				                            </button>
				                        </div>
				                    </form>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>
			</section>
            <!-- // Basic form layout section end -->
        </div>
    </div>
</div>

@stop

@section('javascript')

@endsection
