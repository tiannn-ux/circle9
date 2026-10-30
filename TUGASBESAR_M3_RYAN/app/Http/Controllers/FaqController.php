<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function daftar()
    {
        $faqs = FAQ::orderByDesc('id')->get();
        return view('faq.daftar', compact('faqs'));
    }
    public function create()
    {
        return view('faq.tambah');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul'                   => 'required|max:255',
            'kategori'                => 'required|in:Hardware,Software,Jaringan,Akses & Akun',
            'penulis'                 => 'required|max:100',
            'langkah_troubleshooting' => 'required',
            'status'                  => 'required|in:Published,Draft',
        ]);

        FAQ::create($data);

        return redirect()->route('faq.daftar')->with('success', 'Artikel FAQ berhasil disimpan.');
    }
    public function edit(FAQ $faq)
    {
        return view('faq.edit', compact('faq'));
    }

    public function update(Request $request, FAQ $faq)
    {
        $data = $request->validate([
            'judul'                   => 'required|max:255',
            'kategori'                => 'required|in:Hardware,Software,Jaringan,Akses & Akun',
            'penulis'                 => 'required|max:100',
            'langkah_troubleshooting' => 'required',
            'status'                  => 'required|in:Published,Draft',
        ]);

        $faq->update($data);

        return redirect()->route('faq.daftar')->with('success', 'Artikel FAQ berhasil diperbarui.');
    }

    public function destroy(FAQ $faq)
    {
        $faq->delete();
        return redirect()->route('faq.daftar')->with('success', 'Artikel FAQ berhasil dihapus.');
    }
}
