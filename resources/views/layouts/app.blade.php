<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="light">
    <title>@yield('title', 'Gestion Location Voitures')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        html { color-scheme: light; }
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-slate-50 min-h-screen">
    <nav class="bg-slate-900 text-white shadow-lg">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ route('voitures.index') }}" class="text-xl font-bold tracking-tight flex items-center gap-2">
                🚗 <span>LocaCar</span>
            </a>

            <div class="flex items-center gap-6">
                <a href="{{ route('clients.index') }}" class="text-sm font-semibold text-slate-300 hover:text-white transition">Clients</a>
                <a href="{{ route('reservations.index') }}" class="text-sm font-semibold text-slate-300 hover:text-white transition">Réservations</a>

                <a href="{{ route('voitures.create') }}" class="bg-indigo-500 hover:bg-indigo-400 transition px-4 py-2 rounded-lg text-sm font-semibold">
                    + Nouvelle voiture
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="text-sm font-semibold text-slate-300 hover:text-white transition">Déconnexion</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-6 py-10">
        @if (session('success'))
            <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-lg text-sm font-medium">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>