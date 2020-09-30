@extends('layouts.datatable-adminlte2-4-0')
@section('title') Staff List @endsection
@section('content')

    <section class="content-header">
      <h1>
      My Staff List
      </h1>
       <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li class="active"><i class="fa fa-users" style="color: blue;"></i> My Staff List</li>
      </ol>
    </section>
   
<!-- /////////////////////////////////////////////////////////////////////// -->

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body table-responsive">
             <table id="example1" class="table table-borderless table-striped">
                <thead>
               <tr style="background-color: #a0bdf2">
                  <th class="exportable">S/No2</th>
                  <th class="exportable">Name</th>
                  <th class="exportable">Email</th>
                  <th class="exportable">SAP NO</th>
                  <th class="exportable">Department</th>
                  <th>View Profile</th>
                  <th>View Attendance</th>
                  <th>View Regularisations</th>
                  <th>View Leave Request</th>
                </tr>
                </thead>
                <tbody>
                   @foreach ($users as $a => $user)  
                <tr>
                  <td>{{$a + 1}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                   <td>{{$user->sap}}</td>
                  <td>{{$user->department->name}}</td>
                  <td>
                  
                   <div style="align-content: center;"><a href="{{url('view_user_details/'.$user->id)}}" class="btn btn-info btn-xs" target="_blank">View</a></div>
                  </td>
                  <td>
                   <div style="align-content: center;"><a href="{{url('my_attendance/'.$user->sap)}}" class="btn btn-success btn-xs" target="_blank">View</a></div>
                  </td>

                   <td>
                   <div style="align-content: center;"><a href="{{url('my_attendance_regularisation_list/'.$user->sap)}}" class="btn btn-warning btn-xs" target="_blank">View</a></div>
                  </td>

                    <td>
                   <div style="align-content: center;"><a href="{{url('my_leave_request_list/'.$user->sap)}}" class="btn btn-danger btn-xs" target="_blank">View</a></div>
                  </td>

                </tr>
                 @endforeach
                
                </tbody>
               <tfoot>
                   <tr style="background-color: #a0bdf2">
                  <th>S/No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>SAP NO</th>
                  <th>Department</th>
                  <th>View Profile</th>
                  <th>View Attendance</th>
                  <th>View Regularisations</th>
                  <th>View Leave Request</th>
                </tr>
               </tfoot>
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
            { width: 160, targets: 1 },
            { width: 140, targets: 2 },
            { width: 140, targets: 3 },
            { width: 160, targets: 4 },
            { width: 100, targets: 5 },
            { width: 100, targets: 6 },
            { width: 100, targets: 7 },
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