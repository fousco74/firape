<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    // public function dashboard()
    // {
    //     $trimestre = Periode::with('exercice')
    //                         ->whereDate('delai', '>=', Carbon::now())
    //                         ->get();

    //     return view('dashboard.index', compact('trimestre'));
    // }

    public function index()
    {
        $menu = "accueil"; //dd($menu);
        return view('frontend.index', compact('menu'));
    }

    public function contact()
    {
        $menu = "contact";
        return view('frontend.contact', compact('menu'));
    }
}
