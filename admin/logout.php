<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body>
    <script>
        var confirmLogout = confirm('Apakah Anda yakin ingin keluar?');
        if (confirmLogout) {
            // Jika user menekan OK, maka lakukan logout
            window.location.href = 'logout_process.php';
        } else {
            // Jika user menekan Cancel, langsung redirect ke halaman admin
            window.location.replace('admin.php');
        }
    </script>
</body>
</html>
