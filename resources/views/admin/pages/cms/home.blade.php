@extends('admin.template.master') 

@section('title', $title)

@section('content')

@php

$id = '';
$content1 = '';
$content2 = '';
$content3 = '';
$image1 = '';
$image2 = '';
$image3 = '';
$attachment1 = '';
$attachment2 = '';
$attachment3 = '';
$attachment4 = '';
$attachment5 = '';
$attachment6 = '';

if(isset($homeData))
{
	$id = $homeData->id;
	$content1 = $homeData->content1;
	$content2 = $homeData->content2;
	$content3 = $homeData->content3;
    $image1 = $homeData->image1;
    $image2 = $homeData->image2;
    $image3 = $homeData->image3;
    $attachment1 = $homeData->attachment1;
    $attachment2 = $homeData->attachment2;
    $attachment3 = $homeData->attachment3;
    $attachment4 = $homeData->attachment4;
    $attachment5 = $homeData->attachment5;
    $attachment6 = $homeData->attachment6;
}

$userId= Auth::user()->id;

@endphp

<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Home Page</h3>
        <div class="row breadcrumbs-top d-inline-block">
          <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('auth.dashboard') }}">Home</a>
              </li>
              <li class="breadcrumb-item"><a href="{{ route('auth.home.edit') }}">Home Page</a>
              </li>
              <li class="breadcrumb-item active">Data
              </li>
            </ol>
          </div>
        </div>
      </div>
      {{-- <div class="content-header-right col-md-4 col-12">
        <div class="btn-group float-md-right">
          <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon-settings mr-1"></i>Action</button>
          <div class="dropdown-menu arrow"><a class="dropdown-item" href="#"><i class="fa fa-calendar mr-1"></i> Calender</a><a class="dropdown-item" href="#"><i class="fa fa-cart-plus mr-1"></i> Cart</a><a class="dropdown-item" href="#"><i class="fa fa-life-ring mr-1"></i> Support</a>
            <div class="dropdown-divider"></div><a class="dropdown-item" href="#"><i class="fa fa-cog mr-1"></i> Settings</a>
          </div>
        </div>
      </div> --}}
    </div>
    <div class="content-body">
      <!-- Basic form layout section start -->
      <section id="horizontal-form-layouts">
        <div class="row">
          <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title" id="horz-layout-colored-controls">Home Page</h4>
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
  <h4 class="form-section"><i class="fa fa-eye"></i> About Home Page</h4>
    <div class="container-fluid border py-2 mb-2">
        <h4 class="form-section">Section 1</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group" style="display: none;">
                    <button id="edit"></button>
                    <button id="save"></button>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="userinput3"> Content 1 <span class="text-danger">*</span> :</label>
                    <div class="col-md-9">      
                        <textarea class="summernote" name="content1">{{ $content1 }}</textarea>
                    </div>
                </div>
            </div>
        </div>  
    
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="userinput1">Image 1 : <span class="danger">*</span></label>
                    <div class="col-md-9">
                      <input type="file" name="image1" id="imageUpload" class="hide"> 
                      <label for="imageUpload" class="upload-poster mr-5">Select file</label> Max Size 2 mb<br>
                      @if(trim($image1))
                        <img src="{{ env('APP_URL')}}/storage/app/public/cms/{{ trim($image1) }}" id="imagePreview" style="width: 100%; height: 300px;">
                      @else
                        <img src="{{ asset('public/assets/admin/images/dummy-logo.jpg')}}" id="imagePreview" class="organisation-logo" alt="Your image will appear here.">
                      @endif
                  </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="userinput1">Attachment 1 : </label>
                    <div class="col-md-9">
                        <input type="file" name="attachment1" id="file-1" class="inputfile" data-multiple-caption="{count} files selected" multiple>
                        <label for="file-1" class="mr-5"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Select File</span></label> Max Size 100 kb
                        <br><br><a href="{{ env('APP_URL')}}/storage/app/public/attachment/{{ trim($attachment1) }}">View Document</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid border py-2 mb-2">
        <h4 class="form-section">Section 2</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group" style="display: none;">
                    <button id="edit"></button>
                    <button id="save"></button>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="userinput3"> Content 2 <span class="text-danger">*</span> :</label>
                    <div class="col-md-9">      
                        <textarea class="summernote" name="content2">{{ $content2 }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="userinput2">Image 2 : <span class="danger">*</span></label>
                    <div class="col-md-9">
                      <input type="file" name="image2" id="imageUpload1" class="hide"> 
                      <label for="imageUpload1" class="upload-poster mr-5">Select file</label> Max Size 2 mb<br>
                      @if(trim($image2))
                        <img src="{{ env('APP_URL')}}/storage/app/public/cms/{{ trim($image2) }}" id="imagePreview1" style="width: 100%; height: 300px;">
                      @else
                        <img src="{{ asset('public/assets/admin/images/dummy-logo.jpg')}}" id="imagePreview1" class="organisation-logo" alt="Your image will appear here.">
                      @endif
                  </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="userinput1">Attachment 2 : </label>
                    <div class="col-md-9">
                        <input type="file" name="attachment2" id="file-2" class="inputfile" data-multiple-caption="{count} files selected" multiple>
                        <label for="file-2" class="mr-5"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Select File</span></label> Max Size 100 kb
                        <br><br><a href="{{ env('APP_URL')}}/storage/app/public/attachment/{{ trim($attachment2) }}">View Document</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid border py-2 mb-2"> 
        <h4 class="form-section">Section 3</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group" style="display: none;">
                    <button id="edit"></button>
                    <button id="save"></button>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="userinput3"> Content 3 <span class="text-danger">*</span> :</label>
                    <div class="col-md-9">      
                        <textarea class="summernote" name="content3">{{ $content3 }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="userinput3">Image 3 : <span class="danger">*</span></label>
                    <div class="col-md-9">
                      <input type="file" name="image3" id="imageUpload2" class="hide"> 
                      <label for="imageUpload2" class="upload-poster mr-5">Select file</label> Max Size 2 mb<br>
                      @if(trim($image3))
                        <img src="{{ env('APP_URL')}}/storage/app/public/cms/{{ trim($image3) }}" id="imagePreview2" style="width: 100%; height: 300px;">
                      @else
                        <img src="{{ asset('public/assets/admin/images/dummy-logo.jpg')}}" id="imagePreview2" class="organisation-logo" alt="Your image will appear here.">
                      @endif
                  </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="userinput1">Attachment 3 : </label>
                    <div class="col-md-9">
                        <input type="file" name="attachment3" id="file-3" class="inputfile" data-multiple-caption="{count} files selected" multiple>
                        <label for="file-3" class="mr-5"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Select File</span></label> Max Size 100 kb
                        <br><br><a href="{{ env('APP_URL')}}/storage/app/public/attachment/{{ trim($attachment3) }}">View Document</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="userinput1">Attachment 4 : </label>
                    <div class="col-md-9">
                        <input type="file" name="attachment4" id="file-4" class="inputfile" data-multiple-caption="{count} files selected" multiple>
                        <label for="file-4" class="mr-5"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Select File</span></label> Max Size 100 kb
                        <br><br><a href="{{ env('APP_URL')}}/storage/app/public/attachment/{{ trim($attachment4) }}">View Document</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="userinput1">Attachment 5 : </label>
                    <div class="col-md-9">
                        <input type="file" name="attachment5" id="file-5" class="inputfile" data-multiple-caption="{count} files selected" multiple>
                        <label for="file-5" class="mr-5"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Select File</span></label> Max Size 100 kb
                        <br><br><a href="{{ env('APP_URL')}}/storage/app/public/attachment/{{ trim($attachment5) }}">View Document</a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-md-3 label-control" for="userinput1">Attachment 6 : </label>
                    <div class="col-md-9">
                        <input type="file" name="attachment6" id="file-6" class="inputfile" data-multiple-caption="{count} files selected" multiple>
                        <label for="file-6" class="mr-5"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Select File</span></label> Max Size 100 kb
                        <br><br><a href="{{ env('APP_URL')}}/storage/app/public/attachment/{{ trim($attachment6) }}">View Document</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

                                <div class="form-actions right">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-check-square-o"></i> Update
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

@endsection