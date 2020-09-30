<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Daily Report Register</title>
    <!-- Bootstrap Core CSS -->
<link href="{{ asset("/material-lite-master/assets/plugins/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset("/material-lite-master/css/style.css")}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset("/material-lite-master/css/colors/blue.css")}}" id="theme" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('sweetalert/dist/sweetalert.css')}}">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="{{asset('sweetalert/dist/sweetalert-dev.js')}}"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
   @yield('content')
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
     <script src="{{ asset("/material-lite-master/assets/plugins/jquery/jquery.min.js")}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset("/material-lite-master/assets/plugins/bootstrap/js/tether.min.js")}}"></script>
    <script src="{{ asset("/material-lite-master/assets/plugins/bootstrap/js/bootstrap.min.js")}}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset("/material-lite-master/js/jquery.slimscroll.js")}}"></script>
    <!--Wave Effects -->
    <script src="{{ asset("/material-lite-master/js/waves.js")}}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset("/material-lite-master/js/sidebarmenu.js")}}"></script>
    <!--stickey kit -->
    <script src="{{ asset("/material-lite-master/assets/plugins/sticky-kit-master/dist/sticky-kit.min.js")}}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset("/material-lite-master/js/custom.min.js")}}"></script>
</body>

</html>
