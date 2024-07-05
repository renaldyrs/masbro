<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurnalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnal', function ( $table) {
            $table->id();
            $table->string('keterangan', 255);
            $table->date('waktu_transaksi');
            $table->integer('nominal')->unsigned();
            $table->enum('tipe', ['d', 'k']);
            $table->unsignedBigInteger('id_akun');
        });

        Schema::table('jurnal', function( $table){
            $table->foreign('id_akun')
            ->references('id')
            ->on('akun')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurnal');
    }
}
