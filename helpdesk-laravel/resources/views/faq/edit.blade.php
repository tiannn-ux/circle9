<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artikel Knowledge Base</title>
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
            <div class="col-lg-8">
                <div class="card card-custom shadow-sm p-4">
                    <h3 class="fw-bold mb-3 text-gold border-bottom border-secondary pb-2">Edit Artikel Solusi</h3>

                    <form action="{{ route('faq.update', $faq->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Judul Artikel Solusi / Troubleshooting</label>
                            <input type="text" class="form-control form-control-github" name="judul"
                                value="{{ old('judul', $faq->judul) }}" required>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Kategori Masalah</label>
                                <select class="form-select form-control-github" name="kategori" required>
                                    <option value="Hardware" @selected($faq->kategori == 'Hardware')>Hardware</option>
                                    <option value="Software" @selected($faq->kategori == 'Software')>Software</option>
                                    <option value="Jaringan" @selected($faq->kategori == 'Jaringan')>Jaringan</option>
                                    <option value="Akses & Akun" @selected($faq->kategori == 'Akses & Akun')>Akses &
                                        Akun</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Nama Penulis / Teknisi</label>
                                <input type="text" class="form-control form-control-github" name="penulis"
                                    value="{{ old('penulis', $faq->penulis) }}" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Langkah-Langkah Troubleshooting / Solusi</label>
                            <textarea class="form-control form-control-github" name="langkah_troubleshooting" rows="4"
                                required>{{ old('langkah_troubleshooting', $faq->langkah_troubleshooting) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label d-block fw-semibold text-gold">Status Artikel</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="statusPublished"
                                    value="Published" @checked($faq->status == 'Published')>
                                <label class="form-check-label text-light" for="statusPublished">Published</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="statusDraft"
                                    value="Draft" @checked($faq->status == 'Draft')>
                                <label class="form-check-label text-light" for="statusDraft">Draft</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('faq.daftar') }}" class="btn btn-outline-gold">Batal</a>
                            <button type="submit" class="btn btn-custom-gold">Simpan Perubahan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>