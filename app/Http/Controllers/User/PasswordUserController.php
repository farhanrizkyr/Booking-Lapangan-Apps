<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordUserController extends Controller
{
    
    public function __construct() {
        $this->middleware('auth');
    }
}
