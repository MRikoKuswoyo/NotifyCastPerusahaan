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

// Ambil id_pengumuman dari form yang dikirim
$id_pengumuman = $_POST['id_pengumuman'];

// Hapus terlebih dahulu komentar yang terkait dengan pengumuman
$query_hapus_komentar = mysqli_query($conn, "DELETE FROM komentar WHERE id_pengumuman = '$id_pengumuman'");
if (!$query_hapus_komentar) {
    die("Query failed to delete comments: " . mysqli_error($conn));
}

// Setelah komentar dihapus, baru hapus pengumuman
$query_hapus_pengumuman = mysqli_query($conn, "DELETE FROM pengumuman WHERE id_pengumuman = '$id_pengumuman'");
if (!$query_hapus_pengumuman) {
    die("Query failed to delete announcement: " . mysqli_error($conn));
}

// Redirect ke halaman dashboard atau halaman yang sesuai setelah berhasil menghapus
header("Location: dashboard_admin.php");
exit;
?>
