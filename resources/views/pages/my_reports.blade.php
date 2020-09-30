@extends('layouts.app2')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">{{ $staff_name or "My Reports" }}</h3>
        
    </div>
    <div class="col-md-7 col-4 align-self-center">
       
        <ol class="breadcrumb btn waves-effect waves-light pull-right hidden-sm-down">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            @role(('admin'))
            		<li class="breadcrumb-item"><a href="{{url('/staff')}}">Staff Reports</a></li>
             @endrole
            <li class="breadcrumb-item active">{{ $staff_name or "My Reports" }}</li>
        </ol>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">{{ $staff_name or "My Reports" }}</h4>
                <h6 class="card-subtitle"><!-- Report Title --><code><!-- max 190 characters --></code></h6>
			<div class="">
				<table id="srr_table"
				class="table table-striped table-bordered" cellspacing="0"
				width="100%">
					<thead>
						<tr>
						<th style="width: 10px">#</th>
						<th style="width: 150px">Date Written</th>
						<th style="width: 350px">Title</th>
						<!-- <th>Report</th> -->
						<th style="width: 50px">View</th>
						</tr>
					</thead>
					<tbody>
					@foreach($reports as $sn => $report) 
						<tr>
						<td>{{ $sn+1 }}</td>
						<td>{{ $report->created_at}}</td>
						<td>{{ $report->title}}</td>
						<!-- <td>{{ mb_strimwidth($report->report, 0, 5, '...')}}</td> -->
						<td>
						<a href="{{route('report',['id' => $report->id])}}" class="btn btn-warning btn-xs">View</a>
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
<!-- end row -->
@endsection




