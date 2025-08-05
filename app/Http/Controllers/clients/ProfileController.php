<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clients\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    private $user;
    public function __construct()
    {
        $this->user = new Profile();
    }
    public function profile()
    {
        $title = 'Thông tin User';
        $user = Auth::user();
        $ID =  $user->IDUser;

        $user = $this->user->getUser($ID);
        return view('clients.profile', compact('title', 'user'));
    }
}
