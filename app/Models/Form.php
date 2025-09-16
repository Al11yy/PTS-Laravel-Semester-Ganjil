<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $table = 'form';

    protected $fillable = [
        'nama_produk',
        'nama_peminjam',
        'jumlah_barang', 
        'tanggal_pinjam', 
        'tanggal_kembali', 
        'status_barang', // huruf kecil biar sama dengan migration & controller
    ];

    protected $casts = [
        'tanggal_pinjam' => 'date',
        'tanggal_kembali' => 'date',
    ];
}
