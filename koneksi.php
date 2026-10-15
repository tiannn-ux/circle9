<?php

$koneksi = mysqli_connect("localhost", "root", "", "db_tubes_hasna");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>