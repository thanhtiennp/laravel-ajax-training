<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Auth;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    // function __construct(){
    //     $this->Dangnhap();
    // }
    // function Dangnhap(){
    //     if(Auth::check()){
    //         view()->share('user_login',Auth::user());
    //     }
    // }
}
