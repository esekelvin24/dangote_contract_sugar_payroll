@extends('layouts.dashboard', ['menu_header' => $menu_header,'parent' => $parent])

@section('content')

<div class="container-fluid">

        <div class="row heading-bg">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h5 class="txt-dark">Staff Update</h5>
                </div>
                <!-- Breadcrumb -->
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="/user-list">Staff List</a></li>
                    <li class="active"><span>Edit Staff</span></li>
                </ol>
                </div>
                <!-- /Breadcrumb -->
        </div>



        <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default card-view">
                        
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-12 col-xs-12">
                                        <div class="form-wrap">
                                            <form method="POST" action="{{url("/edit-staff/save/".$staff_details->first()->staff_id)}}">

                                                @csrf
                                                <div class="form-body">
                                                        <br/>
                                                        <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account-box mr-10"></i>Departmental Information</h6>
                                                        <hr class="light-grey-hr">    
                                                        <div class="row">
                                                                

                                                                <div class="col-md-3">
                                                                        <div class="form-group @error('department_id') has-error @enderror">
                                                                          <span class="txt-danger" style="font-size:19px;">*</span> <label class="control-label mb-10">Department</label>
                                                                          <select onchange="get_section(this.value)" id="department_id" name="department_id" class="form-control" data-placeholder="Choose a Department" tabindex="1">
                                                                              
                                                                              <option value="">Choose a Department</option>
                                                                              @if(count($dept_array_list) > 0)
                                                                                @foreach ($dept_array_list as $department_arr)

                                                                                @php
                                                                                    
                                                                                   if( old('department_id')!="") 
                                                                                   {
                                                                                    $selected = old('department_id')==$department_arr->department_id?"selected":"";
                                                                                   }else
                                                                                   {
                                                                                    $selected = $staff_details->first()->department_id==$department_arr->department_id?"selected":"";
                                                                                   }


                                                                                @endphp
                                                                                      <option {{ $selected }} value="{{$department_arr->department_id}}">{{$department_arr->department_name}}</option>
                                                                                @endforeach
                                                                              @endif
                                                                              
                                                                          </select>
                                                                          @error('department_id')
                                                                                  <span class="help-block" role="alert">
                                                                                      <strong>{{ $message }}</strong>
                                                                                  </span>
                                                                          @enderror
                                                                      </div>
                                                              </div>
                                                             
                                                         <div class="col-md-3">
                                                                        <div class="form-group ">
                                                                            <span class="txt-danger" style="font-size:19px;">*</span>    <label class="control-label mb-10 text-left">Staff Type</label>
                                                                            <select id="staff_type" name="staff_type" class="form-control" data-placeholder="Choose a Category" tabindex="1">
                                                                            @if(count($staff_type) > 0)
                                                                               @foreach($staff_type as $type)
                                                                                    <option {{ $staff_details->first()->staff_type_id==$type->staff_type_id?"selected":"" }} value="{{$type->staff_type_id}}">{{$type->staff_type_name}}</option>
                                                                              @endforeach
                                                                            @endif
                                                                        </select>
                                                                        @error('staff_type')
                                                                        <span class="help-block" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                        </div>
                                                                 </div>
        
                                                         
        
                                                            <div class="col-lg-2">
                                                                    <div class="form-group mb-0">
                                                                        <label class="control-label mb-10 text-left">Section</label>
                                                                        <select  id="section_id" name="section_id" class="form-control" data-placeholder="Choose a Section" tabindex="1">
                                                                        @php
                                                                            $section_list = DB::table("section")->where("department_id","=",$staff_details->first()->department_id)->get();
                                                                            
                                                                            echo '<option value="">Choose a Section</option>';
                                                                            foreach($section_list as $section)
                                                                            {
                                                                                $selected = $section->section_id == $staff_details->first()->section_id?"selected":"";
                                                                                echo '<option '.$selected.' value="'.$section->section_id.'">'.$section->section_name.'</option>';
                                                                            }
                                                                        @endphp
                                                                        </select>
        
                                                                        @error('section_id')
                                                                        <span class="help-block" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                 <!--/span-->
                                                    <div style="max-width:165px !important;" class="col-md-3">
                                                            <div class="form-group @error('engagement_date') has-error @enderror">
                                                                <span class="txt-danger" style="font-size:19px;">*</span>  <label class="control-label mb-10">Engagement Date</label>
                                                                <input required autocomplete="off" name="engagement_date" id="engagement_date" type="text" class="form-control @error('engagement_date') is-invalid @enderror" value="{{ $staff_details->first()->engagement_date }}" placeholder="yyyy-mm-dd">
                                                                
                                                                @error('engagement_date')
                                                                    <span class="help-block" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <!--/span-->

                                                            </div>
                                                    <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account mr-10"></i>Person's Info</h6>
                                                    <hr class="light-grey-hr">
                                                     
                                                    <div class="row">
                                                        
                                                        <div style="max-width:180px !important;" class="col-md-3">
                                                            <div class="form-group @error('first_name') has-error @enderror">
                                                                <label class="control-label mb-10">First Name</label>
                                                                <span class="txt-danger" style="font-size:19px;">*</span> <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name')==""?$staff_details->first()->first_name:old('first_name') }}" placeholder="Enter First Name" required autocomplete="name" autofocus>
                                                                @error('first_name')
                                                                    <span class="help-block" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div style="max-width:180px !important;" class="col-md-3">
                                                            <div class="form-group @error('last_name') has-error @enderror">
                                                                <span class="txt-danger" style="font-size:19px;">*</span>   <label class="control-label mb-10">Last Name</label>
                                                                <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name')==""?$staff_details->first()->last_name:old('last_name') }}" required autocomplete="lastname"  placeholder="Enter Last Name">
                                                                @error('last_name')
                                                                    <span class="help-block" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <!--/span-->
                                                        <div style="max-width:180px !important;" class="col-md-3">
                                                            <div class="form-group @error('othername') has-error @enderror">
                                                                <label class="control-label mb-10">Other Name </label>
                                                                <input type="text" id="othername" name="othername" class="form-control" value="{{ old('other_name')==""?$staff_details->first()->other_name:old('other_name') }}"  placeholder="Enter Other Name">
                                                                @error('othername')
                                                                    <span class="help-block" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <!--/span-->
     
                                                            
                                                    <!--/span-->
                                                    <div style="max-width:190px !important;" class="col-md-3">
                                                        <div class="form-group @error('gender') has-error @enderror">
                                                            <span class="txt-danger" style="font-size:19px;">*</span> <label class="control-label mb-10">Gender</label>
                                                            <select name="gender" id="gender" class="form-control" required>
                                                                <option value="">Choose a Gender</option>
                                                                <option {{ $staff_details->first()->gender=="Male"?"selected":"" }}  value="Male">Male</option>
                                                                <option {{ $staff_details->first()->gender=="Female"?"selected":"" }} value="Female">Female</option>
                                                            </select>
                                                            @error('gender')
                                                                    <span class="help-block" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                        
                                                        </div>
                                                    </div>

                                                    <!--/span-->
                                                    <div style="max-width:180px !important;" class="col-md-3">
                                                            <div class="form-group @error('gender') has-error @enderror">
                                                                <span class="txt-danger" style="font-size:19px;">*</span>  <label class="control-label mb-10">Marital Status</label>
                                                                <select name="marital_status" id="marital_status" class="form-control" required>
                                                                    <option value="">Marital Status</option>
                                                                    <option {{ $staff_details->first()->marital_status=="Single"?"selected":"" }}  value="Single">Single</option>
                                                                    <option {{ $staff_details->first()->marital_status=="Married"?"selected":"" }} value="Married">Married</option>
                                                                    <option {{ $staff_details->first()->marital_status=="Seperated"?"selected":"" }} value="Seperated">Seperated</option>
                                                                </select>
                                                                @error('gender')
                                                                        <span class="help-block" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                @enderror
                                                            
                                                            </div>
                                                        </div>

                                                    <!--/span-->
                                                    <div style="max-width:140px !important;" class="col-md-3">
                                                        <div class="form-group @error('dob') has-error @enderror">
                                                            <span class="txt-danger" style="font-size:19px;">*</span>  <label class="control-label mb-10">Date of Birth</label>
                                                            <input required autocomplete="off" name="dob" id="dob" type="text" class="form-control @error('dob') is-invalid @enderror" value="{{ $staff_details->first()->dob }}" placeholder="yyyy-mm-dd">
                                                            
                                                            @error('dob')
                                                                <span class="help-block" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <!--/span-->

                                                </div>
                                                 
                                                

                                                    <br/>
                                                    <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account-box mr-10"></i>Salary Information</h6>
                                                    <hr class="light-grey-hr">    
                                                    <div class="row">

                                                            <div class="col-lg-2">
                                                                    <div class="form-group mb-0">
                                                                        <span class="txt-danger" style="font-size:19px;">*</span>     <label class="control-label mb-10 text-left">Job Category</label>
                                                                        <select onchange="get_desig(this.value)" required id="category_id" name="category_id" class="form-control" data-placeholder="Choose a Designation" tabindex="1">
                                                                                  
                                                                            <option value="">Choose a Category</option>
                                                                            @if(count($cat_array_list) > 0)
                                                                            
                                                                            @foreach ($cat_array_list as $cat_arr)
                                                                            @php
                                                                                if( old('category_id')!="") 
                                                                                   {
                                                                                    $selected = old('category_id')==$cat_arr->category_id?"selected":"";
                                                                                   }else
                                                                                   {
                                                                                    $selected = $staff_details->first()->category_id==$cat_arr->category_id?"selected":"";
                                                                                   }

                                                                            @endphp
                                                                                    <option {{ $selected }} value="{{$cat_arr->category_id}}">{{$cat_arr->category_name}}</option>
                                                                            @endforeach
                                                                            @endif
                                                                            
                                                                        </select>

                                                                @error('designation_id')
                                                                <span class="help-block" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                            <div class="col-lg-2">
                                                                    <div class="form-group mb-0">
                                                                        <span class="txt-danger" style="font-size:19px;">*</span>     <label class="control-label mb-10 text-left">Position</label>
                                                                        <select onchange="get_desig_salary(this.value)" required id="designation_id" name="designation_id" class="form-control" data-placeholder="Choose a Designation" tabindex="1">
                                                                               
                                                                               @php
                                                                                $position_list = DB::table("designation_view")->where("department_id","=",$staff_details->first()->department_id)->get();
                                                                                
                                                                                echo '<option value="">Choose a Section</option>';
                                                                                foreach($position_list as $position)
                                                                                {
                                                                                    $selected = $position->designation_id == $staff_details->first()->designation_id?"selected":"";
                                                                                    echo '<option '.$selected.' value="'.$position->designation_id.'">'.$position->designation_name.'</option>';
                                                                                }

                                                                            @endphp

                                                                        </select>
    
                                                                        @error('designation_id')
                                                                        <span class="help-block" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            
                                                            <div style="max-width:150px !important;" class="col-md-3">
                                                                    <div class="form-group @error('designation_salary') has-error @enderror">
                                                                        <label class="control-label mb-10">Position Salary</label>
                                                                        @php
                                                                            $position_salary_obj = DB::table("designation_salary_view")
                                                                            ->where("category_id","=",$staff_details->first()->category_id)
                                                                            ->where("designation_id","=",$staff_details->first()->designation_id)
                                                                            ->first();
                                                                            $position_salary = isset($position_salary_obj->monthly_amount)?$position_salary_obj->monthly_amount:"";

                                                                        @endphp

                                                                        <input readonly type="text" id="designation_salary" name="designation_salary" class="form-control" value="{{ old('designation_salary')==""?$position_salary:old('designation_salary') }}"  autocomplete="designation_salary"  placeholder="">
                                                                        @error('designation_salary')
                                                                            <span class="help-block" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <!--/span-->

                                                                <div style="max-width:150px !important;" class="col-md-3">
                                                                        <div class="form-group @error('additional_bonus') has-error @enderror">
                                                                            <label class="control-label mb-10">Additional Pay</label>
                                                                            @php
                                                                                $position_salary_obj = DB::table("staff_other_allowance_view")
                                                                                ->where("staff_id","=",$staff_details->first()->staff_id)
                                                                                ->first();
                                                                                $additional_salary = isset($position_salary_obj->monthly_amount)?$position_salary_obj->monthly_amount:"";

                                                                            @endphp
                                                                            <input type="text" id="additional_bonus" name="additional_bonus" class="form-control" value="{{ old('additional_bonus')==""?$additional_salary:old('additional_bonus') }}"  autocomplete="additional_bonus"  placeholder="">
                                                                            @error('additional_bonus')
                                                                                <span class="help-block" role="alert">
                                                                                    <strong>{{ $message }}</strong>
                                                                                </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                    
                                                                    <!--/span-->

                                                    </div>








                                                 <br/>
                                                 <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account-box mr-10"></i>Contact Information</h6>
                                                 <hr class="light-grey-hr">
                                                 <div class="row">

                                                        <div style="max-width:180px !important;" class="col-md-3">
                                                                <div class="form-group @error('email') has-error @enderror">
                                                                    <label class="control-label mb-10">Email</label>
                                                                    <input type="text" id="email" name="email" class="form-control" value="{{ old('email')==""?$staff_details->first()->email:old('email') }}"  autocomplete="email"  placeholder="Enter Email">
                                                                    @error('email')
                                                                        <span class="help-block" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <!--/span-->
                                                        
                                                    <div style="max-width:190px !important;" class="col-md-3">
                                                        <div class="form-group @error('phone') has-error @enderror">
                                                            <span class="txt-danger" style="font-size:19px;">*</span>  <label class="control-label mb-10">Phone</label>
                                                            <input required autocomplete="off" name="phone" id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone')==""?$staff_details->first()->mobile_phone:old('phone') }}" placeholder="Enter Phone Number">
                                                            
                                                            @error('phone')
                                                                <span class="help-block" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                   
                                                        <div style="max-width:280px !important;"  class="col-md-3">
                                                            <div class="form-group ">
                                                                <span class="txt-danger" style="font-size:19px;">*</span>  <label class="control-label mb-10 text-left">State of Residence</label>
                                                                <select onchange="get_lga(this.value)" id="state" name="state" class="form-control" data-placeholder="Choose a State" tabindex="1">
                                                                    <option value="">Choose a State</option>
                                                                    @if(count($state_list) > 0)
                                                                   @foreach($state_list as $state)
                                                                        <option {{$state->stateid==$staff_details->first()->stateid?"selected":""}} value="{{$state->stateid}}">{{$state->State}}</option>
                                                                  @endforeach
                                                                @endif
                                                            </select>
                                                            @error('state')
                                                            <span class="help-block" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-2">
                                                            <div class="form-group mb-0">
                                                                <span class="txt-danger" style="font-size:19px;">*</span>   <label class="control-label mb-10 text-left">Local GOVT. </label>
                                                                <select required id="lga_id" name="lga_id" class="form-control" data-placeholder="Choose a LGA" tabindex="1">
                                                                    @php
                                                                        $state_list = DB::table("lga")->where("stateid","=",$staff_details->first()->stateid)->get();
                                                                        
                                                                        echo '<option value="">Choose a Section</option>';
                                                                        foreach($state_list as $state)
                                                                        {
                                                                            $selected = $state->lgaid == $staff_details->first()->lgaid?"selected":"";
                                                                           echo '<option '.$selected.' value="'.$state->lgaid.'">'.$state->lga.'</option>';
                                                                        }

                                                                    @endphp
                                                                </select>

                                                                @error('section_id')
                                                                <span class="help-block" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    

                                                    <div class="col-md-4">
                                                            <div class="form-group @error('address') has-error @enderror">
                                                                <span class="txt-danger" style="font-size:19px;">*</span>   <label class="control-label mb-10">Address</label>
                                                                <input required autocomplete="off" name="address" id="address" type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address')==""?$staff_details->first()->address:old('address')}}" placeholder="Enter user address">
                                                                
                                                                @error('address')
                                                                    <span class="help-block" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                 </div>
                                                 



                                                 <br/>
                                                 <h6 class="txt-dark capitalize-font"><i class="zmdi zmdi-account-box mr-10"></i>Bank Account Information</h6>
                                                 <hr class="light-grey-hr">

                                                 <div class="row">
                                                    <div style="max-width:280px !important;"  class="col-md-3">
                                                        <div class="form-group ">
                                                            <span class="txt-danger" style="font-size:19px;">*</span>  <label class="control-label mb-10 text-left">Bank Name</label>
                                                            <select id="bank_id" name="bank_id" class="form-control" data-placeholder="Choose a Bank" tabindex="1">
                                                            @if(count($bank_list) > 0)
                                                               @foreach($bank_list as $bank)
                                                                    <option {{$staff_details->first()->bin_code==$bank->bin_code?"selected":""}} value="{{$bank->bin_code}}">{{$bank->bank}}</option>
                                                              @endforeach
                                                            @endif
                                                        </select>
                                                        @error('bank_id')
                                                        <span class="help-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                        </div>
                                                 </div>
                                                            <!--/span-->
                                                        
                                                    <div style="max-width:220px !important;" class="col-md-3">
                                                        <div  class="form-group @error('account_no') has-error @enderror">
                                                            <span class="txt-danger" style="font-size:19px;">*</span>   <label class="control-label mb-10">Account Number</label>
                                                            <input required autocomplete="off" name="account_no" id="account_no" type="text" class="form-control @error('account_no') is-invalid @enderror" value="{{ old('account_no')==""?$staff_details->first()->account_number:old('account_no') }}" placeholder="Enter Bank Account Number">
                                                            
                                                            @error('phone')
                                                                <span class="help-block" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-md-2">
                                                            <div style="max-width:220px !important;" class="form-group @error('account_name') has-error @enderror">
                                                                <span class="txt-danger" style="font-size:19px;">*</span>   <label class="control-label mb-10">Account Name</label>
                                                                <input required autocomplete="off" name="account_name" id="account_name" type="text" class="form-control @error('account_name') is-invalid @enderror" value="{{ old('account_name')==""?$staff_details->first()->account_name:old('account_name') }}" placeholder="Enter Bank Account Name">
                                                                
                                                                @error('account_name')
                                                                    <span class="help-block" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                                <div style="max-width:220px !important;" class="form-group @error('bvn') has-error @enderror">
                                                                    <span class="txt-danger" style="font-size:19px;">*</span>   <label class="control-label mb-10">Account BVN</label>
                                                                    <input required autocomplete="off" name="bvn" id="bvn" type="text" class="form-control @error('bvn') is-invalid @enderror" value="{{ old('bvn')==""?$staff_details->first()->bvn:old('bvn') }}" placeholder="Enter Account BVN">
                                                                    
                                                                    @error('bvn')
                                                                        <span class="help-block" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                 </div>
                                                

                                                

                                                    
                                                            

                                                            </div>


                                                        
                                                 
                                                    
                                                  


                                                
                                                        
                                                    <div align="center" class="form-actions mt-10">
                                                        <button type="submit" class="btn btn-info">
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
	    myCalendar = new dhtmlXCalendarObject(["dob","engagement_date"]);
        var SITEURL = '{{URL::to('')}}';

