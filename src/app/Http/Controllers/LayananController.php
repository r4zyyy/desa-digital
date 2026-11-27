<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LayananController extends Controller
{
    public function index(Request $request)
    {
        $daftar = JenisLayanan::query()
            ->when($request->filled('q'), fn ($query) => $query->where('nama', 'like', '%'.$request->input('q').'%'))
            ->when($request->filled('aktif'), fn ($query) => $query->where('aktif', $request->boolean('aktif')))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('petugas.layanan.index', compact('daftar'));
    }

    public function create()
    {
        return view('petugas.layanan.form', ['layanan' => new JenisLayanan()]);
    }

    public function store(Request $request)
    {
        JenisLayanan::create($this->validasi($request));

        return redirect()->route('petugas.layanan.index')->with('ok', 'Layanan ditambahkan.');
    }

    public function edit(JenisLayanan $layanan)
    {
        return view('petugas.layanan.form', compact('layanan'));
    }

    public function update(Request $request, JenisLayanan $layanan)
    {
        $layanan->update($this->validasi($request, $layanan));

        return redirect()->route('petugas.layanan.index')->with('ok', 'Layanan diperbarui.');
    }

    public function destroy(JenisLayanan $layanan)
    {
        if ($layanan->persyaratan()->exists() || $layanan->permohonan()->exists()) {
            return back()->with('gagal', 'Layanan sudah dipakai. Nonaktifkan saja lewat tombol Ubah.');
        }

        $layanan->delete();

        return back()->with('ok', 'Layanan dihapus.');
    }

    private function validasi(Request $request, ?JenisLayanan $layanan = null): array
    {
        return $request->validate([
            'nama' => ['required', 'string', 'max:100', Rule::unique('jenis_layanan', 'nama')->ignore($layanan)],
            'deskripsi' => ['nullable', 'string', 'max:1000'],
            'aktif' => ['required', 'boolean'],
        ]);
    }
}