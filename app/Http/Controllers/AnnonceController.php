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

        return view('page/annonce/annonce', compact('annonce', 'images'));
    }

    public function create()
    {
        return view('page/annonce/create');
    }

    public function index()
    {
        $annonces = Annonce::with('images')->get();
        return view('page/search/searchAnnonce', compact('annonces'));
    }

    public function store(Request $request)
    {
        
        // Validation des données du formulaire
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'adresse' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'metre' => 'required|numeric',
            'chambre' => 'required|numeric',
            'salleDeBain' => 'required|numeric',
            'type' => 'required|string|in:Maison,Appartement,Studio,Chalet,Villa,Autre',
            'parking' => 'required|boolean',
            'garage' => 'required|boolean',
            'terrain' => 'required|boolean',
            'etat' => 'required|string|in:Neuf,Rénové,Plateau',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Création de l'annonce
        $annonce = new Annonce([
            'titre' => $request->input('titre'),
            'description' => $request->input('description'),
            'adresse' => $request->input('adresse'),
            'prix' => $request->input('prix'),
            'metre' => $request->input('metre'),
            'chambre' => $request->input('chambre'),
            'salleDeBain' => $request->input('salleDeBain'),
            'type' => $request->input('type'),
            'parking' => $request->input('parking'),
            'garage' => $request->input('garage'),
            'terrain' => $request->input('terrain'),
            'etat' => $request->input('etat'),
        ]);

        // Associer l'annonce à l'utilisateur connecté
        $annonce->createur_id = Auth::id();

        // Sauvegarde de l'annonce
        $annonce->save();

       // Traitement des images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
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
