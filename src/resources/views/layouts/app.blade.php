<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Desa Digital (Simulasi)</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gray-100 text-gray-900">
    <header class="bg-green-800 text-white p-4 flex justify-between items-center gap-4">
        <strong>Desa Digital (Simulasi)</strong>
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="underline">Logout</button>
            </form>
        @endauth
    </header>
    <main class="max-w-4xl mx-auto p-4">
        @yield('content')
    </main>
</body>
</html>