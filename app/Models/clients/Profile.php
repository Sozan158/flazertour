<?php

namespace App\Models\clients;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Profile extends Model
{
    protected $table = 'users';

    public function getUser($id)
    {
        $users = DB::table($this->table)->where('IDUser', $id)->first();

        return $users;
    }
}
