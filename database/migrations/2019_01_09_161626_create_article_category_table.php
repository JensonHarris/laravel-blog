<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_category', function (Blueprint $table) {
            $table->increments('id')->comment('文章分类ID');
            $table->string('name')->comment('文章分类名');
            $table->unsignedSmallInteger('parent_id')->comment('父级分类ID');
            $table->string('seo_title')->default('')->comment('SEO标题');
            $table->string('seo_keywords')->default('')->comment('SEO关键字');
            $table->string('seo_desc')->default('')->comment('SEO描述');
            $table->tinyInteger('is_nav')->default(0)->comment('是否为导航：0是 1否');
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->comment = '文章分类表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_category');
    }
}
