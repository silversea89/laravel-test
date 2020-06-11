<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class StatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->String("StatusValue")->primary();
            $table->String("StatusName");
        });
        DB::table('status')->insert([
            [
                "StatusValue" => "Selectable",
                "StatusName" => "等待中"
            ],
            [
                "StatusValue" => "Processing",
                "StatusName" => "執行中"
            ],
            [
                "StatusValue" => "Complete",
                "StatusName" => "已完成"
            ],
            ["StatusValue" => "Expired",
                "StatusName" => "已過期"]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status');
    }
}
