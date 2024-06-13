<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use Illuminate\Support\Facades\Auth;
use App\Models\AnnonceImage;

class AnnonceController extends Controller
{
    public function show($id)
    {
        $annonce = Annonce::findOrFail($id);
        $images = $annonce->images;

        return view('annonce.show', compact('annonce', 'images'));
    }

    public function create()
    {
        return view('page/annonce/create');
    }

    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'adresse' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Création de l'annonce
        $annonce = new Annonce([
            'titre' => $request->input('titre'),
            'description' => $request->input('description'),
            'adresse' => $request->input('adresse'),
            'prix' => $request->input('prix'),
        ]);

        // Associer l'annonce à l'utilisateur connecté
        $annonce->createur_id = Auth::id();

        // Sauvegarde de l'annonce
        $annonce->save();

        // Traitement des images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = $image->getClientOriginalName();
                $path = $image->storeAs('public/images/annonces/', $filename);

                // Créer une nouvelle entrée AnnonceImage pour chaque image téléchargée
                AnnonceImage::create([
                    'annonce_id' => $annonce->id,
                    'chemin_image' => 'storage/images/annonces/' . $filename,
                ]);
            }
        }

        // Redirection avec un message de succès
        return redirect()->route('annonces.create')->with('success', 'Annonce créée avec succès!');
    }
}
