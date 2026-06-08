<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $table = 'ulasans';
    protected $primaryKey = 'id_ulasan';

    protected $fillable = [
        'id_pelanggan', 
        'id_pesanan', 
        'deskripsi'
    ];

    // Ulasan ini ditulis oleh satu Customer (Belongs To)
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'id_pelanggan', 'id_pelanggan');
    }

    // Ulasan ini merujuk pada satu Pemesanan (Belongs To)
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pesanan', 'id_pesanan');
    }
}