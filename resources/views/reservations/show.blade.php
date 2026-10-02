@extends('layouts.app')
@section('title', 'Détail de la réservation')

@section('content')
    <a href="{{ route('reservations.index') }}" class="text-sm text-indigo-600 font-semibold mb-6 inline-block">← Retour à la liste</a>

    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 max-w-2xl">
        <h1 class="text-2xl font-extrabold text-slate-800 mb-6">
            {{ $reservation->client->prenom }} {{ $reservation->client->nom }} — {{ $reservation->voiture->marque }} {{ $reservation->voiture->modele }}
        </h1>

        <dl class="grid grid-cols-2 gap-4 text-sm">
            <div><dt class="text-slate-400">Date de début</dt><dd class="font-semibold text-slate-700">{{ $reservation->date_debut->format('d/m/Y') }}</dd></div>
            <div><dt class="text-slate-400">Date de fin</dt><dd class="font-semibold text-slate-700">{{ $reservation->date_fin->format('d/m/Y') }}</dd></div>
            <div><dt class="text-slate-400">Prix total</dt><dd class="font-semibold text-indigo-600">{{ $reservation->prix_total }} DT</dd></div>
            <div><dt class="text-slate-400">Statut</dt><dd class="font-semibold text-slate-700">{{ ucfirst($reservation->statut) }}</dd></div>
        </dl>

        <a href="{{ route('reservations.edit', $reservation) }}" class="mt-6 inline-block bg-indigo-600 hover:bg-indigo-500 transition text-white font-semibold px-5 py-2.5 rounded-lg text-sm">
            Modifier cette réservation
        </a>
    </div>
@endsection