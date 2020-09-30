@extends('layouts.datatable-adminlte2-4-0')
@section('title') Manage Roles @endsection
@section('content')

    <section class="content-header">
      <h1>
        Manage Roles  
      </h1>
       <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li class="active"><i class="fa fa-archive" style="color: blue;"></i> Manage Roles</li>
      </ol>
    </section>
   
<!-- /////////////////////////////////////////////////////////////////////// -->

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <a href="{{ url('/create_role') }}"><button type="button" class="btn btn-primary btn-sm btn-flat"><span class="btn-label"><i class="fa fa-archive"></i></span> Add New Role</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <table id="example1" class="table table-borderless table-striped">
                <thead>
               <tr style="background-color: #a0bdf2">
                  <th class="exportable">S/No</th>
                  <th class="exportable">Name</th>
                  <th class="exportable">Display Name</th>
                  <th class="exportable">Description</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  
                      @foreach ($roles as $a => $role) 
                <tr>
                    <td>{{$a + 1}}</td>
                 <td>{{ $role->name }}</td>
                  <td>{{ $role->display_name }}</td>
                  <td>{{ $role->description }}</td>

                  <td>
                 
                   <a href="{{ url('view_role/'.$role->id) }}"><button type="button" class="btn btn-warning btn-sm btn-flat"><span class="btn-label"><i class="fa fa-info-circle"></i></span> Info</button></a>
                    @if($role->default_role==0)
                   <a href="{{ url('edit_role/'.$role->id) }}"><button type="button" class="btn  btn-success btn-sm btn-flat"><span class="btn-label"><i class="fa fa-edit"></i></span> Edit</button></a>
                   
                {{--  <button type="button" class="btn btn-danger btn-sm btn-flat" onclick="deleterole(this.id)" id="{{$role->id}}"><span class="btn-label"><i class="fa fa-trash"></i></span> Delete</button> --}}
                 @endif
                   @if($role->default_role==1)
                  <i class="fa fa-warning" style="color: red"> This is a default Role, can't be Edited or Deleted</i>
                    @endif
                  </td>
                </tr>
                 @endforeach
                
                </tbody>
               <tfoot>
                   <tr style="background-color: #a0bdf2">
                  <th>S/No</th>
                  <th>Name</th>
                  <th>Display Name</th>
                  <th>Description</th>
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
 function deleterole(e) { 
   //alert(e);
   // var id = $(e.currentTarget).attr("id");
   // alert= $id,
   // var userId = $(e.currentTarget).data("id"); 
  swal({   
    title: "Are you sure?",
    text: "You want to delete this Role!",   type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes, delete it!", 
    closeOnConfirm: false 
  }, 
       function(){   
       window.location.href = "{{ url('/delete_role') }}" + '/' + e;

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

        scrollCollapse: true,
        paging:         true,
        ordering:       true,
        searching:    true,
        columnDefs: [
            { width: 8, targets: 0 },
            { width: 100, targets: 1 },
            { width: 100, targets: 2 },
            { width: 100, targets: 3 },
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