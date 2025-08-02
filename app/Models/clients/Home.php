<?php

namespace App\Models\clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class Home extends Model 
{
    
    use HasFactory;

    protected $table = 'tours';

    public function getHomeTours(){
        $tours = DB::table($this->table)
        ->get();


        foreach($tours as $tour){
            $tour->images = DB::table('tours_image')
            ->where('IDTour',$tour->IDTour)
            ->pluck('img_url')
            ->first();


        }

        return $tours;
    }

    
    

}