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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/show', 'HomeController@viewAll')->name('view-all');
Route::get('/converter', 'HomeController@unitConverter')->name('converter');
Route::get('/converters', 'HomeController@converter')->name('converters');
Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/api', 'HomeController@api')->name('posts.api');
