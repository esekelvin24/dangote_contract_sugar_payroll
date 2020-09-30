@extends('layouts.datatable-adminlte2-4-0')
@section('title') Attendance Regularisation List @endsection
@section('content')

    <section class="content-header">
       
    <h1>
    @if($one_person_reg_list=='yes')
    Attendance Regularisation List for <font color="green"><strong>{{$get_user_name}} ({{$sap_no}})</strong></font>
    @endif

    @if($one_person_reg_list=='no')
    Attendance Regularisation List <font color="red"><strong>(ALL)</strong></font>
    @endif
    </h1>
        
       <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li class="active"><i class="fa fa-users" style="color: blue;"></i> Attendance Regularisation List</li>
      </ol>
    </section>
   
<!-- /////////////////////////////////////////////////////////////////////// -->

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            @if($one_person_reg_list=='yes')
            <div class="box-header">
                <a href="{{ url('/attendance_regularisation/'.$sap_no) }}" target="_blank"><button type="button" class="btn btn-primary btn-sm btn-flat"><span class="btn-label"><i class="fa fa-calendar-plus-o"></i></span> New Attendance Regularisation</button></a>
            </div>
            @endif
            <!-- /.box-header -->
            <div class="box-body table-responsive">
             <table id="example1" class="table table-borderless table-striped">
                <thead>
               <tr style="background-color: #a0bdf2">
                  <th class="exportable">S/No</th>
                  <th class="exportable">Reg ID</th>
                   <th class="exportable">name</th>
                  <th class="exportable">SAP NO</th>
                  <th class="exportable">Date and time submited</th>
                  <th class="exportable">To Be Approved by (HOD)</th>
                  <th class="exportable">HOD Approver Status</th>
                  <th class="exportable">HR Approver Status</th>
            
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                   @foreach ($regularisation_lists as $a => $regularisation_list)  
                <tr>
                  <td>{{$a + 1}}</td>
                  <td><a href="{{ url('view_regularisation_details/'.$regularisation_list->regularisation_requester_sap_no. '/'.$regularisation_list->regularisation_grp_no) }}"  target="_blank">{{$regularisation_list->full_uniq_reg_id}}</a></td>
                  <td>{{$regularisation_list->regularisation_requester_name}}</td>
                  <td>{{$regularisation_list->regularisation_requester_sap_no}}</td>
                  <td>{{$regularisation_list->date_and_time_submited}}</td>
                  <td>{{"k"/*$regularisation_list->hod_approver_name*}}</td>
                  <td>
                 {{$regularisation_list->hod_approver_actual_name}}
                    <br>
                      @if ($regularisation_list->hod_approver_status == 0)
                        <i class="fa fa-spinner" style="color: orange;"> Pending </i>
                      @elseif ($regularisation_list->hod_approver_status == 1) 
                       <i class="fa fa-check" style="color: green;"> Approved </i>
                      @elseif ($regularisation_list->hod_approver_status == 2) 
                         <i class="fa fa-times" style="color: red;"> Rejected </i>
                      @endif
                  </td>
                  <td>
                    {{$regularisation_list->hr_approver}}
                    <br>
                     @if ($regularisation_list->hr_status == 0)
                        <i class="fa fa-spinner" style="color: orange;"> Pending </i>
                      @elseif ($regularisation_list->hr_status == 1) 
                       <i class="fa fa-check" style="color: green;"> Approved </i>
                      @elseif ($regularisation_list->hr_status == 2) 
                         <i class="fa fa-times" style="color: red;"> Rejected </i>
                      @endif
                  </td>
                  <td>
                  
                   <a href="{{ url('view_regularisation_details/'.$regularisation_list->regularisation_requester_sap_no. '/'.$regularisation_list->regularisation_grp_no) }}"  target="_blank"><button type="button" class="btn btn-warning btn-sm btn-flat"><span class="btn-label"><i class="fa fa-info-circle"></i></span> Info</button></a>


                
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
            { width: 120, targets: 1 },
            { width: 140, targets: 2 },
            { width: 140, targets: 3 },
            { width: 140, targets: 4 },
            { width: 140, targets: 5 },
            { width: 140, targets: 6 },
            { width: 140, targets: 7 },
            { width: 140, targets: 8 },
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