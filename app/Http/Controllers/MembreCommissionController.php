<?php

namespace App\Http\Controllers;

use App\Models\MembreCommission;
use Illuminate\Http\Request;

class MembreCommissionController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_personne' => 'required|exists:personnes,id_personne',
            'id_commission' => 'required|exists:commissions,id_commission',
        ]);

        return MembreCommission::create($validated);
    }

    public function destroy(Request $request)
    {
        MembreCommission::where('id_personne', $request->id_personne)
            ->where('id_commission', $request->id_commission)
            ->delete();

        return response()->json(['message' => 'Membre retiré de la commission']);
    }
}
