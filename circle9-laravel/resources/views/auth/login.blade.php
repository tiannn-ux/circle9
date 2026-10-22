<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow-sm">
                <div class="card-body p-4">

                    <h2 class="text-center mb-4">
                        Login Admin
                    </h2>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('login.proses') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">
                                Email
                            </label>

                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   value="{{ old('email') }}"
                                   required>
                        </div>

                       <div class="mb-3">
    <label class="form-label">Password</label>

    <div class="input-group">
        <input type="password"
               name="password"
               id="password"
               class="form-control"
               required>

        <button type="button"
                class="btn btn-outline-secondary"
                onclick="lihatPassword()">
            Lihat
        </button>
    </div>
</div>

                        <button type="submit"
                                class="btn btn-primary w-100">
                            Login
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
<script>
    function lihatPassword() {
        let password = document.getElementById('password');

        if (password.type === 'password') {
            password.type = 'text';
        } else {
            password.type = 'password';
        }
    }
</script>
</body>
</html>