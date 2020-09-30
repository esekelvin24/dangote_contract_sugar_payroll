<h3>Attendance Regularisation status for Reg ID : {{$full_uniq_reg_id}}</h3>

<div>

	@if (($hod_approver_status == 1) && ($hr_status == 0)) 
	<p>Dear HR,</p>
	<p>Please, kindly see the Attendance Regularisation below for processing:</p>
	@else
	<p>Please, see the statuse of your Attendance Regularisation below.</p>
	@endif


	<p>Reg ID : {{$full_uniq_reg_id}}</p>
	<p>Staff name : {{$staff_name}}</p>
	<p>sap no : {{$sap_no}}</p>
	<p>Date Submitted: {{$date_and_time_submited}}</p>
	<p>Approving HOD : {{$hod_approver_name_actua}}</p>
	<p>HOD Approval Status :

	@if ($hod_approver_status == 0)
	<i class="fa fa-spinner" style="color: orange;"> Pending </i>
	@elseif ($hod_approver_status == 1) 
	<i class="fa fa-check" style="color: green;"> Approved </i>
	@elseif ($hod_approver_status == 2) 
	<i class="fa fa-times" style="color: red;"> Rejected </i>
	@endif
</p>

<p>HR Approval Status :

	@if ($hr_status == 0)
	<i class="fa fa-spinner" style="color: orange;"> Pending </i>
	@elseif ($hr_status == 1) 
	<i class="fa fa-check" style="color: green;"> Approved </i>
	@elseif ($hr_status == 2) 
	<i class="fa fa-times" style="color: red;"> Rejected </i>
	@endif
</p>

	<p><a class="btn" href="{{ url('/view_regularisation_details/'.$sap_no.'/'.$regularisation_grp_no) }}" target="_blank" >Click here to Approve/Reject  »</a></p>
	<p>This is an auto generated email for your action. Please don’t reply to this email as this mail box it is not monitored</p>
	<p>From : FROM DAILY ATTENDANCE SYSTEM (DAS)</p>

</div>