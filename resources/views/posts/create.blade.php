@extends('layouts.app')
@section('content')
    <h2>Create Posts</h2>
    <div>
        {!! Form::open(['action' => 'PostsController@store', 'files'=>true], ['method'=>'POST']) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title') !!}                
                {!! Form::text('title', '', ['class'=>'form-control', 'placeholder'=>'Title']) !!}                
            </div>
            <div class="form-group">
                {!! Form::label('body', 'Title') !!}                
                {!! Form::textarea('body', '', ['class'=>'form-control', 'id'=>'article-ckeditor', 'placeholder'=>'Body']) !!}                
            </div>
            <div class="form-group">
                {!! Form::label('cover_img', 'Cover Image') !!}                
                {!! Form::file('cover_img', ['class'=>'form-control']) !!}                                
            </div>            
            {!! Form::submit('Post Blog', ['class'=>'btn btn-primary']) !!}            
        {!! Form::close() !!}
    </div>
@endsection