@extends('layouts.guest')

@section('title', 'User | Beranda')

@section('content')

{{-- 1 --}}
<section id="beranda" class="mt-3 position-relative">
    <img src="{{ asset('assets/img/user.png') }}" class="hero-img" alt="user">

    <div class="position-absolute top-50 start-50 translate-middle text-center">
        <h1 class="hero-title">
            Tampil Sempurna<br>di Hari Spesial
        </h1>
        <a href="/katalog" class="btn-home">
            Booking Sekarang
        </a>
    </div>
</section>

{{-- 2 --}}
<section id="tentang" class="container mt-4">
    <div class="row tentang-kami">
        <div class="col-md-5 p-0">
            <img src="{{ asset('assets/img/tentang.png') }}" class="img-tentang" alt="tentang">
        </div>
        <div class="col-md-7 d-flex flex-column justify-content-center align-items-center text-center">
            <small class="subjudul">ELORA BEAUTY</small>

            <h2 class="judul-tentang">
                Tentang Kami
            </h2>

            <p class="isi-tentang mt-3">
                Elora Beauty Studio adalah penyedia jasa make up profesional yang berpengalaman dalam menangani berbagai
                kebutuhan kecantikan. Kami berkomitmen untuk memberikan hasil make up yang sesuai dengan karakter dan
                keinginan setiap pelanggan.  Dengan menggunakan produk berkualitas dan teknik terkini, kami siap
                membantu Anda tampil percaya diri di setiap momen spesial.
            </p>
        </div>
    </div>
</section>

{{-- 3 --}}
<section id="katalog" class="mt-4">
    <div class="layanan mt-3">
        <div class="judul">
            <small class="subjudul">MAKEUP</small>
            <h2 class="judul-tentang">Katalog</h2>
        </div>

<div class="row g-4 justify-content-center">
    @forelse($katalogs as $katalog)
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center">
        
        <div class="card h-100 border-0 shadow-sm" style="width: 100%; max-width: 280px; border-radius: 15px; overflow: hidden;">
            
            <img src="{{ asset('storage/katalog/' . $katalog->gambar) }}" 
                 class="card-img-top" 
                 alt="{{ $katalog->nama_katalog }}" 
                 style="height: 350px; width: 100%; object-fit: cover; object-position: center top;">
            
            <div class="card-body p-4 text-center">
                <h5 class="fw-bold mb-3" style="color: #AE3168; font-size: 1.1rem;">{{ $katalog->nama_katalog }}</h5>
                <h6 class="fw-bold mb-4" style="color: #333;">Rp {{ number_format($katalog->harga ?? 0, 0, ',', '.') }}</h6>
                
                <a href="{{ route('pemesanan.create', $katalog->id_katalog) }}" class="btn w-100 text-white rounded-pill fw-medium" style="background-color: #AE3168; padding: 10px 0;">
                    Booking Sekarang
                </a>
            </div>
        </div>
        
    </div>
    @empty
    <div class="col-12 text-center text-muted">
        <p>Belum ada katalog layanan yang tersedia.</p>
    </div>
    @endforelse
     <div class="text-center mt-4">
            <a href="/katalog" class="lihat-semua">
                Lihat Semua Katalog →
            </a>
        </div>
</div>

    </div>
</section>

{{-- 4 --}}
<section id="testimoni" class="container py-5 mt-5">
    <h2 class="text-center mb-5 fw-bold" style="color: #AE3168;">Apa Kata Klien Kami?</h2>
    
    <div class="row g-4">
        @forelse($ulasans as $ulasan)
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm p-4" style="border-radius: 15px;">
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-person-circle fs-1 text-secondary me-3"></i>
                    <div>
                        <h6 class="mb-0 fw-bold">{{ $ulasan->customer->nama_pelanggan ?? 'Anonim' }}</h6>
                        <small class="text-muted">{{ date('d M Y', strtotime($ulasan->created_at)) }}</small>
                    </div>
                </div>
                
                <div class="text-warning mb-2" style="font-size: 14px;">
                   
                </div>

                <p class="text-muted fst-italic">"{{ $ulasan->deskripsi }}"</p>
            </div>
        </div>
        @empty
        <div class="col-12 text-center text-muted">
            <p>Belum ada ulasan saat ini. Jadilah yang pertama memberikan ulasan!</p>
        </div>
        @endforelse
    </div>

        <div class="text-center mt-4">
            <a href="/testimoni" class="lihat-semua">
                Lihat Semua Ulasan →
            </a>
        </div>

    </div>
</section>

@endsection
