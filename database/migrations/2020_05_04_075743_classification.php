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
        Schema::create('classification', function (Blueprint $table) {
            $table->String("ClassValue")->primary();
            $table->String("ClassName");
        });

        DB::table('classification')->insert([
            [
                "ClassValue" => "Food",
                "ClassName" => "食物飲料"
            ],
            [
                "ClassValue" => "Stationery",
                "ClassName" => "文具用品"
            ],
            [
                "ClassValue" => "Work",
                "ClassName" => "代勞跑腿"
            ],
            [
                "ClassValue" => "Teach",
                "ClassName" => "教學"
            ],
            [
                "ClassValue" => "Secondhand",
                "ClassName" => "二手物品交易"
            ],
            [
                "ClassValue" => "All",
                "ClassName" => "全部"
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
        Schema::dropIfExists('classification');
    }
}
