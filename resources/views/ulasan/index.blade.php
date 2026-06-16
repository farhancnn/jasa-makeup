@extends('layouts.guest')

@section('title', 'Testimoni Klien - Elora Beauty')

@section('content')
<div class="container py-5" style="min-height: 80vh;">
    <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #AE3168; font-family: 'Playfair Display', serif;">Apa Kata Klien Kami?</h2>
        <p class="text-muted">Kumpulan ulasan dan pengalaman memukau dari pelanggan setia Elora Beauty.</p>
    </div>

    <div class="row g-4">
        @forelse($ulasans as $ulasan)
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm p-4" style="border-radius: 15px; background-color: #FFF5F8;">
                <div class="d-flex align-items-center mb-3">
                    <i class="bi bi-person-circle fs-1 me-3" style="color: #D67A9C;"></i>
                    <div>
                        <h6 class="mb-0 fw-bold text-dark">{{ $ulasan->customer->nama_pelanggan ?? 'Anonim' }}</h6>
                        <small class="text-muted" style="font-size: 12px;">
                            {{ date('d F Y', strtotime($ulasan->created_at)) }}
                        </small>
                    </div>
                </div>
                
                <div class="text-warning mb-2" style="font-size: 14px;">
                    
                </div>

                <p class="text-muted fst-italic" style="line-height: 1.6;">
                    "{{ $ulasan->deskripsi }}"
                </p>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <i class="bi bi-chat-square-heart text-muted" style="font-size: 3rem;"></i>
            <p class="mt-3 text-muted">Belum ada ulasan saat ini. Jadilah yang pertama membagikan pengalamanmu bersama kami!</p>
        </div>
        @endforelse
    </div>
</div>
@endsection