<?php

namespace App\Http\Controllers\Admin;


class UploaderController extends Controller
{
    public function uploadImage()
    {
        $result = uploadFile('editormd-image-file', 'uploads/article/content');
        return response()->json($result);
    }

    public function uploadCover()
    {
        $result = uploadFile('file', 'uploads/article/cover');
        return response()->json($result);
    }
}
