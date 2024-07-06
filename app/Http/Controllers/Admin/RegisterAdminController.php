<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterAdminController extends Controller
{
    public function register_admin ()
    {
      return View('Admin.register');
    }

    public function proses_register_admin()
    {
        request()->validate([
            'name'=>'required',
            'role'=>'required',
            'username'=>'required|alpha_dash',
            'email'=>'required',
            'password'=>'required|confirmed',
            ]);
    
            Admin::create([
             'name'=>request()->name,
             'role'=>request()->role,
             'username'=>request()->username,
             'email'=>request()->email,
             'password'=>Hash::make(request()->password),
            ]);
    
            return redirect('apps-admin/register')->with('status','Account Berhasil Di Register');
    }
}
