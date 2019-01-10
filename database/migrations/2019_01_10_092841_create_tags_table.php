<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->increments('id')->comment('标签主键');
            $table->string('name', 20)->default('')->comment('标签名');
            $table->timestamps();
        });
        Schema::create('article_tags', function(Blueprint $table){
            $table->integer('article_id')->unsigned()->default(0)->comment('文章id');
            $table->integer('tag_id')->unsigned()->default(0)->comment('标签id');
        });
        DB::statement("ALTER TABLE `tags` comment'标签表'"); // 表注释
        DB::statement("ALTER TABLE `article_tags` comment'标签文章关联表'"); // 表注释

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
    }
}
