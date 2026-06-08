<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\KatalogMakeup;
use App\Models\Ulasan;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Menghitung jumlah data langsung dari database
        $totalBooking = Pemesanan::count();
        
        // Menghitung pesanan yang statusnya spesifik "menunggu konfirmasi"
        $menungguKonfirmasi = Pemesanan::where('status_pesanan', 'menunggu konfirmasi')->count();
        
        $jumlahKatalog = KatalogMakeup::count();
        $jumlahUlasan = Ulasan::count();

        // Mengirim variabel-variabel tersebut ke halaman View
        return view('admin.beranda', compact(
            'totalBooking', 
            'menungguKonfirmasi', 
            'jumlahKatalog', 
            'jumlahUlasan'
        ));
    }

    // Menampilkan halaman daftar booking
    public function bookingIndex()
    {
        // Mengambil semua data pemesanan beserta relasi customer dan katalognya
        // Diurutkan dari pesanan terbaru
        $pemesanans = Pemesanan::with(['customer', 'katalogMakeup'])
                               ->orderBy('created_at', 'desc')
                               ->get();
                               
        return view('admin.booking', compact('pemesanans'));
    }

    // Memproses perubahan status dari tombol Update
    public function updateStatus(Request $request, $id_pesanan)
    {
        $request->validate([
            'status' => 'required|string'
        ]);

        $pesanan = Pemesanan::findOrFail($id_pesanan);
        $pesanan->status_pesanan = $request->status;
        $pesanan->save();

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui!');
    }

    // Menampilkan halaman ulasan/testimoni
    public function testimoniIndex()
    {
        // Mengambil semua ulasan beserta data pelanggan dan pesanan (katalog) terkait
        $ulasans = Ulasan::with(['customer', 'pemesanan.katalogMakeup'])
                         ->orderBy('created_at', 'desc')
                         ->get();
                         
        return view('admin.testimoni', compact('ulasans'));
    }

    // Menghapus ulasan
    public function destroyTestimoni($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->delete();

        return redirect()->back()->with('success', 'Ulasan berhasil dihapus!');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Mengeluarkan user yang sedang login

        // Menghapus dan memperbarui session demi keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Arahkan kembali ke halaman utama (atau halaman login jika sudah ada)
        return redirect('/');
    }
}