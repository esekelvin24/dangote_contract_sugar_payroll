@extends('layouts.datatable-adminlte2-4-0')
@section('title') Leave Request List @endsection
@section('content')

    <section class="content-header">
    
    <h1>
    @if($one_person_leave_list=='yes')
    Leave Request List for <font color="green"><strong>{{$get_user_name}} ({{$sap_no}})</strong></font>
    @endif

    @if($one_person_leave_list=='no')
    Leave Request List <font color="red"><strong>(ALL)</strong></font>
    @endif
    </h1>

       <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li class="active"><i class="fa fa-users" style="color: blue;"></i> Leave Request List</li>
      </ol>
    </section>
   
<!-- /////////////////////////////////////////////////////////////////////// -->

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            @if($one_person_leave_list=='yes')
            <div class="box-header">
                <a href="{{ url('/new_leave_request/'.$sap_no) }}" target="_blank"><button type="button" class="btn btn-primary btn-sm btn-flat"><span class="btn-label"><i class="fa fa-plus"></i></span> New Leave Request</button></a>
            </div>
            @endif

            <!-- /.box-header -->
            <div class="box-body table-responsive">
             <table id="example1" class="table table-borderless table-striped">
                <thead>
               <tr style="background-color: #a0bdf2">
                  <th class="exportable">S/N</th>
                  <!-- <th class="exportable">Leave ID</th> -->
                   <th class="exportable">Name</th>
                  <th class="exportable">SAP#</th>
                  <th class="exportable">Leave Type</th>
                  <th class="exportable">Start Date</th>
                  <th class="exportable">End Date</th>
                  <th class="exportable">Date/time</th>
                  <th class="exportable">HOD Approver</th>
                  <th class="exportable">HOD Approver Status</th>
                  <th class="exportable">HR Approver Status</th>                
                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                   @foreach ($leave_request_lists as $a => $leave_request_list)  
                <tr>
                  <td>{{$a + 1}}</td>
                  <!-- <td><a href="{{ url('view_leave_request_details/'.$leave_request_list->leave_requester_sap_no. '/'.$leave_request_list->leave_req_grp_no) }}"  target="_blank"> {{$leave_request_list->full_uniq_leave_req_id}}</a></td> -->
                  <td>{{$leave_request_list->leave_requester_name}}</td>
                  <td>{{$leave_request_list->leave_requester_sap_no}}</td>
                  <td>{{$leave_request_list->leave_type}}</td>
                  <td>{{ Carbon\Carbon::parse($leave_request_list->leave_start_date)->format('d-m-Y') }}</td>
                  <td>{{ Carbon\Carbon::parse($leave_request_list->leave_end_date)->format('d-m-Y') }}</td>
                  <td>{{$leave_request_list->date_and_time_submitted}}</td>
                  <td>{{$leave_request_list->hod_approver_name}}</td>
                  <td> 
                    {{$leave_request_list->hod_approver_actual_name}}
                    <br>
                      @if ($leave_request_list->hod_approver_status == 0)
                        <i class="fa fa-spinner" style="color: orange;"> Pending </i>
                      @elseif ($leave_request_list->hod_approver_status == 1) 
                       <i class="fa fa-check" style="color: green;"> Approved </i>
                      @elseif ($leave_request_list->hod_approver_status == 2) 
                         <i class="fa fa-times" style="color: red;"> Rejected </i>
                      @endif
                  </td>
                  <td>
                    {{$leave_request_list->hr_approver_name}}
                    <br>
                     @if ($leave_request_list->hr_status == 0)
                        <i class="fa fa-spinner" style="color: orange;"> Pending </i>
                      @elseif ($leave_request_list->hr_status == 1) 
                       <i class="fa fa-check" style="color: green;"> Approved </i>
                      @elseif ($leave_request_list->hr_status == 2) 
                         <i class="fa fa-times" style="color: red;"> Rejected </i>
                      @endif
                  </td>
                  <td>
                  
                   <a href="{{ url('view_leave_request_details/'.$leave_request_list->leave_requester_sap_no. '/'.$leave_request_list->leave_req_grp_no) }}"  target="_blank"><button type="button" class="btn btn-warning btn-sm btn-flat"><span class="btn-label"><i class="fa fa-info-circle"></i></span> Info</button></a>


                
            </td>
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
      <!-- /.row -->
    </section>

    <script>
 function deleteuser(e) { 
   //alert(e);
   // var id = $(e.currentTarget).attr("id");
   // alert= $id,
   // var userId = $(e.currentTarget).data("id"); 
  swal({   
    title: "Are you sure?",
    text: "You want to delete this User!",   type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes, delete it!", 
    closeOnConfirm: false 
  }, 
       function(){   
       window.location.href = "{{ url('/delete_user') }}" + '/' + e;

    // $("#myform").submit();
  });
}

</script>
@endsection

{{-- //////datatable script start here////////////////// --}}
@section('datatableissuesfixed')
<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#example1').removeAttr('width').DataTable( {

        scrollCollapse: false,
        paging:         true,
        ordering:       true,
        searching:    true,
        columnDefs: [
            { width: 8, targets: 0 },
            // { width: 120, targets: 1 },
            { width: 140, targets: 2 },
            { width: 140, targets: 3 },
            { width: 140, targets: 4 },
            { width: 140, targets: 5 },
            { width: 140, targets: 6 },
            { width: 140, targets: 7 },
            { width: 140, targets: 8 },
            { width: 140, targets: 9 },
            { width: 140, targets: 10 },
        ],
        
        dom: 'Bfrtip',
        buttons: [

      {
         extend: 'excel',
         text: 'Save as Excel',
        exportOptions: {
            columns: ':visible.exportable'
        }
      },
      
]

    
    } );
} );
</script>
@endsection
{{-- //////datatable script ends here////////////////// --}}