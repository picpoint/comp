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


Route::get('/', 'HomeController@index')->name('home');
Route::get('/create', 'HomeController@create')->name('posts.create');
Route::post('/', 'HomeController@store')->name('posts.store');
Route::get('/404', function () {
    return view('errors.404');
})->name('404');

Route::get('/pages/about', 'AboutController@about')->name('page.about');
Route::get('/send', 'ContactController@send');




Route::group(['middleware' => 'guest'], function () {
    Route::get('/registration', 'UserController@create')->name('registration.create');
    Route::post('/registration', 'UserController@store')->name('registration.store');
    Route::get('/login', 'UserController@loginForm')->name('login.create');
    Route::post('/login', 'UserController@login')->name('login');

});

Route::get('/logout', 'UserController@logout')->name('logout');

Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', 'Admin\MainController@index')->middleware('admin');
});

