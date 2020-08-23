@extends('layouts.dashboard', ['menu_header' => $menu_header,'parent' => $parent])

@section('content')

@php
    $user_list = isset($user_list)?$user_list:"";
    $role_arr = Auth::user()->roles;
    $role_id = rtrim($role_arr->pluck('id'),"]");
   $role_id = ltrim($role_id,"[");

    
@endphp

<div class="container-fluid">

        <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Edit User</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="{{url('/user-list')}}">User List</a></li>
                    <li class="active"><span>Edit User</span></li>
                </ol>
                </div>
                <!-- /Breadcrumb -->
        </div>



        <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default card-view">
                        <div class="panel-heading">
                            
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-wrap">
                                            <form method="POST" action="{{url('/profile/edit/save')}}">

                                                @csrf
                                                <div class="form-body">
                                                    <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Person's Info</h6>
                                                    <hr class="light-grey-hr">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group @error('name') has-error @enderror">
                                                                <input type="hidden" value="{{ old('op')!=""?old('name'):"edit" }}" id="op" name="op" />
                                                                <input type="hidden" value="{{ old('id')!=""?old('id'):$id }}" id="id" name="id" />
                                                                    <span class="txt-danger" style="font-size:19px;">*</span>    <label class="control-label mb-10">First Name</label>
                                                                <input type="text" id="name" name="name" class="form-control" value="{{ old('name')!=""?old('name'):$user_list->first()->name }}" placeholder="Enter User First Name" required autocomplete="name" autofocus>
                                                                @error('name')
                                                                    <span class="help-block" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group @error('lastname') has-error @enderror">
                                                                    <span class="txt-danger" style="font-size:19px;">*</span>     <label class="control-label mb-10">Last Name</label>
                                                                <input type="text" id="lastname" name="lastname" class="form-control" value="{{ old('lastname')!=""?old('lastname'):$user_list->first()->lastname }}" required autocomplete="lastname"  placeholder="Enter User Last Name">
                                                                @error('lastname')
                                                                    <span class="help-block" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>

                                                    <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group @error('othername') has-error @enderror">
                                                                    <label class="control-label mb-10">Other Name </label>
                                                                    <input type="text" id="othername" name="othername" class="form-control" value="{{ old('othername')!=""?old('othername'):$user_list->first()->othername }}"  placeholder="Enter User Other Name">
                                                                    @error('othername')
                                                                        <span class="help-block" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                     <div class="col-md-6">
                                                            <div class="form-group @error('phone') has-error @enderror">
                                                                    <span class="txt-danger" style="font-size:19px;">*</span>    <label class="control-label mb-10">Phone</label>
                                                                <input required autocomplete="off" name="phone" id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone')!=""?old('phone'):$user_list->first()->mobile_phone }}" placeholder="Enter User Phone Number">
                                                                
                                                                @error('phone')
                                                                    <span class="help-block" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        </div>
                                                    <!-- /Row -->
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group @error('gender') has-error @enderror">
                                                                       <label class="control-label mb-10">Gender</label>
                                                                <select name="gender" id="gender" class="form-control" >
                                                                    <option value="">Choose a Gender</option>
                                                                    <option {{ $user_list->first()->gender=="male"?"selected":"" }}  value="male">Male</option>
                                                                    <option {{ $user_list->first()->gender=="female"?"selected":"" }} value="female">Female</option>
                                                                </select>
                                                                @error('gender')
                                                                        <span class="help-block" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                


                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div class="col-md-6">
                                                            <div class="form-group @error('dob') has-error @enderror">
                                                                      <label class="control-label mb-10">Date of Birth</label>
                                                                <input  autocomplete="off" name="dob" id="dob" type="text" class="form-control @error('dob') is-invalid @enderror" value="{{ old('dob')!=""?old('dob'):$user_list->first()->dob }}" placeholder="yyyy-mm-dd">
                                                                
                                                                @error('dob')
                                                                    <span class="help-block" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                    </div>

                                                    
                                                    
                                                   
                                                       


                                                

                                                   
                                                        
                                                    <div align="center" class="form-actions mt-10">
                                                        <button type="submit" class="btn btn-success">
                                                                {{ __('Update') }}
                                                            </button>
                                                        <button type="button" class="btn btn-default">Cancel</button>
                                                    </div>
                                                
                                    
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>		
                </div>
            </div>

<script>
 var myCalendar;
	    myCalendar = new dhtmlXCalendarObject(["dob"]);



        if ({{$code}} == "200")
            {
                  swal({ 
                        title: "Successful",   
                        icon: "success", 
                        text: "{{$message}}",
                        confirmButtonColor: "#469408",   
                      }).then((value) => {

                        

                    });

                
            }else if ({{$code}} !="")
            {
                swal({ 
                        title: "Error",   
                        icon: "warning", 
                        text: "{{$message}}",
                        confirmButtonColor: "#469408",   
                      }).then((value) => {

                        

                    });

            }
          
</script>

@endsection 