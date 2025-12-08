@extends('admin.layout.structure')

@section('content')


<!--  Main wrapper -->
<div class="body-wrapper">


	<div class="body-wrapper-inner">
		<div class="container-fluid">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title fw-semibold mb-4">Cutsomer</h5>
					<p class="mb-0">Manage Cutsomer </p>
					@if(session('delete'))
					<h3 style="color:green" class="float-end m-3">{{session('delete')}} is Deleted success</h3>
					@endif
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#ID</th>
								<th>Name</th>
								<th>Email</th>
								<th>gender</th>
								<th>hobby</th>
								<th>Image</th>
								<th>Mobile</th>
							
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>


							@foreach($customer as $d)
							<tr>
								<td>{{$d->id}}</td>
								<td>{{$d->name}}</td>
								<td>{{$d->email}}</td>
								<td>{{$d->gender}}</td>
								<td>{{$d->hobby}}</td>
								<td><img src="<?php echo url('upload/customers/'.$d->image)?>" width="50px"> </td>
								<td>{{$d->mobile}}</td>
								
								<td class="text-center">
									<a href="#" class="btn btn-primary">Edit</a>
									<a href="/manage_customers/{{$d->id}}" class="btn btn-danger">Delete</a>
									<a href="/status_customers/{{$d->id}}" class="btn btn-warning">
										{{$d->status}}
									</a>
								</td>
							</tr>
							@endforeach

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</div>


@endsection