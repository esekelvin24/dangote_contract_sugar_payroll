<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
               
                
                @permission(('can-create-report'))
                <li> <a class="waves-effect waves-dark" href="{{url('/write_report')}}" aria-expanded="false"><i class="ti-pencil"></i><span class="hide-menu">New Report</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="{{url('/my_reports')}}" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">My Reports</span></a>
                </li>
                @endpermission

                @permission(('can-view-staff'))
                <li> <a class="waves-effect waves-dark" href="{{url('/staff')}}" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">My Staff</span></a>
                </li>
                 @endpermission

                @permission(('can-upload-attendance'))
                <li> <a class="waves-effect waves-dark" href="{{url('/attendance_upload')}}" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Upload Attendance</span></a>
                </li>
                @endpermission

                <li> <a class="waves-effect waves-dark" href="{{url('/my_attendance')}}" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">My Attendance</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="{{url('/leave_request')}}" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Leave Request</span></a>
                </li>
                <li> <a class="waves-effect waves-dark" href="{{url('/attendance_validation')}}" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Attendance Validation</span></a>
                </li>
            </ul>
            <!-- <div class="text-center m-t-30">
                <a href="https://themewagon.com/themes/material-bootstrap-4-free-admin-template/" class="btn waves-effect waves-light btn-warning hidden-md-down">Download Now</a>
            </div> -->
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
    <!-- Bottom points-->
    <div class="sidebar-footer">
         <a href="{{ route('logout') }}" class="link" data-toggle="tooltip" title="Logout" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                     <div class="col-md-6 col-md-offset-6"><i class="mdi mdi-power"></i>
                                     </div></a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                    </form>
       <!--  <a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a> --> </div>
    <!-- End Bottom points-->
</aside>