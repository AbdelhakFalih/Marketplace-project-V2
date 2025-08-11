<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerification;
use Illuminate\Support\Str;
use Illuminate\Routing\Controller;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login', [
            'title' => __('nav.login'),
        ]);
    }

    public function login(Request $request)
    {
        // Récupérer les données du formulaire
        $email = $request->input('email');
        $password = $request->input('password');

        // Chercher l'utilisateur par email
        $user = User::where('email', $email)->first();

        // Vérifier si l'utilisateur existe
        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'Cet email n\'existe pas.']);
        }

        // Vérifier le mot de passe
        if ($password === $user->password) {
            // Connexion manuelle
            auth()->login($user);

            // Rediriger selon le rôle
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('offers.index')->with('success', 'Connexion réussie.');
        }

        // Erreur si le mot de passe est incorrect
        return redirect()->back()->withErrors(['email' => 'Mot de passe incorrect.']);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }

    public function showResetForm()
    {
        return view('auth.passwords.reset', [
            'title' => __('nav.reset_password'),
        ]);
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = User::where('email', $request->email)->first();
        if ($user) {
            $token = Str::random(60);
            // Stocker le token (à implémenter dans une table password_resets)
            Mail::to($user->email)->send(new EmailVerification($user, $token));
        }
        return redirect()->back()->with('status', __('messages.reset_link_sent'));
    }
}
