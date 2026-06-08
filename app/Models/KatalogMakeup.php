<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KatalogMakeup extends Model
{
    use HasFactory;

    protected $table = 'katalog_makeups';
    protected $primaryKey = 'id_katalog';

    protected $fillable = [
        'nama_katalog', 
        'deskripsi', 
        'harga', 
        'gambar'
    ];

    // Relasi ke Pemesanan (One to Many)
    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class, 'id_katalog', 'id_katalog');
    }
}