function get_section(value)
{


    $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
    type:'GET',
    url: SITEURL + '/section-list/'+value,
    
    success:function(response){
        //alert(response);
        $('#section_id').html(response);
    }

    });

    
}

function get_lga(value)
{

    $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
    type:'GET',
    url: SITEURL + '/get-lga-list/'+value,
    
    success:function(response){
        //alert(response);
        $('#lga_id').html(response);
    }

    });

}

function get_desig(category_id)
{
    var department_id = $("#department_id").val();
    
    if (department_id !="")
    {
        $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        type:'GET',
        url: SITEURL + '/department-designation-list/'+category_id + "/" + department_id,
        
        success:function(response){
            //alert(response);
            $('#designation_id').html(response);
        }

        });
    }else
    {
        swal({ 
                        title: "Please select a Department",   
                        icon: "warning", 
                        text: "If problem presist, kindly contact the system admin",
                        confirmButtonColor: "#469408",   
                      }).then((value) => {

                         closeMe();

                    });
    }
    
}

function get_desig_salary(value)
{

    var category = $("#category_id").val();

    if (category !="")
    {
        $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
        type:'GET',
        url: SITEURL + '/get-designation-salary/'+value+"/"+category,
        
        success:function(response){
            //alert(response);
            $('#designation_salary').val(response);
        }

        });
    }else
    {
        swal({ 
                        title: "Please select a job category",   
                        icon: "warning", 
                        text: "If problem presist, kindly contact the system admin",
                        confirmButtonColor: "#469408",   
                      }).then((value) => {

                         closeMe();

                    });
    }
    
}

function get_staff_id(value)
{
    
    if ($('#department_id').val() !="")
    {

        if (value == 'new')
        {
            $("#staff_id").prop("disabled", true);
            $("#staff_id").prop('required',false);
        }else
        {
            $("#staff_id").prop("disabled", false);
            $("#staff_id").prop('required',true);

        }

    }else
    {
        swal({ 
                        title: "No department was selected",   
                        icon: "warning", 
                        text: "If problem presist, kindly contact the system admin",
                        confirmButtonColor: "#469408",   
                      }).then((value) => {

                         closeMe();

                    });
    }
        

}




</script>

@endsection 