<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
   
    public function index()
    {
        $title = 'Dịch vụ';
        return view('clients.services',compact('title'));
    }

}