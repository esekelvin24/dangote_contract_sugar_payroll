<style type="text/css">
	body{
  background-color: #F6F6F6; 
}
.brandSection{
  background-color: #3B99B3;
  border:1px solid #417482;
}
.headerLeft h1{
  color:#fff;
  margin: 0px;
  font-size:28px;
}
.header{
  border-bottom: 2px solid #417482;
  padding: 10px;
}
.headerRight p{
  margin: 0px;
  font-size:10px;
  color:#88CFE3;
  text-align: right;
}
.contentSection{
  background-color: #fff;
  padding: 0px;
}
.content{
  background-color: #fff;
  padding:20px;
}
.content h1{
  font-size:22px;
  margin:0px;
}
.content p{
  margin: 0px;
  font-size: 11px;
}
.content span{
  font-size: 11px;
  color:#F2635F;
}
.panelPart{
  background-color: #fff;
}
.panel-body{
  background-color: #3BA4C2;
  color:#fff;
  padding: 5px;
}
.panel-footer {
  background-color:#fff; 
}
.panel-footer h1{
  font-size: 20px;
  padding:15px;
  border:1px dotted #DDDDDD;
}
.panel-footer p{
  font-size:13px;
  background-color: #F6F6F6;
  padding: 5px;
}
.tableSection{
  background-color: #fff;
}
.tableSection h1{
  font-size:18px;
  margin:0px;
}
th{
  background-color: #383C3D;
  color:#fff;
}
.table{
  padding-bottom: 10px;
  margin:0px;
  border:1px solid #DDDDDD;
}
td:nth-child(2){
  text-align: left;
}
td { 
  height: 100%;
}
.bg {
 background-color: #f00;
  width: 100%; 
  height: 100%; 
  display: block; 
}
.lastSectionleft{
  background-color: #fff;
  padding-top:20px;
}
.Sectionleft p{
  border:1px solid #DDDDDD;
  height:140px;
  padding: 5px;
}
.Sectionleft span{
  color:#42A5C5;
}
.lastPanel{
  text-align:center;
}
.panelLastLeft p,.panelLastRight p{
  font-size:11px;
  padding:5px 2px 5px 10px;
}
</style>
<html>
<head>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 brandSection">
                <div class="row">
                    <div class="col-md-12 col-sm-12 header">
                        <div class="col-md-3 col-sm-3 headerLeft">
                            <h1>Dangote Logo</h1>
                        </div>
                        <div class="col-md-9 col-sm-9 headerRight">
                            <p>www.srr.com</p>
                            <p>admin@srr-dangote.com</p>
                            <p>(234)914 419 914</p>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 content">
                        <h1>Staff Name<strong> SAP No.</strong></h1>
                        <p>Att Reprt</p>
                        <span>Period</span>
                    </div>
                    <div class="col-md-12 col-sm-12 panelPart">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 panelPart">
                              <div class="panel panel-default">
                              </div>
                            </div>
                            <div class="col-md-6 col-sm-6 panelPart">
                                <div class="panel panel-default">
                                </div>
                              </div>
                          </div>
                        </div>
                        <div class="col-md-12 col-sm-12 tableSection">
                            <table class="table text-center">
                              <thead>
                                <tr class="tableHead">
						<th style="width: 10px">#</th>
						<th>Date</th>
						<th>Day</th>
						<th>Time In</th>
						<th>Time Out</th>
						<th>Status</th>
						</tr>
					</thead>
					<tbody>
					@foreach($attendances as $sn => $attendance) 
						<tr>
						<td>{{ $sn+1 }}</td>
						<td>{{ $attendance->attendance_date }}</td>
						<td>{{ \Carbon\Carbon::parse($attendance->attendance_date)->format('l jS \\of F Y') }}</td>
						<td>{{ $attendance->start }}</td>
						<td>{{ $attendance->close }}</td>
						@if(in_array($attendance->attendance_date, $leave_array))
							<td>Leave</td>
						@elseif(in_array($attendance->attendance_date, $validated_array))
							<td>Present (Validated)</td>
						@else
							@if((($attendance->start == '') || ($attendance->close == '')) && (\Carbon\Carbon::parse($attendance->attendance_date)->isWeekday()))
							<td>Absent</td>
							@elseif((($attendance->start == '') || ($attendance->close == '')) && (\Carbon\Carbon::parse($attendance->attendance_date)->isWeekend()))
							<td></td>
							@elseif($attendance->attendance_status == 2)
							<td>Validated</td>
							@else
							<td>Present</td>
							@endif
						@endif
						</tr>

					@endforeach

					</tbody>
				</table>
                        </div>
                        <div class="col-md-12 col-sm-12 lastSectionleft "> 
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>  
</body>
</html>
