<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    public function register ()
    {
      return View('User.register');
    }

    public function proses_register()
    {
        request()->validate([
        'name'=>'required',
        'username'=>'required|alpha_dash',
        'email'=>'required',
        'password'=>'required|confirmed',
        ]);

        User::create([
         'name'=>request()->name,
         'username'=>request()->username,
         'email'=>request()->email,
         'password'=>Hash::make(request()->password),
        ]);

        return redirect('apps-user/auth')->with('status','Account Berhasil Di Register');
    }
}
