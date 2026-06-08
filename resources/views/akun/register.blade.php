@extends('layout.login.login')

@section('title', 'Register Page')

@section('content')

<div class="container text-center">
    <div class="row">
        <div class="col left-side text-white d-flex flex-column justify-content-center text-center position-relative">
            <a href="/" class="bi bi-arrow-left logo-top"></a>
            <h2>Elora Beauty</h2>
            <p>Booking Makeup Mudah, Cepat dan Praktis</p>
        </div>

        <div class="col-12 col-lg-6 d-flex align-items-center justify-content-center">

            <div class="form-box">

                <h3>Buat Akun Baru</h3>
                <h6>Daftar untuk mulai melakukan pemesanan makeup di Elora Beauty</h6>

                <form class="signin-form">

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" placeholder="Masukan Nama" name="name" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Masukan Email" name="email" required>
                    </div>

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
                        Daftar
                    </button>

                    <p class="link text-center mt-3">
                        Sudah memiliki akun?
                        <a href="/login">Login</a>
                    </p>

                </form>

            </div>

        </div>

    </div>
</div>

@endsection
