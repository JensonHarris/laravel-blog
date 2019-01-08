<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders = factory(\App\Models\AdminUser::class,1)->make();
        \App\models\AdminUser::insert($orders->toArray());
    }
}
