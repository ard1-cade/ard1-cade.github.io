<?php
//koneksi ke database
$koneksi = new mysqli('localhost', 'root', '', 'tamuu');

//variabel untuk menyimpan nomor urutan
$id = 1;

// Mendapatkan tanggal awal dan akhir dari form jika tombol "Cari" ditekan
$tanggal_awal = isset($_POST['tanggal_awal']) ? $_POST['tanggal_awal'] : '';
$tanggal_akhir = isset($_POST['tanggal_akhir']) ? $_POST['tanggal_akhir'] : '';

// Query untuk mengambil data berdasarkan rentang tanggal jika tombol "Cari" ditekan
if(!empty($tanggal_awal) && !empty($tanggal_akhir)) {
    $select = mysqli_query($koneksi, "SELECT * FROM non_anggota WHERE tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
} else {
    // Jika tidak ada rentang tanggal yang diberikan, ambil semua data non-anggota
    $select = mysqli_query($koneksi, 'SELECT * FROM non_anggota');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>APLIKASI</title>
    <style>
        /* Gaya CSS Anda di sini */
    </style>
</head>
<body background="../bg1.png">
    <div id="template">
        <div id="header">
            <img src="../img/y.jpeg" style="width: 100%; height: 230px;">
        </div>
        <center><font style="color:black"><h1>ANGGOTA</h1></font></center>
        <!-- Form untuk memilih rentang tanggal -->
        <form action="" method="post" style="text-align: center;">
            <label for="tanggal_awal">Tanggal Awal:</label>
            <input type="date" id="tanggal_awal" name="tanggal_awal">
            <label for="tanggal_akhir">Tanggal Akhir:</label>
            <input type="date" id="tanggal_akhir" name="tanggal_akhir">
            <input type="submit" name="lihat_tanggal" value="Cari">
        </form>
        <!-- Tabel untuk menampilkan data -->
        <table border="1" align="center">
            <tr>
                <th style="color: black">No</th>
                <th style="color: black">Tanggal</th>
                <th style="color: black">NIK</th>
                <th style="color: black">Nama</th>
                <th style="color: black">Pekerjaan</th>
                <th style="color: black">Jenis Kelamin</th>
                <th style="color: black">Alamat</th>
                <th style="color: black">Tujuan</th>
            </tr>
            <?php
            //melakukan looping dengan while
            while ($hasil = mysqli_fetch_array($select)) {
            ?>
            <tr>
                <td><?php echo $id++; ?></td>
                <td><?php echo $hasil['tanggal']; ?></td>
                <td><?php echo $hasil['nik']; ?></td>
                <td><?php echo $hasil['name']; ?></td>
                <td><?php echo $hasil['pekerjaan']; ?></td>
                <td><?php echo $hasil['jenis_kelamin']; ?></td>
                <td><?php echo $hasil['tujuan']; ?></td>
                <td><?php echo $hasil['alamat']; ?></td>
                <td><img src="../upload/<?php echo $hasil['gambar']; ?>" style="max-width: 100px;" alt="<?php echo $hasil['name']; ?>"></td>
            </tr>
            <?php } ?>
        </table>
        <p style="margin-left: 72%; margin-top: 10%;"> Kepala Perpustakaan</p>
        <p style="margin-left: 72%; margin-top: 10%;">..........................TTD</p>
        <!-- Skrip JavaScript untuk mencetak halaman -->
        <script>
            window.print();
        </script>
    </div>
</body>
</html>
