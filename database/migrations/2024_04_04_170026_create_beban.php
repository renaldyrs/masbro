<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeban extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beban', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string('kode');
            $table->string('keterangan');
            $table->integer('biaya');
            $table->integer('jumlah');
            $table->integer('total');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beban');
    }
}
