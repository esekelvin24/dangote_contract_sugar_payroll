<html>
  <head/>
  <body style="background-color: #FFF;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 brandSection" style="background-color: #3B99B3;border: 1px solid #417482">
                <div class="row">
                    <div class="col-md-12 col-sm-12 header" style="height: 100px;/*border-bottom: 2px solid #417482;*/padding: 10px">
                        <div class="col-md-3 col-sm-3 headerLeft" style="float:left;/*border: 2px solid #417482;*/padding: 10px">
                            <!-- <h1 style="color: #fff;margin: 0;font-size: 28px">Dangote Logo</h1> -->
                            <img src="{{ asset("/dangote-logo1.jpg")}}" height="80" width="150" alt="Dangote" class="light-logo" />
                        </div>
                        <div class="col-md-9 col-sm-9 headerRight" style="/*float:right;*//*border: 2px solid #417482;*/padding: 10px">
                            <p style="margin: 0;font-size: 10px;color: #88CFE3;text-align: right">DAILY ATTENDANCE SYSTEM</p>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 content" style="background-color: #fff;padding: 20px">
                        <h1 style="font-size: 22px;margin: 0">{{ $staff_name }}<strong> {{ $staff_sap }}</strong></h1>
                        <p style="margin: 0;font-size: 11px">Attendance Report</p>
                        <span style="font-size: 11px;color: #F2635F">{{ ucfirst($report_period) }}</span>
                    </div>
                    <div class="col-md-12 col-sm-12 panelPart" style="background-color: #fff">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 panelPart" style="background-color: #fff">
                              <div class="panel panel-default">
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-6 panelPart" style="background-color: #fff">
                                <div class="panel panel-default">
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-12 col-sm-12 tableSection" style="background-color: #fff">
                            <table class="table text-center" style="padding-bottom: 0px;margin: 2px;border: 1px solid #DDD; width: 100%;">
                              <thead>
                                <tr class="tableHead">
						<th style="width: 10px;background-color: #383C3D;color: #fff;padding: 4px;">#</th>
						<th style="background-color: #383C3D;color: #fff;padding: 4px;">Date</th>
						<th style="background-color: #383C3D;color: #fff;padding: 4px;">Day</th>
						<th style="background-color: #383C3D;color: #fff;padding: 4px;">Time In</th>
                        <th style="background-color: #383C3D;color: #fff;padding: 4px;">Time Out</th>
						<th style="background-color: #383C3D;color: #fff;padding: 4px;">Hours Worked</th>
						<th style="background-color: #383C3D;color: #fff;padding: 4px;">Status</th>
						</tr>
					</thead>
					<tbody>
					@foreach($attendances as $sn => $attendance) 
						<tr>
						<td style="padding: 4px; border: 1px solid black;">{{ $sn+1 }}</td>
						<td style="text-align: left;padding: 4px; border: 1px solid black;">{{ $attendance->attendance_date }}</td>
						<td style="padding: 4px; border: 1px solid black;">{{ \Carbon\Carbon::parse($attendance->attendance_date)->format('l') }}</td>
						<td style="padding: 4px; border: 1px solid black;">{{ substr($attendance->start, 0, 8) }}</td>
                        <td style="padding: 4px; border: 1px solid black;">{{ substr($attendance->close, 0, 8) }}</td> 
						<td style="padding: 4px; border: 1px solid black;">
                        @if(($attendance->start != '') && ($attendance->close != ''))
                        {{gmdate('H:i:s', (\Carbon\Carbon::parse($attendance->close)->diffInSeconds($attendance->start)))}}
                        @endif
                        </td>

			
{{-- ///////////////////////////FROM HERE///////////////////////////////////////         --}}
@if((($attendance->start == '') || ($attendance->close == '')) && (\Carbon\Carbon::parse($attendance->attendance_date)->isWeekday()) && ( in_array($attendance->attendance_date, $holidays_list)))
<td style="padding: 4px; border: 1px solid black;">Holiday</td>

{{-- ////////////////////////Regularisation(HOD APPRAOVAL)////////////////////////////// --}}
@elseif((($attendance->start == '') || ($attendance->close == '')) && (\Carbon\Carbon::parse($attendance->attendance_date)->isWeekday()) && ( in_array($attendance->attendance_date, $leave_request_list_hod_pending)))
<td style="padding: 4px; border: 1px solid black;">Leave Request (HOD status -> <font color="orange"><strong>Pending</strong></font>)</td>

@elseif((($attendance->start == '') || ($attendance->close == '')) && (\Carbon\Carbon::parse($attendance->attendance_date)->isWeekday()) && ( in_array($attendance->attendance_date, $leave_request_list_hod_approved)))
<td style="padding: 4px; border: 1px solid black;">Leave Request (HOD status -> <font color="green"><strong>Approved</strong></font>)</td>

@elseif((($attendance->start == '') || ($attendance->close == '')) && (\Carbon\Carbon::parse($attendance->attendance_date)->isWeekday()) && ( in_array($attendance->attendance_date, $leave_request_list_hod_rejected)))
<td style="padding: 4px; border: 1px solid black;">Leave Request (HOD status -> <font color="red"><strong>Rejected</strong></font> )</td>


{{-- @elseif((($attendance->start == '') || ($attendance->close == '')) && (\Carbon\Carbon::parse($attendance->attendance_date)->isWeekday()) && ( in_array($attendance->attendance_date, $leave_request_list_hr_pending)))
<td style="padding: 4px; border: 1px solid black;">Leave Request (HR status -> <font color="orange"><strong>Pending</strong></font>)</td> --}}

@elseif((($attendance->start == '') || ($attendance->close == '')) && (\Carbon\Carbon::parse($attendance->attendance_date)->isWeekday()) && ( in_array($attendance->attendance_date, $leave_request_list_hr_approved)))
<td style="padding: 4px; border: 1px solid black;">Leave Request (HR status -> <font color="green"><strong>Approved</strong></font>)</td>

@elseif((($attendance->start == '') || ($attendance->close == '')) && (\Carbon\Carbon::parse($attendance->attendance_date)->isWeekday()) && ( in_array($attendance->attendance_date, $leave_request_list_hr_rejected)))
<td style="padding: 4px; border: 1px solid black;">Leave Request (HR status -> <font color="red"><strong>Rejected</strong></font> )</td>
{{-- /////////////////////////////////////////////////////////////////////////////////// --}}

{{-- ////////////////////////Regularisation(HOD APPRAOVAL)////////////////////////////// --}}
@elseif((($attendance->start == '') || ($attendance->close == '')) && (\Carbon\Carbon::parse($attendance->attendance_date)->isWeekday()) && ( in_array($attendance->attendance_date, $regularisation_list_hod_pending)))
<td style="padding: 4px; border: 1px solid black;">Regularisation (HOD status -> <font color="orange"><strong>Pending</strong></font>)</td>

@elseif((($attendance->start == '') || ($attendance->close == '')) && (\Carbon\Carbon::parse($attendance->attendance_date)->isWeekday()) && ( in_array($attendance->attendance_date, $regularisation_list_hod_approved)))
<td style="padding: 4px; border: 1px solid black;">Regularisation (HOD status -> <font color="green"><strong>Approved</strong></font>)</td>

@elseif((($attendance->start == '') || ($attendance->close == '')) && (\Carbon\Carbon::parse($attendance->attendance_date)->isWeekday()) && ( in_array($attendance->attendance_date, $regularisation_list_hod_rejected)))
<td style="padding: 4px; border: 1px solid black;">Regularisation (HOD status -> <font color="red"><strong>Rejected</strong></font> )</td>


{{-- @elseif((($attendance->start == '') || ($attendance->close == '')) && (\Carbon\Carbon::parse($attendance->attendance_date)->isWeekday()) && ( in_array($attendance->attendance_date, $regularisation_list_hr_pending)))
<td style="padding: 4px; border: 1px solid black;">Regularisation (HOD status -> <font color="orange"><strong>Pending</strong></font>)</td> --}}

@elseif((($attendance->start == '') || ($attendance->close == '')) && (\Carbon\Carbon::parse($attendance->attendance_date)->isWeekday()) && ( in_array($attendance->attendance_date, $regularisation_list_hr_approved)))
<td style="padding: 4px; border: 1px solid black;">Regularisation (HR status -> <font color="green"><strong>Approved</strong></font>)</td>

@elseif((($attendance->start == '') || ($attendance->close == '')) && (\Carbon\Carbon::parse($attendance->attendance_date)->isWeekday()) && ( in_array($attendance->attendance_date, $regularisation_list_hr_rejected)))
<td style="padding: 4px; border: 1px solid black;">Regularisation (HR status -> <font color="red"><strong>Rejected</strong></font> )</td>
{{-- /////////////////////////////////////////////////////////////////////////////////// --}}

@elseif((($attendance->start == '') || ($attendance->close == '')) && (\Carbon\Carbon::parse($attendance->attendance_date)->isWeekday()))
<td style="padding: 4px; border: 1px solid black;"><font color="red"><strong>Absent</strong></font>

@elseif((($attendance->start == '') || ($attendance->close == '')) && (\Carbon\Carbon::parse($attendance->attendance_date)->isWeekend()))
<td style="padding: 4px; border: 1px solid black;"></td>

@else
<td style="padding: 4px; border: 1px solid black;">Present</td>

@endif
{{-- ////////////////////////////TO HERE//////////////////////////////////////    --}} 


						</tr>

					@endforeach

					</tbody>
				</table>
                        </div>
                        <div class="col-md-12 col-sm-12 lastSectionleft " style="background-color: #fff;padding-top: 0px"> 
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>  

</body>
</html>
