@extends('admin.template.master') 

@section('title', $title)

@section('content')


<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Services</h3>
            <div class="row breadcrumbs-top d-inline-block">
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('auth.dashboard') }}">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="{{ route('auth.services.index') }}">Services List</a>
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
          <!-- HTML5 export buttons table -->
	      <section id="html5">
	      	<div class="row">
	      		<div class="col-12">
	      			<div class="card">
	      				<div class="card-header">
	      					<h4 class="card-title">Services List</h4>
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
	      				<div class="card-content collapse show">
	      					<div class="card-body card-dashboard">
	      						@include('admin.partials.flash_message') 
	      						<table class="table table-striped table-bordered dataex-html5-export">
	      							<thead>
	      								<tr>
	      									<th>S.No</th>
	      									<th>Title</th>
	      									<th>Image</th>
	      									<th>Description</th>
	      									<th>Created On</th>
	      									<th>Action</th>
	      								</tr>
	      							</thead>
	      							<tbody>
	      								@if(count($services) > 0)
		      								@foreach($services as $k=>$u)

											<tr>
												<td>{{ ++$k }}</td>
												<td>{{ $u->title }}</td>
												<td>
												    @if(!empty($u->image))
												        <img src="{{ asset('uploads/services/'.$u->image) }}" style="width: 100px;">
												    @else
												        <img src="{{ asset('public/assets/admin/images/dummy-logo.jpg')}}" style="width: 100px;">
												    @endif
												</td>
												<td>{{ $u->short_description }}</td>
												<td>{{ Carbon\Carbon::parse($u->created_at)->format('d-M-Y H:i:s') }}</td>
	<td style="display: flex; border-bottom: none;">
		<a href="{{ route('auth.services.edit', $u->slug) }}" onclick="return confirm('Are you sure to Edit this Service ?');" data-toggle="tooltip" data-placement="top" title="Edit">
			<button type="button" class="btn btn-primary"><i class="fa fa-pencil"></i></button>
		</a>&nbsp;

        <a href="{{ route('auth.services.delete', $u->id) }}" onclick="return confirm('Are you sure to Delete this Service ?');" data-toggle="tooltip" data-placement="top" title="Delete">
        	<button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
        </a> 
	    </a>			
	</td>

											</tr>

											@endforeach	
										@else
										    <tr>
										        <td colspan="6">No Data Found</td>
										    </tr>
										@endif      								
	      							</tbody>
	      							<tfoot>
	      								<tr>
	      									<th>S.No</th>
	      									<th>Title</th>
	      									<th>Icon</th>
	      									<th>Description</th>
	      									<th>Created On</th>
	      									<th>Action</th>
	      								</tr>
	      							</tfoot>
	      						</table>				
	      					</div>
	      				</div>
	      			</div>
	      		</div>
	      	</div>
	      </section>
          <!--/ HTML5 export buttons table -->
        </div>
      </div>
    </div>

@endsection

