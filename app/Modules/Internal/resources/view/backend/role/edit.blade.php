@extends('internal::backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">{{ $name }}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="flat panel panel-info">
                <div class="panel-heading">
                    {{ $name }} Form
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form method="post" action="{{ route($route.'update', $details->id) }}">
                                {{ method_field('PUT') }}
                                {{ csrf_field() }}
                                @include($rView.'common.form')
                                <div class="form-group row">
                                    <div class="col-sm-10 col-md-offset-2">
                                        <button type="submit" class="btn btn-info">Update</button>
                                        <a href="{{ route($route.'index') }}" class="btn btn-default">Cancel</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection