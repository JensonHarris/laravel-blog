<?php

/**
 * @Author: Jenson Harris
 * @Date:   2018-12-24 22:05:00
 * @Last Modified by:   Jenson Harris
 * @Last Modified time: 2019-01-31 17:49:09
 */

//登录模块
Route::group(['prefix' => 'admin'], function() {
    Route::group(['prefix' => 'login'], function() {
        //登录页面
        Route::get('', 'Admin\LoginController@index');
        //登录验证
        Route::post('', 'Admin\LoginController@login');

    });
});

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');


//权限控制开启
Route::group(['prefix' => 'admin','middleware' => ['check.login', 'admin.auth', 'history']], function() {

//后台模块
//Route::group(['prefix' => 'admin','middleware' => ['check.login', 'history']], function() {

    Route::get('/index', 'Admin\IndexController@index');

    Route::get('/profile', 'Admin\IndexController@profile');

    Route::get('/clear', 'Admin\IndexController@clear');
    //修改完个人信息
    Route::post('/updateUser/{au_id}', 'Admin\IndexController@updateUser');
    //退出登录
    Route::get('/logout', 'Admin\LoginController@logout');

    Route::get('/charts', 'Admin\ChartController@index');



    //---------管理员列表页-------------------------------
    Route::group(['prefix' => 'user'], function() {
        Route::get('', 'Admin\UserController@index');
        //管理员列表数据
        Route::get('/jsonData', 'Admin\UserController@jsonData');
        //管理员创建页面
        Route::get('/create', 'Admin\UserController@create');
        //管理员创建逻辑
        Route::post('', 'Admin\UserController@store');
        //管理员编辑
        Route::get('/{adminUser}/edit', 'Admin\UserController@edit');
        //管理员编辑逻辑
        Route::post('/update/{au_id}', 'Admin\UserController@update');
        //管理员删除
        Route::post('/destroy', 'Admin\UserController@destroy');
        //用户状态
        Route::post('/changeStatus', 'Admin\UserController@changeStatus');
    });


    //---------权限列表-------------------------------
    Route::group(['prefix' => 'permission'], function() {
        Route::get('', 'Admin\PermissionController@index');
        //权限数据
        Route::get('/jsonData', 'Admin\PermissionController@jsonData');
        //权限创建页面
        Route::get('/create', 'Admin\PermissionController@create');
        //权限创建逻辑
        Route::post('', 'Admin\PermissionController@store');
        //权限编辑
        Route::get('/{adminPermission}/edit', 'Admin\PermissionController@edit');
        //权限编辑逻辑
        Route::post('/update/{ap_id}', 'Admin\PermissionController@update');
        //权限删除
        Route::post('/destroy', 'Admin\PermissionController@destroy');
    });


    Route::group(['prefix' => 'article'], function() {
        //---------文章列表-------------------------------
        Route::get('', 'Admin\ArticleController@index');
        //文章数据
        Route::get('/jsonData', 'Admin\ArticleController@jsonData');
        //文章创建页面
        Route::get('/create', 'Admin\ArticleController@create');
        //文章创建逻辑
        Route::post('', 'Admin\ArticleController@store');
        //文章编辑
        Route::get('/{article}/edit', 'Admin\ArticleController@edit');
        //文章编辑逻辑
        Route::post('/update/{id}', 'Admin\ArticleController@update');
        //文章删除
        Route::put('/destroy', 'Admin\ArticleController@destroy');
         //是否置顶
        Route::post('/changeTopStatue', 'Admin\ArticleController@changeTopStatue');
    });


    Route::group(['prefix' => 'role'], function() {
        //---------角色列表-------------------------------
        Route::get('', 'Admin\RoleController@index');
        //角色数据
        Route::get('/jsonData', 'Admin\RoleController@jsonData');
        //角色创建页面
        Route::get('/create', 'Admin\RoleController@create');
        //权限数据
        Route::post('/create', 'Admin\RoleController@create');
        //角色创建逻辑
        Route::post('', 'Admin\RoleController@store');
        //角色编辑
        Route::get('/{adminRole}/edit', 'Admin\RoleController@edit');
        //权限数据
        Route::post('/{adminRole}/edit', 'Admin\RoleController@edit');
        //角色编辑逻辑
        Route::post('/update/{ar_id}', 'Admin\RoleController@update');
        //角色删除
        Route::post('/destroy', 'Admin\RoleController@destroy');
        //角色状态
        Route::post('/changeStatus', 'Admin\RoleController@changeStatus');
    });


    Route::group(['prefix' => 'member'], function() {
        //---------会员列表-------------------------------
        Route::get('', 'Admin\MemberController@index');
        //会员创建页面
        Route::get('/create', 'Admin\MemberController@create');
        //会员创建逻辑
        Route::post('', 'Admin\MemberController@store');
        //会员详情页
        Route::get('/{post}', 'Admin\MemberController@show');
        //会员编辑
        Route::get('/{post}/edit', 'Admin\MemberController@edit');
        //会员编辑逻辑
        Route::put('/{post}', 'Admin\MemberController@update');
        //会员删除
        Route::put('/destroy', 'Admin\MemberController@destroy');
    });


    Route::group(['prefix' => 'category'], function() {
        //---------文章分类列表-------------------------------
        Route::get('', 'Admin\CategoryController@index');
        //文章分类数据
        Route::get('/jsonData', 'Admin\CategoryController@jsonData');
        //文章分类创建页面
        Route::get('/create', 'Admin\CategoryController@create');
        //文章创建逻辑
        Route::post('', 'Admin\CategoryController@store');
        //文章分类编辑
        Route::get('/{articleCategory}/edit', 'Admin\CategoryController@edit');
        //文章编辑逻辑
        Route::post('/update/{id}', 'Admin\CategoryController@update');
        //文章删除
        Route::post('/destroy', 'Admin\CategoryController@destroy');
        //前端导航
        Route::post('/navStatus', 'Admin\CategoryController@navStatus');
    });


    Route::group(['prefix' => 'tag'], function() {
        //---------标签列表-------------------------------
        Route::get('', 'Admin\TagController@index');
        //标签数据
        Route::get('/jsonData', 'Admin\TagController@jsonData');
        //标签创建页面
        Route::get('/create', 'Admin\TagController@create');
        //标签创建逻辑
        Route::post('', 'Admin\TagController@store');
        //标签编辑
        Route::get('/{tag}/edit', 'Admin\TagController@edit');
        //标签编辑逻辑
        Route::post('/update/{id}', 'Admin\TagController@update');
        //标签删除
        Route::post('/destroy', 'Admin\TagController@destroy');
    });

	//  评论列表
    Route::group(['prefix' => 'comment'], function() {
        //评论列表
        Route::get('', 'Admin\CommentController@index');
        //评论数据
        Route::get('/jsonData', 'Admin\CommentController@jsonData');
        //审核评论
        Route::post('/changeStatus', 'Admin\CommentController@changeStatus');
    });

    //  评论列表
    Route::group(['prefix' => 'notice'], function() {
        //评论列表
        Route::get('', 'Admin\NoticeController@index');
        //公告数据
        Route::get('/jsonData', 'Admin\NoticeController@jsonData');
        //公告建页面
        Route::get('/create', 'Admin\NoticeController@create');
        //创建公告逻辑
        Route::post('', 'Admin\NoticeController@store');
        //公告编辑
        Route::get('/{notice}/edit', 'Admin\NoticeController@edit');
        //标签编辑逻辑
        Route::post('/update/{id}', 'Admin\NoticeController@update');
        //会员删除
        Route::post('/destroy', 'Admin\NoticeController@destroy');
    });

    //---------管理员列表页-------------------------------
    Route::group(['prefix' => 'notice'], function() {
        Route::get('', 'Admin\NoticeController@index');
//        //管理员列表数据
//        Route::get('/jsonData', 'Admin\UserController@jsonData');
//        //管理员创建页面
//        Route::get('/create', 'Admin\UserController@create');
//        //管理员创建逻辑
//        Route::post('', 'Admin\UserController@store');
//        //管理员编辑
//        Route::get('/{adminUser}/edit', 'Admin\UserController@edit');
//        //管理员编辑逻辑
//        Route::post('/update/{au_id}', 'Admin\UserController@update');
//        //管理员删除
//        Route::post('/destroy', 'Admin\UserController@destroy');
//        //用户状态
//        Route::post('/changeStatus', 'Admin\UserController@changeStatus');
    });

    //  上传
    Route::group(['prefix' => 'upload'], function() {
        Route::post('', 'Admin\UploaderController@uploadImage');
        Route::post('/cover', 'Admin\UploaderController@uploadCover');

    });

});

