@extends('backend.master.master')

@section('title')
	Trang quản lý thành viên
@endsection
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li class="active">Danh sách thành viên</li>
		</ol>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Danh sách thành viên</h1>
		</div>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-xs-12 col-md-12 col-lg-12">

			<div class="panel panel-primary">

				<div class="panel-body">
					<div class="bootstrap-table">
						<div class="table-responsive">
							@if (session('success'))
								<div class="alert bg-success" role="alert">
									<svg class="glyph stroked checkmark">
										<use xlink:href="#stroked-checkmark"></use>
									</svg>{{ session('success') }}<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
								</div>
							@endif
							<a href="{{ route('user.create') }}" class="btn btn-primary">Thêm Thành viên</a>
							<div class="form-search">
								<label for="">Tìm kiếm: </label>
								<form action="" method="post">
									@csrf
									<input type="text" name="search" value="{{ old('search') }}" id="search">
								</form>
							</div>
							<table class="table table-bordered" style="margin-top:20px;">

								<thead>
									<tr class="bg-primary">
										<th>ID</th>
										<th>Email</th>
										<th>Full</th>
										<th>Address</th>
										<th>Phone</th>
										<th>Level</th>
										<th width='18%'>Tùy chọn</th>
									</tr>
								</thead>

								<tbody id="searchTbody">

								</tbody>

								<tbody id="tbody">
									@php
										$i = 1;
									@endphp
											
									@foreach ($users as $user)
										<tr>
											<td>{{ $user->id }}</td>
											<td>{{ $user->email }}</td>
											<td>{{ $user->name }}</td>
											<td>{{ $user->address }}</td>
											<td>{{ $user->phone }}</td>
											<td>@if ($user->level == 1)
												{{ 'admin' }}
											@else
												{{ 'user' }}
											@endif</td>
											<td>
												<a href="{{ route('user.edit', ["id" => $user->id]) }}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a href="{{ route('user.del', ["id" => $user->id]) }}" class="btn btn-danger deleteUser" data-id="{{ $user->id }}"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
									@endforeach
							
								</tbody>
							</table>
							<div align='right'>
								{{ $users->links() }}
							</div>
						</div>
						<div class="clearfix"></div>
					</div>

				</div>
			</div>
			<!--/.row-->


		</div>
@endsection
@push('scripts')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

	<script>
		
		$(document).ready(function () {

			// search ajax
			$('#search').keyup(function () {
				let search = $(this).val();

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
					},
				});

				$.ajax({
					method: 'POST',
					url: '{{ route("ajax") }}',
					data: {
						search: search,
					},
					success: function (data) {
						let output = '';
						
						$('#tbody').html('')
						$.each(data, function (index, value) {
							let id = value.id;
							output = `<tr>
											<td>${value.id}</td>
											<td>${value.email}</td>
											<td>${value.name}</td>
											<td>${value.address}</td>
											<td>${value.phone}</td>
											<td>${value.level == 1 ? 'admin' : 'user'}</td>
											<td>
												<a href="{{ URL::to('/admin/users/edit') }}` + '/' + value.id + `" class="btn btn-warning edit"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a href="{{ URL::to('/admin/users/del') }}` + '/' + value.id + `" class="btn btn-danger deleteUser" data-id="${value.id}"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>`;
								$('#tbody').append(output);
						})
						console.log(data)
					},
					dataType: 'json',
				});
			});

			// delete ajax
			$('.deleteUser').on('click', function (e) {
				e.preventDefault()
				let id = $(this).data('id')

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				})
				
				$.ajax({
					type: 'POST',
					url: '{{ route("delete.user") }}',
					data: {
						id: id
					},
					success: function (result) {
						location.reload()
					},
					dataType: 'json',
				})
			})
			
			
		});
	</script>
@endpush
