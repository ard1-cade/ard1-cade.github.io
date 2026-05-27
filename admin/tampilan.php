<?php
//koneksi ke database
$koneksi = new mysqli('localhost', 'root', '', 'tamuu');
// Memeriksa apakah koneksi berhasil atau tidak
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

//variabel untuk menyimpan nomor urutan
$id = 1;

if(isset($_POST['lihat'])) {
    // Mendapatkan tanggal awal dan akhir dari form
    $tanggal_awal = $_POST['tanggal_awal'];
    $tanggal_akhir = $_POST['tanggal_akhir'];

    //mengambil data dari tabel non_anggota berdasarkan rentang tanggal
    $select = mysqli_query($koneksi, "SELECT * FROM non_anggota WHERE tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'");
} else if (isset($_POST["see"])) {
    // Jika tombol "see" ditekan, gunakan fungsi "see"
    $kata = $_POST["kata"];
    $select = see($kata);
} else {
    // Jika tidak ada rentang tanggal yang diberikan, ambil semua data non-anggota
    $select = mysqli_query($koneksi, 'SELECT * FROM non_anggota');
}
// Menghitung jumlah pengunjung
$total_pengunjung = mysqli_num_rows($select);

// Fungsi untuk melakukan pencarian
function see($kata) {
    global $koneksi;
    $query = "SELECT * FROM non_anggota WHERE name LIKE '%$kata%' OR no_hp LIKE '%$kata%' OR email LIKE '%$kata%' OR pekerjaan LIKE '%$kata%' OR jenis_kelamin LIKE '%$kata%' OR tujuan LIKE '%$kata%' OR alamat LIKE '%$kata%'";
    return mysqli_query($koneksi, $query);
}

