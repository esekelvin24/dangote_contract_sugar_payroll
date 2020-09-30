@extends('layouts.datatable-adminlte2-4-0')
@section('title') New Leave Request @endsection
@section('content')


    <section class="content-header">
      <h1>
     New Leave Request For <font color="green"><strong>{{$get_user_details->name}} ({{$get_user_details->sap}})</strong></font>
      </h1>
      <!-- <a href="{{url('/edit_user/'. $get_user_details->id)}}" target="_blank"><i>Edit your profile to have some of the form fields auto-populated for you</i></a>  -->
      <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li class="active">New Leave Request </li>
      </ol>
</section>

<section class="content">
      
@if (count($errors))
    <div class="alert alert-danger">
<button class="close" data-dismiss="alert">×</button>
        @foreach ($errors->all() as $error)
              <p > {{ $error }}</p>
        @endforeach
    </div>
    @elseif(Session::has('message'))
  <div class="alert alert-danger">
<button class="close" data-dismiss="alert">×</button>
        <p><?php echo Session::get('message'); ?></p>
</div>
@endif 

<section class="content"> 
<div class="row">
   <div class="col-md-9">
    <br>

 <div class="box box-info">
<div class="box-header with-border">
  <h3 class="box-title">EMPLOYEE LEAVE APPLICATION FORM</h3>
   
</div>     
<div class="box-body">
          <div class="row">
          
 <!-- /.box-header -->
<div class="box-body">


<form method = 'POST' action = '{!!url("store_leave_request/". $get_user_details->sap)!!}' enctype="multipart/form-data">
        <table id="tblmarketerinfo" class="table table-bordered"> 
