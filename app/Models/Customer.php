<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    protected $primaryKey = 'id_pelanggan';
    
    protected $fillable = [
        'nama_pelanggan', 
        'email', 
        'password', 
        'no_telp', 
        'alamat'
    ];

    // Relasi ke Pemesanan (One to Many)
    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class, 'id_pelanggan', 'id_pelanggan');
    }

    // Relasi ke Ulasan (One to Many)
    public function ulasans()
    {
        return $this->hasMany(Ulasan::class, 'id_pelanggan', 'id_pelanggan');
    }
}