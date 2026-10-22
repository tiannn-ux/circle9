<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - IT Helpdesk System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-github shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('faq.daftar') }}">
                <span class="text-gold"></span> IT Helpdesk System
            </a>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card card-custom shadow-sm p-4">
                    <h4 class="fw-bold mb-3 text-gold border-bottom border-secondary pb-2">Login Teknisi IT</h4>

                    @if ($errors->any())
                    <div class="alert alert-danger bg-dark text-danger border-danger mb-3">{{ $errors->first() }}</div>
                    @endif

                    <form action="{{ route('login.proses') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label fw-semibold">Username</label>
                            <input type="text" class="form-control form-control-github" id="username" name="username"
                                value="{{ old('username') }}" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input type="password" class="form-control form-control-github" id="password"
                                name="password" required>
                        </div>
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label text-github-muted" for="remember">Ingat saya</label>
                        </div>
                        <button type="submit" class="btn btn-custom-gold w-100 py-2">Masuk</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>