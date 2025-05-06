<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function index()
    {
        $livres = Livre::all();
        return view('livres.index', compact('livres'));
    }

    public function create()
    {
        return view('livres.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'auteur_id' => 'required|integer|exists:auteurs,id',
        ]);

        Livre::create([
            'titre' => $request->titre,
            'auteur_id' => $request->auteur_id
        ]);

        return redirect()->route('livres.index')->with('success', 'Un nouveau livre a été ajoutée.');
    }
}
