@extends('layouts.datatable-adminlte2-4-0')
@section('title')  My Attendance @endsection
@section('content') 


@php
  use Illuminate\Support\Facades\DB;

  $show_earlyout = DB::table('parameter')->where('parameter_name','show_earlyout')->first()->parameter_value;
 
  function fix_date_seconds($date)
    {
         
          $start = str_pad($date,  6, "0");  //add Zero if the length is not 6 
          $based = substr($date,4,6);

         // dd($date."<br/>".$based);
          if($based > 60)
          {
            $start = substr($date,0,4)."59";   
          }
          

          if (substr($date,2,3) > 60)
          {
            $start =  substr($start,0,2)."59".substr($start,4,6);
          }

          return $start;
    }

@endphp



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

               swal("Profile Update", "You are required to update your profile before you can proceed, Ensure your department and phone number is filled up correctly", "warning")
           swal({
                  title: "Profile Update",
                  text: "You are required to update your profile before you can proceed, Ensure your department, phone number and date of birth is filled up correctly",
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

<section class="content-header">
      <h1>

       Attendance Regularisation For <font color="green"><strong>{{$get_user_details->name}} ({{$get_user_details->sap}})</strong></font>
      </h1>
       <a href="{{url('/edit_user/'. $get_user_details->id)}}" target="_blank"><i>Edit your profile to have some of the form fields auto-populated for you</i></a> 
       <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li class="active"><i class="fa fa-calendar-check-o" style="color: blue;"></i> Attendance Regularisation</li>
      </ol>
    </section>
    
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          {{-- <div class="box"> --}}
          	 <div class="box box-info">

                <form id="reg_form" onsubmit="return check_this()" method = 'POST' action = '{!!url("store_attendance_regularisation/". $get_user_details->sap)!!}' enctype="multipart/form-data">

            <div class="box-header">
                <div class="row">

                    <div class="form-group{{ $errors->has('department_id') ? ' has-error' : '' }} col-md-3">
                    <label>Select Department</label>
                    <select name = 'department_id' id = 'department_id' class = 'form-control' onchange="call_hod_approver_list(this.value);" required>
                    <option value="">Select Department</option>
                    @foreach($departments as $key => $value) 
                    @if ($get_user_details->department_id == $key)
                    <option value="{{ $key }}" selected>{{$value}}</option>
                    @elseif (Request::old('department_id') == $key)
                    <option value="{{ $key }}" selected>{{$value}}</option>
                    @else
                    <option value="{{$key}}">{{$value}}</option>
                    @endif
                    @endforeach 
                    </select>
                    </div>
                
                    <div class="form-group{{ $errors->has('hod_approver_id') ? ' has-error' : '' }} col-md-3">
                    <label>Select HOD</label>
                    <div id="display_hod_approver_list">
                    <select name = 'hod_approver_id' id = 'hod_approver_id' class = 'form-control' required>
                    <option value="">Select an HOD</option>
                    @foreach($get_hod_for_the_user as $value) 
                    @if (Request::old('hod_approver_id') == $value->sap || $selected_hod == $value->sap)
                    <option value="{{ $value->sap }}" selected>{{$value->first_name." ".$value->name}}</option>
                    @else
                    <option value="{{$value->sap}}">{{$value->first_name." ".$value->name}}</option>
                    @endif
                    @endforeach 
                    </select>
                
                    </div>
                    </div>
                
                    <div class="form-group{{ $errors->has('location_id') ? ' has-error' : '' }} col-md-3">
                    <label>Select Office Location:</label>
                    <select name = 'location_id' id = 'location_id' class = 'form-control' required>
                    <option value="">Select Office Location:</option>
                    @foreach($office_locations as $key => $value)
                    @if ($get_user_details->perment_office_location == $key)
                    <option value="{{ $key }}" selected>{{$value}}</option>
                    @elseif (Request::old('location_id') == $key)
                    <option value="{{ $key }}" selected>{{$value}}</option>
                    @else
                    <option value="{{$key}}">{{$value}}</option>
                    @endif
                    @endforeach 
                    </select>
                    </div>

                    <input type="hidden" name="hidden_month" id="hidden_month" value="{{url('/get_month_attendance_regularisation/'. $get_user_details->sap)}}">
  
                    <div class="col-xs-6 col-md-3">
                    <br/>
                        <input autocomplete="off" class="date-own form-control" type="text" name="month" id="month" value="" placeholder="Select a month" onchange="fun_months(this.value);">
                    </div> 
                </div>
                <div class="row">

                    <div class="form-group{{ $errors->has('attached_doc') ? ' has-error' : '' }} col-md-3">
                    <label>Attach Document (if any)</label>
                    <input type="file" name="attached_doc" id="attached_doc"> 
                
                    @if ($errors->has('attached_doc'))
                            <span class="help-block">
                            <strong>{{ $errors->first('attached_doc') }}</strong>
                            </span>
                          @endif

                    </div>
                
                
                {{--       <div class="col-xs-6 col-md-1">
                      	 <a href="{{ url('/pdf_attendance/'. $get_user_details->sap) }}"><button type="button" class="btn btn-success btn-sm btn-flat" onclick="event.preventDefault();
                      document.getElementById('pdf_my_attendance').submit();"><span class="btn-label"><i class="fa fa-download"></i></span>Download</button></a> 
                      	<form id="pdf_my_attendance" action="{{ url('/pdf_attendance/'. $get_user_details->sap) }}" method="post" style="display">
		                    <input type="hidden" name="month_download" id="month_download" />
		                      {{ csrf_field() }}
		                 </form>
                      </div> --}}
{{--  <div class="col-xs-6 col-md-1">
  <button type="button" class="btn btn-primary btn-sm btn-flat" onclick="fun_months2(this.value);" name="month2" id="month2" value="all"><span class="btn-label"><i class="fa fa-eye"></i></span> View All</button>
  </div> --}}

  @php
  $my_count = 0;

  $index = (count($dates_in_this_month) - 1) < 1?0:count($dates_in_this_month) - 1;
  $last_date_of_regularisation = $dates_in_this_month[$index];
  $date_disp = "";
  @endphp	


  @foreach($dates_in_this_month  as $sn => $date_in_this_month) 
  @if(!in_array(\Carbon\Carbon::parse($date_in_this_month)->format('Ymd'), $attendances_array))
      @if((!in_array(\Carbon\Carbon::parse($date_in_this_month)->format('Ymd'), $attendances_array)) && (!in_array($date_in_this_month, $leave_request_list_hr_approved)) && ( !in_array($date_in_this_month, $regularisation_list)) && ( !in_array($date_in_this_month, $holidays_list)) && (!\Carbon\Carbon::parse($date_in_this_month)->isSunday()))              
                  @php
                      $x+=1;
                      $my_count = $x;
                      $date_disp = date('F, Y', strtotime($date_in_this_month));
                  @endphp
      @endif
  @else
      @foreach($attendances as $attendance)
            @if(($attendance->TDate == \Carbon\Carbon::parse($date_in_this_month)->format('Ymd')) && (($attendance->Start == '') || ($attendance->Close == ''))  && (!in_array($date_in_this_month, $leave_request_list_hr_approved)) && ( !in_array($date_in_this_month, $regularisation_list)) && ( !in_array($date_in_this_month, $holidays_list)) && (!\Carbon\Carbon::parse($date_in_this_month)->isSunday()))
                @php
                 $x+=1;
                 $my_count = $x;
                 $date_disp = date('F, Y', strtotime($date_in_this_month));
                @endphp
            @endif
      @endforeach
  @endif

  @endforeach

		      
                
          </div>
            </div>


<hr> 

  

  @php
  $my_count = 0;
  $x = 0;
  @endphp	
 
            <!-- /.box-header -->

           
<input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
            <div class="box-body table-responsive"  id="srr_table_div">


              


             <table class="table table-borderless table-striped table-condensed" id="srr_table">

              <h3>Regularisation for <strong>{{$date_disp}}</strong></h3>
              
              <div align="center"  class="form-group ">
                <input type="hidden" id="process_form" name="process_form" />
                <input required type="hidden" class="button_click" name="button_click" />
                  <button onclick="set_btn_click('1')"  class = 'btn btn-primary btn-lg' type ='submit'>Save Reason</button>&nbsp;&nbsp;&nbsp;
                  
                  @if (date('Y-m-d') >= $last_date_of_regularisation)
                     <button onclick="set_btn_click('2')" class = 'btn btn-success btn-lg' type ='submit'>Submit Request</button>
                  @endif
              </div>
         
                <thead>
               <tr style="background-color: #a0bdf2">
              
                  <th class="exportable">#</th>
                  <th class="exportable">Date</th>
                  <th class="exportable">Day</th>
                  <th class="exportable">Time In</th>
                  <th class="exportable">Time Out</th>
                  <th class="exportable">Hours Worked</th>
                  <th class="exportable" >Status</th>
                  
                  <th class="exportable" >Reason </th>
                
                </tr>
                </thead>
        		 <tbody>
  
  @foreach($dates_in_this_month  as $sn => $date_in_this_month) 

      @if(!in_array(\Carbon\Carbon::parse($date_in_this_month)->format('Ymd'), $attendances_array))

          @if((!in_array(\Carbon\Carbon::parse($date_in_this_month)->format('Ymd'), $attendances_array)) && (!in_array($date_in_this_month, $leave_request_list_hr_approved)) && ( !in_array($date_in_this_month, $regularisation_list)) && ( !in_array($date_in_this_month, $holidays_list)) && (!\Carbon\Carbon::parse($date_in_this_month)->isSunday())) 
            <tr>
                       
                      <td>{{ $x+=1 }}</td>
                      @php
                          $my_count = $x;
                      @endphp
                      <td> 
                      {{ \Carbon\Carbon::parse($date_in_this_month)->format('jS \\of F Y') }}
                      </td>
                      <td>
                      {{ \Carbon\Carbon::parse($date_in_this_month)->format('l') }}
                      </td>
                      <td>
                        @foreach($attendances as $attendance) 
                          @if($attendance->TDate == \Carbon\Carbon::parse($date_in_this_month)->format('Ymd'))
                            {{ \Carbon\Carbon::parse($attendance->Start)->format('H:i:s') }}
                          @endif
                        @endforeach
                      </td>
                      <td>
                      @foreach($attendances as $attendance) 
                          @if($attendance->TDate == \Carbon\Carbon::parse($date_in_this_month)->format('Ymd'))
                           {{ \Carbon\Carbon::parse($attendance->Close)->format('H:i:s') }}
                          @endif
                      @endforeach
                      </td>
                     
                      <td>
                        @foreach($attendances as $attendance) 
                            @if($attendance->TDate == \Carbon\Carbon::parse($date_in_this_month)->format('Ymd'))
                              @if(($attendance->Start != '') && ($attendance->Close != ''))
                                  {{-- Hours Worked  --}}
                               @php
                                          $date1 = new DateTime($attendance->Close);
                                          $date2 = $date1->diff(new DateTime($attendance->Start));
                                          echo $date2->h." hrs, ".$date2->i." mins, ".$date2->s.' secs';
                               @endphp
                             
                              @endif
                            @endif
                        @endforeach
                      </td>
                     <td> <font color="red"><strong>Absent </strong></font></td>
                      <td> <textarea name="reason[]" id="reason[]" cols="50" rows="2">{{isset($reason_arr[\Carbon\Carbon::parse($date_in_this_month)->format('Y-m-d')])?$reason_arr[\Carbon\Carbon::parse($date_in_this_month)->format('Y-m-d')]:""}}</textarea>
                        <input type="hidden" name="regu_date_{{$x}}" name="regu_date_{{$sn}}" value="{{$date_in_this_month}}" />  
                        <input type="hidden" name="clocking_status[{{\Carbon\Carbon::parse($date_in_this_month)->format('Y-m-d')}}]" value="0" />  
                    </td>
              
              
            </tr>
         @endif

        @else

           @foreach($attendances as $attendance)

               @php
                 $latein_check = false;
                 $earlyout_check = false;
               @endphp
           
                @if(   ($attendance->TDate == \Carbon\Carbon::parse($date_in_this_month)->format('Ymd')) && (($attendance->Start == '') || ($attendance->Close == ''))  && (!in_array($date_in_this_month, $leave_request_list_hr_approved)) && ( !in_array($date_in_this_month, $regularisation_list)) && ( !in_array($date_in_this_month, $holidays_list)) && (!\Carbon\Carbon::parse($date_in_this_month)->isSunday()))
                  
                
                        <tr>
                              <td>{{ $x+=1 }}</td>
                              <td> 
                              {{ \Carbon\Carbon::parse($date_in_this_month)->format('jS \\of F Y') }} 
                              </td>
                              <td>
                              {{ \Carbon\Carbon::parse($date_in_this_month)->format('l') }}
                              </td>
                              <td>
                              @foreach($attendances as $attendance) 
                              @if($attendance->TDate == \Carbon\Carbon::parse($date_in_this_month)->format('Ymd'))
                                @if($attendance->Start != '')
                                {{ \Carbon\Carbon::parse($attendance->Start)->format('H:i:s') }}
                                @endif
                              @endif
                              @endforeach
                              </td>
                              <td>
                              @foreach($attendances as $attendance) 
                              @if($attendance->TDate == \Carbon\Carbon::parse($date_in_this_month)->format('Ymd'))
                                @if($attendance->Close != '')
                                {{ \Carbon\Carbon::parse($attendance->Close)->format('H:i:s') }}
                                @endif
                              @endif
                              @endforeach
                              </td>
                              
                              <td>
                                @foreach($attendances as $attendance) 
                                    @if($attendance->TDate == \Carbon\Carbon::parse($date_in_this_month)->format('Ymd'))
                                      @if(($attendance->Start != '') && ($attendance->Close != ''))
                                        {{-- Hours Worked  --}}
                                         @php
                                          $date1 = new DateTime($attendance->Close);
                                          $date2 = $date1->diff(new DateTime($attendance->Start));
                                          echo $date2->h." hrs, ".$date2->i." mins, ".$date2->s.' secs';
                                         @endphp
                                      
                                      @endif
                                    @endif
                                @endforeach
                               </td>
                               <td> <font color="red"><strong>Absent </strong></font></td>
                              <td> <textarea name="reason[]" id="reason[]" cols="50" rows="2">{{isset($reason_arr[\Carbon\Carbon::parse($date_in_this_month)->format('Y-m-d')])?$reason_arr[\Carbon\Carbon::parse($date_in_this_month)->format('Y-m-d')]:""}}</textarea>
                                <input type="hidden" name="regu_date_{{$x}}" name="regu_date_{{$sn}}" value="{{$date_in_this_month}}" />  
                                <input type="hidden" name="clocking_status[{{\Carbon\Carbon::parse($date_in_this_month)->format('Y-m-d')}}]" value="0" />  
                            </td>
                        </tr>
{{-- For Early out  --}} @elseif(($attendance->TDate == \Carbon\Carbon::parse($date_in_this_month)->format('Ymd')) && ($attendance->LateIn != "" && $show_earlyout == "true" && $attendance->LateIn > 0 || $attendance->EarlyOut != "" && $show_earlyout == "true" && $attendance->EarlyOut > 0)) {{-- For Early out  --}}
                             
                             @php
                               $attendance_temp = $attendance;
                             @endphp

 
                            <tr>
                              <td>{{ $x+=1 }}</td>
                              <td> 
                              {{ \Carbon\Carbon::parse($date_in_this_month)->format('jS \\of F Y') }} 
                              </td>
                              <td>
                              {{ \Carbon\Carbon::parse($date_in_this_month)->format('l') }}
                              </td>
                              <td>
                              @foreach($attendances as $attendance) 
                              @if($attendance->TDate == \Carbon\Carbon::parse($date_in_this_month)->format('Ymd'))
                                @if($attendance->Start != '')
                                {{ \Carbon\Carbon::parse($attendance->Start)->format('H:i:s') }}
                                @endif
                              @endif
                              @endforeach
                              </td>
                              <td>
                              @foreach($attendances as $attendance) 
                              @if($attendance->TDate == \Carbon\Carbon::parse($date_in_this_month)->format('Ymd'))
                                @if($attendance->Close != '')
                                {{ \Carbon\Carbon::parse($attendance->Close)->format('H:i:s') }}
                                @endif
                              @endif
                              @endforeach
                              </td>
                              <td>
                                @foreach($attendances as $attendance) 
                                    @if($attendance->TDate == \Carbon\Carbon::parse($date_in_this_month)->format('Ymd'))
                                      @if(($attendance->Start != '') && ($attendance->Close != ''))
                                        {{-- Hours Worked  --}}
                                         @php
                                          $date1 = new DateTime($attendance->Close);
                                          $date2 = $date1->diff(new DateTime($attendance->Start));
                                          echo $date2->h." hrs, ".$date2->i." mins, ".$date2->s.' secs';
                                         @endphp
                                      
                                      @endif
                                    @endif
                                @endforeach
                              </td>
                              <td>

                                  @if($attendance_temp->LateIn != "" && $show_earlyout == "true" && $attendance_temp->LateIn > 0) 
                                          <font color="orange"><strong>Late In</strong></font> 
                                          @php
                                            $latein_check = true;
                                            $clocking_stat = 1;
                                          @endphp
                                    @endif

                                    <i id="and{{$attendance_temp->TDate}}"></i>
                                          
                                    @if($attendance_temp->EarlyOut != "" && $show_earlyout == "true" && $attendance_temp->EarlyOut > 0)       
                                          <font color="orange"><strong>Early Out</strong></font> 
                                          @php
                                            $earlyout_check = true;
                                            $clocking_stat = 2;
                                          @endphp
                                    @endif

                                    @if($latein_check == true && $earlyout_check == true)
                                      <script>
                                          @php
                                            $clocking_stat = 3;
                                          @endphp
                                          $('#and{{$attendance_temp->TDate}}').html('&nbsp; and &nbsp;');
                                      </script>
                                    @elseif($latein_check == false && $earlyout_check == false)
                                          Present {{$attendance_temp->EarlyOut}}
                                    @endif
                              
                              </td>

                              <td> <textarea name="reason[]" id="reason[]" cols="50" rows="2">{{isset($reason_arr[\Carbon\Carbon::parse($date_in_this_month)->format('Y-m-d')])?$reason_arr[\Carbon\Carbon::parse($date_in_this_month)->format('Y-m-d')]:""}}</textarea>
                                <input type="hidden" name="regu_date_{{$x}}" name="regu_date_{{$sn}}" value="{{$date_in_this_month}}" />  
                                <input type="hidden" name="clocking_status[{{\Carbon\Carbon::parse($date_in_this_month)->format('Y-m-d')}}]" value="{{$clocking_stat}}" />  
                               </td>
                        </tr>

                  @endif
              @endforeach 

      @endif

	@endforeach

<tr>
  <td colspan="8">
  <div  class="row">

    @if($my_count > 0)
      <div align="center"  class="form-group ">
        <input type="hidden" id="process_form" name="process_form" />
        <input required type="hidden" class="button_click" name="button_click" />
          <button onclick="set_btn_click('1')"  class = 'btn btn-primary btn-lg' type ='submit'>Save Reason</button>&nbsp;&nbsp;&nbsp;
           
          @if (date('Y-m-d') >= $last_date_of_regularisation)
            <button onclick="set_btn_click('2')" class = 'btn btn-success btn-lg' type ='submit'>Submit Request</button>
          @endif
    
      </div>
    @endif
    </div>
  </td>
</tr>
          </tbody>
          
          
              </table>
</div> 
<!-- /.box-body -->






</form>
</div>
<strong><font color="red">{{ $errors->first('date_to_regulate') }}</font></strong>

          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      </div>
      <!-- /.row -->
    </section>


<!-- end row -->
<script>
  var SITEURL = '{{URL::to('')}}';

 
function check_this()
{
      if ($("#process_form").val() != 1)
      {

      
          if($('.button_click').val()=='1')//save and continue later
          {

                
               /* swal({
                  title: "Do you want to save and continue this process later?",
                  text: "You will be able to continue this process within the month",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-info",
                  confirmButtonText: "Yes, Save and continue later",
                  cancelButtonText: "No, cancel",
                  closeOnConfirm: false,
                  closeOnCancel: false
                },
                function(isConfirm) {
                  if (isConfirm) {
                    $("#process_form").val("1");
                    $("#reg_form").submit();
                        
                  } else {
                    return false
                  }
                });

                return false;*/
            
          }else if($('.button_click').val()=='2') //submit form
          {
            swal({
                  title: "Do you want to submit the regularization form?",
                  text: "Kindly note this process can not be undone",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-success",
                  confirmButtonText: "Yes, Submit",
                  cancelButtonText: "No, cancel",
                  closeOnConfirm: false,
                  closeOnCancel: false
                },
                function(isConfirm) {
                  if (isConfirm) {
                    $("#process_form").val("1");
                    $("#reg_form").submit();
                        
                  } else {

                    swal.close();
                  }
                });

                return false;

          }else
          {
            return false;
          }
      }
  //alert('are your sure you want to submit this form');
 // return false;
}

function set_btn_click(val)
{
  $('.button_click').val(val);
}

 function fun_months(val) 
  {
    var month = document.getElementById("month").value;
	var month_url = $("#hidden_month").val();
    $( "#month_download" ).val(month);
    $.get( month_url , 
    { month : month } , function(htmlCode)
    { 
        $("#srr_table_div").html(htmlCode); //htmlCode is the code retured from your controller
    });
  }


</script>

<!-- end row -->
<script>
 function fun_months2(val) 
  {
    var month = document.getElementById("month2").value;
    var month_url = $("#hidden_month").val();
    $( "#month_download" ).val(month);
    $.get( month_url , 
    { month : month } , function(htmlCode)
    { 
        $("#srr_table_div").html(htmlCode); //htmlCode is the code retured from your controller
    });
  }


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

{{-- //////datatable script start here////////////////// --}}
@section('datatableissuesfixed')
<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#srr_table').removeAttr('width').DataTable( {

        scrollCollapse: true,
        paging:         false,
        ordering:       true,
        searching:    false,
        columnDefs: [
            { width: 8, targets: 0 },
            { width: 120, targets: 1 },
            { width: 100, targets: 2 },
            { width: 100, targets: 3 },
            { width: 100, targets: 4 },
            { width: 100, targets: 5 },
        ],
        
//         dom: 'Bfrtip',
//         buttons: [

//       {
//          extend: 'excel',
//          text: 'Save as Excel',
//         exportOptions: {
//             columns: ':visible.exportable'
//         }
//       },
      
// ]

    
    } );
} );
</script>

