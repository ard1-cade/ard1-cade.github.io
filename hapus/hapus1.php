<?php
include_once('../koneksi/KONEKSII.php');
$nama = $_GET['nama'];
$query = "DELETE FROM non_anggota WHERE nama='$nama'";
mysqli_query($conn, $query);
header('location:../admin/tampilan.php');
?>