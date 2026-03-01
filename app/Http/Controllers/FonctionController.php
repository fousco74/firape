<?php

namespace App\Http\Controllers;

use App\Models\Fonction;
use Illuminate\Http\Request;

class FonctionController extends Controller
{
    public function index()
    {
        $fonctions = Fonction::all();
        return view('fonctions.index', compact('fonctions'));
    }

    public function create()
    {
        return view('fonctions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'libelle' => 'required|string|max:255'
        ]);
        Fonction::create($validated);
        return redirect()->route('fonctions.index')
                         ->with('success', 'Fonction créée.');
    }

    public function show(Fonction $fonction)
    {
        return view('fonctions.show', compact('fonction'));
    }

    public function edit(Fonction $fonction)
    {
        return view('fonctions.edit', compact('fonction'));
    }

    public function update(Request $request, Fonction $fonction)
    {
        $validated = $request->validate([
            'libelle' => 'required|string|max:255'
        ]);
        $fonction->update($validated);
        return redirect()->route('fonctions.index')
                         ->with('success', 'Fonction mise à jour.');
    }

    public function destroy(Fonction $fonction)
    {
        $fonction->delete();
        return redirect()->route('fonctions.index')
                         ->with('success', 'Fonction supprimée.');
    }
}
