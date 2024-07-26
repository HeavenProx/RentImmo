<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validation des données du formulaire
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email|max:255',
            'password' => 'required|string|min:8|max:255',
        ]);

        // Vérification de la validation
        if ($validator->fails()) {
            return redirect('/signup')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Création de l'utilisateur
        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirection vers une page de confirmation ou de connexion
        return redirect('/login')->with('success', 'Votre compte a été créé avec succès ! Connectez-vous maintenant.');
    }

    public function index()
    {
        $user = Auth::user();
        $annonces = $user->annonces()->with('images')->get();

        return view('page.myAnnonce', compact('annonces'));
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            abort(404, 'Utilisateur non trouvé');
        }

        return view('page/userDescription', ['user' => $user]);
    }


    public function edit()
    {
        $user = auth()->user();
        return view('page/userDescription', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        // Validez et mettez à jour les données de l'utilisateur
        $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
        ]);

        $user->update($request->only(['prenom', 'nom', 'email']));

        // Rediriger avec un message de succès
        return redirect()->route('user.description')->with('success', 'Vos informations ont été mises à jour avec succès.');
    }
}
