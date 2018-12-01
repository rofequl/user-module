<?php
/**
 * Created by PhpStorm.
 * User: Nayem
<<<<<<< HEAD
 * Date: 14-Nov-18
 * Time: 12:27 PM
=======
 * Date: 09-Nov-18
 * Time: 2:28 AM
>>>>>>> e3a3cce5db067ac199b49244e2cf2bd78b92ad6c
 */
?>

@extends('layout.app')
@section('content')
    <div class="container">
        @if(isset($update))
            <div id="AddUserPage" class="p-3">
                <div class="text-center">
                    <form method="post" action="{{ url('UserUpdate/'.$user->id)}}" id="UpdateUser" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="time_info_pro_pic mx-auto" onclick="chooseFile()">
                            <img id="previewing" src="{{asset('/storage/people')."/".$user->image}}"
                                 class="img-thumbnail rounded-circle">
                            <div class="time_info_pro_pic_upload">
                                <img src="{{asset('img/camera.png')}}" width="20" height="20">
                            </div>
                        </div>
                        <div style="height:0;overflow:hidden;display:none">
                            <input type='file' name='cover_img' id="fileInput">
                        </div>
                        <table class="useraddTable table rounded text-left mt-4">
                            <thead class="thead-dark">
                            <tr>
                                <th colspan="4">Update User Profile:</th>
                            </tr>
                            </thead>
                            <tbody class="td-size">
                            <tr>
                                <td>Name:</td>
                                <td>
                                    <div class="userAllert" id="userAllertName"></div>
                                    <input type="text" placeholder="Name" name="name" maxlength="40" class="w-100"
                                           id="inputName" value="{{$user->name}}"></td>
                                <td>Email:</td>
                                <td>
                                    <div class="userAllert" id="userAllertEmail"></div>
                                    <input type="email" placeholder="Email" name="email" maxlength="40"
                                           class="w-100" id="inputEmail" value="{{$user->email}}"></td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td>
                                    <div class="userAllert" id="userAllertNumber"></div>
                                    <input type="number" placeholder="Phone Number" name="phone" maxlength="40"
                                           class="w-100" id="inputNumber" value="{{$user->phone}}"></td>
                                <td>Date of Birth:</td>
                                <td>
                                    <div class="userAllert" id="userAllertDob"></div>
                                    <input type="text" placeholder="Date of Birth" name="dob" maxlength="40"
                                           class="w-100" id="inputDob" value="{{$user->dob}}"></td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td>
                                    <div class="userAllert" id="userAllertAddress"></div>
                                    <input type="text" placeholder="Address" name="address" maxlength="40"
                                           class="w-100" id="inputAddress" value="{{$user->address}}"></td>
                                <td>Department:</td>
                                <td>
                                    <div class="userAllert" id="userAllertDepartment"></div>
                                    <select class="w-100 select" name="department_id" id="inputDepartment">
                                        <option value="">Select Departments</option>
                                        @foreach($department as $departments)
                                            @if($user->department_id == $departments->id)
                                                <option value="{{ $departments->id }}"
                                                        selected>{{ $departments->department_name }}</option>
                                            @else
                                                <option value="{{ $departments->id }}">{{ $departments->department_name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>User Role:</td>
                                <td>
                                    <div class="userAllert" id="userAllertUserRole"></div>
                                    <select class="w-100 select" name="role_id" id="inputUserRole">
                                        <option value="">Select User Role</option>
                                        @foreach($userRole as $userRoles)
                                            @if($user->role_id == $userRoles->role_id)
                                                <option value="{{ $userRoles->role_id }}"
                                                        selected>{{ $userRoles->user_role }}</option>
                                            @else
                                                <option value="{{ $userRoles->role_id }}">{{ $userRoles->user_role }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <button type="submit" class="btnStyle w-25 btn btn-primary mb-3" id="submit">Update User
                        </button>
                        <a href="{{url('users').'/'.$user->id}}" class="btnStyle w-25 btn btn-secondary mb-3">Cancel</a>
                    </form>
                </div>
            </div>
        @else
        <div id="AddUserPage" class="p-3">
            <div class="text-center">
                <div class="time_info_pro_pic mx-auto" onclick="chooseFile()">
                    <img id="previewing" src="{{asset('storage/people').'/'.$user->image}}"
                         class="img-thumbnail rounded-circle">
                </div>
                <table id="example" class="useraddTable table rounded text-left mt-4">
                    <thead class="thead-dark">
                    <tr>
                        <th colspan="4">User Profile:
                        <a href="{{url('users').'/'.$user->id.'/UPDATE'}}" class="btn btn-sm btn-success float-right">Update</a></th>
                    </tr>
                    </thead>
                    <tbody class="td-size">
                    <tr>
                        <td>Name:</td>
                        <td>{{$user->name}}</td>
                        <td>Email:</td>
                        <td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <td>Phone:</td>
                        <td>{{$user->phone}}</td>
                        <td>Date of Birth:</td>
                        <td>{{$user->dob}}</td>
                    </tr>
                    <tr>
                        <td>Address:</td>
                        <td>{{$user->address}}</td>
                        <td>Department:</td>
                        <td>{{$department->department_name}}</td>
                    </tr>
                    <tr>
                        <td>User Role:</td>
                        <td>{{$userRole->user_role}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
@endsection

