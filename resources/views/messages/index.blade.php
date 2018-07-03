@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading ">Messages <span class="pull-right badge"> {{count($urmsg)}} Unread Inbox</span></div>

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
                                <th>Email</th>
                                <th>Active</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($msgs) > 0)
                                @foreach($msgs as $msg)
                                    <tr>
                                        <td>{!! $msg->fullname !!}</td>
                                        <td>{!! $msg->phone_no !!}</td>
                                        <td class="text-center">
                                            @if($msg->read)
                                                <span class="text-success">Read</span>
                                            @else
                                                <span class="text-danger">Unread</span>
                                            @endif                                            
                                        </td>
                                        <td class="text-center"><a href="messages/{{ $msg->id }}" class="btn btn-success"> View Details </a></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3"> No Message found </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="panel-foot text-center">{{$msgs->links()}}</div>
            </div>
        </div>
    </div>
</div>
@endsection
