<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\LapanganFutsal;
use Illuminate\Http\Request;


class ListLapanganController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function list_lapangan(){
    $lapangans=LapanganFutsal::latest()->get();
    return view('User.data_lapangan',compact('lapangans'));
    }
<<<<<<< HEAD


    function booking($id){
        $booking=LapanganFutsal::find($id);
        if ($booking==false) {
          return redirect('/apps-user/list-lapangan')->with('gagal','Lapangan Tidak ada Silahkan Pilih Lapangan Yang Lain');
        }
        
        return view('User.booking',compact('booking'));
    }
=======
>>>>>>> 693a9ca069fefbc5aafca4ef55e3b99ac744d648
}
