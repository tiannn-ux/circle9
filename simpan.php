<?php
include 'koneksi.php';

$gangguan = $_POST['gangguan'];
$prioritas = $_POST['prioritas'];
$deskripsi = $_POST['deskripsi'];

$query = "INSERT INTO gangguan (jenis_gangguan, tingkat_prioritas, deskripsi_gangguan) VALUES ('$gangguan', '$prioritas', '$deskripsi')";
mysqli_query($koneksi, $query);

header("Location: index.php");
?>
