<?php

namespace App\Http\Controllers;

use App\Models\Teknisi;
use Illuminate\Http\Request;

class TeknisiController extends Controller
{
    public function daftar()
    {
        $teknisi = Teknisi::orderByDesc('id')->get();

        return view('teknisi.daftar', compact('teknisi'));
    }

    public function tambah()
    {
        return view('teknisi.tambah');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|max:100',
            'keahlian' => 'required|in:Network,Database,Hardware',
            'kontak' => 'required|max:100',
            'deskripsi' => 'nullable|max:255',
        ]);

        Teknisi::create($data);

        return redirect()
            ->route('teknisi.daftar')
            ->with('success', 'Data teknisi berhasil ditambahkan.');
    }

    public function edit(Teknisi $teknisi)
    {
        return view('teknisi.edit', compact('teknisi'));
    }

    public function update(Request $request, Teknisi $teknisi)
    {
        $data = $request->validate([
            'nama' => 'required|max:100',
            'keahlian' => 'required|in:Network,Database,Hardware',
            'kontak' => 'required|max:100',
            'deskripsi' => 'nullable|max:255',
        ]);

        $teknisi->update($data);

        return redirect()
            ->route('teknisi.daftar')
            ->with('success', 'Data teknisi berhasil diperbarui.');
    }

    public function destroy(Teknisi $teknisi)
{
    $teknisi->delete();

    return redirect()
        ->route('teknisi.daftar')
        ->with('success', 'Data teknisi berhasil dihapus.');
}
}