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

Route::get('/', [
    'uses' =>'BlogController@index',
    'as'   =>'Blog',
    ]);

Route::get('/blog/{post}', [
    'uses' =>'BlogController@show',
    'as'   =>'Blog.show',
]);

Route::post('/blog/{post}/comments', [
    'uses' =>'CommentsController@store',
    'as'   =>'Blog.comments',
]);

Route::get('/category/{category}', [
    'uses' => 'BlogController@category',
    'as'   => 'category'
]);

Route::get('/auther/{auther}', [
    'uses' => 'BlogController@auther',
    'as'   => 'auther'
]);
Route::get('/sidebar}', [
    'uses' => 'BlogController@auther',
    'as'   => 'sidebar'
]);

Auth::routes();
Route::get('/home', 'Backend\HomeController@index')->name('home');

Route::get('/edit-account', 'Backend\HomeController@edit');
Route::put('/edit-account', 'Backend\HomeController@update');

Route::get('/edit-password', 'Backend\UsersController@editpassword');
Route::put('/edit-password', 'Backend\UsersController@resetpassword');




Route::get('logout', 'Auth\LoginController@logout');

Route::resource('/backend/blog','Backend\BlogController');
Route::get('/backend/provement','Backend\BackendController@provement');
Route::get('/backend/provementt/{id}','Backend\BackendController@provementt');
Route::resource('/backend/categories','Backend\CategoriesController');
Route::resource('/backend/users','Backend\UsersController');

Route::resource('/backend/users','Backend\UsersController');

