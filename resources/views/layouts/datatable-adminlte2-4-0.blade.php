<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>@yield('title')</title>





  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('asset-adminlte-v-2-4-0/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('asset-adminlte-v-2-4-0/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('asset-adminlte-v-2-4-0/bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('asset-adminlte-v-2-4-0/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">

  <link rel="stylesheet" href="{{asset('asset-adminlte-v-2-4-0/plugins/datatables/dataTables.bootstrap.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('asset-adminlte-v-2-4-0/dist/css/AdminLTE.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('asset-adminlte-v-2-4-0/dist/css/skins/_all-skins.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('asset-adminlte-v-2-4-0/plugins/databale_export_css/buttons.dataTables.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('asset-adminlte-v-2-4-0/plugins/databale_export_css/ionicons.min.css')}}">

  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('asset-adminlte-v-2-4-0/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">


  <link rel="stylesheet" href="{{asset('sweetalert/dist/sweetalert.css')}}">
  <script src="{{asset('sweetalert/dist/sweetalert-dev.js')}}"></script>

  <!-- bootstrap-datetimepicker -->
   <script src="{{asset('bootstrap-datetime-picker/jquery.js')}}"></script>    
    <script type="text/javascript" src="{{asset('bootstrap-datetime-picker/moment.min.js')}}"></script>
    <link href="{{asset('bootstrap-datetime-picker/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
    <script src="{{asset('bootstrap-datetime-picker/bootstrap-datetimepicker.min.js')}}"></script>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
<!--  -->



<style type="text/css">
  .company-name{
  /*I did this when i was in dangote refinery*/  
     text-align: center;
    padding: 2px;
     margin-bottom: -70px;
     color: #fff;
     font-size: 34px;
     font-weight: bold;
     width: 80%; 
       font-style:Source Sans Pro, Helvetica, sans-serif !important;
  }

    .main-footer {
padding: 10px;
bottom: 0; 
left: 0;
position: fixed;
right: 0;
z-index: 999;
}

   @media only screen and (max-width: 600px) {
   .mobile-hide{ display: none !important; }
}

  @media only screen and (min-width: 600px) {
   .desktop-hide{ display: none !important; }
}
</style>

</head>

</head>
{{-- <body class="hold-transition skin-blue sidebar-mini"> --}}
  <body class="hold-transition skin-blue-light fixed sidebar-mini">

    <script src="{{asset('sweetalert/dist/sweetalert.min.js')}}"></script>

    <!-- Include this after the sweet alert js file -->
    @include('sweet::alert')
<div class="wrapper">

  <header class="main-header" >
  <!-- Logo -->
      <a href="{{ url('/') }}" class="logo mobile-hide">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><img src="{{asset('asset-adminlte-v-2-4-0/dist/img/logomini.png')}}"/></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><img height="47" width="80" src="{{asset('asset-adminlte-v-2-4-0/dist/img/logolg.png')}}"/></span>
      </a>

      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
<!-- This is the company name-->
      <div class="company-name mobile-hide" >
        DAILY ATTENDANCE SYSTEM
      </div>

      <div class="company-name desktop-hide">
        DORC
      </div>

      <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
                     
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{asset('asset-adminlte-v-2-4-0/dist/img/userlogo.jpg')}}" class="user-image" alt="User Image">
                    <span class="hidden-xs">{{ Auth::user()->name }}</span>
                  </a>
                  <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                              <img src="{{asset('asset-adminlte-v-2-4-0/dist/img/userlogo.jpg')}}" class="img-circle" alt="User Image">
                              <p>
                                    {{ Auth::user()->name }}
                                    <small>{{ Auth::user()->email }}</small>
                              </p>
                        </li>
                      
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                      {{-- <a href="#" class="btn btn-default btn-flat">Profile</a> --}}
                                      <a href="{{ url('/view_user_details/'. Auth::user()->id) }}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                  <a href="{{ url('/logout') }}" class="btn btn-default btn-flat" 
                                      onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                      Sign out
                                  </a>

                                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form>
                            </div>
                      </li>
                  </ul>
              </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
    </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left">
          {{-- <img src="{{asset('asset-adminlte-v-2-4-0/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image"> --}}
          <!--img class="img-box" src="{{asset('asset-adminlte-v-2-4-0/dist/img/logo.png')}}" alt="Logo"-->
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu" data-widget="tree">

      <!-- @permission(('can-see-the-others-bar'))   
            <li class="header">OTHERS</li>
              
            <li class="{{ Request::is('main') ? 'active' : '' }}"><a href="{{url('/main')}}"><i class="fa fa-dashboard" style="color: blue;"></i> <span>Dashboard</span></a></li>
      @endpermission -->

      <!-- *************New My Corner ******************************* -->

      <li class="{{ Request::is('main') ? 'active' : '' }}"><a href="{{url('/main')}}"><i class="fa fa-home" style="color: white;"></i> <span>Home</span></a></li>

      <li class="{{ Request::is('my_attendance/'. Auth::user()->sap) ? 'active' : '' }}"><a href="{{url('/my_attendance/'. Auth::user()->sap)}}"><i class="fa fa-calendar-check-o" style="color: white;"></i> <span>My Attendance</span></a></li>
 


 
      <li class="{{ Request::is('my_attendance_regularisation_list/'. Auth::user()->sap) ? 'active' : '' }} {{ Request::is('attendance_regularisation/'. Auth::user()->sap) ? 'active' : '' }} treeview"><a href="#"><i class="fa fa-calendar-times-o" style="color: white;"></i> <span>Attendance Regularization</span>
          <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
          </span>
          </a>
          
        
      
          <ul class="treeview-menu">  
                <li class="{{ Request::is('my_attendance_regularisation_list/'. Auth::user()->sap) ? 'active' : '' }}"><a href="{{url('/my_attendance_regularisation_list/'. Auth::user()->sap)}}"><i class="fa fa-circle-o" ></i>Previous Requests</a></li>
                <li class="{{ Request::is('attendance_regularisation/'. Auth::user()->sap) ? 'active' : '' }}"><a href="{{url('/attendance_regularisation/'. Auth::user()->sap)}}"><i class="fa fa-circle-o" ></i>New Request</a></li>
                @permission(('view-other-staff-reg-list'))
                <li class="{{ Request::is('view_other_staff_reg_list') ? 'active' : '' }}"><a href="{{url('/view_other_staff_reg_list')}}"><i class="fa fa-circle-o"></i><span>Pending My Approval</span></a></li>
                @endpermission
          
          </ul>
      </li> 

       <li class="{{ Request::is('my_leave_request_list/'. Auth::user()->sap) ? 'active' : '' }} {{ Request::is('new_leave_request/'. Auth::user()->sap) ? 'active' : '' }} treeview"><a href="#"><i class="fa fa-pied-piper-alt" style="color: white;"></i> <span>My Leave Requests</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </span>
          </a>
          <ul class="treeview-menu">  
                <li class="{{ Request::is('my_leave_request_list/'. Auth::user()->sap) ? 'active' : '' }}"><a href="{{url('/my_leave_request_list/'. Auth::user()->sap)}}"><i class="fa fa-circle-o"></i> My Leave Request List</a></li>

                <li class="{{ Request::is('new_leave_request/'. Auth::user()->sap) ? 'active' : '' }}"><a href="{{url('/new_leave_request/'. Auth::user()->sap)}}"><i class="fa fa-circle-o"></i> New Leave Request</a></li>

              <!--  <li class="{{ Request::is('my_leave_balance/'. Auth::user()->sap) ? 'active' : '' }}"><a href="#"><i class="fa fa-circle-o"></i> My Leave Balance</a></li> -->

          </ul>
      </li>  

{{--
      <!-- <li class="{{ Request::is('my_travel_request/'. Auth::user()->sap) ? 'active' : '' }} {{ Request::is('new_travel_request/'. Auth::user()->sap) ? 'active' : '' }} treeview"><a href="#"><i class="fa fa-plane" style="color: green;"></i> <span>My Travel Request</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">  
                  <li class="{{ Request::is('my_travel_request/'. Auth::user()->sap) ? 'active' : '' }}"><a href="#"><i class="fa fa-circle-o"></i> My Travel Request List</a></li>
                  <li class="{{ Request::is('attendance_regularisation/'. Auth::user()->sap) ? 'active' : '' }}"><a href="#"><i class="fa fa-circle-o"></i> New Travel Request</a></li>
            </ul>
      </li>  -->
      --}}


      <li class="{{ Request::is('view_user_details/'. Auth::user()->id) ? 'active' : '' }}"><a href="{{url('/view_user_details/'. Auth::user()->id)}}"><i class="fa fa-user" style="color: white;"></i> <span>Manage My Profile</span></a></li>


      <!--********************New My Corner*************************************-->


      <!-- OTHERS CORNER -->
      
          
      {{--     @permission(('can-create-report'))
      <li class="{{ Request::is('home') ? 'active' : '' }}"><a href="{{url('/home')}}"><i class="fa fa-dashboard" style="color: blue;"></i> <span>New Report</span></a></li>

      <li class="{{ Request::is('home') ? 'active' : '' }}"><a href="{{url('/home')}}"><i class="fa fa-dashboard" style="color: blue;"></i> <span>My Reports</span></a></li>
      @endpermission --}}
      
      @permission(('can-view-staff'))
          <li class="{{ Request::is('my_staff/non') ? 'active' : '' }}"><a href="{{url('/my_staff/non')}}"><i class="fa fa-users" style="color: white;"></i> <span>My Staff</span></a></li>
      @endpermission

 
      <!-- @permission(('can-upload-attendance'))
          <li class="{{ Request::is('attendance_upload') ? 'active' : '' }}"><a href="{{url('/attendance_upload')}}"><i class="fa fa-upload" style="color: blue;"></i> <span>Upload Attendance</span></a></li>
      @endpermission -->


      @permission(('can-view-all-users'))

       <li class="{{ Request::is('manage_users/all?e=') ? 'active' : '' }}"><a href="{{url('/manage_users/all?e=')}}"><i class="fa fa-user-plus" style="color: white;"></i> <span>Manage Users</span></a></li>
     
    {{--
      <!-- <li class="{{ Request::is('manage_users/all') ? 'active' : '' }} {{ Request::is('manage_users/1') ? 'active' : '' }} {{ Request::is('manage_users/2') ? 'active' : '' }} {{ Request::is('manage_users/3') ? 'active' : '' }} {{ Request::is('manage_users/4') ? 'active' : '' }} {{ Request::is('manage_users/all') ? 'active' : '' }} {{ Request::is('register_user') ? 'active' : '' }} treeview"><a href="#"><i class="fa fa-user-plus" style="color: blue;"></i> <span>All Users</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
      </span>
      </a>
      <ul class="treeview-menu">
        
            <li class="{{ Request::is('manage_users/all') ? 'active' : '' }}"><a href="{{url('/manage_users/all')}}"><i class="fa fa-circle-o"></i> Manage Users</a></li>
              <li class="{{ Request::is('manage_users/1') ? 'active' : '' }}"><a href="{{url('/manage_users/1')}}"><i class="fa fa-circle-o"></i> National Staff</a></li>
            <li class="{{ Request::is('manage_users/2') ? 'active' : '' }}"><a href="{{url('/manage_users/2')}}"><i class="fa fa-circle-o"></i> Expat Staff</a></li>
            <li class="{{ Request::is('manage_users/3') ? 'active' : '' }}"><a href="{{url('/manage_users/3')}}"><i class="fa fa-circle-o"></i> Casual Workers</a></li>
            <li class="{{ Request::is('manage_users/4') ? 'active' : '' }}"><a href="{{url('/manage_users/4')}}"><i class="fa fa-circle-o"></i> Contract Staff</a></li>
            <li class="{{ Request::is('manage_users/all') ? 'active' : '' }}"><a href="{{url('/manage_users/all')}}"><i class="fa fa-circle-o"></i> All Users</a></li> 
            @permission(('can-register-users'))
            <li class="{{ Request::is('register_user') ? 'active' : '' }}"><a href="{{url('/register_user')}}"><i class="fa fa-circle-o"></i> Register User</a></li>
            @endpermission  

      </ul>
      </li>  --> --}}
      @endpermission
      

      @php
        $user = Auth::user();
      @endphp
        
        
      
      
     

      @permission(('hr_business_partners'))
      <li class="{{ Request::is('map_users') || Request::is('hr_manage_users/*') ? 'active' : '' }}  treeview"><a href="#"><i class="fa fa-handshake-o" style="color: white;"></i> <span>HR Business Partners</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">  
              <li class="{{ Request::is('hr_manage_users/all') ? 'active' : '' }}"><a href="{{url('/hr_manage_users/all')}}"><i class="fa fa-circle-o"></i> Assigned Staff</a></li>
               @if ($user->can('can-map-user-to-any-hrb-group') || $user->can('can-map-user-to-hrb-group'))
                     <li class="{{ Request::is('map_users') ? 'active' : '' }}"><a href="{{url('/map_users')}}"><i class="fa fa-circle-o"></i> Map Users to HBP</a></li>
               @endif
             
         </ul>
      </li>
      @endpermission


      @permission(('view-attendance-summary'))
      <li class="{{ Request::is('view_attendance_summary') ? 'active' : '' }}"><a href="{{url('/view_attendance_summary')}}"><i class="fa fa-clock-o" style="color: white;"></i> Attendance Summary</a></li>
      @endpermission

    
      @permission(('can_map_users_to_hbp'))
      <li class="{{ Request::is('create_group') ? 'active' : '' }} {{ Request::is('add_group_admin/*') ? 'active' : '' }} {{ Request::is('edit_group/*') ? 'active' : '' }} {{ Request::is('view_group/*') ? 'active' : '' }} {{ Request::is('manage_groups') ? 'active' : '' }} {{ Request::is('new_leave_request/'. Auth::user()->sap) ? 'active' : '' }} treeview"><a href="#"><i class="fa fa-pied-piper-alt" style="color: white;"></i> <span>Staff Grouping</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">  
              <li class="{{ Request::is('manage_groups') ? 'active' : '' }}"><a href="{{url('/manage_groups')}}"><i class="fa fa-circle-o"></i>Groups</a></li>
         </ul>
        </li> 
        @endpermission

        @permission(('send-password-reset-new-user'))
        <li class=" {{ Request::is('batch_sending') || Request::is('account_creation_email_history_details/*') || Request::is('account_creation_email_history') || Request::is('individual_sending') ? 'active' : '' }} treeview"><a href="#"><i class="fa fa-envelope" style="color: white;"></i> <span>Account Creation Email</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">  
              <li class="{{ Request::is('account_creation_email_history_details/*') || Request::is('account_creation_email_history') ? 'active' : '' }}"><a href="{{url('/account_creation_email_history')}}"><i class="fa fa-circle-o"></i>Sent Email History</a></li>
              <li class="{{ Request::is('individual_sending') ? 'active' : '' }}"><a href="{{url('/individual_sending')}}"><i class="fa fa-circle-o"></i>Individual Email Sending</a></li>
              <li class="{{ Request::is('batch_sending') ? 'active' : '' }}"><a href="{{url('/batch_sending')}}"><i class="fa fa-circle-o"></i>Batch Email Sending</a></li>
         </ul>
        </li> 
        @endpermission

        

        
        
        
        @permission(('can-view-trainee-management'))
        <li class="{{(Request::is('trainee_log_details/*') || Request::is('ld_register_user') || Request::is('edit_schedule/*') || Request::is('new_schedule/*') || Request::is('ld_edit_user/*') ||  Request::is('ld_view_user_details/*') || Request::is('user_search_list/*') 
        || Request::is('uploaded_trainee_log') || Request::is('upload_new_trainee_log/*') ||  Request::is('uploaded_trainee_log/*')
         || Request::is('my_rotation/*') || Request::is('upload_new_report/*') || Request::is('trainee_schedule_details/*') 
         || Request::is('upload_trainee_log') || Request::is('approve_trainee_log') || Request::is('approve_departmental_report') 
         || Request::is('trainee_schedule/*') || Request::is('uploaded_departmental_report')) ? 'active' : '' }}  treeview"><a href="#"><i class="fa fa-pied-piper-alt" style="color: white;"></i> <span>Trainee Management</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </span> 
          </a> 
          <ul class="treeview-menu">
            @permission(('can-search-user-list'))
            <li class="{{  Request::is('ld_edit_user/*') || Request::is('ld_register_user') || Request::is('ld_view_user_details/*') || Request::is('user_search_list/*') ? 'active' : '' }}"><a href="{{url('/user_search_list/all?e=')}}"><i class="fa fa-circle-o"></i>Search User List</a></li>
            @endpermission
            @permission(('can-view-other-rotation'))
            <li class="{{ Request::is('edit_schedule/*') || Request::is('new_schedule/*') ||  Request::is('trainee_schedule/*') || Request::is('trainee_schedule_details/*') ? 'active' : '' }}"><a href="{{url('/trainee_schedule/none')}}"><i class="fa fa-circle-o"></i>Trainee Schedule</a></li>
            @endpermission
            
            @permission(('can-view-rotation'))
                <li class="{{ Request::is('upload_new_report/*') || Request::is('upload_new_trainee_log/*') || Request::is('my_rotation/*') ? 'active' : '' }}"><a href="{{url('/my_rotation/'. base64_encode(Auth::user()->sap))}}"><i class="fa fa-circle-o"></i>My Rotation</a></li>
            @endpermission
               
            @permission(('can-upload-deparmental-report'))
                <li class="{{ Request::is('uploaded_departmental_report') ? 'active' : '' }}"><a href="{{url('/uploaded_departmental_report')}}"><i class="fa fa-circle-o"></i>Uploaded Reports</a></li>
            @endpermission

            @permission(('can-upload-trainee-log'))
                <li class="{{  Request::is('uploaded_trainee_log') ? 'active' : '' }}"><a href="{{url('/uploaded_trainee_log')}}"><i class="fa fa-circle-o"></i>Uploaded Trainee Log</a></li>
            @endpermission
                
            @permission(('can-approve-trainee-log'))
               <li class="{{ Request::is('approve_trainee_log') ? 'active' : '' }}"><a href="{{url('/approve_trainee_log')}}"><i class="fa fa-circle-o"></i>Approve Trainee Log</a></li>
            @endpermission 

            @permission(('can-approve-departmental-report'))
                <li class="{{ Request::is('approve_departmental_report') ? 'active' : '' }}"><a href="{{url('/approve_departmental_report')}}"><i class="fa fa-circle-o"></i>Approve Departmental Report</a></li>
            @endpermission

            @permission(('can-view-training-report'))
                <li class="{{ Request::is('training_list') ? 'active' : '' }}"><a href="{{url('/training_list')}}"><i class="fa fa-circle-o"></i>List Of Training</a></li>
            @endpermission  
            
            
           </ul>
        </li> 
        @endpermission




