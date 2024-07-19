<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BookingLapangan;
use Illuminate\Http\Request;

class ListBookingLapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $datas=BookingLapangan::where('user_id',auth()->user()->id)->where('status',0)->get();
        return view('User.list_booking',compact('datas'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=BookingLapangan::find($id);
        $data->delete();
        if ($data->bukti_bayar<> '') {
          unlink(public_path('Bukti_Transfers').'/'.$data->bukti_bayar);
        }
        return redirect('/apps-user/list-booking-lapangan')->with('status','Data Lapangan Berhasil Di Hapus');
    }

    public function history()
    {
        $datas=BookingLapangan::where('user_id',auth()->user()->id)->where('status',1)->get();
        return view('User.list_history',compact('datas'));
    }

    public function destroy_history(string $id)
    {
        $data=BookingLapangan::find($id);
        $data->delete();
        if ($data->bukti_bayar<> '') {
          unlink(public_path('Bukti_Transfers').'/'.$data->bukti_bayar);
        }
        return redirect('/apps-user/history-booking-lapangan-futsal')->with('status','Data Lapangan Berhasil Di Hapus');
    }


}
