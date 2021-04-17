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
Route::get('/data-table', 'HomeController@dataTable')->name('data-table');
Route::get('/posts', 'PostController@index')->name('posts.index');
Route::view('/todos', 'todos.index')->name('todos.index');
Route::view('unit-converter', 'unit-converter.index')->name('unit-converter.index');
