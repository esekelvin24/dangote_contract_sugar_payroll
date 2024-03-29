<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Daily Report Register</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0,    user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />
  <!-- Bootstrap core CSS     -->
  <link href="{{ asset("/material-lite-master/assets/plugins/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
   
  <!--  CSS for Login Purpose, don't include it in your project -->
  <link href="{{ asset("/css/login.css")}}" rel="stylesheet" />
  <!--     Fonts and icons     -->
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
  <link href="{{ asset("/material-lite-master/assets/css/pe-icon-7-stroke.css")}}" rel="stylesheet" />
</head>

<body>

  <div class="login-page">
    <div class="form">
     <!--  <form class="register-form">
        <input type="text" placeholder="Name"/>
        <input type="password" placeholder="Password"/>
        <input type="text" placeholder="Email Address"/>
        <button>create</button>
        <p class="message">Already registered? <a href="#">Sign In</a></p>
      </form> -->
      @yield('content')
     
    </div>
  </div>

</body>

    <!--   Core JS Files   -->


</html>
