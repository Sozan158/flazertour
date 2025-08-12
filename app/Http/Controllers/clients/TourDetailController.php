<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clients\Tour;


class TourDetailController extends Controller
{

    private $tours;

    public function __construct()
    {
        $this->tours = new Tour();
    }
    public function index($id = 0)
    {
        $title = 'Chi tiết Tour ' . $id;

        $tourDetail = $this->tours->getTourDetail($id);


        if (!$tourDetail) {
            abort(404, 'Tour không tồn tại');
        }


        return view('clients.tour-detail', compact('title', 'tourDetail'));
    }
}
