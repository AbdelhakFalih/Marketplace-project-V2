<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerificationMail;
use App\Mail\PhoneVerificationNotificationMail;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register', [
            'title' => __('nav.register'),
        ]);
    }
    public function register(Request $request)
    {
        // Validate password confirmation
        if ($request->input('password') !== $request->input('password_confirmation')) {
            return back()->with('error', __('Une erreur est survenue : les mots de passe ne correspondent pas.'));
        }

        // Create user
        $user = User::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->input('email'),
            'role' => $request->input('account_type'),
            'password' => $request->input('password'), // Hash the password
            'email_verified_at' => null,
            'verification_token' => null,
            'phone'=> $request->input('phone'),
            'phone_verified_at' => null,
            'phone_verification_token' => Str::random(60),
            'address' => $request->input('region'),
            'city' => $request->input('city')
        ]);
        $token = Str::random(60);
        // Send email verification
        try {
            Mail::to($user->email)->send(new EmailVerificationMail($user, $token));
            return back()->with('success', __('Veuillez vérifier votre boîte de réception pour confirmer votre compte. Un email de vérification a été envoyé.'));
        } catch (\Exception $e) {
            return back()->with('error', __('Une erreur est survenue lors de l\'envoi de l\'email de vérification. Veuillez réessayer. ') . $e->getMessage());
        }
    }

    public function verifyEmail($token)
    {
        $user = User::where('verification_token', $token)->first();

        if ($user) {
            try {
                // Update user to mark email as verified
                $user->update([
                    'email_verified_at' => now(),
                    'verification_token' => null,
                ]);

                // Send phone verification notification
                Mail::to($user->email)->send(new PhoneVerificationNotificationMail($user));
                return back()->with('success', __('Votre email a été vérifié. Un email de confirmation pour la vérification de votre numéro de téléphone a été envoyé.'));
            } catch (\Exception $e) {
                return back()->with('error', __('Erreur lors de l\'envoi de l\'email de vérification téléphonique. Veuillez réessayer plus tard. ') . $e->getMessage());
            }
        }

        return back()->with('error', __('Lien de vérification invalide ou expiré.'));
    }
}
