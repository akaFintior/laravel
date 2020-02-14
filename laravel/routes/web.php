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

Route::get('/', 'HomeController@index')->name('index');

Route::group(
    [
        'prefix' => 'news',
        'as' => 'news.'
    ], function () {
    Route::get('/all', 'NewsController@news')->name('all');
    Route::get('/one/{id}', 'NewsController@newsOne')->name('one');
    Route::get('/categories', 'NewsController@categories')->name('categories');
    Route::get('/category/{id}', 'NewsController@categoryNews')->name('categoryId');
    Route::get('/add', 'NewsController@addNews')->name('addNews');
}
);

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.'
], function () {
    Route::get('/index', 'IndexController@index')->name('admin');
    Route::get('/test1', 'IndexController@test1')->name('test1');
    Route::get('/test2', 'IndexController@test2')->name('test2');
});