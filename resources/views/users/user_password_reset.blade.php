@extends('layouts.datatable-adminlte2-4-0')
@section('title') Change Password @endsection
@section('content')  

<section class="content-header">
      <h1>
        Change Password
      </h1>
        <ol class="breadcrumb">
        <li><a href="{{ url('/main') }}"><i class="fa fa-dashboard" style="color: orange;"></i> Home</a></li>
          @permission(('can-reset-password'))
         <li><a href="{{ url('/manage_admins') }}"><i class="fa fa-users" style="color: red;"></i> Manage Users</a></li>
         @endpermission
        <li class="active">Change Password</li>
      </ol>
</section>

<section class="content">
    <div class="col-md-6">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Change Password for {{$user_details->name}}</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
            <div class="row">
              <div class="box-body">
  
    <form method = 'POST' action = "{{ url('/save_reset_credentials/'.$user_details->id) }}">

        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>

@if( Auth::user()->id == $user_details->id )
       <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
            <label for="password">Current Password</label>
            <input id="password" name = "current-password" type="password" class="form-control" required>
               @if ($errors->has('current-password'))
                <span class="help-block">
                 <strong>{{ $errors->first('current-password') }}</strong>
                </span>
                @endif
        </div>
 @endif

   <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password">Password</label>
            <input id="password" name = "password" type="password" class="form-control" required>
               @if ($errors->has('password'))
                <span class="help-block">
                 <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
        </div>

        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
            <label for="password_confirmation">Retype Password</label>
            <input id="password_confirmation" name = "password_confirmation" type="password" class="form-control" required>
              @if ($errors->has('password_confirmation'))
                <span class="help-block">
                 <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
               @endif
        </div>



        <button class = 'btn btn-primary' type ='submit'>Submit</button>
         </form>
    </div></div></div></div></div>

   <div class="row">
        <div class="col-md-4">
          

          </div></div>
</section>
@endsection