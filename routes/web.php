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

Route::get('/', 'IndexController@index');
Route::get('/art/{id}', 'IndexController@show');
Route::post('/search', 'IndexController@search');
Route::get('/cate/{id}', 'IndexController@cate_article');
Route::post('/comment', 'IndexController@comment');

Route::get('/sinalogin', 'SinaLoginController@login');
Route::get('/callback', 'SinaLoginController@callback');



Route::group(['middleware'=>['auth'],'prefix'=>'admin','namespace'=>'Admin'],function(){
    Route::get('/','IndexController@index');
    Route::resource('article','ArticleController');
    Route::resource('tag','TagController');
    Route::resource('category','CategoryController');
    Route::resource('comment','CommentController');
});
Route::get('logout','Auth\LoginController@logout');
Auth::routes();



//Route::get('/home', 'HomeController@index');
