<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('student_id',11)->primary();
            $table->string('department',10);
            $table->string('name',4);
            $table->string('gender',1);
            $table->string('tel',10);
            $table->string('email',50);
            $table->boolean('verified')->default(false);
            $table->float('host_rate_avg')->nullable();
            $table->float('toolman_rate_avg')->nullable();
            $table->string('password',100);
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
