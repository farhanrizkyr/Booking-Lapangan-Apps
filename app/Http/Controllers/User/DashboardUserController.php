<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;

class DashboardUserController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
  public function index ()
  {
    return View('User.dashboard');
  }
}
