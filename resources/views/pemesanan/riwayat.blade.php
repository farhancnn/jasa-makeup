@extends('layouts.guest')

@section('title', 'Riwayat Pesanan - Elora Beauty')

@section('content')
<div class="container py-5" style="min-height: 80vh;">
    <div class="row justify-content-center">
        <div class="col-md-10">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold" style="color: #AE3168; font-family: 'Playfair Display', serif;">Riwayat Pesanan Saya</h3>
                <a href="/katalog" class="btn btn-outline-secondary rounded-pill btn-sm px-3">
                    <i class="bi bi-plus-circle"></i> Booking Lagi
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-4" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0 align-middle">
                            <thead style="background-color: #FFF5F8;">
                                <tr>
                                    <th class="py-3 px-4" style="color: #AE3168;">Order ID</th>
                                    <th class="py-3">Layanan</th>
                                    <th class="py-3">Tanggal Booking</th>
                                    <th class="py-3">Total Biaya</th>
                                    <th class="py-3">Status Pesanan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pemesanans as $pesanan)
<tr>
    {{-- 1. Kolom Order ID --}}
    <td class="px-4 fw-bold text-secondary">#{{ str_pad($pesanan->id_pesanan, 4, '0', STR_PAD_LEFT) }}</td>
    
    {{-- 2. Kolom Layanan --}}
    <td>
        <span class="fw-bold" style="color: #333;">{{ $pesanan->katalogMakeup->nama_katalog ?? 'Layanan' }}</span>
    </td>
    
    {{-- 3. Kolom Tanggal Booking --}}
    <td>{{ date('d M Y', strtotime($pesanan->tanggal)) }} <br> <small class="text-muted">{{ $pesanan->waktu }} WIB</small></td>
    
    {{-- 4. Kolom Total Biaya (INI YANG HILANG DI KODEMU) --}}
    <td class="fw-medium text-success">Rp {{ number_format($pesanan->katalogMakeup->harga ?? 0, 0, ',', '.') }}</td>
    
    {{-- 5. Kolom Status Pesanan & Tombol Ulasan --}}
    <td>
        <div class="d-flex align-items-center gap-2">
            @if($pesanan->status_pesanan == 'menunggu konfirmasi' || $pesanan->status_pesanan == 'menunggu')
                <span class="badge bg-warning text-dark rounded-pill px-3 py-2">⏳ Menunggu</span>
            @elseif($pesanan->status_pesanan == 'dikonfirmasi')
                <span class="badge bg-primary rounded-pill px-3 py-2">✅ Dikonfirmasi</span>
            @elseif($pesanan->status_pesanan == 'selesai')
                <span class="badge bg-success rounded-pill px-3 py-2">🎉 Selesai</span>
            @else
                <span class="badge bg-secondary rounded-pill px-3 py-2">{{ ucfirst($pesanan->status_pesanan) }}</span>
            @endif

            @if($pesanan->status_pesanan == 'selesai')
                @if(!$pesanan->ulasan)
                    <a href="{{ route('ulasan.create', $pesanan->id_pesanan) }}" 
                       class="btn btn-sm btn-outline-danger rounded-pill px-3" 
                       style="font-size: 12px; white-space: nowrap;">
                        <i class="bi bi-star"></i> Beri Ulasan
                    </a>
                @else
                    <span class="badge bg-light text-success border rounded-pill px-2 py-2" style="font-size: 11px; white-space: nowrap;">
                        <i class="bi bi-check-circle-fill text-success"></i> Sudah Diulas
                    </span>
                @endif
            @endif
        </div>
    </td>
</tr>
@empty
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-muted">
                                        <i class="bi bi-cart-x" style="font-size: 2rem;"></i>
                                        <p class="mt-2 mb-0">Anda belum memiliki riwayat pesanan.</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection