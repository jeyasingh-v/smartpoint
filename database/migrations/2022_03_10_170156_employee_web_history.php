<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeeWebHistory extends Migration
{
    public function up()
    {
        Schema::create('employee_web_histories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('emp_id');
            $table->ipAddress('ip_address');
            $table->string('url');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_web_histories');
    }
}
