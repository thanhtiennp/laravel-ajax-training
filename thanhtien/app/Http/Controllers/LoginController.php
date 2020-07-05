<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\MessageBag;
class LoginController extends Controller
{   
    public function getLogin(){
        return view('login');
    }

    public function postLogin(Request $request){
        $this-> validate($request,[
            'email'=>'required',
            'password'=>'required|min:3|max:32'
            ],[
                'email.required'=>'Bạn chưa nhập email',
                'password.required'=>'Bạn chưa nhập pasword',
                'password.min'=>'Pasword không được nhỏ hơn 3 ký tự',
                'password.max'=>'Pasword không được lớn hơn 32 ký tự',
            ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $id=null;
            
            return redirect('index');
        }else{
            $errors = new MessageBag(['errorlogin'=>'Email sai hoặc mật khẩu không đúng']);
            return redirect()->back()->withInput()->withErrors($errors);
        }
    }
    
    
}
