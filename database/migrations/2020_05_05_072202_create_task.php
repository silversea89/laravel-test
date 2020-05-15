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
            $table->string('Classification');
            $table->string('Title');
            $table->dateTime('DateTime');
            $table->string('BuyAddress');
            $table->string('MeetAddress');
            $table->integer('Pay');
            $table->string('content')->nullable();;
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
