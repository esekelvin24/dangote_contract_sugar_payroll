@extends('layouts.master')
@section('title') Change profile image @endsection
@section('content')


    <section class="content-header">
      <h1>
       Update {{$profile_image->name}}'s profile image 
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: blue;"></i> Home</a></li>
         <li><a href="{{ url('/view_user_details/'.$profile_image->user_id) }}"><i class="fa fa-users" style="color: blue;"></i> View user details</a></li>
        <li class="active">Change profile image</li>
      </ol>
</section>
<br>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src="{{ asset('user_profile_image/' . $profile_image->photo) }}" alt="" class="img-rounded img-responsive" />
                    </div>

                    <div class="col-sm-6 col-md-8">       
                   <form method = 'POST' action = "{{ url('/save_updated_user_profile_image/'.$profile_image->user_id) }}" class="form-horizontal" enctype="multipart/form-data">

                 <div class="form-group{{ $errors->has('filenam') ? ' has-error' : '' }} has-feedback">
            
                  <div class="col-sm-8">
                  <input type="file"  name="filenam" class="filename" required>

                 
                    @if ($errors->has('filenam'))
                        <span class="help-block">
                            <strong>{{ $errors->first('filenam') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
                <button type="submit" class="btn btn-info"> Update</button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}"></input> 
           </form>
       </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection