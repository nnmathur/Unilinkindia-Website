@extends('admin.template.master') 
@section('title', $title)
@section('content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-8 col-12 mb-2 breadcrumb-new">
	            <h3 class="content-header-title mb-0 d-inline-block">Knowledge Bases</h3>
	            <div class="row breadcrumbs-top d-inline-block">
	                <div class="breadcrumb-wrapper col-12">
		                <ol class="breadcrumb">
		                    <li class="breadcrumb-item"><a href="{{ route('auth.dashboard') }}">Home</a>
		                    <li class="breadcrumb-item"><a href="{{ route('auth.insightknowledge.index') }}">List Knowledge Bases</a></li>
		                    <li class="breadcrumb-item active">Data</li>
		                </ol>
	                </div>
	            </div>
            </div>
        </div>
        <div class="content-body">
          <!-- HTML5 export buttons table -->
	        <section id="html5">
		      	<div class="row">
		      		<div class="col-12">
		      			<div class="card">
		      				<div class="card-header">
		      					<h4 class="card-title">Knowledge Bases</h4>
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
		      									<th class="column-title">S.no</th>							
												<th class="column-title">Title</th>	
										        <th class="column-title">Publish On</th>
												<th class="column-titlest">Action</th>
		      								</tr>
		      							</thead>
		      							<tbody>
		      								@foreach($content as $k=>$u)
											<tr>
												<td>{{ ++$k }}</td>
												<td>{{ $u->name }}</td>
												<td>{{ Carbon\Carbon::parse($u->created_at)->format('d-M-Y') }}</td>
												<td style="display: flex; border-bottom: none;">
													<a href="{{ route('auth.insightknowledge.edit', $u->id) }}" onclick="return confirm('Are you sure to Edit this file ?');" data-toggle="tooltip" data-placement="top" title="Edit">
														<button class="btn btn-primary" style="margin: auto 5px;"><i class="fa fa-edit"></i></button>
													</a>
													<form action="{{ route('deleteknowledge', $u->id) }}" method="POST">
											            {{ csrf_field() }} 
											            <a onclick="return confirm('Are you sure to Delete this file ?');" data-toggle="tooltip" data-placement="top" title="Delete">
											                <button type="submit" class="btn btn-danger" name="knowledgeStatus" value="10"><i class="fa fa-trash"></i></button>
											            </a>
											        </form>	 			
												</td>
											</tr>
											@endforeach   								
		      							</tbody>
		      							<tfoot>
		      								<tr>
		      									<th class="column-title">S.no</th>							
												<th class="column-title">Title</th>	
										        <th class="column-title">Publish On</th>
												<th class="column-titlest">Action</th>
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
