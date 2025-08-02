<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clients\Home;
use Illuminate\Http\Request;
use App\Models\Tour;


class HomeController extends Controller
{
    private $homeTours;

    public function __construct()
    {
        $this->homeTours = new Home();
    }
    public function index()
    
    {
         $title = 'Trang chủ';
         $tours = $this->homeTours->getHomeTours();

        //  dd(vars:$tours);
        //  $tours = Tour::all();
         return view('clients.home', compact('title','tours'));
    }
}
