<?php
use App\Settings;
use App\Session as School_Session;
use Illuminate\Support\Facades\Route;
$c_name=Settings::select('value')->get();
$company_name=$c_name[0]->value;
$powered_by=$c_name[1]->value;
$maintenance_mode=$c_name[2]->value;

$session_name_collection=School_Session::select('session_name')->where('session_status',1)->get();
if(!$session_name_collection->isEmpty())
{
$session_name=$session_name_collection[0]->session_name;
}
?>
<!DOCTYPE html>
<html>
<head>
  <!-- set the encoding of your site -->
  <meta charset="utf-8">
  <!-- set the viewport width and initial-scale on mobile devices -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- set the HandheldFriendly -->
  <meta name="HandheldFriendly" content="True">
  <!-- set the description -->
  <meta name="description" content="Ignatius Ajuru University Distance Learning Portal">
  <!-- set the Keyword -->
  <meta name="keywords" content="IAUE Distance Learning Ignatius Ajaru University Distance Learning Portal">
  <meta name="author" content="TechUp Solutions">
  <title>@yield('title-name')</title>
  <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="{{asset("frontend/css/bootstrap.css")}}" />
  <link rel="stylesheet" href="{{asset("frontend/css/plugins.css")}}" />
  <link rel="stylesheet" href="{{asset("frontend/css/colors.css")}}" />
  <link rel="stylesheet" href="{{asset("frontend/style.css")}}" />
    <link rel="stylesheet" href="{{asset("frontend/css/responsive.css")}}" />
    <link rel="stylesheet" href="{{asset("bower_components/vex/vex.css")}}" />
    <link rel="stylesheet" href="{{asset("bower_components/vex/vex-theme-flat-attack.css")}}" />
    <link rel="stylesheet" href="{{asset("bower_components/vex/vex-theme-top.css")}}" />
    <!--Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset("frontend/images/fav/apple-icon-57x57.png")}}" />
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset("frontend/images/fav/apple-icon-60x60.png")}}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset("frontend/images/fav/apple-icon-72x72.png")}}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset("frontend/images/fav/apple-icon-76x76.png")}}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset("frontend/images/fav/apple-icon-114x114.png")}}" />
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset("frontend/images/fav/apple-icon-120x120.png")}}" />
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset("frontend/images/fav/apple-icon-144x144.png")}}" />
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset("frontend/images/fav/apple-icon-152x152.png")}}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset("frontend/images/fav/apple-icon-180x180.png")}}" />
    <link rel="icon" type="image/png" sizes="192x192"  href="{{asset("frontend/images/fav/android-icon-192x192.png")}}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset("frontend/images/fav/favicon-32x32.png")}}" />
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset("frontend/images/fav/favicon-96x96.png")}}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset("frontend/images/fav/favicon-16x16.png")}}" />
    <link rel="manifest" href="{{asset("frontend/images/fav/manifest.json")}}" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="{{asset("frontend/images/fav/ms-icon-144x144.png")}}" />
    <meta name="theme-color" content="#ffffff" />
  <!--Favicon End -->

</head>
@if(!$maintenance_mode)
<body>
<!-- main container of all the page elements -->
<style>
  div#google_translate_element{
    padding-bottom: 10px;
  }
  .goog-te-banner-frame.skiptranslate, .goog-te-gadget-icon {
    display: none !important;
  }
  body {
    top: 0px !important;
  }
  .goog-tooltip {
    display: none !important;
  }
  .goog-tooltip:hover {
    display: none !important;
  }
  .goog-text-highlight {
    background-color: transparent !important;
    border: none !important;
    box-shadow: none !important;
  }
