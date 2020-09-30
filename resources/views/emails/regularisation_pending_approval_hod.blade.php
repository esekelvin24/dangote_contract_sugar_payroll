<h3>Pending Your Approval for Attendance Regularisation ID : {{$full_uniq_reg_id}}</h3>

<div>
	<p>You have a pending Attendance Regularisation Approval with the following details:</p>

	<p>Reg ID : {{$full_uniq_reg_id}}</p>
	<p>Staff name : {{$staff_name}}</p>
	<p>sap no : {{$sap_no}}</p>
	<p>Date Submitted: {{$date_and_time_submited}}</p>
	<p>Approving HOD : {{$hod_approver_name}}</p>

	<p><a class="btn" href="{{ url('/view_regularisation_details/'.$sap_no.'/'.$new_regularisation_grp_no) }}" target="_blank" >Click here to Approve/Reject  »</a></p>
	<p>This is an auto generated email for your action. Please don’t reply to this email as this mail box it is not monitored</p>
	<p>From : FROM DAILY ATTENDANCE SYSTEM (DAS)</p>

</div>