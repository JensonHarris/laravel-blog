<?php

return [

    /*
    |--------------------------------------------------------------------------
    | customized http code
    |--------------------------------------------------------------------------
    |
    | The first number is errors type, the second and third number is
    | product type, and it is a specific errors code from fourth to
    | sixth.But the success is different.
    |
    */

    'code' => [
        200   => '成功',
        20001 =>'登录成功',
        20002 =>'添加成功',
        20003 =>'删除成功',
        20004 =>'编辑成功',
        20005 =>'操作成功',
        20006 =>'点赞成功',
        20007 =>'留言成功等待审核',

        40001 =>'用户名或密码错误',
        40011 =>'该用户已被禁用',
        40002 =>'添加失败',
        40003 =>'删除失败',
        40004 =>'编辑失败',
        40005 =>'操作失败',
        40006 =>'网络繁忙,稍后再试!',
        40013 =>'删除失败,该数据有子数据',
        40023 =>'删除失败,该角色有用户',
        40033 =>'删除失败,该标签有文章',
        40043 =>'删除失败,该分类有文章',
    ],

];
