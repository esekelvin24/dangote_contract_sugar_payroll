@extends('layouts.datatable-adminlte2-4-0')
@section('title')  My Attendance @endsection
@section('content') 

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
                      <div class="col-xs-6 col-md-1">
                      	 <a href="{{ url('/pdf_attendance/'. $get_user_details->sap) }}"><button type="button" class="btn btn-success btn-sm btn-flat" onclick="event.preventDefault();
                      document.getElementById('pdf_my_attendance').submit();"><span class="btn-label"><i class="fa fa-download"></i></span>Download</button></a> 
                      	<form id="pdf_my_attendance" action="{{ url('/pdf_attendance/'. $get_user_details->sap) }}" method="post" style="display">
		                    <input type="hidden" name="month_download" id="month_download" />
		                      {{ csrf_field() }}
		                 </form>
                      </div>
 <div class="col-xs-6 col-md-2">
  <button type="button" class="btn btn-primary btn-sm btn-flat" onclick="fun_months2(this.value);" name="month2" id="month2" value="all"><span class="btn-label"><i class="fa fa-eye"></i></span> View All Attendance For This Year</button>
  </div>
					         <input type="hidden" name="hidden_month" id="hidden_month" value="{{url('/get_month_attendance/'. $get_user_details->sap)}}">
 
					     <div class="col-xs-6 col-md-2">
                     <input class="date-own form-control" type="text" name="month" id="month" value="" placeholder="Select a month" onchange="fun_months(this.value);">
       				 </div> 
          </div>
            </div>
 <hr>






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
            <td>
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

        <td>
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
        <td>
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



