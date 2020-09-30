@extends('layouts.datatable-adminlte2-4-0')
@section('title')  My Attendance @endsection
@section('content') 

@php
  use Illuminate\Support\Facades\DB;

  $show_earlyout = DB::table('parameter')->where('parameter_name','show_earlyout')->first()->parameter_value;
  //$resumption_time = DB::table('parameter')->where('parameter_name','resumption_time')->first()->parameter_value;
  //$closing_time = DB::table('parameter')->where('parameter_name','closing_time')->first()->parameter_value;
  
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

               swal("Profile Update", "You are required to update your profile before you can proceed, Ensure your department, phone number and date of birth is filled up correctly", "warning")
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

       Attendance For <font color="green"><strong>{{$get_user_details->name}} ({{$get_user_details->sap}})</strong></font>
      </h1>
       <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li class="active"><i class="fa fa-calendar-check-o" style="color: blue;"></i> My Attendance</li>
      </ol>
    </section>
    
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          {{-- <div class="box"> --}}
          	 <div class="box box-info">
            <div class="box-header">
                 <div class="row">
                      <div class="col-xs-12 col-md-2">
                            <a href="{{ url('/pdf_attendance/'. $get_user_details->sap) }}"><button type="button" style="width:100%" class="btn btn-default btn-sm btn-flat" onclick="event.preventDefault();
                            document.getElementById('pdf_my_attendance').submit();"><span class="btn-label"><i class="fa fa-download"></i></span>Download Attendance</button></a> 
                            <form id="pdf_my_attendance" action="{{ url('/pdf_attendance/'. $get_user_details->sap) }}" method="post" style="display">
                                  <input type="hidden" name="month_download" id="month_download" />
                                  {{ csrf_field() }}
                            </form>
                      </div>
                      <div class="col-xs-12 col-md-2">
                            <button type="button" style="width:100%;" class="btn btn-default btn-sm btn-flat" onclick="fun_months2(this.value);" name="month2" id="month2" value="all"><span class="btn-label"  ><i class="fa fa-eye"></i></span> This Year Attendance</button>
                      </div>
                      <input type="hidden" name="hidden_month" id="hidden_month" value="{{url('/get_month_attendance/'. $get_user_details->sap)}}">
            
                      <div class="col-xs-12 col-md-2">
                            <input class="date-own form-control" autocomplete="off" type="text" style="width:100%;" name="month" id="month" value="" placeholder="Select a month" onchange="fun_months(this.value);">
                      </div> 
                </div>
            </div>
 <hr>

 
{{-- 
<div style="font-size:18px" class="alert alert-danger col-xs-12 col-md-12 col-sm-12" role="alert">
  <i class="fa fa-warning"></i> Kindly note that from <strong>1st August 2020</strong> you will be asked to regularised for both <strong>Late In</strong> and <strong>Early Out</strong>. Whenever you clock in after <strong>8:30am</strong> you will be marked as <strong>Late In</strong> and <strong>Early Out </strong> is whenever you clock out before <strong>5:00pm</strong>
</div><br/><br/><br/><br/>
--}}

            <!-- /.box-header -->
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
            <!-- /.box-body -->
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

@endsection

{{-- //////datatable script Start here////////////////// --}}
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
            { width: 120, targets: 4 },
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
@endsection
{{-- //////datatable script ends here////////////////// --}}



