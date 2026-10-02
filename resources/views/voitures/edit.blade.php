@extends('layouts.app')
@section('title', 'Modifier la voiture')

@section('content')
    <h1 class="text-3xl font-extrabold text-slate-800 mb-8">Modifier {{ $voiture->marque }} {{ $voiture->modele }}</h1>

    <form action="{{ route('voitures.update', $voiture) }}" method="POST" class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 max-w-3xl">
        @csrf
        @method('PUT')
        @include('voitures._form')

        <button class="mt-6 bg-indigo-600 hover:bg-indigo-500 transition text-white font-semibold px-6 py-3 rounded-lg">
            Mettre à jour
        </button>
    </form>
@endsection