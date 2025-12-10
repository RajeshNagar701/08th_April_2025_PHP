@extends('admin.layout.structure')

@section('content')


<!--  Main wrapper -->
<div class="body-wrapper">


	<div class="body-wrapper-inner">
		<div class="container-fluid">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title fw-semibold mb-4">Categories</h5>
					<p class="mb-0">Manage Categories </p>
					@if(session('delete'))
					<h3 style="color:green" class="float-end m-3">{{session('delete')}} is Deleted success</h3>
					@endif
					<table class="table table-striped">
						<thead>
							<tr>
								<th>#ID</th>
								<th>Categories Name</th>
								<th>Categories Image</th>
								<th class="text-center">Action</th>
							</tr>
						</thead>
						<tbody>

							@foreach($category as $d)
							<tr>
								<td>{{$d->id}}</td>
								<td>{{$d->cate_name}}</td>
								<td><img src="<?php echo url('upload/categoriesy/'.$d->cate_img)?>" width="50px"> </td>

								<td class="text-center">
									<a href="#" class="btn btn-primary">Edit</a>
									<a href="/manage_categories/{{$d->id}}" class="btn btn-danger">Delete</a>
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