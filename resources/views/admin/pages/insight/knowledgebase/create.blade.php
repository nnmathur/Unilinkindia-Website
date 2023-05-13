@extends('admin.template.master') 
@section('title', $title)
@section('content')

<style type="text/css">
	.note-editable{
		height: 400px;
	}

	.js .inputfile {
	    width: 0.1px;
	    height: 0.1px;
	    opacity: 0;
	    overflow: hidden;
	    position: absolute;
	    z-index: -1;
	}

	.inputfile + label {
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
</style>

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
	            <h3 class="content-header-title mb-0 d-inline-block">Knowledge Bases</h3>
	            <div class="row breadcrumbs-top d-inline-block">
	                <div class="breadcrumb-wrapper col-12">
		                <ol class="breadcrumb">
		                    <li class="breadcrumb-item"><a href="{{ route('auth.dashboard') }}">Home</a></li>
		                    <li class="breadcrumb-item"><a href="{{ route('auth.insightknowledge.create') }}">Add Knowledge Bases</a></li>
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
				                <h4 class="card-title" id="horz-layout-colored-controls">Knowledge Bases</h4>
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
				                    		<h4 class="form-section"><i class="fa fa-eye"></i> Add Knowledge Bases</h4>
				                    		<div class="row">
							                    <div class="col-md-12">
						                        	<div class="form-group row">
							                        	<label class="col-md-3 label-control" for="userinput3">Knowledge Base Title <span class="text-danger">*</span> :</label>
							                        	<div class="col-md-9">
							                            	<input class="form-control border-primary" type="text" placeholder="Knowledge Base Title" id="userinput5" name="name" required="">
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
							                            	<select class="form-control" name="section" id="mainsection" required>
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
							                        	<label class="col-md-3 label-control" for="userinput3">Sub-Section <span class="text-danger">*</span> :</label>
							                        	<div class="col-md-9">
							                            	<select class="form-control" name="sub_section" id="mainsub" required>
													        	<option>--Select--</option>
													        	@if(count($sub_section) > 0)
							        							
							        							@foreach($sub_section as $k=>$c)
							        							
							        							<option value="{{ $c->id }}" data-parent="{{ $c->section_id }}" id="{{ $c->id }}">{{ $c->name }}</option>
							        							
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
							                            	<textarea name="description" rows="3" class="form-control border-primary" required=""></textarea>
						                        		</div>
						                       		</div>
						                       	</div>
					                        </div>
					                        <div class="row">
							                    <div class="col-md-12">
						                        	<div class="form-group row">
							                        	<label class="col-md-3 label-control" for="userinput3">Attach Document <span class="text-danger">*</span> :</label>
							                        	<div class="col-md-9">
									                        <input type="file" name="attachment" id="file-2" class="inputfile" data-multiple-caption="{count} files selected" accept=".pdf,.doc,.docx" required multiple>
									                        <label for="file-2" class="mr-5"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Select File</span></label>
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
	    jQuery("select#mainsub").find('option').css('display', 'none');	
    	var idclassection = jQuery("select#mainsection :selected").attr('id')
		//jQuery(".urldataurl").val(idclassection);
		jQuery("select#mainsub").find('option[data-parent="'+idclassection+'"]').css('display', 'block');
		// alert (idclassection);
	});

	jQuery("select#mainsub").on('change',function () {		
    	var idclassub = jQuery("select#mainsub :selected").attr('id')
		jQuery(".urldataurl").val(idclassub);
		// alert (idclassub);
	});
</script>
@endsection
