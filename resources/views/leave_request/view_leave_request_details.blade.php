@extends('layouts.datatable-adminlte2-4-0')
@section('title') View Leave Request Details @endsection
@section('content')


    <section class="content-header">
      <h1>
     Leave Request Details For <font color="green"><strong>{{$get_user_details->name}} ({{$get_user_details->sap}})</strong></font>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li class="active">Leave Request Details</li>
      </ol>
</section>

<section class="content"> 
<div class="row">
   <div class="col-md-6">
    <br>

 <div class="box box-info">
<div class="box-header with-border">
  <h3 class="box-title">EMPLOYEE LEAVE APPLICATION DETAILS</h3>
   
</div>     
<div class="box-body">
          <div class="row">
          
 <!-- /.box-header -->
<div class="box-body">

        <table id="tblmarketerinfo" class="table table-bordered"> 
                                 
                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Business Unit:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                              @if($leave_request_details->business_unit_id !="")
                                              {{$leave_request_details->businessunit_func->bu_name}}
                                              @endif
                                            </td>
                                        </tr>
                                    </tbody>

                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Employee Name:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                              @if($leave_request_details->user_id)
                                              {{$leave_request_details->user22->name}}
                                              @endif
                                            </td>
                                        </tr>
                                    </tbody>

                                  <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Date of Employment:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{$leave_request_details->date_of_employment}}</td>
                                        </tr>
                                    </tbody>

                                       <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">SAP No:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                              @if($leave_request_details->user_id)
                                              {{$leave_request_details->user22->sap}}
                                              @endif
                                             </td>
                                        </tr>
                                    </tbody>

                                      <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Job Title:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{$leave_request_details->job_title}}</td>
                                        </tr>
                                    </tbody>  

                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Department:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                              
                                              {{$leave_request_details->department_func12->name}}
                                            </td>
                                        </tr>
                                    </tbody> 

                                     <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Staff Grade/Level:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{$leave_request_details->staff_grade_level}}</td>
                                        </tr>
                                    </tbody> 

                                     <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Type of Leave:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{$leave_request_details->leaveType221->type}}</td>
                                        </tr>
                                    </tbody>


                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Number of Leave Days Entitled:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{$leave_request_details->number_of_leave_days_entitled}}</td>
                                        </tr>
                                    </tbody>


                                          <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Number of Requested Days:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{$total_no_of_days}}</td>
                                        </tr>
                                    </tbody>


                                          <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Start Date:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{$leave_request_details->leave_start_date}}</td>
                                        </tr>
                                    </tbody>

                                          <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">End Date:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{$leave_request_details->leave_end_date}}</td>
                                        </tr>
                                    </tbody>



                                     <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Contact Address:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{$leave_request_details->contact_address}}</td>
                                        </tr>
                                    </tbody>


                                         <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Email Address:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                              @if($leave_request_details->user_id)
                                              {{$leave_request_details->user22->email}}
                                              @endif
                                            </td>
                                        </tr>
                                    </tbody>


                                         <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Phone Number:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{$leave_request_details->phone_number}}</td>
                                        </tr>
                                    </tbody>


                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Location:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                              @if($leave_request_details->office_location)
                                                {{$leave_request_details->perment_office_location_func->perment_office_location_name}}
                                              @endif
                                            </td>
                                        </tr>
                                    </tbody>

                                    <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Leave ID:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{$leave_request_details->full_uniq_leave_req_id}}</td>
                                        </tr>
                                    </tbody>



                                      <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Leave Days:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">

                                               @foreach ($leave_request_dates as $a => $leave_request_date)    
                                                {{ Carbon\Carbon::parse($leave_request_date->leave_date)->format('d-m-Y') }},&nbsp;&nbsp;
                                                @endforeach

                                            </td>
                                        </tr>
                                    </tbody>

                                       <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">NOTE:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{$leave_request_details->note}}</td>
                                        </tr>
                                    </tbody>

                                        <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">Attachment:</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">
                                              
                                            @if( $leave_request_details->attached_doc!="")
                                            <a href="{{ url('/uploads/leave_attached_doc/'.$leave_request_details->attached_doc) }}" download="{{$leave_request_details->attached_doc}}"><i class="fa fa-download" style="color: orange;"></i> </a> 

                                            <a href="{{ url('/uploads/leave_attached_doc/'.$leave_request_details->attached_doc) }}" target="_blank"> &nbsp;&nbsp;{{$leave_request_details->attached_doc}}</a>
                                            @endif
                                          
                                            </td>
                                        </tr>
                                    </tbody>

                                       <tbody>
                                        <tr class="even pointer">
                                            <th scope="row" bgcolor="#F5F7FA">To Be Approved by (HOD):</th>
                                            <td class="pull-xs-left col-sm-9 col-xs-8">{{$leave_request_details->user_hod_approver22->name}}</td>
                                        </tr>
                                    </tbody>

                            <tbody>
                              <tr class="even pointer">
                                  <th scope="row" bgcolor="#F5F7FA">HOD Approval:</th>
                                  <td class="pull-xs-left col-sm-9 col-xs-8">

                               <div class="row" > 
                                <div id="display_hod_approval_status" class="col-sm-8">

                                @if($leave_request_details->hod_approver_id_actual !="")
                                ({{$leave_request_details->user_hod_approver_id_actual22->name}})
                                @endif

                                @if ($leave_request_details->hod_approver_status == 0)
                                <i class="fa fa-spinner" style="color: orange;"> Pending </i>
                                @elseif ($leave_request_details->hod_approver_status == 1) 
                                <i class="fa fa-check" style="color: green;"> Approved </i>
                                @elseif ($leave_request_details->hod_approver_status == 2) 
                                <i class="fa fa-times" style="color: red;"> Rejected </i>
                                @endif

                                <img src="{{asset('asset-adminlte-v-2-4-0/dist/img/loader_gif.gif')}}" id="img" style="display:none"/ >
                                </div>
                 @permission(('can-approve-leave-hod')) 
                          @if($leave_request_details->hr_status == 0)
                                  <div class="btn-group" data-toggle="buttons" class="col-sm-4">  
                                  <label class="btn btn-success @if ($leave_request_details->hod_approver_status == 1) active @endif ">
                                  <input type="radio" name="pen_is_retired" id="option1" value="1" required  @if ($leave_request_details->hod_approver_status == 1) checked @endif  onchange="call_hod_approval_status_fun(this.value);" ><i class="fa fa-check"></i>Approve
                                  </label>
                                  <label class="btn btn-danger @if ($leave_request_details->hod_approver_status == 2) active @endif ">
                                  <input type="radio" name="pen_is_retired" id="option2"  value="2" @if ($leave_request_details->hod_approver_status == 2) checked @endif onchange="call_hod_approval_status_fun(this.value);"><i class="fa fa-times"></i>Reject
                                  </label>
                                  </div>
                           @endif  
                 @endpermission
                                  </div>  
                              </td>
                              </tr>
                            </tbody>

                        <tbody>
                              <tr class="even pointer">
                                  <th scope="row" bgcolor="#F5F7FA">HR Approval:
                                  </th>
                                  <td class="pull-xs-left col-sm-9 col-xs-8">

                               <div class="row" > 
                                 
                               
                                <div id="display_hr_approval_status" class="col-sm-8">
                                 @if($leave_request_details->hr_approver_id !="")
                                  ({{$leave_request_details->user_hr_approver22->name}}) 
                                  @endif

                                @if ($leave_request_details->hr_status == 0)
                                <i class="fa fa-spinner" style="color: orange;"> Pending </i>
                                @elseif ($leave_request_details->hr_status == 1) 
                                <i class="fa fa-check" style="color: green;"> Approved </i>
                                @elseif ($leave_request_details->hr_status == 2) 
                                <i class="fa fa-times" style="color: red;"> Rejected </i>
                                @endif

                                <img src="{{asset('asset-adminlte-v-2-4-0/dist/img/loader_gif.gif')}}" id="img2" style="display:none;" / >
                                </div>

                               


               @permission(('can-approve-leave-hr')) 
                          @if($leave_request_details->hod_approver_status == 1)
                                  <div class="btn-group" data-toggle="buttons" class="col-sm-4">  
                                  <label class="btn btn-success @if ($leave_request_details->hr_status == 1) active @endif ">
                                  <input type="radio" name="pen_is_retired" id="option1" value="1" required  @if ($leave_request_details->hr_status == 1) checked @endif  onchange="call_hr_approval_status_fun(this.value);" ><i class="fa fa-check"></i>Approve
                                  </label>
                                  <label class="btn btn-danger @if ($leave_request_details->hr_status == 2) active @endif ">
                                  <input type="radio" name="pen_is_retired" id="option2"  value="2" @if ($leave_request_details->hr_status == 2) checked @endif onchange="call_hr_approval_status_fun(this.value);"><i class="fa fa-times"></i>Reject
                                  </label>
                                  </div>
                           @endif  
                 @endpermission


                                  </div>  
                              </td>
                              </tr>
                            </tbody>         

   

                              
