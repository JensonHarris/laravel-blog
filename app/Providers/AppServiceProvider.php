<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        //$username = session('username');
        //视图间共享数据
        //View::share('username', 'value-共享数据');
        DB::listen(function ($query) {
            $sql = $query->sql;
            $bindings = $query->bindings;
            $time = $query->time;
            $filepath = storage_path('logs\sql.log');
            //写入sql
            if ($bindings) {
                file_put_contents( $filepath, "[" . date("Y-m-d H:i:s") . "]" . $sql .' 耗时:'.$time.'ms'. "\r\nparmars:" . json_encode($bindings, 320) . "\r\n\r\n", FILE_APPEND);
            } else {
                file_put_contents( $filepath, "[" . date("Y-m-d H:i:s") . "]" . $sql .' 耗时:'.$time.'ms'. "\r\n\r\n", FILE_APPEND);
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
