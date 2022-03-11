<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'emp_id', 'emp_name', 'ip_address',
    ];

    protected $dates = ['deleted_at'];

    function urls(){
        return $this->hasMany('App\Models\EmployeeWebHistory','emp_id', 'emp_id'); 
    }
}
