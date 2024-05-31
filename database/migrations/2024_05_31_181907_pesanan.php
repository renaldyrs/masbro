<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pesanan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pesanan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode');
            $table->string('nama_pelaanggan');
            $table->string('jenis');
            $table->string('jasa');
            $table->integer('jumlah');
            $table->integer('total');
            $table->date('tglmasuk');
            $table->date('tglkeluar');
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
        //
    }
}
