<?php

/**
 * @Author: Jenson Harris
 * @Date:   2018-12-24 22:05:00
 * @Last Modified by:   Jenson Harris
 * @Last Modified time: 2018-12-24 22:39:11
 */

Route::group(['prefix' => 'admin'], function() {

	//登录页面
	Route::get('/login', 'Admin\LoginController@index');
	//登录验证
	Route::post('/login', 'Admin\LoginController@login');
	//退出登录
	Route::get('/logout', 'Admin\LoginController@logout');

	Route::get('/index', 'Admin\IndexController@index');

	Route::get('/charts', 'Admin\ChartController@index');


    //管理员列表页
    Route::get('/user', 'Admin\UserController@index');
    //管理员创建页面
    Route::get('/user/create', 'Admin\UserController@create');
    //管理员创建逻辑
    Route::post('/user', 'Admin\UserController@store');

//    //文章详情页
//    Route::get('/user/{adminUser}', 'Admin\UserController@show');
    //文章编辑
    Route::get('/user/{adminUser}/edit','Admin\UserController@edit');
    //文章编辑逻辑
    Route::post('/user/update/{au_id}', 'Admin\UserController@update');
    //文章删除
    Route::put('/user/destroy', 'Admin\UserController@destroy');

	// 文章列表
	Route::get('/article', 'Admin\ArticleController@index');
	//文章创建页面
	Route::get('/article/create', 'Admin\ArticleController@create');
	//文章创建逻辑
	Route::post('/article', 'Admin\ArticleController@store');
	//文章详情页
	Route::get('/article/{post}', 'Admin\ArticleController@show');
	//文章编辑
	Route::get('/article/{post}/edit','Admin\ArticleController@edit');
	//文章编辑逻辑
	Route::put('/article/{post}', 'Admin\ArticleController@update');
	//文章删除
	Route::put('/article/destroy', 'Admin\ArticleController@destroy');


	// 文章列表
	Route::get('/auth', 'Admin\AuthController@index');
	//文章创建页面
	Route::get('/auth/create', 'Admin\AuthController@create');
	//文章创建逻辑
	Route::post('/auth', 'Admin\AuthController@store');
	//文章详情页
	Route::get('/auth/{post}', 'Admin\AuthController@show');
	//文章编辑
	Route::get('/auth/{post}/edit','Admin\AuthController@edit');
	//文章编辑逻辑
	Route::put('/auth/{post}', 'Admin\AuthController@update');
	//文章删除
	Route::put('/auth/destroy', 'Admin\AuthController@destroy');



	// 用户组列表
	Route::get('/role', 'Admin\RoleController@index');
	//文章创建页面
	Route::get('/role/create', 'Admin\RoleController@create');
	//文章创建逻辑
	Route::post('/role', 'Admin\RoleController@store');
	//文章详情页
	Route::get('/role/{post}', 'Admin\RoleController@show');
	//文章编辑
	Route::get('/role/{post}/edit','Admin\RoleController@edit');
	//文章编辑逻辑
	Route::put('/role/{post}', 'Admin\RoleController@update');
	//文章删除
	Route::put('/role/destroy', 'Admin\RoleController@destroy');


	//  会员列表
	Route::get('/member', 'Admin\MemberController@index');
	//文章创建页面
	Route::get('/member/create', 'Admin\MemberController@create');
	//文章创建逻辑
	Route::post('/member', 'Admin\MemberController@store');
	//文章详情页
	Route::get('/member/{post}', 'Admin\MemberController@show');
	//文章编辑
	Route::get('/member/{post}/edit','Admin\MemberController@edit');
	//文章编辑逻辑
	Route::put('/member/{post}', 'Admin\MemberController@update');
	//文章删除
	Route::put('/member/destroy', 'Admin\MemberController@destroy');




	//  文章分类列表
	Route::get('/category', 'Admin\CategoryController@index');
	//文章创建页面
	Route::get('/category/create', 'Admin\CategoryController@create');
	//文章创建逻辑
	Route::post('/category', 'Admin\CategoryController@store');
	//文章详情页
	Route::get('/category/{post}', 'Admin\CategoryController@show');
	//文章编辑
	Route::get('/category/{post}/edit','Admin\CategoryController@edit');
	//文章编辑逻辑
	Route::put('/category/{post}', 'Admin\CategoryController@update');
	//文章删除
	Route::put('/category/destroy', 'Admin\CategoryController@destroy');


	//  标签列表
	Route::get('/tag', 'Admin\TagController@index');
	//文章创建页面
	Route::get('/tag/create', 'Admin\TagController@create');
	//文章创建逻辑
	Route::post('/tag', 'Admin\TagController@store');
	//文章详情页
	Route::get('/tag/{post}', 'Admin\TagController@show');
	//文章编辑
	Route::get('/tag/{post}/edit','Admin\TagController@edit');
	//文章编辑逻辑
	Route::put('/tag/{post}', 'Admin\TagController@update');
	//文章删除
	Route::put('/tag/destroy', 'Admin\TagController@destroy');


	//  评论列表
	Route::get('/ccomment', 'Admin\CommentController@index');

});

