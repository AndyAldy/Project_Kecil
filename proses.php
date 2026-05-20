<?php
// Memulai session untuk menyimpan data sementara di browser pengguna
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Jika session belum memiliki data_pengguna, buat data bawaan awal
if (!isset($_SESSION['data_pengguna'])) {
    $_SESSION['data_pengguna'] = [
        ["nama" => "Budi Santoso", "pesan" => "Halo, webnya bagus!"],
        ["nama" => "Siti Aminah", "pesan" => "Terima kasih atas informasinya."]
    ];
}

// Membuat variabel referensi agar kode di index.php tidak perlu diubah
$data_pengguna = &$_SESSION['data_pengguna'];

// Logika mendeteksi jika form telah di-submit oleh user
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Menangkap dan mengamankan inputan user
    $nama_baru = isset($_POST["nama"]) ? htmlspecialchars($_POST["nama"]) : "";
    $pesan_baru = isset($_POST["pesan"]) ? htmlspecialchars($_POST["pesan"]) : "";

    // Validasi: pastikan inputan tidak kosong
    if (!empty($nama_baru) && !empty($pesan_baru)) {
        
        // Memasukkan data baru ke baris paling atas session array
        array_unshift($_SESSION['data_pengguna'], ["nama" => $nama_baru, "pesan" => $pesan_baru]);
    }
}
?>