<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Pengumuman</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .nav {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 0px;
        }

        .nav .containerr {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .nav .logo a {
            color: #ecf0f1;
            font-size: 24px;
            text-decoration: none;
        }

        .nav .navbar ul {
            list-style-type: none;
            display: flex;
            align-items: center;
            margin: 0;
            padding: 0;
        }

        .nav .navbar ul li {
            margin-left: 20px;
        }

        .nav .navbar ul li:first-child {
            margin-left: 0;
        }

        .nav .navbar ul li a {
            color: #ecf0f1;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .nav .navbar ul li a:hover {
            background-color: #34495e;
        }

        .kontent-pengumuman {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ecf0f1;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .judul-pengumuman {
            text-align: center;
            margin-bottom: 20px;
        }

        .judul-pengumuman h3 {
            color: #2c3e50;
            font-size: 1.5em;
        }

        .latar {
            text-align: center;
        }

        .isi-pengumuman {
            margin-bottom: 20px;
        }

        .isi-pengumuman input[type="text"],
        .isi-pengumuman textarea,
        .isi-pengumuman input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .pengumumanbtn {
            background-color: #74B243;
            color: #E6E6E6;
            border: none;
            border-radius: 10px;
            padding: 10px 0;
            width: 100%;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .pengumumanbtn:hover {
            background-color: #D79E31;
        }
    </style>
    <script>
        function handleFocus() {
            var textarea = document.getElementById('isi-pesan');
            if (textarea.value === 'Isi Pengumuman') {
                textarea.value = '';
            }
        }
    </script>
</head>

<body>
    <!-- Navbar -->
    <nav class="nav">
        <div class="containerr">
            <div class="logo">
                <a href="dashboard_admin.php">NotifyCast</a>
            </div>
            <div class="navbar">
                <ul>
                    <li><a href="">Buat Pengumuman</a></li>
                    <li><a href="kritikSaran.html">Kritik dan Saran</a></li>
                    <li><a href="aboutus.html">About Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Tutup Navbar -->

    <div class="kontent-pengumuman">
        <div class="box-pengumuman">
            <div class="judul-pengumuman">
                <h3>Pembuatan Pengumuman</h3>
            </div>
            <div class="latar">
                <form action="" method="post" id="pengumuman" enctype="multipart/form-data">
                    <div class="isi-pengumuman">
                        <input type="text" name="judul" id="judul" placeholder="Judul Pengumuman" required>
                        <textarea name="isi-pesan" id="isi-pesan" cols="30" rows="10" required onfocus="handleFocus()" placeholder="Isi Pengumuman"></textarea>
                        <input type="file" name="gambar" id="gambar" required>
                    </div>
                    <input type="submit" value="Kirim" name="kirim" class="pengumumanbtn">
                </form>
                <?php
                if (isset($_POST['kirim'])) {
                    $judul = $_POST['judul'];
                    $isi = $_POST['isi-pesan'];
                    $gambar = $_FILES['gambar']['name'];
                    $target_dir = "uploads/";
                    $target_file = $target_dir . basename($gambar);

                    // include database connection file
                    include "koneksi.php";

                    // Check if the uploads directory exists, if not create it
                    if (!is_dir($target_dir)) {
                        mkdir($target_dir, 0777, true);
                    }

                    // Move the uploaded file to the desired directory
                    if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_file)) {
                        // Insert user data into table
                        $data = "INSERT INTO pengumuman (judul, isi_pengumuman, gambar) VALUES('$judul','$isi', '$gambar')";
                        $kirim = mysqli_query($conn, $data);
                        if ($kirim) {
                            echo "Pengumuman berhasil dikirim!";
                        } else {
                            echo "Pengumuman gagal dikirim!";
                        }
                    } else {
                        echo "Gagal mengunggah gambar.";
                    }
                }
                ?>
            </div>
        </div>
    </div>


    <script src="js/script.js"></script>
</body>

</html>
