<?php
include 'koneksi.php';

$query = mysqli_query($koneksi, "SELECT * FROM teknisi ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Teknisi / Support Staff</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            IT Support / Helpdesk
        </a>

        <div>
            <a href="index.php" class="btn btn-light me-2">
                Data Teknisi
            </a>

            <a href="tambah.php" class="btn btn-warning">
                + Tambah Teknisi
            </a>
        </div>
    </div>
</nav>

<main class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h1>Daftar Teknisi</h1>
            <p class="text-muted">
                Daftar teknisi dan support staff IT perusahaan.
            </p>
        </div>

        <a href="tambah.php" class="btn btn-primary">
            + Tambah Data
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">

            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama Teknisi</th>
                    <th>Keahlian</th>
                    <th>Kontak Internal</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                <?php
                $no = 1;

                while ($data = mysqli_fetch_assoc($query)) {
                ?>

                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($data['nama']); ?></td>
                    <td><?= htmlspecialchars($data['keahlian']); ?></td>
                    <td><?= htmlspecialchars($data['kontak']); ?></td>
                    <td><?= htmlspecialchars($data['deskripsi']); ?></td>

                    <td>
                        <a href="edit.php?id=<?= $data['id']; ?>"
                           class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        <a href="hapus.php?id=<?= $data['id']; ?>"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Yakin ingin menghapus data ini?')">
                            Hapus
                        </a>
                    </td>
                </tr>

                <?php } ?>

            </tbody>

        </table>
    </div>

</main>

</body>
</html>