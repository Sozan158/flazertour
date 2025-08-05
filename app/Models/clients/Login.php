<?php

namespace App\Models\clients;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\clients\User;

class Login extends Model
{
   use HasFactory;

   protected $table = 'users';

   public function register(array $data)
   {
      return User::create($data);
   }

   public function checkUserExist($username, $email)
   {

      $check = DB::table($this->table)
         ->where('username', $username)
         ->orWhere('email', $email)
         ->get();

      return $check;
   }


   public function getUserByToken($token)
   {
      return DB::table($this->table)->where('activation_token', $token)->first();
   }


   public function activateUser($token)
   {
      return DB::table($this->table)->where('activation_token', $token)->update(['activation_token' => null, 'active' => 'y']);
   }
}
