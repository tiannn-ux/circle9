<?php
include 'koneksi.php';
$koneksi = getKoneksi();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jenis_gangguan = $_POST['jenis_gangguan'];
    $tingkat_prioritas = $_POST['tingkat_prioritas'];
    $deskripsi_gangguan = $_POST['deskripsi_gangguan'];

    $query = "INSERT INTO gangguan (jenis_gangguan, tingkat_prioritas, deskripsi_gangguan)
                VALUES ('$jenis_gangguan', '$tingkat_prioritas', '$deskripsi_gangguan')";

    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "<h3>Data gagal disimpan!</h3>";
        echo "Pesan Error: " . mysqli_error($koneksi);
    }
}
?>