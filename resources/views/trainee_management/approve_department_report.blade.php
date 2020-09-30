@extends('layouts.datatable-adminlte2-4-0')
@section('title') Department Report List @endsection
@section('content')

    <section class="content-header">
       
    <h1>
    
    Approve Department Report List 
    

    






   
   
    </h1>
        
       <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li class="active"><i class="fa fa-users" style="color: blue;"></i> Departmental Report List</li>
      </ol>
    </section>

   
<!-- /////////////////////////////////////////////////////////////////////// -->

    <section class="content">

     

      <div class="row">
        <div class="col-xs-12">
          <div class="box">
           
            <div class="row">
              <br/>
            <form method="GET" action="{{url('/approve_departmental_report')}}">
                   <div style="margin-left:10px" class="col-md-2 col-sm-4">
                    <label>Approval Status </label>
                         <select name="filter" class="form-control">
                           <option {{$request->filter=="pending"?"selected":""}} value="pending">Pending</option>
                           <option {{$request->filter=="approved"?"selected":""}} value="approved">Approved</option>
                           <option {{$request->filter=="rejected"?"selected":""}} value="rejected">Rejected</option>
                           <option {{$request->filter=="all"?"selected":""}} value="all">All</option>
                         </select>
                   </div>
                   
                   <div style="margin-top:25px" class="col-md-1">
                     <button class="btn btn-info">Filter</button>
                   </div>
              </form>
           </div>

            

            <!-- /.box-header -->
            <div class="box-body table-responsive">
            <table id="example1" class="table table-borderless table-striped">
                <thead>
               <tr style="background-color: #a0bdf2">
                  <th class="exportable">S/No</th>
                  <th class="exportable">name</th>
                  <th class="exportable">Location</th>
                  <th class="exportable">Department</th>
                  <th class="exportable">Duration</th>
                  <th class="exportable">SAP NO</th>
                  <th class="exportable">Date and time submited</th>
                  <th class="exportable">Approver Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @php
                  $counter = 0;
                  @endphp

                  @if(count($report_lists) > 0)
                    @foreach ($report_lists as $val)  
                      <tr>
                      <td>{{$counter = $counter + 1}}</td>
                         
                         <td>{{$val->staff_name}}</td>
                         <td>{{$val->perment_office_location_name}}</td>
                         <td>{{$val->department_name}}</td>
                      <td>{{substr($val->start_date,0,10)}}  <strong>To</strong>  {{substr($val->end_date,0,10)}}</td>
                         <td>{{$val->sap}}</td>
                         <td>{{$val->created_at}}</td>
                         @if($val->status == 0)
                            <td><i class="fa fa-spinner" style="color: orange;"> Pending </i></td>
                         @elseif ($val->status == 1)
                            <td><i class="fa fa-check" style="color: green;"> Confirmed </i></td>
                         @elseif ($val->status == 2)
                           <td><i class="fa fa-close" style="color: red;"> Rejected </i></td>
                         @endif

                         <td>

                          <a href="{{ url('departmental_report_details/'.base64_encode($val->schedule_id)) }}" ><button type="button" class="btn btn-default btn-sm btn-flat" title="Info"><span class="btn-label"><i class="fa fa-info-circle"></i></span> View Report</button></a>
                         
                         </td>
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

swal("Successful", "{{Session::get('success')}}", "success");
		
@endif




@if(Session::get('error'))

swal("Failed", "{{Session::get('error')}}", "error");

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