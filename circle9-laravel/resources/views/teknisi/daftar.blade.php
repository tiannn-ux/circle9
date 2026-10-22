<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Teknisi</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('teknisi.daftar') }}">
            IT Support / Helpdesk
        </a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-light">
                Logout
            </button>
        </form>
    </div>
</nav>

<main class="container mt-4">

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar Teknisi</h1>

        <a href="{{ route('teknisi.tambah') }}"
           class="btn btn-primary">
            + Tambah Teknisi
        </a>
    </div>

    <div class="card">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Keahlian</th>
                            <th>Kontak</th>
                            <th>Deskripsi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($teknisi as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->keahlian }}</td>
                            <td>{{ $item->kontak }}</td>
                            <td>{{ $item->deskripsi }}</td>

                            <td class="text-center">

    <a href="{{ route('teknisi.edit', $item) }}"
       class="btn btn-warning btn-sm">
        Edit
    </a>

    <form action="{{ route('teknisi.destroy', $item) }}"
          method="POST"
          class="d-inline"
          onsubmit="return confirm('Yakin ingin menghapus teknisi ini?')">

        @csrf
        @method('DELETE')

        <button type="submit"
                class="btn btn-danger btn-sm">
            Hapus
        </button>

    </form>

</td>
                        </tr>
                        @endforeach

                        @if ($teknisi->isEmpty())
                        <tr>
                            <td colspan="6"
                                class="text-center text-muted">
                                Belum ada data teknisi.
                            </td>
                        </tr>
                        @endif
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</main>

</body>
</html>