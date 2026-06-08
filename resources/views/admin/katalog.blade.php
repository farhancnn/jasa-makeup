<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-width=1.0">
    <title>Katalog - Elora Beauty</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Base & Sidebar */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { display: flex; height: 100vh; background-color: #FCEEF5; }
        .sidebar { width: 250px; background-color: #A9265B; color: white; display: flex; flex-direction: column; justify-content: space-between; }
        .sidebar-header { padding: 20px; text-align: center; border-bottom: 1px solid #C04A76; }
        .sidebar-profile { display: flex; align-items: center; padding: 15px 20px; gap: 10px; border-bottom: 1px solid #C04A76; }
        .nav-menu { list-style: none; padding: 10px 0; flex-grow: 1; }
        .nav-menu li a { display: flex; align-items: center; padding: 15px 20px; color: white; text-decoration: none; gap: 15px; transition: 0.3s; }
        .nav-menu li a:hover, .nav-menu li.active a { background-color: #8C1C49; }
        .logout { padding: 15px 20px; border-top: 1px solid #C04A76; }
        .logout a { color: white; text-decoration: none; display: flex; align-items: center; justify-content: flex-end; gap: 10px; }
        
        /* Main Content */
        .main-content { flex-grow: 1; padding: 40px; overflow-y: auto; }
        .header-action { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        .page-title { color: #A9265B; font-size: 24px; }
        .page-subtitle { color: #D67A9C; font-size: 14px; }
        
        .btn-tambah { background-color: white; color: #A9265B; border: 1px solid #A9265B; padding: 10px 20px; border-radius: 8px; cursor: pointer; font-weight: bold; }
        .btn-tambah:hover { background-color: #FCEEF5; }

        /* Grid Katalog */
        .katalog-grid { display: flex; flex-wrap: wrap; gap: 20px; }
        .katalog-card { background: white; border-radius: 12px; overflow: hidden; width: calc(33.333% - 15px); min-width: 250px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .katalog-img { width: 100%; height: 200px; object-fit: cover; }
        .katalog-body { padding: 20px; }
        .katalog-title { color: #A9265B; font-size: 18px; margin-bottom: 10px; }
        .katalog-desc { color: #D67A9C; font-size: 12px; margin-bottom: 15px; line-height: 1.5; }
        .katalog-price { color: #A9265B; font-size: 20px; font-weight: bold; margin-bottom: 20px; }
        
        .card-actions { display: flex; gap: 10px; border-top: 1px solid #FCEEF5; padding-top: 15px; }
        .btn-edit, .btn-hapus { flex: 1; background: white; border: 1px solid #FCEEF5; padding: 8px; border-radius: 20px; cursor: pointer; color: #A9265B; font-size: 12px; display: flex; justify-content: center; align-items: center; gap: 5px;}
        .btn-edit:hover { border-color: #A9265B; }
        .btn-hapus { color: #e74c3c; }
        .btn-hapus:hover { border-color: #e74c3c; }

        /* Modal Pop-up */
        .modal-overlay { position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); display: none; justify-content: center; align-items: center; z-index: 1000; }
        .modal-content { background: white; padding: 30px; border-radius: 12px; width: 400px; position: relative; }
        .modal-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; border-bottom: 1px solid #FCEEF5; padding-bottom: 10px; }
        .modal-header h3 { color: #A9265B; }
        .close-modal { cursor: pointer; color: #333; font-size: 20px; border: none; background: none; }
        
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; color: #A9265B; font-size: 12px; font-weight: bold; margin-bottom: 5px; }
        .form-group input, .form-group textarea { width: 100%; padding: 10px; border: 1px solid #FCEEF5; border-radius: 8px; outline: none; }
        .btn-submit { width: 100%; background-color: #A9265B; color: white; padding: 12px; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; margin-top: 10px;}
        .alert-success { background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px; }
    </style>
</head>
<body>

    <aside class="sidebar">
        <div>
            <div class="sidebar-header">
                <h2>ELORA BEAUTY</h2>
                <p>Admin Page</p>
            </div>
            <div class="sidebar-profile">
                <i class="fa-solid fa-circle-user fa-2x"></i>
                <span style="font-size: 14px; font-weight: 600;">ELORA BEAUTY</span>
            </div>
            <ul class="nav-menu">
                <li><a href="{{ route('admin.beranda') }}"><i class="fa-solid fa-house"></i> Beranda</a></li>
                <li><a href="{{ route('admin.booking') }}"><i class="fa-solid fa-calendar-check"></i> Booking</a></li>
                <li class="active"><a href="{{ route('admin.katalog') }}"><i class="fa-solid fa-book-open"></i> Katalog Makeup</a></li>
                <li><a href="{{ route('admin.testimoni') }}"><i class="fa-solid fa-star"></i> Testimoni</a></li>
            </ul>
        </div>
        <div class="logout">
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-arrow-right-from-bracket"></i> Keluar
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </aside>

    <main class="main-content">
        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <div class="header-action">
            <div>
                <h1 class="page-title">Katalog Makeup</h1>
                <p class="page-subtitle">Kelola Daftar Layanan & Harga</p>
            </div>
            <button class="btn-tambah" onclick="openModal('modalTambah')">+ Tambah Layanan</button>
        </div>

        <div class="katalog-grid">
            @foreach($katalogs as $item)
            <div class="katalog-card">
                <img src="{{ asset('storage/katalog/' . $item->gambar) }}" class="katalog-img" alt="Makeup">
                <div class="katalog-body">
                    <h3 class="katalog-title">{{ $item->nama_katalog }}</h3>
                    <p class="katalog-desc">{{ $item->deskripsi }}</p>
                    <div class="katalog-price">Rp. {{ number_format($item->harga, 0, ',', '.') }}</div>
                    
                    <div class="card-actions">
                        <button class="btn-edit" onclick="openModal('modalEdit{{ $item->id_katalog }}')">
                            <i class="fa-regular fa-pen-to-square"></i> Edit
                        </button>
                        <form action="{{ route('admin.katalog.destroy', $item->id_katalog) }}" method="POST" style="flex:1;" onsubmit="return confirm('Yakin ingin menghapus layanan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-hapus" style="width: 100%;">
                                <i class="fa-regular fa-trash-can"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal-overlay" id="modalEdit{{ $item->id_katalog }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Edit Layanan</h3>
                        <button class="close-modal" onclick="closeModal('modalEdit{{ $item->id_katalog }}')">&times;</button>
                    </div>
                    <form action="{{ route('admin.katalog.update', $item->id_katalog) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Gambar Layanan</label>
                            <input type="file" name="gambar" accept="image/*">
                        </div>
                        <div class="form-group">
                            <label>Nama Katalog</label>
                            <input type="text" name="nama_katalog" value="{{ $item->nama_katalog }}" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" rows="3" required>{{ $item->deskripsi }}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" name="harga" value="{{ $item->harga }}" required>
                        </div>
                        <button type="submit" class="btn-submit">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </main>

    <div class="modal-overlay" id="modalTambah">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Tambah Layanan</h3>
                <button class="close-modal" onclick="closeModal('modalTambah')">&times;</button>
            </div>
            <form action="{{ route('admin.katalog.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Gambar Layanan</label>
                    <input type="file" name="gambar" accept="image/*" required>
                </div>
                <div class="form-group">
                    <label>Nama Katalog</label>
                    <input type="text" name="nama_katalog" required>
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label>Harga</label>
                    <input type="number" name="harga" required>
                </div>
                <button type="submit" class="btn-submit">Simpan Layanan</button>
            </form>
        </div>
    </div>

    <script>
        function openModal(modalId) { document.getElementById(modalId).style.display = 'flex'; }
        function closeModal(modalId) { document.getElementById(modalId).style.display = 'none'; }
    </script>
</body>
</html>