<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use Illuminate\Http\Request;

class ActiviteController extends Controller
{
    public function index()
    {
        $activites = Activite::all();
        return view('activites.index', compact('activites'));
    }

    public function create()
    {
        return view('activites.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'libelle' => 'required|string|max:255',
            'type'    => 'nullable|string|max:255'
        ]);
        Activite::create($validated);
        return redirect()->route('activites.index')
                         ->with('success', 'Activité créée.');
    }

    public function show(Activite $activite)
    {
        return view('activites.show', compact('activite'));
    }

    public function edit(Activite $activite)
    {
        return view('activites.edit', compact('activite'));
    }

    public function update(Request $request, Activite $activite)
    {
        $validated = $request->validate([
            'libelle' => 'required|string|max:255',
            'type'    => 'nullable|string|max:255'
        ]);
        $activite->update($validated);
        return redirect()->route('activites.index')
                         ->with('success', 'Activité mise à jour.');
    }

    public function destroy(Activite $activite)
    {
        $activite->delete();
        return redirect()->route('activites.index')
                         ->with('success', 'Activité supprimée.');
    }
}
