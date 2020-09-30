@extends('layouts.datatable-adminlte2-4-0')
@section('title') Manage Mapped Users @endsection
@section('content')

      <section class="content-header">
          
        <section class="content-header">
          <h1>
          Manage Mapped Users (
          @if($user_category == "non")
          SELECT CATEGORY BELOW 
          @elseif($user_category == "")
          ALL USERS
          @else
          
          {{ strtoupper(isset($user_category_info->staff_category_name)?$user_category_info->staff_category_name:"") }}
          @endif
          )
    
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

            <div class="box-header">
            @permission(('can-register-users')) 
                <a href="{{ url('/register_user') }}"><button type="button" class="btn btn-default btn-sm btn-flat"><span class="btn-label"><i class="fa fa-user-plus"></i></span> Register New User</button></a>
             @endpermission
            
          @permission(('hr_business_partners')) 
                 <a href="{{ url('/hr_manage_users/1') }}"><button type="button" class="btn btn-default btn-sm btn-flat"><span class="btn-label"><i class="fa fa-users"></i></span> National Staff</button></a>

                 <a href="{{ url('/hr_manage_users/2') }}"><button type="button" class="btn btn-default btn-sm btn-flat"><span class="btn-label"><i class="fa fa-users"></i></span> Expat Staff</button></a>

                 <a href="{{ url('/hr_manage_users/3') }}"><button type="button" class="btn btn-default btn-sm btn-flat"><span class="btn-label"><i class="fa fa-users"></i></span> Casual Workers</button></a>

                 <a href="{{ url('/hr_manage_users/4') }}"><button type="button" class="btn  btn-default btn-sm btn-flat" ><span class="btn-label"><i class="fa fa-users"></i></span> Contract Staff</button></a> 

                 <a href="{{ url('/hr_manage_users/all') }}"><button type="button" class="btn  btn-default btn-sm btn-flat" ><span class="btn-label"><i class="fa fa-users"></i></span> All Staff</button></a> 
           @endpermission
           
                    
            <div class="row">
             <br/>
            <form method="GET" action="{{url()->current()}}">
                  <div class="col-md-2 col-sm-4">
                        <select name="filter" class="form-control">
                          <option value="">All Department</option>
                          @foreach($dept_arr as $id => $value)

                          <option {{$sel_id==$id?"selected":""}} value="{{$id}}">{{$value}}</option>

                        @endforeach
                        </select>
                  </div>

                  
                
                  <div class="col-md-1">
                    <button class="btn btn-info">Filter</button>
                  </div>
              </form>
          </div>
       </div>   
@if(!$users->isEmpty() && $user_category !="non")

            <!-- /.box-header -->
            <div class="box-body table-responsive">
             <table id="example1" class="table table-borderless table-striped">
                <thead>
               <tr style="background-color: #a0bdf2">
                  <th class="exportable">S/No</th>
                  <th class="exportable">Name</th>
                   <th class="exportable">SAP NO</th>
                  <th class="exportable">Department</th>
                  <th class="exportable">Staff Category </th>
                  <th class="exportable">Email</th>
                  <th class="exportable">App Role</th>
                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $a => $user)  
                <tr>
                  <td>{{$a + 1}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->sap}}</td>
                  <td>{{$user->department_name}}</td>
                  <td>{{$user->staff_category_name}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->role_desplay_name}}</td>
                 
                  <td>
                  
                   <a href="{{ url('view_user_details/'.$user->id) }}"  target="_blank"><button type="button" class="btn btn-default btn-sm btn-flat" title="Info"><span class="btn-label"><i class="fa fa-info-circle"></i></span></button></a>

 @permission(('can-edit-all-users')) 
                   <a href="{{ url('edit_user/'.$user->id) }}"  target="_blank"><button type="button" class="btn  btn-default btn-sm btn-flat" title="Edit"><span class="btn-label"><i class="fa fa-edit"></i></span></button></a>
  @endpermission

 <!-- @permission(('can-reset-password')) 
                   <a href="{{ url('/reset_credentials/'.$user->id) }}"  target="_blank"><button type="button" class="btn btn-danger btn-flat"><span class="btn-label"></span> Reset Password</button></a>
 @endpermission -->
 
                   <a href="{{ url('my_attendance/'.$user->sap) }}" target="_blank"><button type="button" class="btn  btn-default btn-sm btn-flat" title="View attendance"><span class="btn-label"><i class="fa fa-calendar-check-o"></i></span></button></a>

                    {{-- <a href="{{ url('attendance_regularisation/'.$user->sap) }}" target="_blank"><button type="button" class="btn btn-default btn-sm btn-flat" title="Attendance Regularisation"><span class="btn-label"><i class="fa fa-asterisk"></i></span> </button></a> --}}

                    <a href="{{ url('my_attendance_regularisation_list/'.$user->sap) }}" target="_blank"><button type="button" class="btn btn-default btn-sm btn-flat" title="Regularization List"><span class="btn-label"><i class="fa fa-calendar-times-o"></i></span> </button></a>

                    <a href="{{ url('my_leave_request_list/'.$user->sap) }}" target="_blank"><button type="button" class="btn btn-default btn-sm btn-flat" title="Leave Requset List"><span class="btn-label"><i class="fa fa-pied-piper-alt"></i></span></button></a>

      <!-- @role(('admin'))
      <a href="{{ url('assign_permissions_to_user/'.$user->id) }}" target="_blank"><button type="button" class="btn btn-sm btn-flat" style="background-color: #a353c8 ; color: white"><span class="btn-label"><i class="fa fa-key"></i></span> Assign Special Permissions to user</button></a>
      @endrole 
                 {{-- <button type="button" class="btn btn-danger btn-sm btn-flat" onclick="deleteuser(this.id)" id="{{$user->user_id}}"><span class="btn-label"><i class="fa fa-trash"></i></span> Delete</button> --}}
            -->
                </td>
                </tr>
                 @endforeach
                </tbody>
              
              </table>
            </div>
            <!-- /.box-body -->
@else
<br/><br/>
        <p>{{"----Mapped staff does not exist in this category----"}}</p>
@endif

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
      // the Width control starts here
        scrollY:        "300px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         false,
        info:           true,
        ordering:       true,
        searching:      true,
        columnDefs: [
            { width: 8, targets: 0 },
            { width: 120, targets: 1 },
            { width: 90, targets: 2 },
            { width: 180, targets: 3 },
            { width: 140, targets: 4 },
            { width: 120, targets: 5 },
            { width: 90, targets: 6 },
            { width: 950, targets: 7 },

        ],
       fixedColumns: { leftColumns: 3 },

// the export starts here
        
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