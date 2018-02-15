<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('testmethod', 'HomeController@testmethod');
Route::get('test', 'HomeController@test');

Route::prefix('manual')->group(function (){

    Route::post('update','Updateimg@update_img');
});
Route::group(['middleware'=>'guest'],function (){
   Route::prefix('manual')->group(function (){
       Route::get('register','RegisterUser@create');
       Route::get('login','LoginUser@create');
       Route::post('logstore','LoginUser@store');
     Route::post('store','RegisterUser@store');
   });
});
// if user is visitor not make login redirect to page login to make login
    Route::group(['middleware'=>'news'],function (){
    Route::get('news','Newscontroller@create');
    Route::post('news/post','Newscontroller@newspost');
    Route::resource('profile','UserEdit',['except'=>'index','create','store','destroy']);

});

//============================================================================
Route::get('Cannot',function (){
   return 'YOU CANT ACCESS WITH EMAIL';
});
Route::get('null',function (){
   return 'This Value Is Null';
});
//=============================================================================

// outlog user
Route::group(['middleware'=>'auth'],function (){
   Route::get('manual/logout',function (){
      auth()->logout();
      return redirect('manual/login');
   });
});
//==================================================================================
// Used Event Route
Route::get('test/event',function (){
    return event(new \App\Events\myproject_envent('Some TExt Add By event'));
});
//=======================================================================================
// MailABle Mark
Route::get('tesmail',function (){
    // TO Send mail
    \Illuminate\Support\Facades\Mail::to('engahmed@yahoo.com')->send(new App\Jobs\SendMail('Hi Every Body '));
    return 'send mail';
});
//======================================================================================
// Queues & Jobs
Route::get('tesmail',function (){
    $job= (new App\Jobs\SendMail)->delay(\Carbon\Carbon::now()->addSeconds(5));
  dispatch($job);

    return 'Send Test mail';
});