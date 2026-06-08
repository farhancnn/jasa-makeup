@extends('layout.userlog.user')

@section('title', 'User | Testimoni')

@section('content')

<div class="user-container">

    <div class="user-title">
        <h2>Form Testimoni</h2>
        <p>Mohon Diisi</p>
    </div>

    <div class="testimoni-form">

        <h3>Tulis Testimonimu</h3>

        <p class="subtitle">
            Pengalaman kamu sangat berarti bagi kami dan calon pembeli lainnya,
            Yuk ceritakan!
        </p>

        <form action="" method="POST">
            @csrf

            <!-- Nama -->
            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" placeholder="Nama Lengkap Kamu...">
            </div>

            <!-- Layanan -->
            <div class="mb-3">
                <label>Layanan yang digunakan</label>
                <select class="form-control">
                    <option>Pilih Layanan</option>
                    <option>Party Makeup</option>
                    <option>Bridal Makeup</option>
                    <option>Engagement Makeup</option>
                </select>
            </div>

            <!-- Tanggal -->
            <div class="mb-3">
                <label>Tanggal Penggunaan Layanan</label>
                <input type="date" class="form-control">
            </div>

            <!-- Rating -->
            <div class="mb-3">
                <label>Rating</label>

                <div class="rating">
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                    <span>★</span>
                </div>
            </div>

            <!-- Testimoni -->
            <div class="mb-3">
                <label>Ceritakan Pengalamanmu</label>

                <textarea class="form-control" rows="5"
                    placeholder="Bagaimana pengalamanmu menggunakan layanan Elora Beauty? Ceritakan detail hasilnya, pelayanannya, dll..."></textarea>
            </div>

            <!-- Checkbox -->
            <div class="form-check mb-4">
                <input class="form-check-input" type="checkbox">

                <label class="form-check-label">
                    Saya setuju testimoni ini ditampilkan di website
                    <span class="brand">Elora Beauty</span>
                    sebagai referensi pelanggan lain.
                </label>
            </div>

            <button type="submit" class="btn-testimoni">
                Kirim Testimoni
            </button>

        </form>

        <div class="info-box">
            Testimonimu akan ditinjau admin terlebih dahulu sebelum ditampilkan.
            Terima kasih sudah berbagi!
        </div>

    </div>
</div>

@endsection
