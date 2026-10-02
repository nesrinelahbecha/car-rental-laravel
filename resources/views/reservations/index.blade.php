@extends('layouts.app')
@section('title', 'Réservations')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-extrabold text-slate-800">Réservations</h1>
        <a href="{{ route('reservations.create') }}" class="bg-indigo-600 hover:bg-indigo-500 transition text-white font-semibold px-4 py-2.5 rounded-lg text-sm">
            + Nouvelle réservation
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 text-left">
                <tr>
                    <th class="px-5 py-3 font-semibold">Client</th>
                    <th class="px-5 py-3 font-semibold">Voiture</th>
                    <th class="px-5 py-3 font-semibold">Période</th>
                    <th class="px-5 py-3 font-semibold">Prix total</th>
                    <th class="px-5 py-3 font-semibold">Statut</th>
                    <th class="px-5 py-3 font-semibold text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($reservations as $reservation)
                    <tr class="hover:bg-slate-50">
                        <td class="px-5 py-3 font-semibold text-slate-700">{{ $reservation->client->prenom }} {{ $reservation->client->nom }}</td>
                        <td class="px-5 py-3 text-slate-500">{{ $reservation->voiture->marque }} {{ $reservation->voiture->modele }}</td>
                        <td class="px-5 py-3 text-slate-500">{{ $reservation->date_debut->format('d/m/Y') }} → {{ $reservation->date_fin->format('d/m/Y') }}</td>
                        <td class="px-5 py-3 font-semibold text-indigo-600">{{ $reservation->prix_total }} DT</td>
                        <td class="px-5 py-3">
                            <span class="text-xs font-semibold px-2.5 py-1 rounded-full bg-slate-100 text-slate-600">{{ ucfirst($reservation->statut) }}</span>
                        </td>
                        <td class="px-5 py-3 text-right space-x-2">
                            <a href="{{ route('reservations.show', $reservation) }}" class="text-slate-600 hover:underline">Voir</a>
                            <a href="{{ route('reservations.edit', $reservation) }}" class="text-indigo-600 hover:underline">Modifier</a>
                            <form action="{{ route('reservations.destroy', $reservation) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer cette réservation ?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="px-5 py-8 text-center text-slate-400">Aucune réservation enregistrée.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection