<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\clients\User;
use App\Models\clients\Login;
use Exception;
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
            $googleUser = Socialite::driver('google')->user();

            // Kiểm tra người dùng đã tồn tại chưa
            $existingUser = User::where('google_id', $googleUser->id)->first();

            if ($existingUser) {
                Auth::login($existingUser);
                return redirect()->intended('/');
            } else {
                $data_google = [
                    'google_id' => $googleUser->id,
                    'username' => 'google_' . explode('@', $googleUser->email)[0],
                    'password' => bcrypt('google_default_password'),
                    'email' => $googleUser->email,
                    'fullname' => $googleUser->name ?? 'Google User',
                    'role' => 'user',
                    'active' => 'y',
                    'status' => null,
                    'phone' => null,
                    'address' => null,
                ];

                $newUser = $this->user->register($data_google);

                Auth::login($newUser);

                return redirect()->intended('/')->with('registered_username', $newUser->username);
            }
        } catch (\Laravel\Socialite\Two\InvalidStateException $e) {
            return  redirect('/login')->with('success', 'Lỗi xác thực.Vui lòng thử lại!');
        } catch (MyCustomException $e) {
            return redirect('/login')->with('error', 'Đã xảy ra lỗi: ' . $e->getMessage());
        }
    }
}
