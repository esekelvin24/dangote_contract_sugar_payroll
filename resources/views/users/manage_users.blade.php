@extends('layouts.datatable-adminlte2-4-0')
@section('title') Manage Users @endsection
@section('content')

      <section class="content-header">
      <h1>
      Manage Users (
      @if($user_category == "non")
      SELECT CATEGORY BELOW 
      @elseif($user_category == "")
      ALL USERS
      @else
      {{ strtoupper(isset($user_category_info->staff_category_name)?$user_category_info->staff_category_name:"") }}
      @endif
      )

      </h1>
       <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li class="active"><i class="fa fa-users" style="color: blue;"></i> Manage Users</li>
      </ol>
    </section>
   
<!-- /////////////////////////////////////////////////////////////////////// -->

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <div class="box-header">
               @permission(('can-register-users')) 
                <a href="{{ url('/register_user') }}"><button type="button" class="btn btn-sm btn-sm btn-flat"><span class="btn-label"><i class="fa fa-user-plus"></i></span> Register New User</button></a>
             @endpermission

          @permission(('can-view-all-users')) 
                 <a href="{{ url('/manage_users/1?e=') }}"><button type="button" class="btn btn-sm btn-sm btn-flat"><span class="btn-label"><i class="fa fa-users"></i></span> National Staff</button></a>

                 <a href="{{ url('/manage_users/2?e=') }}"><button type="button" class="btn btn-sm btn-sm btn-flat"><span class="btn-label"><i class="fa fa-users"></i></span> Expat Staff</button></a>

                 <a href="{{ url('/manage_users/3?e=') }}"><button type="button" class="btn btn-sm btn-sm btn-flat"><span class="btn-label"><i class="fa fa-users"></i></span> Casual Workers</button></a>

                 <a href="{{ url('/manage_users/4?e=') }}"><button type="button" class="btn btn-sm btn-flat" ><span class="btn-label"><i class="fa fa-users"></i></span> Contract Staff</button></a> 

                 <a href="{{ url('/manage_users/all?e=') }}"><button type="button" class="btn btn-sm btn-flat" ><span class="btn-label"><i class="fa fa-users"></i></span> All Staff</button></a> 
           @endpermission
<br/><br/>
                  

                  <form method="get" action="">
                      <div class="row">

                        <div class="col-md-3 col-xs-3 divTableCell">
                        
                        <label>Department: </label>
                          <select name="department" class="form-control">
                            <option value="">--All Department--</option>
                              @foreach($department_collections as $dept)
                                <option {{$department==$dept->id?"selected":""}} value="{{$dept->id}}">{{$dept->name}}</option>
                              @endforeach
                          </select>
                        </div>

                        <div class="col-md-1 col-xs-1 divTableCell">
                          <label>Search By: </label>
                          <select name="search_by" class="form-control">
                            <option {{$search_by=="sap"?"selected":""}} value="sap">SAP</option>
                            <option {{$search_by=="name"?"selected":""}} value="name">Name</option>
                          </select>
                        
                        </div>
                        
                      <div style="margin-top:25px" class="col-md-2 col-xs-2 divTableCell"><input value="{{$search}}" name="search" type="btn" class="form-control" placeholder="Search" > </div>
                        <div style="margin-top:25px" class="col-md- col-xs- divTableCell"><input type="submit" class="btn btn-info" value="Search"></div>
                      </div>
                  </form>


            </div>
@if($user_category !="non")
            <!-- /.box-header -->
            <div class="box-body table-responsive">
            <span>No. of records found:  <strong>{{number_format($transaction_count)}}</strong> </span>
            
            <div style="float:right" class="row">
              <div style="margin-right:1px" class="col-md-3 col-xs-3 divTableCell"><a href="javascript:first()" class="btn btn-primary">START</a></div>
                <div style="margin-right:1px" class="col-md-3 col-xs-3 divTableCell"><a href="javascript:goPrev()" class="btn btn-info">PREV</a></div>
                <div style="margin-right:1px" class="col-md-3 col-xs-3 divTableCell"><a href="javascript:goNext()" class="btn btn-info">NEXT</a></div>
              <div style="margin-right:0px" class="col-md-1 col-xs-1 divTableCell"><a href="javascript:last()" class="btn btn-primary">END</a></div>
              
            </div>

            <table style="margin-top:20px" id="example1" class="table table-borderless table-striped">
                <thead>
               <tr style="background-color: #a0bdf2">
                  <th class="exportable">S/N</th>
                  <th class="exportable">Name</th>
                   <th class="exportable">SAP#</th>
                  <th class="exportable">Department</th>
                  <th class="exportable">Category </th>
                  <!-- <th class="exportable">Email</th> -->
                  <!-- <th class="exportable">Role</th> -->
                  
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                   @foreach ($users as $a => $user)  
                <tr  style="height: 5px;cellpadding:0px;cellspacing:0px;">
                  <td>{{$sn_start = $sn_start + 1}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->sap}}</td>
                  <td>{{$user->department_name}}</td>
                  <td>{{$user->staff_category_name}}</td>
                  <!-- <td>{{$user->email}}</td>
                  <td>{{$user->role_desplay_name}}</td> -->
                 
                  <td>
                  
                   <a href="{{ url('view_user_details/'.$user->id) }}"  target="_blank"><button type="button" class="btn btn-default btn-sm btn-flat" title="Info"><span class="btn-label"><i class="fa fa-info-circle" ></i></span> </button></a>
