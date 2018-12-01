<?php

namespace App\Http\Controllers;

use App\user;
use App\user_role;
use App\Department;
use Illuminate\Http\Request;
use Session;
use Validator;

class UserController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function LoginCheck(Request $request)
    {

        $admin = user::where('name', $request->username)
            ->where('password', $request->passwords)
            ->first();

        if (!empty($admin)) {
            if ($admin->status == 1) {
                Session::put('username', $request->username);
                Session::put('userid', $admin->id);
                Session::put('userimg', $admin->image);
                return redirect('dashboard');
            } else {
                $request->session()->flash('login_error', 'Admin are not approve you to login!');
                return view('login');
            }
        } else {
            $request->session()->flash('login_error', 'User name or password not match');
            return view('login');
        }
    }


    public function AllUsers($data = false)
    {
        if ($data){
            $user = user::all();
            $department = Department::all();
            $userRole = user_role::all();
            $userUpdate = user::find($data);
            return view('userAll', compact('user','userUpdate','department','userRole'));
        }else{
            $user = user::all();
            return view('userAll', compact('user'));
        }

    }

    public function UserUpdate(Request $request, $data)
    {

        $user = user::find($data);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->department_id = $request->department_id;
        $user->role_id = $request->role_id;
        if ($request->hasFile('cover_img')) {
            $fileName = strtolower($request->name);
            $fileName = preg_replace('/-+/', '-', $fileName);
            $fileName = preg_replace('/\s+/', '', $fileName);
            $fileName = preg_replace("/[^a-zA-Z0-9]+/", "", $fileName);
            $extension = $request->file('cover_img')->getClientOriginalExtension();
            $fileStore = $fileName . "_" . time() . "." . $extension;
            $request->file('cover_img')->move(public_path("storage/people"), $fileStore);
            $user->image = $fileStore;
        }
        $user->save();

        return redirect()->back();

    }

    public function StoreStatus(Request $request)
    {
        $user = user::find($request->id);
        $user->status = $request->status;
        $user->save();

    }

    public function UserDelete(Request $request)
    {
        $user = user::find($request->delete);
        $user->delete();
        return redirect('/Allusers');
    }

    public function AddUsers()
    {
        $department = Department::all();
        $userRole = user_role::all();
        return view('userAdd', compact('department','userRole'));
    }

    public function UserProfile($data, $data1 = false)
    {
        $user = user::find($data);
        if ($data1 == "UPDATE"){
            $department = Department::all();
            $userRole = user_role::all();
            $update = "edit";
            return view('user', compact('user', 'userRole','department','update'));
        }else{
            $department = Department::find($user->department_id);
            $userRole = user_role::where('role_id', $user->role_id)->first();
            return view('user', compact('user', 'userRole','department'));
        }
    }

    public function EmailCheck(Request $request)
    {
        $user = user::Where('email', $request->PostEmail)->count();
        return $user;

    }

    public function StoreUser(Request $request)
    {
        if ($request->hasFile('cover_img')) {
            $fileName = strtolower($request->name);
            $fileName = preg_replace('/-+/', '-', $fileName);
            $fileName = preg_replace('/\s+/', '', $fileName);
            $fileName = preg_replace("/[^a-zA-Z0-9]+/", "", $fileName);
            $extension = $request->file('cover_img')->getClientOriginalExtension();
            $fileStore = $fileName . "_" . time() . "." . $extension;
            $request->file('cover_img')->move(public_path("storage/people"), $fileStore);
        } else {
            $fileStore = "img_avatar.png";
        }

        $user = new user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->phone;
        $user->empUserId = rand(1, 999);
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->status = 0;
        $user->department_id = $request->department_id;
        $user->role_id = $request->role_id;
        $user->image = $fileStore;
        $user->save();

        return redirect('Addusers');

    }

    public function SettingShow()
    {
        return view('setting');
    }

    public function PassChange(Request $request)
    {
        $userPass = user::where('name', Session::get('username'))
            ->where('password', $request->OldPass)
            ->first();

        if (!empty($userPass)) {
            $userPass->password = $request->NewPass;
            $userPass->save();
            Session::flash('message', 'Password change Successfully.');
            return redirect('/Setting');
        } else {
            Session::flash('message', 'Your Old password not match!');
            return redirect('/Setting');
        }
    }

    public function Logout()
    {
        Session::forget('username');
        Session::flush();
        return redirect('/');
    }

}
