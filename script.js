// Fungsi untuk memvalidasi isi form di sisi client (browser)
function validasiForm() {
    
    // Mengambil teks yang diinput oleh user
    var nama = document.getElementById("nama").value;
    var pesan = document.getElementById("pesan").value;

    // Logika pengecekan kondisi string kosong (setelah dipotong spasi dengan trim)
    if (nama.trim() === "" || pesan.trim() === "") {
        
        // Memunculkan pop-up peringatan jika ada form yang kosong
        alert("Peringatan: Nama dan Pesan tidak boleh kosong!");
        
        return false; // Membatalkan submit form ke server PHP
    }
    
    return true; // Mengizinkan pengiriman data jika semua terisi
}