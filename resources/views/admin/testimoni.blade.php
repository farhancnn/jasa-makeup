@extends('layout.admin.master')

@section('title', 'Admin | Testimoni')

@section('content')

<main class="main-content">

    <div class="page-header">
        <h1>Ulasan & Testimoni</h1>
        <p>Moderasi Ulasan Dari Klien</p>
    </div>

    <div class="testimoni-container">

        {{-- 1 --}}
        <div class="testimoni-card">
            <div class="testimoni-user">
                <i class="fa-solid fa-circle-user"></i>

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

            <div class="testimoni-footer">
                <button class="btn-delete-testimoni">
                    X Hapus
                </button>
            </div>
        </div>

        {{-- 2 --}}
        <div class="testimoni-card">
            <div class="testimoni-user">
                <i class="fa-solid fa-circle-user"></i>

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

            <div class="testimoni-footer">
                <button class="btn-delete-testimoni">
                    X Hapus
                </button>
            </div>
        </div>

        {{-- 3 --}}
        <div class="testimoni-card">
            <div class="testimoni-user">
                <i class="fa-solid fa-circle-user"></i>

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

            <div class="testimoni-footer">
                <button class="btn-delete-testimoni">
                    X Hapus
                </button>
            </div>
        </div>

        {{-- 4 --}}
        <div class="testimoni-card">
            <div class="testimoni-user">
                <i class="fa-solid fa-circle-user"></i>

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

            <div class="testimoni-footer">
                <button class="btn-delete-testimoni">
                    X Hapus
                </button>
            </div>
        </div>

    </div>
</main>

@endsection
