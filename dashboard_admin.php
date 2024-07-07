<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user'] == '') {
    header('location: index.php');
    exit;
}
include "koneksi.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Execute the query
$query = mysqli_query($conn, "SELECT * FROM pengumuman ORDER BY id_pengumuman DESC");

// Check if the query was successful
if (!$query) {
    die("Query failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .nav {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 0;
        }

        .nav .containerr {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            padding: 0px;
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
            margin-left: 50px;
        }

        .nav .navbar ul li {
            margin-left: 100px;
        }

        .nav .navbar ul li a {
            color: #ecf0f1;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .nav .navbar ul li a:hover {
            background-color: #34495e;
        }

        .isi-dashboard {
            display: flex;
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }

        .profil {
            flex: 1;
            background-color: #34495e;
            color: #ecf0f1;
            padding: 20px;
            border-radius: 10px;
            margin-right: 20px;
        }

        .profil .foto {
            text-align: center;
            margin-bottom: 20px;
        }

        .profil .foto img {
            width: 150px;
            border-radius: 50%;
        }

        .profil .identity {
            text-align: center;
        }

        .profil .nama {
            background-color: #74B243;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 10px;
        }

        .profil .logout {
            background-color: #e74c3c;
            border-radius: 10px;
            padding: 10px;
        }

        .profil .nama a,
        .profil .logout a {
            color: #ecf0f1;
            text-decoration: none;
        }

        .profil .logout:hover {
            background-color: #c0392b;
        }

        .kontent-dashboard {
            width:100%;
            flex: 3;
            display: flex;
            flex-direction: column;
        }

        .isi-kontent {
            background-color: #ecf0f1;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .isi-kontent .lampir img {
            width: 250px;
            height: 150px;
            object-fit: cover;
            margin-right: 20px;
            border-radius: 5px;
        }

        .isi-kontent .desc {
            flex: 1;
        }

        .isi-kontent .desc h3 {
            margin: 0 0 10px 0;
            font-size: 1.5em;
            color: #2c3e50; /* Warna judul pengumuman */
        }

        .isi-kontent .desc p {
            margin: 0 0 10px 0;
            color: #7f8c8d;
        }

        .isi-kontent .desc .tanggal {
            margin: 0 0 10px 0;
            color: #95a5a6;
            font-size: 0.9em;
        }

        .isi-kontent .desc button {
            padding: 10px 15px;
            background-color: #2c3e50;
            color: #ecf0f1;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-right: 10px;
        }

        .isi-kontent .desc button:hover {
            background-color: #c0392b;
        }
    </style>
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
                    <li><a href="buat_pengumuman.php">Buat Pengumuman</a></li>
                    <li><a href="tampil_kritik.php">Kritik dan Saran</a></li>
                    <li><a href="aboutus.html">About Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Tutup Navbar -->

    <!-- Konten -->
    <div class="isi-dashboard">
        <div class="profil">
            <div class="foto">
                <img src="img/profil.jpg" alt="foto">
            </div>
            <div class="identity">
                <div class="nama">
                    <?php echo $_SESSION['user']; ?>
                </div>
                <div class="nama logout" onclick="logout()"><a href="">Log Out</a></div>
            </div>
        </div>
        <div class="kontent-dashboard">
            <?php
            while ($isi = mysqli_fetch_array($query)) {
                // Tampilkan hanya sebagian dari isi pengumuman
                $excerpt = mb_substr($isi['isi_pengumuman'], 0, 100) . (strlen($isi['isi_pengumuman']) > 50 ? '...' : '');
                ?>
                <div class="isi-kontent">
                    <div class="lampir">
                        <?php if ($isi['gambar']) { ?>
                            <a href="detail_pengumuman.php?id=<?php echo $isi['id_pengumuman']; ?>"><img src="uploads/<?php echo $isi['gambar']; ?>" alt="gambar"></a>
                        <?php } else { ?>
                            <a href="detail_pengumuman.php?id=<?php echo $isi['id_pengumuman']; ?>"><img src="img/bg-gray.jpg" alt="gambar"></a>
                        <?php } ?>
                    </div>
                    <div class="desc">
                        <h3><a href="detail_pengumuman.php?id=<?php echo $isi['id_pengumuman']; ?>" style="color: #2c3e50;"><?php echo $isi['judul']; ?></a></h3>
                        <p class="tanggal">Diumumkan pada: <?php echo date("d-m-Y H:i", strtotime($isi['created_at'])); ?></p>
                        <p><?php echo $excerpt; ?></p>

                        <form method="post" action="hapus_pengumuman.php" style="display:inline-block;">
                            <input type="hidden" name="id_pengumuman" value="<?php echo $isi['id_pengumuman']; ?>">
                            <button type="submit">Hapus</button>
                        </form>
                        <form method="post" action="detail_pengumuman.php?id=<?php echo $isi['id_pengumuman']; ?>" style="display:inline-block;">
                            <button type="submit" style="background-color: #2c3e50; color: #ecf0f1; border: none; border-radius: 5px; padding: 10px 15px; cursor: pointer; transition: background-color 0.3s; margin-right: 10px;">
                                Lihat Komentar
                            </button>
                        </form>

                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- Tutup Konten -->
    <script src="js/script.js"></script>
</body>

</html>
