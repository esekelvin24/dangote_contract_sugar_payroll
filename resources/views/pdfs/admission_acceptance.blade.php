<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>IAUE Admission Acceptance</title>

	<style type="text/css">
		@page {
			margin: 0px;
		}
		body {
			margin: 0px;
		}
		* {
			font-family: Verdana, Arial, sans-serif;
		}
		a {
			color: #fff;
			text-decoration: none;
		}
		table {
			font-size: x-small;
		}
		tfoot tr td {
			font-weight: bold;
			font-size: x-small;
		}
		.invoice table {
			margin: 15px;
		}
		.invoice h3 {
			margin-left: 15px;
		}

		.information .logo {
			margin: 5px;
		}
		.information table {
			padding: 10px;
		}
	</style>

</head>
<body>
<img style="float: right; width:250px" src="{{asset("_img/top_right.png")}}" alt="">
<div class="information">
	<table width="100%">
		<tr>
			<td align="left" style="width: 40%;">

				<pre>
                    <br />
<br><br><br/><br/>
<span style="font-weight: bold; font-size: 16px">Ignatius Ajuru University</span><br/>
P.M.B. 5047 Rumuolumeni,
Port Harcourt Rivers State, Nigeria.
<br />
Date: {{date("d F, Y")}}
</pre>
			</td>
			<td align="center">
				<img src="{{asset("frontend/images/logo_png.png")}}" style="display:block;width:100px;margin-top: 40px;margin-left:auto;margin-right:auto;text-align: center " alt="">
			<br/>

			</td>
			<td align="right" style="width: 40%;">
		</tr>
        <tr>
            <td colspan="3"><h2 style="text-align: center;color:#e32402">Admission Acceptance Letter</h2></td>
        </tr>
	</table>
</div>

	<div style="font-size: 13px; padding-left: 15px">
		<span style="font-size: 15px; font-weight: bold">
			Applicant Details
		</span><br/>
		<div class="company-address">
			Full Name:  {{strtoupper($full_name)}}
		</div>
		<div class="company-address">
			Entry Type:  {{$entry_type==1?"Regular Entry (100L)":"Direct Entry (200L)"}}
		</div>
		<div class="company-address">
			Session:  {{$the_session}}
		</div>
		<div class="company-address">
			Programme Type:  {{$programme_type}}
		</div>
		@if(isset($university_id))
			<div class="company-address">
				Participating University:  {{$university}}
			</div>
		@endif
		<div class="company-address">
			Programme Name:  {{$degree_short_code." , ".$programme_name}}
		</div>
		<div class="company-address">
			Duration:  {{$duration}}
		</div>
		{{--<div class="company-address">
			First Year Approximate Tuition*:  N{{number_format($fee,2)}}
		</div>--}}
		<div class="company-address">
			Condition:  This provisional offer is subject to meeting all admission requirements as shall be subsequently verified by the University
		</div>
		<div class="company-address">
			Validity:  This offer is valid for one month from today, and shall expire on  <strong>{!! date("d F, Y", strtotime("+1 month")) !!}</strong>
		</div>

	</div>

<div style="padding-left: 15px; font-size: 13px;">
	<p>
		<span style="font-weight: bold">SUBMISSION REQUIREMENTS</span>
	<ul>
		<li>Print, sign, scan and upload this Offer Acceptance as soon as you login next into the IAUE Portal</li>
		<li>Submit a personal statement of a minimum of 200 words (an essay describing your aims and your interests as well as your reason for choosing the programme)</li>
	</ul>
	</p>
	<p>
		<span style="font-weight: bold">TERMS AND CONDITIONS</span><br/>
		<span>Please read these carefully before signing.</span><br/>
		<span>By accepting this offer:</span><br/>
	<ul>
		<li>I acknowledge that I will only be accepted into the above stated programme provided all academic conditions and other submission requirements listed are met, and that all original documents have been validated by IAUE Admissions departmemt</li>
		<li>I understand that this offer is only valid for the intake date mentioned above. Should i decide to postpone my studies to a later date, this offer will be void and my application will need to be re-assessed.</li>
		<li>All fees and charges are inclusive of VAT</li>
	</ul>

	</p>

	<table width="100%" style="padding:10px 20px">
		<tr>
			<td style="text-align: left">Signed:................................</td>
			<td style="text-align: right">Date:................................</td>
		</tr>
		<tr>
			<td style="text-align: left">Guardian Signature:................................</td>
			<td style="text-align: right">Signed:................................</td>
		</tr>
	</table>
<p style="text-align: center">(Applicants below the age of 18 must have this Acceptance Letter read and signed by their guardian)</p>
</div>

<div class="information" style="position: absolute; bottom: 0; width:100% !important;">
	<table width="100%">
		<tr>
			<td align="left" >
				<strong>* There may be additional fees depending on the Programme Type</strong>
			</td>
		</tr>
		<tr>
			<td align="left" >
				&copy; {{ date('Y') }} <img style="width: 13px; height: 13px" alt="" src="{{asset("_img/fav/favicon-32x32.png")}}"/> IAUE Distance Learning Portal - All rights reserved.
			</td>
		</tr>

	</table>
</div>
</body>
</html>