if(isset($_POST['lihat'])) {
    // Mendapatkan tanggal awal dan akhir dari form
    $tanggal_awal = $_POST['tanggal_awal'];
    $tanggal_akhir = $_POST['tanggal_akhir'];

    // Mengambil data jumlah pengunjung berdasarkan pekerjaan dan rentang tanggal
    $data_pekerjaan = mysqli_query($koneksi, "SELECT pekerjaan, COUNT(*) as total FROM non_anggota WHERE tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir' GROUP BY pekerjaan");
} else if (isset($_POST["see"])) {
    // Jika tombol "see" ditekan, gunakan fungsi "see"
    $kata = $_POST["kata"];
    $select = see($kata);

    // Mengambil data jumlah pengunjung berdasarkan pekerjaan untuk pencarian
    $data_pekerjaan = mysqli_query($koneksi, "SELECT pekerjaan, COUNT(*) as total FROM non_anggota WHERE name LIKE '%$kata%' OR no_hp LIKE '%$kata%' OR pekerjaan LIKE '%$kata%' OR jenis_kelamin LIKE '%$kata%' OR tujuan LIKE '%$kata%' OR alamat LIKE '%$kata%' GROUP BY pekerjaan");
} else {
    // Jika tidak ada rentang tanggal yang diberikan, ambil semua data non-anggota
    $select = mysqli_query($koneksi, 'SELECT * FROM non_anggota');

    // Mengambil data jumlah pengunjung berdasarkan pekerjaan tanpa rentang tanggal
    $data_pekerjaan = mysqli_query($koneksi, "SELECT pekerjaan, COUNT(*) as total FROM non_anggota GROUP BY pekerjaan");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <title>Data Pengunjung</title>
     <link rel="icon" href="../img/Bdan_stan.jpg" type="image/x-icon">

    <style>
        body {
            background-image: url('../img/bg1.png');
            background-size: cover;
            background-position: center;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: white;
        }

        #template {
            max-width: 1364px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            padding: 20px;
            margin-top: 0px;
        }

        #header img {
            width: 100%;
            height: 230px;
            border-radius: 8px 8px 0 0;
        }

        h1 {
            text-align: center;
            background-color: white;
            color: black;
            padding: 15px 0;
            margin: 0;
            font-weight: bold;
            border-radius: 5px;
        }

       table {
            width: 98%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 10px;
            color: black;
            text-align: center;
        }

        th {
            background-color: green;
            color: black;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }


        .btn1 {
            background-color: #417aa8;
            color: white;
            text-decoration: none;
            padding: 5px 9px 5px;
            border-radius: 4px;
            margin-left: 74%;
            margin-top: 9%;
        }

        .btn1:hover {
            background-color: darkblue;
            color: white;
            text-decoration: none;
            padding: 5px 9px 5px;
            border-radius: 4px;
            margin-left: 74%;
            margin-top: 9%;
        }

        .btn2 {
            background-color: #C51F1A;
            color: white;
            text-decoration: none;
            padding: 5px 9px 5px;
            border-radius: 4px;
        }

        .btn2:hover {
            background-color: #811e15;
            color: white;
            text-decoration: none;
            padding: 5px 9px 5px;
            border-radius: 4px;
        }
          .input-field {
            flex: 1;
            padding: 5px;
            border: 3px solid black;
            height: 30px;
            border-radius: 4px;
            transition: 0.3s;
            box-sizing: border-box;
        }

        .input-field:hover {
            border: 3px solid #417aa8;
        }

        .s {
            padding: 4px 28px 4px;
            background-color: blue;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .s:hover {
            padding: 4px 28px 4px;
            background-color: darkblue;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .yy {
            border: 1px solid black;
            border-radius: 3px;
            height: 25px;
        }

        .btnn {
            background-color: green;
            color: white;
            padding: 3px 11px 3px;
            border: 1px solid #79b465;
            border-radius: 3px;
            margin-left: 5px;
        }

        .btnn:hover {
            background-color: darkgreen;
            color: white;
            padding: 3px 11px 3px;
            border: 1px solid green;
            border-radius: 3px;
            margin-left: 5px;
        }

        .btnnnn {
            background-color: blue;
            color: white;
            padding: 3px 11px 3px;
            border: 1px solid blue;
            border-radius: 3px;
            margin-left: 5px;
        }

        .btnnnn:hover {
            background-color: darkblue;
            color: white;
            padding: 3px 11px 3px;
            border: 1px solid darkblue;
            border-radius: 3px;
            margin-left: 5px;
        }

       #navbar {
            padding: 10px 0; /* Menambahkan padding atas dan bawah */
            background-color: rgba(255, 255, 255, 0.9);
            border-bottom: 2px solid #4CAF50; /* Menggunakan warna hijau sebagai garis bawah */
        }

        #navbar ul {
            margin: 0;
            padding: 0;
            display: flex;
            list-style: none;
            align-items: center;
        }

        #navbar li {
            margin-top: 11px;
            margin-right: 20px; /* Memberikan jarak antar menu */
        }

        #navbar a,
        .navbar a:focus {
            display: block;
            padding: 10px 26px; /* Mengurangi padding vertikal */
            font-family: "Poppins", sans-serif;
            font-size: 18px;
            font-weight: 500;
            color: green;
            text-decoration: none;
            transition: 0.3s;
            border-radius: 5px; /* Menambahkan border-radius */
        }

        #navbar a i,
        .navbar a:focus i {
            font-size: 12px;
            line-height: 0;
            margin-left: 5px; /* Menambahkan sedikit jarak antara teks dan ikon */
        }

        #navbar a:hover,
        .navbar .active,
        .navbar .active:focus,
        .navbar li:hover>a {
            background-color: #f2f2f2; /* Mengubah warna latar belakang saat hover */
            color: black; /* Mengubah warna teks saat hover */
        }

        .input-group {
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            color: black;
            margin-left: 0;
            /* Mengubah margin-left menjadi 0 */
        }

        .input-label {
            font-weight: bold;
            margin-right: 10px;
            margin-left: 10px;
            width: 100px;
        }

        /* Pemindahan tautan "Cetak" ke sebelah kanan */
        .btn-cetak {
            margin-right: auto;
            /* Pemindahan ke sebelah kanan */
        }

        .keterangan{
        display: none;
    }


        /* Aturan gaya media untuk menyembunyikan tombol "Hapus" saat mencetak */
        @media print {
            .btn2 {
                display: none !important;
            }

            .t {
                display: none !important;
            }

            #ttd-ketua {
                display: block !important;
                text-align: right;
                margin-top: 39px;
                color: black;
            }

            #navbar {
                display: none;
            }

            /* Menambahkan logo di sebelah kiri atas saat mencetak */
            #logo-cetak {
                position: absolute;
                top: 20px;
                left: 20px;
                width: 100px; /* Atur sesuai ukuran logo Anda */
                height: auto; /* Menyesuaikan proporsi */
            }

            /* Menampilkan gambar Bdan_stan.jpg pada saat mencetak */
            img#logo-cetak-tambah {
                display: block !important;
            }
            #logo-cetak-tambah {
                position: absolute;
                top: 15px;
                margin-top: -5px;
                margin-left: 20px;
                width: 150px; /* Sesuaikan ukuran dengan kebutuhan Anda */
                height: 270px;
                height: auto; /* Menyesuaikan proporsi */
                z-index: 999; /* Pastikan logo berada di atas elemen lain */
            }

            /* Menambahkan teks di tengah atas saat mencetak */
            #tulisan-cetak {
                position: absolute;
                top: 20px;
                left: 0;
                color: black;
                margin-top: -10px;
                width: 100%;
                text-align: center;
                font-size: 24px;
                font-weight: bold;
            }
        }

        /* Sembunyikan elemen kepala balai dan TTD pada tampilan awal */
        #ttd-ketua {
            display: none;
        }

        /* Sembunyikan gambar Bdan_stan.jpg pada halaman awal */
        img#logo-cetak-tambah {
            display: none;
        }
        #tulisan-cetak {
    position: absolute;
    top: 20px;
    left: 0;
    color: black;
    margin-top: -10px;
    width: 100%;
    text-align: center;
    font-size: 22px;
    font-weight: bold;
    display: none;
}

