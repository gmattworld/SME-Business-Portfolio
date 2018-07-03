@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div>
                @include('users.create')
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading ">Users <span class="pull-right badge">{{count($allusers)}} Users</span></div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Active</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($users) > 0)
                                @foreach($users as $user)
                                    <tr>
                                        <td>{!! $user->name !!}</td>
                                        <td>{!! $user->email !!}</td>
                                        <td class="text-center">
                                            @if($user->isActive)
                                                {!! Form::checkbox('isActive', '', true) !!}
                                            @else
                                                {!! Form::checkbox('isActive', '', false) !!}
                                            @endif                                            
                                        </td>
                                        <td class="text-center"><a href="users/{{ $user->id }}" class="btn btn-success"> View Details </a></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3"> No User found </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="panel-foot text-center">{{$users->links()}}</div>
            </div>
        </div>
    </div>
</div>
@endsection