<script type="text/javascript">

      $('.date-own').datepicker({

          minViewMode: 1,
       format: 'MM yyyy'

       });

  </script>

  <script type="text/javascript">
    function toggle(source) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i] != source)
            checkboxes[i].checked = source.checked;
    }
}

/*
$('.edit_link').click(function() {

  
  
  var id_arr = (this.id).split("_");

  var id = id_arr[2];
  
  $("#edit_link_" +id).hide();
  $("#save_btn_"+ id).show();

  $("#reason_"+ id).attr("readonly", false); 
});


$('.save_link').click(function() {

  var fields = "";
if ($("#hod_approver_id").val() != ""  && $("#department_id").val() != "" && $("#location_id").val() != "")
{
      var id_arr = (this.id).split("_");
      var id = id_arr[2];
      $("#edit_link_"+ id).show();
      $("#save_btn_"+ id).hide();
      

      $("#reason_"+ id).attr("readonly", true);

      var date = $('input[name="regu_date['+id+']"]').val();

      $.ajax({
                url: SITEURL + "/store_attendance_regularisation_reason/{{$get_user_details->sap}}",
                type: "get",
                data: {
                    reason: $("#reason_"+ id).val(),
                    date_to_regulate: date,
                    hod_approver_id: $("#hod_approver_id").val(),
                    location_id: $("#location_id").val(),
                    department_id: $("#department_id").val()

                },
                beforeSend: function(xhr) {
                    //show loading
                },
                success: function(data) {
                    
                    console.log(data);
                }
            });
      
  }else 
  {
     if($("#hod_approver_id").val() == "")
     {
      fields = fields + "HOD Approval, ";
     }

     if($("#location_id").val() == "")
     {
       fields = fields + "Location, ";
     }

     if($("#department_id").val() == "")
     {
      fields = fields + "Departement, ";
     }

     fields = fields.substr(0,fields.length - 2);
     
      alert("Kindly select the following fields "+ fields);
  }
}); 
*/

  </script>
@endsection
{{-- //////datatable script ends here////////////////// --}}



