<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\password;

class PasswordUserController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
    }


    public function password()
    {
        return view('User.password');
    }

    public function update()
    {

        request()->validate([
         'password_lama'=>'required',
         'password_baru'=>'required',

        ]);
      if (! Hash::check(request()->password_lama,auth()->user()->password)) {
        return redirect('/apps-user/ubah-password')->with('status','Password Lama Tidak ada');
      }
      
      if (request()->password_baru!= request()->password_baru1) {
        return redirect('/apps-user/ubah-password')->with('status','Konfirmasi Password Baru Salah');
      }

      auth()->user()->update([
      'password'=>Hash::make(request()->password_baru),

      ]);
      return redirect('/apps-user/ubah-password')->with('berhasil','Password Berhasil Di Update');  
    }
}
