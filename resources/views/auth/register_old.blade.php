@extends('layouts.appL')

@section('content')
 <div class="row">
 <!--   <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body"> -->
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <img src="{{ asset("/img/dangote-logo.png")}}" style="width:200px;height:114px;margin-bottom:10px;">
                        <div class="form-group{{ $errors->has('sap') ? ' has-error' : '' }}">
                            <!-- <label for="name" class="col-md-12 control-label">Name</label> -->

                            <div class="col-md-12">
                                <input id="sap" type="text" class="form-control" name="sap" placeholder="Staff No." value="{{ old('sap') }}" required autofocus>

                                @if ($errors->has('sap'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sap') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <!-- <label for="name" class="col-md-12 control-label">Name</label> -->

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control" name="name" placeholder="Fullname" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <!-- <label for="email" class="col-md-12 control-label">E-Mail Address</label>
 -->
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <!-- <label for="password" class="col-md-12 control-label">Password</label>
 -->
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                          <!--   <label for="password-confirm" class="col-md-12 control-label">Confirm Password</label> -->

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                            </div>
                        </div>
                        <!-- dept options -->
                        <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                           <!--  <label for="department" class="col-md-12 control-label">department</label> -->

                            <div class="col-md-12">
                                <select id="department" class="form-control" name="department" value="{{ old('department') }}" required>
                                    <option value="" disabled selected>Select Department</option>
                                    @foreach($departments as $id=>$department)
                                        <option value="{{$id}}">{{$department}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('department'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- roles options -->
                   {{--      <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
                         
                            <div class="col-md-12">
                                <select id="role" class="form-control" name="role" value="{{ old('role') }}" required>
                                        <option value="" disabled selected>Select Role</option>
                                    @foreach($roles as $id=>$role)
                                        <option value="{{$id}}">{{$role}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('role'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>

                                <a class="btn btn-link" href="{{ route('login') }}">
                                    Have an Account? Login
                                </a>
                            </div>
                        </div>
                    </form>
                <!-- </div>
            </div>
        </div>
    </div> -->
</div> 
@endsection
