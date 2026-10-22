<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Teknisi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('teknisi.daftar') }}">
            IT Support / Helpdesk
        </a>

        <a href="{{ route('teknisi.daftar') }}" class="btn btn-light">
            Data Teknisi
        </a>
    </div>
</nav>

<main class="container mt-4">

    <div class="card">
        <div class="card-body">

            <h1>Edit Data Teknisi</h1>
            <hr>

            <form action="{{ route('teknisi.update', $teknisi) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Teknisi</label>

                    <input type="text"
                           name="nama"
                           class="form-control"
                           value="{{ old('nama', $teknisi->nama) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keahlian Khusus</label>

                    <select name="keahlian" class="form-select" required>

                        <option value="Network"
                            @selected($teknisi->keahlian == 'Network')>
                            Network
                        </option>

                        <option value="Database"
                            @selected($teknisi->keahlian == 'Database')>
                            Database
                        </option>

                        <option value="Hardware"
                            @selected($teknisi->keahlian == 'Hardware')>
                            Hardware
                        </option>

                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Kontak Internal</label>

                    <input type="text"
                           name="kontak"
                           class="form-control"
                           value="{{ old('kontak', $teknisi->kontak) }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keterangan</label>

                    <textarea name="deskripsi"
                              class="form-control"
                              rows="4">{{ old('deskripsi', $teknisi->deskripsi) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan Perubahan
                </button>

                <a href="{{ route('teknisi.daftar') }}"
                   class="btn btn-secondary">
                    Batal
                </a>

            </form>

        </div>
    </div>

</main>

</body>
</html>