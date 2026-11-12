<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Akses Ditolak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="d-flex align-items-center justify-content-center vh-100">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <div class="card card-custom p-5 shadow">
                    <h1 class="display-1 fw-bold text-gold mb-2">403</h1>
                    <h4 class="fw-bold mb-3">Akses Ditolak</h4>
                    <p class="text-github-muted mb-4">
                        {{ $exception->getMessage() ?: 'Anda tidak memiliki hak akses untuk membuka halaman atau melakukan tindakan ini.' }}
                    </p>
                    <div>
                        <a href="{{ route('faq.daftar') }}" class="btn btn-custom-gold px-4 py-2">Kembali ke Daftar
                            FAQ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>