@extends('layouts.appL')

@section('content')
    <div class="row">
        <!-- <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>

                <div class="panel-body"> -->
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        <img src="{{ asset("/img/dangote-logo.png")}}" style="width:200px;height:114px;margin-bottom:10px;">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                           <!--  <label for="email" class="col-md-12 control-label">E-Mail Address</label>
 -->
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                           <!--  <label for="password" class="col-md-12 control-label">Password</label> -->

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox">
                                    <label class="col-md-12">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-12">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>

                                <a class="btn btn-link" href="{{ route('register') }}">
                                    No Account? Register
                                </a>
                            </div>
                        </div>
                    </form>
                <!-- </div>
            </div>
        </div> -->
    </div>
@endsection