{{--
      <!-- 
      @permission(('can-view-all-users')) 
      <li class="{{ Request::is('hr_manage_users/all') ? 'active' : '' }} {{ Request::is('hr_manage_users/1') ? 'active' : '' }} {{ Request::is('hr_manage_users/2') ? 'active' : '' }} {{ Request::is('hr_manage_users/3') ? 'active' : '' }} {{ Request::is('hr_manage_users/4') ? 'active' : '' }} {{ Request::is('hr_manage_users/all') ? 'active' : '' }} {{ Request::is('register_user') ? 'active' : '' }} treeview"><a href="#"><i class="fa fa-user-plus" style="color: blue;"></i> <span>HR Business Partner</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i>
      </span>
      </a>
      <ul class="treeview-menu">
        
      <li class="{{ Request::is('hr_manage_users/all') ? 'active' : '' }}"><a href="{{url('/hr_manage_users/all')}}"><i class="fa fa-circle-o"></i> Manage Users</a></li>
      <li class="{{ Request::is('hr_manage_users/1') ? 'active' : '' }}"><a href="{{url('/hr_manage_users/1')}}"><i class="fa fa-circle-o"></i> Local Staff</a></li>
      <li class="{{ Request::is('hr_manage_users/2') ? 'active' : '' }}"><a href="{{url('/hr_manage_users/2')}}"><i class="fa fa-circle-o"></i> Expat Staff</a></li>
      <li class="{{ Request::is('hr_manage_users/3') ? 'active' : '' }}"><a href="{{url('/hr_manage_users/3')}}"><i class="fa fa-circle-o"></i> Casual Workers</a></li>
      <li class="{{ Request::is('hr_manage_users/4') ? 'active' : '' }}"><a href="{{url('/hr_manage_users/4')}}"><i class="fa fa-circle-o"></i> Contract Staff</a></li>
      <li class="{{ Request::is('hr_manage_users/all') ? 'active' : '' }}"><a href="{{url('/hr_manage_users/all')}}"><i class="fa fa-circle-o"></i> All Users</a></li> 
      @permission(('can-register-users'))
      <li class="{{ Request::is('register_user') ? 'active' : '' }}"><a href="{{url('/register_user')}}"><i class="fa fa-circle-o"></i> Register User</a></li>
      @endpermission

      </ul>
      </li> 
      @endpermission -->

      --}}

