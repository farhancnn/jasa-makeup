@extends('layout.user.guest')

@section('title', 'User | Beranda')

@section('content')

{{-- 1 --}}
<section id="beranda" class="mt-3 position-relative">
    <img src="{{ asset('assets/img/user/user.png') }}" class="hero-img" alt="user">

    <div class="position-absolute top-50 start-50 translate-middle text-center">
        <h1 class="hero-title">
            Tampil Sempurna<br>di Hari Spesial
        </h1>
        <a href="/login" class="btn-home">
            Booking Sekarang
        </a>
    </div>
</section>

{{-- 2 --}}
<section id="tentang" class="container mt-4">
    <div class="row tentang-kami">
        <div class="col-md-5 p-0">
            <img src="{{ asset('assets/img/user/tentang.png') }}" class="img-tentang" alt="tentang">
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

        <div class="container mt-5">
            <div class="row justify-content-center g-4">

                <div class="col-md-3">
                    <div class="card layanan-card">
                        <img src="{{ asset('assets/img/user/layanan/layanan1.png') }}" class="card-img-top"
                            alt="makeup1">
                        <div class="card-body">
                            <h5 class="card-title">
                                Wisuda Makeup
                            </h5>
                            <p class="card-text">
                                Make up natural dan fresh untuk hari wisuda agar tampil percaya diri.
                            </p>
                            <h5 class="card-pay mb-0">Rp. 500.000</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card layanan-card">
                        <img src="{{ asset('assets/img/user/layanan/layanan2.png') }}" class="card-img-top"
                            alt="makeup2">
                        <div class="card-body">
                            <h5 class="card-title">
                                Engagement Makeup
                            </h5>
                            <p class="card-text">
                                Riasan khusus untuk acara lamaran dengan tampilan anggun dan menawan
                            </p>
                            <h5 class="card-pay mb-0">Rp. 500.000</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card layanan-card">
                        <img src="{{ asset('assets/img/user/layanan/layanan3.png') }}" class="card-img-top"
                            alt="makeup3">
                        <div class="card-body">
                            <h5 class="card-title">
                                Party Makeup
                            </h5>
                            <p class="card-text">
                                Riasan glamor untuk acara pesta dan event formal lainnya
                            </p>
                            <h5 class="card-pay mb-0">Rp. 500.000</h5>
                        </div>
                    </div>
                </div>

            </div>

            <div class="text-center mt-4">
                <a href="" class="lihat-semua">
                    Lihat Katalog Lengkap →
                </a>
            </div>
            
        </div>

    </div>
</section>

{{-- 4 --}}
<section id="testimoni" class="mt-4">
    <div class="testimoni mt-3">
        <div class="judul">
            <small class="subjudul">TESTIMONI</small>
            <h2 class="judul-tentang">Kata Mereka</h2>
        </div>

        <div class="container">
            <div class="testimoni-container">

                <div class="testimoni-card">
                    <div class="testimoni-user">
                        <i class="bi bi-person-circle"></i>

                        <div>
                            <h5>Dewi Safitri</h5>
                            <span>Makeup Engagement</span>
                            <p>5 Mei 2025</p>
                        </div>
                    </div>

                    <div class="rating">
                        ★★★★★
                    </div>

                    <div class="review">
                        MUA-nya super sabar dan hasilnya sangat natural sesuai keinginan.
                        Makeup tahan dari pagi sampai resepsi malam.
                    </div>

                </div>

                <div class="testimoni-card">
                    <div class="testimoni-user">
                        <i class="bi bi-person-circle"></i>

                        <div>
                            <h5>Dewi Safitri</h5>
                            <span>Makeup Engagement</span>
                            <p>5 Mei 2025</p>
                        </div>
                    </div>

                    <div class="rating">
                        ★★★★★
                    </div>

                    <div class="review">
                        MUA-nya super sabar dan hasilnya sangat natural sesuai keinginan.
                        Makeup tahan dari pagi sampai resepsi malam.
                    </div>

                </div>

                <div class="testimoni-card">
                    <div class="testimoni-user">
                        <i class="bi bi-person-circle"></i>

                        <div>
                            <h5>Dewi Safitri</h5>
                            <span>Makeup Engagement</span>
                            <p>5 Mei 2025</p>
                        </div>
                    </div>

                    <div class="rating">
                        ★★★★★
                    </div>

                    <div class="review">
                        MUA-nya super sabar dan hasilnya sangat natural sesuai keinginan.
                        Makeup tahan dari pagi sampai resepsi malam.
                    </div>
                </div>

            </div>
        </div>

        <div class="text-center mt-4">
            <a href="/ulasan" class="lihat-semua">
                Lihat Semua Ulasan →
            </a>
        </div>

    </div>
</section>

@endsection
