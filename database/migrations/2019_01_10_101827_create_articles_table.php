<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id')->comment('文章表主键');
            $table->boolean('category_id')->default(0)->comment('分类id');
            $table->string('title')->default('')->comment('标题');
            $table->string('author')->default('')->comment('作者');
            $table->string('description')->default('')->comment('描述');
            $table->string('keywords')->default('')->comment('关键词');
            $table->string('cover_map')->default('')->comment('封面图');
            $table->boolean('is_top')->default(0)->comment('是否置顶 0是 1否');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `articles` comment'文章表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
