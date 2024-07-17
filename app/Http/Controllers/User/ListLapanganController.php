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
}
