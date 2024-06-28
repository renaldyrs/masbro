<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pesanan extends Model
{
    use HasFactory;

protected $table = 'pesanan';

    protected $fillable = [
        'id',
        'kode_pesanan', 
        'nama_pelanggan', 
        'jenis', 
        'harga', 
        'jumlah', 
        'total', 
        'tgltransaksi', 
        'tglselai'

    ];
}