#tulisann-cetak{
    position: absolute;
    top: 20px;
    left: 0;
    color: black;
    margin-top: -10px;
    width: 100%;
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    display: none;
}

#tulisan-cetak {
    position: absolute;
    }

/* Menampilkan alamat di bawah tulisan Badan Standarisasi Instrumen Pertanian saat mencetak */
#alamat-cetak {
    position: absolute;
    top: 60px; /* Sesuaikan dengan posisi yang diinginkan */
    left: 0;
    color: black;
    margin-top: -10px;
    width: 100%;
    text-align: center;
    font-size: 18px; /* Sesuaikan ukuran font yang diinginkan */
}
#alamat-cetak {
    display: none;
}

#garis{
    display: none;
}

/* Tampilkan alamat saat mencetak */
@media print {
    #alamat-cetak {
        display: block;
        margin-top: -15px;
    }
    #tulisan-cetak {
    display: block;
    margin-top: -95px;
    }
    #tulisann-cetak{
        display: block;
        margin-top: -24px;
    }
    #data{
        margin-top: 38px;
    }
    #garis{
        margin-top: 78px;
        display: block;
        color: black;
        border: 2px solid black;
    }
    .yy{
        display: none;
    }
    .tgl{
        display: block;
    }
    .keterangan{
        display: block;
    }
    .input-field{
        display: none;
    }
    #data{
        margin-top: 170px;
    }


}
    </style>
</head>

