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
            $table->unsignedBigInteger('tasks_id')->unsigned();
            $table->foreign('tasks_id')->references('tasks_id')->on('tasks');
            $table->string('host_id');
            $table->foreign('host_id')->references('student_id')->on('tasks');
            $table->string('toolman_id');
            $table->foreign('toolman_id')->references('toolman_id')->on('tasks');
            $table->float('toolman_evaluation');
            $table->float('host_evaluation');
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
