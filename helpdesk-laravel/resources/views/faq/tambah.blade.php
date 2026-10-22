<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Artikel Knowledge Base</title>
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

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card card-custom shadow-sm">
                    <div class="card-header border-bottom border-secondary bg-transparent py-3">
                        <h4 class="fw-bold mb-0 text-gold">Formulir Tambah Artikel Solusi Teknis</h4>
                    </div>
                    <div class="card-body p-4">

                        <form action="{{ route('faq.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="judul" class="form-label fw-semibold">Judul Artikel Solusi /
                                    Troubleshooting</label>
                                <input type="text" class="form-control form-control-github" id="judul" name="judul"
                                    placeholder="Contoh: Cara Reset Password Email" required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="kategori" class="form-label fw-semibold">Kategori Masalah</label>
                                    <select class="form-select form-control-github" id="kategori" name="kategori"
                                        required>
                                        <option value="" disabled selected>-- Pilih Kategori --</option>
                                        <option value="Hardware">Hardware</option>
                                        <option value="Software">Software</option>
                                        <option value="Jaringan">Jaringan</option>
                                        <option value="Akses & Akun">Akses & Akun</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="penulis" class="form-label fw-semibold">Nama Penulis / Teknisi</label>
                                    <input type="text" class="form-control form-control-github" id="penulis"
                                        name="penulis" placeholder="Nama Lengkap Penulis" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="langkah_troubleshooting" class="form-label fw-semibold">Langkah-Langkah
                                    Troubleshooting / Solusi</label>
                                <textarea class="form-control form-control-github" id="langkah_troubleshooting"
                                    name="langkah_troubleshooting" rows="4"
                                    placeholder="Tuliskan langkah-langkah penyelesaian secara detail..."
                                    required></textarea>
                            </div>

                            <div class="mb-4">
                                <label class="form-label d-block fw-semibold text-gold">Status Artikel</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="statusPublished"
                                        value="Published" checked>
                                    <label class="form-check-label text-light" for="statusPublished">Published</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="statusDraft"
                                        value="Draft">
                                    <label class="form-check-label text-light" for="statusDraft">Draft</label>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between pt-3">
                                <a href="{{ route('faq.daftar') }}" class="btn btn-outline-gold">Kembali</a>
                                <button type="submit" class="btn btn-custom-gold">Simpan Artikel</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>