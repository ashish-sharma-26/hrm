@php
$url = config('app.url');

@endphp
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ $url.'/images/icons/favicon.ico' }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{  $url.'/vendor/bootstrap/css/bootstrap.min.css'}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ $url.'/fonts/font-awesome-4.7.0/css/font-awesome.min.css'}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ $url.'/vendor/animate/animate.css'}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ $url.'/vendor/css-hamburgers/hamburgers.min.css'}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ $url.'/vendor/select2/select2.min.css'}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ $url.'/css/util.css'}}">
	<link rel="stylesheet" type="text/css" href="{{ $url.'/css/main.css'}}">
<!--===============================================================================================-->
	<style>
		.wrap-login100{    position: relative;}
		.wrap-login100 .alert-info{    position: absolute;
    right: 120px;
    top: 24px;}
	</style>
</head>
<body>
	   
            <!-- /#page-wrapper -->
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{ $url.'/images/img-01.png'}}" alt="IMG">
				</div>
					@if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif  
					@yield('content')
					
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="{{ $url.'/vendor/jquery/jquery-3.2.1.min.js'}}"></script>
<!--===============================================================================================-->
	<script src="{{ $url.'/vendor/bootstrap/js/popper.js'}}"></script>
	<script src="{{ $url.'/vendor/bootstrap/js/bootstrap.min.js'}}"></script>
<!--===============================================================================================-->
	<script src="{{ $url.'/vendor/select2/select2.min.js'}}"></script>
<!--===============================================================================================-->
	<script src="{{ $url.'/vendor/tilt/tilt.jquery.min.js'}}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{ $url.'/js/main.js'}}"></script>

</body>
</html>