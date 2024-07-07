<?php
session_start();
include "koneksi.php";

// Pastikan ada parameter ID yang diterima dari GET
$id_pengumuman = isset($_GET['id']) ? $_GET['id'] : null;

// Simpan ID pengumuman ke session untuk digunakan setelah menghapus komentar
$_SESSION['id_pengumuman'] = $id_pengumuman;

// Ambil informasi pengumuman dari database jika ada ID yang valid
$hasil_pengumuman = null;
$query_komentar = null;

if ($id_pengumuman) {
    // Ambil informasi pengumuman dari database berdasarkan ID
    $query_pengumuman = mysqli_query($conn, "SELECT * FROM pengumuman WHERE id_pengumuman = '$id_pengumuman'");
    $hasil_pengumuman = mysqli_fetch_array($query_pengumuman);

    // Ambil komentar terkait pengumuman jika ada
    $query_komentar = mysqli_query($conn, "SELECT * FROM komentar WHERE id_pengumuman = '$id_pengumuman'");
}

// Fungsi untuk menyimpan komentar
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($id_pengumuman) {
        $nama = $_SESSION['user'];
        $komentar = $_POST['komentar'];

        // Simpan komentar ke database
        $query_simpan = mysqli_query($conn, "INSERT INTO komentar (id_pengumuman, nama, komentar) VALUES ('$id_pengumuman', '$nama', '$komentar')");

        if (!$query_simpan) {
            die("Query failed: " . mysqli_error($conn));
        }

        // Redirect to avoid resubmission
        header("Location: detail_pengumuman.php?id=$id_pengumuman");
        exit;
    } else {
        echo "ID Pengumuman tidak valid.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengumuman</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
    /* Gaya CSS sesuai kebutuhan Anda */
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
    .lampir {
    text-align: center; /* Untuk menengahkan gambar */
    }

    .lampir img {
        max-width: 100%; /* Ukuran maksimum gambar */
        height: auto; /* Biarkan tinggi otomatis sesuai proporsi */
        border-radius: 10px; /* Corner radius */
        margin-bottom: 10px; /* Jarak antara gambar dengan teks */
        display: inline-block; 
    }

    .desc {
        padding: 20px;
        background-color: #ecf0f1;
        border-radius: 10px;
        margin-top: 0px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center; /* Teks dalam div desc menjadi tengah */
    }

    .desc h1 {
        margin-bottom: 10px; /* Jarak bawah untuk element h3 */
    }

    .tanggal {
        color: #95a5a6;
        font-size: 0.9em;
    }

    .kontent-dashboard {
        margin-top: 20px;
    }

    .isi-komentar {
        background-color: #f2f3f4;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    form textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        resize: vertical;
    }

    form .kirim-komentar-btn {
        padding: 10px 20px;
        background-color: #2c3e50;
        color: #ecf0f1;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        display: flex;
        align-items: center;
    }

    form .kirim-komentar-btn i {
        margin-right: 5px;
    }

    form .kirim-komentar-btn:hover {
        background-color: #34495e;
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
        <!-- Informasi Pengumuman -->
        <div class="profil">
            <!-- Tampilkan gambar jika ada -->
            <div class="lampir">
                <?php if ($hasil_pengumuman && $hasil_pengumuman['gambar']) { ?>
                    <img src="uploads/<?php echo $hasil_pengumuman['gambar']; ?>" alt="gambar">
                <?php } else { ?>
                    <img src="img/bg-gray.jpg" alt="gambar">
                <?php } ?>
            </div>
            <!-- Tampilkan judul dan isi pengumuman jika ada -->
            <div class="desc">
                <?php if ($hasil_pengumuman) { ?>
                    <h1><?php echo $hasil_pengumuman['judul']; ?></h1>
                    <p class="tanggal">Diumumkan pada: <?php echo date("d-m-Y H:i", strtotime($hasil_pengumuman['created_at'])); ?></p>
                    <p><?php echo $hasil_pengumuman['isi_pengumuman']; ?></p>
                    
                <?php } else { ?>
                    <p>Pengumuman tidak ditemukan.</p>
                <?php } ?>
            </div>
        </div>

        <!-- Kolom Komentar -->
        <div class="kontent-dashboard">
            <h3>Komentar</h3>
            <?php
            // Tampilkan daftar komentar jika ada
            if ($query_komentar && mysqli_num_rows($query_komentar) > 0) {
                while ($komentar = mysqli_fetch_array($query_komentar)) {
                    ?>
                    <div class="isi-komentar">
                        <p><strong><?php echo htmlspecialchars($komentar['nama']); ?></strong>: <?php echo htmlspecialchars($komentar['komentar']); ?></p>
                        <!-- Tombol Hapus dengan Icon -->
                        <form method="post" action="hapus_komentar.php">
                            <input type="hidden" name="id_komentar" value="<?php echo $komentar['id_komentar']; ?>">
                            <button type="submit" class="hapus-komentar-btn"><i class="fas fa-trash-alt"></i> Hapus</button>
                        </form>
                    </div>
                    <?php
                }
            } else {
                echo "<p>Belum ada komentar untuk pengumuman ini.</p>";
            }
            ?>

            <!-- Form Komentar -->
            <form method="post" action="">
                <textarea name="komentar" rows="4" placeholder="Tulis komentar Anda..." required></textarea><br>
                <button type="submit" class="kirim-komentar-btn"><i class="fas fa-paper-plane"></i> Kirim Komentar</button>
            </form>
        </div>
    </div>
    <!-- Tutup Konten -->

    <script src="js/script.js"></script>
</body>

</html>
