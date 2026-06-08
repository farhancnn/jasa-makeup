@extends('layout.userlog.user')

@section('title', 'User | Order')

@section('content')

<div class="user-container">

    <div class="user-title">
        <h2>Status Pembayaran</h2>
        <p>Elora Beauty</p>
    </div>


    @include('partials.partials_user.booking')

    <!-- Card 1 -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">

            <div class="d-flex justify-content-between">
                <div>
                    <small>#EB-2025-040</small><br>
                    <strong>Party Makeup</strong><br>
                    <small>Jumat, 01 Mei 2026 13:00 WIB</small>
                </div>

                <span class="badge bg-danger">
                    Belum Bayar
                </span>
            </div>

            <h3 class="fw-bold text-danger mt-3">
                Rp 600.000
            </h3>

            <small class="text-muted">
                Jatuh Tempo: 30 April 2026
            </small>

            <hr>

            <h5>RINCIAN</h5>

            <div class="d-flex justify-content-between">
                <span>Harga Layanan</span>
                <span>Rp 600.000</span>
            </div>

            <div class="d-flex justify-content-between">
                <span>DP Dibayar</span>
                <span>Rp 0</span>
            </div>

            <div class="d-flex justify-content-between">
                <span>Total Tagihan</span>
                <span class="fw-bold">Rp 600.000</span>
            </div>

        </div>
    </div>

    <!-- Card 2 -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="d-flex justify-content-between">
                <div>
                    <small>#EB-2025-045</small><br>
                    <strong>Bridal Full Glam</strong><br>
                    <small>Sabtu, 06 Mei 2026 06:00 WIB</small>
                </div>

                <span class="badge bg-warning">
                    Belum Lunas
                </span>
            </div>

            <h3 class="fw-bold text-danger mt-3">
                Rp 600.000
            </h3>

            <small class="text-muted">
                Pelunasan jatuh tempo 06 Mei 2026
            </small>

            <hr>

            <h5>RINCIAN</h5>

            <div class="d-flex justify-content-between">
                <span>Harga Layanan</span>
                <span>Rp 600.000</span>
            </div>

            <div class="d-flex justify-content-between">
                <span>DP Dibayar</span>
                <span>Rp 300.000</span>
            </div>

            <div class="d-flex justify-content-between">
                <span>Sisa Tagihan</span>
                <span class="fw-bold">Rp 300.000</span>
            </div>

        </div>
    </div>

    <!-- Card 3 -->
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="d-flex justify-content-between">
                <div>
                    <small>#EB-2025-045</small><br>
                    <strong>Bridal Full Glam</strong><br>
                    <small>Sabtu, 06 Mei 2026 06:00 WIB</small>
                </div>

                <span class="badge bg-success">
                    Sudah Lunas
                </span>
            </div>

            <h3 class="fw-bold text-danger mt-3">
                Rp 600.000
            </h3>

            <small class="text-muted">
                Pelunasan 06 Mei 2026
            </small>

            <hr>

            <h5>RINCIAN</h5>

            <div class="d-flex justify-content-between">
                <span>Harga Layanan</span>
                <span>Rp 600.000</span>
            </div>

            <div class="d-flex justify-content-between">
                <span>DP Dibayar</span>
                <span>Rp 600.000</span>
            </div>

            <div class="d-flex justify-content-between">
                <span>Sisa Tagihan</span>
                <span class="fw-bold">Rp 0</span>
            </div>

        </div>
    </div>

</div>

@endsection
