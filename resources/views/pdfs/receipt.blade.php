<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Receipt of Payment</title>
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
		#watermark {
			position: fixed;
			bottom:   0px;
			left:     0px;
			z-index:  -1000;

		}
	</style>

</head>
<body>
{{-- <img style="float: right; width:250px" src="{{asset("_img/top_right.png")}}" alt=""> --}}
<div id="watermark">
	<img src="{{asset("_img/watermark.png")}}" height="100%" width="100%" />
</div>
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
				
			</td>
		</tr>
        <tr>
            <td colspan="3"><h2 style="text-align: center;color:#e32402">Receipt of Payment</h2></td>
        </tr>
	</table>
</div>

	<div style="font-size: 13px; padding-left: 15px">
		<span style="font-size: 15px; font-weight: bold">
			Applicant Details
		</span><br/>
		<div class="company-address">
			Full Name:   {{strtoupper($full_name)}}
		</div>
		{{--<div class="company-address">
			Mat. No.:   strtoupper($full_name)
		</div>--}}
		<div class="company-address">
			Programme Name:   {{$degree_short_code." , ".$programme_name}}
		</div>
		<div class="company-address">
			Duration:   {{$duration}}
		</div>
		<div class="company-address">
			Payment Date:   {{$the_session}}
		</div>
		<div class="company-address" style="font-weight:bold">
			Payment Ref:   {{$reference}}
		</div>
	</div>

<div style="padding-left: 15px; font-size: 16px;">
	

	<table width="80%" style="padding:10px 20px; border:0.2px solid grey; margin:20px auto">
		<tr>
			<th style="text-align: left">S/No</td>
			<th style="text-align: left">Fee Name</td>
			<th style="text-align: left">Amount</th>
			<th style="text-align: left">Session</th>

		</tr>
		<?php $a=1; ?>

		@if(isset($fee_collection_generic) && $fee_collection_generic->isNotEmpty())
			@foreach($fee_collection_generic as $val)
				<tr>
					<td style="text-align: left">{{$a}}</td>
					<td style="text-align: left">{{strtoupper($val->fee_name)}}</td>
					<td style="text-align: left">{!! number_format($val->fee_amount,2) !!}</td>
					<td style="text-align: left">{{$val->session_name}}</td>
				</tr>
				<?php $a++; ?>
			@endforeach
		@endif

		@if(isset($fee_collection_specific) &&  $fee_collection_specific->isNotEmpty())
			@foreach($fee_collection_specific as $val)
				<tr>
					<td style="text-align: left">{{$a}}</td>
					<td style="text-align: left">{{strtoupper($val->fee_name)}}</td>
					<td style="text-align: left">{!! number_format($val->fee_amount,2) !!}</td>
					<td style="text-align: left">{{$val->session_name}}</td>
				</tr>
				<?php $a++; ?>
			@endforeach
		@endif
		@if(isset($all_expected_payments) && $all_expected_payments>0)
		<tr>
			<td style="text-align: left; font-weight:bold;border-top:0.3px dotted grey;padding:5px"></td>
			<td style="text-align: left; font-weight:bold;border-top:0.3px dotted grey;padding:5px">TOTAL PAID</td>
			<td style="text-align: left; font-weight:bold;border-top:0.3px dotted grey;padding:5px">{!! number_format($all_expected_payments,2) !!}</td>
		</tr>
		@endif
	</table>
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

