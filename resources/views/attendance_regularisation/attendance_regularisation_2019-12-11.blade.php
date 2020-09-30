@extends('layouts.datatable-adminlte2-4-0')
@section('title')  My Attendance @endsection
@section('content') 

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
            <div class="box-header">
                 <div class="row">
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
					         <input type="hidden" name="hidden_month" id="hidden_month" value="{{url('/get_month_attendance_regularisation/'. $get_user_details->sap)}}">
 
					     <div class="col-xs-6 col-md-2">
                     <input class="date-own form-control" type="text" name="month" id="month" value="" placeholder="Select a month" onchange="fun_months(this.value);">
       				 </div> 
          </div>
            </div>
 <hr>
            <!-- /.box-header -->
            <form method = 'POST' action = '{!!url("store_attendance_regularisation/". $get_user_details->sap)!!}' enctype="multipart/form-data">
<input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
            <div class="box-body table-responsive"  id="srr_table_div">

             <table class="table table-borderless table-striped table-condensed" id="srr_table">
         
                <thead>
               <tr style="background-color: #a0bdf2">
               <th><input type="checkbox" onclick="toggle(this);" /> </th>
                  <th class="exportable">#</th>
                  <th class="exportable">Date</th>
                  <th class="exportable">Day</th>
                  <th class="exportable">Time In</th>
                  <th class="exportable">Time Out</th>
                  <th class="exportable" >Status</th>
                  <!-- <th class="exportable" ></th>
                  <th class="exportable" >Comment</th>
                  -->
                </tr>
                </thead>
        		 <tbody>

  @foreach($dates_in_this_month  as $sn => $date_in_this_month) 

      @if(!in_array(\Carbon\Carbon::parse($date_in_this_month)->format('Ymd'), $attendances_array))

          @if((!in_array(\Carbon\Carbon::parse($date_in_this_month)->format('Ymd'), $attendances_array)) && (!in_array($date_in_this_month, $leave_request_list_hr_approved)) && ( !in_array($date_in_this_month, $regularisation_list)) && ( !in_array($date_in_this_month, $holidays_list)) && (!\Carbon\Carbon::parse($date_in_this_month)->isSunday())) 
            <tr>
            <td> <input type="checkbox" name="date_to_regulate[]" value="{{$date_in_this_month}}"></td>
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
              <td> <font color="red"><strong>Absent </strong></font></td>
              <!-- <td> <code style="cursor:pointer">Edit</code></td>
              <td> <textarea readonly name="reason" id="" cols="50" rows="2">{{$sn}}</textarea>
             <button style="display:none"  class="btn btn-primaryt">Save</button>
            </td> -->
              
              
            </tr>
          @endif

        @else

      @foreach($attendances as $attendance)
        @if(($attendance->TDate == \Carbon\Carbon::parse($date_in_this_month)->format('Ymd')) && (($attendance->Start == '') || ($attendance->Close == ''))  && (!in_array($date_in_this_month, $leave_request_list_hr_approved)) && ( !in_array($date_in_this_month, $regularisation_list)) && ( !in_array($date_in_this_month, $holidays_list)) && (!\Carbon\Carbon::parse($date_in_this_month)->isSunday()))
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
              <td> <font color="red"><strong>Absent </strong></font></td>
              <td> <input type="checkbox" name="date_to_regulate[]" value="{{$date_in_this_month}}"></td>
            </tr>
          @endif
      @endforeach 

      @endif

	@endforeach

					</tbody>
              </table>
</div> 
<!-- /.box-body -->

<div class="row">

<div class="form-group{{ $errors->has('department_id') ? ' has-error' : '' }} col-md-2">
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

<div class="form-group{{ $errors->has('hod_approver_id') ? ' has-error' : '' }} col-md-2">
<label>Select HOD</label>
<div id="display_hod_approver_list">
<select name = 'hod_approver_id' id = 'hod_approver_id' class = 'form-control' required>
<option value="">Select an HOD</option>
@foreach($get_hod_for_the_user as $key => $value) 
@if (Request::old('hod_approver_id') == $key)
<option value="{{ $key }}" selected>{{$value}}</option>
@else
<option value="{{$key}}">{{$value}}</option>
@endif
@endforeach 
</select>

</div>
</div>

<div class="form-group{{ $errors->has('location_id') ? ' has-error' : '' }} col-md-2">
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

<div class="form-group{{ $errors->has('attached_doc') ? ' has-error' : '' }} col-md-2">
<label>Attach Document (if any)</label>
<input type="file" name="attached_doc" id="attached_doc"> 

@if ($errors->has('attached_doc'))
        <span class="help-block">
         <strong>{{ $errors->first('attached_doc') }}</strong>
        </span>
      @endif
</div>

</div>

<div class="row">

<div class="form-group col-md-6">
<textarea rows="8" class="form-control" id="reason" name="reason" placeholder="Enter The Reason Here" required></textarea>
</div>

<div class="form-group col-md-2">
<button class = 'btn btn-primary btn-lg' type ='submit'>Submit</button>

</div>
</div>


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
  </script>
@endsection
{{-- //////datatable script ends here////////////////// --}}



