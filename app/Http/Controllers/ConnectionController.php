<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ConnectionController extends Controller
{
    public function connection(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            // Authentification réussie
            return redirect()->intended('/'); // Redirection vers la page de tableau de bord (ou toute autre page)
        }

        // Authentification échouée
        return back()->withErrors([
            'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
        ])->withInput($request->only('email'));
    }
}
