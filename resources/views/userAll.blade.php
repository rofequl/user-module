<?php
/**
 * Created by PhpStorm.
 * User: Nayem
 * Date: 11/19/2018
 * Time: 7:31 PM
 */
?>

@extends('layout.app')
@section('content')

    <div class="container" id="User">
        @if(isset($userUpdate))
            <div id="AddUserPage" class="p-3">
                <div class="text-center">
                    <form method="post" action="{{ url('UserUpdate/'.$userUpdate->id)}}" id="UpdateUser" enctype="multipart/form-data">
                        {{csrf_field()}}

                        <div class="time_info_pro_pic mx-auto" onclick="chooseFile()">
                            <img id="previewing" src="{{asset('/storage/people')."/".$userUpdate->image}}"
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
                                           id="inputName" value="{{$userUpdate->name}}"></td>
                                <td>Email:</td>
                                <td>
                                    <div class="userAllert" id="userAllertEmail"></div>
                                    <input type="email" placeholder="Email" name="email" maxlength="40"
                                           class="w-100" id="inputEmail" value="{{$userUpdate->email}}"></td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td>
                                    <div class="userAllert" id="userAllertNumber"></div>
                                    <input type="number" placeholder="Phone Number" name="phone" maxlength="40"
                                           class="w-100" id="inputNumber" value="{{$userUpdate->phone}}"></td>
                                <td>Date of Birth:</td>
                                <td>
                                    <div class="userAllert" id="userAllertDob"></div>
                                    <input type="text" placeholder="Date of Birth" name="dob" maxlength="40"
                                           class="w-100" id="inputDob" value="{{$userUpdate->dob}}"></td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td>
                                    <div class="userAllert" id="userAllertAddress"></div>
                                    <input type="text" placeholder="Address" name="address" maxlength="40"
                                           class="w-100" id="inputAddress" value="{{$userUpdate->address}}"></td>
                                <td>Department:</td>
                                <td>
                                    <div class="userAllert" id="userAllertDepartment"></div>
                                    <select class="w-100 select" name="department_id" id="inputDepartment">
                                        <option value="">Select Departments</option>
                                        @foreach($department as $departments)
                                            @if($userUpdate->department_id == $departments->id)
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
                                            @if($userUpdate->role_id == $userRoles->role_id)
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
                        <a href="{{route('Allusers')}}" class="btnStyle w-25 btn btn-secondary mb-3">Cancel</a>
                    </form>
                </div>
            </div>
        @endif
        <div id="ShowUser" class="p-3">
            @foreach($user as $users)
                <div class="row m-2 mx-5 mb-3 p-2 rounded bg-dark">
                    <a href="{{url('users').'/'.$users->id}}" class="col-8 text-nowrap nounderline text-white">
                        <div class="row">
                            <div class="col-3">
                                <img src="{{asset('/storage/people')."/".$users->image}}" class="w-75 rounded">

                            </div>
                            <div class="col-9">
                                {{$users->name}}<br>
                                {{$users->email}}
                            </div>
                        </div>

                    </a>
                    <div class="col-2">
                        @if($users->status == 1)
                            <button onclick="status({{$users->id}})" id="status{{$users->id}}"
                                    class="btn btn-sm btn-warning my-3 shadow-none">Active
                            </button>
                        @else
                            <button onclick="status({{$users->id}})" id="status{{$users->id}}"
                                    class="btn btn-sm btn-secondary my-3 shadow-none">Inactive
                            </button>
                        @endif
                    </div>
                    <div class="col-2">
                        <a href="{{route('Allusers')}}/{{$users->id}}"
                           class="btn btn-sm btn-primary w-100 mb-1 shadow-none"><i class="fas fa-edit"></i> Update</a>
                        <br>
                        <button
                                data-toggle="modal" data-target="#deleteModal"
                                data-href="{{url('UserDelete?delete='.$users->id)}}"
                                class="btn btn-sm btn-danger w-100 mt-1 shadow-none"><i class="fas fa-trash-alt"></i>
                            Delete
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Central Modal Small -->
        <div class="modal fade text-dark" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                    </div>
                    <div class="modal-body">
                        Are you sure want to delete this Category, If you delete this the category, sub category,
                        and item also deleted.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancel</button>
                        <a class="btn btn-primary btn-ok">Yes, Delete</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Central Modal Small -->
    </div>

@endsection

