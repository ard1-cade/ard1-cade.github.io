<?php
include_once("../koneksi/KONEKSII.php");

// Check if form is submitted for user update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['username'];
    $password = $_POST['password'];

    // Gunakan prepared statements
    $stmt = $conn->prepare("UPDATE admin SET username=?, password=? WHERE id=?");
    $stmt->bind_param("ssi", $name, $password, $id);
    $stmt->execute();
    $stmt->close();

    // Redirect to homepage to display updated user in list
    header("Location: tampilan_admin.php");
}

// Display selected user data based on id
// Getting id from url
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Gunakan prepared statements
    $stmt = $conn->prepare("SELECT * FROM admin WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    
    $result = $stmt->get_result();
    
    while ($user_data = $result->fetch_assoc()) {
        $name = $user_data['username'];
        $password = $user_data['password'];
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- bootstrap  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Data Pengunjung</title>
    <link rel="icon" href="img/Bdan_stan.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        #template {
            max-width: 1364px;
            margin: 0 auto;
            background-image: "img/gh.jpg";
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

        #form-section {
            background-color: #f9f9f9;
            padding: 2px;
            width: 90%;
            border-radius: 12px;
            margin: 1% auto;
        }

        .input-group {
            margin-bottom: 25px;
            display: flex;
            align-items: center;
        }

        .input-label {
            font-weight: bold;
            margin-right: 10px;
            display: inline-block;
            width: 100px;
        }

        .input-field {
            flex: 1;
            padding: 15px;
            border: 3px solid #ddd;
            border-radius: 4px;
            transition: 0.3s;
            box-sizing: border-box;
        }

        .input-field:hover {
            border: 3px solid #417aa8;
        }

        .select-field {
            width: 50%;
            padding: 15px;
            border: 3px solid #ddd;
            border-radius: 4px;
            transition: 0.3s;
            box-sizing: border-box;
        }

        .select-field:hover {
            border: 3px solid #417aa8;
        }

        .btn-group {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .btn {
            background-color: green;
            color: white;
            padding: 12px 30px;
            border-radius: 4px;
            border: 2px solid green;
            margin: 0 10px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn:hover {
            background-color: darkgreen;
            border-color: darkgreen;
        }

    
    </style>
</head>

<body background="../img/bg1.png">
    <div id="template">
        <nav id="navbar">
            <ul>
                <li><img src="../img/bg2.png" alt="Header Image" style="height:68px; margin-left:20px"></li>
                <li style="margin-left: 20px"><a class="nav-link scrollto" href="admin.php">Home</a></li>
                <li><a class="nav-link scrollto" href="tampilan.php">Data Pengunjung</a></li>
                <li><a class="nav-link scrollto" href="admin.php">Admin</a></li>
                <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
            </ul>
        </nav>

            <!-- Formulir Data Pengunjung -->
          <div id="form-section" style="background-color: rgba(255, 255, 255, 0.9); padding: 20px; border-radius: 12px;">
    <h2 style="text-align: center;">Edit Admin</h2>
    <br>
    <form id="form" method="POST" name="update_user" action="edit.php">
        <div class="input-group">
            <label class="input-label" for="name">UserName</label>
            <input type="text" class="input-field" name="username" id="username" required>
        </div>
        <div class="input-group">
            <label class="input-label" for="no_hp">Password</label>
            <input type="password" class="input-field" name="password" id="Password" required>
        </div>

        <div class="btn-group">
                <td  colspan="4" align="center"><input type="hidden" name="id" value=<?php echo $_GET['id'];?>/>
            <input type="submit" class="btn" name="update" value="Update">
            </div>
       
          </div>
          
        </center>
    </form>
</div>

    </div>


    
</body>
</html>