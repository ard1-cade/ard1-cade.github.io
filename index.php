<?php
  include_once("koneksi/KONEKSII.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di BSIP JAMBI</title>
    <link rel="icon" href="img/bg2.png" type="image/x-icon">

    <style>
        body {
            background-image: url('img/jj.jpg');
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

        #header img {
            width: 100%;
            max-height: 150px;
            object-fit: cover;
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

        #welcome-section {
            padding: 50px 20px; /* Memberikan ruang yang lebih luas */
            text-align: center;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px; /* Menambahkan ruang yang lebih luas */
            margin-top: 70px;
            text-align: center;
        }

        h2 {
            color: #4CAF50; /* Menggunakan warna hijau untuk judul */
        }

        p {
            font-size: 18px;
            color: #555;
            line-height: 1.6; /* Menambahkan jarak antar baris */
        }

        .total-count {
            font-size: 24px;
            color: #4CAF50;
            margin-top: 20px; /* Memberikan jarak atas yang lebih besar */
        }
    </style>
</head>

<body>
    <div id="template">

        <nav id="navbar">
            <ul>
                <li><img src="img/bg2.png" alt="Header Image" style="height: 68px; margin-left: 10px"></li>
                <li><a class="nav-link scrollto" href="index.php">Home</a></li>
                <li><a class="nav-link scrollto" href="non_anggota.php">Pengunjung</a></li>
                 <li><a class="nav-link scrollto" href="https://jambi.bsip.pertanian.go.id/">Info BSIP</a></li>
                <li><a class="nav-link scrollto" href="login.php">Login</a></li>
            </ul>
        </nav>



         <div id="welcome-section">
            <h2>Selamat Datang di Balai Penerapan Standar Instrumen Pertanian Jambi</h2>
            <p>Harap mengikuti peraturan yang ada untuk kenyamanan bersama.</p>
        </div>

         
    </div>

</body>


</html>
