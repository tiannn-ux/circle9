<?php
require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jenis_gangguan     = $_POST["jenis_gangguan"];
    $tingkat_prioritas  = $_POST["tingkat_prioritas"];
    $deskripsi_gangguan = $_POST["deskripsi_gangguan"]; 

    $sql = "INSERT INTO gangguan (jenis_gangguan, tingkat_prioritas, deskripsi_gangguan)
            VALUES ('$jenis_gangguan', '$tingkat_prioritas', '$deskripsi_gangguan')";
  
    if (mysqli_query($koneksi, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Gagal menyimpan data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jenis Gangguan - Tingkat Prioritas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php">Gangguan IT</a>
            <div>
                <a href="index.php" class="btn btn-light">Gangguan IT</a>
            </div>
        </div>
    </nav>

    <main class="container mt-4">
        <div class="form-container">

            <h1>Data Jenis Gangguan IT</h1>
            <p class="text-muted">Silakan isi jenis gangguan</p>
            <hr>

            <form action="" method="POST">

                <div class="mb-3">
                    <label for="jenis_gangguan" class="form-label">Jenis Gangguan IT</label>
                    <input
                        type="text"
                        class="form-control"
                        id="jenis_gangguan"
                        name="jenis_gangguan"
                        placeholder="Masukkan jenis gangguan"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="tingkat_prioritas" class="form-label">Tingkat Prioritas</label>
                    <select
                        class="form-select"
                        id="tingkat_prioritas"
                        name="tingkat_prioritas"
                        required
                    >
                        <option value="">-- Pilih Tingkat Prioritas --</option>
                        <option value="Tinggi">Tinggi</option>
                        <option value="Sedang">Sedang</option>
                        <option value="Rendah">Rendah</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="deskripsi_gangguan" class="form-label">Deskripsi Gangguan</label>
                    <input
                        type="text"
                        class="form-control"
                        id="deskripsi_gangguan"
                        name="deskripsi_gangguan"
                        placeholder="Deskripsikan gangguan"
                        required
                    >
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                </div>

            </form>

        </div>
    </main>

</body>
</html>