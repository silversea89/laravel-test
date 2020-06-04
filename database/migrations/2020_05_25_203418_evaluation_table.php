<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EvaluationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation', function (Blueprint $table) {
            $table->unsignedBigInteger('tasks_id')->primary()->unique();
            $table->foreign('tasks_id')->references('tasks_id')->on('tasks');
            $table->integer('toolman_rate')->nullable();
            $table->integer('host_rate')->nullable();
            $table->string('toolman_comment')->nullable();
            $table->string('host_comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluation');
    }
}
