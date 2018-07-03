@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            </div>
            <div class="col-md-8 col-sm-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading ">Pages <span class="pull-right badge">{{count($pages)}} Pages</span></div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($pages) > 0)
                                    <!-- {{ $counter = 0 }} -->
                                    @foreach($pages as $page)
                                        <tr>
                                            <td>{{++$counter}}</td>
                                            <td class="text-capitalize">{!! $page->name !!}</td>
                                            <td class="text-center"><a href="pages/{{ $page->id }}" class="btn btn-success"> View Details </a></td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3"> No User found </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="panel-foot text-center">{{$pages->links()}}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
