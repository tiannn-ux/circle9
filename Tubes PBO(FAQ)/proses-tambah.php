<?php
include 'koneksi.php';
$koneksi = getKoneksi();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul    = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $penulis  = $_POST['penulis'];
    $langkah  = $_POST['langkah_troubleshooting'];
    $status   = $_POST['status'];

    $query = "INSERT INTO articles (judul, kategori, penulis, langkah_troubleshooting, status) 
              VALUES ('$judul', '$kategori', '$penulis', '$langkah', '$status')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "<h3>Gagal Menyimpan Data!</h3>";
        echo "Pesan Error: " . mysqli_error($koneksi);
    }
}
?>