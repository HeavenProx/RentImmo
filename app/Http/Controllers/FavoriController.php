<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Annonce;
use App\Models\Favori;
use Illuminate\Support\Facades\Auth;

class FavoriController extends Controller
{
    public function toggleFavori($annonceId)
    {
        $user = Auth::user();

        if ($user->favoris()->where('annonce_id', $annonceId)->exists()) {
            // Si l'annonce est déjà dans les favoris, la retirer
            $user->favoris()->detach($annonceId);
            $message = 'Annonce retirée des favoris!';
        } else {
            // Si l'annonce n'est pas dans les favoris, l'ajouter
            $user->favoris()->attach($annonceId);
            $message = 'Annonce ajoutée aux favoris!';
        }

        return redirect()->back()->with('success');
    }
}
