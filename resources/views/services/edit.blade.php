@extends('layouts.app')

@section('content')
<div class="well">
    <h2>Create Service</h2>
    <div>
        {!! Form::open(['action' => ['ServicesController@update', $service->id], 'files'=>true], ['method'=>'POST']) !!}
            <div class="form-group">
                {!! Form::label('name', 'Header') !!}                
                {!! Form::text('name', $service->name, ['class'=>'form-control', 'placeholder'=>'Service Header']) !!}                
            </div>
            <div class="form-group">
                {!! Form::label('intro', 'Intro') !!}                
                {!! Form::textarea('intro', $service->intro, ['class'=>'form-control', 'id'=> 'article-ckeditor1', 'placeholder'=>' Service Brief Description']) !!}                
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description') !!}                
                {!! Form::textarea('description', $service->description, ['class'=>'form-control', 'id'=> 'article-ckeditor', 'placeholder'=>' Service Description']) !!}                
            </div>
            
            <div class="form-group">
                {!! Form::label('service_img', 'Service Image') !!}                
                {!! Form::file('service_img', ['class'=>'form-control', 'placeholder'=>'Service Image']) !!}                
            </div>
            <div class="text-right">
                {!! Form::submit('Create Service', ['class'=>'btn btn-primary']) !!}
                {!! Form::hidden('_method', 'PUT') !!}
            </div>            
        {!! Form::close() !!}
    </div>
</div>
@endsection