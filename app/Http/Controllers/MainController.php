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
    public function about()
    {
        $menu = "about";
        return view('frontend.about', compact('menu'));
    }    
        public function motPresidente()
        {
            $menu = "mot-presidente";
            return view('frontend.mot-presidente' , compact('menu'));
        }
        public function membres()
        {
            $menu = "membres";
            return view('frontend.membres' , compact('menu'));
        }
        public function statuts()
        {
            $menu = "statuts-reglements";
            return view('frontend.statuts-reglements' , compact('menu'));
        }

        public function documents()
        {
            $menu = "documents";
            return view('frontend.documents' , compact('menu'));
        }
    public function evenements()
        {
            $menu = "evenements";
            return view('frontend.evenements' , compact('menu'));
        }  
    public function phototheque()
    {
        $menu = "phototheque";
        return view('frontend.phototheque' , compact('menu'));
    }

    public function videotheque()
    {
        $menu = "videoteque";
        return view('frontend.videotheque' , compact('menu'));
    }
    
    public function secteurs()
    {
        $menu = "secteurs";
        return view('frontend.secteurs' , compact('menu'));
    }
    public function clubs()
    {
        $menu = "clubs";
        return view('frontend.clubs', compact('menu'));
    }
    // public function Ligues()
    // {
    //     $menu = "clubs";
    //     return view('frontend.Ligues', compact('menu'));
    // }




}
