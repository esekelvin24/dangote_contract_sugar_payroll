<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from hencework.com/theme/doodle-demo/full-width-light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 29 Aug 2019 12:08:13 GMT -->
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Dangote Surgar (Casual/Contract) Payroll system</title>
	<meta name="description" content="Sugar" />
	<meta name="keywords" content="Sugar Application" />
	<meta name="author" content="Sugar"/>
	
	<!-- Favicon 
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">-->
	
	<!-- Morris Charts CSS -->
    <link href="{{asset('vendors/bower_components/morris.js/morris.css')}}" rel="stylesheet" type="text/css"/>
	
	<!-- Chartist CSS -->
	<link href="{{asset('vendors/bower_components/chartist/dist/chartist.min.css')}}" rel="stylesheet" type="text/css"/>
		

	
	<link href="{{asset('vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css')}}" rel="stylesheet" type="text/css">
		
	<!-- Custom CSS -->
	<link href="{{asset('dist/css/style.css')}}" rel="stylesheet" type="text/css">

	<!-- jQuery -->
	<script src="{{asset('vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>

	<!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

	
	

	
	

    <!---Custom Date picker for my form  -->
	<link rel="stylesheet" href="{{asset('codebase/dhtmlxcalendar.css')}}">
	<script src="{{asset('codebase/dhtmlxcalendar.js')}}"></script>
	

	<!-- multi-select CSS -->
	<link href="{{asset('vendors/bower_components/multiselect/css/multi-select.css')}}" rel="stylesheet" type="text/css"/>
		
      
	<!-- bootstrap-select CSS -->
	<link href="{{asset('vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{asset('vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{asset('vendors/bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{asset('vendors/bower_components/owl.carousel/dist/assets/owl.carousel.min.css')}}" rel="stylesheet" type="text/css"/>
	<link href="{{asset('/vendors/bower_components/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css')}}" rel="stylesheet" type="text/css"/>

	
	
	<!--alerts CSS -->
		<link href="{{asset('vendors/bower_components/sweetalert/dist/sweetalert.css')}}" rel="stylesheet" type="text/css">
		
	<!--alerts CSS -->
	<link href="{{asset('vendors/bower_components/sweetalert/dist/sweetalert.css')}}" rel="stylesheet" type="text/css">
	<script src="{{asset('dist/js/sweetalert.min.js')}}"></script>

	
	<!-- Data table CSS -->
	<link href="{{asset('vendors/bower_components/datatables/media/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/> 
	
	<!-- Data table JavaScript  -->
	<script src="{{asset('vendors/bower_components/datatables/media/js/jquery.dataTables.min.js')}}"></script>

	<script src="{{asset('data/Buttons-1.5.6/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{asset('data/Buttons-1.5.6/js/buttons.html5.min.js')}}"></script>
	<script src="{{asset('data/Buttons-1.5.6/js/buttons.flash.min.js')}}"></script>
	<script src="{{asset('data/Buttons-1.5.6/js/buttons.print.min.js')}}"></script>
	<script src="{{asset('data/pdfmake-0.1.36/pdfmake.min.js')}}"></script>
	<script src="{{asset('data/pdfmake-0.1.36/vfs_fonts.js')}}"></script>
	<script src="{{asset('data/JSZip-2.5.0/jszip.min.js')}}"></script>
	

</head>

