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


//首页
 Route::get('/', 'Home\IndexController@index');
//文章详情页
 Route::get('/article', 'Home\ArticleController@index');


include_once ('admin.php');