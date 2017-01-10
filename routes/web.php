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
use Illuminate\Support\Facades\App;


Route::get('/', 'RoomController@index');


Route::post('/make/room', 'RoomController@create_room');
Route::post('/file/upload', 'FileController@file_upload');
Route::post('/file/delete ', 'FileController@file_delete');
Route::post('/website/upload','FileController@website_upload');

Route::get('/{title}','RoomController@show_room');
Route::post('/password','RoomController@access_room');
Route::get('/list/{title}','AccessController@index');
Route::get('/download/list/{title}','RoomController@download_room');

Route::get('/bridge/test', function() {
    $pusher = App::make('pusher');

    $pusher->trigger( 'test-channel',
                      'test-event',
                      array('text' => 'Preparing the Pusher Laracon.eu workshop!'));

});
