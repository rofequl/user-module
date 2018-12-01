<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\user_role;
use App\role_permission;
use App\permission_list;
use App\item;
use DB;

class UserManagementController extends Controller
{

    public function index(){
        $userrole = user_role::all();
        return view('UserManagement',compact('userrole'));
    }



    public function store(Request $request)
    {
        $user_permission = new role_permission;
        $user_permission->role_id = $request->userid;
        $user_permission->permission_id = $request->permissionid;
        $user_permission->save();
    }


    public function show(Request $request){
        $user_permission = role_permission::Where('role_id', $request->data)->pluck('permission_id');
        return response()->json($user_permission);
    }


    public function listShow()
    {
        $permissionList = permission_list::all();
        return $permissionList;
    }


    public function delete(Request $request)
    {
        $user_permission = role_permission::Where('permission_id', $request->permissionid)->where('role_id', $request->userid);
        $done = $user_permission->delete();
    }

    public function softDelete(){
        $trash_item = item::where('soft_delete','1')->get();
        return view('trash',compact('trash_item'));
    }

    public function reStore($id){
        DB::table('items')
                ->where('id',$id)
                ->update(
                    array(
                        'soft_delete'=>'0',
                ));

        return redirect('softDelete');
    }
}
