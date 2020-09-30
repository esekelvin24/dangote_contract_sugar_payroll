@extends('layouts.app2')
@section('content')
<div class="row page-titles">
<div class="col-md-5 col-8 align-self-center">
    <h3 class="text-themecolor m-b-0 m-t-0">Your Staff</h3>
    
</div>
<div class="col-md-7 col-4 align-self-center">
   
    <ol class="breadcrumb btn waves-effect waves-light pull-right hidden-sm-down">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active">Staff List</li>
    </ol>
</div>
</div>
<div class="row">
	<div class="col-lg-12">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">Staff List</h4>
                <h6 class="card-subtitle">Staff Under You<code><!-- max 190 characters --></code></h6>
			<div class="">
				<table id="staff_list"
				class="table table-striped table-bordered" cellspacing="0"
				width="100%">
					<thead>
						<tr>
						<th style="width: 10px">#</th>
						<th>Staff Name</th>
						<th>Department</th>
						<th>View Profile</th>
						<th>View Reports</th>
						<th>View Attendance</th>
						<th>View Leave</th>
						<th>View Validation</th>
						</tr>
					</thead>
					<tbody>
					@if($staffcount > 0)
						@foreach($data as $sn => $user) 
							<tr>
							<td>{{ $sn+1 }}</td>
							<td>{{ $user->name}}</td>
							<td>{{ $user->department->name}}</td>
							<td>
							<div style="align-content: center;"><a href="{{url('staffProfile/'.$user->id)}}" class="btn btn-info btn-xs">View</a></div>
							</td>
							<td>
							<div style="align-content: center;"><a href="{{url('staff/'.$user->id)}}" class="btn btn-warning btn-xs">View</a></div>
							</td>
							<td>
							<div style="align-content: center;"><a href="{{url('staffAttendance/'.$user->id)}}" class="btn btn-success btn-xs">View</a></div>
							</td>
							<td>
							<div style="align-content: center;"><a href="{{url('staffLeave/'.$user->id)}}" class="btn btn-primary btn-xs">View</a></div>
							</td>
							<td>
							<div style="align-content: center;"><a href="{{url('staffValidation/'.$user->id)}}" class="btn btn-danger btn-xs">View</a></div>
							</td>
							</tr>

						@endforeach
					@else
						
					@endif

					</tbody>
				</table>
			</div>
		</div>
		</div>
	</div>
</div>
<!-- end row -->
@endsection




