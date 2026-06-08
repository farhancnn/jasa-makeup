@extends('layout.admin.master')

@section('title', 'Admin | Katalog')

@section('content')

<main class="main-content">

    <div class="page-header">
        <h1>Katalog Makeup</h1>
        <p>Kelola Daftar Layanan & Harga</p>
    </div>

    <div class="booking-header">
        <h2>Kelola Katalog Layanan (20 item)</h2>

        <button class="btn-add" data-bs-toggle="modal" data-bs-target="#tambahLayananModal">
            + Tambah Layanan
        </button>
    </div>

    <div class="catalog-container">

        {{-- 1 --}}
        <div class="catalog-card">
            <img src="{{ asset('assets/img/user/layanan/layanan2.png') }}" alt="makeup">

            <div class="catalog-body">
                <h3>Party Makeup</h3>
                <p>Riasan glamor untuk acara pesta dan event formal lainnya</p>

                <h4>Rp. 600.000</h4>

                <div class="catalog-action">
                    <button class="btn-edit" data-bs-toggle="modal" data-bs-target="#EditLayananModal">
                        <i class="fa-regular fa-pen-to-square"></i> Edit
                    </button>

                    <button class="btn-delete">
                        <i class="fa-regular fa-trash-can"></i> Hapus
                    </button>
                </div>
            </div>
        </div>

        {{-- 2 --}}
        <div class="catalog-card">
            <img src="{{ asset('assets/img/user/layanan/layanan2.png') }}" alt="makeup">

            <div class="catalog-body">
                <h3>Party Makeup</h3>
                <p>Riasan glamor untuk acara pesta dan event formal lainnya</p>

                <h4>Rp. 600.000</h4>

                <div class="catalog-action">
                    <button class="btn-edit">
                        <i class="fa-regular fa-pen-to-square"></i> Edit
                    </button>

                    <button class="btn-delete">
                        <i class="fa-regular fa-trash-can"></i> Hapus
                    </button>
                </div>
            </div>
        </div>

        {{-- 3 --}}
        <div class="catalog-card">
            <img src="{{ asset('assets/img/user/layanan/layanan2.png') }}" alt="makeup">

            <div class="catalog-body">
                <h3>Party Makeup</h3>
                <p>Riasan glamor untuk acara pesta dan event formal lainnya</p>

                <h4>Rp. 600.000</h4>

                <div class="catalog-action">
                    <button class="btn-edit">
                        <i class="fa-regular fa-pen-to-square"></i> Edit
                    </button>

                    <button class="btn-delete">
                        <i class="fa-regular fa-trash-can"></i> Hapus
                    </button>
                </div>
            </div>
        </div>

    </div>

    {{-- 4 --}}
    <div class="modal fade" id="tambahLayananModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content layanan-modal">

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Layanan</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>

                <div class="modal-body">

                    <form>

                        <div class="mb-3">
                            <label class="form-label">
                                Gambar Layanan
                            </label>

                            <input type="file" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Nama Katalog
                            </label>

                            <input type="text" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Deskripsi
                            </label>

                            <textarea class="form-control" rows="4">
                        </textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Harga
                            </label>

                            <input type="number" class="form-control">
                        </div>

                        <button type="submit" class="btn-save">
                            Simpan Layanan
                        </button>

                    </form>

                </div>

            </div>
        </div>
    </div>

    {{-- 5 --}}
    <div class="modal fade" id="EditLayananModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content layanan-modal">

                <div class="modal-header">
                    <h5 class="modal-title">Edit Layanan</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>

                <div class="modal-body">

                    <form>

                        <div class="mb-3">
                            <label class="form-label">
                                Gambar Layanan
                            </label>

                            <input type="file" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Nama Katalog
                            </label>

                            <input type="text" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Deskripsi
                            </label>

                            <textarea class="form-control" rows="4">
                        </textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Harga
                            </label>

                            <input type="number" class="form-control">
                        </div>

                        <button type="submit" class="btn-save">
                            Edit Layanan
                        </button>

                    </form>

                </div>

            </div>
        </div>
    </div>

</main>

@endsection
