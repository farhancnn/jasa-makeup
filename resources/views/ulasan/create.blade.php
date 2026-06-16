@extends('layouts.guest')
@section('title', 'Beri Ulasan - Elora Beauty')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm p-4" style="border-radius: 15px;">
                <h4 class="fw-bold mb-3 text-center" style="color: #AE3168;">Beri Ulasan Layanan</h4>
                <p class="text-center text-muted mb-4">Layanan: <strong>{{ $pemesanan->katalogMakeup->nama_katalog }}</strong></p>

                <form action="/ulasan/{{ $pemesanan->id_pesanan }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold" style="color: #F974AE;">Tuliskan Kesan & Pesan Anda</label>
                        <textarea name="deskripsi" class="form-control" rows="5" placeholder="Ceritakan pengalaman Anda menggunakan jasa makeup Elora Beauty..." required></textarea>
                    </div>

                    <button type="submit" class="btn w-100 fw-bold text-white py-2" style="background-color: #AE3168; border-radius: 20px;">
                        Kirim Ulasan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection