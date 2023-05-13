@extends('admin.template.master') 

@section('title', $title)

@section('content')

@php

$id = '';
$name = '';
$content = '';

if(isset($userData))
{
	$id = $userData->id;
	$name = $userData->name;
  $content = $userData->content;  
}

$userId= Auth::user()->id;

@endphp

<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Pages</h3>
        <div class="row breadcrumbs-top d-inline-block">
          <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('auth.dashboard') }}">Home</a>
              </li>
              <li class="breadcrumb-item"><a href="{{ route('auth.content.index') }}">Pages</a>
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
                        <h4 class="card-title" id="horz-layout-colored-controls">Pages</h4>
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
  <h4 class="form-section"><i class="fa fa-eye"></i> About services</h4>
  <div class="row">
    <div class="col-md-12">
            <div class="form-group row">
              <label class="col-md-3 label-control" for="userinput1">Name : <span class="danger">*</span></label>
              <div class="col-md-9">
                  <input type="text" id="userinput1" class="form-control border-primary" placeholder="Name" name="name" value="{{ $name }}" required="">
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
                <label class="col-md-3 label-control" for="userinput3"> Content <span class="text-danger">*</span> :</label>
                <div class="col-md-9">      
                    <textarea class="summernote" name="content">{{ $content }}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>

                                <div class="form-actions right">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-check-square-o"></i> Save
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