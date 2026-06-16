@extends('layouts.guest')

@section('title', 'Katalog Makeup - Elora Beauty')

@section('content')
<section class="mt-4 pb-5" style="background: #FAE4ED; min-height: 80vh;">
    <div class="layanan mt-3 pt-5">
        <div class="judul">
            <small class="subjudul">MAKEUP</small>
            <h2 class="judul-tentang">Katalog Lengkap Kami</h2>
        </div>

        <div class="container mt-5">
            <div class="row justify-content-center g-4">

                @foreach($katalogs as $katalog)
                <div class="col-md-3">
                    <div class="card layanan-card">
                        
                        <img src="{{ asset('storage/katalog/' . $katalog->gambar) }}" class="card-img-top" alt="makeup">
                        
                        <div class="card-body">
                            <h5 class="card-title">
                                {{ $katalog->nama_layanan }}
                            </h5>
                            <p class="card-text">
                                {{ $katalog->deskripsi }}
                            </p>
                            <h5 class="card-pay mb-0">
                                Rp. {{ number_format($katalog->harga, 0, ',', '.') }}
                            </h5>
                            
                            <a href="/pesan/{{ $katalog->id_katalog }}" class="btn submit w-100 mt-3 text-white" style="background-color: #A9265B; border-radius: 10px;">
                                Booking Ini
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
@endsection