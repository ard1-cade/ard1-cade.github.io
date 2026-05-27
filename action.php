<?php
// Mendefinisikan folder
define('UPLOAD_DIR', 'upload/');

// Koneksi ke database
$koneksi = new mysqli('localhost', 'root', '', 'tamuu');

// Menangkap variabel
$name = $_POST['name'];
$no_hp = $_POST['no_hp'];
$email = $_POST['email'];
$tanggal = $_POST['tanggal'];
$pekerjaan = $_POST['pekerjaan'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tujuan = $_POST['tujuan'];
$alamat = $_POST['alamat'];
$img = $_POST['image'];

$img = str_replace('data:image/jpeg;base64,', '', $img);
$img = str_replace(' ', '+', $img);

// Resource gambar diubah dari encode
$data = base64_decode($img);

// Menamai file, file dinamai secara random dengan unik
$file = uniqid() . '.png';

// Memindahkan file ke folder upload
file_put_contents(UPLOAD_DIR . $file, $data);

// Memasukkan data ke dalam tabel non_anggota
mysqli_query($koneksi, "INSERT INTO non_anggota SET name='$name', no_hp='$no_hp', email='$email',  tanggal='$tanggal', pekerjaan='$pekerjaan', jenis_kelamin='$jenis_kelamin', tujuan='$tujuan', alamat='$alamat', gambar='$file'");
?>