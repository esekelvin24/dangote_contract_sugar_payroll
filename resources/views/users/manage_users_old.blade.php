@extends('layouts.datatable-adminlte2-4-0')
@section('title') Manage Users @endsection
@section('content')

    <section class="content-header">
      <h1>
        Manage Users  
      </h1>
       <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li class="active"><i class="fa fa-users" style="color: blue;"></i> Manage Users</li>
      </ol>
    </section>
   
<!-- /////////////////////////////////////////////////////////////////////// -->

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

 @permission(('can-register-users')) 
            <div class="box-header">
                <a href="{{ url('/register_user') }}"><button type="button" class="btn btn-primary btn-sm btn-flat"><span class="btn-label"><i class="fa fa-user-plus"></i></span> Register New User</button></a>
            </div>
  @endpermission
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
                  <th class="exportable">Role</th>
                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                   @foreach ($users as $a => $user)  
                <tr>
                  <td>{{$a + 1}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                   <td>{{$user->sap}}</td>
                  <td>{{$user->department_name}}</td>
                  <td>{{$user->role_desplay_name}}</td>
                  <td>
                  
                   <a href="{{ url('view_user_details/'.$user->id) }}"  target="_blank"><button type="button" class="btn btn-warning btn-sm btn-flat"><span class="btn-label"><i class="fa fa-info-circle"></i></span> Info</button></a>

 @permission(('can-edit-all-users')) 
                   <a href="{{ url('edit_user/'.$user->id) }}"  target="_blank"><button type="button" class="btn  btn-success btn-sm btn-flat"><span class="btn-label"><i class="fa fa-edit"></i></span> Edit</button></a>
  @endpermission

 @permission(('can-reset-password')) 
                   <a href="{{ url('/reset_credentials/'.$user->id) }}"  target="_blank"><button type="button" class="btn btn-danger btn-flat"><span class="btn-label"></span> Reset Password</button></a>
 @endpermission
 
                   <a href="{{ url('my_attendance/'.$user->sap) }}" target="_blank"><button type="button" class="btn  btn-primary btn-sm btn-flat"><span class="btn-label"><i class="fa fa-calendar-check-o"></i></span> View attendace</button></a>

                    {{-- <a href="{{ url('attendance_regularisation/'.$user->sap) }}" target="_blank"><button type="button" class="btn btn-sm btn-flat" style="background-color: #1183d7; color: white"><span class="btn-label"><i class="fa fa-asterisk"></i></span> Attendance Regularisation</button></a> --}}

                    <a href="{{ url('my_attendance_regularisation_list/'.$user->sap) }}" target="_blank"><button type="button" class="btn btn-sm btn-flat" style="background-color: #1183d7; color: white"><span class="btn-label"><i class="fa fa-calendar-times-o"></i></span> Regularization List</button></a>

                    <a href="{{ url('my_leave_request_list/'.$user->sap) }}" target="_blank"><button type="button" class="btn btn-sm btn-flat" style="background-color: #0e6c3e ; color: white"><span class="btn-label"><i class="fa fa-pied-piper-alt"></i></span> Leave Requset List</button></a>

                 {{-- <button type="button" class="btn btn-danger btn-sm btn-flat" onclick="deleteuser(this.id)" id="{{$user->user_id}}"><span class="btn-label"><i class="fa fa-trash"></i></span> Delete</button> --}}
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
                  <th>Role</th>
                  <th>Action</th>
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
            { width: 120, targets: 1 },
            { width: 140, targets: 2 },
            { width: 140, targets: 3 },
            { width: 140, targets: 4 },
            { width: 120, targets: 5 },
            { width: 700, targets: 6 },
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