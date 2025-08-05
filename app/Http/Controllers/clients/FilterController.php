<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clients\Tour;
use Illuminate\Http\Request;

class FilterController extends Controller
{


    private $allTours;

    public function __construct()
    {
        $this->allTours = new Tour();
    }
    public function filter(Request $request)
    {
        $title = 'Lọc Tour';
        $sort = $request->input('sort');
        $tours = $this->allTours->getAllTour($sort);
        return view('clients.filter', compact('title', 'tours'));
    }
}
