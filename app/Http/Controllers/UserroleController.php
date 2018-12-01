<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user_role;
use Session;
use Validator;

class UserroleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($data = false){
        if ($data){
            $user_role = user_role::all();
            $user_roleUpdate = user_role::find($data);
            return view('user_role',compact('user_role','user_roleUpdate'));
        }else{
            $user_role = user_role::all();
            return view('user_role',compact('user_role'));
        }
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
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'user_role'  => 'required|unique:user_roles'
        ]);
        if ($validator->fails()) {
            return redirect('/user_role')
                ->withErrors($validator)
                ->withInput();
        }else{
            $user_role = new user_role;
            $user_role->user_role   =  $request->user_role;
            $user_role->role_id = rand(1,999);
            $user_role->save();

            Session::flash('message', 'User Role Added Successfully!');
            return redirect('/user_role');
        }
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$data){
        $validator = Validator::make($request->all(), [
            'user_role'  => 'required|unique:userroles'
        ]);
        if ($validator->fails()) {
            return redirect('/user_role')
                ->withErrors($validator)
                ->withInput();
        }else{
            $user_role = user_role::find($data);
            $user_role->user_role = $request->user_role;
            $user_role->save();

            Session::flash('message', 'User Role Updated Successfully !');
            return redirect('/user_role');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request){
        $user_role = user_role::find($request->delete);
        $user_role->delete();
        Session::flash('message', 'User Role Deleted Successfully !');
        return redirect('/user_role');
    }
}
