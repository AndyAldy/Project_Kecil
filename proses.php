<?php
// Database sementara untuk menyimpan data pengguna
$data_pengguna = [
    ["nama" => "Budi Santoso", "pesan" => "Halo, webnya bagus!"],
    ["nama" => "Siti Aminah", "pesan" => "Terima kasih atas informasinya."]
];

// Logika mendeteksi jika form telah di-submit oleh user
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Menangkap dan mengamankan inputan user
    $nama_baru = isset($_POST["nama"]) ? htmlspecialchars($_POST["nama"]) : "";
    $pesan_baru = isset($_POST["pesan"]) ? htmlspecialchars($_POST["pesan"]) : "";

    // Validasi sisi server: pastikan inputan tidak kosong
    if (!empty($nama_baru) && !empty($pesan_baru)) {
        
        // Memasukkan data baru ke baris paling atas array
        array_unshift($data_pengguna, ["nama" => $nama_baru, "pesan" => $pesan_baru]);
    }
}
?>