<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TourList extends Component
{
    public $tours;
    public $sort;

    public function __construct($tours, $sort=null)
    {
        $this->tours=$tours;
        $this->sort=$sort;
    }

    public function render(): View
    {
        return view('components.tour-list');
    }
}
