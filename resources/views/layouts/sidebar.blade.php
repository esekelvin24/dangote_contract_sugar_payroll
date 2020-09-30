 <!--left navigation start-->
                <aside class="sidebar-navigation">
                    <div class="scrollbar-wrapper">
                        <div>
                            <button type="button" class="button-menu-mobile btn-mobile-view visible-xs visible-sm">
                                <i class="mdi mdi-close"></i>
                            </button>
                            <!-- User Detail box -->
                            <div class="user-details">
                                <img class="profile-user-img img-responsive img-circle" src="{{ asset("/css/retina-favicon.png") }}" alt="User profile picture">
                            </div>
                            <!--- End User Detail box -->

                            <!-- Left Menu Start -->
                            <ul class="metisMenu nav" id="side-menu">
                                <li><a href="{{url('/home')}}"><i class="ti-home"></i> Home </a></li>

                                
                                @can('create-report')
                                <li>
                                    <a href="javascript: void(0);" aria-expanded="true"><i class="ti-pencil-alt"></i>My Reports <span class="fa arrow"></span></a>
                                    <ul class="nav-second-level nav" aria-expanded="true">
                                        <li><a href="{{url('/write_report')}}">Write Report</a></li>
                                        <li><a href="{{url('/my_reports')}}">View Reports</a></li>
                                    </ul>
                                </li>
                                @endcan
                                @can('view-staff')
                                <li><a href="{{url('/staff')}}"><i class="ti-pencil"></i> Staff Reports</a></li>
                                @endcan

                                
                            </ul>
                        </div>
                    </div><!--Scrollbar wrapper-->
                </aside>
                <!--left navigation end-->