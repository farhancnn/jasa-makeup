<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pemesanan Jasa Makeup</title>
</head>
<body>
    <h2>Form Pemesanan: {{ $katalog->nama_katalog }}</h2>
    <p>Harga: Rp {{ number_format($katalog->harga, 0, ',', '.') }}</p>

    <form action="{{ route('pemesanan.store') }}" method="POST">
        @csrf <input type="hidden" name="id_katalog" value="{{ $katalog->id_katalog }}">

        <h3>Data Diri</h3>
        <label>Nama Lengkap:</label><br>
        <input type="text" name="nama_pelanggan" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Nomor WhatsApp/Telp:</label><br>
        <input type="text" name="no_telp" required><br><br>

        <label>Alamat Lengkap:</label><br>
        <textarea name="alamat" required></textarea><br><br>

        <h3>Detail Jadwal Makeup</h3>
        <label>Tanggal Makeup:</label><br>
        <input type="date" name="tanggal" required><br><br>

        <label>Waktu (Jam):</label><br>
        <input type="time" name="waktu" required><br><br>

        <label>Lokasi Makeup (Nama Gedung/Rumah):</label><br>
        <textarea name="lokasi" required></textarea><br><br>

        <button type="submit">Lanjut ke Pembayaran</button>
    </form>
</body>
</html>