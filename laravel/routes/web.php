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

Auth::routes();

Route::get('/', 'HomeController@index')->name('index');

Route::group(
    [
        'prefix' => 'news',
        'as' => 'news.'
    ], function () {
        Route::get('/all', 'NewsController@news')->name('all');
        Route::get('/one/{news}', 'NewsController@newsOne')->name('one');
        Route::get('/categories', 'NewsController@categories')->name('categories');
        Route::get('/category/{id}', 'NewsController@categoryNews')->name('categoryId');
}
);
Route::match(['post','get'], '/profile', 'Admin\ProfileController@update')->name('updateProfile')->middleware('auth');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'is_admin']
], function () {
    Route::match(['post', 'get'], '/users/{id?}', 'ProfileController@adminConf')->name('adminConf');

    Route::get('/parser', 'ParserController@index')->name('parser');
    Route::get('/index', 'NewsController@all')->name('admin');
    Route::get('/addNews', 'NewsController@addNews')->name('addNews');
    Route::post('/addNews', 'NewsController@addNews')->name('addNews')->middleware('validator:App\News');
    Route::get('/updateNews{news}', 'NewsController@update')->name('updateNews');
    Route::post('/saveNews{news}', 'NewsController@save')->name('saveNews')->middleware('validator:App\News');
    Route::get('/deleteNews{news}', 'NewsController@delete')->name('deleteNews');

    Route::get('/test1', 'IndexController@test1')->name('test1');
    Route::get('/test2', 'IndexController@test2')->name('test2');

    Route::resource('categories', 'CategoryController');
});

Route::get('/auth/vk', [
    'uses' => 'LoginController@loginVK',
    'as' => 'vkLogin'
]);
Route::get('/auth/vk/response', [
    'uses' => 'LoginController@responseVK',
    'as' => 'vkResponse'
]);

Route::get('/auth/google', [
    'uses' => 'LoginController@loginGoogle',
    'as' => 'googleLogin'
]);
Route::get('/auth/google/response', [
    'uses' => 'LoginController@responseGoogle',
    'as' => 'googleResponse'
]);

Route::match(['post', 'get'], '/contact', 'ContactController@contact')->name('contact');

Route::resource('resources', 'ResourceController');

