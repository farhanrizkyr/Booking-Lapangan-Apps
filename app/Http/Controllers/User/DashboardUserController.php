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
     $app=BookingLapangan::where('status',1)->count();
    $not=BookingLapangan::where('status',0)->count();
    $lap=LapanganFutsal::count();
    return View('User.dashboard',compact('lap','not','app'));
  }
}
