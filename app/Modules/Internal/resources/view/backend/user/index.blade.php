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
                    @if(isset($lists))
                        @if($lists->count() > 0)
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($lists as $list)
                                        <tr>
                                            <td>{{ $list->name }}</td>
                                            <td>{{ $list->email }}</td>
                                            <td>
                                                <label style="border: limegreen 1.5px solid; border-radius: 10px; padding: 4px;">{{ $list['role']['name'] }}</label>
                                            </td>
                                            <td>
                                                <a href="{{ route($route.'edit', $list->id) }}"
                                                class="btn btn-round btn-info flat">Edit</a>
                                            </td>
                                            <td>
                                                <button type="submit" class="btn btn-round btn-danger flat"
                                                        data-toggle="modal" data-target="#deleteModal{{$list->id}}">
                                                    Delete
                                                </button>
                                                @include('internal::component.modal-delete', [
                                                    'delete' => $list,
                                                    'route' => $route
                                                ])
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            Please create {{ $name }}
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection