<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
class PasswordAdminController extends Controller
{

   public function __construct()
   {
      $this->middleware('auth:admin');
   }
   function password()
   {
    return view('Admin.password');
   }

   public function update()
   {

      request()->validate([
       'old_password'=>'required',

      ],
       [
       'old_password.required'=>'Wajib Di isi'
      ]); 
      if (!Hash::check(request()->old_password,auth()->user()->password)) {
         return redirect('apps-admin/password')->with('gagal','Password Lama Tidak Cocok !!');
      }

     if (request()->new_password!= request()->ulang_password) {
      return redirect('apps-admin/password')->with('gagal','Konfirmasi Password Baru Tidak Cocok !!');
     }

     auth()->user()->update([
     'password'=>Hash::make(request()->new_password),

     ]);

     return redirect('apps-admin/password')->with('berhasil',' Password Baru Berhasil Di Update!!');
   }
}
