@extends('layouts.datatable-adminlte2-4-0')
@section('title') Attendance Regularisation List @endsection
@section('content')

    <section class="content-header">
       
    <h1>
    @if($one_person_reg_list=='yes')
    Attendance Regularisation List for <font color="green"><strong>{{$get_user_name}} ({{$sap_no}})</strong></font>
    @endif

    @if($one_person_reg_list=='no')


    <h1>
      Attendance Regularisation List (
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








   
    @endif
    </h1>
        
       <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li class="active"><i class="fa fa-users" style="color: blue;"></i> Attendance Regularisation List</li>
      </ol>
    </section>

   
<!-- /////////////////////////////////////////////////////////////////////// -->

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            @if($one_person_reg_list=='yes')
            <div class="box-header">
                <a href="{{ url('/attendance_regularisation/'.$sap_no) }}" target="_blank"><button type="button" class="btn btn-primary btn-sm btn-flat"><span class="btn-label"><i class="fa fa-calendar-plus-o"></i></span> New Attendance Regularisation</button></a>
            </div>
            @endif

            <div class="box-header">
            
              
                     <a href="{{ url('/view_other_staff_reg_list?category=1') }}"><button type="button" class="btn btn-default btn-sm btn-flat"><span class="btn-label"><i class="fa fa-users"></i></span> National Staff</button></a>
    
                     <a href="{{ url('/view_other_staff_reg_list?category=2') }}"><button type="button" class="btn btn-default btn-sm btn-flat"><span class="btn-label"><i class="fa fa-users"></i></span> Expat Staff</button></a>
    
                     <a href="{{ url('/view_other_staff_reg_list?category=3') }}"><button type="button" class="btn btn-default btn-sm btn-flat"><span class="btn-label"><i class="fa fa-users"></i></span> Casual Workers</button></a>
    
                     <a href="{{ url('/view_other_staff_reg_list?category=4') }}"><button type="button" class="btn btn-default btn-sm btn-flat" ><span class="btn-label"><i class="fa fa-users"></i></span> Contract Staff</button></a> 
    
                     <a href="{{ url('/view_other_staff_reg_list?category=all') }}"><button type="button" class="btn btn-default btn-sm btn-flat"  ><span class="btn-label"><i class="fa fa-users"></i></span> All Staff</button></a> 
               
            </div>

            @php
                $filter = isset($filter)?$filter:"";
                $department_list = isset($department_list)?$department_list:array();

                 
            @endphp

           @if (!(stripos(url()->full(), "my_attendance_regularisation_list") !== false))  
              <div class="box-header">
                <form method="GET" action="{{url()->current()}}">
                  <div class="row">
                      <div class="col-md-2 col-sm-4">
                            <select name="filter" class="form-control">
                              <option {{$filter==0?"selected":""}} value="pending">Pending Request</option>
                              <option {{$filter==1?"selected":""}} value="approved">Proccessed Request</option>
                              <option {{$filter==2?"selected":""}} value="all">All Request</option>
                            </select>
                      </div>

                      @php
                          $user = Auth::user();
                      @endphp

                    @if(!$user->hasRole('HOD'))
                        <div class="col-md-2">
                              <select name="department" class="form-control">
                                  <option value="">All Department</option>
                                @foreach($department_list as $val)
                                  <option {{$filter_dept==$val->id?"selected":""}} value="{{$val->id}}">{{$val->name}}</option>
                                @endforeach
                              </select>
                        </div>
                      @endif

                      <div class="col-md-2">
                        <button class="btn btn-info">Filter</button>
                      </div>
                  </div>
                </form>
              </div>
          @endif

            <!-- /.box-header -->
            <div class="box-body table-responsive">
             <table id="example1" class="table table-borderless table-striped">
                <thead>
               <tr style="background-color: #a0bdf2">
                  <th class="exportable">S/No</th>
                  <th class="exportable">Reg ID</th>
                   <th class="exportable">name</th>
                  <th class="exportable">SAP NO</th>
                  <th class="exportable">Date and time submited</th>
                  <th class="exportable">To Be Approved by (HOD)</th>
                  <th class="exportable">HOD Approver Status</th>
                  <th class="exportable">HR Approver Status</th>
            
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                   @foreach ($regularisation_lists as $a => $regularisation_list)  
                <tr>
                  <td>{{$a + 1}}</td>
                  <td><a href="{{ url('view_regularisation_details/'.$regularisation_list->regularisation_requester_sap_no. '/'.$regularisation_list->regularisation_grp_no) }}"  target="_blank">{{$regularisation_list->full_uniq_reg_id}}</a></td>
                  <td>{{$regularisation_list->regularisation_requester_name}}</td>
                  <td>{{$regularisation_list->regularisation_requester_sap_no}}</td>
                  <td>{{$regularisation_list->date_and_time_submited}}</td>
                  <td>{{$regularisation_list->hod_approver_name}}</td>
                  <td>
                      {!!isset($hod_arr[$regularisation_list->full_uniq_reg_id]["hod_approver_name"])?'<i class="fa fa-check" style="color: green;"> Proccessed By</i><br>':' <i class="fa fa-spinner" style="color: orange;"> Pending </i>'!!}
                    {!! isset($hod_arr[$regularisation_list->full_uniq_reg_id]["hod_approver_name"])?$hod_arr[$regularisation_list->full_uniq_reg_id]["hod_approver_name"]:""!!}
                   
                  </td>
                  <td>
                      {!!isset($hr_arr[$regularisation_list->full_uniq_reg_id]["hr_approver"])?'<i class="fa fa-check" style="color: green;"> Proccessed By</i><br>':' <i class="fa fa-spinner" style="color: orange;"> Pending </i>'!!}
                    {{isset($hr_arr[$regularisation_list->full_uniq_reg_id]["hr_approver"])?$hr_arr[$regularisation_list->full_uniq_reg_id]["hr_approver"]."":""}}
                   
                    
                     @if ($regularisation_list->regularisation_requester_sap_no == 0)
                        <i class="fa fa-spinner" style="color: orange;"> Pending </i>
                      @elseif ($regularisation_list->regularisation_requester_sap_no == 1) 
                       <i class="fa fa-check" style="color: green;"> Approved </i>
                      @elseif ($regularisation_list->regularisation_requester_sap_no == 2) 
                         <i class="fa fa-times" style="color: red;"> Rejected </i>
                      @endif
                  </td>
                  <td>
                  
                   <a href="{{ url('view_regularisation_details/'.$regularisation_list->regularisation_requester_sap_no. '/'.$regularisation_list->regularisation_grp_no) }}"  target="_blank"><button type="button" class="btn btn-warning btn-sm btn-flat"><span class="btn-label"><i class="fa fa-info-circle"></i></span> Info</button></a>


                
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