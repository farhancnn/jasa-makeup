@extends('layout.admin.master')

@section('title', 'Admin | Beranda')

@section('content')

<main class="main-content">
   <div class="page-header">
        <h1>Admin</h1>
        <p>Selamat Datang di Halaman Admin</p>
    </div>

    <div class="cards-container">
        <div class="card">
            <h3>Total Booking</h3>
            <div class="number">50</div>
            <span class="badge badge-pink">Semua Pesanan</span>
        </div>

        <div class="card">
            <h3>Menunggu Konfirmasi</h3>
            <div class="number">05</div>
            <span class="badge badge-orange">Perlu Direspons</span>
        </div>

        <div class="card">
            <h3>Jumlah Katalog</h3>
            <div class="number">20</div>
            <span class="badge badge-green">Selalu Update</span>
        </div>

        <div class="card">
            <h3>Jumlah Ulasan</h3>
            <div class="number">40</div>
            <span class="badge badge-yellow">Rating Customer</span>
        </div>
    </div>
</main>

@endsection
