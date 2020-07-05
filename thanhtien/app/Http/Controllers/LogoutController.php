<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LogoutController extends Controller
{   
    public function __construct() {
        $this->middleware('auth');
        //return redirect('login');
    }
    public function getlogout(){
        Auth::logout();
        return redirect('login');
    }
}
