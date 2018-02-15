@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Log In</div>
                    <div class="panel-body">
                        {!! Form::open(['url' => 'manual/logstore', 'method' => 'post']) !!}
                        <div class="form-group">
                            {!! form::label('email','Enter Your Email') !!}
                            {!! form::email('email',old('email'),['id'=>'email','class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! form::label('password','Enter Your Password') !!}
                            {!! form::password('password',['id'=>'password','class'=>'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!! form::submit('Log In',['class'=>'btn btn-primary']) !!}
                        </div>
                        {!! form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
