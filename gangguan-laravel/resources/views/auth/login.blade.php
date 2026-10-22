<div>
  <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gangguan IT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm mb-5">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">Sistem Laporan Gangguan IT</a>
            <div>
                <a href="{{ route('gangguan.daftar') }}" class="btn btn-light btn-sm fw-semibold">Kembali ke Daftar</a>
            </div>
        </div>
    </nav>

    <main class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                
                <div class="card shadow-sm border-0 mt-4">
                    <div class="card-header bg-white py-3 text-center">
                        <h4 class="mb-0 fw-bold text-primary">Login Administrator</h4>
                        <p class="text-muted mb-0 mt-1" style="font-size: 0.9rem;">Gunakan email dan password Anda</p>
                    </div>
                    
                    <div class="card-body p-4">
                        @if ($errors->any())
                            <div class="alert alert-danger pb-0">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ url('/login') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">Alamat Email</label>
                                <input 
                                    type="email" 
                                    class="form-control" 
                                    id="email" 
                                    name="email" 
                                    value="{{ old('email') }}" 
                                    placeholder="nama@email.com" 
                                    required 
                                    autofocus
                                >
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold">Password</label>
                                <input 
                                    type="password" 
                                    class="form-control" 
                                    id="password" 
                                    name="password" 
                                    placeholder="Masukkan password" 
                                    required
                                >
                            </div>
                            <button type="submit" class="btn btn-primary w-100 fw-bold py-2 mb-2">MASUK</button>
                            
                        </form>
                        
                    </div>
                </div>

            </div>
        </div>
    </main>

</body>
</html>
</div>
