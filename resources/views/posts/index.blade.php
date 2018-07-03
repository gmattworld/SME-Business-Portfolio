@extends('layouts.app')

@section('content')
<h1>Posts</h1>
    @if(count($posts) >= 1)
        @foreach($posts as $post)
            <div class="well">
                <div class="row">
                    <div class="col-sm-4">
                        <img src="/storage/cover_imgs/{{$post->cover_img}}" style="width: 100%" />
                    </div>
                    <div class="col-sm-8">
                        <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <small>written on: {{$post->created_at}} by {{$post->user['name']}}</small>
                    </div>
                </div>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No Posts in database</p>
    @endif
@endsection