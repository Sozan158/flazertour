<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\clients\Login;
use Laravel\Socialite\Facades\Socialite;
use App\Models\clients\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use MyCustomException;

class GoogleController extends Controller
{

    private $user;


    public function __construct()
    {
        $this->user = new Login();
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            $finduser = $this->user->checkUserExistGoogle($user->id);


            if ($finduser) {
                Auth::login($finduser);
                return redirect()->intended('/');
            } else {
                $data_google = [
                    'google_id' => $user->id,
                    'username' => 'user-google',
                    'password' => md5('12345678'),
                    'email' => $user->email
                ];

                $newuser = $this->user->register($data_google);

                Auth::login($newuser);
                return redirect()->intended('/login');
            }
        } catch (MyCustomException $e) {
            Log::error('Google Login Error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json(['error' => 'Google login failed'], 500);
        }
    }
}
