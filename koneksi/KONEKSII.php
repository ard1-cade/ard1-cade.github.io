<?php
$db_host = "localhost";
$db_name = "tamuu";
$db_user = "root";
$db_password = "";
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function lihat($kata)
{
    global $conn;
    $query = "SELECT * FROM non_anggota
            WHERE
            name LIKE '%" . $kata . "%' OR
            tanggal LIKE '%" . $kata . "%' OR
            pekerjaan LIKE '%" . $kata . "%' OR
            no_handphone LIKE '%" . $kata . "%' OR
            jenis_kelamin LIKE '%" . $kata . "%' OR
            alamat LIKE '%" . $kata . "%' OR
            tujuan LIKE '%" . $kata . "%'
          ";
    return query($query);
}

if (isset($_POST['lihat'])) {
    // Jika tombol "lihat" ditekan, gunakan fungsi lihat untuk melakukan pencarian
    $kata = $_POST["kata"];
    $select = lihat($kata);
} else {
    // Jika tidak ada pencarian, ambil semua data non-anggota
    $select = query("SELECT * FROM non_anggota");
}
?>
