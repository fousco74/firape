<?php

namespace App\Http\Controllers;

use App\Models\Participation;
use Illuminate\Http\Request;

class ParticipationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_personne' => 'required|exists:personnes,id_personne',
            'id_evenement' => 'required|exists:evenements,id_evenement',
            'role' => 'nullable|string|max:255',
        ]);

        return Participation::create($validated);
    }

    public function destroy(Request $request)
    {
        Participation::where('id_personne', $request->id_personne)
            ->where('id_evenement', $request->id_evenement)
            ->delete();

        return response()->json(['message' => 'Participation supprimée']);
    }
}
