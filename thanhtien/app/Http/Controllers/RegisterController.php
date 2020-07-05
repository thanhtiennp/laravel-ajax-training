<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class RegisterController extends Controller
{
    public function getRegister(){
        return view ('register');
    }
    public function postRegister(Request $request){
        $this -> validate($request,[
            'name'=>'required|min:3',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:3|max:32',
            'passwordagain'=>'required|same:password'
        ],[
            'name.required'=>'Bạn chưa nhập tên',
            'name.min'=>'Tên có ít nhất 3 ký tự',
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=>'Bạn chưa nhập đúng định dạng',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu có ít nhất 3 ký tự',
            'password.max'=>'Mật khẩu dài nhất 32 ký tự',
            'passwordagain.required'=>'Bạn chưa nhập lại mật khảu',
            'passwordagain.same'=>'Mật khẩu nhập lại chưa đúng'
        ]);
         $user = new User;
         $user -> name = $request->name;
         $user -> email = $request->email;
         $user -> password = bcrypt($request->password);
         $user -> save();

         return redirect()->back()->with('thanhcong','Tao tai khoan thanh cong');
    }
}
