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
    <link rel="icon" type="image/png" sizes="16x16" href="{{("/material-lite-master/assets/images/favicon.png")}}">
    <title>Daily Report Register</title>
    <!-- Bootstrap Core CSS -->
<link href="{{ asset("/material-lite-master/assets/plugins/bootstrap/css/bootstrap.min.css")}}" rel="stylesheet">
<!-- DataTables -->
<link href="{{asset("/Admin/light/assets/plugins/datatables/dataTables.bootstrap.min.css")}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset("/Admin/light/assets/plugins/datatables/fixedColumns.dataTables.min.css")}}" rel="stylesheet" type="text/css"/>
    <!-- Custom CSS -->
    <link href="{{ asset("/material-lite-master/css/style.css")}}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset("/material-lite-master/css/colors/blue.css")}}" id="theme" rel="stylesheet">
    <!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<!-- Datepicker-->
    <link href="{{ asset ("/datepicker/datepicker3.css") }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="{{asset('sweetalert/dist/sweetalert.css')}}">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="{{asset('sweetalert/dist/sweetalert-dev.js')}}"></script>
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset("/select2/select2.min.css")}}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    @include('sweet::alert')
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            
                            <!-- Light Logo icon -->
                           <img src="{{ asset("/material-lite-master/assets/images/logo-light-icon.png")}}" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                         
                         <!-- Light Logo text -->   
                         <img src="{{ asset("/material-lite-master/assets/images/logo-light-text.png")}}" class="light-logo" alt="homepage" /> 
                         </span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <!-- <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search">
                                <input type="text" class="form-control" placeholder="Search & enter"> <a class="srh-btn"><i class="ti-close"></i></a> </form>
                        </li> -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                         @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="{{url('/myProfile')}}"><img src="{{ asset("/material-lite-master/assets/images/users/1.png")}}" alt="user" class="profile-pic m-r-10" />{{ Auth::user()->name }}</a>
                        </li>
                        @endif
                        
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        @if (Auth::guest())
        @else
          @include('layouts.sidebar2')
        @endif
        
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->

                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                
                 @yield('content')
                <!-- Row -->
                     

                    <!-- Column -->
                    
                    <!-- Column -->
                    <!-- Column -->
                    
                    <!-- Column -->
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                <strong>Copyright &copy; {{ date('Y') }} <a href="#">Dangote Refinery IT</a>.</strong> All rights reserved.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<!-- Select2 -->
<script src="{{asset("/select2/select2.full.min.js")}}"></script>
<!-- Datepicker -->
  <script src="{{ asset ("/datepicker/bootstrap-datepicker.js") }}" type="text/javascript"></script>
     <!-- Dashboard init -->
        <script src="{{asset("/Admin/light/assets/pages/jquery.dashboard.js")}}"></script>

      <!-- Datatable js -->
        <script src="{{asset("/Admin/light/assets/plugins/datatables/jquery.dataTables.min.js")}}"></script>
        <script src="{{asset("/Admin/light/assets/plugins/datatables/dataTables.bootstrap.js")}}"></script>
        <script src="{{asset("/Admin/light/assets/plugins/datatables/dataTables.buttons.min.js")}}"></script>
        <script src="{{asset("/Admin/light/assets/plugins/datatables/buttons.bootstrap.min.js")}}"></script>
        <script src="{{asset("/Admin/light/assets/plugins/datatables/jszip.min.js")}}"></script>
        <script src="{{asset("/Admin/light/assets/plugins/datatables/pdfmake.min.js")}}"></script>
        <script src="{{asset("/Admin/light/assets/plugins/datatables/vfs_fonts.js")}}"></script>
        <script src="{{asset("/Admin/light/assets/plugins/datatables/buttons.html5.min.js")}}"></script>
        <script src="{{asset("/Admin/light/assets/plugins/datatables/buttons.print.min.js")}}"></script>
        <script src="{{asset("/Admin/light/assets/plugins/datatables/dataTables.keyTable.min.js")}}"></script>
        <script src="{{asset("/Admin/light/assets/plugins/datatables/dataTables.responsive.min.js")}}"></script>
        <script src="{{asset("/Admin/light/assets/plugins/datatables/responsive.bootstrap.min.js")}}"></script>
        <script src="{{asset("/Admin/light/assets/plugins/datatables/dataTables.scroller.min.js")}}"></script>
        <script src="{{asset("/Admin/light/assets/plugins/datatables/dataTables.colVis.js")}}"></script>
        <script src="{{asset("/Admin/light/assets/plugins/datatables/dataTables.fixedColumns.min.js")}}"></script>

        <!-- init -->
        <script src="{{asset("/Admin/light/assets/pages/jquery.datatables.init.js")}}"></script>

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

    <script type="text/javascript">
        $(document).ready(function() {
            $('.summernote').summernote();
            $(".select2").select2();
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                todayHighlight:'TRUE',
                autoclose: true,
                startDate: new Date()
            });

            $("a[data-toggle=\"tab\"]").on("shown.bs.tab", function (e) {
              console.log( 'show tab' );
                $($.fn.dataTable.tables(true)).DataTable()
                  .columns.adjust()
                  .responsive.recalc();
            });

              $('a[data-toggle=\"tab\"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
              });
              var activeTab = localStorage.getItem('activeTab');
              if(activeTab){
                $('#myTab a[href="' + activeTab + '"]').tab('show');
              }

            var table = $('#staff_list').DataTable({
                "columnDefs": [
                    { "visible": false, "targets": 2 }
                ],
                "order": [[ 2, 'asc' ]],
                 scrollY:        '50vh',
                scrollCollapse: true,
                paging:         false,
                "drawCallback": function ( settings ) {
                    var api = this.api();
                    var rows = api.rows( {page:'current'} ).nodes();
                    var last=null;
         
                    api.column(2, {page:'current'} ).data().each( function ( group, i ) {
                        if ( last !== group ) {
                            $(rows).eq( i ).before(
                                '<tr class="group"><td colspan="7">'+group+'</td></tr>'
                            );
         
                            last = group;
                        }
                    } );
                }
            } );
         
            // Order by the grouping
            $('#staff_list tbody').on( 'click', 'tr.group', function () {
                var currentOrder = table.order()[0];
                if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
                    table.order( [ 2, 'desc' ] ).draw();
                }
                else {
                    table.order( [ 2, 'asc' ] ).draw();
                }
            });

            $('#srr_table').DataTable( {
                scrollY:        '50vh',
                 scrollX: true,
                scrollCollapse: true,
                paging:         false
            });

             $('#srr_table1').DataTable( {
                scrollY:        '50vh',
                 scrollX: true,
                scrollCollapse: true,
                paging:         false
            });
        });
    </script>
</body>

</html>
