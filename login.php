<?php 
    $pesan = "";
    if(isset($_GET['pesan'])){
        if($_GET['pesan'] == "gagal"){
            $pesan = "Login gagal! username dan password salah!";
        }else if($_GET['pesan'] == "logout"){
            $pesan = "Anda telah berhasil logout";
        }else if($_GET['pesan'] == "belum_login"){
            $pesan = "Anda harus login untuk mengakses halaman admin";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link rel="icon" href="img/Bdan_stan.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
        body {
            background-image: url('img/gh.jpg');
            background-position: center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .container {
            width: 350px;
            padding: 40px;
            border-radius: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        }

        .container img {
            width: 45%;
            display: block;
            margin: auto;
            margin-bottom: 20px;
        }

        .message {
            background-color: red;
            color: white;
            text-align: center;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 20px;
        }

        .input-group input {
            width: 100%;
            padding: 15px;
            border: 2px solid #ddd;
            border-radius: 5px;
            margin-left: -18px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .input-group input:focus {
            border-color: #333;
        }

        .btn {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 5px;
            background-color: green;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: darkgreen;
        }

      
    </style>
</head>
<body>
    <div class="container">
        <img src="img/bg2.png" alt="Header Image">
        <?php if (!empty($pesan)) { ?>
            <div class="message"><?php echo $pesan; ?></div>
        <?php } ?>
        <center><form action="cek_login.php" method="POST" class="login-email">
            <div class="input-group">
                <input type="text" placeholder="Username" name="username">
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password">
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
        </form></center>
       
    </div>
</body>
</html>
