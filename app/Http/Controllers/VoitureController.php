<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    public function index()
    {
        $voitures = Voiture::latest()->get();
        return view('voitures.index', compact('voitures'));
    }

    public function create()
    {
        return view('voitures.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'marque' => 'required|string|max:255',
            'modele' => 'required|string|max:255',
            'immatriculation' => 'required|string|unique:voitures',
            'annee' => 'required|integer|min:1980|max:' . date('Y'),
            'couleur' => 'required|string|max:255',
            'carburant' => 'required|string',
            'transmission' => 'required|string',
            'nombre_places' => 'required|integer|min:1',
            'prix_par_jour' => 'required|numeric|min:0',
            'disponible' => 'sometimes|boolean',
            'description' => 'nullable|string',
        ]);

        $validated['disponible'] = $request->has('disponible');

        Voiture::create($validated);

        return redirect()->route('voitures.index')->with('success', 'Voiture ajoutée avec succès.');
    }

    public function show(Voiture $voiture)
    {
        return view('voitures.show', compact('voiture'));
    }

    public function edit(Voiture $voiture)
    {
        return view('voitures.edit', compact('voiture'));
    }

    public function update(Request $request, Voiture $voiture)
    {
        $validated = $request->validate([
            'marque' => 'required|string|max:255',
            'modele' => 'required|string|max:255',
            'immatriculation' => 'required|string|unique:voitures,immatriculation,' . $voiture->id,
            'annee' => 'required|integer|min:1980|max:' . date('Y'),
            'couleur' => 'required|string|max:255',
            'carburant' => 'required|string',
            'transmission' => 'required|string',
            'nombre_places' => 'required|integer|min:1',
            'prix_par_jour' => 'required|numeric|min:0',
            'disponible' => 'sometimes|boolean',
            'description' => 'nullable|string',
        ]);

        $validated['disponible'] = $request->has('disponible');

        $voiture->update($validated);

        return redirect()->route('voitures.index')->with('success', 'Voiture mise à jour avec succès.');
    }

    public function destroy(Voiture $voiture)
    {
        $voiture->delete();
        return redirect()->route('voitures.index')->with('success', 'Voiture supprimée.');
    }
}