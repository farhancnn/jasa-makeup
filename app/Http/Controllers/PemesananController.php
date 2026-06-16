<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Pemesanan;
use App\Models\KatalogMakeup;
use App\Models\Ulasan;

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

    public function indexAdmin()
    {
        $pemesanans = Pemesanan::with(['customer', 'katalogMakeup', 'pembayaran'])
                        ->orderBy('created_at', 'desc')
                        ->get();
        
        return view('admin.booking', compact('pemesanans'));
    }

    public function updateStatus(Request $request, $id_pesanan)
    {
        $pesanan = Pemesanan::findOrFail($id_pesanan);

        $pesanan->update([
            'status_pesanan' => $request->status
        ]);

        if ($pesanan->pembayaran && in_array($request->status, ['dikonfirmasi', 'selesai'])) {
            $pesanan->pembayaran->update([
                'status' => 'dikonfirmasi'
            ]);
        }

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui menjadi: ' . ucfirst($request->status));
    }
        public function riwayat()
    {
        $emailUser = \Illuminate\Support\Facades\Auth::user()->email;

        $pemesanans = \App\Models\Pemesanan::whereHas('customer', function($query) use ($emailUser) {
            $query->where('email', $emailUser);
        })
        ->with(['katalogMakeup', 'pembayaran'])
        ->orderBy('created_at', 'desc')
        ->get();

        return view('pemesanan.riwayat', compact('pemesanans'));
    }

    public function buatUlasan($id_pesanan)
    {
        $pemesanan = Pemesanan::findOrFail($id_pesanan);
        return view('ulasan.create', compact('pemesanan'));
    }

// Menyimpan ulasan
    public function simpanUlasan(Request $request, $id_pesanan)
    {
        $request->validate(['deskripsi' => 'required|string']);

        $pemesanan = Pemesanan::findOrFail($id_pesanan);
    
        Ulasan::create([
            'id_pelanggan' => $pemesanan->id_pelanggan,
            'id_pesanan'   => $id_pesanan,
            'deskripsi'    => $request->deskripsi
        ]);

        return redirect()->route('pemesanan.riwayat')->with('success', 'Ulasan berhasil dikirim!');
    }

    public function daftarUlasan()
{
    $ulasans = Ulasan::with('customer')->latest()->get();
    
    return view('ulasan.index', compact('ulasans'));
}
}