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
<<<<<<< HEAD
Route::resource('cats', CatsController::class);
Route::resource('news', NewsController::class);



=======
Route::resource('user', UsersController::class);
Route::resource('news', NewsController::class);
Route::resource('cat', CatsController::class);
>>>>>>> daf04b75fe68b069f9cbbd59f5649a9bc0b25381
