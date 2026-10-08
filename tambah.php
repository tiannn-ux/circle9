
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

            <form action="simpan.php" method="POST">

                <div class="mb-3">
                    <label for="gangguan" class="form-label">
                        Jenis Gangguan IT
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        id="gangguan"
                        name="gangguan"
                        placeholder="Masukkan jenis gangguan"
                        required

                    >
                </div>

                <div class="mb-3">

                    <label for="prioritas" class="form-label">
                        Tingkat Prioritas
                    </label>

                    <select
                        class="form-select"
                        id="prioritas"
                        name="prioritas"
                        required
                    >
                        <option value="">-- Pilih Jenis Gangguan --</option>
                        <option value="Tinggi">Tinggi</option>
                        <option value="Sedang">Sedang</option>
                        <option value="Rendah">Rendah</option>
                    </select>

                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">
                        Deskripsi Gangguan
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        id="deskripsi"
                        name="deskripsi"
                        placeholder="Deskripsikan gangguan"
                        required

                    >
                </div>

                <div class="mt-4">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Simpan Data
                    </button>

                    <a
                        href="index.php"
                        class="btn btn-secondary"
                    >
                        Batal
                    </a>

                </div>

            </form>

        </div>

    </main>

</body>
</html>