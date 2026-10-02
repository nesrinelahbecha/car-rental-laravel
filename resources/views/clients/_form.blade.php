@php $c = $client ?? null; @endphp

@if ($errors->any())
    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg text-sm">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Nom</label>
        <input type="text" name="nom" value="{{ old('nom', $c->nom ?? '') }}" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 outline-none">
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Prénom</label>
        <input type="text" name="prenom" value="{{ old('prenom', $c->prenom ?? '') }}" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 outline-none">
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Email</label>
        <input type="email" name="email" value="{{ old('email', $c->email ?? '') }}" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 outline-none">
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Téléphone</label>
        <input type="text" name="telephone" value="{{ old('telephone', $c->telephone ?? '') }}" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 outline-none">
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Adresse</label>
        <input type="text" name="adresse" value="{{ old('adresse', $c->adresse ?? '') }}" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 outline-none">
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Numéro de permis</label>
        <input type="text" name="num_permis" value="{{ old('num_permis', $c->num_permis ?? '') }}" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 outline-none">
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Date de naissance</label>
        <input type="date" name="date_naissance" value="{{ old('date_naissance', isset($c->date_naissance) ? $c->date_naissance->format('Y-m-d') : '') }}" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 outline-none">
    </div>
</div>