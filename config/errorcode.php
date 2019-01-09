<?php

return [

    /*
    |--------------------------------------------------------------------------
    | customized http code
    |--------------------------------------------------------------------------
    |
    | The first number is error type, the second and third number is
    | product type, and it is a specific error code from fourth to
    | sixth.But the success is different.
    |
    */

    'code' => [
        200   => '成功',
        20001 =>'登录成功',
        20002 =>'添加成功',
        20003 =>'删除成功',
        20004 =>'编辑成功',

        40001 =>'用户名或密码错误',
        40002 =>'添加失败',
        40003 =>'删除失败',
        40004 =>'编辑失败',

    ],

];
