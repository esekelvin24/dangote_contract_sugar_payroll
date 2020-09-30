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
                            <img src="{{ asset("dangote-logo1.jpg")}}" height="80" width="150" alt="Dangote" class="light-logo" />

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
                @foreach($dates_in_this_month  as $sn => $date_in_this_month) 
                <tr>
                <td style="padding: 4px; border: 1px solid black;">{{ $sn+1 }}</td>
                <td style="text-align: left;padding: 4px; border: 1px solid black;"> 
                {{ \Carbon\Carbon::parse($date_in_this_month)->format('d-m-Y') }}
                </td>
                <td style="padding: 4px; border: 1px solid black;">
                {{ \Carbon\Carbon::parse($date_in_this_month)->format('l') }}
                </td>
                <td style="padding: 4px; border: 1px solid black;">
                @foreach($attendances as $attendance) 
                @if($attendance->TDate == \Carbon\Carbon::parse($date_in_this_month)->format('Ymd'))
                    @if($attendance->Start != '')
                {{ \Carbon\Carbon::parse($attendance->Start)->format('H:i:s') }}
                @endif
                @endif
                @endforeach
                </td>
                <td style="padding: 4px; border: 1px solid black;">
                @foreach($attendances as $attendance) 
                @if($attendance->TDate == \Carbon\Carbon::parse($date_in_this_month)->format('Ymd'))
                    @if($attendance->Close != '')
                {{ \Carbon\Carbon::parse($attendance->Close)->format('H:i:s') }}
                @endif
                @endif
                @endforeach
                </td>
                <td style="padding: 4px; border: 1px solid black;">
                @foreach($attendances as $attendance) 
                @if($attendance->TDate == \Carbon\Carbon::parse($date_in_this_month)->format('Ymd'))
                @if(($attendance->Start != '') && ($attendance->Close != ''))
                {{gmdate('H:i:s', (\Carbon\Carbon::parse($attendance->Close)->diffInSeconds($attendance->Start)))}}
                @endif
                @endif
                @endforeach
                </td>

{{-- ////////////////////////////THIS MEANS THAT THIS DATE IS IN THE DAY MASTER RECORD/////////////////////////////////////////////////// --}}
  @if(in_array(\Carbon\Carbon::parse($date_in_this_month)->format('Ymd'), $attendances_array))

      <td style="padding: 4px; border: 1px solid black;">
          @foreach($attendances as $attendance)
          @if(($attendance->TDate == \Carbon\Carbon::parse($date_in_this_month)->format('Ymd')) && ($attendance->Start != '') && ($attendance->Close != ''))
          Present
          @elseif(($attendance->TDate == \Carbon\Carbon::parse($date_in_this_month)->format('Ymd')) && (($attendance->Start == '') || ($attendance->Close == '')))
          <font color="red"><strong>Absent </strong></font>
          @endif
          @endforeach 
        </td>

        {{-- ////////////////////////////THIS MEANS THAT THIS NOT DATE IS IN THE DAY MASTER RECORD. ///that means we have to check for other possile reasons to mark present or absent////////////////////////////////////////////////// --}}
  @else
       <td style="padding: 4px; border: 1px solid black;">
          {{-- ////////////////////////WHY NOT? IT'S WEEKEND, ENJOY///////////////////////////// --}}
          @if(\Carbon\Carbon::parse($date_in_this_month)->isSunday())
          {{-- this is weekend. don't show anything --}}

          {{-- ////////////////////////WHY NOT? IT'S HOLIDAY, ENJOY///////////////////////////// --}}
          @elseif(in_array($date_in_this_month, $holidays_list))
          <font color="green"><strong>Holiday </strong></font>

          {{-- ////////////////////////Regularisation(HOD APPRAOVAL)////////////////////////////// --}}
          @elseif( in_array($date_in_this_month, $regularisation_list_hod_pending))
          Regularisation (HOD status -> <font color="orange"><strong>Pending</strong></font>)

          @elseif(in_array($date_in_this_month, $regularisation_list_hod_approved))
          Regularisation (HOD status -> <font color="green"><strong>Approved</strong></font>)

          @elseif(in_array($date_in_this_month, $regularisation_list_hod_rejected))
          Regularisation (HOD status -> <font color="red"><strong>Rejected</strong></font> )
          {{-- ////////////////////////Regularisation(HR APPRAOVAL)////////////////////////////// --}}
          @elseif( in_array($date_in_this_month, $regularisation_list_hr_approved))
          Regularisation (HR status -> <font color="green"><strong>Approved</strong></font>)

          @elseif( in_array($date_in_this_month, $regularisation_list_hr_rejected))
          Regularisation (HR status -> <font color="red"><strong>Rejected</strong></font> )


          {{-- ////////////////////////Leave(HOD APPRAOVAL)////////////////////////////// --}}
          @elseif( in_array($date_in_this_month, $leave_request_list_hod_pending))
          Leave Request (HOD status -> <font color="orange"><strong>Pending</strong></font>)

          @elseif( in_array($date_in_this_month, $leave_request_list_hod_approved))
          Leave Request (HOD status -> <font color="green"><strong>Approved</strong></font>)

          @elseif( in_array($date_in_this_month, $leave_request_list_hod_rejected))
          Leave Request (HOD status -> <font color="red"><strong>Rejected</strong></font> )
          {{-- ////////////////////////Leave(HOD APPRAOVAL)////////////////////////////// --}}
          @elseif( in_array($date_in_this_month, $leave_request_list_hr_approved))
          Leave Request (HR status -> <font color="green"><strong>Approved</strong></font>)

          @elseif( in_array($date_in_this_month, $leave_request_list_hr_rejected))
          Leave Request (HR status -> <font color="red"><strong>Rejected</strong></font> )

      {{-- //////////DON'T SHOW IF THE USER AS NOT JOINED THE COMPANY OR DAY BEYOND TODAY/////////////////// --}}
          @elseif( (\Carbon\Carbon::parse($date_in_this_month)->format('Ymd')) > $today || (\Carbon\Carbon::parse($date_in_this_month)->format('Ymd')) < $first_clockin_in_office ) 
{{-- ////////////////////////NOTHING ELSE TO CHECK, YOU WERE ABSENT////////////////////////////// --}}
          @else
          <font color="red"><strong>Absent </strong></font>
          @endif
        </td>
  @endif

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
