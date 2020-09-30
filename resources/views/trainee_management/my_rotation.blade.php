@extends('layouts.datatable-adminlte2-4-0')
@section('title') My Rotation @endsection
@section('content')

    <section class="content-header">
       
    <h1>
    
      @if(isset($users[0]))
         Trainee Rotation for (<strong style="color:green">{{$users[0]->staff_name}}</strong>)
     @endif
   
   
    </h1>
        
       <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
       
        <li class="active"><i class="fa fa-users" style="color: blue;"></i> My Rotation</li>
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
                {{-- <th >Trainee Log</th> --}}
                  <th >Departmental Report</th>
                 
                  <th >Action</th>
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


                        {{-- @if($val->trainee_log_userid != "")
                         <td style="color:green !important"><i class="fa fa-check"></i>  Uploaded</td>
                        @else
                          <td style="color:red"><i class="fa fa-close"></i> Not Uploaded</td>
                        @endif
--}}
                         @if($val->report_url != "")
                           <td style="color:green !important"><i class="fa fa-download"></i> <a target="_blank" href="{{url('trainee_departmental_report/'.$val->report_url)}}"> Available</a></td>
                         @else
                           <td style="color:red">Not Available</td>
                         @endif
                        
                         <td>
                            <a href="{{ url('upload_new_report/'.base64_encode($val->schedule_id)) }}"  ><button type="button" class="btn btn-default btn-sm btn-flat" title="Info"><span class="btn-label"><i class="fa fa-info-circle"></i></span> Upload Report</button></a>
                            <a href="{{ url('upload_new_trainee_log/'.base64_encode($val->schedule_id)) }}"  ><button type="button" class="btn  btn-default btn-sm btn-flat" title="Edit"><span class="btn-label"><i class="fa fa-edit"></i></span> Upload Log</button></a>
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