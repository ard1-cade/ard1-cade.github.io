<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

<body background="img/gh.jpg">
    <audio id="successSound">
    <source src="admin/suara.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>
    <div id="template">
        <nav id="navbar">
            <ul>
                <li><img src="img/bg2.png" alt="Header Image" style="height:68px; margin-left:20px"></li>
                <li style="margin-left: 20px"><a class="nav-link scrollto" href="index.php">Home</a></li>
                <li><a class="nav-link scrollto" href="non_anggota.php">Pengunjung</a></li>
                  <li><a class="nav-link scrollto" href="https://jambi.bsip.pertanian.go.id/">Info BSIP</a></li>
            </ul>
        </nav>
        <br>

            <!-- Formulir Data Pengunjung -->
          <div id="form-section" style="background-color: rgba(255, 255, 255, 0.9); padding: 20px; border-radius: 12px;">
    <h2 style="text-align: center;">Formulir Data Pengunjung</h2>
    <br>
    <form id="form" method="POST" action="action.php">
        <div class="input-group">
            <label class="input-label" for="name">Nama</label>
            <input type="text" class="input-field" name="name" id="name" required>
        </div>
        <div class="input-group">
            <label class="input-label" for="no_hp">No Handphone</label>
            <input type="text" class="input-field" name="no_hp" id="no_hp" pattern="[0-9]*"
                title="No Handphone harus terdiri dari angka" required minlength="10" maxlength="14">
        </div>
         <div class="input-group">
            <label class="input-label" for="email">Email</label>
            <input type="email" class="input-field" name="email" id="email" required>
        </div>
        <div class="input-group">
            <label class="input-label" for="tanggal">Tanggal</label>
            <input name="tanggal" type="date" id="tanggal" class="input-field"
                value="<?= date('Y-m-d'); ?>" required readonly />
        </div>
        <div class="input-group">
            <label class="input-label" for="pekerjaan">Pekerjaan</label>
            <select name="pekerjaan" id="pekerjaan" class="select-field" required>
                <optgroup label="Pekerjaan">
                    <option value="ASN">ASN</option>
                    <option value="Swasta">Swasta</option>
                    <option value="Wiraswasta">Wiraswasta</option>
                    <option value="Petani">Petani</option>
                    <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                    <option value="Umum">Umum</option>
                    <option value="Lainnya">Lainnya</option>
                </optgroup>
            </select>
        </div>
        <div class="input-group">
            <label class="input-label" for="jenis_kelamin">Jenis Kelamin</label>
            <div class="radio-group">
                <input type="radio" name="jenis_kelamin" id="Laki Laki" value="Laki Laki" required><label
                    class="radio-label" for="Laki Laki">Laki - Laki</label>
                <input type="radio" name="jenis_kelamin" id="Perempuan" value="Perempuan"
                    required><label class="radio-label" for="Perempuan">Perempuan</label>
            </div>
        </div>
        <div class="input-group">
            <label class="input-label" for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" class="input-field" required></textarea>
        </div>
        <div class="input-group">
            <label class="input-label" for="tujuan">Tujuan</label>
            <textarea name="tujuan" id="tujuan" class="input-field" required></textarea>
        </div>
        <center>
            <div id="my_camera"></div>
            <br>
            <hr>
            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </center>
    </form>
</div>

    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <!-- bootstrap js  -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>
    <!-- webcamjs  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>

    <script language="JavaScript">
        Webcam.set({
            width: 320,
            height: 240,
            image_format: 'jpeg',
            jpeg_quality: 90,
            flip_horiz: true // Menambahkan properti untuk membalik gambar horizontal
        });

        Webcam.attach('#my_camera');

        $("#form").submit(function (event) {
            event.preventDefault();
            var image = '';
            var name = $('#name').val();
            var no_hp = $('#no_hp').val();
            var email = $('#email').val();
            var tanggal = $('#tanggal').val();
            var pekerjaan = $('#pekerjaan').val();
            var jenis_kelamin = $("input[name='jenis_kelamin']:checked").val();
            var tujuan = $('#tujuan').val();
            var alamat = $('#alamat').val();

            Webcam.snap(function (data_uri) {
                image = data_uri;

                $.ajax({
                    url: 'action.php',
                    type: 'POST',
                    data: {
                        name: name,
                        no_hp: no_hp,
                        email: email,
                        tanggal: tanggal,
                        pekerjaan: pekerjaan,
                        jenis_kelamin: jenis_kelamin,
                        tujuan: tujuan,
                        alamat: alamat,
                        image: image
                    },
          success: function(response) {
    $('#form')[0].reset(); // Mereset form setelah sukses

    // Menampilkan SweetAlert
    Swal.fire({
        icon: 'success',
        title: 'Selamat Datang ' + name + '!',
        text: 'Data berhasil disimpan!',
        showConfirmButton: false,
        timer: 1000 // Durasi popup (dalam milidetik)
    }).then(function() {
        // Setelah SweetAlert ditutup, scroll ke bagian atas halaman
        setTimeout(function() {
            window.scrollTo({
                top: 0,
                behavior: "smooth" // Animasi scroll
            });
        }, 1700); // Menunggu 100 milidetik sebelum melakukan scroll
    });

    // Memutar suara ketika data berhasil disimpan
    var successSound = document.getElementById("successSound");
    successSound.play();

    return false; // Menghentikan proses default setelah sukses
},
error: function() {
    $('#errorMessage').show();
    $('#message').hide();
}



            });
            });
        });
    </script>
</body>
</html>