<div class="box-body table-responsive"  id="srr_table_div">
  
             <table class="table table-borderless table-striped table-condensed" id="srr_table">
          <thead>
               <tr style="background-color: #a0bdf2">
                  <th class="exportable">#</th>
                  <th class="exportable">Date</th>
                  <th class="exportable">Day</th>
                  <th class="exportable">Time In</th>
                  <th class="exportable">Time Out</th>
                  <th class="exportable" >Status</th>
                  <th><input type="checkbox" onclick="toggle(this);" /> Check All</th>
                </tr>
                </thead>
             <tbody>

  @foreach($dates_in_this_month  as $sn => $date_in_this_month) 

      @if(!in_array(\Carbon\Carbon::parse($date_in_this_month)->format('Ymd'), $attendances_array))

          @if((!in_array(\Carbon\Carbon::parse($date_in_this_month)->format('Ymd'), $attendances_array)) && (!in_array($date_in_this_month, $leave_request_list_hr_approved)) && ( !in_array($date_in_this_month, $regularisation_list)) && ( !in_array($date_in_this_month, $holidays_list)) && (!\Carbon\Carbon::parse($date_in_this_month)->isSunday())) 
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
              <td> <input type="checkbox" name="date_to_regulate[]" value="{{$date_in_this_month}}"></td>
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