<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Activite;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    public function index()
    {
        $evenements = Evenement::with('activite')->get();
        return view('backend.evenements.index', compact('evenements'));
    }

    public function create()
    {
        $activites = Activite::all();
        return view('evenements.create', compact('activites'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom'         => 'required|string|max:255',
            'date_debut'  => 'required|date',
            'date_fin'    => 'nullable|date|after_or_equal:date_debut',
            'lieu'        => 'nullable|string|max:255',
            'id_activite' => 'required|exists:activites,id_activite'
        ]);
        Evenement::create($validated);
        return redirect()->route('evenements.index')
                         ->with('success', 'Événement créé.');
    }

    public function show(Evenement $evenement)
    {
        return view('evenements.show', compact('evenement'));
    }

    public function edit(Evenement $evenement)
    {
        $activites = Activite::all();
        return view('evenements.edit', compact('evenement','activites'));
    }

    public function update(Request $request, Evenement $evenement)
    {
        $validated = $request->validate([
            'nom'         => 'required|string|max:255',
            'date_debut'  => 'required|date',
            'date_fin'    => 'nullable|date|after_or_equal:date_debut',
            'lieu'        => 'nullable|string|max:255',
            'id_activite' => 'required|exists:activites,id_activite'
        ]);
        $evenement->update($validated);
        return redirect()->route('evenements.index')
                         ->with('success', 'Événement mis à jour.');
    }

    public function destroy(Evenement $evenement)
    {
        $evenement->delete();
        return redirect()->route('evenements.index')
                         ->with('success', 'Événement supprimé.');
    }
}
