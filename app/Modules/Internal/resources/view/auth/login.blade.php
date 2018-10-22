@extends('internal::auth.master')

@section('content')
<form role="form" action="{{ route('internal::login') }}" method="post">
    {{ csrf_field() }}
    <fieldset>
        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input type="password" name="password" class="form-control" placeholder="Password">
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="checkbox">
            <label class="pull-left checkbox-inline">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>
        </div>

        <!-- Change this to a button or input when using this as a form -->
        <button type="submit" class="btn btn-lg btn-success btn-block">Log in</button>
    </fieldset>
</form>
{{--<p class="text-center">
    <a href="#">Create an Account</a>
</p>--}}
@endsection