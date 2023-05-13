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





    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Users</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('auth.dashboard') }}">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="{{ route('auth.users.create') }}">Add User</a>
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
				                <h4 class="card-title" id="horz-layout-colored-controls">Users</h4>
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
							                            	<input type="text" id="userinput1" class="form-control border-primary" placeholder="Name" name="name" required="">
							                            </div>
							                        </div>
							                    </div>
							                    <?php 
                                                    $last_user = DB::table('users')->orderBy('created_at', 'desc')->first();
										            $new_user = ($last_user->id + 1);
										            $user_id = ('CLNT000'.$new_user);
							                    ?>
							                    <div class="col-md-6">
						                        	<div class="form-group row">
							                        	<label class="col-md-3 label-control" for="userinput3">User Id</label>
							                        	<div class="col-md-9">
							                            	<input type="text" id="userinput3" class="form-control border-primary" value="{{ $user_id }}" disabled="">
						                        		</div>
						                       		</div>
						                       	</div>
					                        </div>
					                        <div class="row">
					                        	<div class="col-md-6">
					                        		<div class="form-group row">
							                        	<label class="col-md-3 label-control" for="userinput5">Email</label>
							                        	<div class="col-md-9">
															<input class="form-control border-primary" type="email" placeholder="Email" id="userinput5" name="email" required="">
							                        	</div>
								                    </div>
					                        	</div>
						                       	<div class="col-md-6">	
													<div class="form-group row">
							                        	<label class="col-md-3 label-control">Contact Number</label>
							                        	<div class="col-md-9">
															<input class="form-control border-primary" type="tel" placeholder="Contact Number" id="userinput7" name="contact" required="">
														</div>
							                        </div>
						                       	</div>
					                        </div>

					                        <h4 class="form-section"><i class="ft-mail"></i> Security Info</h4>

					                        <div class="row">
					                        	<div class="col-md-6">
					                        		<div class="form-group row">
							                        	<label class="col-md-3 label-control">User Type</label>
							                        	<div class="col-md-9">
															<select class="form-control border-primary" name="user_type" required="">
																<option value="1" selected="">Admin</option>
																<option value="2">User</option>
															</select>
														</div>
							                        </div>
					                        		<div class="form-group row">
							                        	<label class="col-md-3 label-control" for="userinput5">Password</label>
							                        	<div class="col-md-9">
															<input type="password" name="password" id="password" placeholder="Password" class="form-control border-primary" required="">
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

<script>
        var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

      function validatePassword(){
        if(password.value != confirm_password.value) {
          confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
          confirm_password.setCustomValidity('');
        }
      }

      password.onchange = validatePassword;
      confirm_password.onkeyup = validatePassword;
      </script>
	
@endsection

