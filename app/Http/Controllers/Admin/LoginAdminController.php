<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginAdminController extends Controller
{
    public function loginadmin ()
    {
      return View('Admin.login');
    }

    public function proses_login_admin(Request $request)
    {
        
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/apps-admin/dashboard');
        }
 
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logout_admin(Request $request)
    {
        Auth::guard('admin')->logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/apps-admin/auth')->with('status','Account Berhasil Keluar Dari Aplikasi');
    }
  
}
