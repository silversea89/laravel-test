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
                "ClassValue" => "All",
                "ClassName" => "全部"
            ],
            [
                "ClassValue" => "Buy",
                "ClassName" => "代購"
            ],
            [
                "ClassValue" => "Service",
                "ClassName" => "代勞"
            ],
            [
                "ClassValue" => "Teach",
                "ClassName" => "教學"
            ],
            [
                "ClassValue" => "Book",
                "ClassName" => "二手書交易"
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
