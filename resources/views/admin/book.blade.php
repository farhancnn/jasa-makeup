@extends('layout.admin.master')

@section('title', 'Admin | Booking')

@section('content')

<main class="main-content">

    <div class="page-header">
        <h1>Booking</h1>
        <p>Kelola Semua Pesanan Makeup</p>
    </div>

    <div class="booking-header">
        <h2>Daftar Pesanan</h2>
    </div>

    <div class="filter-container">
        <button class="filter-btn active">Semua</button>
        <button class="filter-btn">Menunggu</button>
        <button class="filter-btn">Selesai</button>
    </div>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Klien</th>
                    <th>Layanan</th>
                    <th>Tanggal</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>001</td>
                    <td>Dewi Syafitri</td>
                    <td>Bridal Makeup</td>
                    <td>5 Mei 2025</td>
                    <td>Rp. 850.000</td>
                    <td><span class="status waiting">Menunggu</span></td>
                </tr>

                <tr>
                    <td>002</td>
                    <td>Ananda Sari</td>
                    <td>Bridal Makeup</td>
                    <td>6 Mei 2025</td>
                    <td>Rp. 850.000</td>
                    <td><span class="status success">Selesai</span></td>
                </tr>
            </tbody>
        </table>
    </div>

</main>

@endsection