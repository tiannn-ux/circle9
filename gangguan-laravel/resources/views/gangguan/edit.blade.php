<div>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
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

            <a class="navbar-brand" href="/">
                Gangguan IT
            </a>

            <div>
                <a href="/" class="btn btn-light">
                    Gangguan IT
                </a>
            </div>

        </div>
    </nav>

    <main class="container mt-4">

        <div class="form-container">

            <h1>Edit Data</h1>

            <p class="text-muted">
                Silakan isi jenis gangguan
            </p>

            <hr>

            <form action="{{ route('gangguan.update', $gangguan) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                <label for="gangguan" class="form-label">Jenis Gangguan IT</label>
               
                <input
                    type="text"
                    class="form-control"
                    id="gangguan"
                    name="jenis_gangguan"
                    value="{{ old('jenis_gangguan', $gangguan->jenis_gangguan) }}" 
                    required
                >
                    </div>

                    <div class="mb-3">
                        <label for="prioritas" class="form-label">Tingkat Prioritas</label>
                        <select class="form-select" id="prioritas" name="tingkat_prioritas" required>
                            <option value="Tinggi"@selected($gangguan->tingkat_prioritas == 'Tinggi')>Tinggi</option>
                            <option value="Sedang"@selected($gangguan->tingkat_prioritas == 'Sedang')>Sedang</option>
                            <option value="Rendah"@selected($gangguan->tingkat_prioritas == 'Rendah')>Rendah</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Gangguan</label>
                        
                        <input
                            type="text"
                            class="form-control"
                            id="deskripsi"
                            name="deskripsi_gangguan"
                            required>{{ old('deskripsi_gangguan', $gangguan->deskripsi_gangguan) }}</textarea>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary">Update Data</button>
                        <a href="/" class="btn btn-secondary">Batal</a>
                    </div>
            </form>
        </div>

    </main>

</body>
</html>
</body>
</html>
</div>
