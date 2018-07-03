@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div>
                <div class="well">
                    <h2>Create User</h2>
                    <div>
                        {!! Form::open(['action' => ['UsersController@update', $user->id], 'files'=>true], ['method'=>'POST']) !!}
                            <div class="form-group">
                                {!! Form::label('full_name', 'Full Name') !!}                
                                {!! Form::text('full_name', $user->name , ['class'=>'form-control', 'placeholder'=>'Full Name']) !!}                
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', 'Email Address') !!}                
                                {!! Form::email('email', $user->email, ['class'=>'form-control', 'placeholder'=>'Email Address']) !!}                
                            </div>
                            <div class="text-right">
                                {!! Form::hidden('_method', 'PUT') !!}
                                {!! Form::submit('Edit User', ['class'=>'btn btn-primary']) !!}
                            </div>            
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Users</div>

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
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($users) > 0)
                                @foreach($users as $user)
                                    <tr>
                                        <td>{!! $user->name !!}</td>
                                        <td>{!! $user->email !!}</td>
                                        <td class="text-center"><a href="users/{{ $user->id }}" class="btn btn-success"> View Details </a></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3"> No post found </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
