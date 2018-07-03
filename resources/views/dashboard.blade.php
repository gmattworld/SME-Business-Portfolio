@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/posts/create" class="btn btn-primary">Create Post</a>
                    <hr />
                    <h1>Your Blog</h1>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($posts) > 0)
                                @foreach($posts as $post)
                                    <tr>
                                        <td>{!! $post->title !!}</td>
                                        <td class="text-center"><a href="posts/{{ $post->id }}/edit" class="btn btn-success"> Edit </a></td>
                                        <td class="text-center">
                                            {!! Form::open(['action' => ['PostsController@destroy', $post->id]]) !!}            
                                                {!! Form::hidden('_method', 'DELETE') !!}            
                                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}            
                                            {!! Form::close() !!}
                                        </td>
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
