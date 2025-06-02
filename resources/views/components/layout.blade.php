<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | ClinicConnect</title>
    @vite('resources/css/app.css')
</head>
<body>
    @if (session('success'))
        <div id="flash" class="p-4 text-center bg-green-50 text-green-500 font-bold">
            {{ session('success') }}
        </div>
    @endif

    <div id="mobileOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden"></div>

    <x-sidebar />

    <main class="lg:ml-64">
        <x-navbar />

        <div class="p-5">
            {{ $slot }}
        </div>
    </main>
</body>
</html>
