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
<div class="box-body table-responsive"  id="srr_table_div">
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