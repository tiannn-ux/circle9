<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id                  = $_POST["id"];
    $jenis_gangguan      = $_POST["jenis_gangguan"];
    $tingkat_prioritas   = $_POST["tingkat_prioritas"];
    $deskripsi_gangguan  = $_POST["deskripsi_gangguan"];
    $sql = "UPDATE gangguan
            SET jenis_gangguan = '$jenis_gangguan', tingkat_prioritas = '$tingkat_prioritas', deskripsi_gangguan = '$deskripsi_gangguan'
            WHERE id = '$id'";
    mysqli_execute_query($koneksi, $sql,
    [$jenis_gangguan, $tingkat_prioritas, $deskripsi_gangguan, $id]);
    header("Location: index.php");
    exit();
}
?>





