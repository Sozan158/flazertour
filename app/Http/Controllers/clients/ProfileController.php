<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\clients\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    private $user;
    protected $userID;

    public function __construct()
    {
        $this->user = new Profile();
    }
    public function profile()
    {
        $title = 'Thông tin User';
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        $this->userID = $this->user->getUser($user->IDUser);

        return view('clients.profile', compact('title', 'user'));
    }


    public function update(Request $request)
    {

        $user = Auth::user();

        $request->validate([
            'fullname' => 'nullable|string|max:255',
            'email'    => 'nullable|email|max:255',
            'phone'    => 'nullable|string|max:20',
            'address'  => 'nullable|string|max:255',
            'avatar'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $dataUpdate = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'avatar' => $user->avatar

        ];


        if ($request->hasFile('avatar')) {

            $filename = $this->user->uploadAvatar($user, $request->file('avatar'));
            $dataUpdate['avatar'] = $filename;
        }


        $nochange =
            $user->fullname === $dataUpdate['fullname'] &&
            $user->email === $dataUpdate['email'] &&
            $user->phone === $dataUpdate['phone'] &&
            $user->address === $dataUpdate['address'] &&
            $user->avatar === $dataUpdate['avatar'];

        if ($nochange) {
            return response()->json([
                'success' => false,
                'unchanged' => true,
                'message' => "Không có thay đổi nào được thực hiện.",
            ]);
        }

        $update = $this->user->updateUser($user->IDUser, $dataUpdate);

        if (!$update) {
            return response()->json([
                'success' => false,
                'message' => "Cập nhật thất bại!!!!"

            ]);
        }
        return response()->json([
            'success' => true,
            'message' => $dataUpdate
        ]);
    }

    public function changePassword(Request $request)
    {

        $user = Auth::user();


        $oldPass = $request->input('oldPass');
        $newPass = $request->input('newPass');
        $confPass = $request->input('confPass');


        if (!Hash::check($oldPass, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Mật khẩu cũ không chính xác!!!',

            ]);
        }


        if ($newPass !== $confPass) {
            return response()->json([
                'success' => false,
                'message' => 'Mật khẩu xác nhận không khớp!!!',

            ]);
        }

        if (Hash::check($newPass, $user->password)) {
            return response()->json([
                'success' => false,
                'unchanged' => true,
                'message' => 'Không thay đổi.',

            ]);
        }

        $hashedPass = Hash::make($newPass);
        $updatePass = $this->user->updatePassword($user->IDUser, $hashedPass);



        if (!$updatePass) {
            return response()->json([
                'success' => false,
                'message' => 'Cập nhật thất bại!!!',
            ]);
        }
        return response()->json([
            'success' => true,
            'message' => 'Mật khẩu thay đổi thành công!',
        ]);
    }
}
