<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Session;
use Validator;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($data = false){
        if ($data){
            $department = department::all();
            $departmentUpdate = department::find($data);
            return view('department',compact('department','departmentUpdate'));
        }else{
            $department = department::all();
            return view('department',compact('department'));
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
//        dd($request->all());

        $validator = Validator::make($request->all(), [
            'department_name'  => 'required|unique:departments'
        ]);
        if ($validator->fails()) {
            return redirect('/department')
                ->withErrors($validator)
                ->withInput();
        }else{
            $department = new department;
            $department->department_name   =  $request->department_name;
            $department->save();

            Session::flash('message', 'Department Added Successfully !');
            return redirect('/department');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(department $department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$data){
        $validator = Validator::make($request->all(), [
            'department_name'  => 'required|unique:departments'
        ]);
        if ($validator->fails()) {
            return redirect('/department')
                ->withErrors($validator)
                ->withInput();
        }else{
            $department = department::find($data);
            $department->department_name = $request->department_name;
            $department->save();

            Session::flash('message', 'Department Update Successfully !');
            return redirect('/department');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\department  $department
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request){
        $department = department::find($request->delete);
        $department->delete();
        Session::flash('message', 'Department Deleted Successfully !');
        return redirect('/department');
    }
}
