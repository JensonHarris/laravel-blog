<?php

namespace App\Http\Controllers\Home;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    /**
     * @var int  缓存时间
     */
    public $minutes = 30;

    /**
     * Notes : 成功返回
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/4 14:36
     */
    public function success($code,$data = [])
    {
        return response()->json([
            'status'  => true,
            'code'    => $code,
            'message' => config('errorcode.code')[(int) $code],
            'data'    => $data,
        ]);
    }

    /**
     * Notes : 失败返回
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/1/4 14:36
     */
    public function error($code, $data = [])
    {
        return response()->json([
            'status'  => false,
            'code'    => $code,
            'message' => config('errorcode.code')[(int) $code],
            'data'    => $data,
        ]);
    }

}
