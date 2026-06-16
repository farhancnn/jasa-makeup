<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;                  // <-- TAMBAHKAN BARIS INI
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // 1. Validasi inputan form
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Cek kecocokan data dengan database
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // 3. Cek rolenya, arahkan ke halaman yang sesuai
            if (Auth::user()->role === 'admin') {
                return redirect()->intended('/admin');
            }

            // Jika customer, kembalikan ke halaman utama
            return redirect()->intended('/'); 
        }

        // 4. Jika password salah, kembalikan ke form dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau kata sandi yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    public function showRegister()
{
    return view('auth.register'); // Pastikan file ini dibuat
}

public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Membuat user baru dengan role 'customer' secara otomatis
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'customer', // Mengunci role agar selalu customer
    ]);
    Auth::login($user);

    return redirect('/')->with('success', 'Pendaftaran berhasil!');
}

    // === TAMBAHKAN FUNGSI INI ===
    public function logout(Request $request)
    {
        Auth::logout(); // Mengeluarkan user dari sesi saat ini

        $request->session()->invalidate(); // Menghapus memori sesi
        $request->session()->regenerateToken(); // Membuat ulang token keamanan (mencegah pembajakan sesi)

        return redirect('/'); // Arahkan kembali ke beranda setelah berhasil logout
    }
}