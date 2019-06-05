<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ArticleComment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.comment.index');
    }

    public function jsonData(Request $request, ArticleComment $articleComment)
    {
        $limit = $request->input('limit','10');
        $comments  = $articleComment->comments($limit);
        return $this->success('200',$comments);
    }

    /**
     * Notes : 文章留言审核
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/2/18 16:04
     */
    public function changeStatus(Request $request){
        $comment =  $request->input();
        $result =  ArticleComment::where(['id'=>$comment['id']])->update($comment);
        if ($result){
            return $this->success(20005);
        }
        return $this->error(40005);
    }


    /**
     * Notes : 删除留言
     * Author: JesonC <748532271@qq.com>
     * Date  : 2019/2/18 16:20
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        $comment = ArticleComment::find($id);
        $result = $comment->delete();
        if ($result) {
            return $this->success(20003);
        }
        return $this->error(40003);
    }
}
