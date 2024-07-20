<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BookingLapangan;
use App\Models\LapanganFutsal;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;

class DashboardUserController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
  public function index ()
  {
     $app=BookingLapangan::where('status',1)->where('user_id',auth()->user()->id)->count();
    $not=BookingLapangan::where('status',0)->where('user_id',auth()->user()->id)->count();
    $lap=LapanganFutsal::count();
    return View('User.dashboard',compact('lap','not','app'));
  }
}
