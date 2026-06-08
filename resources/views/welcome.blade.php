<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-width=1.0">
    <title>Elora Beauty</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        /* --- Reset & Base --- */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { background-color: #FFF5F8; /* Warna background pink sangat pudar seperti di gambar */ color: #333; overflow-x: hidden; }
        
        /* --- Navbar --- */
        header { display: flex; justify-content: space-between; align-items: center; padding: 25px 8%; background-color: transparent; }
        .logo { font-size: 24px; font-weight: 700; color: #A9265B; text-decoration: none; letter-spacing: 0.5px; }
        
        .nav-links { display: flex; gap: 40px; list-style: none; }
        .nav-links a { text-decoration: none; color: #555; font-weight: 500; font-size: 15px; transition: 0.3s; }
        .nav-links a.active { color: #A9265B; font-weight: 600; }
        .nav-links a:hover { color: #A9265B; }
        
        /* Tombol Login (Outline) */
        .btn-login { border: 1.5px solid #A9265B; color: #A9265B; padding: 10px 30px; border-radius: 30px; text-decoration: none; font-weight: 500; font-size: 15px; transition: 0.3s; }
        .btn-login:hover { background-color: #A9265B; color: white; }

        /* --- Hero Section --- */
        .hero { display: flex; align-items: center; justify-content: space-between; padding: 20px 8% 50px 8%; min-height: calc(100vh - 90px); gap: 40px; }
        
        /* Bagian Teks (Kiri) */
        .hero-text { flex: 1; max-width: 50%; }
        .hero-text h1 { font-size: 3.5rem; color: #222; line-height: 1.15; margin-bottom: 20px; font-weight: 700; }
        .hero-text h1 span { color: #A9265B; } /* Untuk highlight warna pink pada teks */
        .hero-text p { font-size: 1rem; color: #666; margin-bottom: 40px; line-height: 1.7; max-width: 90%; }
        
        /* Tombol Booking (Solid) */
        .btn-book { background-color: #A9265B; color: white; padding: 15px 40px; border-radius: 30px; text-decoration: none; font-size: 16px; font-weight: 600; display: inline-block; box-shadow: 0 8px 15px rgba(169, 38, 91, 0.25); transition: 0.3s; }
        .btn-book:hover { transform: translateY(-3px); box-shadow: 0 12px 20px rgba(169, 38, 91, 0.35); }

        /* --- Bagian Gambar Kolase (Kanan) --- */
        .hero-image { flex: 1; display: flex; justify-content: flex-end; }
        .collage { display: grid; grid-template-columns: 1fr 1fr; grid-template-rows: 1fr 1fr; gap: 15px; width: 100%; max-width: 500px; height: 500px; }
        
        .collage img { width: 100%; height: 100%; object-fit: cover; box-shadow: 0 5px 15px rgba(0,0,0,0.08); }
        
        /* Gambar Kiri Besar */
        .img-large { grid-column: 1; grid-row: 1 / 3; border-radius: 120px 20px 20px 20px; /* Melengkung di kiri atas */ }
        
        /* Gambar Kanan Atas */
        .img-small-top { grid-column: 2; grid-row: 1; border-radius: 20px 120px 20px 20px; /* Melengkung di kanan atas */ }
        
        /* Gambar Kanan Bawah */
        .img-small-bottom { grid-column: 2; grid-row: 2; border-radius: 20px 20px 120px 20px; /* Melengkung di kanan bawah */ }
    </style>
</head>
<body>

    <header>
        <a href="/" class="logo">elora beauty.</a>
        <ul class="nav-links">
            <li><a href="#" class="active">Beranda</a></li>
            <li><a href="#">Katalog Layanan</a></li>
            <li><a href="#">Tentang Kami</a></li>
            <li><a href="#">Testimoni</a></li>
        </ul>
        <a href="/login" class="btn-login">Login</a>
    </header>

    <section class="hero">
        <div class="hero-text">
            <h1>Jasa Makeup Panggilan Terpercaya di <span>Kota Anda</span></h1>
            <p>Tampil memukau di setiap momen spesialmu. Kami menyediakan layanan makeup profesional untuk wisuda, pernikahan, pesta, dan acara lainnya dengan hasil natural dan tahan lama.</p>
            
            <a href="#" class="btn-book">Booking Sekarang</a>
        </div>

        <div class="hero-image">
            <div class="collage">
                <img src="https://images.unsplash.com/photo-1516975080661-46bfa20281ae?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Makeup Artist" class="img-large">
                
                <img src="https://images.unsplash.com/photo-1596462502278-27bfdc403348?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Eye Makeup" class="img-small-top">
                
                <img src="https://images.unsplash.com/photo-1522337360788-8b13fee7c9af?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="Lipstick" class="img-small-bottom">
            </div>
        </div>
    </section>

</body>
</html>