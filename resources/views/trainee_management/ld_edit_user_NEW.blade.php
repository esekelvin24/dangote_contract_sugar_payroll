@extends('layouts.datatable-adminlte2-4-0')
@section('title') Modify User Details @endsection
@section('content')  

<style type="text/css">
  .container{
    margin-top:20px;
}
.image-preview-input {
    position: relative;
  overflow: hidden;
  margin: 0px;    
    color: #333;
    background-color: #fff;
    border-color: #ccc;    
}
.image-preview-input input[type=file] {
  position: absolute;
  top: 0;
  right: 0;
  margin: 0;
  padding: 0;
  font-size: 20px;
  cursor: pointer;
  opacity: 0;
  filter: alpha(opacity=0);
}
.image-preview-input-title {
    margin-left:2px;
}
</style>
<section class="content-header">
      <h1>
        Modify User Details
      </h1> 
        <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
         @permission(('can-edit-all-users'))
         <li><a href="{{ url('/user_search_list/all?el=') }}"><i class="fa fa-users" style="color: blue;"></i> User Search List</a></li>
         @endpermission
           <li><a href="{{ url('/ld_view_user_details/'.$user_details->id) }}"><i class="fa fa-users" style="color: blue;"></i> View User Details</a></li>
        <li class="active">Modify User Details</li>
      </ol>
</section>

<section class="content">
<!-- SELECT2 EXAMPLE -->
   
       
                                <form  action="{{ url('/save_updated_user_record/'.$user_details->id) }}" method="POST" enctype="multipart/form-data">
                                {{ method_field('PATCH') }}
                                <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>

<!--NEW-->