<input type = 'hidden' name = '_token' value = '{{Session::token()}}'>

                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Business Unit:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                        <select name = 'business_unit_id' id = 'business_unit_id' class = 'form-control' required>
                                          <option value="">Select Business Unit</option>
                                          @foreach($business_units as $key => $value) 
                                          @if ($get_user_details->business_unit_id == $key)
                                          <option value="{{ $key }}" selected>{{$value}}</option>
                                          @elseif (Request::old('business_unit_id') == $key)
                                          <option value="{{ $key }}" selected>{{$value}}</option>
                                          @else
                                          <option value="{{$key}}">{{$value}}</option>
                                          @endif
                                          @endforeach 
                                        </select>
                                            </td>
                                        </tr>
                                    </tbody>

                              

                                      <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Job Title:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                              <input type="text" name="job_title" id="job_title" class = 'form-control' value="{{ $get_user_details->job_title }}" required>
                                             
                                              @if ($errors->has('job_title'))
                                                <span class="help-block">
                                                 <font color="red"><strong><font color="red">{{ $errors->first('job_title') }}</strong></font>
                                                </span>
                                             @endif

                                            </td>
                                        </tr>
                                    </tbody>

                                        <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Date of Employment:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                            <input class="date-of-employment form-control" type="text" name="date_of_employment" id="date_of_employment" value="{{$get_user_details->date_of_employment  }}" placeholder="Select a month" required>

                                             @if ($errors->has('date_of_employment'))
                                                <span class="help-block">
                                              <font color="red"><strong>{{ $errors->first('date_of_employment') }}</strong></font>
                                                </span>
                                             @endif

                                            </td>
                                        </tr>
                                    </tbody>  

                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Department:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">

                                            <select name = 'department_id' id = 'department_id' class = 'form-control' onchange="call_hod_approver_list(this.value);" required>
                                            <option value="">Select Department:</option>
                                    @foreach($departments as $key => $value) 
                                        @if ($get_user_department == $key)
                                            <option value="{{ $key }}" selected>{{$value}}</option>
                                        @elseif (Request::old('department_id') == $key)
                                            <option value="{{ $key }}" selected>{{$value}}</option>
                                        @else
                                            <option value="{{$key}}">{{$value}}</option>
                                        @endif
                                   @endforeach 
                                            </select>

                                            </td>
                                        </tr>

                                    </tbody> 

                                     <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Staff Grade/Level:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                               <input type="text" name="staff_grade_level" id="staff_grade_level" class = 'form-control' value="{{ $get_user_details->staff_grade_level }}" required>
                                                @if ($errors->has('staff_grade_level'))
                                                <span class="help-block">
                                                 <font color="red"><strong>{{ $errors->first('staff_grade_level') }}</strong></font>
                                                </span>
                                             @endif
                                            </td>
                                        </tr>
                                    </tbody> 

                                     <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Type of Leave:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                              

                                          <select onchange="get_leave_entitled_days(this.value)" name = 'leave_type_id' id = 'leave_type_id' class = 'form-control' required>
                                          <option value="">Select Type of Leave</option>
                                          @foreach($leave_types as $key => $value) 
                                          @if (Request::old('leave_type_id') == $key)
                                          <option value="{{ $key }}" selected>{{$value}}</option>
                                          @else
                                          <option value="{{$key}}">{{$value}}</option>
                                          @endif
                                          @endforeach 
                                          </select>

                                            </td>
                                        </tr>
                                    </tbody>


                                      <tbody>
                                        <tr class="even pointer">
                                            <td scope="row" bgcolor="#F5F7FA"><strong>Number of Leave Days Entitled:</strong><p>(kindly make reference to your payslip)</p></td>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                               <input type="Number" name="number_of_leave_days_entitled" id="number_of_leave_days_entitled" class = 'form-control' value="{{ old('number_of_leave_days_entitled') }}" required>
                                             @if ($errors->has('number_of_leave_days_entitled'))
                                                <span class="help-block">
                                                 <font color="red"><strong>{{ $errors->first('number_of_leave_days_entitled') }}</strong></font>
                                                </span>
                                             @endif
                                            </td>
                                        </tr>
                                    </tbody>

                                      <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Start Date:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">

                                               <input class="from_date form-control" type="text" name="leave_start_date" id="leave_start_date" value="{{ old('leave_start_date') }}" placeholder="Select a month">

                                                @if ($errors->has('leave_start_date'))
                                                <span class="help-block">
                                                 <font color="red"><strong>{{ $errors->first('leave_start_date') }}</strong></font>
                                                </span>
                                             @endif
                                            </td>
                                        </tr>
                                    </tbody>

                                          <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">End Date:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                               <input class="to_date form-control" type="text" name="leave_end_date" id="leave_end_date" value="{{ old('leave_end_date') }}"placeholder="Select a month">
                                           
                                            @if ($errors->has('leave_end_date'))
                                                <span class="help-block">
                                                 <font color="red"><strong>{{ $errors->first('leave_end_date') }}</strong></font>
                                                </span>
                                             @endif
                                            </td>
                                        </tr>
                                    </tbody>



                                     <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Contact Address:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                               <input type="text" name="contact_address" id="contact_address" class = 'form-control' value="{{ $get_user_details->contact_address }}" required>
                                          
                                            @if ($errors->has('contact_address'))
                                                <span class="help-block">
                                                 <font color="red"><strong>{{ $errors->first('contact_address') }}</strong></font>
                                                </span>
                                             @endif
                                            </td>
                                        </tr>
                                    </tbody>

                                         <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Phone Number:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                               <input type="text" name="phone_number" id="phone_number" class = 'form-control' value="{{ $get_user_details->phone }}" required>
                                            @if ($errors->has('phone_number'))
                                                <span class="help-block">
                                                 <font color="red"><strong>{{ $errors->first('phone_number') }}</strong></font>
                                                </span>
                                             @endif
                                            </td>
                                        </tr>
                                    </tbody>


                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Location:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                          
                                          <select name = 'office_location' id = 'office_location' class = 'form-control' required>
                                          <option value="">Select Office Location:</option>
                                          @foreach($office_locations as $key => $value) 
                                          @if ($get_user_details->perment_office_location == $key)
                                          <option value="{{ $key }}" selected>{{$value}}</option>
                                          @elseif (Request::old('office_location') == $key)
                                          <option value="{{$key}}" selected>{{$value}}</option>
                                          @else
                                          <option value="{{$key}}">{{$value}}</option>
                                          @endif
                                          @endforeach 
                                          </select>

                                            </td>
                                        </tr>
                                    </tbody>

                               <tbody>
                                <tr class="even pointer">
                                    <th scope="row" bgcolor="#F5F7FA">To Be Approved by (HOD):</th>
                                    <td class="pull-xs-left col-sm-9 col-xs-8">

                                  <div class="form-group{{ $errors->has('hod_approver_id') ? ' has-error' : '' }}" >
                                  <div id="display_hod_approver_list" >
                                   
                                <select name = 'hod_approver_id' id = 'hod_approver_id' class = 'form-control' required>
                                    <option value="">Select an HOD</option>
                                    @foreach($get_hod_for_the_user as $value) 
                                        @if (Request::old('hod_approver_id') == $key)
                                            <option value="{{ $value->sap }}" selected>{{$value->first_name." ".$value->name}}</option>
                                        @else
                                            <option value="{{$value->sap}}">{{$value->first_name." ".$value->name}}</option>
                                        @endif
                                    @endforeach 
                                </select>

                                    </div>
                                    
                                    @if ($errors->has('hod_approver_id'))
                                                <span class="help-block">
                                                 <font color="red"><strong>{{ $errors->first('hod_approver_id') }}</strong></font>
                                                </span>
                                             @endif
                                    </div>
                                    </td>
                                </tr>
                            </tbody>



                   {{--    <tbody>
                        <tr class="even pointer">
                            <th scope="row" bgcolor="#F5F7FA">To Be Approved by (HOD):</th>
                            <td class="pull-xs-left col-sm-9 col-xs-8">
                              <select name = 'hod_approver_id' id = 'hod_approver_id' class = 'form-control' required>
                              <option value="" disabled>Select an HOD</option>
                              @foreach($get_hod_for_the_user as $key => $value) 
                              @if (Request::old('hod_approver_id') == $key)
                              <option value="{{ $key }}" selected>{{$value}}</option>
                              @else
                              <option value="{{$key}}">{{$value}}</option>
                              @endif
                              @endforeach 
                              </select>
                            </td>
                        </tr>
                      </tbody>
                    --}}
                                   <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">NOTE:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">

                                             <textarea rows="8" class="form-control" id="note" name="note" placeholder="Enter The Reason Here (if any)"></textarea>

                                              @if ($errors->has('note'))
                                                <span class="help-block">
                                                 <font color="red"><strong>{{ $errors->first('note') }}</strong></font>
                                                </span>
                                             @endif
                                            </td>
                                        </tr>
                                    </tbody>

                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Attachment (if any):</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                              <input type="file" name="attached_doc" id="attached_doc">
                                           
                                            @if ($errors->has('attached_doc'))
                                                <span class="help-block">
                                                 <font color="red"><strong>{{ $errors->first('attached_doc') }}</strong></font>
                                                </span>
                                             @endif
                                            </td>
                                        </tr>
                                    </tbody>

                                      <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Submit</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                            <button class = 'btn btn-primary' type ='submit'>Submit</button>
                                            </td>
                                        </tr>
                                    </tbody>

       

                           
</table>
 </form>  
 </div></div></div></div></div>

</div>
</section>

@endsection

@section('datatableissuesfixed')

<script type="text/javascript">

      $('.date-of-employment').datepicker({

      format: 'yyyy-mm-dd',
           endDate: '+0d',
       });



</script>
{{-- 
<script type="text/javascript">

      $('.start-date').datepicker({

      format: 'yyyy-mm-dd',
           startDate: '-0d'

         // maxDate:new Date(),
         // maxDate: +2
       });

</script>

<script type="text/javascript">

      $('.end-date').datepicker({

      format: 'yyyy-mm-dd',
           startDate: '-0d'

         // maxDate:new Date(),
         // maxDate: +2
       });

</script> --}}


<script type="text/javascript">
var startDate = new Date();
var FromEndDate = new Date('2099/01/01');
var ToEndDate = new Date();
ToEndDate.setDate(ToEndDate.getDate() + 365);

$('.from_date').datepicker({
  format: 'yyyy-mm-dd',
weekStart: 1,
startDate: '+1d',
endDate: FromEndDate,
autoclose: true
})
.on('changeDate', function (selected) {
        startDate = new Date(selected.date.valueOf());
        startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
        $('.to_date').datepicker('setStartDate', startDate);
    });
$('.to_date')
    .datepicker({
        format: 'yyyy-mm-dd',
        weekStart: 1,
        startDate: startDate,
        endDate: ToEndDate,
        autoclose: true
    })
    .on('changeDate', function (selected) {
        FromEndDate = new Date(selected.date.valueOf());
        FromEndDate.setDate(FromEndDate.getDate(new Date(selected.date.valueOf())));
        $('.from_date').datepicker('setEndDate', FromEndDate);
    });
</script>

<script type="text/javascript">
function call_hod_approver_list(val)
{
 $.ajax({
 type: 'get',
 url: '{{url('/ajax_get_hod_approver_list')}}',
 data: {
 get_option:val
 },
 success: function (response) {
 $("#display_hod_approver_list").html(response);

 }
 });
}
</script>

@endsection