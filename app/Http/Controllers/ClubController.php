<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Ligue;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function index()
    {
        $clubs = Club::with('ligue')->get();
        return view('backend.clubs.index', compact('clubs'));
    }

    public function create()
    {
        $ligues = Ligue::all();
        return view('clubs.create', compact('ligues'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_club'  => 'required|string|max:255',
            'type_club' => 'nullable|string|max:255',
            'localite'  => 'nullable|string|max:255',
            'id_ligue'  => 'required|exists:ligues,id_ligue'
        ]);
        Club::create($validated);
        return redirect()->route('clubs.index')
                         ->with('success', 'Club créé avec succès.');
    }

    public function show(Club $club)
    {
        return view('clubs.show', compact('club'));
    }

    public function edit(Club $club)
    {
        $ligues = Ligue::all();
        return view('clubs.edit', compact('club', 'ligues'));
    }

    public function update(Request $request, Club $club)
    {
        $validated = $request->validate([
            'nom_club'  => 'required|string|max:255',
            'type_club' => 'nullable|string|max:255',
            'localite'  => 'nullable|string|max:255',
            'id_ligue'  => 'required|exists:ligues,id_ligue'
        ]);
        $club->update($validated);
        return redirect()->route('clubs.index')
                         ->with('success', 'Club mis à jour.');
    }

    public function destroy(Club $club)
    {
        $club->delete();
        return redirect()->route('clubs.index')
                         ->with('success', 'Club supprimé.');
    }
}
