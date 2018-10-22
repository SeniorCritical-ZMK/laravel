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
                        <li class="active">
                            <a href="{{ route('internal::profile.index') }}">Personal Info</a>
                        </li>
                        <li>
                            <a href="{{ route('internal::profile.showAvatarForm') }}">Change Avatar</a>
                        </li>
                        <li>
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
                                        <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
                                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="name" class="form-control flat" name="name" id="name" >
                                                @if($errors->has('name'))
                                                    <h5 class="err">{{ $errors->first('name') }}</h5>
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