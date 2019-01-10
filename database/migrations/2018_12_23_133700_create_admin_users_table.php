<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('admin_users', function (Blueprint $table) {
            $table->increments('au_id')->comment('管理员ID');
            $table->string('au_name',32)->default('')->comment('管理员登录账户');
            $table->string('au_realname',32)->default('')->comment('管理员姓名');
            $table->string('au_mobile', 20)->default('')->comment('管理员手机号');
            $table->string('au_email')->default('')->comment('管理员邮箱');
            $table->boolean('au_status')->default(0)->comment('用户状态：0启用 1禁用');
            $table->string('password',64)->comment('管理员密码');
            $table->string('headimgurl')->default('')->comment('管理员头像');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes()->comment('软删除');
            $table->engine = 'InnoDB';
            $table->comment = '管理员用户表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_users');
    }
}
