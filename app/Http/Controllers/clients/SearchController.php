<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\clients\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SearchController extends Controller
{
    
    public function search(Request $request)
    {
        $title = 'Tìm Tour';
        $query = Tour::query();


        if ($request->filled('destination')){
            $query->where('destination', 'like', '%' . $request->destination . '%');
        }

        if ($request->filled('check_in')) {
             $query->where('start_date', '>=', Carbon::createFromFormat('d/m/Y', $request->input('check_in'))->format('Y-m-d'));
        }

        if ($request->filled('region')) {
            $query->where('region', $request->input('region'));
        }

        // // 🔖 Lọc theo tour khuyến mãi
        // if ($request->has('promo')) {
        //     $query->where('is_promo', 1); // Field bạn đặt
        // }

        //Lọc theo ngân sách
        if ($request->filled('budget')) {
            $budget = (int)$request->budget;
            $query->where('priceA', '<=', $budget);
        }

        // ✅ Lọc tour còn chỗ
        if ($request->filled('available') && $request->input('available') == '1') {
            $query->where('availability', true);
        }

        // Sắp xếp tour
        switch ($request->input('sort')) {
            case 'price-asc':
                $query->orderBy('priceA', 'asc');
                break;
            case 'price-desc':
                $query->orderBy('priceA', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_date', 'desc');
                break;
            default:
                $query->orderBy('IDTour', 'desc'); 
    }

        $tours = $query->get();

        $count = $tours->count();

        foreach ($tours as $tour) {
        $tour->images = DB::table('tours_image')
        ->where('IDTour', $tour->IDTour)
        ->value('img_url') ;
        }


        return view('clients.searchtour', compact('title','tours','count'));
    }
}
