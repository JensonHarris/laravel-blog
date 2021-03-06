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


Route::group(['prefix' => 'article'], function() {
    //文章详情页
    Route::get('/{article}', 'Home\ArticleController@index');

    Route::get('/category/{id}', 'Home\ArticleController@categoryArticles');

    Route::get('/tag/{tag}', 'Home\ArticleController@tagArticles');

    Route::post('/articleLike', 'Home\ArticleController@articleLike');

    Route::post('/articleViews', 'Home\ArticleController@articleViews');

    Route::post('/comment', 'Home\ArticleController@comment');




});



Route::post('/search', 'Home\ArticleController@search');

include_once ('admin.php');
