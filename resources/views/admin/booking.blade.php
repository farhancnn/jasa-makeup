<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-width=1.0">
    <title>Booking - Elora Beauty</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Base & Sidebar Styles (Sama seperti beranda) */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { display: flex; height: 100vh; background-color: #FCEEF5; }
        .sidebar { width: 250px; background-color: #A9265B; color: white; display: flex; flex-direction: column; justify-content: space-between; }
        .sidebar-header { padding: 20px; text-align: center; border-bottom: 1px solid #C04A76; }
        .sidebar-header h2 { font-size: 20px; letter-spacing: 1px; margin-bottom: 5px; }
        .sidebar-header p { font-size: 12px; color: #F0B3CB; }
        .sidebar-profile { display: flex; align-items: center; padding: 15px 20px; gap: 10px; border-bottom: 1px solid #C04A76; }
        .sidebar-profile i { color: #FCEEF5; }
        .nav-menu { list-style: none; padding: 10px 0; flex-grow: 1; }
        .nav-menu li a { display: flex; align-items: center; padding: 15px 20px; color: white; text-decoration: none; gap: 15px; transition: 0.3s; }
        .nav-menu li a:hover, .nav-menu li.active a { background-color: #8C1C49; }
        .logout { padding: 15px 20px; border-top: 1px solid #C04A76; }
        .logout a { color: white; text-decoration: none; display: flex; align-items: center; justify-content: flex-end; gap: 10px; }

        /* Main Content Styles */
        .main-content { flex-grow: 1; padding: 40px; overflow-y: auto; }
        .page-title { color: #A9265B; margin-bottom: 5px; font-size: 24px; }
        .page-subtitle { color: #D67A9C; font-size: 14px; margin-bottom: 30px; }

        /* Table Styles */
        .table-container { background: white; border-radius: 12px; padding: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th { padding: 15px 10px; border-bottom: 2px solid #FCEEF5; color: #A9265B; font-size: 14px; }
        td { padding: 15px 10px; border-bottom: 1px solid #FCEEF5; font-size: 14px; color: #333; }
        
        /* Badges */
        .badge { padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: bold; display: inline-block; text-align: center; }
        .badge-orange { background-color: #FFF3E0; color: #E65100; } /* Menunggu */
        .badge-green { background-color: #E8F5E9; color: #2E7D32; } /* Selesai / Dikonfirmasi */

        /* Form Update Status */
        .status-form { display: flex; gap: 5px; align-items: center; }
        .status-select { padding: 5px; border: 1px solid #D67A9C; border-radius: 5px; color: #A9265B; outline: none; }
        .btn-update { background-color: #A9265B; color: white; border: none; padding: 6px 10px; border-radius: 5px; cursor: pointer; font-size: 12px; }
        .btn-update:hover { background-color: #8C1C49; }
        
        /* Alert Success */
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
                <li class="active"><a href="{{ route('admin.booking') }}"><i class="fa-solid fa-calendar-check"></i> Booking</a></li>
                <li><a href="{{ route('admin.katalog') }}"><i class="fa-solid fa-book-open"></i> Katalog Makeup</a></li>
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
        <h1 class="page-title">Booking</h1>
        <p class="page-subtitle">Kelola Semua Pesanan Makeup</p>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Klien</th>
                        <th>Layanan</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Status Saat Ini</th>
                        <th>Ubah Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pemesanans as $pesanan)
                    <tr>
                        <td>{{ str_pad($pesanan->id_pesanan, 3, '0', STR_PAD_LEFT) }}</td>
                        <td>{{ $pesanan->customer->nama_pelanggan ?? 'Data Terhapus' }}</td>
                        <td>{{ $pesanan->katalogMakeup->nama_katalog ?? 'Katalog Terhapus' }}</td>
                        <td>{{ date('d M Y', strtotime($pesanan->tanggal)) }}</td>
                        <td>Rp. {{ number_format($pesanan->katalogMakeup->harga ?? 0, 0, ',', '.') }}</td>
                        <td>
                            @if($pesanan->status_pesanan == 'menunggu konfirmasi')
                                <span class="badge badge-orange">Menunggu</span>
                            @else
                                <span class="badge badge-green">{{ ucfirst($pesanan->status_pesanan) }}</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.booking.update', $pesanan->id_pesanan) }}" method="POST" class="status-form">
                                @csrf
                                <select name="status" class="status-select">
                                    <option value="menunggu konfirmasi" {{ $pesanan->status_pesanan == 'menunggu konfirmasi' ? 'selected' : '' }}>Menunggu</option>
                                    <option value="dikonfirmasi" {{ $pesanan->status_pesanan == 'dikonfirmasi' ? 'selected' : '' }}>Dikonfirmasi</option>
                                    <option value="selesai" {{ $pesanan->status_pesanan == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                </select>
                                <button type="submit" class="btn-update">Update</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 20px;">Belum ada data pesanan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>