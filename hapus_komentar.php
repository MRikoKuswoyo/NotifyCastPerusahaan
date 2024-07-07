<?php
session_start();
include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_komentar = $_POST['id_komentar'];
    
    // Periksa apakah pengguna memiliki akses untuk menghapus komentar
    // Misalnya, Anda dapat memeriksa apakah pengguna adalah pemilik komentar atau memiliki akses admin
    
    // Lakukan penghapusan komentar
    $query_hapus = mysqli_query($conn, "DELETE FROM komentar WHERE id_komentar = '$id_komentar'");
    
    if ($query_hapus) {
        // Kirim respon ke JavaScript (Ajax) jika digunakan
        echo json_encode(['status' => 'success']);

        // Redirect back to detail_pengumuman.php after successful deletion
        $id_pengumuman = isset($_SESSION['id_pengumuman']) ? $_SESSION['id_pengumuman'] : null;
        if ($id_pengumuman) {
            header("Location: detail_pengumuman.php?id=$id_pengumuman");
            exit;
        } else {
            echo "ID Pengumuman tidak valid.";
        }
    } else {
        // Kirim respon ke JavaScript (Ajax) jika digunakan
        echo json_encode(['status' => 'error', 'message' => mysqli_error($conn)]);
    }
}
?>
