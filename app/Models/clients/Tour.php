<?php

namespace App\Models\clients;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tour extends Model
{
   use HasFactory;

   protected  $table = 'tours';


   //Chi tiết Tour
   public function getTourDetail($id)
   {
      $getTourDetail = DB::table($this->table)
         ->where('IDTour', $id)
         ->first();


      if (!$getTourDetail) return null;


      $getTourDetail->images = DB::table('tours_image')
         ->where('IDTour', $getTourDetail->IDTour)
         ->limit(5)
         ->pluck('img_url');

      $getTourDetail->timeline = DB::table('tours_timeline')
         ->where('IDTour', $getTourDetail->IDTour)
         ->get();


      return $getTourDetail;
   }
   //Lấy toàn bộ Tour

   public function getAllTour($sort = null)
   {

      $query = DB::table($this->table);
      // Áp dụng sắp xếp nếu có
      if ($sort === 'price-asc') {
         $query->orderBy('priceC', 'asc');
      } elseif ($sort === 'price-desc') {
         $query->orderBy('priceC', 'desc');
      } elseif ($sort === 'newest') {
         $query->orderBy('created_at', 'desc');
      }



      $tours = $query->paginate(6)->appends(['sort' => $sort]);

      foreach ($tours as $tour) {
         $tour->images = DB::table('tours_image')
            ->where('IDTour', $tour->IDTour)
            ->pluck('img_url')
            ->first();
      }

      return $tours;
   }
}
