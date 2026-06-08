<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanans';
    protected $primaryKey = 'id_pesanan';

    protected $fillable = [
        'id_pelanggan', 
        'id_katalog', 
        'tanggal', 
        'waktu', 
        'lokasi', 
        'status_pesanan'
    ];

    // Pemesanan ini dimiliki oleh satu Customer (Belongs To)
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_pelanggan', 'id_pelanggan');
    }

    // Pemesanan ini memilih satu Katalog (Belongs To)
    public function katalogMakeup()
    {
        return $this->belongsTo(KatalogMakeup::class, 'id_katalog', 'id_katalog');
    }

    // Pemesanan ini memiliki satu data Pembayaran (One to One)
    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_pesanan', 'id_pesanan');
    }

    // Pemesanan ini memiliki satu Ulasan (One to One)
    public function ulasan()
    {
        return $this->hasOne(Ulasan::class, 'id_pesanan', 'id_pesanan');
    }
}