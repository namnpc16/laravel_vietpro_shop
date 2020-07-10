<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<base href="{{ asset('') }}public/backend/">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	
	<link href="css/styles.css" rel="stylesheet">
</head>

<body>

	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form role="form" action="" method="POST">
						@csrf
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="E-mail" value="{{ old('email') }}" name="email" type="text" autofocus="">
								{{-- @if ($errors->has('email'))
									<small style="color: red; margin-left: 5px">{{ $errors->first('email') }}</small>
								@endif --}}
								{!! showError($errors, 'email') !!}
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" value="{{ old('password') }}" name="password" type="password" value="">
								{!! showError($errors, 'password') !!}
								@if (session('thong_bao'))
									<small style="color: red; margin-left: 5px">{{ session('thong_bao') }}</small>
								@endif
							</div>
							
							{{-- @if ($errors->any())
								<div class="alert alert-danger">
									@foreach ($errors->all() as $error)
										<small>- {{ $error }}</small>
									@endforeach
								</div>
							@endif --}}
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<button class="btn btn-primary">Login</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->
</body>

</html>