<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookingLapangan;
use App\Models\LapanganFutsal;


class DashboardAdminController extends Controller
{

  public function __construct()
{
   $this->middleware('auth:admin');
}
    public function index ()
    {
    $app=BookingLapangan::count();
    $not=BookingLapangan::count();
    $lap=LapanganFutsal::count();
      return View('Admin.dashboard',compact('lap','not','app'));
    }
}
