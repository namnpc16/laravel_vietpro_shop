@extends('frontend.master.master')
@section('title')
	shop
@endsection
@section('content')
<div class="colorlib-shop">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-md-push-3">
				<div class="row row-pb-lg">
					@foreach($products as $product)
						<div class="col-md-4 text-center">
							<div class="product-entry">
								<div class="product-img" style="background-image: url('../img/{{$product->img}}');">

									<div class="cart">
										<p>
										<span class="addtocart"><a href="cart.html"><i
														class="icon-shopping-cart"></i></a></span>
											<span><a href="{{route('product.detail', ['slug' => $product->slug])}}"><i class="icon-eye"></i></a></span>
										</p>
									</div>
								</div>
								<div class="desc">
									<h3><a href="{{route('product.detail', ['slug' => $product->slug])}}">{{$product->name}}</a></h3>
									<p class="price"><span>{{number_format($product->price,0, ',', '.')}} đ</span></p>
								</div>
							</div>
						</div>
					@endforeach


				</div>
				<div class="row">
					<div class="col-md-12">
						<ul class="pagination">

							{{$products->links()}}
						</ul>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-md-pull-9">
				<div class="sidebar">
					<div class="side">
						<h2>Danh mục</h2>
						<div class="fancy-collapse-panel">
							<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

								@foreach($categories as $item)
									@if($item->parent_id == 0)
										<div class="panel panel-default">
											<div class="panel-heading" role="tab" id="headingOne">
												<h4 class="panel-title">
													<a data-toggle="collapse" data-parent="#accordion" href="#menu{{$item->id}}"
													   aria-expanded="true" aria-controls="collapseOne">{{$item->name}}
													</a>
												</h4>
											</div>
											<div id="menu{{$item->id}}" class="panel-collapse collapse" role="tabpanel"
												 aria-labelledby="headingOne">
												<div class="panel-body">
													<ul>

														@foreach($categories as $category)
															@if($category->parent_id == $item->id)
																<li><a href="#">{{$category->name}}</a></li>
															@endif
														@endforeach
													</ul>
												</div>
											</div>
										</div>
									@endif
								@endforeach
							</div>
						</div>
					</div>
					<div class="side">
						<h2>Khoảng giá</h2>
						<form method="post" action="{{route('product.range')}}" class="colorlib-form-2">
							@csrf
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="guests">Từ:</label>
										<div class="form-field">
											<i class="icon icon-arrow-down3"></i>
											<select name="start" id="people" class="form-control">
												@foreach(__('price_range.min') as $min)
													<option value="{{$min}}" {{old('start') == $min ? 'selected' : ''}}>{{number_format($min, 0, ',', '.')}} VNĐ</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="guests">Đến:</label>
										<div class="form-field">
											<i class="icon icon-arrow-down3"></i>
											<select name="end" id="people" class="form-control">
												@foreach(__('price_range.max') as $max)
													<option value="{{$max}}" {{old('end') == $max ? 'selected' : ''}}>{{number_format($max, 0, ',', '.')}} VNĐ</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
							</div>
							<button type="submit" style="width: 100%;border: none;height: 40px;">Tìm
								kiếm</button>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
