@extends('admin.layout.structure')

@section('content')


<!--  Main wrapper -->
<div class="body-wrapper">


	<div class="body-wrapper-inner">
		<div class="container-fluid">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title fw-semibold mb-4">Sevice</h5>
					<p class="mb-0">Manage Sevice </p>
					@if(session('delete'))
					<h3 style="color:green" class="float-end m-3">{{session('delete')}} is Deleted success</h3>
					@endif
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#ID</th>
								<th>Categoriesid</th>
								<th>Sevice Name</th>
								<th>Description</th>
								<th>Main Price</th>
								<th>Dis price</th>
								<th>Image</th>
								<th>status</th>
								<th>Created_at</th>
								<th>Updated_at</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($service as $d)
							<tr>
								<td>{{$d->id}}</td>
								<td>{{$d->cate_name}}</td>
								<td>{{$d->ser_name}}</td>
								<td>{{$d->ser_description}}</td>
								<td>{{$d->main_price}}</td>
								<td>{{$d->dis_price}}</td>
								<td><img src="<?php echo url('upload/services/'.$d->ser_img)?>" width="50px"> </td>

								<td>{{$d->status}}</td>
								<td>{{$d->created_at}}</td>
								<td>{{$d->updated_at}}</td>

								<td class="text-center">
									<a href="#" class="btn btn-primary">Edit</a>
									<a href="/manage_services/{{$d->id}}" class="btn btn-danger">Delete</a>
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