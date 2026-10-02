@extends('layouts.app')
@section('title', $voiture->marque . ' ' . $voiture->modele)

@section('content')
    <a href="{{ route('voitures.index') }}" class="text-sm text-indigo-600 font-semibold mb-6 inline-block">← Retour à la liste</a>

    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 max-w-2xl">
        <div class="flex items-start justify-between mb-4">
            <h1 class="text-3xl font-extrabold text-slate-800">{{ $voiture->marque }} {{ $voiture->modele }}</h1>
            <span class="text-xs font-semibold px-2.5 py-1 rounded-full {{ $voiture->disponible ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700' }}">
                {{ $voiture->disponible ? 'Disponible' : 'Indisponible' }}
            </span>
        </div>

        <p class="text-3xl font-extrabold text-indigo-600 mb-6">{{ $voiture->prix_par_jour }} DT<span class="text-sm font-medium text-slate-400">/jour</span></p>

        <dl class="grid grid-cols-2 gap-4 text-sm">
            <div><dt class="text-slate-400">Immatriculation</dt><dd class="font-semibold text-slate-700">{{ $voiture->immatriculation }}</dd></div>
            <div><dt class="text-slate-400">Année</dt><dd class="font-semibold text-slate-700">{{ $voiture->annee }}</dd></div>
            <div><dt class="text-slate-400">Couleur</dt><dd class="font-semibold text-slate-700">{{ $voiture->couleur }}</dd></div>
            <div><dt class="text-slate-400">Carburant</dt><dd class="font-semibold text-slate-700">{{ $voiture->carburant }}</dd></div>
            <div><dt class="text-slate-400">Transmission</dt><dd class="font-semibold text-slate-700">{{ $voiture->transmission }}</dd></div>
            <div><dt class="text-slate-400">Places</dt><dd class="font-semibold text-slate-700">{{ $voiture->nombre_places }}</dd></div>
        </dl>

        @if ($voiture->description)
            <p class="mt-6 text-slate-600 text-sm leading-relaxed">{{ $voiture->description }}</p>
        @endif

        <a href="{{ route('voitures.edit', $voiture) }}" class="mt-6 inline-block bg-indigo-600 hover:bg-indigo-500 transition text-white font-semibold px-5 py-2.5 rounded-lg text-sm">
            Modifier cette voiture
        </a>
    </div>
@endsection