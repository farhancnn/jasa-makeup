@extends('layout.login.login')

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

                <form class="signin-form">

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Masukan Username" name="username" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Masukan Password" name="password"
                            required>
                    </div>

                    <button type="submit" class="btn submit w-100 mt-4">
                        Masuk ke Website
                    </button>

                    <p class="link text-center mt-3">
                        Tidak memiliki akun?
                        <a href="/register">Daftar Sekarang</a>
                    </p>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection
