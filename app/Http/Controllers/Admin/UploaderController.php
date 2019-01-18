<?php

namespace App\Http\Controllers\Admin;


class UploaderController extends Controller
{
    public function uploadImage()
    {
        $result = uploadFile('editormd-image-file', 'uploads/article');
        return response()->json($result);
    }
}
