<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ar_id')->comment('发布者ID');
            $table->boolean('level')->default(0)->comment('公告等级：0 普通 1 一级 2 二级 3 三级');
            $table->boolean('type')->default(0)->comment('公告类型：0 后台 1 前台');
            $table->string('content')->default('')->comment('公告内容');
<<<<<<< HEAD
            $table->boolean('is_top')->default(0)->comment('是否置顶 0是 1否');
=======
>>>>>>> e5481069684ba31a79e5080c6ecaa6f003df76cf
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `notices` comment'网站公告表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notices');
    }
}
