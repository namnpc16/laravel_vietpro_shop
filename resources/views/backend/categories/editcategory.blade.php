@extends('backend.master.master')

@section('title')
	Sửa danh mục
@endsection
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home">
						<use xlink:href="#stroked-home"></use>
					</svg></a></li>
			<li class="active">Icons</li>
		</ol>
	</div>
	<!--/.row-->

	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Quản lý danh mục</h1>
		</div>
	</div>
	<!--/.row-->


	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<form action="{{ route('category.save', ["id" => $cates['id']]) }}" method="post">
							@csrf
							<div class="col-md-5">
								<div class="form-group">
									<label for="">Danh mục cha:</label>
									<select class="form-control" name="parent" >
										<option value="0">----ROOT----</option>
											<?php 
												function GetCategoryEdit($mang, $parent, $shift, $id_select)
												{
													foreach ($mang as $key => $category) {
														if ($category['parent'] == $parent) {
											?>
															<option <?php if($id_select['id'] == $category['id']){ echo "disabled style='color: red'"; } ?>   <?php if($id_select['parent'] == $category['id']){ echo "selected"; } ?> value="{{ $category['id'] }}">{{ $shift.$category['name'] }}</option>';
											<?php
															GetCategoryEdit($mang, $category['id'], $shift." - - | ", $id_select);
														}
													}
												}
												GetCategoryEdit($categories, 0, "", $cates);
											?>
									</select>
								</div>
								<div class="form-group">
									<label for="">Tên Danh mục</label>
									<input type="text" class="form-control" name="name"  placeholder="Tên danh mục mới" value="{{ $cates['name'] }}">
									{{-- <div class="alert bg-danger" role="alert">
										<svg class="glyph stroked cancel">
											<use xlink:href="#stroked-cancel"></use>
										</svg>Tên danh mục đã tồn tại!<a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
									</div> --}}
								</div>
								<button type="submit" class="btn btn-primary">Sửa danh mục</button>
							</div>
						</form>
						<div class="col-md-7">
							{{-- <div class="alert bg-success" role="alert">
								<svg class="glyph stroked checkmark">
									<use xlink:href="#stroked-checkmark"></use>
								</svg> Đã sửa danh mục thành công! <a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
							</div> --}}
							<h3 style="margin: 0;"><strong>Phân cấp Menu</strong></h3>
							<div class="vertical-menu">
								<div class="item-menu active">Danh mục </div>
								<?php
									function showCategory($mang, $parent, $shift, $id_select){
										// echo 'số lần lặp '. count($mang)."<br>";
										foreach ($mang as $key => $category) {
											if ($category['parent'] == $parent) {
								?>
												<div class="item-menu <?php if($id_select['id'] == $category['id']){ echo "active";} ?>"><span>{{ $shift.$category['name'] }} </span>
													<div class="category-fix">
														{{-- <a class="btn-category btn-primary" href="{{ route('category.edit', ["id" => $category["id"]]) }}"><i class="fa fa-edit"></i></a> --}}
														<a class="btn-category btn-danger" onclick="return confirm('Bạn có muốn xóa danh mục ?')" href="{{ route('category.del', ["id" => $category["id"]]) }}"><i class="fas fa-times"></i></i></a>
													</div>
												</div>
								<?php
												unset($mang[$key]);
												showCategory($mang, $category['id'], $shift." - - | ", $id_select);	
											}
										}
									}
									showCategory($categories, 0, "", $cates);
								?>
							</div>
						</div>
					</div>
				</div>
			</div>



		</div>
		<!--/.col-->


	</div>
	<!--/.row-->
</div>
@endsection
