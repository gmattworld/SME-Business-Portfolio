@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-offset-2">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <a href="/core/services/create" class="btn btn-primary">Create Service</a>
            <br />
            <br />
            <div class="panel panel-default">
                <div class="panel-heading ">Services</div>
                
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Intro</th>
                                <th>Active</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($services) > 0)
                                @foreach($services as $service)
                                    <tr>
                                        <td>{!! $service->name !!}</td>
                                        <td>{!! $service->intro !!}</td>
                                        <td class="text-center">
                                            @if($service->isActive)
                                                {!! Form::checkbox('isActive', '', true) !!}
                                            @else
                                                {!! Form::checkbox('isActive', '', false) !!}
                                            @endif                                            
                                        </td>
                                        <td class="text-center"><a href="services/{{ $service->id }}" class="btn btn-success"> View Details </a></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3"> No Service found </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="panel-foot text-center">{{$services->links()}}</div>
            </div>
        </div>
    </div>
</div>
@endsection