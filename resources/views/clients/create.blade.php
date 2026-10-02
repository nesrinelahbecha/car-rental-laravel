@extends('layouts.app')
@section('title', 'Ajouter un client')

@section('content')
    <h1 class="text-3xl font-extrabold text-slate-800 mb-8">Ajouter un client</h1>

    <form action="{{ route('clients.store') }}" method="POST" class="bg-white p-8 rounded-2xl shadow-sm border border-slate-100 max-w-3xl">
        @csrf
        @include('clients._form')
        <button class="mt-6 bg-indigo-600 hover:bg-indigo-500 transition text-white font-semibold px-6 py-3 rounded-lg">
            Enregistrer le client
        </button>
    </form>
@endsection