<!DOCTYPE html>
<html lang="en">

<head>
    <title>Badan Standarisasi Instrument Pertanian</title>
     <link rel="icon" href="../img/Bg2.png" type="image/x-icon">
     

    <style type="text/css">
        body {
            background-image: url('../img/jj.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center top; /* Posisikan gambar ke tengah atas */
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        #template {
            max-width: 1600px; /* Mengurangi max-width agar terlihat lebih proporsional */
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Meningkatkan ketebalan bayangan */
            overflow: hidden;
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

        .containerr {
            text-align: center;
            background-color: #fff;
            margin: -7px auto;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            max-width: 1500px;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #555;
            margin-bottom: 10px;
        }

        .total-count {
            font-size: 24px;
            color: #4CAF50;
            margin-top: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="template">
        <nav id="navbar" class="navbar">
            <ul>
                <li><img src="../img/Bg2.png" alt="Header Image" style="height:68px; margin-left:20px"></li>
                <li><a class="nav-link scrollto" href="#">Home</a></li>
                <li><a class="nav-link scrollto" href="tampilan.php">Data Pengunjung</a></li>
                <li><a class="nav-link scrollto" href="tampilan_admin.php">Admin</a></li>
                <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
            </ul>
            <hr style="color: green; border: 1px solid green">
        </nav>
    </div>
    <?php
    include_once("../koneksi/KONEKSII.php");

    $querypengunjung = "SELECT COUNT(*) as totalpengunjung FROM non_anggota";
    $resultpengunjung = mysqli_query($conn, $querypengunjung);
    $rowpengunjung = mysqli_fetch_assoc($resultpengunjung);
    $totalpengunjung = $rowpengunjung['totalpengunjung'];

    // Query untuk menghitung jumlah pengunjung pada tanggal tertentu
    $queryTotalPengunjung = "SELECT COUNT(*) as total_pengunjung FROM non_anggota WHERE DATE(tanggal) = CURDATE()";
    $resultTotalPengunjung = mysqli_query($conn, $queryTotalPengunjung);
    $rowTotalPengunjung = mysqli_fetch_assoc($resultTotalPengunjung);
    $totalPengunjungHariIni = $rowTotalPengunjung['total_pengunjung'];
    ?>

    <div class="containerr" >
        <h1>Selamat Datang di Balai Penerapan Instrumen Pertanian Jambi</h1>
        <p>Total Pengunjung:</p>
            <p class="total-count"><?php echo $totalpengunjung; ?></p>
            <p>Total Pengunjung Hari Ini:</p>
            <p class="total-count"><?php echo $totalPengunjungHariIni; ?></p>
        <div>
            
        </div>
    </div>
</body>

</html>
