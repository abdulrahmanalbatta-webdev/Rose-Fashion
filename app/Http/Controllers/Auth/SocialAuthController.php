<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect(string $provider)
    {
        $this->validateProvider($provider);

        return Socialite::driver($provider)->stateless()->redirect();
    }

    public function callback(string $provider)
    {
        $this->validateProvider($provider);

        $socialUser = Socialite::driver($provider)->stateless()->user();

        $user = User::updateOrCreate(
            ['email' => $socialUser->getEmail()],
            [
                'name' => $socialUser->getName() ?? $socialUser->getNickname(),
                'provider' => $provider,
                'provider_id' => $socialUser->getId(),
                'password' => $socialUser->getId() ? null : bcrypt(Str::random(24)),
                'email_verified_at' => now(),
            ]
        );

        Auth::login($user, remember: true);

        return redirect()->route('website.index');
    }

    private function validateProvider(string $provider): void
    {
        if (! in_array($provider, ['google', 'facebook'])) {
            abort(404);
        }
    }
}
