<html>
@php
  use Illuminate\Support\Facades\DB;

  $show_earlyout = DB::table('parameter')->where('parameter_name','show_earlyout')->first()->parameter_value;
@endphp

  <head>
  <body style="background-color: #FFF;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 brandSection" style="background-color: #1f1d5e !important; border: 1px solid #417482">
                <div class="row">
                    <div class="col-md-12 col-sm-12 header" style="height: 100px; padding: 10px">
                        <div class="col-md-3 col-sm-3 headerLeft" style="float:left;padding: 10px">
                            <!-- <h1 style="color: #fff;margin: 0;font-size: 28px">Dangote Logo</h1> -->
                            <img src="{{ asset("/asset-adminlte-v-2-4-0/dist/img/logolg.png")}}" height="80" width="150" alt="Dangote" class="light-logo" />

                        </div>
                        <div class="col-md-9 col-sm-9 headerRight" style="/*float:right;*//*border: 2px solid #417482;*/padding: 10px">
                            <p style="margin: 0;font-size: 19px;color: white;text-align: right">DAILY ATTENDANCE SYSTEM</p>
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
  <table class="table table-borderless table-striped table-condensed" id="srr_table">
         
                <thead>
               <tr style="background-color: #a0bdf2">
                  <th class="exportable">#</th>
                  <th class="exportable">Date</th>
                  <th class="exportable">Day</th>
                  <th class="exportable">Time In</th>
                  <th class="exportable">Time Out</th>
                   <th class="exportable">Hours Worked</th>
                  <th class="exportable" >Status</th>
                <!--  <th class="exportable" >HOD comment</th>  -->
                <!--  <th class="exportable" >HR comment</th>   -->
                </tr>
                </thead>
        		 <tbody>
         @foreach($dates_in_this_month  as $sn => $date_in_this_month) 

				
						<tr>
						<td>{{ $sn+1 }}</td>
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
            <td style="min-width:130px;">
              @foreach($attendances as $attendance) 
              @if($attendance->TDate == \Carbon\Carbon::parse($date_in_this_month)->format('Ymd'))
                @if(($attendance->Start != '') && ($attendance->Close != ''))
             
               @php
                  $date1 = new DateTime($attendance->Close);
                  $date2 = $date1->diff(new DateTime($attendance->Start));
                  echo $date2->h." hrs, ".$date2->i." mins, ".$date2->s.' secs';
               @endphp


               
                @endif
              @endif
              @endforeach
            </td>

 {{-- ////////////////////////////THIS MEANS THAT THIS DATE IS IN THE DAY MASTER RECORD/////////////////////////////////////////////////// --}}
  @if(in_array(\Carbon\Carbon::parse($date_in_this_month)->format('Ymd'), $attendances_array))
        
        <td>
          @foreach($attendances as $attendance)

                @if(($attendance->TDate == \Carbon\Carbon::parse($date_in_this_month)->format('Ymd')) && ($attendance->Start != '') && ($attendance->Close != ''))
                
                          @php $disp_latein = true; @endphp

                          @if( in_array($date_in_this_month, $regularisation_list_hod_pending))
                          Regularisation (HOD status -> <font color="orange"><strong>Pending</strong></font>)
                          @php $disp_latein = false; @endphp
                          @endif

                          @if(in_array($date_in_this_month, $regularisation_list_hod_approved))
                          Regularisation (HOD status -> <font color="green"><strong>Approved</strong></font>)
                          @php $disp_latein = false; @endphp
                          @endif

                          @if(in_array($date_in_this_month, $regularisation_list_hod_rejected))
                          Regularisation (HOD status -> <font color="red"><strong>Rejected</strong></font> )
                          @php $disp_latein = false; @endphp
                          @endif

                          {{-- ////////////////////////Regularisation(HR APPRAOVAL)////////////////////////////// --}}
                          @if( in_array($date_in_this_month, $regularisation_list_hr_approved))
                          Regularisation (HR status -> <font color="green"><strong>Approved</strong></font>)
                          @php $disp_latein = false; @endphp
                          @endif

                          @if( in_array($date_in_this_month, $regularisation_list_hr_rejected))
                          Regularisation (HR status -> <font color="red"><strong>Rejected</strong></font> )
                          @php $disp_latein = false; @endphp
                          @endif

                          

                          @if ($disp_latein == true)

                                    @php
                                      $latein_check = false;
                                      $earlyout_check = false;
                                    @endphp

                                    @if($attendance->LateIn != "" && $show_earlyout == "true" && $attendance->LateIn > 0) 
                                          <font color="orange"><strong>Late In</strong></font> 
                                          @php
                                            $latein_check = true;
                                          @endphp
                                    @endif

                                    <i id="and{{$attendance->TDate}}"></i>
                                          
                                    @if($attendance->EarlyOut != "" && $show_earlyout == "true" && $attendance->EarlyOut > 0)       
                                          <font color="orange"><strong>Early Out</strong></font> 
                                          @php
                                            $earlyout_check = true;
                                          @endphp
                                    @endif

                                    @if($latein_check == true && $earlyout_check == true)
                                      <script>
                                          $('#and{{$attendance->TDate}}').html('&nbsp; and &nbsp;');
                                      </script>
                                    @elseif($latein_check == false && $earlyout_check == false)
                                          @if ($attendance->EarlyOut == "" && $attendance->LateIn == "")
                                                <font color="blue"><strong>Awaiting Status </strong></font>  
                                          @else
                                                Present
                                          @endif    
                                    @endif
                          @endif
         
                @elseif(($attendance->TDate == \Carbon\Carbon::parse($date_in_this_month)->format('Ymd')) && (($attendance->Start == '') || ($attendance->Close == '')))
                                

           
                                      @php $disp = true; @endphp
                                      @if( in_array($date_in_this_month, $regularisation_list_hod_pending))
                                      Regularisation (HOD status -> <font color="orange"><strong>Pending</strong></font>)
                                      @php $disp = false; @endphp
                                      @endif

                                      @if(in_array($date_in_this_month, $regularisation_list_hod_approved))
                                      Regularisation (HOD status -> <font color="green"><strong>Approved</strong></font>)
                                      @php $disp = false; @endphp
                                      @endif

                                      @if(in_array($date_in_this_month, $regularisation_list_hod_rejected))
                                      Regularisation (HOD status -> <font color="red"><strong>Rejected</strong></font> )
                                      @php $disp = false; @endphp
                                      @endif

                                      {{-- ////////////////////////Regularisation(HR APPRAOVAL)////////////////////////////// --}}
                                      @if( in_array($date_in_this_month, $regularisation_list_hr_approved))
                                      Regularisation (HR status -> <font color="green"><strong>Approved</strong></font>)
                                      @php $disp = false; @endphp
                                      @endif

                                      @if( in_array($date_in_this_month, $regularisation_list_hr_rejected))
                                      Regularisation (HR status -> <font color="red"><strong>Rejected</strong></font> )
                                      @php $disp = false; @endphp
                                      @endif

                                      @if ($disp == true)
                                       <font color="red"><strong>Absent</strong></font>
                                      @endif




          
          @endif
          @endforeach 
        </td>

        {{-- ////////////////////////////THIS MEANS THAT THIS NOT DATE IS IN THE DAY MASTER RECORD. ///that means we have to check for other possile reasons to mark present or absent////////////////////////////////////////////////// --}}
  @else
        <td>
          {{-- ////////////////////////WHY NOT? IT'S WEEKEND, ENJOY///////////////////////////// --}}
          @if(\Carbon\Carbon::parse($date_in_this_month)->isSunday())
          {{-- this is weekend. don't show anything --}}

          {{-- ////////////////////////WHY NOT? IT'S HOLIDAY, ENJOY///////////////////////////// --}}
          @elseif(in_array($date_in_this_month, $holidays_list))
          <font color="green"><strong>Holiday </strong></font>

          {{-- ////////////////////////Regularisation(HOD APPRAOVAL)////////////////////////////// --}}
          @elseif (count($regularisation_list_hod_pending) > 0 || count($regularisation_list_hod_approved) > 0 || count($regularisation_list_hod_rejected) > 0 || count($regularisation_list_hr_approved) > 0 || count($regularisation_list_hr_rejected) > 0)
          
                                        @php $disp = true; @endphp
                                        @if( in_array($date_in_this_month, $regularisation_list_hod_pending))
                                        Regularisation (HOD status -> <font color="orange"><strong>Pending</strong></font>)
                                        @php $disp = false; @endphp
                                      @endif

                                      @if(in_array($date_in_this_month, $regularisation_list_hod_approved))
                                      Regularisation (HOD status -> <font color="green"><strong>Approved</strong></font>)
                                      @php $disp = false; @endphp
                                      @endif

                                      @if(in_array($date_in_this_month, $regularisation_list_hod_rejected))
                                      Regularisation (HOD status -> <font color="red"><strong>Rejected</strong></font> )
                                      @php $disp = false; @endphp
                                      @endif

                                      {{-- ////////////////////////Regularisation(HR APPRAOVAL)////////////////////////////// --}}
                                      @if( in_array($date_in_this_month, $regularisation_list_hr_approved))
                                      Regularisation (HR status -> <font color="green"><strong>Approved</strong></font>)
                                      @php $disp = false; @endphp
                                      @endif

                                      @if( in_array($date_in_this_month, $regularisation_list_hr_rejected))
                                      Regularisation (HR status -> <font color="red"><strong>Rejected</strong></font> )
                                      @php $disp = false; @endphp
                                      @endif

                                      @if ($disp == true)
                                      <font color="red"><strong>Absent</strong></font>
                                      @endif

                                    

          {{-- ////////////////////////Leave(HODAPPRAOVAL)////////////////////////////// --}}
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
          <font color="red"><strong>Absent</strong></font>
          @endif
        </td>

      <!--  <td>{{(\Carbon\Carbon::parse($date_in_this_month)->format('Y-m-d'))}}</td>  -->
      <!--  <td>{{(\Carbon\Carbon::parse($date_in_this_month)->format('Y-m-d'))}}</td>  -->
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
