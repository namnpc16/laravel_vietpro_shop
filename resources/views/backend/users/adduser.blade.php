@extends('backend.master.master')

@section('title')
	Thêm thành viên
@endsection
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm Thành viên</h1>
        </div>
    </div>
    <!--/.row-->
<div class="row">
    <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><i class="fas fa-user"></i> Thêm thành viên</div>
                <div class="panel-body">
                    <div class="row justify-content-center" style="margin-bottom:40px">

                        <form action="{{ route('user.store') }}" method="post">
                            @csrf
                            <div class="col-md-8 col-lg-8 col-lg-offset-2">
                         
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control">
                                    @error('email')
                                        <small style="color: red; margin-left: 5px"> {{ $message }} </small>
                                    @enderror
                                    {{-- <div class="alert alert-danger" role="alert">
                                        <strong>email đã tồn tại!</strong>
                                    </div> --}}
                                </div>
                                <div class="form-group">
                                    <label>password</label>
                                    <input type="password" name="password" class="form-control">
                                    @error('password')
                                        <small style="color: red; margin-left: 5px"> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Full name</label>
                                    <input type="text" name="name" class="form-control">
                                    @error('name')
                                        <small style="color: red; margin-left: 5px"> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control">
                                    @error('address')
                                        <small style="color: red; margin-left: 5px"> {{ $message }} </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" class="form-control">
                                    @error('phone')
                                        <small style="color: red; margin-left: 5px"> {{ $message }} </small>
                                    @enderror
                                </div>
                              
                                <div class="form-group">
                                    <label>Level</label>
                                    <select name="level" class="form-control">
                                        <option value="1">admin</option>
                                        <option selected value="2">user</option>
                                    </select>
                                    @error('level')
                                        <small style="color: red; margin-left: 5px"> {{ $message }} </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-lg-8 col-lg-offset-2 text-right">
                                  
                                    <button class="btn btn-success"  type="submit">Thêm thành viên</button>
                                    <button class="btn btn-danger" type="reset">Huỷ bỏ</button>
                                </div>
                            </div>
                        </form>
                       

                    </div>
                
                    <div class="clearfix"></div>
                </div>
            </div>

    </div>
</div>

    <!--/.row-->
</div>
@endsection
