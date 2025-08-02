<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clients\Login;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;


class LoginController extends Controller
{


    private $login;

    public function __construct()
    {
        $this->login = new Login();
    }
    public function showLoginForm()
    {
        $title = 'Đăng nhập';
        return view('clients.login', compact('title'));
    }

    public function login(Request $request)
    {
        $key = 'login:' . $request->ip();

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // dd(Auth::user());

            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('home');
        }

        return redirect()->route('login')->with('success', 'Tên đăng nhập hoặc mật khẩu không đúng.');
    }
}
