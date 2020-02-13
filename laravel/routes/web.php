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

Route::get('/', 'HomeController@index')->name('home');

Route::get('/news', 'NewsController@categories')->name('news');
Route::get('/news/{category}', 'NewsController@categoryNews')->name('categNews');
Route::get('/news/{category}/{id}', 'NewsController@newsOne')->name('newsOne');

Route::get('/admin', 'Admin\IndexController@index')->name('admin');
