@extends('layouts.datatable-adminlte2-4-0')
@section('title') Sent Email History @endsection
@section('content')

      <section class="content-header">
          
        <section class="content-header">
          <h1>
            Account Email History
       
        </h1>
      
       <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li class="active"><i class="fa fa-users" style="color: blue;"></i> Trainee Schedule</li>
      </ol>
    </section>
   
<!-- /////////////////////////////////////////////////////////////////////// -->

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">



          

            <div class="box-header">
            
            
            
       </div>   

       <div style="margin-left: -2px;" class="row">
        <br/>
      <form method="GET" action="{{url()->current()}}">
            <div class="col-md-2 col-sm-4">
              <label>Filter By</label>
                  <select required name="filter_by" class="form-control">
                    <option value="">All</option>
                    <option {{$request->filter_by=="batch_id"?"selected":""}} value="batch_id">Batch ID</option>
                    
                  </select>
            </div>

              <div class="col-md-2 col-sm-4">
                <label></label>
                <input required value="{{$request->value}}" name="value" id="value" class="form-control" type="text" >
              </div>
          
            <div style="padding-top: 25px;" class="col-md-1">
              <button class="btn btn-info">Filter</button>
            </div>
        </form>

@if(count($batch_record) > 0 )

          
          </div>

            <!-- /.box-header -->
            <div class="box-body table-responsive">
             <table id="example1" class="table table-borderless table-striped">
                <thead>
               <tr style="background-color: #a0bdf2">
                  <th class="exportable">S/No</th>
                  <th class="exportable">Batch ID</th>
                  <th class="exportable">Created By</th>
                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                  $count = 0;
                @endphp
                    @foreach ($batch_record as $val)  
                <tr>
                  <td>{{ $count += 1}}</td>
                  <td>{{$val->batch_id}}</td>
                  <td>{{$val->fullname}}</td>
            
                 
                  <td>
                  
                   <a href="{{ url('account_creation_email_history_details/'.base64_encode($val->batch_id)) }}" ><button type="button" class="btn btn-default btn-sm btn-flat" title="Schedule Info"><span class="btn-label"><i class="fa fa-info-circle"></i>  View Info</span></button></a>

 
                
               
                </td>
                </tr>
                 @endforeach
                </tbody>
              
              </table>
            </div>
            <!-- /.box-body -->
@else
<br/><br/>
        <p style="padding-left:10px;">{{"  ----No Record Found ----"}}</p>
@endif

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
      
// the export starts here
        
        dom: 'Bfrtip',
        order: [3, 'asc'],
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