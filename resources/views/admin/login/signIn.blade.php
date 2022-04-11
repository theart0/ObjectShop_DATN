<html lang="en">

<head>

	<title>Ablepro v8.0 bootstrap admin template by Phoenixcoded</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="{{ asset('adminlte/dist/assets/images/favicon.ico')}}" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="{{ asset('adminlte/dist/assets/css/style.css')}}">
	
	


</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<form class="card-body" action="{{ route("login.sign_in") }}" method="post">
                        @csrf
						<img src="{{ asset('adminlte/dist/assets/images/logo-dark.png')}}" alt="" class="img-fluid mb-4">
						<h4 class="mb-3 f-w-400">Đăng nhập</h4>
						<div class="form-group mb-3">
							<label class="floating-label" for="Email" >Email</label>
                            
							<input type="text" class="form-control" id="Email" placeholder="" name="email">
						</div>
						<div class="form-group mb-4">
							<label class="floating-label" for="Password" >Mật khẩu</label>
							<input type="password" class="form-control" id="Password" placeholder="" name="password">
						</div>
                        @if (session()->get('message'))
                            <div class="form-group">
                                <p class="text-danger ">{{ session()->get('message') }}</p>
                            </div>
                        @endif
                        <br>
						<div class="custom-control custom-checkbox text-left mb-4  ">
							<input type="checkbox" class="custom-control-input" id="customCheck1">
							<label class="custom-control-label" for="customCheck1">Ghi nhớ đăng nhập</label>
						</div>
						<button type="submit" class="btn btn-block btn-primary mb-4" >Đăng nhập</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="{{ asset('adminlte/dist/assets/js/vendor-all.min.js')}}"></script>
<script src="{{ asset('adminlte/dist/assets/js/plugins/bootstrap.min.js')}}"></script>
<script src="{{ asset('adminlte/dist/assets/js/ripple.js')}}"></script>
<script src="{{ asset('adminlte/dist/assets/js/pcoded.min.js')}}"></script>



</body>

</html>