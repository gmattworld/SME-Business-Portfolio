@extends('layouts.app')

@section('content')
    <div class="jumbotron col-sm-8 col-sm-offset-2">
        {!! Form::open(['action' => ['UsersController@savechangepwd', $user], 'files'=>true], ['method'=>'POST', 'class'=>'form']) !!}
            <div class="form-group">
                {!! Form::label('password', 'Password') !!}                
                {!! Form::password('oldpassword', ['class'=>'form-control', 'placeholder'=>'Enter Password']) !!}                
            </div>
            <div class="form-group">
                {!! Form::label('npassword', 'New Password') !!}                
                {!! Form::password('npassword', ['class'=>'form-control', 'placeholder'=>'Enter New Password']) !!}                
            </div>
            <div class="form-group">
                {!! Form::label('cpassword', 'Confirm Password') !!}                
                {!! Form::password('cpassword', ['class'=>'form-control', 'placeholder'=>'Confirm New Password']) !!}                
            </div>
            {!! Form::submit('Change Password', ['class'=>'btn btn-primary']) !!}            
            {!! Form::hidden('_method', 'PUT') !!}            
        {!! Form::close() !!}
    </div>
@endsection