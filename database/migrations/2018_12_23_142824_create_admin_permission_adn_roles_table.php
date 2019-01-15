<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminPermissionAdnRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //用户角色表
        Schema::create("admin_roles", function(Blueprint $table){
           $table->increments('ar_id')->comment('角色ID');
           $table->string('ar_name',20)->default('')->comment('角色名');
           $table->tinyInteger('ar_status')->default(0)->comment('角色状态：0启用 1禁用');
           $table->string('ar_description')->default('')->comment('角色介绍');
           $table->timestamps();
        });
        DB::statement("ALTER TABLE `admin_roles` comment'角色表'"); // 表注释

        //用户权限表
        Schema::create("admin_permissions", function(Blueprint $table){
            $table->increments('ap_id')->comment('权限ID');
            $table->unsignedInteger('ap_pid')->default(0)->comment('父权限ID');
            $table->string('ap_name',20)->default('')->comment('权限名');
            $table->string('ap_control',20)->default('')->comment('控制器名');
            $table->string('ap_action',20)->default('')->comment('方法名');
            $table->string('method',20)->default('')->comment('请求方式');
            $table->string('ap_url',32)->default('')->comment('URL');
            $table->string('ap_icon',32)->default('')->comment('权限图标');
            $table->string('ap_description')->default('')->comment('权限介绍');;
            $table->timestamps();
        });
        DB::statement("ALTER TABLE `admin_permissions` comment'权限表'"); // 表注释

        //权限-角色关联表
        Schema::create("admin_permission_role", function(Blueprint $table){
            $table->unsignedInteger("ar_id")->default(0)->comment('角色ID');
            $table->unsignedInteger("ap_id")->default(0)->comment('权限ID');

            $table->foreign('ap_id')
                ->references('ap_id')
                ->on('admin_permissions')
                ->onDelete('cascade');

            $table->foreign('ar_id')
                ->references('ar_id')
                ->on('admin_roles')
                ->onDelete('cascade');

            $table->primary(['ap_id', 'ar_id']);
        });
        DB::statement("ALTER TABLE `admin_permission_role` comment'权限-角色关联表'"); // 表注释

        //角色-用户关联表
        Schema::create("admin_role_user", function(Blueprint $table){
            $table->unsignedInteger("ar_id")->default(0)->comment('角色ID');
            $table->unsignedInteger("au_id")->default(0)->comment('管理员ID');

            $table->foreign('au_id')
                ->references('au_id')
                ->on('admin_users')
                ->onDelete('cascade');

            $table->foreign('ar_id')
                ->references('ar_id')
                ->on('admin_roles')
                ->onDelete('cascade');
            $table->primary(['ar_id', 'au_id']);
        });
        DB::statement("ALTER TABLE `admin_role_user` comment'角色-用户关联表'"); // 表注释

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admin_roles');
        Schema::drop('admin_permissions');
        Schema::drop('admin_permission_role');
        Schema::drop('admin_role_user');
    }
}






