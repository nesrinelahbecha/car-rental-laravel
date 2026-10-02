<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="color-scheme" content="light">
    <title>Connexion — LocaCar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        html { color-scheme: light; }
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="min-h-screen flex">
    <!-- Panneau gauche : formulaire -->
    <div class="w-full lg:w-1/2 flex items-center justify-center px-8 py-12 bg-white">
        <div class="w-full max-w-sm">
            <div class="flex items-center gap-2 mb-10">
                <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-xl">🚗</div>
                <span class="text-xl font-extrabold text-slate-800">LocaCar</span>
            </div>

            <h1 class="text-2xl font-extrabold text-slate-800 mb-1">Bon retour parmi nous</h1>
            <p class="text-sm text-slate-400 mb-8">Connectez-vous à votre espace admin</p>

            @if ($errors->any())
                <div class="mb-5 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full border border-slate-200 rounded-lg px-3 py-2.5 focus:ring-2 focus:ring-indigo-400 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Mot de passe</label>
                    <input type="password" name="password" class="w-full border border-slate-200 rounded-lg px-3 py-2.5 focus:ring-2 focus:ring-indigo-400 outline-none">
                </div>
                <button class="w-full bg-indigo-600 hover:bg-indigo-500 transition text-white font-semibold py-2.5 rounded-lg shadow-sm shadow-indigo-200">
                    Se connecter
                </button>
            </form>

            <p class="text-sm text-slate-500 mt-6 text-center">
                Pas encore de compte ?
                <a href="{{ route('register') }}" class="text-indigo-600 font-semibold hover:underline">Créer un compte</a>
            </p>
        </div>
    </div>

    <!-- Panneau droit : visuel -->
    <div class="hidden lg:flex w-1/2 bg-slate-900 items-center justify-center relative overflow-hidden">
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-indigo-600/30 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-96 h-96 bg-indigo-400/20 rounded-full blur-3xl"></div>
        <div class="relative text-center px-12">
            <div class="text-7xl mb-6">🚘</div>
            <h2 class="text-3xl font-extrabold text-white mb-3">Gérez votre flotte en toute simplicité</h2>
            <p class="text-slate-400 max-w-sm mx-auto">Voitures, clients et réservations, tout centralisé au même endroit.</p>
        </div>
    </div>
</body>
</html>