</style>
<div id="wrapper">
  <!-- header of the page -->
  {{--page-header-stick--}}
  <header id="page-header" class="{{Route::current()->getName() == 'home'?"page-header-stick":""}}">
    <!-- top bar -->
    <div class="top-bar bg-dark text-gray" style="background-color: #002e5b !important;">
      <div class="container">
        <div class="row top-bar-holder">
          <div class="col-xs-9 col">
            <!-- bar links -->
            <ul class="font-lato list-unstyled bar-links">
              <li>
                <a href="tel:+2348057142374">
                  <strong class="dt element-block text-capitalize hd-phone">Call :</strong>
                  <strong class="dd element-block hd-phone">+234 805 714 2374</strong>
                  <i class="fas fa-phone-square hd-up-phone hidden-sm hidden-md hidden-lg"><span class="sr-only">phone</span></i>
                </a>
              </li>
              <li>
                <a href="mailto:info@iaue.edu.ng">
                  <strong class="dt element-block text-capitalize hd-phone">Email :</strong>
                  <strong class="dd element-block hd-phone">info@iaue.edu.ng</strong>
                  <i class="fas fa-envelope-square hd-up-phone hidden-sm hidden-md hidden-lg"><span class="sr-only">email</span></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-xs-3 col justify-end">
            <!-- user links -->
            <ul class="list-unstyled user-links fw-bold font-lato" style="background-color: transparent">
              <form id="logout-form" action="<?php echo route('logout') ?>" method="POST" style="display: none;">
                <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" />
              </form>
              <li style="padding: 7px; background-color: orange !important;">@auth <a href="{{route("dashboard")}}"  style="color: white">PORTAL</a></li> &nbsp;&nbsp;&nbsp;<li style="background-color: #e32402 !important; padding:7px"> <a href="#" onclick="document.getElementById('logout-form').submit();"  style="color: white">LOGOUT</a> @else<a href="#popup1" class="lightbox" style="color: white">LOGIN</a>@endauth <span class="sep">{{--|</span> <a href="#popup2" class="lightbox">Register</a>--}}</li>
            </ul>
            <ul class="list-unstyled bar-links">
              <li>
                <div id="google_translate_element" style="padding-left:15px; padding-top: 10px"></div>
                <script type="text/javascript">
                  function googleTranslateElementInit() {
                    new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,uk', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
                  }
                </script>
                <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- header holder -->
    <div class="header-holder">
      <div class="container">
        <div class="row">
          <div class="col-xs-6 col-sm-3">
            <!-- logo -->
            <div class="logo">
              <a href="{{route('home')}}">
                <img class="hidden-xs" src="{{asset("frontend/images/logo.png")}}" alt="iaue logo">
                <img class="hidden-sm hidden-md hidden-lg" src="{{asset("frontend/images/logo-dark.png")}}" alt="iaue logo">
              </a>
            </div>
            @if(isset($session_name) && $session_name!="")
            <span class="label label-warning"> <span class="fas fa-hourglass"></span> Current Session: {{$session_name}} </span>
              @endif
          </div>
          <div class="col-xs-6 col-sm-9 static-block">
            <!-- nav -->
            <nav id="nav" class="navbar navbar-default">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
              <!-- navbar collapse -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <!-- main navigation -->
                <ul class="nav navbar-nav navbar-right main-navigation text-uppercase font-lato">
                 
                  
                  <li><a class="active"  href="{{route("home")}}">HOME</a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ABOUT US</a>
                    <ul class="dropdown-menu">
                      <li><a href="{{route("history")}}">Our History</a></li>
                      <li><a href="{{route("team")}}">Management Team</a></li>
                      <li><a href="#">Cross Border Programmes</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="{{route('apply')}}">APPLY</a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">OUR PROGRAMMES</a>
                    <ul class="dropdown-menu">
                      <li><a href="{{route('programmes')}}">ALL PROGRAMMES</a></li>
                        <form id="cross_border" action="<?php echo route('programme_filter') ?>" method="POST" style="display: none;">
                            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" />
                            <input type="hidden" name="programme_type_id" value="1" />
                        </form>
                      <li><a href="#" onclick="document.getElementById('cross_border').submit();">CROSS BORDER PROGRAMME</a></li>
                      <li><a href="#" onclick="document.getElementById('long_distance').submit();">LONG DISTANCE PROGRAMME</a></li>
                        <form id="long_distance" action="<?php echo route('programme_filter') ?>" method="POST" style="display: none;">
                            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>" />
                            <input type="hidden" name="programme_type_id" value="2" />
                        </form>
                    </ul>
                  <li>
                    <a href="{{route("news")}}" >NEWS</a>
                  </li>
                  <li><a href="{{route('event')}}">EVENTS</a></li>
                  <li><a href="{{route('fee_breakdown')}}" >FEE BREAKDOWN</a></li>
                  
                  <li><a target="_blank" href="https://elearn.iaue.net">eLearning Site</a></li>
                </ul>
              </div>
              <!-- navbar form -->
              <form action="#" class="navbar-form navbar-search-form navbar-right">
                <a class="fas fa-search search-opener" role="button" data-toggle="collapse" href="#searchCollapse" aria-expanded="false" aria-controls="searchCollapse"><span class="sr-only">search opener</span></a>
                <!-- search collapse -->
                <div class="collapse search-collapse" id="searchCollapse">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search &hellip;">
                    <button type="button" class="fas fa-search btn"><span class="sr-only">search</span></button>
                  </div>
                </div>
              </form>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- contain main informative part of the site -->
  <main id="main">
  @yield('content')
    <!-- subscription aside block -->
    {{--<aside class="subscription-aside-block bg-theme text-white" style="background-color: #ffc000">
      <!-- newsletter sub form -->
      <form action="#" class="container newsletter-sub-form">
        <div class="row form-holder">
          <div class="col-xs-12 col-sm-6 col">
            <div class="text-wrap">
              <span class="element-block icn no-shrink rounded-circle"><i class="far fa-envelope-open"><span class="sr-only">icn</span></i></span>
              <div class="inner-wrap">
                <label for="email">Signup for Newsletter</label>
                <p>Subscribe now and receive weekly newsletter with new updates.</p>
              </div>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col">
            <div class="input-group">
              <input type="email" id="email" class="form-control" placeholder="Enter your email&hellip;">
              <span class="input-group-btn">
									<button class="btn btn-dark text-uppercase" type="button">Submit</button>
								</span>
            </div>
          </div>
        </div>
      </form>
    </aside>--}}
  </main>
  <!-- footer area container -->
  <div class="footer-area bg-dark text-gray" >
    <!-- aside -->
    <aside class="aside container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col">
          <div class="logo"><a href="{{route("home")}}"><img src="{{asset("frontend/images/footer_logo.jpg")}}" alt="IAUE"></a></div>
          <p style="text-align: justify">Ignatius Ajuru University of Education was established by the University of Education Law No. 8 of 2009 of the Rivers State Government passed by the Rivers State House of Assembly on 15 October 2009 and assented to by His Excellency, Chief Rotimi Amaechi, the Executive Governor of Rivers State on 20 October 2009</p>
          <a href="#" class="btn btn-default text-uppercase">Start Leaning Now</a>
        </div>
        <nav class="col-xs-12 col-sm-6 col-md-3 col">
          <h3>Quick Links</h3>
          <!-- fooer navigation -->
          <ul class="fooer-navigation list-unstyled">
            <li><a href="{{route("history")}}">Our History</a></li>
            <li><a href="{{route("programmes")}}">All Programmes</a></li>
            <li><a href="{{route("fee_breakdown")}}">Fee Breakdown</a></li>
            <li><a href="{{route("news")}}">Latest News</a></li>
            <li><a href="{{route("event")}}">Events</a></li>
          </ul>
        </nav>
        <div class="col-xs-12 col-sm-6 col-md-3 col">
          <h3>contact us</h3>
          <!-- ft address -->
          <address class="ft-address">
            <dhomel>
              <dt><span class="fas fa-map-marker"><span class="sr-only">marker</span></span></dt>
              <dd>Address: P.M.B. 5047 Rumuolumeni,<br/> Port Harcourt
                Rivers State, Nigeria.</dd>
              <dt><span class="fas fa-phone-square"><span class="sr-only">phone</span></span></dt>
              <dd>Call: <a href="tel:+2348057142374">+234 805 714 2374</a> <a href="tel:+2348121835158">+234 812 183 5158</a> <a href="tel:+2348121835158">+234 812 183 5158</a></dd>
              <dt><span class="fas fa-envelope-square"><span class="sr-only">email</span></span></dt>
              <dd>Email: <a href="mailto:info@iaue.edu.ng ">info@iaue.edu.ng </a></dd>
            </dhomel>
          </address>
        </div>
      </div>
    </aside>
    <!-- page footer -->
    <footer id="page-footer" class="font-lato">
      <div class="container">
        <div class="row holder">
          <div class="col-xs-12 col-sm-push-6 col-sm-6">
            <ul class="socail-networks list-unstyled">
              <li><a target="_blank" href="https://facebook.com/iauoeph/"><span class="fab fa-facebook"></span></a></li>
              <li><a target="_blank" href="https://twitter.com/iauephc/"><span class="fab fa-twitter"></span></a></li>
            </ul>
          </div>
          <div class="col-xs-12 col-sm-pull-6 col-sm-6">
            <p><a href="#"><?php echo $company_name ?></a> | &copy; <?php echo "2017 - ".date('Y')?> <a href="#">Powered by <?php echo $powered_by ?></a>, All rights reserved</p>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!-- back top of the page -->
  <span id="back-top" class="text-center fa fa-caret-up"></span>
  <!-- loader of the page -->
  <div id="loader" class="loader-holder">
    <div class="block" style="margin: 0 auto; text-align: center">
      <img src="{{asset("frontend/images/logo_png.png")}}" style="width:60px; height:70px; margin-bottom: -40px"><br/>
      <lottie-player
              src="https://assets7.lottiefiles.com/datafiles/XpFCWApEzLI29va/data.json"  background="transparent"  speed="1"  style="width: 200px; height: 200px;"  loop  autoplay >
      </lottie-player>
    </div>
  </div>
