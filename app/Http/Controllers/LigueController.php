<?php

namespace App\Http\Controllers;

use App\Models\Ligue;
use Illuminate\Http\Request;

class LigueController extends Controller
{
    // Affiche la liste des ligues
    public function index()
    {
        $ligues = Ligue::all();
        return view('backend.ligues.index', compact('ligues'));
    }

    // Montre le formulaire de création d'une ligue
    public function create()
    {
        return view('ligues.create');
    }

    // Enregistre une nouvelle ligue (avec validation)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_ligue'  => 'required|string|max:255',
            'type_ligue' => 'nullable|string|max:255',
            'zone'       => 'nullable|string|max:255',
        ]); // Validation selon les règles de Laravel:contentReference[oaicite:2]{index=2}

        Ligue::create($validated);
        return redirect()->route('ligues.index')
                         ->with('success', 'Ligue créée avec succès.');
    }

    // Affiche une ligue donnée
    public function show(Ligue $ligue)
    {
        return view('backend.ligues.show', compact('ligue'));
    }

    // Montre le formulaire d'édition d'une ligue
    public function edit(Ligue $ligue)
    {
        return view('backend.ligues.edit', compact('ligue'));
    }

    // Met à jour une ligue existante (avec validation)
    public function update(Request $request, Ligue $ligue)
    {
        $validated = $request->validate([
            'nom_ligue'  => 'required|string|max:255',
            'type_ligue' => 'nullable|string|max:255',
            'zone'       => 'nullable|string|max:255',
        ]);

        $ligue->update($validated);
        return redirect()->route('ligues.index')
                         ->with('success', 'Ligue mise à jour.');
    }

    // Supprime une ligue (cascade via FK)
    public function destroy(Ligue $ligue)
    {
        $ligue->delete();
        return redirect()->route('ligues.index')
                         ->with('success', 'Ligue supprimée.');
    }
}
