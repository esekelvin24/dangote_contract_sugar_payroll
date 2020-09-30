@extends('layouts.app2')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">{{ $staff_name or "My Attendance" }}</h3>
        
    </div>
    <div class="col-md-7 col-4 align-self-center">
       
        <ol class="breadcrumb btn waves-effect waves-light pull-right hidden-sm-down">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            @role(('admin'))
            		<li class="breadcrumb-item"><a href="{{url('/staff')}}">My Staff</a></li>
           @endrole
            <li class="breadcrumb-item active">{{ $staff_name or "My Attendance" }}</li>
        </ol>

    </div>
</div>
<div class="row">
	<div class="col-lg-12">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">{{ $staff_name or "My Attendance" }}</h4>
                <div class="form-group">
                	<select id="month" class="form-control select2" style="width: 100%;" onchange="fun_months(this.value);">
	                     <option selected="selected">Select Month</option>
	                     <option value="all">All</option>
	                     @foreach($monthsOfYear as $key=>$value)
	                        <option value="{{ $value }}">{{ $value }}</option>
	                      @endforeach
	                  
	                  </select>
                </div>
                <div class="form-group">
                      <div class="col-xs-3">
                      	 <a href="{{ url('/pdf_attendance') }}"><button type="button" class="btn btn-success btn-sm btn-flat" onclick="event.preventDefault();
                      document.getElementById('pdf_my_attendance').submit();"><span class="btn-label"><i class="fa fa-download"></i></span>Download</button></a> 
                      	<form id="pdf_my_attendance" action="{{ url('/pdf_attendance') }}" method="post" style="display">
		                    <input type="hidden" name="month_download" id="month_download" />
		                      {{ csrf_field() }}
		                 </form>
                      </div>
					  <input type="hidden" name="hidden_month" id="hidden_month" value="{{url('/get_month_attendance')}}">
                 </div>
			<div  id="srr_table_div">
				<table id="srr_table"
				class="table table-striped table-bordered" cellspacing="0"
				width="100%">
					<thead>
						<tr>
						<th style="width: 10px">#</th>
						<th>Date</th>
						<th>Time In</th>
						<th>Time Out</th>
						<th>Status</th>
						</tr>
					</thead>
					<tbody>
					@foreach($attendances as $sn => $attendance) 
						<tr>
						<td>{{ $sn+1 }}</td>
						<td>{{ \Carbon\Carbon::parse($attendance->attendance_date)->format('jS \\of F Y \\ (l\\)') }}</td>
						<td>{{ $attendance->start }}</td>
						<td>{{ $attendance->close }}</td>
						@if(in_array($attendance->attendance_date, $leave_array))
							<td>Leave</td>
						@elseif(in_array($attendance->attendance_date, $validated_array))
							<td>Present (Validated)</td>
						@else
							@if((($attendance->start == '') || ($attendance->close == '')) && (\Carbon\Carbon::parse($attendance->attendance_date)->isWeekday()))
							<td>Absent</td>
							@elseif((($attendance->start == '') || ($attendance->close == '')) && (\Carbon\Carbon::parse($attendance->attendance_date)->isWeekend()))
							<td></td>
							@elseif($attendance->attendance_status == 2)
							<td>Validated</td>
							@else
							<td>Present</td>
							@endif
						@endif
						</tr>

					@endforeach

					</tbody>
				</table>
			</div>
		</div>
		</div>
	</div>
</div>
<!-- end row -->
<script>
 function fun_months(val) 
  {
    //this is the #unit_no dom element
    var month = document.getElementById("month").value;
	var month_url = $("#hidden_month").val();
    $( "#month_download" ).val(month);
    // parameter 1 : url
    // parameter 2: post data {{ url('/get_unit_eq_bd') }}
    //parameter 3: callback function 
    $.get( month_url , 
    { month : month } , function(htmlCode)
    { //htmlCode is the code retured from your controller
        $("#srr_table_div").html(htmlCode);
    });
  }


</script>
@endsection




