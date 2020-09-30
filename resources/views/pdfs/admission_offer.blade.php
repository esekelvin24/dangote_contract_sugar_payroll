<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>IAUE Admission Letter</title>

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
            <td colspan="3"><h2 style="text-align: center;color:#e32402">Provisional Offer of Admission</h2></td>
        </tr>
	</table>
</div>

	<div style="font-size: 13px; padding-left: 15px">
		<span style="font-size: 15px; font-weight: bold">
			Applicant Details
		</span><br/>
		<div class="company-address">
			Full Name:  {{$full_name}}
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
			Duration:  {{$duration}}
		</div>
		{{--<div class="company-address">
			First Year Approximate Tuition*:  N{{number_format($fee,2)}}
		</div>--}}
		<div class="company-address">
			Condition:  This provisional offer is subject to meeting all admission requirements as shall be subsequently verified by the University
		</div>
		<div class="company-address">
			Validity:  This offer is valid for one month from today, and shall expire on  <strong>{!! date("d F, Y", strtotime("+1 month")) !!}
		</div>
	</div>

<div style="padding-left: 15px; font-size: 13px;">
	<h4 >Dear {{strtoupper($full_name)}} </h4>
	<p>
		Congratulations!<br/>
		This is to gladly inform you that your application to study in the distance learning programme at Ignatius Ajuru University of Education for the {{$the_session}} session has been successful.  <br/>
		<br/>
		You have been offered provisional admission to study <strong>{{$degree_short_code." , ".$programme_name}}</strong>  in the <strong>Faculty of {{$faculty_name}}</strong>. <br/>
		Your certificate at the end of this programme shall be the same as for candidates in the on-campus studies.
		<br/>Kindly note that this offer is conditioned on your meeting the following and other stipulated admission requirements:
       <br/><br/>
	</p>
	<p>
		<span style="font-weight: bold">1. ACCEPTANCE OF ADMISSION</span><br/>
		Kindly print, sign, scan your letter of admission and SUBMIT on the IAUE Distance Learning Portal at <a href="https://idl.iaue.net">https://idl.iaue.net</a>, the next time you login into your account.
	</p>
	<p>
		<span style="font-weight: bold">2. ACCEPTANCE FEE</span><br/>
		Kindly ensure that you have paid the admission acceptance fee of <strong>N10,000</strong> only into the designated University account, and received receipts.<br/>
		This can also be done as soon as you login into the portal.
	</p>
	<p>
		<span style="font-weight: bold">3. TUITION FEE</span><br/>
		Kindly ensure payment of full (or at least 60%) of tuition fees (apart from other registration charges) before commencement of study, and the outstanding balance before stipulated examination dates, as it might otherwise mean inability to partake in the exams.
	</p>
	<p>
		<span style="font-weight: bold">4. AUTHENTIC AND APPROPRIATE DOCUMENTS</span><br/>
		It shall be your place to ensure that all documents uploaded are authentic, and that they meet specified programme requirements.
	</p>
	<p>
		Once more, from the team at The Institute of Distance Learning, congratulations. We look forward to meeting you soon.
		<br/><br/>
		Best regards,<br/>
		Admissions officer
	</p>
</div>

<div class="information" style="position: absolute; bottom: 0; width:100% !important;">
	<table width="100%">
		<tr>
			<td align="left" >
				&copy; {{ date('Y') }} <img style="width: 13px; height: 13px" alt="" src="{{asset("_img/fav/favicon-32x32.png")}}"/> IAUE Distance Learning Portal - All rights reserved.
			</td>
		</tr>

	</table>
</div>
</body>
</html>

