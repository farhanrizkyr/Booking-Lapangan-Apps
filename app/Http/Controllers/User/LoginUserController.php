<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginUserController extends Controller
{
    public function index ()
  {
    return View('User.login');
  }

  public function proses(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/apps-user/dashboard');
        }
 
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
{
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/apps-user/auth')->with('status','Account Berhasil Keluar Dari Aplikasi');
}
}
