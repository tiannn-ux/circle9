<div>
    <!-- Act only according to that maxim whereby you can, at the same time, will that it should become a universal law. - Immanuel Kant -->
     <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Gangguan IT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">Gangguan IT</a>
            
            <div class="d-flex align-items-center">
                @auth
                    <span class="text-white me-3 d-none d-md-block">Halo, {{ Auth::user()->email }}</span>
                    <form action="{{ url('logout') }}" method="POST" class="m-0 p-0">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm fw-semibold">Logout</button>
                    </form>
                @endauth

                @guest
                    <a href="{{ url('login') }}" class="btn btn-light btn-sm fw-semibold">Login</a>
                @endguest
            </div>
        </div>
    </nav>
    <main class="container mb-5">

        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold text-primary">Daftar Laporan Gangguan IT</h5>
                <a href="/" class="btn btn-primary btn-sm fw-semibold">+ Tambah Gangguan Baru</a>
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
                                @auth
                                <th scope="col" style="width: 15%;">Aksi</th>
                                @endauth
                            </tr>
                        </thead>
                        <tbody>
                           @forelse ($gangguan as $item)
                                <tr>
                                    <th scope="row" class="text-center">{{ $loop->iteration }}</th>
                       
                                    <td class="fw-semibold">{{ $item->jenis_gangguan }}</td>
                                 
                                    <td class="text-center">
                                        @php 
                                            $prioritas = $item->tingkat_prioritas;
                                            $badgeClass = 'bg-secondary';
                                            if ($prioritas == 'Tinggi') $badgeClass = 'bg-danger';
                                            elseif ($prioritas == 'Sedang') $badgeClass = 'bg-warning text-dark';
                                            elseif ($prioritas == 'Rendah') $badgeClass = 'bg-success';
                                        @endphp
                                        <span class="badge {{ $badgeClass }} px-2 py-1">{{ $prioritas }}</span>
                                    </td>

                                    <td>{{ $item->deskripsi_gangguan }}</td>
                                    @auth
                                    <td class="text-center">
                                        <a href="{{ route('gangguan.edit', $item) }}" class="btn btn-warning btn-sm me-1">Edit</a>
                                        <form action="{{ route('gangguan.destroy', $item) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                    @endauth
                                </tr>
                        
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">Belum ada data gangguan IT yang tersimpan.</td>
                                </tr>
                            @endforelse
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
</html>