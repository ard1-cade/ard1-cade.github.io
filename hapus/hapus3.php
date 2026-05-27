<?php
//koneksi ke database
$koneksi = new mysqli('localhost', 'root', '', 'tamuu');

// Memeriksa apakah parameter ID telah diterima melalui URL
if (isset($_GET['id'])) {
    // Mendapatkan nilai ID dari URL
    $id = $_GET['id'];
    
    // Membuat query untuk menghapus data berdasarkan ID
    $query = "DELETE FROM non_anggota WHERE id='$id'";
    
    // Menjalankan query
    if ($koneksi->query($query) === TRUE) {
        // Redirect kembali ke halaman tampilan.php setelah menghapus data
        header('location:../admin/tampilan.php');
        exit; // Hentikan eksekusi script setelah melakukan redirect
    } else {
        // Jika terjadi kesalahan dalam eksekusi query, maka tampilkan pesan error
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }
}
?>
