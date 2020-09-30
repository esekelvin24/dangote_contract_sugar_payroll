@extends('layouts.datatable-adminlte2-4-0')
@section('title') Department Report List @endsection
@section('content')

    <section class="content-header">
       
    <h1>
    
    Trainee Schedule Details for (<strong style="color:green">{{$users[0]->staff_name}}</strong>)
    
   
   
    </h1>
        
       <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li><a href="{{ url('/trainee_schedule/none') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Trainee Schedule</a></li>
        <li class="active"><i class="fa fa-users" style="color: blue;"></i> Trainee Schedule Details</li>
      </ol>
    </section>

   
<!-- /////////////////////////////////////////////////////////////////////// -->

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            
            @php
                $filter = isset($filter)?$filter:"";
                $department_list = isset($department_list)?$department_list:array();

                 
            @endphp

         

            <!-- /.box-header -->
            <div class="box-body table-responsive">

            @if(count($users) > 0)
            <a style="margin-bottom:5px; margin-top:5px;" href="{{url('/edit_schedule/'.base64_encode($users[0]->sap))}}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit Schedule</a>
            
            @endif

            <table id="example1" class="table table-borderless table-striped">
                <thead>
               <tr style="background-color: #a0bdf2">
                <th class="exportable">SAP</th>
                <th class="exportable">Name</th>
                  <th class="exportable">Rotation</th>
                  <th class="exportable">Office Location</th>
                  <th class="exportable">Department</th>
                  <th class="exportable">Start Date</th>
                  <th class="exportable">End Date</th>
                 
                </tr>
                </thead>
                <tbody>
                  @php
                      $counter = 0;
                  @endphp
                  @if(count($users) > 0)
                    @foreach ($users as $val)  
                      <tr>
                        <td>{{$val->sap}}</td>
                        <td>{{$val->staff_name}}</td>
                         <td>{{$counter = $counter + 1}}</td>
                         <td>{{$val->perment_office_location_name}}</td>
                         <td>{{$val->department_name}}</td>
                         <td>{{substr($val->start_date,0,10)}}</td>
                         <td>{{substr($val->end_date,0,10)}}</td>
                      </tr>
                    @endforeach
                  @endif
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