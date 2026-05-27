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
    $query = "SELECT * FROM non_anggota WHERE name LIKE '%$kata%' OR no_hp LIKE '%$kata%' OR pekerjaan LIKE '%$kata%' OR jenis_kelamin LIKE '%$kata%' OR tujuan LIKE '%$kata%' OR alamat LIKE '%$kata%'";
    return mysqli_query($koneksi, $query);
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
            width: 100%;
            margin-top: 20px;
            border: 2px solid black;
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
            color: black;
            border: 2px solid black;
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
            padding: 0;
            background-color: white;
        }

        #navbar ul {
            margin: 0;
            padding: 0;
            display: flex;
            list-style: none;
            align-items: center;
        }

        #navbar li {
            position: relative;
            margin-top: 11px;
        }

        #navbar a,
        .navbar a:focus {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 26px 19px;
            font-family: "Poppins", sans-serif;
            font-size: 18px;
            font-weight: 500;
            color: green;
            white-space: nowrap;
            transition: 0.3s;
            text-decoration: none;
            width: 100%;
        }

        #navbar a i,
        .navbar a:focus i {
            font-size: 12px;
            line-height: 0;
            margin-left: 10px;
        }

        #navbar a:hover,
        .navbar .active,
        .navbar .active:focus,
        .navbar li:hover>a {
            color: black;
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

    </style>
</head>

<body>

    <div id="template">

        <nav id="navbar" class="navbar">
            <ul>
                <li><img src="../img/Bdan_stan.jpg" alt="Header Image"
                        style="height:68px; margin-left:20px"></li>
                <li><a class="nav-link scrollto" href="admin.php">Home</a></li>
                <li><a class="nav-link scrollto" href="tampilan.php">Data Pengunjung</a></li>
                <li><a class="nav-link scrollto" href="admin.php">Admin</a></li>
                <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
            </ul>
              <hr style="color: green; border: 1px solid green" class="t">
        </nav>
          <hr style="color: green; border: 1px solid green" class="t">


         <?php
//koneksi ke database
$koneksi = new mysqli('localhost', 'root', '', 'tamuu');

// Periksa apakah ada sesi untuk tanggal awal dan akhir
if(isset($_SESSION['tanggal_awal']) && isset($_SESSION['tanggal_akhir'])) {
    // Jika ada, gunakan nilai sesi tersebut untuk mengambil data dari database
    $tanggal_awal = $_SESSION['tanggal_awal'];
    $tanggal_akhir = $_SESSION['tanggal_akhir'];
    $select = mysqli_query($koneksi, "SELECT pekerjaan, COUNT(*) as jumlah_pengunjung FROM non_anggota WHERE tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir' GROUP BY pekerjaan");
} else {
    // Jika tidak ada sesi, ambil semua data non-anggota
    $select = mysqli_query($koneksi, 'SELECT pekerjaan, COUNT(*) as jumlah_pengunjung FROM non_anggota GROUP BY pekerjaan');
}

// Mendefinisikan array asosiatif untuk menyimpan statistik jumlah pengunjung berdasarkan pekerjaan
$jumlah_pengunjung_per_pekerjaan = array();

// Melakukan pengulangan untuk menghitung jumlah pengunjung berdasarkan pekerjaan
while ($hasil = mysqli_fetch_array($select)) {
    // Menambahkan jumlah pengunjung berdasarkan pekerjaan
    $jumlah_pengunjung_per_pekerjaan[$hasil['pekerjaan']] = $hasil['jumlah_pengunjung'];
}

// Menampilkan statistik jumlah pengunjung berdasarkan pekerjaan
echo '<h2 style="color: black;">Statistik Jumlah Pengunjung Berdasarkan Pekerjaan</h2>';
echo '<table>';
echo '<tr><th>Pekerjaan</th><th>Jumlah Pengunjung</th></tr>';
foreach ($jumlah_pengunjung_per_pekerjaan as $pekerjaan => $jumlah_pengunjung) {
    echo '<tr>';
    echo '<td>' . $pekerjaan . '</td>';
    echo '<td>' . $jumlah_pengunjung . '</td>';
    echo '</tr>';
}
echo '</table>';
?>


             <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
             <h2 style="color: black;">Statistik Jumlah Pengunjung Berdasarkan tujuan</h2>
    <div style="width: 50%;">
        <canvas id="myChart"></canvas>
    </div>


   <div style="width: 400px;">
        <canvas id="myChart" width="0" height="0"></canvas>
    </div>

    <?php
    //koneksi ke database
    $koneksi = new mysqli('localhost', 'root', '', 'tamuu');

    // Periksa apakah ada sesi untuk tanggal awal dan akhir
    if(isset($_SESSION['tanggal_awal']) && isset($_SESSION['tanggal_akhir'])) {
        // Jika ada, gunakan nilai sesi tersebut untuk mengambil data dari database
        $tanggal_awal = $_SESSION['tanggal_awal'];
        $tanggal_akhir = $_SESSION['tanggal_akhir'];
        $select = mysqli_query($koneksi, "SELECT tujuan, COUNT(*) as jumlah_survei FROM non_anggota WHERE tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir' GROUP BY tujuan");
    } else {
        // Jika tidak ada sesi, ambil semua data non-anggota
        $select = mysqli_query($koneksi, 'SELECT tujuan, COUNT(*) as jumlah_survei FROM non_anggota GROUP BY tujuan');
    }

    // Mendefinisikan array untuk menyimpan data tujuan kunjungan dan jumlah survei
    $labels = array();
    $data = array();

    // Mengambil data dari database
    while ($row = mysqli_fetch_assoc($select)) {
        $labels[] = $row['tujuan'];
        $data[] = $row['jumlah_survei'];
    }
    ?>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Jumlah Survei',
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>


</body>

</html>
