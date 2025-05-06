<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use Illuminate\Http\Request;

class AuteurController extends Controller
{
    public function index()
    {
        $auteurs = Auteur::all();
        return view('auteurs.index', compact('auteurs'));
    }

    public function create()
    {
        return view('auteurs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255'
        ]);

        Auteur::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom
        ]);

        return redirect()->route('auteurs.index')->with('success', 'Un(e) nouvel(le) auteur(trice) a été ajouté(e).');
    }

    public function search(Request $request)
    {
        $term = $request->get('term');

        $auteurs = Auteur::where('nom', 'LIKE', "%$term%")
                            ->orWhere('prenom', 'LIKE', "%$term%")
                            ->get();
        return response()->json($auteurs->map(function($auteur) {
            return[
                'id' => $auteur->id,
                'prenom' => $auteur->prenom,
                'nom' => $auteur->nom,
                'value' => $auteur->prenom . ' ' . $auteur->nom
            ];
        }));
    }
}
