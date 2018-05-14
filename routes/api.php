<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/submit', 'ReceiveEnquiryController@index');
Route::post('/message_us', 'MessageUsController@index');
Route::post('/access_storage', 'AccessStorageController@index');
Route::post('/book_return', 'BookReturnController@index');

