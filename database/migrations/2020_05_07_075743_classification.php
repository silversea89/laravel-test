<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Classification extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Classification', function (Blueprint $table) {
            $table->String("ClassValue")->primary();
            $table->String("ClassName");
        });

        DB::table('Classification')->insert([
            [
                "ClassValue" => "Food",
                "ClassName" => "食物飲料"
            ],
            [
                "ClassValue" => "Stationery",
                "ClassName" => "文具用品"
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Classification');
    }
}