<!-- 
 @permission(('can-edit-all-users')) 
                   <a href="{{ url('edit_user/'.$user->id) }}"  target="_blank"><button type="button" class="btn  btn-default btn-sm btn-flat" title="Edit"><span class="btn-label"><i class="fa fa-edit"></i></span> </button></a>
  @endpermission

 @permission(('can-reset-password')) 
                   <a href="{{ url('/reset_credentials/'.$user->id) }}"  target="_blank"><button type="button" class="btn btn-default btn-sm btn-flat" title="Reset Password"><span class="btn-label"><i class="fa fa-lock"></i></span> </button></a>
 @endpermission -->
 
                   <a href="{{ url('my_attendance/'.$user->sap) }}" target="_blank"><button type="button" class="btn  btn-default btn-sm btn-flat" title="View attendance"><span class="btn-label"><i class="fa fa-calendar-check-o"></i></span> </button></a>

                    {{-- <a href="{{ url('attendance_regularisation/'.$user->sap) }}" target="_blank"><button type="button" class="btn btn-default btn-sm btn-flat"   title="Attendance Regularization"><span class="btn-label"><i class="fa fa-asterisk"></i></span> </button></a> --}}

                    <!-- <a href="{{ url('my_attendance_regularisation_list/'.$user->sap) }}" target="_blank"><button type="button" class="btn btn-default btn-sm btn-flat"   title="Regularization List"><span class="btn-label"><i class="fa fa-calendar-times-o"></i></span> </button></a> -->

                    <!-- <a href="{{ url('my_leave_request_list/'.$user->sap) }}" target="_blank"><button type="button" class="btn btn-default btn-sm btn-flat" title="Leave Requset List"><span class="btn-label"><i class="fa fa-pied-piper-alt"></i></span> </button></a> -->
<!-- 
      @role(('admin'))
      <a href="{{ url('assign_permissions_to_user/'.$user->id) }}" target="_blank"><button type="button" class="btn btn-default btn-sm btn-flat"  title="Assign Special Permissions to user"><span class="btn-label"><i class="fa fa-key"></i></span> </button></a>
      @endrole
                 {{-- <button type="button" class="btn btn-danger btn-sm btn-flat" onclick="deleteuser(this.id)" id="{{$user->user_id}}"><span class="btn-label"><i class="fa fa-trash"></i></span> Delete</button> --}} -->
            </td>
                </tr>
                 @endforeach
                
                </tbody>
              
              </table>

              <div style="float:right; margin-top:20px" class="row">
                <div style="margin-right:1px" class="col-md-3 col-xs-3 divTableCell"><a href="javascript:first()" class="btn btn-primary">START</a></div>
                  <div style="margin-right:1px" class="col-md-3 col-xs-3 divTableCell"><a href="javascript:goPrev()" class="btn btn-info">PREV</a></div>
                  <div style="margin-right:1px" class="col-md-3 col-xs-3 divTableCell"><a href="javascript:goNext()" class="btn btn-info">NEXT</a></div>
                <div style="margin-right:0px" class="col-md-1 col-xs-1 divTableCell"><a href="javascript:last()" class="btn btn-primary">END</a></div> 
              </div>

            </div>
            <!-- /.box-body -->
@endif

          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

    <script>
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
    var table = $('#example').removeAttr('width').DataTable( {
      // the Width control starts here
       // scrollY:        "300px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         false,
        info:           true,
        ordering:       true,
        searching:      false,
        columnDefs: [
            { width: 8, targets: 0 },
            { width: 120, targets: 1 },
            { width: 90, targets: 2 },
            { width: 180, targets: 3 },
            { width: 140, targets: 4 },
            { width: 120, targets: 5 },
            // { width: 90, targets: 6 },
            // { width: 950, targets: 7 },

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



function goPrev()
{
   var full_url = '{{URL::full()}}';
   var url_arr = full_url.split('page=');
   var page_no = url_arr[1]==null?1:url_arr[1];
   var link = url_arr[1]==null?"&page=":"page=";
   var new_no = parseInt(page_no) - 1;
   
   if (new_no < 1)
   {
       new_no = 1;
       return;
   }else
   {
    window.location.replace((url_arr[0]).replace('amp;','') + link + new_no);
   }
}

function goNext()
{
   var full_url = encodeURI('{{URL::full()}}');
   var url_arr = full_url.split('page=');
   var page_no = url_arr[1]==null?1:url_arr[1];
   var link = url_arr[1]==null?"&page=":"page=";
   var new_no = parseInt(page_no) + 1;

   //alert(url_arr[0]);
   if (new_no > {{$pagination_btn}})
   {
       new_no = $pagination_btn;
       return;
   }else
   {
     window.location.replace((url_arr[0]).replace('amp;','') + link + new_no);
   }
}


function first()
{
   var full_url = '{{URL::full()}}';
   var url_arr = full_url.split('page=');
   var page_no = url_arr[1]==null?1:url_arr[1];
   var link = url_arr[1]==null?"&page=":"page=";
   var new_no =  1;
   
  window.location.replace(url_arr[0] + link + new_no);
   
}

function last()
{
   var full_url = '{{URL::full()}}';
   var url_arr = full_url.split('page=');
   var page_no = url_arr[1]==null?1:url_arr[1];
   var link = url_arr[1]==null?"&page=":"page=";
   var new_no =  {{$pagination_btn}};
  
   window.location.replace((url_arr[0]).replace('amp;','') + link + new_no);
   
}


</script>



@endsection
{{-- //////datatable script ends here////////////////// --}}