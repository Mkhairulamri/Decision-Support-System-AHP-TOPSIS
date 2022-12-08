<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternatifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternatifs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('nisn')->unique();
            $table->integer('rapor'); //1
            $table->integer('tpa'); //2
            $table->integer('prites'); //3
            $table->string('jurusan'); //4
            $table->integer('minat');
            $table->integer('psikologi'); //5
            $table->integer('wawancara'); //6
            $table->integer('rekomendasi'); //7
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
        Schema::dropIfExists('alternatifs');
    }
}
