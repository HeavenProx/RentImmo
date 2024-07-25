<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Favori;
use Illuminate\Support\Facades\Auth;

class FavoriController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $favoris = $user->favoris()->with('images')->get();

        return view('page.userFavoris', compact('favoris'));
    }

    public function toggle(Annonce $annonce)
    {
        $user = Auth::user();

        if ($user->favoris->contains($annonce->id)) {
            $user->favoris()->detach($annonce->id);
            return back()->with('success', 'Annonce retirée des favoris.');
        } else {
            $user->favoris()->attach($annonce->id);
            return back()->with('success', 'Annonce ajoutée aux favoris.');
        }
    }
  
}
