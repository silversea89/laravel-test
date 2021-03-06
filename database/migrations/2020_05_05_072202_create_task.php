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
            $table->id('Tasks_id');
            $table->string('Student_id');
            $table->foreign('Student_id')->references('student_id')->on('users')->onDelete('cascade');
            $table->string('Toolman_id')->nullable();
            $table->foreign('Toolman_id')->references('student_id')->on('users')->onDelete('cascade');
            $table->string('Classification');
            $table->foreign('Classification')->references('ClassValue')->on('classification');
            $table->string('Title');
            $table->dateTime('DateTime');
            $table->string('BuyAddress')->nullable();
            $table->string('MeetAddress')->nullable();
            $table->integer('Pay');
            $table->string('Content');
            //Selectable,processing,complete
            $table->string('Status')->default("Selectable");
            $table->foreign('Status')->references('StatusValue')->on('status');
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
