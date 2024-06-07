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
            $table->increments('idpesanan');
            $table->integer('jenis_id')->unsigned();
            $table->integer('pelanggan_id')->unsigned();
            $table->integer('metode_id')->unsigned();
            $table->string('kode_pesanan');
            $table->string('nama_pelanggan');
            $table->string('jenis');
            $table->string('jasa');
            $table->integer('jumlah');
            $table->integer('total');
            $table->date('tglmasuk');
            $table->date('tglselesai');
            $table->string('statuspembayaran');

            $table->timestamps();

            $table->foreign('jenis_id')->references('id')->on('jenis')->onDelete('cascade');
            $table->foreign('pelanggan_id')->references('id')->on('pelanggan')->onDelete('cascade');
            $table->foreign('metode_id')->references('id')->on('metodepembayaran')->onDelete('cascade');
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
        Schema::dropIfExists('pesanan');
    }
}
