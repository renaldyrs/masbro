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
            
            
            $table->foreign('pelanggan_id')->references('id')->on('pelanggans');
            $table->foreignId('jenis_id')->unsigned()->change();
            $table->foreignId('metode_id')->unsigned()->change();
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

            $table->foreign('pelanggan_id')->references('id')->on('pelanggan');
            $table->foreign('jenis_id')->references('id')->on('jenis');
            $table->foreign('metode_id')->references('idmetode')->on('metode');

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
