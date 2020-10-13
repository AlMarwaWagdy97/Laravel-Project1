<?php

use App\Events\EventTest;
use App\Http\Controllers\Upload;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
// route of pages

Route::get('laravel', function(){
    return view('welcome');
});


Route::get('/', 'pageController@index');
Route::get('/about', 'pageController@about')->name("about");
Route::get('/service', 'pageController@service')->name("service");


//for test post
Route::get('/test','pageController@test');
Route::post('/test/1', function(\Illuminate\Http\Request $request){
    return $request->all();
});

// print All Data base
Route::get('/allposts','pageController@PrintALL')->name('allposts')->middleware('posts');

//insert data by model in form 
Route::post('insert/posts', 'pageController@insertData')->middleware('posts');

//Delete column
Route::pattern('id','[0-9]+');
Route::delete('del/posts/{id}', 'pageController@DeleteColumn')->middleware('posts');
//delete checked column
Route::delete('delitems/posts{id?}', 'pageController@DeleteckeckedCol')->middleware('posts');

//route of Auth(Login-Register)
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//rout of manual(login-Register)
// Route::get('/Manual/login', 'Users@login_get');
// Route::post('/Manual/login', 'Users@login_post');


// MiddelWare group
Route::group(['middleware'=>'guest'], function(){
    Route::get('/Manual/login', 'Users@login_get');
    Route::post('/Manual/login', 'Users@login_post');
});

// test not get in file untill login
Route::get('/TestM', 'HomeController@testM');

// Multi Auth
Route::get('/Adminpath', function(){
    // return 'Test admin path';
    return Auth::guard('admin_guard')->user();
})->middleware('Adminkernal:admin_guard');

Route::get('/Admin/login', 'adminController@login_get');
Route::post('/Admin/login', 'adminController@login_post');

// request segment - segments
Route::get('test/Segment_Route', function(Illuminate\Support\Facades\Request $request){
    return $request::segments();
}); 

// upload file:
Route::post('Upload/file', 'Upload@upload');

//storage Text area:
Route::post('textarea/file', 'Upload@textarea');

//Event + Listner 
Route::get('event/test', function(){
    return event(new \App\Events\EventTest('This is new event name EventTest'));
});

// Mailable + Markown 
Route::get('send/Message', function(){
    // Mail::to('ahmed@gmai.com')->send(new App\Mail\TestMailable());
    return 'Send Message Test ....';
});

// Job by queue in message
Route::get('Send_Job/Message', function(){
    $job = (new \App\Jobs\SendMailJob)->delay(\Carbon\Carbon::now()->addSeconds(10));
    dispatch($job);
});