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
                                            <form method="POST" action="{{url('/user-list/new-user/save')}}">

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
                                                                <div class="form-group @error('email') has-error @enderror">
                                                                        <span class="txt-danger" style="font-size:19px;">*</span>    <label class="control-label mb-10">Email</label>
                                                                    <input type="text" id="email" name="email" class="form-control" value="{{ old('email')!=""?old('email'):$user_list->first()->email }}" required autocomplete="email"  placeholder="Enter User Email">
                                                                    @error('email')
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
                                                                    <option {{ old('gender')=="male"?"selected":"" }}  value="male">Male</option>
                                                                    <option {{ old('gender')=="female"?"selected":"" }} value="female">Female</option>
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

                                                    
                                                    
                                                   
                                                        <!-- /Row -->

                                                        
                                                    <div class="row">

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


                                                 <br/>
                                                 <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account-box mr-10"></i>Login Configuration</h6>
                                                 <hr class="light-grey-hr">

                                                 <label class="control-label mb-10">Security Options</label><br/>

                                                 <div class="row">
                                                    <div class="col-sm-3">
                                                            <div class="checkbox">
                                                                    <input {{$user_list->first()->passchg_logon=="1"?"checked":""}} id="passchg_logon" name="passchg_logon"  type="checkbox" value="1">
                                                                    <label for="passchg_logon">
                                                                    Change Password at next logon
                                                                    </label>
                                                            </div>
                                                    </div>

                                                    <div class="col-sm-3">
                                                            <div class="checkbox">
                                                                    <input {{$user_list->first()->user_locked=="1"?"checked":""}} id="user_locked" name="user_locked" type="checkbox" value="1">
                                                                    <label for="user_locked">
                                                                    Check here to lock this User
                                                                    </label>
                                                            </div>
                                                    </div>
                                                </div>
                                                 <div class="row">
                                                    <div class="col-sm-3">
                                                            <div class="checkbox">
                                                                    <input {{$user_list->first()->user_disabled=="1"?"checked":""}}  id="user_disabled" id="user_disabled" type="checkbox" value="1">
                                                                    <label for="user_disabled">
                                                                    Check here to disable this User
                                                                    </label>
                                                            </div>
                                                    </div>
                                                </div>
                                                

                                                

                                                 <br/>
                                                 <br/>
                                                 <label class="control-label mb-10">Choose Login Days</label><br/>
                                                 <div class="row">
                                                 <div class="col-sm-1">
                                                        <div class="checkbox">
                                                                <input {{$user_list->first()->day_1=="1"?"checked":""}}  id="day_1" name="day_1" type="checkbox" value="1">
                                                                <label for="day_1">
                                                                    Monday
                                                                </label>
                                                          </div>
                                                    </div>

                                                    <div class="col-sm-1">
                                                            <div class="checkbox">
                                                                    <input {{$user_list->first()->day_2=="1"?"checked":""}} id="day_2" name="day_2" type="checkbox" value="1">
                                                                    <label for="day_2">
                                                                        Tuesday
                                                                    </label>
                                                              </div>
                                                        </div>

                                                        <div class="col-sm-1">
                                                                <div class="checkbox">
                                                                        <input {{$user_list->first()->day_3=="1"?"checked":""}} id="day_3" name="day_3" type="checkbox" value="1">
                                                                        <label for="day_3">
                                                                            Wednessday
                                                                        </label>
                                                                  </div>
                                                            </div>

                                                            <div class="col-sm-1">
                                                                    <div class="checkbox">
                                                                            <input {{$user_list->first()->day_4=="1"?"checked":""}} id="day_4" name="day_4" type="checkbox" value="1">
                                                                            <label for="day_4">
                                                                                Thursday
                                                                            </label>
                                                                      </div>
                                                                </div>

                                                                <div class="col-sm-1">
                                                                        <div class="checkbox">
                                                                                <input {{$user_list->first()->day_5=="1"?"checked":""}} id="day_5" name="day_5" type="checkbox" value="1">
                                                                                <label for="day_5">
                                                                                    Friday
                                                                                </label>
                                                                          </div>
                                                                    </div>

                                                                    <div class="col-sm-1">
                                                                            <div class="checkbox">
                                                                                    <input {{$user_list->first()->day_6=="1"?"checked":""}} id="day_6" name="day_6" type="checkbox" value="1">
                                                                                    <label for="day_6">
                                                                                        Saturday
                                                                                    </label>
                                                                              </div>
                                                                        </div>

                                                                        <div class="col-sm-1">
                                                                                <div class="checkbox">
                                                                                        <input {{$user_list->first()->day_7=="1"?"checked":""}} id="day_7" name="day_7" type="checkbox" value="1">
                                                                                        <label for="day_7">
                                                                                          Sunday
                                                                                        </label>
                                                                                  </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                                    <div class="col-sm-3">
                                                                                            <div class="checkbox">
                                                                                                    <input {{$user_list->first()->override_wh=="1"?"checked":""}} id="override_wh" name="override_wh" name="override_wh" type="checkbox" value="1">
                                                                                                    <label for="override_wh">
                                                                                                        Override Global Working Hours
                                                                                                    </label>
                                                                                            </div>
                                                                                    </div>
                                                                        </div>
                                                  
                                                  


                                                    <br/>
                                                    <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account-box mr-10"></i>Permission Configuration</h6>
                                                    <hr class="light-grey-hr">    
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group @error('role') has-error @enderror">
                                                                    <span class="txt-danger" style="font-size:19px;">*</span>   <label class="control-label mb-10">Role</label>
                                                                <select id="role" name="role" class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                    
                                                                    <option value="">Choose a Role</option>
                                                                    @if(count($roles) > 0)
                                                                      @foreach ($roles as $role)
                                                                            <option {{  $role_id==$role->id?"selected":"" }} value="{{$role->id}}">{{$role->role_name}}</option>
                                                                      @endforeach
                                                                    @endif
                                                                    
                                                                </select>
                                                                @error('role')
                                                                        <span class="help-block" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                                <div class="form-group @error('department_id') has-error @enderror">
                                                                  <span class="txt-danger" style="font-size:19px;">*</span> <label class="control-label mb-10">Department</label>
                                                                  <select required  id="department_id" name="department_id" class="form-control" data-placeholder="Choose a Department" tabindex="1">
                                                                      
                                                                      <option value="">Choose a Department</option>
                                                                      @if(count($dept_array_list) > 0)
                                                                        @foreach ($dept_array_list as $department_arr)
                                                                              <option {{ $user_list->first()->department_id==$department_arr->department_id?"selected":"" }} value="{{$department_arr->department_id}}">{{$department_arr->department_name}}</option>
                                                                        @endforeach
                                                                      @endif
                                                                      
                                                                  </select>
                                                                  @error('role')
                                                                          <span class="help-block" role="alert">
                                                                              <strong>{{ $message }}</strong>
                                                                          </span>
                                                                  @enderror
                                                              </div>
                                                      </div>
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