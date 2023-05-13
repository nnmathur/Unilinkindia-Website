@extends('admin.template.master') 

@section('title', $title)

@section('content')



@php


$uid = '';
$uname = '';
$uuser_id = '';
$ucontact = '';
$uemail = '';
$uimage = '';

if(isset($userData))
{
	$uid = $userData->id;
	$uname = $userData->name;
	$uuser_id = $userData->user_id; 
    $ucontact = $userData->contact;
    $uemail = $userData->email;
    $uimage = $userData->image;
}



$userId= Auth::user()->id;

@endphp



<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
        <h3 class="content-header-title mb-0 d-inline-block">Profile</h3>
        <div class="row breadcrumbs-top d-inline-block">
          <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('auth.dashboard') }}">Home</a>
              </li>
              <li class="breadcrumb-item"><a href="{{ route('auth.users.profile') }}">Profile</a>
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
                        <h4 class="card-title" id="horz-layout-colored-controls">Profile</h4>
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
                                <h4 class="form-section"><i class="fa fa-eye"></i> About User</h4>
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group row">
                                        <label class="col-md-3 label-control" for="userinput1">Name</label>
                                        <div class="col-md-9">
                                            <input type="text" id="userinput1" class="form-control border-primary" placeholder="Name" name="name" value="{{ trim($uname) }}" required="">
                                          </div>
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group row">
                                        <label class="col-md-3 label-control" for="userinput3">Enrollment Id</label>
                                        <div class="col-md-9">
                                            <input type="text" id="userinput3" class="form-control border-primary" placeholder="Enrollment Id" name="user_id" value="{{ trim($uuser_id) }}" readonly="">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group row">
                                        <label class="col-md-3 label-control" for="userinput5">Email</label>
                                        <div class="col-md-9">
                              <input class="form-control border-primary" type="email" placeholder="Email" id="userinput5" name="email" value="{{ trim($uemail) }}" readonly="">
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-md-6">  
                          <div class="form-group row">
                                        <label class="col-md-3 label-control">Contact Number</label>
                                        <div class="col-md-9">
                              <input class="form-control border-primary" type="tel" placeholder="Contact Number" id="userinput7" name="contact" value="{{ trim($ucontact) }}" required="">
                            </div>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
			                        	<div class="form-group row">						
			        						<label class="col-md-3 label-control" for="userinput3">Image : </label>
				    						<div class="col-md-9">
						                        <input type="file" name="image" id="imageUpload" class="hide"> 
						                        <label for="imageUpload" class="upload-poster mr-5">Select file</label> Max Size 2 MB<br>
						                        @if(!empty($uimage))
						                            <img src="{{ asset('storage/app/public/profile/'.$uimage) }}" id="imagePreview" class="organisation-logo" alt="Your image will appear here.">
						                        @else
						                            <img src="{{ asset('public/assets/admin/images/dummy-logo.jpg')}}" id="imagePreview" class="organisation-logo" alt="Your image will appear here.">
						                        @endif
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

@stop



@section('javascript')



@endsection

