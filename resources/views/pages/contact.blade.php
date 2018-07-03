@extends('layouts.app')

@section('content')
    @if(count($content) > 0)
        @foreach($content as $cont)
            <h1 class="text-center">{!! $cont->title !!}</h1>
            {{--  {!! $cont->intro !!}  --}}
            {!! $cont->content !!}
        @endforeach
    @else
        <h1>Page Not yet setted up</h1>
    @endif

    <div class="row">
        <br /><br />
        <div class="col-sm-8">
            <h2 class="text-center">Send Us a Message</h2>
            <div>
                {!! Form::open(['action' => 'MessagesController@store', 'files'=>true], ['method'=>'POST']) !!}
                    <div class="form-group">
                        {!! Form::label('full_name', 'Full Name') !!}                
                        {!! Form::text('full_name', '', ['class'=>'form-control', 'placeholder'=>' Full Name']) !!}                
                    </div>
                    <div class="form-group">
                        {!! Form::label('email', 'Email Address') !!}                
                        {!! Form::email('email', '', ['class'=>'form-control', 'placeholder'=>' Email Address']) !!}                
                    </div>
                    <div class="form-group">
                        {!! Form::label('phone_no', 'Phone Number') !!}                
                        {!! Form::text('phone_no', '', ['class'=>'form-control', 'placeholder'=>' Phone Number']) !!}                
                    </div>
                    <div class="form-group">
                        {!! Form::label('message', 'Message') !!}                
                        {!! Form::textarea('message', '', ['class'=>'form-control', 'placeholder'=>' Message']) !!}                
                    </div>
                    <div class="text-right">
                        {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
                    </div>            
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-sm-4">
            <h2 class="text-center">Address And Social Media</h2>
        </div>
    </div>
@endsection