<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use App\Models\Personne;
use App\Models\Fonction;
use Illuminate\Http\Request;

class AffectationController extends Controller
{
    public function index()
    {
        $affectations = Affectation::with(['personne','fonction'])->get();
        return view('backend.affectations.index', compact('affectations'));
    }

    public function create()
    {
        $personnes = Personne::all();
        $fonctions = Fonction::all();
        return view('affectations.create', compact('personnes','fonctions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_personne' => 'required|exists:personnes,id_personne',
            'id_fonction' => 'required|exists:fonctions,id_fonction',
            'date_debut'  => 'required|date',
            'date_fin'    => 'nullable|date|after_or_equal:date_debut'
        ]);
        Affectation::create($validated);
        return redirect()->route('affectations.index')
                         ->with('success', 'Affectation créée.');
    }

    public function show(Affectation $affectation)
    {
        return view('affectations.show', compact('affectation'));
    }

    public function edit(Affectation $affectation)
    {
        $personnes = Personne::all();
        $fonctions = Fonction::all();
        return view('affectations.edit', compact('affectation','personnes','fonctions'));
    }

    public function update(Request $request, Affectation $affectation)
    {
        $validated = $request->validate([
            'id_personne' => 'required|exists:personnes,id_personne',
            'id_fonction' => 'required|exists:fonctions,id_fonction',
            'date_debut'  => 'required|date',
            'date_fin'    => 'nullable|date|after_or_equal:date_debut'
        ]);
        $affectation->update($validated);
        return redirect()->route('affectations.index')
                         ->with('success', 'Affectation mise à jour.');
    }

    public function destroy(Affectation $affectation)
    {
        $affectation->delete();
        return redirect()->route('affectations.index')
                         ->with('success', 'Affectation supprimée.');
    }
}
