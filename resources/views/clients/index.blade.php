@extends('layouts.app')
@section('title', 'Nos clients')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-extrabold text-slate-800">Nos clients</h1>
        <a href="{{ route('clients.create') }}" class="bg-indigo-600 hover:bg-indigo-500 transition text-white font-semibold px-4 py-2.5 rounded-lg text-sm">
            + Nouveau client
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-slate-50 text-slate-500 text-left">
                <tr>
                    <th class="px-5 py-3 font-semibold">Nom</th>
                    <th class="px-5 py-3 font-semibold">Email</th>
                    <th class="px-5 py-3 font-semibold">Téléphone</th>
                    <th class="px-5 py-3 font-semibold">Permis</th>
                    <th class="px-5 py-3 font-semibold text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse ($clients as $client)
                    <tr class="hover:bg-slate-50">
                        <td class="px-5 py-3 font-semibold text-slate-700">{{ $client->prenom }} {{ $client->nom }}</td>
                        <td class="px-5 py-3 text-slate-500">{{ $client->email }}</td>
                        <td class="px-5 py-3 text-slate-500">{{ $client->telephone }}</td>
                        <td class="px-5 py-3 text-slate-500">{{ $client->num_permis }}</td>
                        <td class="px-5 py-3 text-right space-x-2">
                            <a href="{{ route('clients.show', $client) }}" class="text-slate-600 hover:underline">Voir</a>
                            <a href="{{ route('clients.edit', $client) }}" class="text-indigo-600 hover:underline">Modifier</a>
                            <form action="{{ route('clients.destroy', $client) }}" method="POST" class="inline" onsubmit="return confirm('Supprimer ce client ?')">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-5 py-8 text-center text-slate-400">Aucun client enregistré.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection