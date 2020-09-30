@extends('layouts.datatable-adminlte2-4-0')
@section('title') List of Training @endsection
@section('content')

    <section class="content-header">
       
    <h1> List of Training </h1>
        
       <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li class="active"><i class="fa fa-users" style="color: blue;"></i> List of Training</li>
      </ol>
    </section>

   
<!-- /////////////////////////////////////////////////////////////////////// -->

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            
          <div class="box-header">
              <a href="{{url('/new_training')}}" target="_blank"><button type="button" class="btn btn-primary btn-sm btn-flat"><span class="btn-label"><i class="fa fa-calendar-plus-o"></i></span> New Training</button></a>
              <a href="{{url('/new_yearly_training')}}" target="_blank"><button type="button" class="btn btn-info btn-sm btn-flat"><span class="btn-label"><i class="fa fa-calendar-plus-o"></i></span> New Yearly Training</button></a>
          </div>

            <div class="row">
              <br/>
                   <div style="margin-left:10px" class="col-md-2 col-sm-4">
                    <label>Status </label>
                         <select name="filter" class="form-control">
                           <option value="">Upcomming</option>
                           <option value="">Closed</option>
                         </select>
                   </div>

                   <div style="margin-left:10px" class="col-md-2 col-sm-4">
                   <label>Venue </label>
                      <select name="filter" class="form-control">
                        <option value="">Room 1</option>
                        <option value="">T & D learning Center</option>
                      </select>
                   </div>
                   
                   <div style="margin-top:25px" class="col-md-1">
                     <button class="btn btn-info">Filter</button>
                   </div>
           </div>

            <!-- /.box-header -->
            <div class="box-body table-responsive">
             <table id="example1" class="table table-borderless table-striped">
                <thead>
               <tr style="background-color: #a0bdf2">
                  <th class="exportable">S/No</th>
                  <th class="exportable">Training Title</th>
                  <th class="exportable">Venue</th>
                  <th class="exportable">Date</th>
                  <th class="exportable">Training Type</th>
                  <th class="exportable">Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                {{--  @if(count($report_lists) > 0) --}}
                   {{-- @foreach ($report_lists as $a => $val)  --}}
                      <tr>
                         <td>1</td>
                         <td>ITIL Profession course</td>
                         <td>T & D training Room</td>
                         <td>11-05-2020</td>
                         <td>Internal</td>
                         <td><i class="fa fa-spinner" style="color: orange;"> closed </i></td>
                         <td><a href="{{url('/training_list_details/29121222')}}" target="_blank"><button type="button" class="btn btn-warning btn-sm btn-flat"><span class="btn-label"><i class="fa fa-info-circle"></i></span> Info</button></a></td>
                      </tr>
                   {{-- @endforeach --}}
                {{--  @endif  --}}
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


@if(Session::get('success'))

swal("Rollback Successful", "{{Session::get('success')}}", "success");
		
@endif




@if(Session::get('error'))

swal("Rollback failed", "{{Session::get('error')}}", "error");

@endif











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
        order: [[ 6, "asc" ], [ 4, 'desc' ]], 
        pageLength: 40,
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