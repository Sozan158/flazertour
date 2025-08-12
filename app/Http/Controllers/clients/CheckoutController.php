<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function checkout()
    {
        $title = 'Hoàn tất đơn đặt';

        return view('clients.checkout', compact('title'));
    }
}
