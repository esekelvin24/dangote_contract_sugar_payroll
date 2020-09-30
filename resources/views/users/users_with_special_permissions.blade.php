@extends('layouts.datatable-adminlte2-4-0')
@section('title') All Users with Special Permissions @endsection
@section('content')

      <section class="content-header">
      <h1>
     All Users with Special Permissions
    
      </h1>
       <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li class="active"><i class="fa fa-users" style="color: blue;"></i> All Users with Special Permissions</li>
      </ol>
    </section>
   
<!-- /////////////////////////////////////////////////////////////////////// -->

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <div class="box-header">
                @role(('admin')) 
                <a href="{{ url('/manage_users/all?e=') }}"><button type="button" class="btn btn-primary btn-sm btn-flat"><span class="btn-label"><i class="fa fa-user-plus"></i></span> Assign Permissions to users</button></a>
                @endrole
            </div>

            <!-- /.box-header -->
            <div class="box-body table-responsive">
             <table id="example1" class="table table-borderless table-striped">
                <thead>
               <tr style="background-color: #a0bdf2">
                  <th class="exportable">S/No</th>
                  <th class="exportable">Name</th>
                   <th class="exportable">SAP NO</th>
                  <th class="exportable">Email</th>
                   
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                   @foreach ($users as $a => $user)  
                <tr>
                  <td>{{$a + 1}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->sap}}</td>
                  <td>{{$user->email}}</td> 
                  <td>
                        
      @role(('admin'))
      <a href="{{ url('assign_permissions_to_user/'.$user->id) }}" target="_blank"><button type="button" class="btn btn-sm btn-flat" style="background-color: #a353c8 ; color: white"><span class="btn-label"><i class="fa fa-key"></i></span> view Special Permissions</button></a>
      @endrole
                 {{-- <button type="button" class="btn btn-danger btn-sm btn-flat" onclick="deleteuser(this.id)" id="{{$user->user_id}}"><span class="btn-label"><i class="fa fa-trash"></i></span> Delete</button> --}}
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