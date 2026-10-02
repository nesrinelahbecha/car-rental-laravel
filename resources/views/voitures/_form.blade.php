@php $v = $voiture ?? null; @endphp

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
        <label class="block text-sm font-semibold text-slate-700 mb-1">Marque</label>
        <input type="text" name="marque" value="{{ old('marque', $v->marque ?? '') }}" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 outline-none">
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Modèle</label>
        <input type="text" name="modele" value="{{ old('modele', $v->modele ?? '') }}" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 outline-none">
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Immatriculation</label>
        <input type="text" name="immatriculation" value="{{ old('immatriculation', $v->immatriculation ?? '') }}" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 outline-none">
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Année</label>
        <input type="number" name="annee" value="{{ old('annee', $v->annee ?? '') }}" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 outline-none">
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Couleur</label>
        <input type="text" name="couleur" value="{{ old('couleur', $v->couleur ?? '') }}" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 outline-none">
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Carburant</label>
        <select name="carburant" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 outline-none">
            @foreach (['Essence', 'Diesel', 'Électrique', 'Hybride'] as $option)
                <option value="{{ $option }}" @selected(old('carburant', $v->carburant ?? '') == $option)>{{ $option }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Transmission</label>
        <select name="transmission" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 outline-none">
            @foreach (['Manuelle', 'Automatique'] as $option)
                <option value="{{ $option }}" @selected(old('transmission', $v->transmission ?? '') == $option)>{{ $option }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Nombre de places</label>
        <input type="number" name="nombre_places" value="{{ old('nombre_places', $v->nombre_places ?? '') }}" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 outline-none">
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Prix / jour (DT)</label>
        <input type="number" step="0.01" name="prix_par_jour" value="{{ old('prix_par_jour', $v->prix_par_jour ?? '') }}" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 outline-none">
    </div>
    <div class="flex items-center gap-2 mt-6">
        <input type="checkbox" name="disponible" id="disponible" value="1" @checked(old('disponible', $v->disponible ?? true)) class="w-4 h-4">
        <label for="disponible" class="text-sm font-semibold text-slate-700">Disponible à la location</label>
    </div>
</div>

<div class="mt-5">
    <label class="block text-sm font-semibold text-slate-700 mb-1">Description</label>
    <textarea name="description" rows="3" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 outline-none">{{ old('description', $v->description ?? '') }}</textarea>
</div>