<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class RegisterAdminController extends Controller
{

  public function __construct()
  {
     $this->middleware('auth:admin');
  }
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
    
            return redirect('/apps-admin/list-account')->with('status','Account Berhasil Di Buat');
    }

    public function list ()
    {
      $datas=Admin::latest()->get();
      return View('Admin.list',compact('datas'));
    }


    public function update($id)
    {
      Admin::find($id)->update([
        'role'=>request()->role,
       ]);

       return redirect('/apps-admin/list-account')->with('status','Role Berhasil Di Update');
    }


    public function delete($id)
    {
      $data=Admin::find($id);
      $data->delete();
      return redirect('/apps-admin/list-account')->with('status',' Data User Berhasil Di Hapus');

    }
}
