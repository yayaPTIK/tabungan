<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="description" content="codedthemes">
	<meta name="keywords"
		  content=", Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
	<meta name="author" content="codedthemes">

	<!-- Favicon icon -->
	{{-- <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon"> --}}
	{{-- <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon"> --}}

	<!-- Google font-->
   <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700" rel="stylesheet">

	<!-- Font Awesome -->
	<link href="{{asset("backend/css/font-awesome.min.css")}}" rel="stylesheet" type="text/css">

	<!--ico Fonts-->
	<link rel="stylesheet" type="text/css" href="{{asset("backend/icon/icofont/css/icofont.css")}}">

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset("backend/plugins/bootstrap/css/bootstrap.min.css")}}">

	<!-- waves css -->
	<link rel="stylesheet" type="text/css" href="{{asset("backend/plugins/Waves/waves.min.css")}}">

	<!-- Style.css -->
	<link rel="stylesheet" type="text/css" href="{{asset("backend/css/main.css")}}">

	<!-- Responsive.css-->
	<link rel="stylesheet" type="text/css" href="{{asset("backend/css/responsive.css")}}">

	<!--color css-->
	<link rel="stylesheet" type="text/css" href="{{asset("backend/css/color/color-1.min.css")}}" id="color"/>

</head>
<body>
<section class="login p-fixed d-flex text-center bg-primary common-img-bg">
	<!-- Container-fluid starts -->
	<div class="container-fluid">
		<div class="row">

			<div class="col-sm-12">
				<div class="login-card card-block">
					<form class="md-float-material" method="post" action="{{route('login')}}">
                        @csrf
						<div class="text-center">
							{{-- <img src="{{asset("backend/images/logo-black.png")}}" alt="logo"> --}}
						</div>
						<h3 class="text-center txt-primary">
							Sign In to your account
						</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="md-input-wrapper">
									<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
							</div>
							<div class="col-md-12">
								<div class="md-input-wrapper">
									<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="Password" autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
								</div>
							</div>
							<div class="col-sm-6 col-xs-12">
							<div class="rkmd-checkbox checkbox-rotate checkbox-ripple m-b-25">
								<label class="input-checkbox checkbox-primary">
									<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
									<span class="checkbox"></span>
								</label>
								<div class="captions">Remember Me</div>

							</div>
								</div>
							<div class="col-sm-6 col-xs-12 forgot-phone text-right">
								<a href="{{route('password.request')}}" class="text-right f-w-600"> Forget Password?</a>
								</div>
						</div>
						<div class="row">
							<div class="col-xs-10 offset-xs-1">
								<button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
							</div>
						</div>
						<!-- <div class="card-footer"> -->
						{{-- <div class="col-sm-12 col-xs-12 text-center">
							<span class="text-muted">Don't have an account?</span>
							<a href="register2.html" class="f-w-600 p-l-5">Sign up Now</a>
						</div> --}}

						<!-- </div> -->
					</form>
					<!-- end of form -->
				</div>
				<!-- end of login-card -->
			</div>
			<!-- end of col-sm-12 -->
		</div>
		<!-- end of row -->
	</div>
	<!-- end of container-fluid -->
</section>

<!-- Warning Section Starts -->
<!-- Older IE warning message -->
<!--[if lt IE 9]>
<div class="ie-warning">
	<h1>Warning!!</h1>
	<p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
	<div class="iew-container">
		<ul class="iew-download">
			<li>
				<a href="http://www.google.com/chrome/">
					<img src="backend/images/browser/chrome.png" alt="Chrome">
					<div>Chrome</div>
				</a>
			</li>
			<li>
				<a href="https://www.mozilla.org/en-US/firefox/new/">
					<img src="backend/images/browser/firefox.png" alt="Firefox">
					<div>Firefox</div>
				</a>
			</li>
			<li>
				<a href="http://www.opera.com">
					<img src="backend/images/browser/opera.png" alt="Opera">
					<div>Opera</div>
				</a>
			</li>
			<li>
				<a href="https://www.apple.com/safari/">
					<img src="backend/images/browser/safari.png" alt="Safari">
					<div>Safari</div>
				</a>
			</li>
			<li>
				<a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
					<img src="backend/images/browser/ie.png" alt="">
					<div>IE (9 & above)</div>
				</a>
			</li>
		</ul>
	</div>
	<p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jqurey -->
<script src="{{asset("backend/plugins/jquery/dist/jquery.min.js")}}"></script>
<script src="{{asset("backend/plugins/jquery-ui/jquery-ui.min.js")}}"></script>
<script src="{{asset("backend/plugins/tether/dist/js/tether.min.js")}}"></script>

<!-- Required Fremwork -->
<script src="{{asset("backend/plugins/bootstrap/js/bootstrap.min.js")}}"></script>

<!-- waves effects.js -->
<script src="{{asset("backend/plugins/Waves/waves.min.js")}}"></script>
<!-- Custom js -->
<script type="text/javascript" src="{{asset("backend/pages/elements.js")}}"></script>



</body>
</html>
