<div class="well">
    <h2>Create User</h2>
    <div>
        {!! Form::open(['action' => 'UsersController@store', 'files'=>true], ['method'=>'POST']) !!}
            <div class="form-group">
                {!! Form::label('full_name', 'Full Name') !!}                
                {!! Form::text('full_name', '', ['class'=>'form-control', 'placeholder'=>'Full Name']) !!}                
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email Address') !!}                
                {!! Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'Email Address']) !!}                
            </div>
            <div class="text-right">
                {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
            </div>            
        {!! Form::close() !!}
    </div>
</div>