<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTask extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id('tasks_id');
            $table->string('student_id');
            $table->foreign('student_id')->references('student_id')->on('users');
            $table->string('toolman_id')->nullable();
            $table->foreign('toolman_id')->references('student_id')->on('users');
            $table->string('Classification');
            $table->string('Title');
            $table->dateTime('DateTime');
            $table->dateTime('DeadDateTime');
            $table->string('BuyAddress');
            $table->string('MeetAddress');
            $table->integer('Pay');
            $table->string('content');
            //Selectable,processing,complete
            $table->string('Status')->default("Selectable");
            //go,back,arrive,complete
            $table->string('Progress')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
