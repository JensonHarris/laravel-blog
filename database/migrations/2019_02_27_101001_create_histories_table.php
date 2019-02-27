<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('histories', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->integer('user_id')->unsigned()->default(0)->comment('操作用户ID');
            $table->integer('ip')->unsigned()->default(0)->comment('ip');
            $table->string('path',60)->comment('访问路径');
            $table->string('query')->default('')->comment('请求数据');
            $table->string('method',20)->default('')->comment('请求方式');
            $table->string('platform',32)->default('')->comment('请求系统类型');
            $table->string('browser',32)->default('')->comment('浏览器类型');
            $table->string('referer')->default('')->comment('访问来源');
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `histories` comment'操作历史表'"); // 表注释

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories');
    }
}
