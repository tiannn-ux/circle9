<?php
include 'koneksi.php';
$koneksi = getKoneksi();

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: index.php");
    exit();
}

$query  = "SELECT * FROM articles WHERE id = '$id'";
$result = mysqli_query($koneksi, $query);
$data   = mysqli_fetch_assoc($result);

if (!$data) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Artikel Knowledge Base</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- navbar cenahh -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-github shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold" href="index.php">
        <span class="text-gold">★</span> IT Helpdesk System
      </a>
    </div>
  </nav>

  <!-- form buat ngeditnya  -->
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card card-custom shadow-sm p-4">
          <h3 class="fw-bold mb-3 text-gold border-bottom border-secondary pb-2">Edit Artikel Solusi</h3>
          
          <form action="proses-edit.php" method="POST">
            <!-- buat nginput id nya -->
            <input type="hidden" name="id" value="<?= $data['id']; ?>">

            <div class="mb-3">
              <label class="form-label fw-semibold">Judul Artikel Solusi / Troubleshooting</label>
              <input type="text" class="form-control form-control-github" name="judul" value="<?= htmlspecialchars($data['judul']); ?>" required>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">Kategori Masalah</label>
                <input type="text" class="form-control form-control-github" name="kategori" value="<?= htmlspecialchars($data['kategori']); ?>" required>
              </div>

             <div class="col-md-6 mb-3">
              <label for="kategori" class="form-label fw-semibold">Kategori Masalah</label>
              <select class="form-select form-control-github" id="kategori" name="kategori" required>
                <option value="Hardware" <?= ($data['kategori'] == 'Hardware') ? 'selected' : ''; ?>>Hardware</option>
                <option value="Software" <?= ($data['kategori'] == 'Software') ? 'selected' : ''; ?>>Software</option>
                <option value="Jaringan" <?= ($data['kategori'] == 'Jaringan') ? 'selected' : ''; ?>>Jaringan</option>
                <option value="Akses & Akun" <?= ($data['kategori'] == 'Akses & Akun') ? 'selected' : ''; ?>>Akses & Akun</option>
              </select>
            </div>
            </div>

            <div class="mb-3">
              <label class="form-label fw-semibold">Langkah-Langkah Troubleshooting / Solusi</label>
              <textarea class="form-control form-control-github" name="langkah_troubleshooting" rows="4" required><?= htmlspecialchars($data['langkah_troubleshooting']); ?></textarea>
            </div>

            <div class="mb-4">
              <label class="form-label d-block fw-semibold">Status Artikel</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="statusPublished" value="Published" <?= ($data['status'] == 'Published') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="statusPublished">Published</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="status" id="statusDraft" value="Draft" <?= ($data['status'] == 'Draft') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="statusDraft">Draft</label>
              </div>
            </div>

            <div class="d-flex justify-content-between">
              <a href="index.php" class="btn btn-outline-gold">Batal</a>
              <button type="submit" class="btn btn-custom-gold">Simpan Perubahan</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>