<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\ArticleContent;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\Article\Store;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.article.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags      = Tag::all();
        $categoryData = ArticleCategory::all();
        $categorys    =  arrayLevel($categoryData,'id','parent_id');
        return view('admin.article.create',compact('tags','categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request,Article $article)
    {
        $articlesData  = $request->input();
        $tagIds        =  array_pull($articlesData, 'tag_ids');
        $markdown      =  array_pull($articlesData,'markdown');

        DB::beginTransaction();
        try {
            $articleResult = $article->create($articlesData);

            $contentDate = [
                'article_id' => $articleResult->id,
                'markdown' => $markdown
            ];
            $content = ArticleContent::create($contentDate);

            $tags = [];
            foreach ($tagIds as $tag => $key) {
                $tags[$key]['tag_id'] = $tag;
                $tags[$key]['article_id'] = $articleResult->id;
            }
            $tag = ArticleTag::insert($tags);
            DB::commit();
            return $this->success(20002);
        } catch (\Exception $e){
            DB::rollBack();
            return $this->error(40002);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        $tags      = Tag::all();
        $categoryData = ArticleCategory::all();
        $categorys    =  arrayLevel($categoryData,'id','parent_id');
        return view('admin.article.edit',compact('article','tags','categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
