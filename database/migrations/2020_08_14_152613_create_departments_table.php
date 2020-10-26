<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->String("De_Value")->primary();
            $table->String("De_Name");
        });

        DB::table('departments')->insert([
            [
                "De_Value" => "0",
                "De_Name" => "教師"
            ],
            [
                "De_Value" => "1",
                "De_Name" => "國際貿易與經營科"
            ],
            [
                "De_Value" => "2",
                "De_Name" => "國際貿易與經營系"
            ],
            [
                "De_Value" => "3",
                "De_Name" => "會計資訊科"
            ],
            [
                "De_Value" => "4",
                "De_Name" => "會計資訊系"
            ],
            [
                "De_Value" => "5",
                "De_Name" => "會計資訊碩士班"
            ],
            [
                "De_Value" => "6",
                "De_Name" => "保險金融管理科"
            ],
            [
                "De_Value" => "7",
                "De_Name" => "保險金融管理系"
            ],
            [
                "De_Value" => "8",
                "De_Name" => "企業管理科"
            ],
            [
                "De_Value" => "9",
                "De_Name" => "企業管理系"
            ],
            [
                "De_Value" => "10",
                "De_Name" => "企業管理碩士班"
            ],
            [
                "De_Value" => "11",
                "De_Name" => "財政稅務系"
            ],
            [
                "De_Value" => "12",
                "De_Name" => "租稅管理與理財規劃碩士班"
            ],
            [
                "De_Value" => "13",
                "De_Name" => "財務金融系"
            ],
            [
                "De_Value" => "14",
                "De_Name" => "財務金融碩士班"
            ],
            [
                "De_Value" => "15",
                "De_Name" => "應用統計系"
            ],
            [
                "De_Value" => "16",
                "De_Name" => "休閒事業經營系"
            ],
            [
                "De_Value" => "17",
                "De_Name" => "商業設計系"
            ],
            [
                "De_Value" => "18",
                "De_Name" => "商業設計碩士班"
            ],
            [
                "De_Value" => "19",
                "De_Name" => "多媒體設計系"
            ],
            [
                "De_Value" => "20",
                "De_Name" => "多媒體設計碩士班"
            ],
            [
                "De_Value" => "21",
                "De_Name" => "室內設計系"
            ],
            [
                "De_Value" => "22",
                "De_Name" => "室內設計碩士班"
            ],
            [
                "De_Value" => "23",
                "De_Name" => "創意商品設計科"
            ],
            [
                "De_Value" => "24",
                "De_Name" => "創意商品設計系"
            ],
            [
                "De_Value" => "25",
                "De_Name" => "創意商品設計菁英班"
            ],
            [
                "De_Value" => "26",
                "De_Name" => "資訊管理科"
            ],
            [
                "De_Value" => "27",
                "De_Name" => "資訊管理系"
            ],
            [
                "De_Value" => "28",
                "De_Name" => "資訊管理碩士班"
            ],
            [
                "De_Value" => "29",
                "De_Name" => "資訊應用菁英班"
            ],
            [
                "De_Value" => "30",
                "De_Name" => "資訊工程科"
            ],
            [
                "De_Value" => "31",
                "De_Name" => "資訊工程系"
            ],
            [
                "De_Value" => "32",
                "De_Name" => "資訊工程碩士班"
            ],

            [
                "De_Value" => "33",
                "De_Name" => "流通管理系"
            ],
            [
                "De_Value" => "34",
                "De_Name" => "流通管理碩士班"
            ],
            [
                "De_Value" => "35",
                "De_Name" => "應用日語科"
            ],
            [
                "De_Value" => "36",
                "De_Name" => "應用日語系"
            ],
            [
                "De_Value" => "37",
                "De_Name" => "日本市場暨商務策略碩士班"
            ],
            [
                "De_Value" => "38",
                "De_Name" => "應用英語科"
            ],

            [
                "De_Value" => "39",
                "De_Name" => "應用英語系"
            ],
            [
                "De_Value" => "40",
                "De_Name" => "應用中文系"
            ],
            [
                "De_Value" => "41",
                "De_Name" => "護理科"
            ],
            [
                "De_Value" => "42",
                "De_Name" => "護理系"
            ],
            [
                "De_Value" => "43",
                "De_Name" => "美容系"
            ],
            [
                "De_Value" => "44",
                "De_Name" => "老人服務事業管理系"
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
        Schema::dropIfExists('departments');
    }
}
