@extends('admin.template.master') 
@section('title', $title)
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
	            <h3 class="content-header-title mb-0 d-inline-block">Sub-Sections</h3>
	            <div class="row breadcrumbs-top d-inline-block">
	                <div class="breadcrumb-wrapper col-12">
		                <ol class="breadcrumb">
		                    <li class="breadcrumb-item"><a href="{{ route('auth.dashboard') }}">Home</a></li>
		                    <li class="breadcrumb-item"><a href="{{ route('auth.insightsubsection.create') }}">Add Sub-Sections</a></li>
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
				                <h4 class="card-title" id="horz-layout-colored-controls">Sub-Sections</h4>
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
				                    		<h4 class="form-section"><i class="fa fa-eye"></i> Add Sub-Sections</h4>
				                    		<div class="row">
							                    <div class="col-md-12">
						                        	<div class="form-group row">
							                        	<label class="col-md-3 label-control" for="userinput3">Sub-Section Title <span class="text-danger">*</span> :</label>
							                        	<div class="col-md-9">
							                            	<input class="form-control border-primary" type="text" placeholder="Sub-Section Title" id="userinput5" name="name" required="">
						                        		</div>
						                       		</div>
						                       	</div>
					                        </div>
							                <div class="row">
							                    <div class="col-md-12">
						                        	<div class="form-group row">
							                        	<label class="col-md-3 label-control" for="userinput3">Page <span class="text-danger">*</span> :</label>
							                        	<div class="col-md-9">
							                            	<select class="form-control" name="page_id" id="mainpage" required>
													        	<option>--Select--</option>		        							
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
							                        	<label class="col-md-3 label-control" for="userinput3">Section <span class="text-danger">*</span> :</label>
							                        	<div class="col-md-9">
							                            	<select class="form-control" name="section_id" id="mainsection" required>
													        	<option>--Select--</option>
													        	@if(count($section) > 0)
							        							
							        							@foreach($section as $k=>$c)
							        							
							        							<option value="{{ $c->id }}" data-parent="{{ $c->page_id }}" id="{{ $c->id }}">{{ $c->name }}</option>
							        							
							        							@endforeach
							        							
							        							@endif
													        </select>
						                        		</div>
						                       		</div>
						                       	</div>
					                        </div>
					                        <div class="row">
							                    <div class="col-md-12">
						                        	<div class="form-group row">
							                        	<label class="col-md-3 label-control" for="userinput3">Description <span class="text-danger">*</span> :</label>
							                        	<div class="col-md-9">
							                            	<input class="form-control border-primary" type="text" placeholder="Description" id="userinput5" name="description" required="">
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

<script type="text/javascript">
	jQuery("select#mainpage").on('change',function () {		
    	jQuery("select#mainsection").find('option').css('display', 'none');
    	var idclassurl = jQuery("select#mainpage :selected").attr('id')
		// jQuery(".urldataurl").val(idclassurl);
		jQuery("select#mainsection").find('option[data-parent="'+idclassurl+'"]').css('display', 'block');
		//alert (idclassurl);
	});

	jQuery("select#mainsection").on('change',function () {		
    	var idclassub = jQuery("select#mainsection :selected").attr('id')
		jQuery(".urldataurl").val(idclassub);
		// alert (idclassub);
	});
</script>
@endsection