</div>
<div class="popup-holder">
  <div id="popup1" class="lightbox-demo">
    <form style="@if(Session::get('final_reset_code') || Session::get('final_reset_code_error') ) display:none @endif" id="login" action="{{ route('attempt_login') }}" method="post" class="user-log-form">
      @csrf
      <div style="text-align: center">
      <img src="{{asset("frontend/images/fav/apple-icon-76x76.png")}}"/>
      <h3>IAUE Distance Learning Portal</h3>
      </div>
      <h2>Login</h2>
      @if(Session::get('login_error'))
      <span style="color:orangered">Your credentials are invalid</span>
      @endif
      <div class="form-group">
        <input type="text" value="@if(Session::get('login_error')){{Session::get('login_error')}}@endif" class="form-control element-block" style="@if(Session::get('login_error')){{"border: 1px red solid !important;"}}@endif" name="email" placeholder="Email Address *">
      </div>
      <div class="form-group">
        <input type="password" class="form-control element-block" style="@if(Session::get('login_error')){{"border: 1px red solid !important;"}}@endif"  name="password" placeholder="Password *">
      </div>
      <div class="btns-wrap">
        <div class="wrap">
          <button type="submit" class="btn btn-theme btn-warning fw-bold font-lato text-uppercase login">Login</button>
        </div>
        <div class="wrap text-right">
          <p>
            <a href="#" class="forget-link">Forgot Password?</a>
          </p>
        </div>
      </div>
    </form>
    <form id="forgot" action="{{ route('forgot_password') }}" method="post" class="user-log-form" style="display: none">
      @csrf
      <div style="text-align: center">
        <img src="{{asset("frontend/images/fav/apple-icon-76x76.png")}}"/>
        <h3>IAUE Distance Learning Portal</h3>
      </div>
      <h2>Password Reset</h2>
      <div class="form-group">
        <input autocomplete="off" type="text" class="form-control element-block" style="@if(Session::get('login_error')){{"border: 1px red solid !important;"}}@endif"  name="reset_email" placeholder="Enter Email">
      </div>
      <div class="btns-wrap">
        <div class="wrap">
          <button type="submit" class="btn btn-theme btn-warning fw-bold font-lato text-uppercase reset">RESET</button>
        </div>
      </div>
      <div class="wrap text-right">
        <p>
          <a href="#" class="back_to_login">Back to login</a>
        </p>
      </div>
    </form>
    @if(Session::get('final_reset_code') || Session::get('final_reset_code_error') )
    <form id="final_reset" action="{{ route('final_reset_account') }}" method="post" class="user-log-form">
      @csrf

      @if(Session::get('final_reset_code'))
      <input type="hidden" name="final_reset_code" value="@if(Session::get('final_reset_code')){{Session::get('final_reset_code')}}@endif">
      @endif

      @if(Session::get('final_reset_code_error') )
        <input type="hidden" name="final_reset_code" value="@if(Session::get('final_reset_code_error')){{Session::get('final_reset_code_error')}}@endif">
      @endif

      <div style="text-align: center">
        <img src="{{asset("frontend/images/fav/apple-icon-76x76.png")}}"/>
        <h3>IAUE Distance Learning Portal</h3>
      </div>
      <h2>Change Password</h2>
      <div class="form-group">
        <input autocomplete="off" type="password" class="form-control element-block" name="new_password_reset" placeholder="Enter New Password">
      </div>
      <div class="form-group">
        <input autocomplete="off" type="password" class="form-control element-block" name="new_confirm_password_reset" placeholder="Confirm New Password">
      </div>
      <div class="btns-wrap">
        <div class="wrap">
          <button type="submit" class="btn btn-theme btn-warning fw-bold font-lato text-uppercase final-reset">CHANGE PASSWORD</button>
        </div>
      </div>
    </form>
    @endif
  </div>
