<?php

include 'koneksi.php';

if (isset($_POST['simpan'])) {

    $nama = $_POST['nama'];
    $keahlian = $_POST['keahlian'];
    $kontak = $_POST['kontak'];
    $deskripsi = $_POST['deskripsi'];

    $query = mysqli_query($koneksi, "INSERT INTO teknisi
        (nama, keahlian, kontak, deskripsi)
        VALUES
        ('$nama', '$keahlian', '$kontak', '$deskripsi')
    ");

    if ($query) {
        header("Location: index.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Teknisi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            IT Support / Helpdesk
        </a>

        <a href="index.php" class="btn btn-light">
            Data Teknisi
        </a>
    </div>
</nav>

<main class="container mt-4">

    <div class="card">
        <div class="card-body">

            <h1>Tambah Data Teknisi</h1>

            <hr>

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">Nama Teknisi</label>

                    <input
                        type="text"
                        name="nama"
                        class="form-control"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Keahlian Khusus</label>

                    <select name="keahlian" class="form-select" required>
                        <option value="">-- Pilih Keahlian --</option>
                        <option value="Network">Network</option>
                        <option value="Database">Database</option>
                        <option value="Hardware">Hardware</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kontak Internal</label>

                    <input
                        type="text"
                        name="kontak"
                        class="form-control"
                        placeholder="Contoh: Ext. 101"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>

                    <textarea
                        name="deskripsi"
                        class="form-control"
                        rows="4"
                    ></textarea>
                </div>

                <button
                    type="submit"
                    name="simpan"
                    class="btn btn-primary">
                    Simpan Data
                </button>

                <a href="index.php" class="btn btn-secondary">
                    Batal
                </a>

            </form>

        </div>
    </div>

</main>

</body>
</html>