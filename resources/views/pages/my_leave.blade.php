@extends('layouts.app2')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">{{ $staff_name or "My Leave" }}</h3>
        
    </div>
    <div class="col-md-7 col-4 align-self-center">
       
        <ol class="breadcrumb btn waves-effect waves-light pull-right hidden-sm-down">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            @role(('admin'))
            		<li class="breadcrumb-item"><a href="{{url('/staff')}}">My Staff</a></li>
              @endrole
            <li class="breadcrumb-item active">{{ $staff_name or "My Leave" }}</li>
        </ol>
    </div>
</div>

<div class="row">
  <div class="col-lg-12 col-xlg-12 col-md-12">
    <div class="card">
      @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
              @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif
              @if ($message = Session::get('failure'))
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
            @endif
        <!-- Nav tabs -->
        <ul class="nav nav-tabs profile-tab" role="tablist" id="myTab">
            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home" role="tab">My Leave</a> </li>
          @role(('admin'))
            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">My Staff Requests</a> </li>
           @endrole
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane" id="home" role="tabpanel">
                <div class="card-block">
                  @if(Auth::check())
                      <button class="btn btn-success" data-toggle="modal" data-target="#leaveRequest">Request Leave</button>
                  @endif
                    <div class="">
                        <table id="srr_table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                          <th style="width: 10px">#</th>
                          <th>Leave Type</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>HOD</th>
                          <th>HOD Approval</th>
                          <th>HR Status</th>
                          <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($leaverequests as $sn => $leaverequest) 
                          <tr>
                          <td>{{ $sn+1 }}</td>
                          <td>{{ $leaverequest->leave->type}}</td>
                          <td>{{ $leaverequest->start_date}}</td>
                          <td>{{ $leaverequest->end_date}}</td>
                          <td>{{ $leaverequest->hod->name}}</td>
                          @if(($leaverequest->hod_approver_status == 0))
                          <td>Pending</td>
                          @elseif($leaverequest->hod_approver_status == 1)
                          <td>Approved</td>
                          @elseif($leaverequest->hod_approver_status == 2)
                          <td>Rejected</td>
                          @else
                          <td></td>
                          @endif
                          @if(($leaverequest->hr_status == 0))
                          <td>Pending</td>
                          @elseif($leaverequest->hr_status == 1)
                          <td>Treated</td>
                          @else
                          <td></td>
                          @endif
                          <td>
                          @if(($leaverequest->hod_approver_status == 0) && ($leaverequest->user_id == Auth::user()->id))
                                     <button class="btn btn-danger btn-xs" onclick="fun_leave_delete('{{$leaverequest -> id}}')">Delete</button>
                                    @endif
                                    @if(($leaverequest->hr_status == 0))
                                      @if(($leaverequest->hod_approver == Auth::user()->id))
                                        @if(($leaverequest->hod_approver_status == 0) || ($leaverequest->hod_approver_status == 2))
                                         <button class="btn btn-success btn-xs" onclick="fun_leave_approve('{{$leaverequest -> id}}')">Approve</button>
                                         @endif
                                         @if(($leaverequest->hod_approver_status == 0) || ($leaverequest->hod_approver_status == 1))
                                        <button class="btn btn-danger btn-xs" onclick="fun_leave_reject('{{$leaverequest -> id}}')">Reject</button>
                                        @endif
                                      @endif
                                    @endif
                                   </td>  
                          </tr>

                        @endforeach

                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
            <!--second tab-->
            <div class="tab-pane" id="profile" role="tabpanel">
                <div class="card-block">
                    <div class="">
                        <table id="srr_table1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                          <tr>
                          <th style="width: 10px">#</th>
                          <th>Leave Type</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Staff Name</th>
                          <th>HOD Approval</th>
                          <th>HR Status</th>
                          <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($staffleaverequests as $sn => $staffleaverequest) 
                          <tr>
                          <td>{{ $sn+1 }}</td>
                          <td>{{ $staffleaverequest->leave->type}}</td>
                          <td>{{ $staffleaverequest->start_date}}</td>
                          <td>{{ $staffleaverequest->end_date}}</td>
                          <td>{{ $staffleaverequest->staff->name}}</td>
                          @if(($staffleaverequest->hod_approver_status == 0))
                          <td>Pending</td>
                          @elseif($staffleaverequest->hod_approver_status == 1)
                          <td>Approved</td>
                          @elseif($staffleaverequest->hod_approver_status == 2)
                          <td>Rejected</td>
                          @else
                          <td></td>
                          @endif
                          @if(($staffleaverequest->hr_status == 0))
                          <td>Pending</td>
                          @elseif($staffleaverequest->hr_status == 1)
                          <td>Treated</td>
                          @else
                          <td></td>
                          @endif
                          <td>
                          @if(($staffleaverequest->hod_approver_status == 0) && ($staffleaverequest->user_id == Auth::user()->id))
                                     <button class="btn btn-danger btn-xs" onclick="fun_leave_delete('{{$staffleaverequest -> id}}')">Delete</button>
                                    @endif
                                    @if(($staffleaverequest->hr_status == 0))
                                      @if(($staffleaverequest->hod_approver == Auth::user()->id))
                                        @if(($staffleaverequest->hod_approver_status == 0) || ($staffleaverequest->hod_approver_status == 2))
                                         <button class="btn btn-success btn-xs" onclick="fun_leave_approve('{{$staffleaverequest -> id}}')">Approve</button>
                                         @endif
                                         @if(($staffleaverequest->hod_approver_status == 0) || ($staffleaverequest->hod_approver_status == 1))
                                        <button class="btn btn-danger btn-xs" onclick="fun_leave_reject('{{$staffleaverequest -> id}}')">Reject</button>
                                        @endif
                                      @endif
                                    @endif
                                   </td>  
                          </tr>

                        @endforeach

                        </tbody>
                      </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!-- end row -->
