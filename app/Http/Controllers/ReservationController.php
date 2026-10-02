<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Client;
use App\Models\Voiture;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['client', 'voiture'])->latest()->get();
        return view('reservations.index', compact('reservations'));
    }

    public function create()
    {
        $clients = Client::orderBy('nom')->get();
        $voitures = Voiture::where('disponible', true)->orderBy('marque')->get();
        return view('reservations.create', compact('clients', 'voitures'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'voiture_id' => 'required|exists:voitures,id',
            'date_debut' => 'required|date|after_or_equal:today',
            'date_fin' => 'required|date|after:date_debut',
            'statut' => 'required|string',
        ]);

        $voiture = Voiture::findOrFail($validated['voiture_id']);
        $nbJours = \Carbon\Carbon::parse($validated['date_debut'])->diffInDays(\Carbon\Carbon::parse($validated['date_fin']));
        $validated['prix_total'] = $nbJours * $voiture->prix_par_jour;

        Reservation::create($validated);

        return redirect()->route('reservations.index')->with('success', 'Réservation créée avec succès.');
    }

    public function show(Reservation $reservation)
    {
        $reservation->load(['client', 'voiture']);
        return view('reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        $clients = Client::orderBy('nom')->get();
        $voitures = Voiture::orderBy('marque')->get();
        return view('reservations.edit', compact('reservation', 'clients', 'voitures'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'voiture_id' => 'required|exists:voitures,id',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after:date_debut',
            'statut' => 'required|string',
        ]);

        $voiture = Voiture::findOrFail($validated['voiture_id']);
        $nbJours = \Carbon\Carbon::parse($validated['date_debut'])->diffInDays(\Carbon\Carbon::parse($validated['date_fin']));
        $validated['prix_total'] = $nbJours * $voiture->prix_par_jour;

        $reservation->update($validated);

        return redirect()->route('reservations.index')->with('success', 'Réservation mise à jour avec succès.');
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('reservations.index')->with('success', 'Réservation supprimée.');
    }
}