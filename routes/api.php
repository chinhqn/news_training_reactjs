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
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('cats', CatsController::class);
Route::resource('news', NewsController::class);
Route::post('news/{id}','NewsController@update');

Route::resource('user', UsersController::class);
// Route::resource('cat', CatsController::class);


Route::get('get-news','NewsController@getNews');


