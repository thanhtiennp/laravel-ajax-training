<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Redirect,Response;
use Validator;
class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['users'] = User::orderBy('id','desc')->paginate(8);
   
        return view('ajax-crud',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $userId = $request->user_id;
        $user   =   User::updateOrCreate(['id' => $userId],
                    ['name' => $request->name, 'email' => $request->email]);
    
        return Response::json($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user=User::find($id);
        return response()->json($user,200);


        // $where = array('id' => $id);
        // $user  = User::where($where)->first();
 
        // return Response::json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request -> all(),[
            'name'=>'required|min:2|max:255'
        ],[
            'required'=>'ten khong duoc de trong',
            'min'=>'it nhat 2 ky tu',
            'max'=>'nhieu nhat 255 ky tu'
        ]);
        if($validator->fails()){
            return response()->json(['error'=>'true','message'=>    $validator->errors()],200);
        }
        $user = User::find($id);
            $user->update(
                [
                'name'=>$request->name,
                'email'=>$request->email
                ]
            );
            return response()->json(['success'=>'them thanh cong']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::where('id',$id)->delete();
   
        return Response::json($user);
    }
}
