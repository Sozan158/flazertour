<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clients\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;


class RegisterController extends Controller
{

    public function showRegisterForm()

    {
        $title = 'Đăng ký';
        return view('clients.register', compact('title'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'phone' => 'nullable',
            'address' => 'nullable',
        ]);

        $activation_token = Str::random(60);
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'activation_token' => $activation_token

        ]);

        $this->sendActivationMail($request->email, $activation_token);

        return redirect()->route('login')->with('success', 'Đăng ký thành công! Kiểm tra email để kích hoạt tài khoản..')
            ->with('registered_username', $request->username);
    }


    public function checkUsername(Request $request)
    {
        $exists = User::where('username', $request->username)->exists();
        return response()->json(['exists' => $exists]);
    }

    public function checkEmail(Request $request)
    {
        $exists = User::where('email', $request->email)->exists();
        return response()->json(['exists' => $exists]);
    }

    public function checkPhone(Request $request)
    {
        $exists = User::where('phone', $request->phone)->exists();
        return response()->json(['exists' => $exists]);
    }


    public function sendActivationMail($email, $token)
    {
        $activation_link = route('activation.account', ['token' => $token]);

        Mail::send('clients.mail.email_activation', ['link' => $activation_link], function ($message) use ($email) {
            $message->to($email);
            $message->subject('Kích hoạt email của bạn');
        });
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
