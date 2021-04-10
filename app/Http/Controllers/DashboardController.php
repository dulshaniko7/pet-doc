<?php

namespace App\Http\Controllers;

use App\Models\User;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     // $user = Auth::user();
    //     // if($user->hasRole('admin'))
    //     // {
    //     //     dd("admin");
    //     // }
    //     // else if($user->hasRole('hospital')){
    //     //     dd("hospital");
    //     // }

    //     return view('account.dashboard');
    // }

    public function password_verification(Request $request)
    {
        $verify_password = $request->current_password;
        $encrypted_verify_password = Hash::make($verify_password);
        $password = Auth::user()->password;
        if (Hash::check($verify_password, $password)) {
            $res['success'] = true;
            $res['message'] = $password;
            return response($res);
        } else {
            $res['success'] = false;
            $res['message'] = 'Please enter correct current password!';
            return response($res);
        }
    }

    public function store(Request $request)
    {
        $user = User::find(Auth::user()->id);

        // update user password
        $request->user()->update(['password' => bcrypt($request->password)]);
//
//
//        // redirect with success
        $res['success'] = true;
        $res['message'] = 'Password is successfully changed!';
        return response($res);

    }

    public function updateProfile(Request $request)
    {
        $user_id = Auth::user()->id;
        $image = $request->file('image');
        $user = User::where('id', $user_id)->first();
        $user->name = $request->name;
        $user->email = $request->email;

        if (!empty($image)) {

            $file_ex = strtolower(File::extension($image->getClientOriginalName()));

            if ($file_ex != "png" && $file_ex != "jpg" && $file_ex != "jpeg" && $file_ex != "gif") {
                $res['success'] = false;
                $res['message'] = 'Invalid photo type!';
                return response($res);
            }

            $filename = uniqid() . "." . $file_ex;
//
            $image->storeAs('public/avatars/users', $filename);
//            $uuid = Uuid::uuid4();
//
//            $path = "public/avatars/doctors/{$uuid->toString()}.$file_ex";
//
//            Storage::put($path, $resizeFile->__toString());

            $user->image = $filename;
        } else {
            $filename = "default.svg";
            $user->image = $filename;
        }
        $user->save();

        $res['success'] = true;
        $res['message'] = 'Profile Updated Successfully!';
        return response($res);

    }

}
