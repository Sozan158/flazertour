<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clients\Login;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;




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


            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }
            if ($user->active !== 'y') {
                return redirect()->route('login')->with('error', 'Tài khoản chưa được kích hoạt. Vui lòng kiểm tra email!!!');
            }

            return redirect()->route('home')->with('toast', [
                'type' => 'success',
                'message' => 'Đăng nhập thành công!!'

            ]);
        }

        return redirect()->route('login')->with('toast', [
            'type' => 'error',
            'message' => 'Tên đăng nhập hoặc mật khẩu không đúng.'
        ]);
    }


    public function sendActivationMail($email, $token)
    {
        $activation_link = route('activation.account', ['token' => $token]);

        Mail::send('clients.mail.email_activation', ['link' => $activation_link], function ($message) use ($email) {
            $message->to($email);
            $message->subject('Kích hoạt email của bạn');
        });
    }

    public function activateAccount($token)
    {
        $user = $this->login->getUserByToken($token);

        if ($user) {
            $this->login->activateUser($token);

            return redirect('/login')->with('success', 'Tài khoản của bạn được kích hoạt!');
        } else {
            return redirect('/login')->with('error', 'Lỗi kích hoạt!!!');
        }
    }
}