<body>

    <div id="template">

        <nav id="navbar" class="navbar">
            <ul>
                <li><img src="../img/bg2.png" alt="Header Image"
                        style="height:68px; margin-left:20px"></li>
                <li><a class="nav-link scrollto" href="admin.php">Home</a></li>
                <li><a class="nav-link scrollto" href="tampilan.php">Data Pengunjung</a></li>
                <li><a class="nav-link scrollto" href="admin.php">Admin</a></li>
                <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
            </ul>
        </nav>

        <!-- Teks Badan Standarisasi Instrumen Pertanian -->
        <div id="tulisan-cetak">
            <img  src="../img/l.png">
        </div>
       
        <h1 id="data"> DATA PENGUNJUNG</h1>

        <form action="" method="post" style="margin-left: 0%;">
            <div style="display:flex;" class="t">
                <div style="margin-right: 10px;">
                    <label for="tanggal_awal" style="margin-right: 5px;color: black;">Tanggal Awal:</label>
                    <input type="date" id="tanggal_awal" name="tanggal_awal" class="yy"
                        style="border: black solid 2px; height: 31px;">
                </div>
                <div>
                    <label for="tanggal_akhir" style="margin-right: 5px; color: black;">Tanggal Akhir:</label>
                    <input type="date" id="tanggal_akhir" name="tanggal_akhir" class="yy"
                        style="border: black solid 2px; height: 31px;">
                </div>
                <div>
                    <input type="submit" name="lihat" value="Cari" class="btnn">
                    <!-- Perubahan pada name atribut -->
                    <button onclick="cetakHalaman()" class="btnnnn btn-cetak">Cetak</button>
                    <a href="data_lengkap.php" class="btnn">Liat Lengkap</a>
                </div>
            </div>
             <li style="margin-left: 77%; margin-top:-34px;"><input type="text" name="kata" class="input-field" autofocus placeholder="cari"
                        autocomplete="off">
                    <input type="submit" name="see" value="Cari" class="btnn"></li>
        </form>

        <table class="table">
            <thead style="border:2px solid black;">
                <tr>
                    <th>No.</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>No Handphone</th>
                    <th>Email</th>
                    <th>Pekerjaan</th>
                    <th>Jenis Kelamin</th>
                    <th>Tujuan</th>
                    <th>Alamat</th>
                    <th>Gambar</th>
                    <th class="t">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
        //melakukan looping dengan while
        if (mysqli_num_rows($select) > 0) {
            $id = 1; // Mengatur nomor urutan
            while ($hasil = mysqli_fetch_array($select)) {
                ?>
                <tr >
                    <td style="font-size: 16px"><?php echo $id++; ?></td>
                    <td style="font-size: 16px"><?php echo date('d-m-Y', strtotime($hasil['tanggal'])); ?></td>
                    <td style="font-size: 16px"><?php echo $hasil['name']; ?></td>
                    <td style="font-size: 16px"><?php echo $hasil['no_hp']; ?></td>
                    <td style="font-size: 16px"><?php echo $hasil['email']; ?></td>
                    <td style="font-size: 16px"><?php echo $hasil['pekerjaan']; ?></td>
                    <td style="font-size: 16px"><?php echo $hasil['jenis_kelamin']; ?></td>
                    <td style="font-size: 16px"><?php echo $hasil['tujuan']; ?></td>
                    <td style="font-size: 16px"><?php echo $hasil['alamat']; ?></td>
                    <td> <img id="gambar_<?php echo $id; ?>" src="../upload/<?php echo $hasil['gambar']; ?>"
                            style="max-width: 100px;" alt="<?php echo $hasil['name']; ?>"
                            onclick="besarkanGambar(<?php echo $id; ?>)"></td>
                    <td class="t"><a href='../hapus/hapus3.php?id=<?php echo $hasil['id']; ?>' class="btn2">Hapus</a>
                    </td>
                </tr>
                <?php
            }
            }else {
            // Jika hasil pencarian kosong, tampilkan pesan "Data tidak ditemukan"
            echo "<tr><td colspan='10' style='text-align:center;'>Data tidak ditemukan.</td></tr>";
        }
        ?>
                 <td colspan="10" style="text-align: center; font-weight: bold;">Total Pengunjung: <?php echo $total_pengunjung; ?></td>
            </tbody>
        </table>

       <div class="keterangan" style="color: black;">
    <h3>Keterangan jumlah pengunjung:</h3>
    <ul>
        <?php while ($row = mysqli_fetch_assoc($data_pekerjaan)) : ?>
            <?php 
            // Format jumlah total untuk menjadi string dengan lebar yang sama
            $formatted_total = str_pad($row['total'], 10, ' ', STR_PAD_LEFT); 
            ?>
            <li><?php echo $row['pekerjaan'] . ': ' . $formatted_total; ?></li>
        <?php endwhile; ?>
    </ul>
</div>



    </div>

    
    <div id="ttd-ketua">
         <?php
            // Mendapatkan tanggal waktu saat ini
            $tanggal_cetak = date('d-m-Y');

            // Menampilkan tulisan "Jambi" beserta tanggal waktu di atas tulisan "Kepala Balai"
            echo "Jambi, $tanggal_cetak";
            ?>
        <p>Kepala Balai</p>
        <p style="margin-top: 40px">..........................TTD</p>
        <p>Nama Ketua</p>
    </div>



    <script>
        // Fungsi untuk mencetak halaman saat tombol "Cetak" diklik
        function cetakHalaman() {
            // Sembunyikan elemen yang tidak perlu dicetak
            var elementsToHide = document.querySelectorAll('header, nav, #template .btnn');
            elementsToHide.forEach(function (element) {
                element.style.display = 'none';
            });

            window.print(); // Memanggil fungsi print bawaan browser

            // Tampilkan kembali elemen yang disembunyikan setelah mencetak
            elementsToHide.forEach(function (element) {
                element.style.display = '';
            });
        }
    </script>
    <script>
        function besarkanGambar(id) {
            // Dapatkan gambar berdasarkan id
            var gambar = document.getElementById('gambar_' + id);

            // Periksa apakah gambar sudah membesar atau belum
            if (gambar.style.maxWidth === '100px') {
                // Jika belum membesar, ubah ukurannya menjadi 300px
                gambar.style.maxWidth = '300px';
            } else {
                // Jika sudah membesar, kembalikan ukurannya menjadi 100px
                gambar.style.maxWidth = '100px';
            }
        }
    </script>
</body>

</html>
