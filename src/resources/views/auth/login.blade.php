@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('login') }}" class="max-w-sm mx-auto mt-10 bg-white p-6 rounded shadow space-y-4">
    @csrf
    <h1 class="text-xl font-bold">Login</h1>

    @error('email')
        <p class="text-red-600">{{ $message }}</p>
    @enderror

    <label class="block">Email
        <input type="email" name="email" value="{{ old('email') }}" required class="w-full border rounded p-2">
    </label>
    <label class="block">Password
        <input type="password" name="password" required class="w-full border rounded p-2">
    </label>
    <button class="w-full bg-green-800 text-white rounded p-2">Masuk</button>
</form>
@endsection