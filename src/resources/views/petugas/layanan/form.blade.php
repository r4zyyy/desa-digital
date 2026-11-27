@extends('layouts.app')

@section('content')
<form method="POST"
      action="{{ $layanan->exists ? route('petugas.layanan.update', $layanan) : route('petugas.layanan.store') }}"
      class="bg-white p-6 rounded shadow space-y-4">
    @csrf
    @if ($layanan->exists)
        @method('PUT')
    @endif

    <h1 class="text-xl font-bold">{{ $layanan->exists ? 'Ubah' : 'Tambah' }} Layanan</h1>

    @foreach ($errors->all() as $error)
        <p class="text-red-600">{{ $error }}</p>
    @endforeach

    <label class="block">Nama
        <input name="nama" value="{{ old('nama', $layanan->nama) }}" required maxlength="100" class="w-full border rounded p-2">
    </label>
    <label class="block">Deskripsi
        <textarea name="deskripsi" maxlength="1000" class="w-full border rounded p-2">{{ old('deskripsi', $layanan->deskripsi) }}</textarea>
    </label>
    <label class="block">Status
        <select name="aktif" class="w-full border rounded p-2">
            <option value="1">Aktif</option>
            <option value="0" @selected((string) old('aktif', (int) ($layanan->aktif ?? 1)) === '0')>Nonaktif</option>
        </select>
    </label>

    <button class="bg-green-800 text-white rounded px-4 py-2">Simpan</button>
    <a href="{{ route('petugas.layanan.index') }}" class="underline ml-3">Batal</a>
</form>
@endsection