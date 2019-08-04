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

//Navigation Routes
Route::get('/home', function () {
    return view('home');
})->name('home');



Route::get('/post', function () {
    return view('post');
})->name('post')->middleware('auth');

// Route::get('/profile', function () {
//     return view('profile');
// })->name('profile');

//Login - Register - Logout Routes
Route::post('/login', 'UserController@login')->name('login');
Route::post('/register', 'UserController@register')->name('register');
Route::get('/logout', 'UserController@logout')->name('logout')->middleware('auth');

//Post tweet route
Route::post('/save_post', 'PostController@savePost')->name('save_post')->middleware('auth');

//Profile page route
Route::get('/profile/{username}', 'UserController@profileInfo')->name('profile')->middleware('auth');

//Follow - Unfollow URL
Route::post('/follow','FollowController@followUser')->name('follow')->middleware('auth');
Route::post('/unfollow','FollowController@unfollowUser')->name('unfollow')->middleware('auth');

//Timeline Route
Route::get('/timeline', 'UserController@timeline')->name('timeline')->middleware('auth');

//Users List page route
Route::get('/list/{page_id}', 'UserController@usersList')->name('list')->middleware('auth');

//Profile Image Upload route
Route::post('/avatar','UserController@avatar')->name('avatar')->middleware('auth');

