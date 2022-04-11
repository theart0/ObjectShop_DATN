
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shoopee</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon icon -->
    <link rel="icon" href=" {{ asset('adminlte/dist/assets/images/favicon.ico')}}" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/assets/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    @yield('css')
    
    

</head>
<body class="" id="top">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
	@include('admin.component.navigation')
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	@include('admin.component.sidebar')
	<!-- [ Header ] end -->
	
	

    <!-- [ Main Content ] start -->
    @yield('content')


<!-- Required Js -->
<script src="{{ asset('adminlte/dist/assets/js/vendor-all.min.js')}}"></script>
<script src="{{ asset('adminlte/dist/assets/js/plugins/bootstrap.min.js')}}"></script>
<script src="{{ asset('adminlte/dist/assets/js/ripple.js')}}"></script>
<script src="{{ asset('adminlte/dist/assets/js/pcoded.min.js')}}"></script>

<!-- Apex Chart -->
<script src="{{ asset('adminlte/dist/assets/js/plugins/apexcharts.min.js')}}"></script>


<!-- custom-chart js -->
<script src="{{ asset('adminlte/dist/assets/js/pages/dashboard-main.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@yield('js')
</body>

</html>
