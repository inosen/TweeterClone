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

Route::get('/timeline', function () {
    return view('timeline');
})->name('timeline');

Route::get('/post', function () {
    return view('post');
})->name('post');

// Route::get('/profile', function () {
//     return view('profile');
// })->name('profile');

Route::get('/list', function () {
    return view('list');
})->name('list');

//Login - Register - Logout Routes
Route::post('/login', 'UserController@login')->name('login');
Route::post('/register', 'UserController@register')->name('register');
Route::get('/logout', 'UserController@logout')->name('logout');

//Post tweet route
Route::post('/save_post', 'PostController@savePost')->name('save_post');

//Profile page route
Route::get('/profile/{username}', 'UserController@profileInfo')->name('profile');

