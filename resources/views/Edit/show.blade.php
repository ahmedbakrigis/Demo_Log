@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading text-center" style="color: #f00">{!! Auth::user()->name !!} Profile's</div>
                    <div class="panel-body">
                     <div class="row">
                       <div class="col-md-4">
                        <img src="upload/{!! Auth::user()->profile_img !!}" style="height: 150px; width: 150px; border-radius: 50%">
                        {!!Form::open(['url' => 'manual/update', 'files' => true,'method' => 'post']) !!}
                        {!! form::label('image','Update Your Profile Image') !!}
                        {!! form::file('profile_img') !!}
                         {!! form::submit('Update',['class'=>'btn btn-primary']) !!}
                        {!! form::close() !!}
                       </div>
                      <div class="col-md-8">
                              {{ session()->get('msg') }}
                        <h2 class="text-center">First Name: {!! Auth::user()->name !!}</h2>
                        <h2 class="text-center">Last Name: {!! Auth::user()->last_name !!}</h2>
                        <h2 class="text-center">Email: {!! Auth::user()->email !!}</h2>
                        {!! link_to_route('profile.edit','Edit',[Auth::user()->email],['class'=>'btn btn-success']) !!}
                      </div>
                     </div>
                   </div>
            </div>
        </div>
    </div>
    </div>
@endsection
