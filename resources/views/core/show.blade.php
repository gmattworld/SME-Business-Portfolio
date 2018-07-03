@extends('layouts.app')

@section('content')
    <a href="/pagelist" class="btn btn-primary">Go Back</a>
    <h3>{{$page->name}}</h3>
    <br /> <br />
    

    {!! Form::open(['action' => ['PagesController@update', $page->id], 'files'=>true], ['method'=>'POST', 'class'=>'form']) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title') !!}                
            {!! Form::text('title', $page->title, ['class'=>'form-control', 'placeholder'=>'Title']) !!}                
        </div>
        <div class="form-group">
            {!! Form::label('intro', 'Intro') !!}                
            {!! Form::text('intro', $page->intro, ['class'=>'form-control', 'placeholder'=>'Intro']) !!}                
        </div>
        <div class="form-group">
            {!! Form::label('content', 'Content') !!}                
            {!! Form::textarea('content', $page->content, ['class'=>'form-control', 'id'=>'article-ckeditor', 'placeholder'=>'Content']) !!}                
        </div>
        {!! Form::submit('Update Page', ['class'=>'btn btn-primary']) !!}            
        {!! Form::hidden('_method', 'PUT') !!}            
    {!! Form::close() !!}
@endsection