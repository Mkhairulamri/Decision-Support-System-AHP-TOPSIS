<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KriteriaJurusan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("jurusan", function(Blueprint $table){
            $table->id();
            $table->string("kode_kriteria");
            $table->string("nama_kriteria");
            $table->string("bobot_ipa");
            $table->string("bobot_ips");
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