<body>
	<!-- Preloader -->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!-- /Preloader -->
    <div class="wrapper theme-1-active pimary-color-red">
		<!-- Top Menu Items -->
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="mobile-only-brand pull-left">
				<div class="nav-header pull-left">
					<div class="logo-wrap">
					<a href="{{url('/dashboard')}}">
							<img width="300" class="brand-img" src="{{asset('img/danlogo_reversed.png')}}" alt="brand"/>
							<span class="brand-text"></span>
						</a>
					</div>
				</div>	
				<a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
				<a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
				<a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
				
				  
			</div>
			
			<div id="mobile_only_nav" class="mobile-only-nav pull-right">
					
				<ul class="nav navbar-right top-nav pull-right">
					<li>
						
						
					</li>
					
					
					
					<li  class="dropdown auth-drp">
						<a  href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><span style="color:white" class="font-12 capitalize-font">Welcome!</span >&nbsp;&nbsp;<span class="font-15" style="color:white">{{ Auth::user()->name }}</span>&nbsp;&nbsp;<img id="user_drop" src="{{asset('img/user1.png')}}" alt="user_auth" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
						<ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
							<li>
							<a href="{{url('/profile')}}"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
							</li>
							<li>
							<a href="{{url('/change-password/'.Auth::user()->id)}}"><i class="zmdi zmdi-card"></i><span>Change Password</span></a>
							</li>
							<li class="divider"></li>
							
							<li class="divider"></li>
							<li>
								
								<a class="zmdi zmdi-power" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                      <span>  {{ __('Logout') }}</span>
								 </a>
								 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                 </form>
							</li>
						</ul>
					</li>
				</ul>
			</div>	
		</nav>
		<!-- /Top Menu Items -->
		
		<!-- Left Sidebar Menu -->
		
        @include('inc.left_side_menu',['menu_header' => $menu_header, 'parent'=> $parent])

		<!-- /Left Sidebar Menu -->
		
		<!-- Right Sidebar Menu -->
		
		
		<!-- Right Setting Menu -->
		<div style="display:none;" class="setting-panel">
			<ul class="right-sidebar nicescroll-bar pa-0">
				<li class="layout-switcher-wrap">
					<ul>
						<li>
							<span class="layout-title">Scrollable sidebar</span>
							<span class="layout-switcher">
								<input type="checkbox" id="switch_3" class="js-switch"  data-color="#ea6c41" data-secondary-color="#878787" data-size="small"/>
							</span>	
							<h6 class="mt-30 mb-15">Theme colors</h6>
							<ul class="theme-option-wrap">
								<li id="theme-1" class="active-theme"><i class="zmdi zmdi-check"></i></li>
								<li id="theme-2"><i class="zmdi zmdi-check"></i></li>
								<li id="theme-3"><i class="zmdi zmdi-check"></i></li>
								<li id="theme-4"><i class="zmdi zmdi-check"></i></li>
								<li id="theme-5"><i class="zmdi zmdi-check"></i></li>
								<li id="theme-6"><i class="zmdi zmdi-check"></i></li>
							</ul>
							<h6 class="mt-30 mb-15">Primary colors</h6>
							<div class="radio mb-5">
								<input type="radio" name="radio-primary-color" id="pimary-color-red" checked value="pimary-color-red">
								<label for="pimary-color-red"> Red </label>
							</div>
							<div class="radio mb-5">
								<input type="radio" name="radio-primary-color" id="pimary-color-blue" value="pimary-color-blue">
								<label for="pimary-color-blue"> Blue </label>
							</div>
							<div class="radio mb-5">
								<input type="radio" name="radio-primary-color" id="pimary-color-green" value="pimary-color-green">
								<label for="pimary-color-green"> Green </label>
							</div>
							<div class="radio mb-5">
								<input type="radio" name="radio-primary-color" id="pimary-color-yellow" value="pimary-color-yellow">
								<label for="pimary-color-yellow"> Yellow </label>
							</div>
							<div class="radio mb-5">
								<input type="radio" name="radio-primary-color" id="pimary-color-pink" value="pimary-color-pink">
								<label for="pimary-color-pink"> Pink </label>
							</div>
							<div class="radio mb-5">
								<input type="radio" name="radio-primary-color" id="pimary-color-orange" value="pimary-color-orange">
								<label for="pimary-color-orange"> Orange </label>
							</div>
							<div class="radio mb-5">
								<input type="radio" name="radio-primary-color" id="pimary-color-gold" value="pimary-color-gold">
								<label for="pimary-color-gold"> Gold </label>
							</div>
							<div class="radio mb-35">
								<input type="radio" name="radio-primary-color" id="pimary-color-silver" value="pimary-color-silver">
								<label for="pimary-color-silver"> Silver </label>
							</div>
							<button id="reset_setting" class="btn  btn-info btn-xs btn-outline btn-rounded mb-10">reset</button>
						</li>
					</ul>
				</li>
			</ul>
		</div>
		<button style="display:none;" id="setting_panel_btn" class="btn btn-success btn-circle setting-panel-btn shadow-2dp"><i class="zmdi zmdi-settings"></i></button>
		<!-- /Right Setting Menu -->
		
		<!-- Right Sidebar Backdrop -->
		<div class="right-sidebar-backdrop"></div>
		<!-- /Right Sidebar Backdrop -->

        <!-- Main Content -->


        <div class="page-wrapper">

              @yield('content')
              
		</div>
		
		
        <!-- /Main Content -->

	</div>
	
	 
	<!-- /Footer -->
    <!-- /#wrapper -->
	
	<!-- JavaScript -->
	
    
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    
	
	
	<!-- Slimscroll JavaScript -->
	<script src="{{asset('dist/js/jquery.slimscroll.js')}}"></script>
	
	<!-- simpleWeather JavaScript -->
	<script src="{{asset('vendors/bower_components/moment/min/moment.min.js')}}"></script>
	<script src="{{asset('vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js')}}"></script>
	<script src="{{asset('dist/js/simpleweather-data.js')}}"></script>
	
	<!-- Progressbar Animation JavaScript -->
	<script src="{{asset('vendors/bower_components/waypoints/lib/jquery.waypoints.min.js')}}"></script>
	<script src="{{asset('vendors/bower_components/jquery.counterup/jquery.counterup.min.js')}}"></script>
	
	<!-- Fancy Dropdown JS -->
	<script src="{{asset('dist/js/dropdown-bootstrap-extended.js')}}"></script>
	
	<!-- Sparkline JavaScript -->
	<script src="{{asset('vendors/jquery.sparkline/dist/jquery.sparkline.min.js')}}"></script>
	
	<!-- Owl JavaScript -->
	<script src="{{asset('vendors/bower_components/owl.carousel/dist/owl.carousel.min.js')}}"></script>
	
	<!-- Chartist CSS -->
	<link href="{{asset('vendors/bower_components/chartist/dist/chartist.min.css')}}" rel="stylesheet" type="text/css"/>
	
	<!-- ChartJS JavaScript -->
	<script src="{{asset('vendors/chart.js/Chart.min.js')}}"></script>
	
	{{-- <!-- Morris Charts JavaScript -->
    <script src="{{asset('vendors/bower_components/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('vendors/bower_components/morris.js/morris.min.js')}}"></script>
    <script src="{{asset('vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js')}}"></script>
	
	<!-- Switchery JavaScript -->
	<script src="{{asset('vendors/bower_components/switchery/dist/switchery.min.js')}}"></script>
	--}}

	<!-- Init JavaScript -->
	<script src="{{asset('dist/js/init.js')}}"></script>
	
	<script src="{{asset('dist/js/numeral.min.js')}}"></script>

	<!-- bootstrap datepicker -->

	<script src="{{asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
	<script src="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>


	
	<script>
	
	$('#theme-5').click();// changing the theme color to theme 5

	
	
	</script>


	
	
</body>



</html>
