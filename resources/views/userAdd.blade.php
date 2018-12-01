<?php
/**
 * Created by PhpStorm.
 * User: Nayem
 * Date: 11/19/2018
 * Time: 7:48 PM
 */
?>

@extends('layout.app')
@section('content')

    <div class="container">
        <div id="AddUserPage" class="p-3">
            <div class="text-center">
                <form method="post" action="{{ url('AddNewUser') }}" id="target" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="time_info_pro_pic mx-auto" onclick="chooseFile()">
                        <img id="previewing" src="{{asset('img/img_avatar.png')}}"
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
                            <th colspan="4">Add New User:</th>
                        </tr>
                        </thead>
                        <tbody class="td-size">
                        <tr>
                            <td>Name:</td>
                            <td>
                                <div class="userAllert" id="userAllertName"></div>
                                <input type="text" placeholder="Name" name="name" maxlength="40" class="w-100"
                                       id="inputName"></td>
                            <td>Email:</td>
                            <td>
                                <div class="userAllert" id="userAllertEmail"></div>
                                <input type="email" placeholder="Email" name="email" maxlength="40"
                                       class="w-100"
                                       id="inputEmail"></td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td>
                                <div class="userAllert" id="userAllertPass"></div>
                                <input type="password" placeholder="Password" name="password" maxlength="40"
                                       class="w-100"
                                       id="inputPassword"></td>
                            <td>Re type Password:</td>
                            <td>
                                <div class="userAllert" id="userAllertrePass"></div>
                                <input type="Password" placeholder="Re enter Password" maxlength="40"
                                       class="w-100"
                                       id="inputrePassword"></td>
                        </tr>
                        <tr>
                            <td>Phone:</td>
                            <td>
                                <div class="userAllert" id="userAllertNumber"></div>
                                <input type="number" placeholder="Phone Number" name="phone" maxlength="40"
                                       class="w-100"
                                       id="inputNumber"></td>
                            <td>Date of Birth:</td>
                            <td>
                                <div class="userAllert" id="userAllertDob"></div>
                                <input type="text" placeholder="Date of Birth" name="dob" maxlength="40"
                                       class="w-100"
                                       id="inputDob"></td>
                        </tr>
                        <tr>
                            <td>Address:</td>
                            <td>
                                <div class="userAllert" id="userAllertAddress"></div>
                                <input type="text" placeholder="Address" name="address" maxlength="40"
                                       class="w-100"
                                       id="inputAddress"></td>
                            <td>Department:</td>
                            <td>
                                <div class="userAllert" id="userAllertDepartment"></div>
                                <select class="w-100 select" name="department_id" id="inputDepartment">
                                    <option value="">Select Departments</option>
                                    @foreach($department as $departments)
                                        <option value="{{ $departments->id }}">{{ $departments->department_name}}</option>
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
                                        <option value="{{ $userRoles->role_id }}">{{ $userRoles->user_role}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btnStyle btn btn-primary mb-3" id="submit">New User Submit
                    </button>
                </form>
            </div>
        </div>
    </div>







@endsection
