@php $r = $reservation ?? null; @endphp

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
        <label class="block text-sm font-semibold text-slate-700 mb-1">Client</label>
        <select name="client_id" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 outline-none">
            <option value="">-- Choisir un client --</option>
            @foreach ($clients as $client)
                <option value="{{ $client->id }}" @selected(old('client_id', $r->client_id ?? '') == $client->id)>
                    {{ $client->prenom }} {{ $client->nom }}
                </option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Voiture</label>
        <select name="voiture_id" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 outline-none">
            <option value="">-- Choisir une voiture --</option>
            @foreach ($voitures as $voiture)
                <option value="{{ $voiture->id }}" @selected(old('voiture_id', $r->voiture_id ?? '') == $voiture->id)>
                    {{ $voiture->marque }} {{ $voiture->modele }} ({{ $voiture->prix_par_jour }} DT/jour)
                </option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Date de début</label>
        <input type="date" name="date_debut" value="{{ old('date_debut', isset($r->date_debut) ? $r->date_debut->format('Y-m-d') : '') }}" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 outline-none">
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Date de fin</label>
        <input type="date" name="date_fin" value="{{ old('date_fin', isset($r->date_fin) ? $r->date_fin->format('Y-m-d') : '') }}" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 outline-none">
    </div>
    <div>
        <label class="block text-sm font-semibold text-slate-700 mb-1">Statut</label>
        <select name="statut" class="w-full border border-slate-200 rounded-lg px-3 py-2 focus:ring-2 focus:ring-indigo-400 outline-none">
            @foreach (['en attente', 'confirmée', 'en cours', 'terminée', 'annulée'] as $option)
                <option value="{{ $option }}" @selected(old('statut', $r->statut ?? 'en attente') == $option)>{{ ucfirst($option) }}</option>
            @endforeach
        </select>
    </div>
</div>

<p class="mt-4 text-xs text-slate-400">💡 Le prix total est calculé automatiquement selon le nombre de jours et le tarif de la voiture choisie.</p>