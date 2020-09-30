@extends('layouts.datatable-adminlte2-4-0')
@section('title') Manage Groups @endsection
@section('content')

    <section class="content-header">
      <h1>
        Manage Groups  
      </h1>
       <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li class="active"><i class="fa fa-archive" style="color: blue;"></i> Manage Groups</li>
      </ol>
    </section> 
   
<!-- /////////////////////////////////////////////////////////////////////// -->

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <a href="{{ url('/create_group') }}"><button type="button" class="btn btn-primary btn-sm btn-flat"><span class="btn-label"><i class="fa fa-archive"></i></span> Add New Group</button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <table id="example1" class="table table-borderless table-striped">
                <thead>
               <tr style="background-color: #a0bdf2">
                  <th class="exportable">S/No</th>
                  <th class="exportable">Name</th>
                  <th class="exportable">Description</th>
                  <th class="exportable">Created at</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @php  $a = 0; @endphp
                      @foreach ($groups as $val) 
                <tr>
                    <td>{{$a  +=1}}</td>
                 <td>{{ $val->group_name }}</td>
                  <td>{{ $val->description }}</td>
                  <td>{{ $val->created_at }}</td>

                  <td>
                 
                   <a href="{{ url('view_group/'.$val->group_id) }}"><button type="button" class="btn btn-warning btn-sm btn-flat"><span class="btn-label"><i class="fa fa-info-circle"></i></span> Info</button></a>
                   {{-- @if($val->default_group==0) --}} 
                   <a href="{{ url('edit_group/'.$val->group_id) }}"><button type="button" class="btn  btn-success btn-sm btn-flat"><span class="btn-label"><i class="fa fa-edit"></i></span> Edit</button></a>
                   <a href="{{ url('add_group_admin/'.$val->group_id) }}"><button type="button" class="btn btn-info btn-sm btn-flat"><span class="btn-label"><i class="fa fa-info-circle"></i></span> Add Admin</button></a>
                   
                 {{-- <button type="button" class="btn btn-danger btn-sm btn-flat" onclick="deleterole(this.id)" id="{{$role->id}}"><span class="btn-label"><i class="fa fa-trash"></i></span> Delete</button> --}}
                {{-- @endif  --}}
                  {{--  @if($val->default_group==1)
                  <i class="fa fa-warning" style="color: red"> This is a default Role, can't be Edited or Deleted</i>
                    @endif --}} 
                  </td>
                </tr>
                 @endforeach
                
                </tbody>
               <tfoot>
                   <tr style="background-color: #a0bdf2">
                    <th class="exportable">S/No</th>
                    <th class="exportable">Name</th>
                    <th class="exportable">Description</th>
                    <th class="exportable">Created at</th>
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

<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#example1').removeAttr('width').DataTable( {

        scrollCollapse: true,
        paging:         true,
        ordering:       true,
        searching:    true,
        order:[0,4],
        columnDefs: [
            { width: 8, targets: 0 },
            { width: 120, targets: 1 },
            { width: 140, targets: 2 },
            { width: 140, targets: 3 },
            { width: 400, targets: 4 },
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