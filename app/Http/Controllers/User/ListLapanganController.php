<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BookingLapangan;
use App\Models\LapanganFutsal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListLapanganController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function list_lapangan(){
    $lapangans=LapanganFutsal::latest()->get();
    return view('User.data_lapangan',compact('lapangans'));
    }


    function booking($id){
        $booking=LapanganFutsal::find($id);
        if ($booking==false) {
          return redirect('/apps-user/list-lapangan')->with('gagal','Lapangan Tidak ada Silahkan Pilih Lapangan Yang Lain');
        }
        
        return view('User.booking',compact('booking'));
    }

    function proses_booking($id){
     request()->validate([
     'tanggal_awal'=>'required',
     'tanggal_akhir'=>'required',
     'jam_awal'=>'required|unique:booking_lapangans',
     'jam_akhir'=>'required|unique:booking_lapangans',
     'bukti_bayar'=>'required',
     ]);

     if (request()->file('bukti_bayar')) {
       $file=request()->file('bukti_bayar');
       $filename=time().'.'.$file->getClientOriginalExtension();
       $file->move(public_path('Bukti_Transfers'),$filename);
        BookingLapangan::create([
        'jam_awal'=>request()->jam_awal,
        'tanggal_awal'=>request()->tanggal_awal,
        'user_id'=>Auth::user()->id,
        'lapangan_futsal_id'=>request()->nama_lapangan,
        'jam_akhir'=>request()->jam_akhir,
        'tanggal_akhir'=>request()->tanggal_akhir,
        'bukti_bayar'=>$filename,
      ]);
     }

     return redirect('apps-user/list-lapangan')->with('berhasil','Lapangan Berhasil Di Booking');
    }

}
