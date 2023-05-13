@extends('admin.template.master') 
@section('title', $title)
@section('content')

@php

$pageTitle = old('_title'); $pageDescription = old('_description');
$pageURL = old('_url'); $category = isset($categoryd) ? $categoryd : old('_category');
$applyType = old('_apply_type'); 

$prop = ""; $method = '';

if(isset($scheme) && (isset($type) && $type == 'view')){
	$pageTitle = $scheme[0]->title; 
	$pageURL = $scheme[0]->scheme_url; 
	$pageDescription = $scheme[0]->description;
	$category = $scheme[0]->category;
	$applyType = $scheme[0]->allow_type;
	
	$prop = 'disabled'; 
}

if(isset($scheme) && (isset($type) && $type == 'edit')){
	$pageTitle = $scheme[0]->title; 
	$pageURL = $scheme[0]->scheme_url; 
	$pageDescription = $scheme[0]->description;
	$category = $scheme[0]->category;
	$applyType = $scheme[0]->allow_type;
	
	$method="PUT" ;
}

@endphp

<div id="page-wrapper">
	<div class="header"> 
        <h1 class="page-header">
            Add Banner <small>These are Banners.</small>
        </h1>
		<ol class="breadcrumb">
			<li><a href="{{ route('auth.dashboard') }}">Home</a></li>
			<li><a href="{{ route('auth.banner.create') }}">Add Banners </a></li>
			<li class="active">Data</li>
		</ol> 									
	</div>

	<div id="page-inner"> 
		<div class="row">
	        <div class="col-md-12">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                    Add Banners
	                </div>

                    <div class="panel-body">
						@include('admin.partials.flash_message') 					
						<form action="{{ $action }}" method="post" enctype="multipart/form-data">
						@csrf()
						@if(!empty($method)) @method($method) @endif

							<div class="form-group">
								<div class="row">
                                    <div class="col-md-3">
								        <label>Banner Title</label>
								    </div>
								    <div class="col-md-9">
								        <input type="text" class="form-control" name="title" value="{{ $pageTitle }}" {{ $prop }} maxlength="100" required >												
							        </div>
							    </div>
							</div>
									
							<div class="form-group">
								<div class="row">    						
		    						<div class="col-md-3">						
		        						<label>Banner Image</label>
		        					</div>
		    						<div class="col-md-9">
				                        <input type="file" name="image" id="imageUpload" class="hide" required> 
				                        <label for="imageUpload" class="upload-poster mr-5">Select file</label> Max Size 2 MB<br>
				                        <img src="{{ asset('public/assets/admin/images/dummy-logo.jpg')}}" id="imagePreview" class="organisation-logo" alt="Your image will appear here.">
				                    </div>
		    					</div>
		    				</div>
												
							<div class="form-group" style="margin-top: 20px;">						
								<input type="submit" class="btn btn-primary" value="Submit" name="btn_btn_add_product"  {{ $prop }}>
							</div>
					    </form>
				    </div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop

@section('javascript')

@endsection
