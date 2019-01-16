<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;

class CreateArticleCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_comments', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->integer('member_id')->unsigned()->default(0)->comment('评论用户id 关联member表的id');
            $table->boolean('type')->default(1)->comment('1：文章评论');
            $table->integer('pid')->unsigned()->default(0)->comment('父级id');
            $table->integer('article_id')->unsigned()->comment('文章id');
            $table->text('content')->comment('内容');
            $table->boolean('status')->comment('1:已审核 0：未审核');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `article_comments` comment'文章评论表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_comments');
    }
}
