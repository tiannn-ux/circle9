<?php

include 'koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($koneksi, "SELECT * FROM teknisi WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {

    $nama = $_POST['nama'];
    $keahlian = $_POST['keahlian'];
    $kontak = $_POST['kontak'];
    $deskripsi = $_POST['deskripsi'];

    mysqli_query($koneksi, "UPDATE teknisi SET
        nama='$nama',
        keahlian='$keahlian',
        kontak='$kontak',
        deskripsi='$deskripsi'
        WHERE id='$id'
    ");

    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teknisi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <div class="card">
        <div class="card-body">

            <h1>Edit Data Teknisi</h1>

            <form method="POST">

                <div class="mb-3">
                    <label class="form-label">Nama Teknisi</label>

                    <input
                        type="text"
                        name="nama"
                        class="form-control"
                        value="<?= htmlspecialchars($data['nama']); ?>"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Keahlian</label>

                    <select name="keahlian" class="form-select" required>

                        <option value="Network"
                            <?= $data['keahlian'] == 'Network' ? 'selected' : ''; ?>>
                            Network
                        </option>

                        <option value="Database"
                            <?= $data['keahlian'] == 'Database' ? 'selected' : ''; ?>>
                            Database
                        </option>

                        <option value="Hardware"
                            <?= $data['keahlian'] == 'Hardware' ? 'selected' : ''; ?>>
                            Hardware
                        </option>

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kontak Internal</label>

                    <input
                        type="text"
                        name="kontak"
                        class="form-control"
                        value="<?= htmlspecialchars($data['kontak']); ?>"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>

                    <textarea
                        name="deskripsi"
                        class="form-control"
                        rows="4"
                    ><?= htmlspecialchars($data['deskripsi']); ?></textarea>
                </div>

                <button
                    type="submit"
                    name="update"
                    class="btn btn-primary">
                    Update Data
                </button>

                <a href="index.php" class="btn btn-secondary">
                    Batal
                </a>

            </form>

        </div>
    </div>

</div>

</body>
</html>