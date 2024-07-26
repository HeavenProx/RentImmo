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
        $user = Auth::user();
        $annonces = $user->annonces()->with('images')->get();

        return view('page.myAnnonce', compact('annonces'));
    }

    public function search()
    {
        $annonces = Annonce::all();
        return view('page.search.searchAnnonce', compact('annonces'));
    }


    public function myAnnonce()
    {
        $user = Auth::user();
        $annonces = $user->annonces()->with(['images', 'favoritedBy'])->get();
    
        return view('user.index', compact('annonces'));
    }


    public function edit($id)
    {
        $annonce = Annonce::findOrFail($id);
        if ($annonce->createur_id != Auth::id()) {
            return redirect()->route('user.annonces.index')->with('error', 'Vous n\'êtes pas autorisé à modifier cette annonce.');
        }

        return view('page.annonce.annonceEdit', compact('annonce'));
    }


    public function destroy($id)
    {
        $annonce = Annonce::findOrFail($id);
        if ($annonce->createur_id != Auth::id()) {
            return redirect()->route('user.index')->with('error', 'Vous n\'êtes pas autorisé à supprimer cette annonce.');
        }

        $annonce->delete();
        return redirect()->route('user.index')->with('success', 'Annonce supprimée avec succès.');
    }


    public function update(Request $request, $id)
    {
        $annonce = Annonce::findOrFail($id);
        if ($annonce->createur_id != Auth::id()) {
            return redirect()->route('user.index')->with('error', 'Vous n\'êtes pas autorisé à mettre à jour cette annonce.');
        }

        $request->validate([
            'titre' => 'required|string|max:255',
            'venteLocation' => 'required|boolean',
            'description' => 'required|string',
            'adresse' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'metre' => 'required|numeric',
            'chambre' => 'required|numeric',
            'salleDeBain' => 'required|numeric',
            'parking' => 'required|boolean',
            'garage' => 'required|boolean',
            'terrain' => 'required|boolean',
            'etat' => 'required|string|in:Neuf,Rénové,Plateau',
        ]);

        $annonce->update($request->all());
        return redirect()->route('user.index')->with('success', 'Annonce mise à jour avec succès.');
    }


    public function store(Request $request)
    {
        
        // Validation des données du formulaire
        $request->validate([
            'titre' => 'required|string|max:255',
            'venteLocation' => 'required|boolean',
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
            'venteLocation' => $request->input('venteLocation'),
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
