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

Route::get('/', 'StaticPagesController@home')->name('root');
Route::get('static_pages/help', 'StaticPagesController@help')->name('help');
Route::get('static_pages/about', 'StaticPagesController@about')->name('about');
Route::get('static_pages/contact', 'StaticPagesController@contact')->name('contact');

Route::get('users/signup', 'UsersController@new')->name('users.signup');
