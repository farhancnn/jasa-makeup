@extends('layouts.guest')

@section('title', 'Pembayaran - Elora Beauty')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm" style="border-radius: 15px;">
                <div class="card-header bg-white text-center py-4" style="border-radius: 15px 15px 0 0;">
                    <h3 class="fw-bold mb-0" style="color: #AE3168;">Selesaikan Pembayaran</h3>
                    <p class="text-muted mb-0">Pesanan ID: #{{ $pemesanan->id_pesanan }}</p>
                </div>

                <div class="card-body p-4 p-md-5">
                    <div class="alert mb-4" style="background-color: #FFF5F8; border: 1px solid #F974AE; border-radius: 10px;">
                        <h6 class="fw-bold" style="color: #AE3168;"><i class="bi bi-info-circle"></i> Instruksi Transfer</h6>
                        <p class="small mb-2">Silakan transfer sesuai harga layanan ke salah satu rekening resmi kami:</p>
                        <ul class="small mb-0 text-dark">
                            <li><strong>BCA:</strong> 8420-2945-06 a.n Elora Beauty</li>
                            <li><strong>Mandiri:</strong> 133-00-1234-5678 a.n Elora Beauty</li>
                            <li><strong>BRI:</strong> 0012-01-009449-04 a.n Elora Beauty</li>
                        </ul>
                    </div>

                    <form action="/pembayaran/{{ $pemesanan->id_pesanan }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-medium text-secondary">Transfer ke Bank</label>
                            <select name="metode_pembayaran" class="form-select" required>
                                <option value="" selected disabled>-- Pilih Rekening Tujuan --</option>
                                <option value="BCA">BCA</option>
                                <option value="Mandiri">Mandiri</option>
                                <option value="BRI">BRI</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-medium text-secondary">Nominal Transfer (Rp)</label>
                            <input type="number" name="jumlah_bayar" class="form-control" placeholder="Contoh: 500000" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-medium text-secondary">Unggah Bukti Transfer</label>
                            <input type="file" name="bukti_bayar" class="form-control" accept="image/*" required>
                            <small class="text-muted">Format JPG/PNG, maks. 2MB</small>
                        </div>

                        <button type="submit" class="btn w-100 fw-bold text-white py-3" style="background: linear-gradient(90deg, #F974AE, #AE3168); border: none; border-radius: 10px;">
                            Kirim Bukti Pembayaran
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection