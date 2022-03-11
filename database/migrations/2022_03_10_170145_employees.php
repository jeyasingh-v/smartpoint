<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Employees extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('emp_id');
            $table->string('emp_name');
            $table->ipAddress('ip_address');
            $table->softDeletes();
            $table->timestamps();
            $table->unique('emp_id'); 
            $table->unique('ip_address');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
