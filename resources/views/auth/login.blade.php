<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/etc/lf/Login_v1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Sep 2019 19:05:29 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<title>Login V1</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" type="image/png" href="{{asset('Login_v1/images/icons/favicon.ico')}}" />

<link rel="stylesheet" type="text/css" href="{{asset('Login_v1/vendor/bootstrap/css/bootstrap.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('Login_v1/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('Login_v1/vendor/animate/animate.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('Login_v1/vendor/css-hamburgers/hamburgers.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('Login_v1/vendor/select2/select2.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('Login_v1/css/util.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('Login_v1/css/main.css')}}">

	<!--alerts CSS -->
    <link href="{{asset('vendors/bower_components/sweetalert/dist/sweetalert.css')}}" rel="stylesheet" type="text/css">
		
	<!--alerts CSS -->
	<link href="{{asset('vendors/bower_components/sweetalert/dist/sweetalert.css')}}" rel="stylesheet" type="text/css">
	<script src="{{asset('dist/js/sweetalert.min.js')}}"></script>

</head>
<body>
<div class="limiter">
<div class="container-login100">
<div class="wrap-login100">
<div class="login100-pic js-tilt" data-tilt>
<img src="{{asset('Login_v1/images/img-01.png')}}" alt="IMG">
</div>
<form method="POST" action="{{ route('login') }}">
        @csrf
<span class="login100-form-title">
Member Login
</span>
<div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
<input class="input100 form-control @error('email') is-invalid @enderror" type="text" name="email" id="email" value="{{ old('email') }}" placeholder="Email">
@error('email')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
<span class="focus-input100"></span>
<span class="symbol-input100">
<i class="fa fa-envelope" aria-hidden="true"></i>
</span>
</div>
<div class="wrap-input100 validate-input" data-validate="Password is required">
<input class="input100 @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="Password">
@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
<span class="focus-input100"></span>
<span class="symbol-input100">
<i class="fa fa-lock" aria-hidden="true"></i>
</span>
</div>
<div class="text-center p-t-12">
                            <div class="col-md-8 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="txt1" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
<div class="container-login100-form-btn">

<button type="submit" class="login100-form-btn">
Login
</button>

</div>
<div class="text-center p-t-12">
<!--<span class="txt1">
Forgot
</span>

@if (Route::has('password.request'))
<a class="txt2" href="{{ route('password.request') }}">
        Password?
</a>
@endif
-->
</div>
<div class="text-center p-t-136">

</a>
</div>
</form>
</div>
</div>
</div>

<script src="{{asset('Login_v1/vendor/jquery/jquery-3.2.1.min.js')}}" type="6399407ed562f5fa02f0df9d-text/javascript"></script>

<script src="{{asset('Login_v1/vendor/bootstrap/js/popper.js')}}" type="6399407ed562f5fa02f0df9d-text/javascript"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js')}}" type="6399407ed562f5fa02f0df9d-text/javascript"></script>

<script src="{{asset('Login_v1/vendor/select2/select2.min.js')}}" type="6399407ed562f5fa02f0df9d-text/javascript"></script>

<script src="{{asset('Login_v1/vendor/tilt/tilt.jquery.min.js')}}" type="6399407ed562f5fa02f0df9d-text/javascript"></script>
<script type="6399407ed562f5fa02f0df9d-text/javascript">
		$('.js-tilt').tilt({
			scale: 1.1
		})
    </script>
    
    <script>
        @if (Session::get('success'))
            swal({ 
                            title: "Successful",   
                            icon: "success", 
                            text: "{{Session::get('success')}}",
                            confirmButtonColor: "#469408",   
                        }).then((value) => {

                            

             });
        @endif
    </script>




<script src="{{asset('Login_v1/js/main.js')}}" type="6399407ed562f5fa02f0df9d-text/javascript"></script>
<script src="{{asset('Login_v1/js/rocket-loader.min.js')}}" data-cf-settings="6399407ed562f5fa02f0df9d-|49" defer=""></script></body>

</html>
