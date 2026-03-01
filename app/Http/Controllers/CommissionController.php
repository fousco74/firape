<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    public function index()
    {
        $commissions = Commission::all();
        return view('backend.commissions.index', compact('commissions'));
    }

    public function create()
    {
        return view('commissions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_commission' => 'required|string|max:255'
        ]);
        Commission::create($validated);
        return redirect()->route('commissions.index')
                         ->with('success', 'Commission créée.');
    }

    public function show(Commission $commission)
    {
        return view('commissions.show', compact('commission'));
    }

    public function edit(Commission $commission)
    {
        return view('commissions.edit', compact('commission'));
    }

    public function update(Request $request, Commission $commission)
    {
        $validated = $request->validate([
            'nom_commission' => 'required|string|max:255'
        ]);
        $commission->update($validated);
        return redirect()->route('commissions.index')
                         ->with('success', 'Commission mise à jour.');
    }

    public function destroy(Commission $commission)
    {
        $commission->delete();
        return redirect()->route('commissions.index')
                         ->with('success', 'Commission supprimée.');
    }
}
