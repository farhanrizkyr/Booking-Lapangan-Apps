<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
class PengaturanAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct()
     {
        $this->middleware('auth:admin');
     }
    public function index()
    {
          return View('Admin.profile');
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $user=Auth::user();
        request()->validate([
        'avatar'=>'mimes:jpg,png,jpeg',
         'name'=>'required',
         'username'=>'required',
         'email'=>'required',
        ]);
        
        $filename=$user->avatar;
        if (request()->avatar<> '') {
           $file=request()->file('avatar');
           $filename=time().'.'.$file->getClientOriginalExtension();
           $file->move(public_path('Avatar'),$filename);

           if (request()->avatar_lama) {
           unlink(public_path('Avatar').'/'.request()->avatar_lama);
           }

           Admin::find($id)->update([
           'name'=>request()->name,
           'gender'=>request()->gender,
           'email'=>request()->email,
           'username'=>request()->username,
           'avatar'=>$filename,

           ]);
        }

        else{
            Admin::find($id)->update([
                'name'=>request()->name,
                'gender'=>request()->gender,
                'email'=>request()->email,
                'username'=>request()->username,
     
                ]);
        }

        return redirect('/apps-admin/my-profile')->with('status','Profile Berhasil Di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
