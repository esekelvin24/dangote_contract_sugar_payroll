@php
  $index = (count($dates_in_this_month) - 1) < 1?0:count($dates_in_this_month) - 1;
  $last_date_of_regularisation = $dates_in_this_month[$index];
  $my_count = 0;
  $date_disp = "";

 
@endphp	


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

@foreach($dates_in_this_month  as $sn => $date_in_this_month) 
  @if(!in_array(\Carbon\Carbon::parse($date_in_this_month)->format('Ymd'), $attendances_array))
      @if((!in_array(\Carbon\Carbon::parse($date_in_this_month)->format('Ymd'), $attendances_array)) && (!in_array($date_in_this_month, $leave_request_list_hr_approved)) && ( !in_array($date_in_this_month, $regularisation_list)) && ( !in_array($date_in_this_month, $holidays_list)) && (!\Carbon\Carbon::parse($date_in_this_month)->isSunday()))              
                  @php
                      $date_disp = date('F, Y', strtotime($date_in_this_month));
                  @endphp
      @endif
  @else
      @foreach($attendances as $attendance)
            @if(($attendance->TDate == \Carbon\Carbon::parse($date_in_this_month)->format('Ymd')) && (($attendance->Start == '') || ($attendance->Close == ''))  && (!in_array($date_in_this_month, $leave_request_list_hr_approved)) && ( !in_array($date_in_this_month, $regularisation_list)) && ( !in_array($date_in_this_month, $holidays_list)) && (!\Carbon\Carbon::parse($date_in_this_month)->isSunday()))
                @php
                 $date_disp = date('F, Y', strtotime($date_in_this_month));      
                @endphp
            @endif
      @endforeach
  @endif

  @endforeach

<table class="table table-borderless table-striped table-condensed" id="srr_table">
          
           @if ( $date_disp !="") 
            <h3>Regularisation for <strong>{{$date_disp}}</strong></h3>
              <div align="center"  class="form-group ">
                <input type="hidden" id="process_form" name="process_form" />
                <input required type="hidden" class="button_click" name="button_click" />
                <button onclick="set_btn_click('1')"  class = 'btn btn-primary btn-lg' type ='submit'>Save Reason</button>&nbsp;&nbsp;&nbsp;
                  
                  @if (date('Y-m-d') >= $last_date_of_regularisation)
                     <button onclick="set_btn_click('2')" class = 'btn btn-success btn-lg' type ='submit'>Submit Request</button>
                  @endif
              </div>
           @endif
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
                                      {{gmdate('H:i:s', (\Carbon\Carbon::parse(fix_date_seconds($attendance->Close))->diffInSeconds(fix_date_seconds($attendance->Start))))}}     {{-- Hours Worked  --}}
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
        @if(($attendance->TDate == \Carbon\Carbon::parse($date_in_this_month)->format('Ymd')) && (($attendance->Start == '') || ($attendance->Close == ''))  && (!in_array($date_in_this_month, $leave_request_list_hr_approved)) && ( !in_array($date_in_this_month, $regularisation_list)) && ( !in_array($date_in_this_month, $holidays_list)) && (!\Carbon\Carbon::parse($date_in_this_month)->isSunday()))
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
                                            $clocking_stat = 1;
                                            $latein_check = true;
                                          @endphp
                                    @endif

                                    <i id="and{{$attendance_temp->TDate}}"></i>
                                          
                                    @if($attendance_temp->EarlyOut != "" && $show_earlyout == "true" && $attendance_temp->EarlyOut > 0)       
                                          <font color="orange"><strong>Early Out</strong></font> 
                                          @php
                                            $clocking_stat = 2;
                                            $earlyout_check = true;
                                          @endphp
                                    @endif

                                    @if($latein_check == true && $earlyout_check == true)
                                      @php
                                        $clocking_stat = 3;
                                      @endphp
                                      <script>
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