</div>
<!-- include jQuery -->
<script src="{{asset("frontend/js/jquery.js")}}"></script>
<script src="{{asset("frontend/js/plugins.js")}}"></script>
<script src="{{asset("frontend/js/jquery.main.js")}}"></script>
<script src="{{asset("bower_components/vex/vex.combined.min.js")}}"></script>
<script type="text/javascript" src="{{asset("frontend/js/init.js")}}"></script>
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<script>
  var logo="{{asset("frontend/images/logo.png")}}";
  var logoInversed="{{asset("frontend/images/logo1.png")}}";
  $(document).ready(function(){
    vex.defaultOptions.className = 'vex-theme-flat-attack';

   var routeName = "{{Route::currentRouteName()}}";


    $("body").on("click","a.forget-link",function(){
      $("form#login").slideUp();
      $("form#forgot").slideDown();
    });

    $("body").on("click","a.back_to_login",function(){
      $("form#forgot").slideUp();
      $("form#login").slideDown();
    });

    $("body").on("click","button.final-reset",function(e){
      e.preventDefault();
      var pass1=$.trim($("input[name='new_password_reset']").val());
      var pass2=$.trim($("input[name='new_confirm_password_reset']").val());
      if(pass1=="" || pass2==""){
        vex.dialog.alert({
          unsafeMessage: `
<div style="text-align: center">
                                    <img src="{{asset("_img/barred.png")}}" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    All fields are required
</div>
                                    `,
        });
      }
      else if(pass1!=pass2){
        vex.dialog.alert({
          unsafeMessage: `
            <div style="text-align: center">
                    <img src="{{asset("_img/barred.png")}}" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                    Both New password and Confirm Password must match
            </div>
                                                `,
                    });
      }
      else{
        $("form#final_reset").submit();
      }
    });

    $("body").on("click","button.reset",function(e) {
      e.preventDefault();
      var email=$.trim($("input[name='reset_email']").val());
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if(email==""){
        vex.dialog.alert({
          unsafeMessage: `
<div style="text-align: center">
                                    <img src="{{asset("_img/barred.png")}}" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    Both email and password fields are required
</div>
                                    `,
        });
      }else if(!re.test(email)){
        vex.dialog.alert({
          unsafeMessage: `
<div style="text-align: center">
                                    <img src="{{asset("_img/barred.png")}}" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    Email is not in correct format
</div>
                                    `,
        })
      }else
        $("form#forgot").submit();
    });

      $("body").on("click","button.login",function(e){
      e.preventDefault();
      var email=$.trim($("input[name='email']").val());
      var password=$.trim($("input[name='password']").val());
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if(email=="" || password==""){
        vex.dialog.alert({
            unsafeMessage: `
<div style="text-align: center">
                                    <img src="{{asset("_img/barred.png")}}" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    Both email and password fields are required
</div>
                                    `,
        });
      }else if(!re.test(email)){
        vex.dialog.alert({
            unsafeMessage: `
<div style="text-align: center">
                                    <img src="{{asset("_img/barred.png")}}" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    Email is not in correct format
</div>
                                    `,
        })
      }else
      $("form.user-log-form").submit();

    });

    if($(".slick-arrow").length){
      setInterval(function(){
        $(".slick-arrow").click();
      },15000)
    }

    @if(Session::get('login_error'))
    $("a.lightbox").click();
    {{Session()->forget('login_error')}}
    @endif

    @if(Session::get('final_reset_code') || Session::get('final_reset_code_error'))
    $("a.lightbox").click();
    {{Session()->forget('final_reset_code')}}
    @endif

    @if(Session::get('logout')=="yes")
    vex.dialog.alert({
        unsafeMessage: `
<div style="text-align: center">
                                    <img src="_img/success.png" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    You have successfully logged out
</div>
                                    `,
        className: 'vex-theme-top'
    });
    setTimeout(function(){vex.closeAll()},2000)
      {{Session()->forget('logout')}}
    @endif

      @if(Session::get('reset_password_successful')=="yes")
      vex.dialog.alert({
        unsafeMessage: `
<div style="text-align: center">
                                    <img src="_img/success.png" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    Password successfully changed!
</div>
                                    `,
        className: 'vex-theme-top'
      });
    setTimeout(function(){vex.closeAll()},2000)
    {{Session()->forget('reset_password_successful')}}
    @endif

     @if(Session::get('register_error_apply')=="yes")
        vex.dialog.alert({
          message: 'Email is required',
          className: 'vex-theme-top'
        });
        setTimeout(function(){vex.closeAll()},2000)
        {{Session()->forget('register_error_apply')}}
     @endif

   @if(Session::get('reset_email_not_found')=="yes")
        vex.dialog.alert({
          unsafeMessage: `
<div style="text-align: center">
                                    <img src="{{asset("_img/barred.png")}}" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    Input error in email field
</div>
                                    `,
          className: 'vex-theme-top'
        });
    setTimeout(function(){vex.closeAll()},3000)
    {{Session()->forget('reset_email_not_found')}}
    @endif

    @if(Session::get('reset_sent')=="yes")
    vex.dialog.alert({
      unsafeMessage: `
<div style="text-align: center">
                                    <img src="_img/success.png" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    Reset email sent successfully
</div>
                                    `,
      className: 'vex-theme-top'
    });
    setTimeout(function(){vex.closeAll()},3000)
    {{Session()->forget('reset_sent')}}
    @endif

    @if(Session::get('reset_sent')=="yes")
    vex.dialog.alert({
      unsafeMessage: `
<div style="text-align: center">
                                    <img src="_img/success.png" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    Reset email sent successfully
</div>
                                    `,
      className: 'vex-theme-top'
    });
    setTimeout(function(){vex.closeAll()},3000)
    {{Session()->forget('reset_sent')}}
    @endif

    @if(Session::get('expired_error')=="yes")
      vex.dialog.alert({
        message: 'Your session has expired, kindly re-login',
        className: 'vex-theme-top'
      });
    setTimeout(function(){vex.closeAll()},2000)
    {{Session()->forget('expired_error')}}
    @endif

    @if(Session::get('application_success'))
    vex.dialog.alert({
        unsafeMessage: `
<div style="text-align: center">
                                    <img src="_img/success.png" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    Your application was successful and is being processed
</div>
                                    `,
        className: 'vex-theme-top'
    });
      setTimeout(function(){vex.closeAll()},4000)
      {{Session()->forget('activation_success')}}
      @endif

    @if(Session::get('activation_success'))
    vex.dialog.alert({
        unsafeMessage: `
<div style="text-align: center">
                                    <img src="_img/success.png" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    Your email activation was successful, you may now login to your portal
</div>
                                    `,
        className: 'vex-theme-top'
    });
      setTimeout(function(){vex.closeAll()},4000)
      {{Session()->forget('activation_success')}}
      @endif

    @if(Session::get('reset_error_2'))
      vex.dialog.alert({
          unsafeMessage: `
<div style="text-align: center">
                                    <img src="{{asset("_img/barred.png")}}" style="width:100px;height:100px; display: block; margin:0 auto; text-align:center" />
                                    Password reset sequence expired. Kindly initiate process
</div>
                                    `,
        className: 'vex-theme-top'
      });
    setTimeout(function(){vex.closeAll()},4000)
    {{Session()->forget('reset_error_2')}}
    @endif


    $(window).scroll(function(){
      if ($(this).scrollTop()  <= 0 ){
        $("img.hidden-xs").attr("src",logo);
      }else{
        $("img.hidden-xs").attr("src",logoInversed);
      }
    });

  });

</script>
@yield('additional_js')
</body>
@else
  <div style="width:100%; height: 100%; background-color: white; position: absolute;top:0;left:0; margin: 0 auto; text-align: center; padding-top: 30px">
    <img src="{{asset('frontend/images/fav/apple-icon-114x114.png')}}" />
    <h3>SITE IS UNDER MAINTENANCE</h3>
    <h4>We are installing critical updates. Please check back soon..</h4>
    <img  src="{{asset('_img/maintenance.jpg')}}" />
  </div>
@endif
</html>