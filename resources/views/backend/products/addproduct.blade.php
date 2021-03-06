@extends('backend.master.master')

@section('title')
	Thêm sản phẩm
@endsection
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm sản phẩm</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-xs-6 col-md-12 col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">Thêm sản phẩm</div>
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="panel-body">
                        <div class="row" style="margin-bottom:40px">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Danh mục</label>
                                    <select name="category_id" class="form-control">
                                        {{ GetCategory($categories, 0, "") }}
                                    </select>
                                    {!! showError($errors, 'category_id') !!}
                                </div>
                                <div class="form-group">
                                    <label>Mã sản phẩm</label>
                                    <input type="text" name="code" value="{{ old('code') }}" class="form-control">
                                    {!! showError($errors, 'code') !!}
                                </div>
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                                    {!! showError($errors, 'name') !!}
                                </div>
                                <div class="form-group">
                                    <label>Giá sản phẩm (Giá chung)</label>
                                    <input type="number" name="price" value="{{ old('price') }}" class="form-control">
                                    {!! showError($errors, 'price') !!}
                                </div>
                                <div class="form-group">
                                    <label>Sản phẩm có nổi bật</label>
                                    <select name="featured" class="form-control">
                                        <option value="1">Có</option>
                                        <option value="0">Không</option>
                                    </select>
                                    {!! showError($errors, 'featured') !!}
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="state" class="form-control">
                                        <option value="1">Còn hàng</option>
                                        <option value="0">Hết hàng</option>
                                    </select>
                                    {!! showError($errors, 'state') !!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Ảnh sản phẩm</label>
                                    {!! showError($errors, 'img') !!}
                                    <input id="img" type="file" name="img" value="{{ old('img') }}" class="form-control hidden"
                                        onchange="changeImg(this)">
                                    <img id="avatar" class="thumbnail" width="100%" height="350px" src="img/import-img.png">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Thông tin</label>
                                    <textarea name="info" style="width: 100%;height: 100px;">{{ old('info') }}</textarea>
                                    {!! showError($errors, 'info') !!}
                                </div>
                                </div>
                        </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Miêu tả</label>
                                        <textarea id="editor" name="description" style="width: 100%;height: 100px;">{{ old('description') }}</textarea>
                                        {!! showError($errors, 'description') !!}
                                    </div>
                                    <button class="btn btn-success" type="submit">Thêm sản phẩm</button>
                                    <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                                </div>
                            </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
                </div>

        </div>
    </div>

    <!--/.row-->
</div>
@endsection
