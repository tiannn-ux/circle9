<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akses Ditolak - 403</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">
    <div class="container text-center">
        <div class="card shadow-sm border-0 p-5 mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <h1 class="display-1 fw-bold text-danger">403</h1>
                <h3 class="fw-bold mb-3">Akses Ditolak</h3>
                <p class="text-muted mb-4">
                    {{ $exception->getMessage() ?: 'Maaf, Anda tidak memiliki hak akses atau izin untuk membuka halaman/fitur ini.' }}
                </p>
                <a href="{{ url('/') }}" class="btn btn-primary fw-semibold px-4">Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</body>
</html>