{{--
      <!-- @permission(('view-other-staff-reg-list'))
        <li class="{{ Request::is('view_other_staff_reg_list') ? 'active' : '' }}"><a href="{{url('/view_other_staff_reg_list')}}"><i class="fa fa-calendar-times-o" style="color: blue;"></i> <span>All Regularization List</span></a></li>
      @endpermission -->

      <!-- @permission(('view-other-staff-reg-list'))
        <li class="{{ Request::is('view_leave_req_list') ? 'active' : '' }}"><a href="{{url('/view_leave_req_list')}}"><i class="fa fa-pied-piper-alt" style="color: blue;"></i> <span>All Leave Request List</span></a></li>
      @endpermission

      @permission(('view-other-staff-reg-list'))
        <li class=""><a href="#"><i class="fa fa-plane" style="color: blue;"></i> <span>All Travel Request List</span></a></li>
      @endpermission -->
--}}
      @role(('admin'))
      <li class="{{ Request::is('application_Settings') ? 'active' : '' }} {{ Request::is('manage_roles') ? 'active' : '' }} {{ Request::is('manage_permissions') ? 'active' : '' }} {{ Request::is('users_with_special_permissions') ? 'active' : '' }}   treeview"><a href="#"><i class="fa fa-gear" style="color: white;"></i> <span>Application Settings</span>
        <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
              <li class="{{ Request::is('application_Settings') ? 'active' : '' }}"><a href="{{url('/application_Settings')}}"><i class="fa fa-circle-o"></i> Notification Settings</a></li>   
              <li class="{{ Request::is('manage_roles') ? 'active' : '' }}"><a href="{{url('/manage_roles')}}"><i class="fa fa-circle-o"></i> Update Roles</a></li>
              <li class="{{ Request::is('manage_permissions') ? 'active' : '' }}"><a href="{{url('/manage_permissions')}}"><i class="fa fa-circle-o"></i> Update Permissions</a></li>    
              <li class="{{ Request::is('users_with_special_permissions') ? 'active' : '' }}"><a href="{{url('/users_with_special_permissions')}}"><i class="fa fa-circle-o"></i> Special Permissions</a></li>    
        </ul>
      </li>
      @endrole

      <!-- {{-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}} -->
      <!-- @permission(('can-see-the-others-bar'))  
      <li class="header"><hr>MY CORNER</li>
      @endpermission 

