<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-width=1.0">
    <title>Beranda Admin - Elora Beauty</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Reset & Base Styles */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { display: flex; height: 100vh; background-color: #FCEEF5; }

        /* --- Sidebar Styles --- */
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

        /* --- Main Content Styles --- */
        .main-content { flex-grow: 1; padding: 40px; overflow-y: auto; }
        .page-title { color: #A9265B; margin-bottom: 5px; font-size: 24px; }
        .page-subtitle { color: #D67A9C; font-size: 14px; margin-bottom: 40px; }

        /* --- Cards Container --- */
        .cards-container { display: flex; gap: 20px; flex-wrap: wrap; }
        
        .card { 
            background: white; 
            border: 1px solid #A9265B; 
            border-radius: 12px; 
            padding: 25px 20px; 
            width: calc(25% - 15px); 
            min-width: 180px; 
            text-align: center; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        
        .card h3 { font-size: 12px; color: #A9265B; margin-bottom: 15px; text-transform: uppercase; font-weight: 700;}
        .card .number { font-size: 32px; font-weight: bold; color: #A9265B; margin-bottom: 15px; }
        
        /* Pill Badges */
        .badge { display: inline-block; padding: 6px 15px; border-radius: 20px; font-size: 11px; font-weight: bold; }
        .badge-pink { background-color: #FCEEF5; color: #A9265B; }
        .badge-orange { background-color: #FFF3E0; color: #E65100; }
        .badge-green { background-color: #E8F5E9; color: #2E7D32; }
        .badge-yellow { background-color: #FFFDE7; color: #F57F17; }
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
                <li class="active"><a href="{{ route('admin.beranda') }}"><i class="fa-solid fa-house"></i> Beranda</a></li>
                <li><a href="{{ route('admin.booking') }}"><i class="fa-solid fa-calendar-check"></i> Booking</a></li>
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
        <h1 class="page-title">Beranda</h1>
        <p class="page-subtitle">Selamat datang di halaman Admin</p>

        <div class="cards-container">
            <div class="card">
                <h3>Total Booking</h3>
                <div class="number">{{ $totalBooking }}</div>
                <span class="badge badge-pink">Semua Pesanan</span>
            </div>
            
            <div class="card">
                <h3>Menunggu Konfirmasi</h3>
                <div class="number">{{ str_pad($menungguKonfirmasi, 2, '0', STR_PAD_LEFT) }}</div>
                <span class="badge badge-orange">Perlu Direspons</span>
            </div>
            
            <div class="card">
                <h3>Jumlah Katalog</h3>
                <div class="number">{{ str_pad($jumlahKatalog, 2, '0', STR_PAD_LEFT) }}</div>
                <span class="badge badge-green">Selalu Update</span>
            </div>
            
            <div class="card">
                <h3>Jumlah Ulasan</h3>
                <div class="number">{{ str_pad($jumlahUlasan, 2, '0', STR_PAD_LEFT) }}</div>
                <span class="badge badge-yellow">Rating Customer</span>
            </div>
        </div>
    </main>

</body>
</html>