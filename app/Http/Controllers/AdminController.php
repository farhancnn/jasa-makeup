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
        
        $menungguKonfirmasi = Pemesanan::where('status_pesanan', 'menunggu konfirmasi')->count();
        
        $jumlahKatalog = KatalogMakeup::count();
        $jumlahUlasan = Ulasan::count();

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
        $pemesanans = Pemesanan::with(['customer', 'katalogMakeup', 'pembayaran'])
                           ->orderBy('created_at', 'desc')
                           ->get();
                           
    return view('admin.booking', compact('pemesanans'));
    }

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
        Auth::logout(); 

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}