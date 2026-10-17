<?php

$koneksi = mysqli_connect("localhost", "root", "", "db_tubes_paw");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>