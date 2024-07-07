<?php
include "koneksi.php";
$query = mysqli_query($conn, "SELECT * FROM kritiksaran ORDER BY id ASC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Kritik Saran</title>
</head>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="css/navbar.css">
<link rel="stylesheet" href="css/kritik.css">

<style>
    /* kritik.css */

body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f9;
    margin: 0px;
    padding: 0pxs;
}

.nav {
    background-color: #2c3e50;
    color: #ecf0f1;
    padding: 0px;
    position: fixed;
    width: 100%;
    z-index: 1000;
}

.nav .containerr {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    padding: 0px;
    margin: 0px;
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
    margin-left: 20px;
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

.kritik-kontent {
    padding-top: 80px; /* compensate for fixed navbar */
    background-color: #ecf0f1;
    min-height: 100vh; /* full viewport height */
}

.containerr {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.judul-isian {
    text-align: center;
    margin-bottom: 30px;
}

.tabel-isi {
    width: 100%;
    border-collapse: collapse;
}

.tabel-isi th,
.tabel-isi td {
    padding: 10px;
    text-align: left;
}

.tabel-isi th {
    background-color: #2c3e50;
    color: #ecf0f1;
}

.tabel-isi tr:nth-child(even) {
    background-color: #ffffff;
}

.tabel-isi tr:nth-child(odd) {
    background-color: #f2f2f2;
}

.footer {
    background-color: #2c3e50;
    color: #ecf0f1;
    text-align: center;
    padding: 10px 0;
    position: fixed;
    bottom: 0;
    width: 100%;
}

</style>
<body>
    <!-- Navbar -->
    <nav class="nav">
        <div class="containerr">
            <div class="logo">
            <a href="dashboard_admin.php">NotifyCast</a>
            </div>
            <div class="navbar">
                <ul>
                    <li><a href="buat_pengumuman.php"> Buat Pengumuman</a></li>
                    <!-- <li><a href="chat.php">Chat</a></li> -->
                    <li><a href="kritikSaran.html">Kritik dan Saran</a></li>
                    <li><a href="aboutus.html">About Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Tutup Navbar -->
    <!-- Isi -->
    <div class="kritik-kontent">
        <div class="containerr">
            <div class="judul-isian">

                <h3>Daftar Kritik dan Saran</h3>

            </div>
            <div class="tabel">
                <table class="tabel-isi" border="1" cellspacing="0" width="100%">
                    <tr style="background: #74B243">
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Kritik dan Saran</th>
                        <th>Waktu</th>
                    </tr>
                    <?php
                    $no = 1;
                    while ($isi = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $isi['id'] ?>
                            </td>
                            <td>
                                <?php echo $isi['name'] ?>
                            </td>
                            <td>
                                <?php echo $isi['email'] ?>
                            </td>
                            <td>
                                <?php echo $isi['critic'] ?>
                            </td>
                            <td>
                                <?php echo $isi['created_at'] ?>
                            </td>
                        </tr>
                        <?php $no++;
                    } ?>
                </table>
            </div>
        </div>

    </div>
    <!-- Tutup Isi -->

    <script src="js/script.js"></script>
</body>

</html>