<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\RegistersUsers;
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
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');
Route::get('/contact', 'StaticPagesController@contact')->name('contact');
Route::resource('users', 'UsersController');
Route::get('/signup', 'Auth\RegisterController@showRegistrationForm')->name('users.signup');
Route::post('/users', 'Auth\RegisterController@register')->name('users.create');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/flash', 'HomeController@flash')->name('flash');


Auth::routes();
