<h3>Pending Your Approval for Leave ID : {{$full_uniq_leave_req_id}}</h3>

<div>
	<p>You have a pending Leave Approval with the following details:</p>

	<p>Leave ID : {{$full_uniq_leave_req_id}}</p>
	<p>Staff name : {{$staff_name}}</p>
	<p>sap no : {{$sap_no}}</p>
	<p>Date Submitted: {{$date_and_time_submitted}}</p>
	<p>Type : {{$type}}</p>
	<p>Start Date : {{$leave_start_date}}</p>
	<p>End Date : {{$leave_end_date}}</p>
	<p>Approving HOD : {{$hod_approver_name}}</p>

	<p><a class="btn" href="{{ url('/view_leave_request_details/'.$sap_no.'/'.$new_leave_req_grp_no) }}" target="_blank" >Click here to Approve/Reject  »</a></p>
	<p>This is an auto generated email for your action. Please don’t reply to this email as this mail box it is not monitored</p>
	<p>From : FROM DAILY ATTENDANCE SYSTEM (DAS)</p>

</div>