@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-4 gap-2">
    <h1 class="text-2xl font-bold">Jenis Layanan</h1>
    <a href="{{ route('petugas.layanan.create') }}" class="bg-green-800 text-white rounded px-4 py-2">Tambah</a>
</div>

<form method="GET" class="flex flex-col sm:flex-row gap-2 mb-4">
    <input name="q" value="{{ request('q') }}" placeholder="Cari nama" class="bg-white border rounded p-2 flex-1">
    <select name="aktif" class="bg-white border rounded p-2">
        <option value="">Semua status</option>
        <option value="1" @selected(request('aktif') === '1')>Aktif</option>
        <option value="0" @selected(request('aktif') === '0')>Nonaktif</option>
    </select>
    <button class="border bg-white rounded px-4 py-2">Cari</button>
</form>

<div class="overflow-x-auto bg-white rounded shadow">
    <table class="w-full text-left">
        <thead>
            <tr class="border-b">
                <th class="p-3">Nama</th>
                <th class="p-3">Status</th>
                <th class="p-3">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($daftar as $item)
                <tr class="border-b">
                    <td class="p-3">{{ $item->nama }}</td>
                    <td class="p-3">{{ $item->aktif ? 'Aktif' : 'Nonaktif' }}</td>
                    <td class="p-3 flex gap-3">
                        <a href="{{ route('petugas.layanan.edit', $item) }}" class="text-blue-700 underline">Ubah</a>
                        <form method="POST" action="{{ route('petugas.layanan.destroy', $item) }}"
                              onsubmit="return confirm('Hapus layanan ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-700 underline">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="3" class="p-3">Tidak ada data.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">{{ $daftar->links() }}</div>
@endsection