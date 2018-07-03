@extends('layouts.app')

@section('content')
    @if(count($content) > 0)
        @foreach($content as $cont)
            {{--  <h1 class="text-center">{!! $cont->title !!}</h1>
            {!! $cont->intro !!}
            <hr />  --}}
            {!! $cont->content !!}
        @endforeach
    @else
        <h1>Page Not yet setted up</h1>
    @endif
@endsection