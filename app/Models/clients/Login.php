<?php

namespace App\Models\clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Login extends Model
{
   use HasFactory;

   protected $table = 'users';

   public function register($data): bool
   {
      return DB::table($this->table)->insert($data);
   }

   public function checkUserExist($username, $email)
   {

      $check = DB::table($this->table)
         ->where('username', $username)
         ->orWhere('email', $email)
         ->get();

      return $check;
   }


   public function checkUserExistGoogle($google_id)
   {

      $checkg = DB::table($this->table)->where('google_id', $google_id)->first();
      return $checkg;
   }
}
