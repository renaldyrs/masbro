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
        Schema::dropIfExists('pesanan');
        Schema::create('pesanan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_jenis');
            $table->foreign('id_jenis')->references('id')->on('jenis')->onDelete('cascade');
            $table->unsignedBigInteger('id_pelanggan');
            $table->foreign('id_pelanggan')->references('id')->on('pelanggan')->onDelete('cascade');
            $table->unsignedBigInteger('id_metode');
            $table->foreign('id_metode')->references('id')->on('metodepembayaran')->onDelete('cascade');
            $table->string('kode_pesanan');
            $table->string('harga');
            $table->integer('jumlah');
            $table->integer('total');
            $table->date('tgltransaksi');
            $table->date('tglselesai');
            $table->string('jenisbayar');
            $table->string('statuspembayaran');
            $table->string('statuspesanan');
            $table->string('pengiriman');
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
        Schema::table('pesanan', function (Blueprint $table) {
            $table->dropForeign('id_jenis');
            $table->dropForeign('id_pelanggan');
            $table->dropForeign('id_metode');
            
        });
        Schema::dropIfExists('pesanan');
    }
}
