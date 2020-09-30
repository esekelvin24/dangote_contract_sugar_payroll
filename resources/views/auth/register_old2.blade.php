<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>DAILY REPORT REGISTER</title>
    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="keywords" content="Exact login Form a Responsive Web Template, Bootstrap Web Templates, Flat Web Templates, Android Compatible Web Template, Smartphone Compatible Web Template, Free Webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta-Tags -->
     {{-- <link rel="stylesheet" href="{{asset('assetschs/dist/css/skins/_all-skins.min.css')}}"> --}}

    <!-- Custom Theme files -->
    <link href="{{asset('asset-login/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('asset-login/css/font-awesome.css')}}" rel="stylesheet"> <!-- Font-Awesome-Icons-CSS -->
    <!-- //Custom Theme files -->
    
    <!-- web font --> 
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
    <!-- //web font --> 
{{-- <link href='https://fonts.googleapis.com/css?family=Bungee' rel='stylesheet'> --}}
<link href='https://fonts.googleapis.com/css?family=Abril Fatface' rel='stylesheet'>

<style>
h1{
    /*font-family: 'Bungee';font-size: 62px;*/
      font-family: 'Abril Fatface';font-size: 62px;
}
</style>
    
</head>


<body>
    <!-- main -->
    <div class="main">

        <h1><font color="#ffffff">DAILY REPORT REGISTER</font> </h1>
        <div class="main-w3lsrow">
           

            <!-- login form -->
            <div class="login-form login-form-left"> 
                <div class="agile-row">
                    <div class="head">

                        {{-- <h2>Login to CHS</h2> --}}
                       <img src="{{asset('asset-login/images/logo.png')}}">
                    </div>                  
                    <div class="clear"></div>
                    <div class="login-agileits-top">  

                         <form method="POST" action="{{ route('register') }}">

                        {{ csrf_field() }}
                   
                                <input id="sap" type="text" class="sap{{ $errors->has('sap') ? ' is-invalid' : '' }}" name="sap" placeholder="Staff No." value="{{ old('sap') }}" minlength="1" maxlength="15" required autofocus>

                                @if ($errors->has('sap'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sap') }}</strong>
                                    </span>
                                @endif
                      
                         
                                <input id="name" type="text" class="name{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Fullname" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                       
                        
                             <input type="text" class="email{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" id="email" Placeholder="Email" required=""/>
                             @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                       

                    
                          
                                <input id="password" type="password" class="password{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        
                        
                          
                                <input id="password-confirm" type="password" placeholder="Confirm Password" name="password_confirmation" required>
                
                        

                                <select id="department" name="department"  class="email{{ $errors->has('department') ? ' is-invalid' : '' }}" value="{{ old('department') }}" required>
                                    <option value="" disabled selected>Select Department</option>
                                    @foreach($departments as $id=>$department)
                                    @if (Request::old('perment_office_location') == $id)
                                    <option value="{{ $id }}" selected>{{$department}}</option>
                                    @else
                                    <option value="{{$id}}">{{$department}}</option>
                                    @endif
                                    @endforeach
                                </select>

                                @if ($errors->has('department'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif

                                <select id="perment_office_location" name="perment_office_location"  class="email{{ $errors->has('perment_office_location') ? ' is-invalid' : '' }}" value="{{ old('perment_office_location') }}" required>
                                    <option value="" disabled selected>Perment Office Location</option>
                                    @foreach($perment_office_locations as $id=>$perment_office_location)
                                    @if (Request::old('perment_office_location') == $id)
                                    <option value="{{ $id }}" selected>{{$perment_office_location}}</option>
                                    @else
                                    <option value="{{$id}}">{{$perment_office_location}}</option>
                                    @endif

                                    @endforeach
                                </select>

                                @if ($errors->has('perment_office_location'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('perment_office_location') }}</strong>
                                    </span>
                                @endif

                           
                                        
                             
                                 <input type="submit" value="Register"> 

                       
                    </form>




                    </div> 
                 {{--    <div class="login-agileits-bottom"> 
                        <h6><a href="{{ url('/password/reset') }}">Forgot your password?</a></h6>
                    </div> --}}

                     <div class="login-agileits-bottom"> 
                        <h6><a href="{{ url('/login') }}">Have an Account? Login</a></h6>
                    </div> 

                </div>  
            </div>  
        </div>
        <!-- //login form -->
        
       {{--  <div class="login-agileits-bottom1"> 
            <h3>or login with</h3>
        </div>
         --}}
        <!-- social icons -->
        {{-- <div class="social_icons agileinfo">
            <ul class="top-links">
                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#" class="vimeo"><i class="fa fa-vimeo"></i></a></li>
            </ul>
        </div> --}}
        <!-- //social icons -->
        
        <!-- copyright -->
        <div class="copyright">
            <p> Copyright &copy; {{ date('Y') }} <a href="#">Dangote Refinery IT</a>. All rights reserved.</p>
        </div>
        <!-- //copyright --> 
    </div>  
    <!-- //main -->
    
</body>
</html>