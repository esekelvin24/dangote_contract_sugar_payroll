@extends('layouts.datatable-adminlte2-4-0')
@section('title') Dashboard @endsection
@section('content') 



@php
      $profile_update_arr = array();

      if(Auth::user()->department_id == 38) //Update your department
      {
           $profile_update_arr[] = "Department";
      }

      if(Auth::user()->phone == "") //Update your phone number
      {
           $profile_update_arr[] = "Phone Number";
      }

      

      //dd(count($profile_update_arr));

      if (count($profile_update_arr) > 0)
      {
      
           echo ' <script>

               swal("Profile Update", "You are required to update your profile before you can proceed, Ensure your department and phone number  is filled up correctly", "warning")
           swal({
                  title: "Profile Update",
                  text: "You are required to update your profile before you can proceed, Ensure your department and phone number is filled up correctly",
                  type: "warning",
                  showCancelButton: false,
                  allowEscapeKey : false,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Yes, Update",
                  closeOnConfirm: false
                },
                function(){
                  location.href = "'.url("/edit_user/".Auth::user()->id).'";
                });
           
           </script>';
           
           ;
           
      }


     
@endphp

{{-- dd($HR_Officer_details->all()) --}}

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Home
        <!--<small>Main</small>-->
      </h1>
      <ol class="breadcrumb">
        <!--<li><a href="{{ url('/main') }}"><i class="fa fa-dashboard active" style="color: blue;"></i> Home</a></li>-->
        <li> <i class="fa fa-home active" style="color: blue;"></i> Home </li>
        <!--<li class="active">Dashboard</li>-->
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->

      <!-- <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 callout callout-info">
                  <strong>HR BUSINESS PARTNER </strong>
            </div>
      </div> -->
      <div class="row">
        
<div class="" style="background-color:white" >
              <!-- <div class="box-header with-border">
                  <h3 class="box-title">Relationship Officer (HR)</h3>
              </div> -->
              <div class="box-body" style="margin: 0px;" >
                    <div class="col-md-4" >

                    <!-- <form method = 'POST' action = '{!!url("store_first_time_user")!!}' enctype="multipart/form-data">
                               <input type = 'hidden' name = '_token' value = '{{Session::token()}}'> -->
                              <!-- general form elements -->
                              
                                
                                <!-- /.box-header -->
                                <!-- form start -->
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name">HAM BP Name:&nbsp;&nbsp;</label>
                                    <!-- <label>{{--$HR_Officer_details->name--}}</label> -->
                                    <label>
                                          @if($HR_Officer_details->count()>0)
                                          {{$HR_Officer_details[0]->name}}
                                          @else
                                          {{"---"}}
                                          @endif
                                    </label>
                                    
                                   
                                </div>
                      </div>
                                

                      <div class="col-md-4">

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="name">HAM BP E-mail:&nbsp;&nbsp;</label>
                                    <label> 
                                          @if($HR_Officer_details->count()>0)
                                          {{$HR_Officer_details[0]->email}}
                                          @else
                                          {{"---"}}
                                          @endif</label>
                                </div>

                                <!-- <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                                            <label >CUG Number:&nbsp;&nbsp;</label>
                                            <label> 
                                          @if($HR_Officer_details->count()>0)
                                          {{$HR_Officer_details[0]->phone}}
                                          @else
                                          {{"---"}}
                                          @endif</label>
                                </div>       -->
                              
                      </div>
                      <div class="col-md-4">           
                                <div class="form-group{{ $errors->has('personal_email_id') ? ' has-error' : '' }}">
                                            <label for="designation">HAM BP Phone Number:&nbsp;&nbsp;</label>
                                            <label> 
                                            @if($HR_Officer_details->count()>0)
                                            {{$HR_Officer_details[0]->phone}}
                                            @else
                                            {{"---"}}
                                            @endif
                                          </label>
                                </div> 

                                
                                
                      </div>
                    </div>
              </div>
</div>

















