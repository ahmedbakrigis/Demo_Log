@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            {!! Form::model($user,array('route'=>['profile.update',Auth::user()->email],'method'=>'PUT')) !!}                <div class="form-group">
                    {!! form::label('name','Enter Your First Name') !!}
                    {!! form::text('name',Auth::user()->name,['id'=>'name','class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! form::label('last_name','Enter Your Last Name') !!}
                    {!! form::text('last_name',Auth::user()->last_name,['id'=>'last_name','class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! form::label('email','Enter Your Email') !!}
                    {!! form::email('email',Auth::user()->email,['id'=>'email','class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! form::label('password','Enter Your Password') !!}
                    {!! form::password('password',['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! form::submit('Update',['class'=>'btn btn-primary']) !!}
                </div>
                {!! form::close() !!}
            </div>
        </div>
    </div>
    </div>
@endsection
