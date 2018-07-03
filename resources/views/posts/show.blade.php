@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-primary">Go Back</a>
    <h3>{{$post->title}}</h3>
    <img src="/storage/cover_imgs/{{$post->cover_img}}" style="width: 100%" />
    <br /> <br />
    <small>{!! $post->body !!}</small>

    <hr >
    <p>Created on {{$post->created_at}} by {{$post->user->name}}</p>

    <hr >
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <div class="text-right">
                <a href="/posts/{{$post->id}}/edit" class="btn btn-success">Edit</a>
                
                {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'class'=> 'pull-right']) !!}            
                    {!! Form::hidden('_method', 'DELETE') !!}            
                    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}            
                {!! Form::close() !!}
            </div>
        @endif
    @endif
@endsection