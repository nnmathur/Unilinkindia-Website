@extends('admin.template.master') 
@section('title', $title)
@section('content')

<style type="text/css">

	.hide{
		display:none;
	}

	.upload-poster {
	    display: inline-block;
	    padding: 4px 12px;
	    margin-bottom: 0;
	    font-size: 14px;
	    line-height: 20px;
	    color: #000;
	    text-align: center;
	    vertical-align: middle;
	    cursor: pointer;
	    border: 1px solid #bbbbbb;
	    border-bottom-color: #a2a2a2;
	    -webkit-border-radius: 4px;
	    -moz-border-radius: 4px;
	    border-radius: 4px;
	}

	.organisation-logo{
	    width: 200px;
	    height: 200px;
	    border: 1px solid #bbbbbb;
	    margin-top: 20px;
	}

</style>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
	            <h3 class="content-header-title mb-0 d-inline-block">Solutions</h3>
	            <div class="row breadcrumbs-top d-inline-block">
	                <div class="breadcrumb-wrapper col-12">
		                <ol class="breadcrumb">
		                    <li class="breadcrumb-item"><a href="{{ route('auth.dashboard') }}">Home</a></li>
		                    <li class="breadcrumb-item"><a href="{{ route('auth.banner.index') }}">Edit Solutions</a></li>
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
				                <h4 class="card-title" id="horz-layout-colored-controls">Solutions</h4>
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
				                    	<div class="form-body">
				                    		<h4 class="form-section"><i class="fa fa-eye"></i> Edit Solutions</h4>
							                <div class="row">
							                    <div class="col-md-12">
						                        	<div class="form-group row">
							                        	<label class="col-md-3 label-control" for="userinput3">Title <span class="text-danger">*</span> :</label>
							                        	<div class="col-md-9">
							                            	<input class="form-control border-primary" type="text" placeholder="Job Title" id="userinput5" name="title" value="{{ $bannerData->title }}" required="">
						                        		</div>
						                       		</div>
						                       	</div>
					                        </div>
					                        <div class="row">
							                    <div class="col-md-12">
						                        	<div class="form-group row">
							                        	<label class="col-md-3 label-control" for="userinput3">Short Description <span class="text-danger">*</span> :</label>
							                        	<div class="col-md-9">
							                        	    <textarea class="form-control border-primary" name="short_description" required="">{{ $bannerData->short_description }}</textarea>
						                        		</div>
						                       		</div>
						                       	</div>
					                        </div>
					                        <div class="row">
							                    <div class="col-md-12">
						                        	<div class="form-group row">						
						        						<label class="col-md-3 label-control" for="userinput3">Image : </label>
							    						<div class="col-md-9">
									                        <input type="file" name="image" id="imageUpload" class="hide"> 
									                        <label for="imageUpload" class="upload-poster mr-5">Select file</label> Max Size 2 MB<br>
									                        @if($bannerData->image)
									                        <img src="{{ asset('uploads/banner/'.$bannerData->image) }}" id="imagePreview" class="organisation-logo" alt="Your image will appear here.">
									                        @else
									                        <img src="{{ asset('assets/admin/images/dummy-logo.jpg')}}" id="imagePreview" class="organisation-logo" alt="Your image will appear here.">
									                        @endif
									                    </div>
									                </div>
						    					</div>
						    				</div>
						    				<div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group" style="display: none;">
                                                        <button id="edit"></button>
                                                        <button id="save"></button>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput3"> Description <span class="text-danger">*</span> :</label>
                                                        <div class="col-md-9">      
                                                            <textarea class="ckeditor" name="description">{{ $bannerData->description }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group" style="display: none;">
                                                        <button id="edit"></button>
                                                        <button id="save"></button>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="userinput3"> Success Story <span class="text-danger">*</span> :</label>
                                                        <div class="col-md-9">      
                                                            <textarea class="ckeditor" name="success_story">{{ $bannerData->success_story }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
							                    <div class="col-md-12">
						                        	<div class="form-group row">
							                        	<label class="col-md-3 label-control" for="userinput3">Youtube Video Link <span class="text-danger">*</span> :</label>
							                        	<div class="col-md-9">
							                        	    <input class="form-control border-primary" type="text" placeholder="Video Link" id="userinput5" name="video" value="{{ $bannerData->video }}" required="">
						                        		</div>
						                       		</div>
						                       	</div>
					                        </div>
                                            <div class="row">
							                    <div class="col-md-12">
						                        	<div class="form-group row">
							                        	<label class="col-md-3 label-control" for="userinput3">Success Story <span class="text-danger">*</span> :</label>
							                        	<div class="col-md-9">
									                        <input type="file" name="attachment" id="file-2" class="inputfile" data-multiple-caption="{count} files selected" multiple>
									                        <label for="file-2" class="mr-5"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Select File</span></label><br><br>
									                        <a href="{{ asset('storage/app/banner/'.$bannerData->attachment) }}" target="_blank">View Attachment</a>
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