{{-- /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// --}}
@permission(('can-see-the-others-bar'))  
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12 callout callout-success">
<strong> MY CORNER </strong>
   </div>
 </div>
@endpermission

<div class="row">

  <div class="col-md-3 col-sm-3 col-xs-6">
       <div class="info-box">
         <a href="{{url('/my_attendance/'. Auth::user()->sap)}}" style="text-decoration:none; color:black">
        <i style="font-size:50px" class="fa fa-calendar-check-o"></i>
        <span style="font-size:40px; font-weight:bold; display:block; color:white">0</span>
        <span style="  display:block;font-weight:bold;">My Attendance</span>
         </a>
         <!--  <a href="{{url('/my_attendance/'. Auth::user()->sap)}}">
          <span class="info-box-icon bg-green"><i class="fa fa-calendar-check-o"></i></span></a> 

            <div class="info-box-content">
                <span class="info-box-text"></span>
            </div> -->
      </div>
  </div> 

  <div class="col-md-3 col-sm-3 col-xs-6">
      <div class="info-box">
              <a href="{{url('/my_attendance_regularisation_list/'. Auth::user()->sap)}}" style="text-decoration:none; color:black">
               
                    <i style="font-size:50px" class="fa fa-calendar-times-o"></i>
                    <span style="font-size:40px; font-weight:bold; display:block">{{$my_Regularisation}}</span>
                    <!-- <span style="color:#da242b; display:block;font-weight:bold;">My Regularization List</span> -->
                    <span style=" display:block;font-weight:bold;">My Previous Regularization</span>
              </a>
       <!-- <a href="{{url('/my_attendance_regularisation_list/'. Auth::user()->sap)}}"><span class="info-box-icon bg-green"><i class="fa fa-calendar-times-o"></i></span></a> 

        <div class="info-box-content">
       <span class="info-box-text">My Regularization List</span>
       <span style="font-size:50px; font-weight:bold"><a href="#">{{$my_Regularisation}}</a></span>
        </div> -->
      </div>
    </div> 

  <div class="col-md-3 col-sm-3 col-xs-12" >
      <div class="info-box">
      <a href="{{url('/my_leave_request_list/'. Auth::user()->sap)}}" style="text-decoration:none; color:black">
               
               <i style="font-size:50px" class="fa fa-pied-piper-alt"></i>
               <span style="font-size:40px; font-weight:bold; display:block">{{$my_Leave}}</span>
               <!-- <span style="color:#da242b; display:block;font-weight:bold;">My Regularization List</span> -->
               <span style=" display:block;font-weight:bold;">My Leave Request</span>
         </a>
       <!-- <a href="{{url('/my_leave_request_list/'. Auth::user()->sap)}}"><span class="info-box-icon bg-green"><i class="fa fa-pied-piper-alt"></i></span></a> 

        <div class="info-box-content">
       <span class="info-box-text">My Leave Request List</span>
       <span style="font-size:50px; font-weight:bold"><a href="#">{{$my_Leave}}</a></span>
        </div> -->
      </div>
    </div> 


  <!-- <div class="col-md-3 col-sm-3 col-xs-3">
      <div class="info-box">
       <a href="#"><span class="info-box-icon bg-green"><i class="fa fa-plane"></i></span></a> 

        <div class="info-box-content">
       <span class="info-box-text">My Travel Request List</span>
        </div>
      </div>
    </div>  -->

    @permission(('can-view-staff'))
         <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">

          <a href="{{url('/my_staff/non')}}" style="text-decoration:none; color:black">
               
               <i style="font-size:50px" class="fa fa-users"></i>
               <span style="font-size:40px; font-weight:bold; display:block">{{$all_staff}}</span>
               <!-- <span style="color:#da242b; display:block;font-weight:bold;">My Regularization List</span> -->
               <span style=" display:block;font-weight:bold;">My Staff</span>
          </a>

<!--           
           <a href="{{url('/my_staff/non')}}"><span class="info-box-icon bg-blue"><i class="fa fa-users"></i></span></a> 

            <div class="info-box-content">
           <span class="info-box-text">My Staff</span>
           <span style="font-size:50px; font-weight:bold"><a href="#">{{$all_staff}}</a></span>
            </div> -->
          </div>
        </div> 
   @endpermission

   @permission(('view-other-staff-reg-list'))
  <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
          <a href="{{url('/view_other_staff_reg_list')}}" style="text-decoration:none; color:black">
               
               <i style="font-size:50px" class="fa fa-list-alt"></i>
               <span style="font-size:40px; font-weight:bold; display:block">{{$all_Regularisation}}</span>
               <!-- <span style="color:#da242b; display:block;font-weight:bold;">My Regularization List</span> -->
               <span style=" display:block;font-weight:bold;">Regularization Approval</span>
          </a>
                  <!--       
                  <a href="{{url('/view_other_staff_reg_list')}}"><span class="info-box-icon bg-blue"><i class="fa fa-calendar-times-o"></i></span></a> 

                    <div class="info-box-content">
                        <span class="info-box-text">Regularization List</span>
                        <span style="font-size:50px; font-weight:bold"><a href="#">{{$all_Regularisation}}</a></span>
                    </div> --> 
      </div>
    </div> 
  @endpermission
  @permission(('view-other-staff-reg-list'))
  <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
                <a href="{{url('/view_leave_req_list')}}" style="text-decoration:none; color:black">
                        
                        <i style="font-size:50px" class="fa fa-th-list "></i>
                        <span style="font-size:40px; font-weight:bold; display:block">{{$all_Leave}}</span>
                        <!-- <span style="color:#da242b; display:block;font-weight:bold;">My Regularization List</span> -->
                        <span style=" display:block;font-weight:bold;">Leave Request Approval</span>
                  </a>

                  <!--                 
                  <a href="{{url('/view_leave_req_list')}}"><span class="info-box-icon bg-blue"><i class="fa fa-pied-piper-alt"></i></span></a> 
                  <div class="info-box-content">
                      <span class="info-box-text">Leave Request</span>
                      <span style="font-size:50px; font-weight:bold"><a href="#">{{$all_Leave}}</a></span>
                  </div> -->
      </div>
    </div> 
  @endpermission





    @permission(('can-see-the-others-bar'))
<div class="row">
  <!-- <div class="col-md-12 col-sm-12 col-xs-12 callout callout-warning">
<strong> OTHERS</strong>
   </div> -->
 </div>
@endpermission

      <div class="row">

  

 <!-- @permission(('can-upload-attendance'))
         <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
           <a href="{{url('/attendance_upload')}}"><span class="info-box-icon bg-blue"><i class="fa fa-upload"></i></span></a> 

            <div class="info-box-content">
           <span class="info-box-text">Upload Attendance</span>
            </div>
          </div>
        </div> 
   @endpermission -->

    <!-- @permission(('can-view-all-users'))
         <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
           <a href="{{url('/manage_users/non')}}"><span class="info-box-icon bg-blue"><i class="fa fa-user-plus"></i></span></a> 

            <div class="info-box-content">
           <span class="info-box-text">Manage All Users</span>
            </div>
          </div>
        </div> 
   @endpermission -->

   

  


  <!-- @permission(('view-other-staff-reg-list'))
  <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
       <a href="#"><span class="info-box-icon bg-blue"><i class="fa fa-plane"></i></span></a> 

        <div class="info-box-content">
       <span class="info-box-text">Travel Request</span>
       <span style="font-size:50px; font-weight:bold"><a href="#">0</a></span>
        </div>
      </div>
    </div> 
  @endpermission

 </div> -->










          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
 
@endsection