@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold">Dashboard</h1>
    <p>Halo, {{ auth()->user()->name }}. Peranmu: <strong>{{ auth()->user()->role }}</strong>.</p>
@if (auth()->user()->role === 'petugas')
    <a href="{{ route('petugas.layanan.index') }}" class="inline-block mt-4 text-blue-700 underline">Kelola Jenis Layanan</a>
@endif
@endsection