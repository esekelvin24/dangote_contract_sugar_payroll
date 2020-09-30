@extends('layouts.datatable-adminlte2-4-0')
@section('title') Edit User @endsection
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
        Edit User
      </h1> 
        <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
         @permission(('can-edit-all-users'))
         <li><a href="{{ url('/manage_users') }}"><i class="fa fa-users" style="color: blue;"></i> Manage Users</a></li>
         @endpermission
           <li><a href="{{ url('/view_user_details/'.$user_details->id) }}"><i class="fa fa-users" style="color: blue;"></i> View User Details</a></li>
        <li class="active">Edit User</li>
      </ol>
</section>

<section class="content">
<!-- SELECT2 EXAMPLE -->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Edit User</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <form  action="{{ url('/save_updated_user_record/'.$user_details->id) }}" method="POST" enctype="multipart/form-data">
        {{ method_field('PATCH') }}
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>

  @permission(('can-edit-all-users'))
       <div class="form-group{{ $errors->has('sap') ? ' has-error' : '' }}">
            <label for="name">SAP NO</label>
            <input id="sap" name = "sap" type="text" minlength="1" maxlength="15" class="form-control quantity" value="{{$user_details->sap}}">
              @if ($errors->has('sap'))
                <span class="help-block">
                 <strong>{{ $errors->first('sap') }}</strong>
                </span>
            @endif
    </div>
@endpermission  
       <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">Email</label>
            <input id="email" name = "email" type="text" class="form-control" value="{{$user_details->email}}" required>
             @if ($errors->has('email'))
                <span class="help-block">
                 <strong>{{ $errors->first('email') }}</strong>
                </span>
             @endif
        </div>
      

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name">Name</label>
            <input id="name" name = "name" type="text" class="form-control" value="{{$user_details->name}}" required>
              @if ($errors->has('name'))
                <span class="help-block">
                 <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>


    <div class="form-group{{ $errors->has('department_id') ? ' has-error' : '' }}"">
  <label>Department</label>
  <select name = 'department_id' id = 'department_id' class = 'form-control' required>
  <option value="" disabled>Select Department</option>
  @foreach($departments as $key => $value) 
      @if ($user_details->department_id == $key)
          <option value="{{ $key }}" selected>{{$value}}</option>
      @elseif (Request::old('department_id') == $key)
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

<div class="form-group{{ $errors->has('job_title') ? ' has-error' : '' }}">
<label for="email">Job Title:</label>
<input type="text" name="job_title" id="job_title" class = 'form-control' value="{{ $user_details->job_title }}">

@if ($errors->has('job_title'))
<span class="help-block">
<font color="red"><strong><font color="red">{{ $errors->first('job_title') }}</strong></font>
</span>
@endif
</div>


<div class="form-group{{ $errors->has('date_of_employment') ? ' has-error' : '' }}">
<label for="email">Date of Employment:</label>
<input class="date-of-employment form-control" type="text" name="date_of_employment" id="date_of_employment" value="{{$user_details->date_of_employment  }}" placeholder="Select a month" onchange="fun_months(this.value);">

@if ($errors->has('date_of_employment'))
<span class="help-block">
<font color="red"><strong>{{ $errors->first('date_of_employment') }}</strong></font>
</span>
@endif
</div>

</div>

{{-- ///////////////////////////////////////////////////////////////////////////// --}}
<div class="col-md-6">

<div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
    <label for="designation">Designation</label>
    <input id="designation" name = "designation" type="text" class="form-control" value="{{$user_details->designation}}" required>
      @if ($errors->has('designation'))
        <span class="help-block">
         <strong>{{ $errors->first('designation') }}</strong>
        </span>
    @endif
</div>


<div class="form-group{{ $errors->has('perment_office_location') ? ' has-error' : '' }}"">
  <label>Perment Office Location</label>
  <select name = 'perment_office_location' id = 'perment_office_location' class = 'form-control' required>
  <option value="" disabled>Select Perment Office Location</option>
  @foreach($perment_office_locations as $key => $value) 
      @if ($user_details->perment_office_location == $key)
          <option value="{{ $key }}" selected>{{$value}}</option>
      @elseif (Request::old('perment_office_location') == $key)
          <option value="{{ $key }}" selected>{{$value}}</option>
      @else
         <option value="{{$key}}">{{$value}}</option>
      @endif
  @endforeach 
  </select>
</div>


<div class="form-group{{ $errors->has('staff_category_id') ? ' has-error' : '' }}"">
  <label>Staff category</label>
  <select onchange="FilterByStaffCategory()" name = 'staff_category_id' id = 'staff_category_id' class = 'form-control' required>
  <option value="" disabled>Select Staff Category</option>
  @foreach($Staff_categories as $key => $value) 
      @if ($user_details->user_category_id == $key)
          <option value="{{ $key }}" selected>{{$value}}</option>
      @elseif (Request::old('staff_category_id') == $key)
          <option value="{{ $key }}" selected>{{$value}}</option>
      @else
         <option value="{{ $key }}">{{$value}}</option>
      @endif
  @endforeach 
  </select>
</div>


   @permission(('can-edit-all-users'))
<div class="form-group{{ $errors->has('role_id') ? ' has-error' : '' }}"">
  <label>Role</label>
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

<div class="form-group{{ $errors->has('staff_grade_level') ? ' has-error' : '' }}">
<label for="email">Staff Grade/Level:</label>
<input type="text" name="staff_grade_level" id="staff_grade_level" class = 'form-control' value="{{ $user_details->staff_grade_level }}">
    @if ($errors->has('staff_grade_level'))
      <span class="help-block">
      <font color="red"><strong>{{ $errors->first('staff_grade_level') }}</strong></font>
      </span>
    @endif
</div>

 <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
<label for="email">Phone Number:</label>
<input type="text" name="phone" id="phone" class = 'form-control' value="{{ $user_details->phone }}">
@if ($errors->has('phone'))
<span class="help-block">
<font color="red"><strong>{{ $errors->first('phone') }}</strong></font>
</span>
@endif
</div>

<div class="form-group{{ $errors->has('contact_address') ? ' has-error' : '' }}">
<label for="email">Contact Address:</label>
<input type="text" name="contact_address" id="contact_address" class = 'form-control' value="{{ $user_details->contact_address }}">
@if ($errors->has('contact_address'))
<span class="help-block">
<font color="red"><strong>{{ $errors->first('contact_address') }}</strong></font>
</span>
@endif
</div>
      
<input id="old_role_id" name = "old_role_id" type="hidden" class="form-control" value="{{$role_user->role_id}}" required>              
</div>
<!-- /.row -->
</div>
<!-- /.box-body -->
<div class="box-footer">
<button class = 'btn btn-primary' type ='submit'>Update</button>

</div>
</div>
      <!-- /.box -->
</form></div></div></div></div>
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
@endsection