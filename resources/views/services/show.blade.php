@extends('layouts.app')

@section('content')
    <a href="/core/services" class="btn btn-primary">Go Back</a>
    <h3>{{$service->name}}</h3>
    <img src="/storage/service_img/{{$service->img_url}}" style="width: 100%" />
    <br /> <br />
    <p>{!! $service->intro !!}</p>
    <hr />
    <p>{!! $service->description !!}</p>

    <hr >
    <p>Created on {{$service->created_at}} by {{$service->user->name}}</p>

    <hr >
    @if(!Auth::guest())
        @if(Auth::user()->id == $service->user_id)
            <div class="text-right">
                <a href="/core/services/{{$service->id}}/edit" class="btn btn-success">Edit</a>
                
                {!! Form::open(['action' => ['ServicesController@destroy', $service->id], 'class'=> 'pull-right']) !!}            
                    {!! Form::hidden('_method', 'DELETE') !!}            
                    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}            
                {!! Form::close() !!}
            </div>
        @endif
    @endif
@endsection