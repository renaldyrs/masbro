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
            $table->unsignedBigInteger('id_akun');
            $table->unsignedBigInteger('id_pesanan');
            $table->unsignedBigInteger('id_beban');
            $table->string('keterangan', 255);
            $table->date('waktu_transaksi');
            $table->integer('nominal')->unsigned();
            $table->enum('tipe', ['d', 'k']);
            

        });

        Schema::table('jurnal', function( $table){
            $table->foreign('id_akun')
            ->references('id')
            ->on('akun')
            ->onDelete('cascade');

            $table->foreign('id_pesanan')
            ->references('id')
            ->on('pesanan')
            ->onDelete('cascade');

            $table->foreign('id_beban')
            ->references('id')
            ->on('beban')
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
