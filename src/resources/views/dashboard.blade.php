@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold">Dashboard</h1>
<p>Halo, {{ auth()->user()->name }}. Peranmu: <strong>{{ auth()->user()->role }}</strong>.</p>
@endsection