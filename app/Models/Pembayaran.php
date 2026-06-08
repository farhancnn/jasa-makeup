<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayarans';
    protected $primaryKey = 'id_pembayaran';

    protected $fillable = [
        'id_pesanan', 
        'metode_pembayaran', 
        'bukti_bayar', 
        'jumlah_bayar', 
        'status'
    ];

    // Pembayaran ini milik satu Pemesanan (Belongs To)
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'id_pesanan', 'id_pesanan');
    }
}