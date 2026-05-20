<?php
// Memanggil logika proses data dari file terpisah
include 'proses.php';
?>
<!-- Bagian Frontend untuk menampilkan form dan tabel data pengguna pake HTML -->
<!DOCTYPE html>
<html lang="id">
<!-- Halaman utama untuk menampilkan form dan tabel data pengguna -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Web Responsive</title>
<!-- Link ke file CSS untuk styling halaman -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>Website Pengumpulan Data</h1>
    </header>

    <main>
        <div class="deskripsi">
            <h2>Selamat Datang!</h2>
            <p>Halaman ini dibuat untuk memenuhi tugas pembuatan website yang responsif. Silakan masukkan nama dan pesan Anda melalui form di bawah ini. Data yang Anda kirimkan akan otomatis muncul pada tabel.</p>
        </div>
<!-- Formulir untuk mengirim data pengguna -->
        <form id="formKirim" method="POST" action="" onsubmit="return validasiForm()">
            <div class="grup-form">
                <label for="nama">Nama Lengkap:</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda">
            </div>
<!-- Grup form untuk pesan atau komentar -->
            <div class="grup-form">
                <label for="pesan">Pesan / Komentar:</label>
                <textarea id="pesan" name="pesan" rows="3" placeholder="Masukkan pesan Anda"></textarea>
            </div>
<!-- Tombol untuk mengirim data ke database -->
            <button type="submit">Kirim Data</button>
        </form>

        <div class="tabel-responsive">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Pesan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $no = 1;
                    foreach ($data_pengguna as $data) { 
                    ?>
                        <tr>
                            <td><?php echo $no++; ?></td> 
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['pesan']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>

    <footer>
        <p>&copy; 2026 - Tugas Pemrograman Web Responsif</p>
    </footer>

    <script src="script.js"></script>
    <!-- Buat manggil codingan yang beda file -->

</body>
</html>