</table>
 </div></div></div></div></div>

 <input type="hidden" name="user_id" value="{{$get_user_details->id}}" id="user_id">
 <input type="hidden" name="leave_req_grp_no" value="{{$leave_request_details->leave_req_grp_no}}" id="leave_req_grp_no">
 

</div></section>


<script type="text/javascript">
function call_hod_approval_status_fun(val)
{
$('#img').show();
  // alert('hello alert');
  var  user_id = document.getElementById("user_id").value;
  var  leave_req_grp_no = document.getElementById("leave_req_grp_no").value;

 // alert(regularisation_grp_no);
 $.ajax({
 type: 'get',
 url: '{{url('/ajax_get_hod_approval_status_leave')}}',
 data: {
 get_option:val,
 user_id:user_id,
 leave_req_grp_no:leave_req_grp_no,
 },

 success: function (response) {
  $("#display_hod_approval_status").html(response);
  $('#img').hide();  //<--- hide again
 }
 });
}

</script>

<script type="text/javascript">
function call_hr_approval_status_fun(val)
{
$('#img2').show();
  // alert('hello alert');
  var  user_id = document.getElementById("user_id").value;
  var  leave_req_grp_no = document.getElementById("leave_req_grp_no").value;

  // alert(val);
 $.ajax({
 type: 'get',
 url: '{{url('/ajax_get_hr_approval_status_leave')}}',
 data: {
 get_option:val,
 user_id:user_id,
 leave_req_grp_no:leave_req_grp_no,
 },

 success: function (response) {
  $("#display_hr_approval_status").html(response);
  $('#img2').hide();  //<--- hide again
 }
 });
}

</script>

@endsection