{{--
        <li class="{{ Request::is('main') ? 'active' : '' }}"><a href="{{url('/main')}}"><i class="fa fa-dashboard" style="color: green;"></i> <span>Dashboard</span></a></li>
       

      <li class="{{ Request::is('view_user_details/'. Auth::user()->id) ? 'active' : '' }}"><a href="{{url('/view_user_details/'. Auth::user()->id)}}"><i class="fa fa-calendar-check-o" style="color: green;"></i> <span>Manage Profile</span></a></li>
      <li class="{{ Request::is('my_attendance/'. Auth::user()->sap) ? 'active' : '' }}"><a href="{{url('/my_attendance/'. Auth::user()->sap)}}"><i class="fa fa-calendar-check-o" style="color: green;"></i> <span>My Attendance</span></a></li>
 
      <li class="{{ Request::is('my_attendance_regularisation_list/'. Auth::user()->sap) ? 'active' : '' }} {{ Request::is('attendance_regularisation/'. Auth::user()->sap) ? 'active' : '' }} treeview"><a href="#"><i class="fa fa-calendar-times-o" style="color: green;"></i> <span>My Attendance Regular...</span>
          <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
          </span>
          </a>
          <ul class="treeview-menu">  
                <li class="{{ Request::is('my_attendance_regularisation_list/'. Auth::user()->sap) ? 'active' : '' }}"><a href="{{url('/my_attendance_regularisation_list/'. Auth::user()->sap)}}"><i class="fa fa-circle-o"></i> My Regularization List</a></li>
                <li class="{{ Request::is('attendance_regularisation/'. Auth::user()->sap) ? 'active' : '' }}"><a href="{{url('/attendance_regularisation/'. Auth::user()->sap)}}"><i class="fa fa-circle-o"></i> New Attendance Regularization</a></li>
          </ul>
      </li> 

      <li class="{{ Request::is('my_leave_request_list/'. Auth::user()->sap) ? 'active' : '' }} {{ Request::is('new_leave_request/'. Auth::user()->sap) ? 'active' : '' }} treeview"><a href="#"><i class="fa fa-pied-piper-alt" style="color: green;"></i> <span>My Leave Requests</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </span>
          </a>
          <ul class="treeview-menu">  
                <li class="{{ Request::is('my_leave_request_list/'. Auth::user()->sap) ? 'active' : '' }}"><a href="{{url('/my_leave_request_list/'. Auth::user()->sap)}}"><i class="fa fa-circle-o"></i> My Leave Request List</a></li>

                <li class="{{ Request::is('new_leave_request/'. Auth::user()->sap) ? 'active' : '' }}"><a href="{{url('/new_leave_request/'. Auth::user()->sap)}}"><i class="fa fa-circle-o"></i> New Leave Request</a></li>

                <li class="{{ Request::is('my_leave_balance/'. Auth::user()->sap) ? 'active' : '' }}"><a href="#"><i class="fa fa-circle-o"></i> My Leave Balance</a></li>

          </ul>
      </li> 


      <li class="{{ Request::is('my_travel_request/'. Auth::user()->sap) ? 'active' : '' }} {{ Request::is('new_travel_request/'. Auth::user()->sap) ? 'active' : '' }} treeview"><a href="#"><i class="fa fa-plane" style="color: green;"></i> <span>My Travel Request</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">  
                  <li class="{{ Request::is('my_travel_request/'. Auth::user()->sap) ? 'active' : '' }}"><a href="#"><i class="fa fa-circle-o"></i> My Travel Request List</a></li>
                  <li class="{{ Request::is('attendance_regularisation/'. Auth::user()->sap) ? 'active' : '' }}"><a href="#"><i class="fa fa-circle-o"></i> New Travel Request</a></li>
            </ul>
      </li>  -->
--}}

  </ul>
  </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
   
       


@yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong> &copy; {{ date('Y') }} <a href="#">Dangote Oil Refinery Company</a>.</strong> All rights reserved.
  </footer>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('asset-adminlte-v-2-4-0/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('asset-adminlte-v-2-4-0/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('asset-adminlte-v-2-4-0/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('asset-adminlte-v-2-4-0/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('asset-adminlte-v-2-4-0/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('asset-adminlte-v-2-4-0/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('asset-adminlte-v-2-4-0/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('asset-adminlte-v-2-4-0/dist/js/demo.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('asset-adminlte-v-2-4-0/bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('asset-adminlte-v-2-4-0/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('asset-adminlte-v-2-4-0/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

{{-- <script src="{{asset('assetschs/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assetschs/plugins/datatables/dataTables.bootstrap.min.js')}}"></script> --}}
<script src="{{asset('asset-adminlte-v-2-4-0/plugins/datatables/dataTables.fixedColumns.min.js')}}"></script>

{{-- <script type="text/javascript" src="{{asset('asset-adminlte-v-2-4-0/plugins/databale_export_js/jquery.dataTables.min.js')}}"></script> --}}
<script type="text/javascript" src="{{asset('asset-adminlte-v-2-4-0/plugins/databale_export_js/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset-adminlte-v-2-4-0/plugins/databale_export_js/buttons.flash.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset-adminlte-v-2-4-0/plugins/databale_export_js/jszip.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset-adminlte-v-2-4-0/plugins/databale_export_js/pdfmake.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset-adminlte-v-2-4-0/plugins/databale_export_js/vfs_fonts.js')}}"></script>
<script type="text/javascript" src="{{asset('asset-adminlte-v-2-4-0/plugins/databale_export_js/buttons.html5.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset-adminlte-v-2-4-0/plugins/databale_export_js/buttons.print.min.js')}}"></script>
<script type="text/javascript" src="{{asset('asset-adminlte-v-2-4-0/dist/js/blockUI.js')}}"></script>




@yield('datatableissuesfixed')   

</body>
</html>
