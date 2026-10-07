<?php
include 'koneksi.php';
$koneksi = getKoneksi();

$query  = "SELECT * FROM articles ORDER BY id ASC";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Knowledge Base / FAQ - IT Support</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark navbar-github shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="index.php">
        <span class="text-gold">★</span> IT Helpdesk System
      </a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="index.php">Daftar Artikel FAQ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tambah.php">Tambah Artikel Baru</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h2 class="fw-bold mb-1">Modul Knowledge Base & FAQ</h2>
        <p class="text-github-muted mb-0">Kelola master artikel solusi teknis, panduan mandiri, dan langkah troubleshooting.</p>
      </div>
      <a href="tambah.php" class="btn btn-custom-gold">+ Tambah Artikel</a>
    </div>

    <div class="card card-custom shadow-sm">
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-github align-middle mb-0">
            <thead>
              <tr>
                <th scope="col" class="ps-4">No</th>
                <th scope="col">Judul Artikel Solusi</th>
                <th scope="col">Kategori</th>
                <th scope="col">Penulis</th>
                <th scope="col">Langkah Troubleshooting</th>
                <th scope="col">Status</th>
                <th scope="col" class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php 
              $no = 1;
              if (mysqli_num_rows($result) > 0): 
                while ($row = mysqli_fetch_assoc($result)): 
              ?>
                <tr>
                  <td class="ps-4 fw-semibold"><?= $no++; ?></td>
                  <td class="fw-bold text-gold"><?= htmlspecialchars($row['judul']); ?></td>
                  <td><span class="badge badge-gold"><?= htmlspecialchars($row['kategori']); ?></span></td>
                  <td><?= htmlspecialchars($row['penulis']); ?></td>
                  <td style="max-width: 250px;" class="text-github-muted"><?= htmlspecialchars($row['langkah_troubleshooting']); ?></td>
                  <td>
                    <?php if ($row['status'] === 'Published'): ?>
                      <span class="badge bg-success">Published</span>
                    <?php else: ?>
                      <span class="badge badge-draft">Draft</span>
                    <?php endif; ?>
                  </td>
                  <!-- Buat ngedit si formnya  -->
                  <td class="text-center">
                    <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning mb-1">Edit</a>
                    <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger mb-1" onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">Hapus</a>
                  </td>
                </tr>
              <?php 
                endwhile; 
              else: 
              ?>
                <tr>
                  <td colspan="7" class="text-center py-4 text-github-muted">Belum ada data artikel.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>