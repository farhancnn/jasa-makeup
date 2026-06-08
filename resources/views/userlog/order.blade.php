@extends('layout.userlog.user')

@section('title', 'User | Order')

@section('content')

<div class="user-container">

    <div class="user-title">
        <h2>Booking Sekarang</h2>
        <p>Reservasi</p>
    </div>

    @include('partials.partials_user.booking')

    <div class="booking-wrapper">

        <!-- KIRI -->
        <div class="booking-info">

            <p class="booking-desc">
                Pesan jadwal riasmu sekarang dan tampil sempurna di hari istimewa.
                Kami siap membantu kamu mendapatkan tampilan terbaik.
            </p>

            <div class="step">
                <span>1</span>
                <p>Pilih layanan dan tanggal yang diinginkan</p>
            </div>

            <div class="step">
                <span>2</span>
                <p>Isi form reservasi dengan data lengkap</p>
            </div>

            <div class="step">
                <span>3</span>
                <p>Tunggu konfirmasi dari tim kami via WhatsApp</p>
            </div>

            <div class="step">
                <span>4</span>
                <p>Lakukan pembayaran DP untuk mengunci jadwal</p>
            </div>

        </div>

        <!-- KANAN -->
        <div class="booking-form">

            <h3>Form Reservasi</h3>

            <form action="" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Nama Lengkap</label>
                    <input type="text" class="form-control" placeholder="Nama Lengkap Kamu...">
                </div>

                <div class="mb-3">
                    <label>No. Whatsapp</label>
                    <input type="text" class="form-control" placeholder="+62...">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label>Pilih Layanan</label>
                        <select class="form-control">
                            <option>Pilih Layanan</option>
                            <option>Party Makeup</option>
                            <option>Bridal Makeup</option>
                            <option>Engagement Makeup</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label>Tanggal Acara</label>
                        <input type="date" class="form-control">
                    </div>
                </div>

                <div class="mt-3">
                    <label>Lokasi Acara</label>
                    <input type="text" class="form-control" placeholder="Alamat Acara...">
                </div>

                <div class="mt-3">
                    <label>Catatan Tambahan (Opsional)</label>
                    <textarea class="form-control" rows="3" placeholder="Referensi makeup, tema, dll...."></textarea>
                </div>

                <button type="submit" class="booking-btn">
                    Kirim Permintaan Booking
                </button>

            </form>

        </div>

    </div>

</div>

@endsection
