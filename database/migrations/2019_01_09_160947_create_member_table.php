<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id')->comment('会员ID');
            $table->string('name',32)->default('')->comment('会员登录账户');
            $table->string('realname',32)->default('')->comment('会员姓名');
            $table->string('mobile', 20)->default('')->comment('会员手机号');
            $table->string('email')->default('')->comment('会员员邮箱');
            $table->tinyInteger('status')->default(0)->comment('用户状态：0启用 1禁用');
            $table->string('password',64)->comment('会员密码');
            $table->string('headimgurl')->default('')->comment('会员头像');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes()->comment('软删除');
            $table->engine = 'InnoDB';
            $table->comment = '会员表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
