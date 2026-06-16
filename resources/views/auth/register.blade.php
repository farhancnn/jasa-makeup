@extends('layouts.guest')
@section('content')
<div class="container py-5">
    <div class="card p-4 mx-auto" style="max-width: 400px; border-radius: 15px;">
        <h3 class="text-center" style="color: #AE3168;">Daftar Akun Baru</h3>
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>
            <button type="submit" class="btn w-100 text-white" style="background-color: #AE3168;">Daftar Sekarang</button>
        </form>
    </div>
</div>
@endsection