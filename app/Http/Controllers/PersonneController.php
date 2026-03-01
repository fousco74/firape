<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use Illuminate\Http\Request;

class PersonneController extends Controller
{
    public function index()
    {
        $personnes = Personne::all();
        return view('backend.personnes.index', compact('personnes'));
    }

    public function create()
    {
        return view('personnes.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom'      => 'required|string|max:255',
            'prenoms'  => 'required|string|max:255',
            'telephone'=> 'nullable|string|max:50',
            'email'    => 'nullable|email|max:255',
            'pays'     => 'nullable|string|max:255'
        ]);
        Personne::create($validated);
        return redirect()->route('personnes.index')
                         ->with('success', 'Personne créée.');
    }

    public function show(Personne $personne)
    {
        return view('personnes.show', compact('personne'));
    }

    public function edit(Personne $personne)
    {
        return view('personnes.edit', compact('personne'));
    }

    public function update(Request $request, Personne $personne)
    {
        $validated = $request->validate([
            'nom'      => 'required|string|max:255',
            'prenoms'  => 'required|string|max:255',
            'telephone'=> 'nullable|string|max:50',
            'email'    => 'nullable|email|max:255',
            'pays'     => 'nullable|string|max:255'
        ]);
        $personne->update($validated);
        return redirect()->route('personnes.index')
                         ->with('success', 'Personne mise à jour.');
    }

    public function destroy(Personne $personne)
    {
        $personne->delete();
        return redirect()->route('personnes.index')
                         ->with('success', 'Personne supprimée.');
    }
}
