<?php
include_once('../koneksi/KONEKSII.php');
$kode = $_GET['kode'];
$query = "DELETE FROM anggota WHERE kode='$kode'";
mysqli_query($conn, $query);
header('location:../admin/tampilan1.php');
?>