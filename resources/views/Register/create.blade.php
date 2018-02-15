@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Register</div>
                    <div class="panel-body">
                    {!! Form::open(['url' => 'manual/store', 'method' => 'post','files' => true]) !!}
                     <div class="form-group">
                      {!! form::label('name','Enter Your First Name') !!}
                      {!! form::text('name',old('name'),['id'=>'name','class'=>'form-control']) !!}
                     </div>
                     <div class="form-group">
                      {!! form::label('last_name','Enter Your Last Name') !!}
                      {!! form::text('last_name',old('last_name'),['id'=>'last_name','class'=>'form-control']) !!}
                     </div>
                     <div class="form-group">
                      {!! form::label('email','Enter Your Email') !!}
                      {!! form::email('email',old('email'),['id'=>'email','class'=>'form-control']) !!}
                     </div>
                     <div class="form-group">
                      {!! form::label('password','Enter Your Password') !!}
                      {!! form::password('password',['password'=>'password','class'=>'form-control']) !!}
                     </div>
                     <div class="form-group">
                      {!! form::label('password_confirmation','Enter Your Password Again') !!}
                      {!! form::password('password_confirmation',['id'=>'password_confirmation','class'=>'form-control']) !!}
                     </div>
                        <div class="form-group">
                            {!! form::label('profile','Upload Your Profile Photo') !!}
                            {!! form::file('profile_img',['id'=>'profile']) !!}
                        </div>

                      <div class="form-group">
                      {!! form::submit('Register',['class'=>'btn btn-primary']) !!}
                     </div>
                   {!! form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
