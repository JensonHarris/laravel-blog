<?php

namespace App\Models;


class AdminPermissionRole extends Model
{
        protected $table = "admin_permission_role";

    protected $fillable = ['ar_id', 'ap_id'];

    public $timestamps = false;



}
