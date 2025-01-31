<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    // nama table tidak mengikuti konvensi laravel
    protected $table = 'jurnal';

    // Non-aktifkan Timestamp
    public $timestamps = false;

    // kolom tabel untuk Mass Assingment
    protected $fillable = ['id','id_akun','id_pesanan','id_beban','keterangan', 'waktu_transaksi', 'nominal', 'tipe'];

    // kolom akan disembunyikan dalam array
    protected $hidden = [''];

    // Relasi N-1 antara akun dengan jurnal
    public function akun(){
        return $this->belongsTo(Akun::class, 'id_akun');
    }

}
