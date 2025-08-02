<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\clients\User;
use Illuminate\Support\Facades\Auth;
use MyCustomException;

class FacebookController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')
            ->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();

            // Test hiển thị thông tin
            dd($facebookUser);
        } catch (MyCustomException $e) {
            return response()->json(['error' => 'Facebook login failed: ' . $e->getMessage()]);
        }
    }
}
