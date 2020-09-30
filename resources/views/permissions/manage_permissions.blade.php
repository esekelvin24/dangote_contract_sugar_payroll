@extends('layouts.datatable-adminlte2-4-0')
@section('title') Manage Permissions @endsection
@section('content')

    <section class="content-header">
      <h1>
        Manage Permissions  
      </h1>
       <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li class="active"><i class="fa fa-key" style="color: blue;"></i> Manage Permissions</li>
      </ol>
    </section>
   
<!-- /////////////////////////////////////////////////////////////////////// -->

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <a href="{{ url('/create_permission') }}"><button type="button" class="btn btn-primary btn-sm btn-flat"><span class="btn-label"><i class="fa fa-plus"></i></span> Add New Permission</button></a>
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
                  
                      @foreach ($permissions as $a => $permission) 
                <tr>
                    <td>{{$a + 1}}</td>
                 <td>{{ $permission->name }}</td>
                  <td>{{ $permission->display_name }}</td>
                  <td>{{ $permission->description }}</td>

                  <td>
                 
                   <a href="{{ url('view_permission/'.$permission->id) }}"><button type="button" class="btn btn-warning btn-sm btn-flat"><span class="btn-label"><i class="fa fa-info-circle"></i></span> Info</button></a>
                  
                   <a href="{{ url('edit_permission/'.$permission->id) }}"><button type="button" class="btn  btn-success btn-sm btn-flat"><span class="btn-label"><i class="fa fa-edit"></i></span> Edit</button></a>
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




<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#example1').removeAttr('width').DataTable( {

        scrollCollapse: true,
        paging:         true,
        ordering:       true,
        searching:    true,
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