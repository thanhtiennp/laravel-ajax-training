<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\User;
class HomeController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    // }

    // public function getIndex(){
    //     return view('index');
    // }
    public function getIndex(){
        // $user= User::select('id','name','email')->orderby('id','DESC')->get()->toArray();
        // //print_r($user);
        // return view('index',[
        //     'user' => $user,
        // ]);
        //return view('index',compact('user'));
        $data['users'] = User::orderBy('id','desc')->paginate(8);
   
        return view('index',$data);
    }
    public function edit($id){
        $user=User::find($id);
        return response()->json($user,200);
    }
    public function update($id){
        
    }
    public function delete($id)
    {
        $user = User::where('id',$id)->delete();
   
        return Response::json($user);
    }
}
