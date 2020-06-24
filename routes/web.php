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
//route for home page
Route::get('/', function () {
    return view('welcome');
});


// Route::get('/user', function () {
//     return view('user');
// });


// Route::get('/testi', function () {
//     return view('testi');
// });



// Route for vue page : single page application
Route::get('vue/{any}', function () {
         return view('vue.index');
       })->where('any', '.*');


//route for auth
Auth::routes();
//route for home page
Route::get('/home', 'HomeController@index')->name('home');

//route for posts resource
Route::resource('posts', 'postsController');
//route for comments resource
Route::resource('comments', 'commentsController');

//route for test page
Route::get('test', function () {
    return view('test');
});

Auth::routes();

Route::auth();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['isadmin']] ,function () {
//route prifix group adminController resource
    Route::prefix('admin')->group(function () {
        //route for useradmincontroller resource
        Route::resource('users', 'adminController');
        //route for postadmindashController resource
        Route::resource('postadmin', 'postadminController');

//route for admin page
        Route::get('/', 'dashController@index');
        //route for posts admin page
        Route::get('post', function () {
            return view('admin.post');
        });
        //route for change password admin
        Route::get('changepassword', function () {
            return view('admin.changepassword');
        });


    });

});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//route for 403
Route::get('403', function () {
    return view('403');
});

Route::get('profile/{id}', 'profilController@index')->name('profile.index');



Route::get('b4test', function () {
    return view('b4test');
});




Route::resource('/chats', 'ChatController');


