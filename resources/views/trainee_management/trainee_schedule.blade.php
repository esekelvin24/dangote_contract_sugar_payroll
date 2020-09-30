@extends('layouts.datatable-adminlte2-4-0')
@section('title') Trainee Schedule @endsection
@section('content')

      <section class="content-header">
          
        <section class="content-header">
          <h1>
            Trainee Schedule List (
            @if($user_category == "1")
            NATIONAL STAFF
            @elseif($user_category == "2")
            EXPAT STAFF
            @elseif($user_category == "3")
            CASUAL STAFF
            @elseif($user_category == "4")
            CONTRACT STAFF
            @elseif($user_category == "")
            ALL STAFF
            @else
            ALL STAFF
            @endif
            )
       
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
              <a href="{{url('/user_search_list/all?e=')}}" ><button type="button" class="btn btn-primary btn-sm btn-flat"><span class="btn-label"><i class="fa fa-calendar-plus-o"></i></span> New Schedule</button></a>
          </div>

            <div class="box-header">
            
          @permission(('hr_business_partners')) 
                 <a href="{{ url('/trainee_schedule/1') }}"><button type="button" class="btn btn-default btn-sm btn-flat"><span class="btn-label"><i class="fa fa-users"></i></span> National Staff</button></a>

                 <a href="{{ url('/trainee_schedule/2') }}"><button type="button" class="btn btn-default btn-sm btn-flat"><span class="btn-label"><i class="fa fa-users"></i></span> Expat Staff</button></a>

                 <a href="{{ url('/trainee_schedule/3') }}"><button type="button" class="btn btn-default btn-sm btn-flat"><span class="btn-label"><i class="fa fa-users"></i></span> Casual Workers</button></a>

                 <a href="{{ url('/trainee_schedule/4') }}"><button type="button" class="btn  btn-default btn-sm btn-flat" ><span class="btn-label"><i class="fa fa-users"></i></span> Contract Staff</button></a> 

                 <a href="{{ url('/trainee_schedule/all') }}"><button type="button" class="btn  btn-default btn-sm btn-flat" ><span class="btn-label"><i class="fa fa-users"></i></span> All Staff</button></a> 
           @endpermission    
            
       </div>   

       <div style="margin-left: -2px;" class="row">
        <br/>
      <form method="GET" action="{{url()->current()}}">
            <div class="col-md-2 col-sm-4">
              <label>Staff Type</label>
                  <select name="staff_type" class="form-control">
                    <option value="">All</option>
                    <option {{$request->staff_type=="ET"?"selected":""}} value="ET">ET</option>
                    <option {{$request->staff_type=="MT"?"selected":""}} value="MT">MT</option>
                    <option {{$request->staff_type=="Others"?"selected":""}} value="Others">Others</option>
                  </select>
            </div>

              <div class="col-md-2 col-sm-4">
                <label>Status</label>
                <select name="status" class="form-control">
                  <option {{$request->status=="ongoing"?"selected":""}} value="ongoing">Ongoing</option>
                  <option {{$request->status=="confirmed"?"selected":""}} value="confirmed">Confirmed</option>
                  <option {{$request->status=="terminated"?"selected":""}} value="terminated">Terminated</option>
                  <option {{$request->status=="voluntary_exit"?"selected":""}} value="voluntary_exit">Voluntary Exit</option>
                </select>
              </div>
          
            <div style="padding-top: 25px;" class="col-md-1">
              <button class="btn btn-info">Filter</button>
            </div>
        </form>

@if(count($users) > 0 && $user_category !="non")

          
          </div>

            <!-- /.box-header -->
            <div class="box-body table-responsive">
             <table id="example1" class="table table-borderless table-striped">
                <thead>
               <tr style="background-color: #a0bdf2">
                  <th class="exportable">S/No</th>
                  <th class="exportable">Name</th>
                   <th class="exportable">SAP NO</th>
                  <th class="exportable">Staff Type</th>
                  <th class="exportable">Staff Category </th>
                  <th class="exportable">Email</th>
                 
                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($users as $a => $user)  
                <tr>
                  <td>{{$a + 1}}</td>
                  <td>{{$user->staff_name}}</td>
                  <td>{{$user->sap}}</td>
                  <td>{{$user->staff_type_name}}</td>

                  @if($user->user_category_id == 1)
                    <td>Nationals</td>
                  @elseif($user->user_category_id == 2)
                    <td>Expat</td>
                  @elseif($user->user_category_id == 3)
                    <td>Casual</td>
                  @elseif($user->user_category_id == 4)
                    <td>Contract</td>
                  @else
                    <td></td>
                  @endif


                  <td>{{$user->email}}</td>
                 
                 
                  <td>
                  
                   <a href="{{ url('trainee_schedule_details/'.base64_encode($user->sap)) }}" ><button type="button" class="btn btn-default btn-sm btn-flat" title="Schedule Info"><span class="btn-label"><i class="fa fa-info-circle"></i></span></button></a>

 
                   <a href="{{ url('edit_schedule/'.base64_encode($user->sap)) }}"  ><button type="button" class="btn  btn-default btn-sm btn-flat" title="Edit Schedule"><span class="btn-label"><i class="fa fa-edit"></i></span></button></a>
  

 
                   <a href="{{ url('my_attendance/'.$user->sap) }}" target="_blank"><button type="button" class="btn  btn-default btn-sm btn-flat" title="View attendance"><span class="btn-label"><i class="fa fa-calendar-check-o"></i></span></button></a>

                   
                   
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
        <p style="padding-left:10px;">{{"  ----No Trainee Schedule has been created----"}}</p>
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
            { width: 950, targets: 6 },
          

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