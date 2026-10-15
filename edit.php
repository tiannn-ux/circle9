<?php
include 'koneksi.php';
$id = $_GET['id'];

if (!$id) {
    header("Location: index.php");
    exit();
}

$query      = "SELECT * FROM gangguan WHERE id = '$id'";
$hasil      = mysqli_query($koneksi, $query);
$data       = mysqli_fetch_assoc($hasil);

if (!$data) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jenis Gangguan-Tingkat Prioritas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">

            <a class="navbar-brand" href="index.html">
                Gangguan IT
            </a>

            <div>
                <a href="index.php" class="btn btn-light">
                    Gangguan IT
                </a>
            </div>

        </div>
    </nav>

    <main class="container mt-4">

        <div class="form-container">

            <h1>Data Jenis Gangguan IT</h1>

            <p class="text-muted">
                Silakan isi jenis gangguan
            </p>

            <hr>

            <form action="proses-edit.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                <div class="mb-3">
                <label for="gangguan" class="form-label">Jenis Gangguan IT</label>
               
                <input
                    type="text"
                    class="form-control"
                    id="gangguan"
                    name="jenis_gangguan"
                    value="<?php echo $data['jenis_gangguan']; ?>"
                    required
                >
                    </div>

                    <div class="mb-3">
                        <label for="prioritas" class="form-label">Tingkat Prioritas</label>
                        <select class="form-select" id="prioritas" name="tingkat_prioritas" required>
                            <option value="Tinggi" <?php if($data['tingkat_prioritas'] == 'Tinggi') echo 'selected'; ?>>Tinggi</option>
                            <option value="Sedang" <?php if($data['tingkat_prioritas'] == 'Sedang') echo 'selected'; ?>>Sedang</option>
                            <option value="Rendah" <?php if($data['tingkat_prioritas'] == 'Rendah') echo 'selected'; ?>>Rendah</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Gangguan</label>
                        
                        <input
                            type="text"
                            class="form-control"
                            id="deskripsi"
                            name="deskripsi_gangguan"
                            value="<?php echo $data['deskripsi_gangguan']; ?>"
                            required
                        >
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update Data</button>
                        <a href="index.php" class="btn btn-secondary">Batal</a>
                    </div>
            </form>
        </div>

    </main>

</body>
</html>
</body>
</html>