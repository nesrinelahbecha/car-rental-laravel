@extends('layouts.app')
@section('title', $client->prenom . ' ' . $client->nom)

@section('content')
    <a href="{{ route('clients.index') }}" class="text-sm text-indigo-600 font-semibold mb-6 inline-block">← Retour à la liste</a>

    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 max-w-2xl">
        <h1 class="text-3xl font-extrabold text-slate-800 mb-6">{{ $client->prenom }} {{ $client->nom }}</h1>

        <dl class="grid grid-cols-2 gap-4 text-sm">
            <div><dt class="text-slate-400">Email</dt><dd class="font-semibold text-slate-700">{{ $client->email }}</dd></div>
            <div><dt class="text-slate-400">Téléphone</dt><dd class="font-semibold text-slate-700">{{ $client->telephone }}</dd></div>
            <div><dt class="text-slate-400">Adresse</dt><dd class="font-semibold text-slate-700">{{ $client->adresse ?? '—' }}</dd></div>
            <div><dt class="text-slate-400">Permis</dt><dd class="font-semibold text-slate-700">{{ $client->num_permis }}</dd></div>
            <div><dt class="text-slate-400">Date de naissance</dt><dd class="font-semibold text-slate-700">{{ $client->date_naissance->format('d/m/Y') }}</dd></div>
        </dl>

        <a href="{{ route('clients.edit', $client) }}" class="mt-6 inline-block bg-indigo-600 hover:bg-indigo-500 transition text-white font-semibold px-5 py-2.5 rounded-lg text-sm">
            Modifier ce client
        </a>
    </div>
@endsection