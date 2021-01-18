<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/send-message', 'Chat\ChatController@send');
Route::post('friends','Chat\ChatController@friends');
Route::get('friendsList/{id}','Chat\ChatController@friendsList');
Route::post('singleChat','Chat\ChatController@singleChat');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
