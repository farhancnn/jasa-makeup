<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Pemesanan;
use App\Models\KatalogMakeup;

class PemesananController extends Controller
{
    // Menampilkan halaman form pemesanan berdasarkan katalog yang dipilih
    public function create($id_katalog)
    {
        $katalog = KatalogMakeup::findOrFail($id_katalog);
        return view('pemesanan.create', compact('katalog'));
    }

    // Memproses data form saat disubmit
    public function store(Request $request)
    {
        
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'email'          => 'required|email',
            'no_telp'        => 'required|string|max:20',
            'alamat'         => 'required|string',
            'id_katalog'     => 'required|exists:katalog_makeups,id_katalog',
            'tanggal'        => 'required|date',
            'waktu'          => 'required',
            'lokasi'         => 'required|string',
        ]);

        // customer baru 
        $customer = Customer::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'email'          => $request->email,
            'no_telp'        => $request->no_telp,
            'alamat'         => $request->alamat,
        ]);

        $pemesanan = Pemesanan::create([
            'id_pelanggan'   => $customer->id_pelanggan,
            'id_katalog'     => $request->id_katalog,
            'tanggal'        => $request->tanggal,
            'waktu'          => $request->waktu,
            'lokasi'         => $request->lokasi,
            'status_pesanan' => 'menunggu konfirmasi'
        ]);

        return redirect()->route('pembayaran.create', ['id_pesanan' => $pemesanan->id_pesanan]);
    }
}