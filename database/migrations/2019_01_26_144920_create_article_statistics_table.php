<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_statistics', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->unsignedInteger('article_id')->comment('文章ID');
            $table->integer('views')->unsigned()->default(0)->comment('文章浏览次数');
            $table->integer('likes')->unsigned()->default(0)->comment('文章点赞次数');
        });
          DB::statement("ALTER TABLE `article_statistics` comment'文章统计表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_statistics');
    }
}
