@extends('layouts.app2')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">New Report</h3>
        
    </div>
    <div class="col-md-7 col-4 align-self-center">
       
        <ol class="breadcrumb btn waves-effect waves-light pull-right hidden-sm-down">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item active">Write Report</li>
        </ol>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
        <div class="card">
            <div class="card-block">
                <h4 class="card-title">Write Report</h4>
                <h6 class="card-subtitle">NB:<code>Drag form down if more space is required</code></h6>
                @if(count($errors)>0)
                  <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                      {{$error}}
                    @endforeach
                  </div>
                @endif
    			<div class="">
                    <form action="{{url('/write_report/')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="form-group">
                            <input type="text" name="report_title" class="form-control" id="report_title" name="report_title"  />
                        </div>
                        <div class="form-group">
                            <textarea class="summernote form-control" id="report" name="report" required="required"></textarea>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-default">Submit</button>
                    </form>
    			</div>
		    </div>
        </div>
	</div>
</div>
<!-- end row -->
@endsection




