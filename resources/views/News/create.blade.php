@extends('layouts.app')
@section('js')
  <script type="text/javascript"
          src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).on('click','#add_news',function () {
            var form=$('#news').serialize();// to get all data
            //alert(form);// print data in array [used alert to check if found data or no]
            var $url=$('#news').attr('action');// come url
           $.ajax({
              url:$url,
              dataType:'json',
              data:form,
               type:'post',
               beforeSend:function () {
                   $('.alert_error h1').empty();// to delete msg and show the new msg
                   $('.alert_error ul').empty();// to delete msg and show the new msg

               },success:function (data) {
                  if(data.status==true) {
                      $('.news_list tbody').append(data.result);
                      $('#news')[0].reset();// to clear data from form after add
                  }
               },error:function (data_error,exception) {
                  // alert(exception);
                 if(exception=='error'){
                     //alert(data_error); // data error come object
                    // console.log(data_error.responseJSON.message);
                    // alert(data_error.responseJSON.message);
                     $('.alert_error h1').html(data_error.responseJSON.message);
                     // to print error msg
                     $error_list="";
                     $.each(data_error.responseJSON.errors,function (index,v) {
                        //alert(v);
                       $error_list='<li>'+v+'</li>';
                     })
                     $('.alert_error ul').html($error_list);
                 }
               }
           });
            return false;
        })
    </script>
 @endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add News</div>
                    <!-- Show Error-->
                    <div class="alert_error">
                        <center><h1></h1></center>
                        <ul></ul>
                    </div>
                    <!-- Show Error-->

                    {!! session()->get('news') !!}
                    <div class="panel-body">
                     <table class="table news_list">
                        <tr>
                        <td>Tittle</td>
                        <td>Body</td>
                        <td>User</td>
                        </tr>
                         <tbody>
                         @foreach($news as $new)
                          @include('News.show')
                         @endforeach
                      </tbody>
                     </table>
                  </div>
                 <div class="panel-footer">
                     {!! Form::open(['url' => 'news/post','method'=>'post','id'=>'news']) !!}
                     <div class="form-group">
                         {!! form::label('title','Enter Your Title') !!}
                         {!! form::text('title',old('title'),['id'=>'title','class'=>'form-control']) !!}
                     </div>
                     <div class="form-group">
                         {!! form::label('body','Enter Body Of Msg') !!}
                         {!! form::textarea('body',old('body'),['id'=>'body','class'=>'form-control']) !!}
                     </div>
                     <div class="form-group">
                         {!! form::label('user_id','Select User Add') !!}
                         {!! form::text('user_id',old('user_id'),['id'=>'user_id','class'=>'form-control']) !!}
                     </div>
                     <div class="form-group">
                         {!! form::submit('Add',['class'=>'btn btn-primary','id'=>'add_news']) !!}
                     </div>
                     {!! Form::close() !!}

                 </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
