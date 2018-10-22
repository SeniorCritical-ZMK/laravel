@extends('internal::backend.layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Profile</h2>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="flat panel panel-info">
            <div class="panel-heading">
                Profile Form
            </div>
            <div class="panel-body">
                <ul class="nav nav-tabs">
                    <li>
                        <a href="{{ route('internal::profile.index') }}">Personal Info</a>
                    </li>
                    <li>
                        <a href="{{ route('internal::profile.showAvatarForm') }}">Change Avatar</a>
                    </li>
                    <li class="active">
                        <a href="{{ route('internal::profile.showPasswordForm') }}">Change Password</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade in active">
                        <div class="row">
                            <div class="col-lg-12">
                                <h4></h4>
                                <form method="post" action="{{ route('internal::profile.update') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group row {{ $errors->has('password') ? 'has-error' : '' }}">
                                        <label for="password" class="col-sm-2 col-form-label">Current Password *</label>
                                        <div class="col-sm-10">
                                            <input type="password" class="form-control flat" name="password" id="password">
                                            @if($errors->has('password'))
                                            <h5 class="err">{{ $errors->first('password') }}</h5>
                                            @endIf
                                        </div>
                                    </div>
                                    <div class="form-group row {{ $errors->has('new_password') ? 'has-error' : '' }}">
                                        <label for="new_password" class="col-sm-2 col-form-label">New Password *</label>
                                        <div class="col-sm-10">
                                            <input type="new_password" class="form-control flat" name="new_password" id="new_password">
                                            @if($errors->has('new_password'))
                                            <h5 class="err">{{ $errors->first('new_password') }}</h5>
                                            @endIf
                                        </div>
                                    </div>
                                    <div class="form-group row {{ $errors->has('new_password_confirmation') ? 'has-error' : '' }}">
                                        <label for="new_password_confirmation" class="col-sm-2 col-form-label">
                                            New Password Again *</label>
                                        <div class="col-sm-10">
                                            <input type="new_password_confirmation" class="form-control flat" name="new_password_confirmation"
                                                id="new_password">
                                            @if($errors->has('new_password_confirmation'))
                                            <h5 class="err">{{ $errors->first('new_password_confirmation') }}</h5>
                                            @endIf
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10 col-md-offset-2">
                                            <button type="submit" class="btn btn-info flat">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
