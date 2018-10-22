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
                    <li class="active">
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
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            {{-- <input type="name" class="form-control flat" name="name" id="name">
                                            --}}
                                            <div class="fileinput-new thumbnail" style="width: 200px; ">
                                                @if(auth()->user()->hasAvatar())
                                                <img src="{{ auth()->user()->avatar }}" style="width: 100%; height: 100%">
                                                @else
                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"
                                                    alt="">
                                                @endIf
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12">
                                            <input type="file" name="avatar">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-info flat">Upload</button>
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
