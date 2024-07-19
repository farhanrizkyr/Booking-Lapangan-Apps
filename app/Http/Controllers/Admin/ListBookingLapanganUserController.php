<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookingLapangan;
use Illuminate\Http\Request;

class ListBookingLapanganUserController extends Controller
{
    
    public function __construct()
    {
       $this->middleware('auth:admin');
    }

    public function index()
    {
        $datas=BookingLapangan::where('status',0)->latest()->get();
        return view('Admin.list_booking_user',compact('datas'));
    }
 
    public function update($id)
    {
      $request= BookingLapangan::find($id)->update([
        'status'=>request()->status,

       ]);
       //dd($request);
       return redirect('/apps-admin/list-booking-lapangan-user')->with('status','Data Status Berhasil Di Konfirmasi');

    }

    public function history()
    {
        $datas=BookingLapangan::where('status',1)->latest()->get();
        return view('Admin.list_booking_history',compact('datas'));
    }

}
