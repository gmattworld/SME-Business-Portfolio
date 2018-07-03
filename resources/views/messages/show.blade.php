@extends('layouts.app')

@section('content')
    <a href="/messages" class="btn btn-primary">Go Back</a>
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <h2>Message From <strong>{!! $msg->fullname !!} </strong></h2>        
            <p><small>{{$msg->email}}, {{$msg->phone_no}}</small></p>
            <div class="well">
                {{$msg->message}}
            </div>
            <p><small>Message sent on {{$msg->created_at}}</small></p>
        </div>
    </div>
@endsection