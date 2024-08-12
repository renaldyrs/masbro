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
        'id_jenis',
        'id_pelanggan',
        'id_metode',
        'harga',
        'jumlah',
        'total',
        'tgltransaksi',
        'tglselesai',
        'status',
        'statuspembayaran',

    ];
}
