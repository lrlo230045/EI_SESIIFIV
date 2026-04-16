<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class SocialAuthController extends Controller
{
    // REDIRECCIÓN
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    // CALLBACK
    public function callback($provider)
    {
        $socialUser = Socialite::driver($provider)->stateless()->user();

        // Buscar usuario por email
        $user = User::where('email', $socialUser->getEmail())->first();

        if (!$user) {
            // Crear usuario nuevo
            $user = User::create([
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'password' => bcrypt("123456"), // contraseña ultrasegura
                'role' => 'user',
                'active' => 1,
            ]);
        }

        Auth::login($user);

        return redirect('/dashboard');
    }
}
