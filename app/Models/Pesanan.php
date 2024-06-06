<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pesanan extends Model
{
    use HasFactory;

protected $table = 'pesanan';

    protected $fillable = [
        'id_pesanan','kode_pesanan', 'nama_pelanggan', 'jenis', 'jasa', 'jumlah', 'total', 'tglmasuk', 'tglkeluar'];
}
