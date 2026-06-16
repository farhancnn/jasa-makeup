<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KatalogMakeup;
use Illuminate\Support\Facades\File;

class KatalogController extends Controller
{
    // Menampilkan halaman katalog di admin
    public function indexAdmin()
    {
        $katalogs = KatalogMakeup::orderBy('created_at', 'desc')->get();
        return view('admin.katalog', compact('katalogs'));
    }

    // Menyimpan data katalog baru (Tambah Layanan)
    public function store(Request $request)
    {
        $request->validate([
            'nama_katalog' => 'required|string',
            'deskripsi'    => 'required|string',
            'harga'        => 'required|numeric',
            'gambar'       => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Proses upload gambar
        $imageName = time().'.'.$request->gambar->extension();  
        $request->gambar->move(public_path('storage/katalog'), $imageName);

        KatalogMakeup::create([
            'nama_katalog' => $request->nama_katalog,
            'deskripsi'    => $request->deskripsi,
            'harga'        => $request->harga,
            'gambar'       => $imageName,
        ]);

        return redirect()->back()->with('success', 'Layanan berhasil ditambahkan!');
    }

    // Mengupdate data katalog (Edit Layanan)
    public function update(Request $request, $id)
    {
        $katalog = KatalogMakeup::findOrFail($id);

        $request->validate([
            'nama_katalog' => 'required|string',
            'deskripsi'    => 'required|string',
            'harga'        => 'required|numeric',
            'gambar'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
        ]);

        // Jika admin mengupload gambar baru
        if ($request->hasFile('gambar')) {
            $oldImagePath = public_path('storage/katalog/'.$katalog->gambar);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            $imageName = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('storage/katalog'), $imageName);
            $katalog->gambar = $imageName;
        }

        $katalog->nama_katalog = $request->nama_katalog;
        $katalog->deskripsi = $request->deskripsi;
        $katalog->harga = $request->harga;
        $katalog->save();

        return redirect()->back()->with('success', 'Layanan berhasil diperbarui!');
    }

    // Menghapus data katalog
    public function destroy($id)
    {
        $katalog = KatalogMakeup::findOrFail($id);
        
        $imagePath = public_path('storage/katalog/'.$katalog->gambar);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $katalog->delete();

        return redirect()->back()->with('success', 'Layanan berhasil dihapus!');
    }

    // Menampilkan halaman katalog untuk Customer (Publik)
    public function katalogUser()
    {
        $katalogs = KatalogMakeup::orderBy('created_at', 'desc')->get(); 
        
        return view('katalog', compact('katalogs'));
    }
}