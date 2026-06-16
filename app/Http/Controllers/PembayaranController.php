<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    // upload bukti bayar
    public function create($id_pesanan)
    {
        $pemesanan = Pemesanan::findOrFail($id_pesanan);
        return view('pembayaran.create', compact('pemesanan'));
    }

    // proses
    public function store(Request $request, $id_pesanan)
    {
        $request->validate([
            'metode_pembayaran' => 'required|string',
            'jumlah_bayar'      => 'required|numeric',
            'bukti_bayar'       => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        
        $imageName = time().'.'.$request->bukti_bayar->extension();  
        $request->bukti_bayar->move(public_path('storage/bukti_bayar'), $imageName);

        
        Pembayaran::create([
            'id_pesanan'        => $id_pesanan,
            'metode_pembayaran' => $request->metode_pembayaran,
            'bukti_bayar'       => $imageName,
            'jumlah_bayar'      => $request->jumlah_bayar,
            'status'            => 'menunggu'
        ]);

        return redirect('/katalog')->with('success', 'Pembayaran berhasil dikirim! Silakan tunggu konfirmasi Admin.');
    }
}