@extends('layouts.auth')

@section('title', 'Login Page')

@section('content')

<div class="container text-center">
    <div class="row">
        <div class="col left-side text-white d-flex flex-column justify-content-center text-center position-relative">
            <a href="/" class="bi bi-arrow-left logo-top"></a>
            <h2>Elora Beauty</h2>
            <p>Platform Pemesanan Jasa Makeup Untuk Berbagai Acara Spesia</p>
        </div>

        <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center">

<div class="form-box">

    <h3>Selamat Datang di Elora Beauty</h3>
    <h6>Masuk untuk mengelola pesanan atau melakukan pemesanan makeup</h6>

   
    @if($errors->any())
        <div class="alert alert-danger p-2 text-center mt-3" style="font-size: 14px;">
            {{ $errors->first() }}
        </div>
    @endif

   
    <form class="signin-form" action="/login" method="POST">
        
        
        @csrf 

        <div class="form-group mt-3">
            <label>Email</label>
            <input type="email" class="form-control" placeholder="Masukan Email Anda" name="email" value="{{ old('email') }}" required autofocus>
        </div>

        <div class="form-group mt-3">
            <label>Password</label>
            <input type="password" class="form-control" placeholder="Masukan Password" name="password" required>
        </div>

        <button type="submit" class="btn submit w-100 mt-4 text-white" style="background-color: #A9265B;">
            Masuk ke Website
        </button>

        <p class="text-center">
    Tidak memiliki akun? <a href="{{ route('register') }}">Daftar Sekarang</a>
</p>

    </form>

</div>

        </div>

    </div>
</div>

@endsection
