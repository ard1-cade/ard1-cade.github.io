<?php
// Create database connection using config file
include_once("../koneksi/KONEKSII.php");

// Fetch all users data from database
$result = mysqli_query($conn, "SELECT * FROM admin ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Admin</title>
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
            border-radius: 5px;
        }

        table {
            width: 98%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        th,
        td {
            border: 2px solid black;
            padding: 10px;
            color: black;
            text-align: center;
        }

        th {
            background-color: green;
            color: white;
        }

        .btn1,
        .btn2 {
            background-color: #417aa8; /* Warna latar belakang tombol */
            color: white;
            text-decoration: none;
            padding: 5px 9px;
            border-radius: 4px;
            margin-left: 5px;
            display: inline-block;
        }

        .btn1:hover,
        .btn2:hover {
            background-color: darkblue;
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
            background-color: #79b465;
            color: white;
            padding: 3px 11px 3px;
            border: 1px solid #79b465;
            border-radius: 3px;
            margin-left: 5px;
        }

        .btnn:hover {
            background-color: green;
            color: white;
            padding: 3px 11px 3px;
            border: 1px solid green;
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
    </style>
</head>

<body>

    <body background="../img/bg1.png">
    <div id="template">
        <nav id="navbar" class="navbar">
            <ul>
                <li><img src="../img/Bdan_stan.jpg" alt="Header Image" style="height:68px; margin-left:20px"></li>
                <li><a class="nav-link scrollto" href="admin.php">Home</a></li>
                <li><a class="nav-link scrollto" href="tampilan.php">Data Pengunjung</a></li>
                <li><a class="nav-link scrollto" href="tampilan_admin.php">Admin</a></li>
                <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>

            </ul>
        </nav>


        <h1>DATA ADMIN</h1>

        <table border="1" align="center">

            <tr>
                <th>nama</th>
                <th>password</th>
                <th width=190px>Action</th>
            </tr>
            <tr>
                <?php
                while ($user_data = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $user_data['username'] . "</td>";
                    echo "<td>" . $user_data['password'] . "</td>";
                    echo "<td><a class='btn1' href='edit.php?id=$user_data[id]'>Edit</a></td></tr>";
                }
                ?>
            </tr>
        </table>
    </div>
</body>

</html>