<input type="hidden" name="hidden_leave_delete" id="hidden_leave_delete" value="{{url('leave_request/delete')}}">
                <input type="hidden" name="hidden_leave_approve" id="hidden_leave_approve" value="{{url('leave_request/approve')}}">
                <input type="hidden" name="hidden_leave_reject" id="hidden_leave_reject" value="{{url('leave_request/reject')}}">
<!-- Request Leave Modal start -->
<div class="modal fade" id="leaveRequest" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!-- <h4 class="modal-title">Add Record</h4> -->
            </div>
            <div class="modal-body">
              <form action="{{ url('leave_request') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                  <div class="form-group">
                    <label for="leave_type">Leave Type:</label>
                    <select id="leave_type" name="leave_type" class="form-control select2" style="width: 100%;">
                      <option value="" disabled selected>Select</option>
                      @foreach($leaveTypes as $key=>$value)
                        @if(Request::old('leave_type')== $key)
                        <option value="{{ $key }}" selected>{{ $value }}</option>
                        @else
                        <option value="{{ $key }}">{{ $value }}</option>
                        @endif

                      
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="start_date">Start Date:</label>
                    <input type="text" class="form-control datepicker" id="start_date" name="start_date"> 
                  </div>
                  <div class="form-group">
                    <label for="end_date">End Date:</label>
                    <input type="text" class="form-control datepicker" id="end_date" name="end_date"> 
                  </div>
                  <label for="hod">HOD:</label>
                    <select id="hod" name="hod" class="form-control select2" style="width: 100%;">
                      <option value="" disabled selected>Select</option>
                      @foreach($myHods as $key=>$value)
                        @if(Request::old('hod')== $key)
                        <option value="{{ $key }}" selected>{{ $value }}</option>
                        @else
                        <option value="{{ $key }}">{{ $value }}</option>
                        @endif

                      
                      @endforeach
                    </select>
                </div>

                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
<!-- Request Leave Modal End -->
<script type="text/javascript">
   	
   	function fun_leave_delete(id)
    {
      var conf = confirm("Are you sure want to delete??");
      if(conf){
        var delete_url = $("#hidden_leave_delete").val();
        $.ajax({
          url: delete_url,
          type:"POST", 
          data: {"id":id,_token: "{{ csrf_token() }}"}, 
          success: function(response){
            swal(response);
            location.reload(); 

          }
        });
      }
      else{
        return false;
      }
    }


    function fun_leave_approve(id)
    {
      var conf = confirm("Are you sure want to Approve??");
      if(conf){
        var delete_url = $("#hidden_leave_approve").val();
        $.ajax({
          url: delete_url,
          type:"POST", 
          data: {"id":id,_token: "{{ csrf_token() }}"}, 
          success: function(response){
            swal(response);
            location.reload(); 

          }
        });
      }
      else{
        return false;
      }
    }

   
 
    function fun_leave_reject(id)
    {
      var conf = confirm("Are you sure want to Reject??");
      if(conf){
        var delete_url = $("#hidden_leave_reject").val();
        $.ajax({
          url: delete_url,
          type:"POST", 
          data: {"id":id,_token: "{{ csrf_token() }}"}, 
          success: function(response){
            swal(response);
            location.reload(); 

          }
        });
      }
      else{
        return false;
      }
    }
  </script>        
@endsection




