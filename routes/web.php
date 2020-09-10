<?php

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

Route::get('/', 'pageController@index');
Route::get('/about', 'pageController@about')->name("about");
Route::get('/service', 'pageController@service')->name("service");


//for test post
Route::get('/test','pageController@test');
Route::post('/test/1', function(\Illuminate\Http\Request $request){
    return $request->all();
});


// print All Data base
Route::get('/allposts','pageController@PrintALL')->name('allposts');

//insert data by model in form 
Route::post('insert/posts', 'pageController@insertData');

//Delete column
Route::pattern('id','[0-9]+');
Route::delete('del/posts/{id}', 'pageController@DeleteColumn');
//delete checked column
Route::delete('delitems/posts{id?}', 'pageController@DeleteckeckedCol');