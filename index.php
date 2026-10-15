<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Gangguan IT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">Gangguan IT</a>
        </div>
    </nav>
    <main class="container mb-5">

        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold text-primary">Daftar Laporan Gangguan IT</h5>
                <a href="tambah.php" class="btn btn-primary btn-sm fw-semibold">+ Tambah Gangguan Baru</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle mb-0">
                        <thead class="table-primary text-center">
                            <tr>
                                <th scope="col" style="width: 5%;">No.</th>
                                <th scope="col" style="width: 20%;">Jenis Gangguan IT</th>
                                <th scope="col" style="width: 15%;">Tingkat Prioritas</th>
                                <th scope="col" style="width: 45%;">Deskripsi Gangguan</th>
                                <th scope="col" style="width: 15%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'koneksi.php';

                            $data = mysqli_query($koneksi, "SELECT * FROM gangguan");
                            $no = 1;

                            if (mysqli_num_rows($data) > 0) {
                                while ($baris = mysqli_fetch_array($data)) {
                            ?>
                                    <tr>
                                        <th scope="row" class="text-center"><?php echo $no++; ?></th>
                                        <td class="fw-semibold"><?php echo $baris['jenis_gangguan']; ?></td>
                                        
                                        <!-- Badge Warna Otomatis Sesuai Tingkat Prioritas -->
                                        <td class="text-center">
                                            <?php 
                                            $prioritas = $baris['tingkat_prioritas'];
                                            $badgeClass = 'bg-secondary';
                                            if ($prioritas == 'Tinggi') $badgeClass = 'bg-danger';
                                            elseif ($prioritas == 'Sedang') $badgeClass = 'bg-warning text-dark';
                                            elseif ($prioritas == 'Rendah') $badgeClass = 'bg-success';
                                            ?>
                                            <span class="badge <?php echo $badgeClass; ?> px-2 py-1"><?php echo $prioritas; ?></span>
                                        </td>

                                        <td><?php echo $baris['deskripsi_gangguan']; ?></td>

                                        <!-- Tombol Aksi -->
                                        <td class="text-center">
                                            <a href="edit.php?id=<?php echo $baris['id']; ?>" class="btn btn-warning btn-sm me-1">Edit</a>
                                            <a href="hapus.php?id=<?php echo $baris['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                            ?>
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">Belum ada data gangguan IT yang tersimpan.</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
</html>