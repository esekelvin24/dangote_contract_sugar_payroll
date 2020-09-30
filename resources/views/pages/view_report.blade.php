@extends('layouts.app2')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">View Report</h3>
        
    </div>
    <div class="col-md-7 col-4 align-self-center">
       
        <ol class="breadcrumb btn waves-effect waves-light pull-right hidden-sm-down">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            @role(('admin'))
                    <li class="breadcrumb-item"><a href="{{url('/staff')}}">Staff Reports</a></li>
           @endrole
            <li class="breadcrumb-item active">{{ $report_owner or "Report" }}</li>
        </ol>
    </div>
</div>
<div class="row">
    <!-- Column -->
    <div class="col-lg-7 col-xlg-7 col-md-7">
        <div class="card">
            <div class="card-block">
              
                    <h4 class="card-title">{{ $staff_name or "Report Title" }}</h4>
                    <h6 class="card-subtitle">{{ $report_owner }}<code>{{ $report_date }}</code></h6>
                    <hr>
                       {!! $report_r !!}
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-5 col-xlg-5 col-md-5">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">Comments</h4>
                <hr>
                @foreach($comments as $sn => $comment)
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="card-subtitle">{{ $comment->user->name }}<code>{{ $comment->created_at }}</code></h6>
                        
                        {{ $comment->comment }}
                        
                    </div>
                </div>
                <hr>
                @endforeach
                <hr>
                <form action="{{url('/write_comment/')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="form-group">
                        <textarea class="form-control" id="comment" name="comment"></textarea>
                        <input type="hidden" name="report_id" value="{{ $report_id }}">
                    </div>

                </div>

                <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
<!-- Row -->
@endsection