<div class="row">
      <div class="box box-primary">
              <div class="box-header with-border">
                  <h3 class="box-title">Personal Data</h3>
              </div>
              <div class="box-body">
                    <div class="col-md-6">

                              <!-- general form elements -->
                              
                                
                                <!-- /.box-header -->
                                <!-- form start -->
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name">Last Name</label>  <span class="text-danger" style="font-size:17px; margin-top:3px;"><strong>*</strong></span>
                                    <input id="name" name = "name" type="text" class="form-control" value="{{ $user_details->name }}" required>
                                      @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="form-group{{ $errors->has('personal_email_id') ? ' has-error' : '' }}">
                                            <label for="designation">Personal Email ID</label>
                                            <input id="personal_email_id" name = "personal_email_id" type="text" class="form-control" value="{{ $user_details->personal_email_id  }}" >
                                              @if ($errors->has('personal_email_id'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('personal_email_id') }}</strong>
                                                </span>
                                            @endif
                                </div>
                                
                                
                                
                      </div>

                      <div class="col-md-6">

                                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                    <label for="name">First Name</label> <span class="text-danger" style="font-size:17px; margin-top:3px;"><strong>*</strong></span>
                                    <input id="first_name" name = "first_name" type="text" class="form-control" value="{{ $user_details->first_name }}" required>
                                      @if ($errors->has('first_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('date_of_birth') ? ' has-error' : '' }}">
                                            <label for="date_of_birth">Date Of Birth</label>
                                            <input id="date_of_birth"  autocomplete="off"  placeholder="e.g 1980-08-28" name = "date_of_birth" type="text" class="form-control" 
                                            value="<?php
                                          if( Request::old('date_of_birth')!="" )
                                          echo old('date_of_birth');
                                          else if(isset($user_details->date_of_birth))
                                          echo $user_details->date_of_birth;
                                          ?>" >
                                              @if ($errors->has('date_of_birth'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('date_of_birth') }}</strong>
                                                </span>
                                            @endif
                                </div>     
                              
                      </div>
                    </div>
              </div>
</div>



<div class="row">
      <div class="box box-primary">
              <div class="box-header with-border">
                  <h3 class="box-title">Corporate Information</h3>
              </div>
              <div class="box-body">
                    <div class="col-md-6">
                              
                                
                                <div class="form-group{{ $errors->has('staff_category_id') ? ' has-error' : '' }}"">
                                        <label>Staff category</label> <span class="text-danger" style="font-size:17px; margin-top:3px;"><strong>*</strong></span>
                                        <select onChange=FilterByStaffCategory()  name = 'staff_category_id' id = 'staff_category_id' class = 'form-control' required>
                                        <option value="" disabled>Select Staff Category</option>
                                        @foreach($Staff_categories as $key => $value) 
                                            @if ($user_details->user_category_id == $key)
                                                <option value="{{ $key }}" selected>{{$value}}</option>
                                            @elseif (Request::old('staff_category_id') == $key)
                                                <option value="{{ $key }}" selected>{{$value}}</option>
                                            @else
                                              <option value="{{$key}}">{{$value}}</option>
                                            @endif
                                        @endforeach 
                                        </select>
                              </div>

                                @permission(('can-edit-all-users'))
                                  <div class="form-group{{ $errors->has('sap') ? ' has-error' : '' }}">
                                        <label for="name">Biometric ID/SAP No. </label> <span class="text-danger" style="font-size:17px; margin-top:3px;"><strong>*</strong></span>
                                        <input id="sap" name = "sap" type="text" minlength="1" maxlength="15" class="form-control quantity" value="{{$user_details->sap}}">
                                          @if ($errors->has('sap'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('sap') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                @endpermission 
                        
                                <div class="form-group{{ $errors->has('department_id') ? ' has-error' : '' }}"">
                                        <label>Department</label> <span class="text-danger" style="font-size:17px; margin-top:3px;"><strong>*</strong></span>
                                        <select name = 'department_id' id = 'department_id' class = 'form-control' required>
                                        <option value="">Select Department</option>
                                        @foreach($departments as $key => $value) 
                                            @if ($user_details->department_id == $key)
                                                <option value="{{ $key }}" selected>{{$value}}</option>
                                            @else
                                              <option value="{{$key}}">{{$value}}</option>
                                            @endif
                                        @endforeach 
                                        </select>
                                </div>

                               
                                <div style="display:
                                @if (old('staff_category_id') == 1 || $user_details->user_category_id==1)
                                {{'none'}}
                                @endif
                                " id="PE_number_Div" class="form-group{{ $errors->has('pe_number') ? ' has-error' : '' }}">
                                          <label for="pe_number">PE Number</label>
                                          <input id="pe_number" name = "pe_number" type="text" class="form-control" value="{{ $user_details->pe_number }}" >
                                            @if ($errors->has('pe_number'))
                                              <span class="help-block">
                                              <strong>{{ $errors->first('pe_number') }}</strong>
                                              </span>
                                          @endif
                                </div>
                                <div class="form-group{{ $errors->has('years_of_experience_prior') ? ' has-error' : '' }}">
                                            <label for="years_of_experience_prior">Years of Experience prior to Dangote</label>
                                            <input id="years_of_experience_prior" name = "years_of_experience_prior" type="text" class="form-control" value="{{ $user_details->years_of_experience_prior}}" >
                                              @if ($errors->has('years_of_experience_prior'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('years_of_experience_prior') }}</strong>
                                                </span>
                                            @endif
                                </div>
                                
                                <div class="form-group{{ $errors->has('accommodation_status_id') ? ' has-error' : '' }}"">
                                  <label>Accomodation Status</label>
                                  <select name = 'accommodation_status_id' id = 'accommodation_status_id' class = 'form-control' >
                                  <option value="">Select Status</option>
                                  @foreach($accomodation_statu as $key => $value) 
                                    
                                      @if ($user_details->accommodation_status_id == $key)
                                          <option value="{{ $key }}" selected>{{$value}}</option>
                                      @else
                                        <option value="{{$key}}">{{$value}}</option>
                                      @endif
                                  @endforeach 
                                  </select>
                                </div>

                                <div class="form-group{{ $errors->has('business_unit_id') ? ' has-error' : '' }}"">
                                            <label>Business Unit</label>
                                            <select name = 'business_unit_id' id = 'business_unit_id' class = 'form-control'>
                                            <option value="">Select Business Unit</option>
                                            @foreach($business_units as $key => $value) 
                                            @if ($user_details->business_unit_id == $key)
                                            <option value="{{ $key }}" selected>{{$value}}</option>
                                            @elseif (Request::old('business_unit_id') == $key)
                                            <option value="{{ $key }}" selected>{{$value}}</option>
                                            @else
                                            <option value="{{$key}}">{{$value}}</option>
                                            @endif
                                            @endforeach 
                                            </select>
                                  </div>
            
                      </div>





                    

                    <div class="col-md-6">
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email">Corporate E-mail ID</label> <span class="text-danger" style="font-size:17px; margin-top:3px;"><strong>*</strong></span>
                                    <input id="email" name = "email" type="text" class="form-control" value="{{ $user_details->email}}" required>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
                                          <label for="designation">Designation</label> <span class="text-danger" style="font-size:17px; margin-top:3px;"><strong>*</strong></span>
                                          <input id="designation" name = "designation" type="text" class="form-control" value="{{ $user_details->designation }}" required>
                                            @if ($errors->has('designation'))
                                              <span class="help-block">
                                              <strong>{{ $errors->first('designation') }}</strong>
                                              </span>
                                          @endif
                                </div>

                                <div class="form-group{{ $errors->has('perment_office_location') ? ' has-error' : '' }}"">
                                          <label>Permanent Office Location:</label>
                                          <select name = 'perment_office_location' id = 'perment_office_location' class = 'form-control' >
                                          <option value="">Select Perment Office location:</option>
                                          @foreach($perment_office_locations as $key => $value) 
                                            
                                              @if ($user_details->perment_office_location == $key)
                                                  <option value="{{ $key }}" selected>{{$value}}</option>
                                              @else
                                                <option value="{{$key}}">{{$value}}</option>
                                              @endif
                                          @endforeach 
                                          </select>
                                </div>

                                <div style="display: @if ($user_details->staff_category_id == 1 || $user_details->user_category_id==1 ) {{'none'}}  @endif" id="CERPAC_no_Div" class="form-group{{ $errors->has('cerpac_no') ? ' has-error' : '' }}">
                                          <label for="designation">CERPAC Number</label>
                                          <input id="cerpac_no" name = "cerpac_no" type="text" class="form-control" value="{{ $user_details->cerpac_no }}" >
                                            @if ($errors->has('cerpac_no'))
                                              <span class="help-block">
                                              <strong>{{ $errors->first('cerpac_no') }}</strong>
                                              </span>
                                            @endif
                              
                                 </div>

                                <div class="form-group{{ $errors->has('date_of_joining_in_refinery') ? ' has-error' : '' }}">
                                          <label for="designation">Date of joining in Refinery</label>
                                          <input placeholder="e.g 1980-08-28" id="date_of_joining_in_refinery" name = "date_of_joining_in_refinery" type="text" class="form-control" 
                                          value="<?php
                                          if( Request::old('date_of_joining_in_refinery')!="" )
                                          echo old('date_of_joining_in_refinery');
                                          else if(isset($user_details->date_of_joining_in_refinery))
                                          echo $user_details->date_of_joining_in_refinery;
                                          ?>" >
                                            @if ($errors->has('date_of_joining_in_refinery'))
                                              <span class="help-block">
                                              <strong>{{ $errors->first('date_of_joining_in_refinery') }}</strong>
                                              </span>
                                          @endif
                                </div>

                                <div class="form-group{{ $errors->has('estate_name') ? ' has-error' : '' }}">
                                    <label for="name">Estate/Residential Address</label>
                                    <input id="estate_name" autocomplete="off" name = "estate_name" type="text" class="form-control" value="{{ $user_details->estate_name }}" >
                                      @if ($errors->has('estate_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('estate_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                
                                <div class="form-group{{ $errors->has('staff_grade_level') ? ' has-error' : '' }}">
                                      <label for="email">Staff Grade/Level:</label>
                                      <input type="text" name="staff_grade_level" id="staff_grade_level" class = 'form-control' value="{{ $user_details->staff_grade_level }}">
                                      @if ($errors->has('staff_grade_level'))
                                              <span class="help-block">
                                              <font color="red"><strong>{{ $errors->first('staff_grade_level') }}</strong></font>
                                              </span>
                                      @endif
                              </div>
                    </div>
              </div>
              <!-- End Box Body-->
</div>
</div>


<div class="row">
      <div class="box box-primary">
              <div class="box-header with-border">
                  <h3 class="box-title">Academic Qualification</h3>
              </div>
              <div class="box-body">
                    <div class="col-md-6">
                                <div class="form-group{{ $errors->has('qualification_id') ? ' has-error' : '' }}"">
                                  <label>Highest Qualification</label>
                                  <select name = 'qualification_id' id = 'qualification_id' class = 'form-control' >
                                  <option value="">Select Qualification</option>
                                  @foreach($qualification as $key => $value) 
                                    
                                      @if ($user_details->qualification_id == $key)
                                          <option value="{{ $key }}" selected>{{$value}}</option>
                                      @else
                                        <option value="{{$key}}">{{$value}}</option>
                                      @endif
                                  @endforeach 
                                  </select>
                                </div>
                               
                                  
                                
                      </div>

                      <div class="col-md-6">
                                

                                  <div class="form-group{{ $errors->has('qualification_year') ? ' has-error' : '' }}">
                                              <label for="qualification_year">Year Obtained</label>
                                              <input id="qualification_year" name = "qualification_year" type="text" class="form-control" value="{{ $user_details->qualification_year }}" >
                                              @if ($errors->has('qualification_year'))
                                                  <span class="help-block">
                                                  <strong>{{ $errors->first('qualification_year') }}</strong>
                                                  </span>
                                              @endif
                                  </div>
                                 
                                                                
                              
                      </div>
                  
                    </div>
              </div>
</div>



<div class="row">
      <div class="box box-primary">
              <div class="box-header with-border">
                  <h3 class="box-title">Contact Details</h3>
              </div>
              <div class="box-body">
                    <div class="col-md-6">
                                <div class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}"">
                                  <label>Home Country</label>
                                  <select name = 'country_id' id = 'country_id' class = 'form-control' >
                                  <option value="">Select Country</option>
                                  @foreach($country as $key => $value) 
                                    
                                      @if ($user_details->country_id == $key)
                                          <option value="{{ $key }}" selected>{{$value}}</option>
                                      @else
                                        <option value="{{$key}}">{{$value}}</option>
                                      @endif
                                  @endforeach 
                                  </select>
                                </div>
                                <div style="display:
                                @if (old('staff_category_id') == 1 || $user_details->user_category_id==1)
                                {{'block'}}
                                @endif
                                "id="lga_id_Div" class="form-group{{ $errors->has('country_id') ? ' has-error' : '' }}"">
                                  <label>District/Local Government Area</label>
                                  <select name = 'lga_id' id = 'lga_id' class = 'form-control' >
                                  <option value="">Select Local Government</option>
                                  @foreach($lga as $key => $value) 
                                    
                                      @if ($user_details->lga_id == $key)
                                          <option value="{{ $key }}" selected>{{$value}}</option>
                                      @else
                                        <option value="{{$key}}">{{$value}}</option>
                                      @endif
                                  @endforeach 
                                  </select>
                                </div>


                               
                    
                                  <div class="form-group{{ $errors->has('emergency_contact_no') ? ' has-error' : '' }}">
                                              <label for="designation">Emergency Contact Number</label>
                                              <input id="emergency_contact_no" name = "emergency_contact_no" type="text" class="form-control" value="{{ $user_details->emergency_contact_no }}" >
                                                @if ($errors->has('emergency_contact_no'))
                                                  <span class="help-block">
                                                  <strong>{{ $errors->first('emergency_contact_no') }}</strong>
                                                  </span>
                                              @endif
                                  </div>
                                  <div style="display:
                                @if ($user_details->staff_category_id == 1)
                                {{'none'}}
                                @endif"
                                  id='home_country_phone_no_Div' class="form-group{{ $errors->has('home_country_phone_no') ? ' has-error' : '' }}">
                                              <label for="designation">Home Country Phone Number</label>
                                              <input id="home_country_phone_no" name = "home_country_phone_no" type="text" class="form-control" value="{{ $user_details->home_country_phone_no }}" >
                                                @if ($errors->has('home_country_phone_no'))
                                                  <span class="help-block">
                                                  <strong>{{ $errors->first('home_country_phone_no') }}</strong>
                                                  </span>
                                              @endif
                                  </div>
                                  
                                
                      </div>

                      <div class="col-md-6">
                                <div id="home_state_div" style="display:
                                @if (old('staff_category_id') == 1 || $user_details->user_category_id==1)
                                {{'block'}}
                                @endif
                                "class="form-group{{ $errors->has('state_id') ? ' has-error' : '' }}"">
                                  <label>Home State</label>
                                  <select name = 'state_id' id = 'state_id' class = 'form-control' >
                                  <option value="">Select Status</option>
                                  @foreach($state as $key => $value) 
                                    
                                      @if ($user_details->state_id == $key)
                                          <option value="{{ $key }}" selected>{{$value}}</option>
                                      @else
                                        <option value="{{$key}}">{{$value}}</option>
                                      @endif
                                  @endforeach 
                                  </select>
                                </div>

                                <div class="form-group{{ $errors->has('home_town') ? ' has-error' : '' }}">
                                            <label for="home_town">Home Town</label>
                                            <input id="home_town" name = "home_town" type="text" class="form-control" value="{{ $user_details->home_town }}" >
                                              @if ($errors->has('home_town'))
                                                <span class="help-block">
                                                <strong>{{ $errors->first('home_town') }}</strong>
                                                </span>
                                            @endif
                                </div>

                                  <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                              <label for="designation">Contact Number in Lagos</label>
                                              <input id="phone" name = "phone" type="text" class="form-control" value="{{ $user_details->phone }}" >
                                                @if ($errors->has('phone'))
                                                  <span class="help-block">
                                                  <strong>{{ $errors->first('phone') }}</strong>
                                                  </span>
                                              @endif
                                  </div>
                                 
                                                                
                              
                      </div>
                  
                    </div>
              </div>
</div>

<div class="row">
      <div class="box box-primary">
              <div class="box-header with-border">
                  <h3 class="box-title">Login Details</h3>
              </div>
              <div class="box-body">
                    <div class="col-md-6">
                                  
                                
                                  @permission(('can-edit-all-users'))
                                      <div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}"">
                                        <label>Role</label> <span class="text-danger" style="font-size:17px; margin-top:3px;"><strong>*</strong></span>
                                        <select name = 'role_id' id = 'role_id' class = 'form-control' required>
                                        <option value="" disabled>Select Role</option>
                                        @foreach($roles as $key => $value) 
                                            @if ($role_user->role_id == $key)
                                                <option value="{{ $key }}" selected>{{$value}}</option>
                                            @elseif (Request::old('role_id') == $key)
                                                <option value="{{ $key }}" selected>{{$value}}</option>
                                            @else
                                              <option value="{{$key}}">{{$value}}</option>
                                            @endif
                                        @endforeach 
                                        </select>
                                      </div>
                                  @endpermission
                                  
                      </div>

                      

                      <input id="old_role_id" name = "old_role_id" type="hidden" class="form-control" value="{{$role_user->role_id}}" required>              
                      


                    
                    </div>

                    <div class="box-footer">
                           <button class = 'btn btn-primary' type ='submit'>Update</button>

                      </div>
              </div>
       </div>
</div>






                             

                             


                              

                           



<!--End NEW-->






                    


                       
                  </form>
           
</section>

                    <!-- <script type="text/javascript">
                      var $inputs = $('select.company_id');
                    $('#role_id').change(function(){
                      $inputs.prop('disabled', $(this).val() != '2');
                      $inputs.prop('required', $(this).val() === '2');
                    });
                    </script> -->

@endsection

@section('datatableissuesfixed')
<script>

function FilterByStaffCategory(){
  var the_value=document.getElementById('staff_category_id').value;
  if(the_value!=""){
    if(the_value!=2){//Local Staff
      document.getElementById('CERPAC_no_Div').style.display="none";
      document.getElementById('PE_number_Div').style.display="none";
      document.getElementById('lga_id_Div').style.display="block";
      document.getElementById('home_state_div').style.display="block";
      document.getElementById('home_country_phone_no_Div').style.display="none";
      
      
      
    }
    else //if(the_value==2)//Expatrate
    {
      document.getElementById('CERPAC_no_Div').style.display="block";
      document.getElementById('PE_number_Div').style.display="block";
      document.getElementById('lga_id_Div').style.display="none";
      document.getElementById('home_state_div').style.display="none";
      document.getElementById('home_country_phone_no_Div').style.display="block";
    }
  }
}

</script>


<script type="text/javascript">
  $(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
        }, 
         function () {
           $('.image-preview').popover('hide');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("Browse"); 
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("Change");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
</script>

<script type="text/javascript">

      $('.date-of-employment').datepicker({

      format: 'yyyy-mm-dd',
           endDate: '+0d',
       });

</script>


<script type="text/javascript">

  $('#date_of_birth').datepicker({

      minViewMode: 1,
   format: 'MM yyyy'

   });

</script>

@endsection