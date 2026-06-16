@extends('layouts.guest')

@section('title', 'Form Pemesanan - Elora Beauty')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center g-4">
        
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4" style="border-radius: 20px; background-color: #FFFFFF;">
                <h4 class="fw-bold mb-4" style="color: #AE3168; font-family: 'Playfair Display', serif;">Ringkasan Pesanan</h4>
                
                <div class="text-center mb-4">
                    <img src="{{ asset('storage/katalog/' . $katalog->gambar) }}" 
                         class="img-fluid rounded-4 shadow-sm" 
                         style="height: 250px; width: 100%; object-fit: cover; border: 3px solid #FAE4ED;" 
                         alt="Layanan">
                </div>

                <div class="mb-3">
                    <small class="text-uppercase fw-bold" style="color: #F974AE; font-size: 12px; letter-spacing: 1px;">Layanan Pilihan</small>
                    <h5 class="fw-bold" style="color: #333;">{{ $katalog->nama_katalog }}</h5>
                </div>

                <div class="p-3 rounded-3" style="background-color: #FFF5F8; border: 1px dashed #F974AE;">
                    <small class="text-secondary d-block mb-1">Total Biaya:</small>
                    <h4 class="fw-bold mb-0" style="color: #AE3168;">Rp. {{ number_format($katalog->harga, 0, ',', '.') }}</h4>
                </div>

                <hr class="my-4" style="opacity: 0.1;">
                
                <div class="d-flex align-items-center gap-2 text-muted small">
                    <i class="bi bi-shield-check" style="color: #F974AE; font-size: 20px;"></i>
                    <span>Pembayaran aman & Terverifikasi otomatis oleh Admin Elora.</span>
                </div>
            </div>
        </div>

        <div class="col-md-7">
            <div class="card border-0 shadow-sm p-4 p-md-5" style="border-radius: 20px;">
                <div class="mb-4">
                    <h2 class="fw-bold" style="color: #AE3168; font-family: 'Playfair Display', serif;">Lengkapi Data Booking</h2>
                    <p class="text-muted">Silakan isi formulir di bawah ini dengan data yang benar.</p>
                </div>

                <form action="{{ route('pemesanan.store') }}" method="POST">
                    @csrf
                    
                    <input type="hidden" name="id_katalog" value="{{ $katalog->id_katalog }}">

                    <h5 class="mb-3 fw-bold" style="color: #F974AE;"><i class="bi bi-person-heart"></i> Data Diri Pelanggan</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">Nama Lengkap</label>
                            <input type="text" name="nama_pelanggan" class="form-control rounded-pill px-3" placeholder="Contoh: Dewi Safitri" required>
                        </div>
                        <div class="col-md-6 mb-3">
    <label class="form-label small fw-bold">Email Aktif</label>
    
    <input type="email" name="email" class="form-control rounded-pill px-3" 
           value="{{ Auth::user()->email }}" readonly style="background-color: #f1f3f5;">
</div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">Nomor WhatsApp</label>
                            <input type="text" name="no_telp" class="form-control rounded-pill px-3" placeholder="0812xxxx" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">Alamat Lengkap</label>
                            <input type="text" name="alamat" class="form-control rounded-pill px-3" placeholder="Kota/Kecamatan" required>
                        </div>
                    </div>

                    <h5 class="mb-3 mt-4 fw-bold" style="color: #F974AE;"><i class="bi bi-calendar-event"></i> Detail Jadwal & Lokasi</h5>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">Tanggal Acara</label>
                            <input type="date" name="tanggal" class="form-control rounded-pill px-3" required min="{{ date('Y-m-d') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label small fw-bold">Waktu/Jam</label>
                            <input type="time" name="waktu" class="form-control rounded-pill px-3" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-bold">Lokasi Acara (Rumah/Gedung/Hotel)</label>
                        <textarea name="lokasi" class="form-control rounded-4 px-3" rows="3" placeholder="Tuliskan lokasi detail pengerjaan makeup..." required></textarea>
                    </div>

                    <button type="submit" class="btn w-100 py-3 fw-bold text-white shadow" 
                            style="background: linear-gradient(90deg, #F974AE, #AE3168); border: none; border-radius: 30px; font-size: 18px;">
                        Lanjut ke Pembayaran <i class="bi bi-arrow-right-short"></i>
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>

<style>
    body {
        background-color: #FCEEF5;
    }
    .form-control:focus {
        border-color: #F974AE;
        box-shadow: 0 0 0 0.25rem rgba(249, 116, 174, 0.25);
    }
    .form-control {
        border: 1px solid #FAE4ED;
        padding: 12px;
    }
    .card {
        transition: transform 0.3s ease;
    }
</style>
@endsection