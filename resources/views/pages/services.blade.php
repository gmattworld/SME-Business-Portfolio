@extends('layouts.app')

@section('content')
    @if(count($content) > 0)
        @foreach($content as $cont)
            <h1 class="text-center">{!! $cont->title !!}</h1>
            {!! $cont->intro !!}
            <hr />
            {!! $cont->content !!}
        @endforeach
        <br /><br />
        @if(count($services) > 0)
            <div class="row">
                @foreach($services as $service)
                    <div class="col-sm-4">
                        <img src="/storage/service_img/{{$service->img_url}}" style="width: 100%" />
                        <h3 class="text-center">{!! $service->name !!}</h3>
                        <p>
                            {!! $service->intro !!}
                        </p>

                    </div>
                @endforeach
            </div>
        @else

        @endif
    @else
        <h1>Page Not yet setted up</h1>
    @endif
@endsection