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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::post('user/register', 'APIRegisterController@Register');
Route::post('user/login', 'APILoginController@Login');
Route::post('user/me', 'APIMeController@me');
Route::post('user/logout', 'APIlogoutController@logout');

Route::resource('massges', 'massageController');



Route::middleware('jwt.auth')->get('/user', function (Request $request) {
    return auth()->user();
});



Route::middleware('jwt.auth')->group(function () {

    Route::resource('books', 'API\BookController');

    Route::resource('comments', 'API\commentsController');



    Route::resource('posts', 'API\postsController');



});



Route::resource('members', 'API\userController');

Route::get('/simple', function (Request $request) {
    return "this the simple api ";
});


