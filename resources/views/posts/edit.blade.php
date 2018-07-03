@extends('layouts.app')
@section('content')
    <h2>Edit Post</h2>
    <div>
        {!! Form::open(['action' => ['PostsController@update', $post->id], 'files'=>true], ['method'=>'POST', 'class'=>'form']) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title') !!}                
                {!! Form::text('title', $post->title, ['class'=>'form-control', 'placeholder'=>'Title']) !!}                
            </div>
            <div class="form-group">
                {!! Form::label('body', 'Title') !!}                
                {!! Form::textarea('body', $post->body, ['class'=>'form-control', 'id'=>'article-ckeditor', 'placeholder'=>'Body']) !!}                
            </div>
            <div class="form-group">
                {!! Form::label('cover_img', 'Cover Image') !!}                
                {!! Form::file('cover_img', ['class'=>'form-control']) !!}                                
            </div>
            {!! Form::submit('Post Blog', ['class'=>'btn btn-primary']) !!}            
            {!! Form::hidden('_method', 'PUT') !!}            
        {!! Form::close() !!}
    </div>
@endsection