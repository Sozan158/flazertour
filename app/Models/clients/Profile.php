<?php

namespace App\Models\clients;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Exists;

class Profile extends Model
{
    protected $table = 'users';

    public function getUser($id)
    {
        $users = DB::table($this->table)->where('IDUser', $id)->first();

        return $users;
    }

    public function updateUser($id, $data)
    {
        $update = DB::table($this->table)->where('IDUser', $id)->update($data);
        return $update;
    }

    public function updatePassword($id, $hashedPassword)
    {
        return DB::table($this->table)->where('IDUser', $id)->update(['password' => $hashedPassword]);
    }


    public function uploadAvatar($user, $file)
    {
        $filename = 'avatar_' . $user->username . '_' . time() . '.' . $file->getClientOriginalExtension();

        $uploadPath = public_path('clients/img/profile');


        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        $file->move($uploadPath, $filename);

        // Xóa ảnh cũ nếu không phải mặc định
        if ($user->avatar && $user->avatar !== 'default.png') {
            $oldPath = $uploadPath . '/' . $user->avatar;
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        return $filename;
    }
}
