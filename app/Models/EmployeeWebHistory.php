<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeWebHistory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'emp_id','ip_address', 'url'
    ];

    protected $dates = ['deleted_at'];
}
