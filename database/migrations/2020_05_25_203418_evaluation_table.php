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
            $table->unsignedBigInteger('Tasks_id')->primary()->unique();
            $table->foreign('Tasks_id')->references('Tasks_id')->on('tasks')->onDelete('cascade');;
            $table->integer('Toolman_Rate')->nullable();
            $table->integer('Host_Rate')->nullable();
            $table->string('Toolman_Comment')->nullable();
            $table->string('Host_Comment')->nullable();
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
