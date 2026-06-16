<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimoni - Elora Beauty</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
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

        .main-content { flex-grow: 1; padding: 40px; overflow-y: auto; }
        .page-title { color: #A9265B; font-size: 24px; margin-bottom: 5px; }
        .page-subtitle { color: #D67A9C; font-size: 14px; margin-bottom: 30px; }
        
        .alert-success { background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px; }

        .testimoni-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(400px, 1fr)); gap: 20px; }
        .testimoni-card { background: white; border-radius: 12px; padding: 25px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); display: flex; flex-direction: column; }
        
        .card-header { display: flex; gap: 15px; align-items: center; margin-bottom: 15px; }
        .user-icon { background-color: #FCEEF5; color: #D67A9C; width: 45px; height: 45px; border-radius: 50%; display: flex; justify-content: center; align-items: center; font-size: 20px; }
        .user-info h3 { color: #333; font-size: 16px; margin-bottom: 3px; }
        .user-info .service-name { color: #D67A9C; font-size: 12px; font-weight: bold; }
        .user-info .date { color: #999; font-size: 11px; }

        .review-text { color: #555; font-size: 14px; line-height: 1.6; margin-bottom: 20px; flex-grow: 1; }

        .card-footer { border-top: 1px solid #FCEEF5; padding-top: 15px; display: flex; justify-content: flex-end; }
        .btn-hapus { background: transparent; border: 1px solid #FCEEF5; padding: 8px 20px; border-radius: 20px; color: #D67A9C; font-size: 12px; cursor: pointer; transition: 0.3s; }
        .btn-hapus:hover { border-color: #A9265B; color: #A9265B; background-color: #FCEEF5; }
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
                <li><a href="{{ route('admin.katalog') }}"><i class="fa-solid fa-book-open"></i> Katalog Makeup</a></li>
                <li class="active"><a href="{{ route('admin.testimoni') }}"><i class="fa-solid fa-star"></i> Testimoni</a></li>
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
        <h1 class="page-title">Ulasan & Testimoni</h1>
        <p class="page-subtitle">Moderasi Ulasan Dari Klien</p>

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <div class="testimoni-grid">
            @forelse($ulasans as $ulasan)
            <div class="testimoni-card">
                <div class="card-header">
                    <div class="user-icon"><i class="fa-solid fa-user"></i></div>
                    <div class="user-info">
                        <h3>{{ $ulasan->customer->nama_pelanggan ?? 'Anonim' }}</h3>
                        <div class="service-name">{{ $ulasan->pemesanan->katalogMakeup->nama_katalog ?? 'Layanan tidak diketahui' }}</div>
                        <div class="date">{{ date('d M Y', strtotime($ulasan->created_at)) }}</div>
                    </div>
                </div>

                <div class="review-text">
                    "{{ $ulasan->deskripsi }}"
                </div>

                <div class="card-footer">
                    <form action="{{ route('admin.testimoni.destroy', $ulasan->id_ulasan) }}" method="POST" onsubmit="return confirm('Hapus ulasan dari klien ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-hapus"><i class="fa-solid fa-trash"></i> Hapus</button>
                    </form>
                </div>
            </div>
            @empty
            <div style="grid-column: 1 / -1; text-align: center; color: #999; padding: 40px; background: white; border-radius: 12px;">
                Belum ada ulasan dari klien.
            </div>
            @endforelse
        </div>
    </main>

</body>
</html>