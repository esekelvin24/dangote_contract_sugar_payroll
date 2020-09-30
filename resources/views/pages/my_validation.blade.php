@extends('layouts.app2')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">{{ $staff_name or "My Validation" }}</h3>
        
    </div>
    <div class="col-md-7 col-4 align-self-center">
       
        <ol class="breadcrumb btn waves-effect waves-light pull-right hidden-sm-down">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            @role(('admin'))
            		<li class="breadcrumb-item"><a href="{{url('/staff')}}">My Staff</a></li>
             @endrole
            <li class="breadcrumb-item active">{{ $staff_name or "My Validation" }}</li>
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
            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#home" role="tab">My Validations</a> </li>
           @role(('admin'))
            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">My Staff Requests</a> </li>
           @endrole
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane" id="home" role="tabpanel">
                <div class="card-block">
                  @if(Auth::check())
                      <button class="btn btn-success" data-toggle="modal" data-target="#attendanceValidation">Attendance Validation</button>
                  @endif
                    <div class="">
                        <table id="srr_table"
        class="table table-striped table-bordered" cellspacing="0"
        width="100%">
          <thead>
            <tr>
            <th style="width: 10px">#</th>
            <th>Reason</th>
            <th>HOD</th>
            <th>HOD Approval</th>
            <th>HR Status</th>
            <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($validations as $sn => $validation) 
            <tr>
            <td>{{ $sn+1 }}</td>
            <td>{{ $validation->reason}}</td>
            <td>{{ $validation->hod->name}}</td>
            @if(($validation->hod_approver_status == 0))
            <td>Pending</td>
            @elseif($validation->hod_approver_status == 1)
            <td>Approved</td>
            @elseif($validation->hod_approver_status == 2)
            <td>Rejected</td>
            @else
            <td></td>
            @endif
            @if(($validation->hr_status == 0))
            <td>Pending</td>
            @elseif($validation->hr_status == 1)
            <td>Treated</td>
            @else
            <td></td>
            @endif
            <td>
            @if(($validation->hod_approver_status == 0) && ($validation->user_id == Auth::user()->id))
                       <button class="btn btn-danger btn-xs" onclick="fun_validation_delete('{{$validation -> id}}')">Delete</button>
                      @endif
                      @if(($validation->hr_status == 0))
                        @if(($validation->hod_approver == Auth::user()->id))
                          @if(($validation->hod_approver_status == 0) || ($validation->hod_approver_status == 2))
                           <button class="btn btn-success btn-xs" onclick="fun_validation_approve('{{$validation -> id}}')">Approve</button>
                           @endif
                           @if(($validation->hod_approver_status == 0) || ($validation->hod_approver_status == 1))
                          <button class="btn btn-danger btn-xs" onclick="fun_validation_reject('{{$validation -> id}}')">Reject</button>
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
                        <table id="srr_table1"
        class="table table-striped table-bordered" cellspacing="0"
        width="100%">
          <thead>
            <tr>
            <th style="width: 10px">#</th>
            <th>Reason</th>
            <th>Staff Name</th>
            <th>HOD Approval</th>
            <th>HR Status</th>
            <th>Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($staffvalidationrequests as $sn => $staffvalidationrequest) 
            <tr>
            <td>{{ $sn+1 }}</td>
            <td>{{ $staffvalidationrequest->reason}}</td>
            <td>{{ $staffvalidationrequest->staff->name}}</td>
            @if(($staffvalidationrequest->hod_approver_status == 0))
            <td>Pending</td>
            @elseif($staffvalidationrequest->hod_approver_status == 1)
            <td>Approved</td>
            @elseif($staffvalidationrequest->hod_approver_status == 2)
            <td>Rejected</td>
            @else
            <td></td>
            @endif
            @if(($staffvalidationrequest->hr_status == 0))
            <td>Pending</td>
            @elseif($staffvalidationrequest->hr_status == 1)
            <td>Treated</td>
            @else
            <td></td>
            @endif
            <td>
            @if(($staffvalidationrequest->hod_approver_status == 0) && ($staffvalidationrequest->user_id == Auth::user()->id))
                       <button class="btn btn-danger btn-xs" onclick="fun_validation_delete('{{$staffvalidationrequest -> id}}')">Delete</button>
                      @endif
                      @if(($staffvalidationrequest->hr_status == 0))
                        @if(($staffvalidationrequest->hod_approver == Auth::user()->id))
                          @if(($staffvalidationrequest->hod_approver_status == 0) || ($staffvalidationrequest->hod_approver_status == 2))
                           <button class="btn btn-success btn-xs" onclick="fun_validation_approve('{{$staffvalidationrequest -> id}}')">Approve</button>
                           @endif
                           @if(($staffvalidationrequest->hod_approver_status == 0) || ($staffvalidationrequest->hod_approver_status == 1))
                          <button class="btn btn-danger btn-xs" onclick="fun_validation_reject('{{$staffvalidationrequest -> id}}')">Reject</button>
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

<input type="hidden" name="hidden_validation_delete" id="hidden_validation_delete" value="{{url('validation_request/delete')}}">
          <input type="hidden" name="hidden_validation_approve" id="hidden_validation_approve" value="{{url('validation_request/approve')}}">
          <input type="hidden" name="hidden_validation_reject" id="hidden_validation_reject" value="{{url('validation_request/reject')}}">
<!-- Attendance Validation Modal start -->
<div class="modal fade" id="attendanceValidation" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <!-- <h4 class="modal-title">Add Record</h4> -->
            </div>
            <div class="modal-body">
              <form action="{{ url('validation_request') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                  <div class="form-group">
                    <label for="dates_validating">Dates:</label>
                    <select id="dates_validating" name="dates_validating[]" multiple="multiple" class="form-control select2" style="width: 100%;">
                      <option value="" disabled>Select</option>
                      @foreach($datesForValidationCollection as $key=>$value)
                        @if(Request::old('dates_validating')== $key)
                        <option value="{{ $key }}" selected>{{ $value }}</option>
                        @else
                        <option value="{{ $key }}">{{ $value }}</option>
                        @endif

                      
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="reason">Reason:</label>
                    <textarea class="form-control" id="reason" name="reason" required="required"></textarea>
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
<!-- Attendance Validation Modal End -->
<script type="text/javascript">
   	
   	function fun_validation_delete(id)
    {
      var conf = confirm("Are you sure want to delete??");
      if(conf){
        var delete_url = $("#hidden_validation_delete").val();
        $.ajax({
          url: delete_url,
          type:"POST", 
          data: {"id":id,_token: "{{ csrf_token() }}"}, 
          success: function(response){
            alert(response);
            location.reload(); 

          }
        });
      }
      else{
        return false;
      }
    }


    function fun_validation_approve(id)
    {
      var conf = confirm("Are you sure want to Approve??");
      if(conf){
        var delete_url = $("#hidden_validation_approve").val();
        $.ajax({
          url: delete_url,
          type:"POST", 
          data: {"id":id,_token: "{{ csrf_token() }}"}, 
          success: function(response){
            alert(response);
            location.reload(); 

          }
        });
      }
      else{
        return false;
      }
    }

   
 
    function fun_validation_reject(id)
    {
      var conf = confirm("Are you sure want to Reject??");
      if(conf){
        var delete_url = $("#hidden_validation_reject").val();
        $.ajax({
          url: delete_url,
          type:"POST", 
          data: {"id":id,_token: "{{ csrf_token() }}"}, 
          success: function(response){
            alert(response);
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




