<?php
include 'koneksi.php';
$koneksi = getKoneksi();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id       = $_POST['id'];
    $judul    = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $penulis  = $_POST['penulis'];
    $langkah  = $_POST['langkah_troubleshooting'];
    $status   = $_POST['status'];

   
    $query = "UPDATE articles SET 
                judul = '$judul',
                kategori = '$kategori',
                penulis = '$penulis',
                langkah_troubleshooting = '$langkah',
                status = '$status'
              WHERE id = '$id'";

    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "<h3>Gagal Mengupdate Data!</h3>";
        echo "Pesan Error: " . mysqli_error($koneksi);
    }
}
?>