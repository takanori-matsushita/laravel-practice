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
Route::resource('users', 'UsersController')->except(['create', 'store']);
Route::get('/signup', 'Auth\RegisterController@showRegistrationForm')->name('users.signup');
Route::get('/users/{user}/following', 'UsersController@following')->name('users.following');
Route::get('/users/{user}/followers', 'UsersController@followers')->name('users.followers');
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth'], function () {
  Route::resource('microposts', 'MicropostController',)->only(['store', 'destroy']);
  Route::resource('relationships', 'RelationshipController')->only(['store', 'destroy']);
});
Auth::routes();
