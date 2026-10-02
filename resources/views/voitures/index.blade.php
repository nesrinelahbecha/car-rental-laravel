@extends('layouts.app')
@section('title', 'Nos voitures')

@section('content')
    <h1 class="text-3xl font-extrabold text-slate-800 mb-8">Nos voitures</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($voitures as $voiture)
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 hover:shadow-md transition overflow-hidden">
                <div class="p-5">
                    <div class="flex items-start justify-between mb-2">
                        <h2 class="text-lg font-bold text-slate-800">{{ $voiture->marque }} {{ $voiture->modele }}</h2>
                        <span class="text-xs font-semibold px-2.5 py-1 rounded-full {{ $voiture->disponible ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700' }}">
                            {{ $voiture->disponible ? 'Disponible' : 'Indisponible' }}
                        </span>
                    </div>
                    <p class="text-sm text-slate-500 mb-4">{{ $voiture->immatriculation }} · {{ $voiture->annee }} · {{ $voiture->couleur }}</p>

                    <div class="flex items-center gap-4 text-sm text-slate-600 mb-4">
                        <span>⛽ {{ $voiture->carburant }}</span>
                        <span>⚙️ {{ $voiture->transmission }}</span>
                        <span>👥 {{ $voiture->nombre_places }}</span>
                    </div>

                    <p class="text-2xl font-extrabold text-indigo-600 mb-4">{{ $voiture->prix_par_jour }} DT<span class="text-sm font-medium text-slate-400">/jour</span></p>

                    <div class="flex gap-2 text-sm font-semibold">
                        <a href="{{ route('voitures.show', $voiture) }}" class="flex-1 text-center bg-slate-100 hover:bg-slate-200 transition py-2 rounded-lg text-slate-700">Voir</a>
                        <a href="{{ route('voitures.edit', $voiture) }}" class="flex-1 text-center bg-indigo-50 hover:bg-indigo-100 transition py-2 rounded-lg text-indigo-600">Modifier</a>
                        <form action="{{ route('voitures.destroy', $voiture) }}" method="POST" onsubmit="return confirm('Supprimer cette voiture ?')">
                            @csrf @method('DELETE')
                            <button class="bg-red-50 hover:bg-red-100 transition py-2 px-3 rounded-lg text-red-600">🗑</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-slate-500 col-span-full text-center py-12">Aucune voiture enregistrée pour le moment.</p>
        @endforelse
    </div>
@endsection