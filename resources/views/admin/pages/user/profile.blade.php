@extends('admin.template.master') 
@section('title', $title)
@section('content')

@foreach($users as $k=>$u)

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
                  <div class="form-body">
                    <div class="row">
                      <div class="col-md-6 text-center">
                        <img src="{{ asset('storage/app/public/users/'.$u->image) }}" class="user-profilepic" style="width: 250px;">
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="userinput1">Name</label>
                          <div class="col-md-9">
                            <input type="text" id="userinput1" class="form-control border-primary" placeholder="Name" name="name" value="{{ $u->name }}" required="">
                            </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="userinput3">Enrollment Id</label>
                          <div class="col-md-9">
                            <input type="text" id="userinput3" class="form-control border-primary" placeholder="Enrollment Id" name="user_id" value="{{ $u->user_id }}" required="">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control" for="userinput5">Email</label>
                          <div class="col-md-9">
                            <input class="form-control border-primary" type="email" placeholder="Email" id="userinput5" name="email" value="{{ $u->email }}" required="">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-md-3 label-control">Contact Number</label>
                          <div class="col-md-9">
                            <input class="form-control border-primary" type="tel" placeholder="Contact Number" id="userinput7" name="contact" value="{{ $u->contact }}" required="">
                          </div>
                        </div>
                        <div class="form-actions right">
                          <a href="{{ route('auth.users.edit', $u->id) }}" onclick="return confirm('Are you sure to Edit the Profile ?');" data-toggle="tooltip" data-placement="top" title="Edit">
                            <button type="submit" class="btn btn-primary">
                              <i class="fa fa-check-square-o"></i> Edit
                            </button>
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
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

@endforeach

@stop

@section('javascript')

@endsection