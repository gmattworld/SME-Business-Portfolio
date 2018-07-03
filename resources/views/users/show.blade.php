@extends('layouts.app')

@section('content')
    <a href="/users" class="btn btn-primary">Go Back</a>
    <h3>{{$user->name}}</h3>
    <p>{{$user->email}}</p>
    <p>Created on {{$user->created_at}} by {{$created_by['name']}}</p>
    <p>Updated at by {{$user->updated_at}}</p>

    <hr >
    @if(!Auth::guest())
        
        <div class="text-right">
            <a href="/users/{{$user->id}}/edit" class="btn btn-success">Edit</a>

            @if($user->isActive)
                {!! Form::open(['action' => ['UsersController@disable', $user->id], 'class'=> 'pull-right']) !!}            
                    {!! Form::hidden('_method', 'PUT') !!}            
                    {!! Form::submit('Disable', ['class'=>'btn btn-danger']) !!}            
                {!! Form::close() !!}
            @else
                {!! Form::open(['action' => ['UsersController@enable', $user->id], 'class'=> 'pull-right']) !!}            
                    {!! Form::hidden('_method', 'PUT') !!}            
                    {!! Form::submit('Enable', ['class'=>'btn btn-warning']) !!}            
                {!! Form::close() !!}
            @endif

            {!! Form::open(['action' => ['UsersController@resetpass', $user->id], 'class'=> 'pull-right']) !!}            
                {!! Form::hidden('_method', 'PUT') !!}            
                {!! Form::submit('Reset Password', ['class'=>'btn btn-default']) !!}            
            {!! Form::close() !!}
        </div>
    @endif
@endsection