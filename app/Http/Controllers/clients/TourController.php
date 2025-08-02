<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\clients\Tour;

class TourController extends Controller
{

    private $allTours;

    public function __construct()
    {
        $this->allTours = new Tour();
    }
    
    public function index(Request $request){

        $title = 'Tours';

        $sort = $request->input('sort');
        $tours = $this->allTours->getAllTour($sort);
       
    
        return view('clients.tour',compact('title','tours'));
    }

    
    

    
}
