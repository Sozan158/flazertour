<?php

namespace App\Models\clients;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Booking extends Model
{
    protected $table = 'tours_booking';


    public function createBooking($data)
    {
        return DB::table($this->table)->insertGetId($data);
    }
}
