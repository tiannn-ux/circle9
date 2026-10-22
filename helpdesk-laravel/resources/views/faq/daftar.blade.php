<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knowledge Base / FAQ - IT Support</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <!-- Navigasi Utama -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-github shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('faq.daftar') }}">
                <span class="text-gold"></span> IT Helpdesk System
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('faq.daftar') }}">Daftar Artikel FAQ</a>
                    </li>
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('faq.create') }}">Tambah Artikel Baru</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn nav-link border-0 bg-transparent text-danger">Logout
                                ({{ Auth::user()->username }})</button>
                        </form>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Utama -->
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-1">Knowledge Base & FAQ</h2>
                <p class="text-github-muted mb-0">Kelola master artikel solusi teknis, panduan mandiri, dan langkah
                    troubleshooting.</p>
            </div>
            @auth
            <a href="{{ route('faq.create') }}" class="btn btn-custom-gold">+ Tambah Artikel</a>
            @endauth
        </div>

        <!-- Alert Notifikasi Flash Session -->
        @if (session('success'))
        <div class="alert alert-success bg-dark text-light border-secondary mb-3">
            {{ session('success') }}
        </div>
        @endif

        <!-- Tabel Data FAQ -->
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
                                @auth
                                <th scope="col" class="text-center">Aksi</th>
                                @endauth
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($faqs as $item)
                            <tr>
                                <td class="ps-4 fw-semibold">{{ $loop->iteration }}</td>
                                <td class="fw-bold text-gold">{{ $item->judul }}</td>
                                <td><span class="badge badge-gold">{{ $item->kategori }}</span></td>
                                <td>{{ $item->penulis }}</td>
                                <td style="max-width: 250px;" class="text-github-muted">
                                    {{ $item->langkah_troubleshooting }}
                                </td>
                                <td>
                                    @if ($item->status === 'Published')
                                    <span class="badge bg-success">Published</span>
                                    @else
                                    <span class="badge badge-draft">Draft</span>
                                    @endif
                                </td>
                                @auth
                                <td class="text-center">
                                    <a href="{{ route('faq.edit', $item->id) }}"
                                        class="btn btn-sm btn-warning mb-1">Edit</a>
                                    <form action="{{ route('faq.destroy', $item->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger mb-1">Hapus</button>
                                    </form>
                                </td>
                                @endauth
                            </tr>
                            @empty
                            <tr>
                                <td colspan="{{ Auth::check() ? '7' : '6' }}"
                                    class="text-center py-4 text-github-muted">Belum ada data artikel.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>