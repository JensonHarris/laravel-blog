<?php

namespace App\Http\Controllers\Admin;


class UploaderController extends Controller
{
    /**
     * Notes : 文章图
     * Author: JesonC <jesoncx@gmail.com>
     * Date  : 2019/5/24 17:13
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadImage()
    {
        $result = uploadFile('editormd-image-file', 'uploads/article/content',800);
        return response()->json($result);
    }

    /**
     * Notes : 文章封面图
     * Author: JesonC <jesoncx@gmail.com>
     * Date  : 2019/5/24 17:13
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadCover()
    {
        $result = uploadFile('file', 'uploads/article/cover', 230);
        return response()->json($result);
    }

    /**
     * Notes : 个人头像
     * Author: JesonC <jesoncx@gmail.com>
     * Date  : 2019/5/24 17:14
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadHeadImg(){

        $result = uploadFile('file', 'uploads/headimages', 150);
        return response()->json($result);
    }
}
