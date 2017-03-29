@extends('layouts.wrapper')

@section('content')
    <div ><span style="padding:30px 500px 30px 0;"><img src="{{url('images/logo.png' )}}"  alt="logo" /></span>
    </div>
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form  role="form" method="POST" action="{{ url('/login') }}">
                        <fieldset>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Login
                            </button>
                            <a href="{{ url('/register/user') }}" class="pull-right mt-10">Create Account</a>
                        </fieldset>
                    </form>
                </div>
            </div>

@endsection
