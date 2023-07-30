<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCriteria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("alternatifs", function(Blueprint  $table){
            $table->string("C01");
            $table->string("C02");
            $table->string("C03IPA");
            $table->string("C03IPS");
            $table->string("C03BING");
            $table->string("C03BIND");
            $table->string("C03MTK");
            $table->string("C04");
            $table->string("C05");
            $table->string("C06");
            $table->string("C07");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
