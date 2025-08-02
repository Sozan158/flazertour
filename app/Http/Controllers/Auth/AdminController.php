<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\clients\User;
use App\Models\clients\Tour;
use App\Models\Booking;
use App\Models\Promotion;
class AdminController extends Controller
{
    public function index()
    {
        return view('admin.pages.dashboard', [
            'userCount' => User::count(),
            'tourCount' => Tour::count(),
            // 'bookingCount' => Booking::count(),
            // 'promotionCount' => Promotion::count(),
        ]);
    }
}
