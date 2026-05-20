<?php
// REFAKTOR: Logika manajemen Session dibersihkan agar lebih robust saat menghandle data serverless
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Inisialisasi data bawaan awal jika session pengguna masih baru
if (!isset($_SESSION['data_pengguna'])) {
    $_SESSION['data_pengguna'] = [
        ["nama" => "Budi Santoso", "pesan" => "Halo, webnya bagus!"],
        ["nama" => "Siti Aminah", "pesan" => "Terima kasih atas informasinya."]
    ];
}

// Menggunakan pointer referensi array agar variabel sinkron secara otomatis
$data_pengguna = &$_SESSION['data_pengguna'];

// Validasi request method POST dari form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Menangkap data input dan membersihkannya dari celah XSS
    $nama_baru = isset($_POST["nama"]) ? htmlspecialchars(trim($_POST["nama"])) : "";
    $pesan_baru = isset($_POST["pesan"]) ? htmlspecialchars(trim($_POST["pesan"])) : "";

    // Memastikan data input tidak kosong setelah di-trim
    if ($nama_baru !== "" && $pesan_baru !== "") {
        
        // Memasukkan entri baru ke bagian atas array list
        array_unshift($_SESSION['data_pengguna'], [
            "nama" => $nama_baru,
            "pesan" => $pesan_baru
        ]);
        
        // REFAKTOR OPTIONAL: Mencegah form submit berulang saat halaman di-refresh oleh user (Post/Redirect/Get pattern)
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
    }
}
?>