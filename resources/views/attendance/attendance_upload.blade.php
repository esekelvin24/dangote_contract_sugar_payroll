@extends('layouts.datatable-adminlte2-4-0')
@section('title') Upload Attendance @endsection
@section('content') 


 <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Upload Attendance
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
        <li class="active">Upload Attendance</li>
      </ol>
    </section>

<section class="content">
      
@if (count($errors))
    <div class="alert alert-danger">
<button class="close" data-dismiss="alert">×</button>
        @foreach ($errors->all() as $error)
              <p > {{ $error }}</p>
        @endforeach
    </div>
    @elseif(Session::has('message'))
  <div class="alert alert-success">
<button class="close" data-dismiss="alert">×</button>
        <p><?php echo Session::get('message'); ?></p>
</div>
@endif 

        <div class="row">
        <div class="col-md-6">
          {{-- <div class="box"> --}}
             <div class="box box-info">
            <div class="box-header">

               
            
                    <form action="{{ url('store_attendance_upload') }}" method="post" enctype="multipart/form-data">
                         {{ csrf_field() }}
                        <input type="file" accept=".xls,.xlsx" name="attendance_upload" required />
             
                 <br>   
                        <input type="submit" class="btn btn-primary btn-lg" name="upload" value="Upload">
                    </form>
            
		    </div>
        </div>
        </div>
	</div>
</div>

 </section>
<!-- end row -->
@endsection




