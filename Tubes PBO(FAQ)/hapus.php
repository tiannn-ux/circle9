<?php
include 'koneksi.php';
$koneksi = getKoneksi();
$id = $_GET['id'] ?? null;

if ($id) {
 
    $query = "DELETE FROM articles WHERE id = '$id'";

    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menghapus data: " . mysqli_error($koneksi);
    }
} else {
    header("Location: index.php");
    exit();
}
?>