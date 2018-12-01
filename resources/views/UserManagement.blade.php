@extends('layout.app')
@section('content')

    <div class="container-fluid" id="UserPermission">
        <div class="row">
            <div class="col-3 mt-2">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input class="form-control" id="myInput" type="text" placeholder="Search user">
                </div>
                <ul class="list-group" id="myList">
                    @foreach($userrole as $users)
                        <li id="design{{$users->role_id}}" class="list-group-item"  onclick="UserPermission({{$users->role_id}})"><img src="{{asset('img/img_avatar.png')}}"
                                                                                    class="CImg rounded-circle">
                            <span class="user{{$users->role_id}}">{{$users->user_role}}</span>                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-9" style="background-color: #ffffffd9;height: 91.5vh;padding-right: 0;">
                <div class="container text-dark table-wrapper-scroll-y" id="userPermissionShow" style="display: none;">
                    <div class="mt-3 text-center">
                        <img src="{{asset('img/img_avatar.png')}}" class="w-25 rounded-circle mx-auto d-block"><br>
                        <h2 class="addUserName"></h2>
                        <input type="hidden" id="addUserNameValue" value="">
                    </div>
                    <br>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Grant Access?</th>
                        </tr>
                        </thead>
                        <tbody class="addPermissionTable">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>






    <!---<div class="row">
        <div class="col-lg-8">
        @if(session()->has('UserManagementController'))
        <div class="alert alert-success">
            Created Successfully
        </div>
        @endif
            <div class="card text-dark">
                <div class="card-header">
                    User Management:
                </div>
                <div class="card-body">
                    <form action="{{ url('registerMethod') }}" method="post">
                        {{ csrf_field() }}
            Username:
            <input type="text" class="form-control" name="username"> <br>
            Password:
            <input type="password" class="form-control" name="passwords"> <br>

            <label class="container">Category
              <input type="checkbox" checked="checked" name="checkbox[]" value="1">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Custemoer
                          <input type="checkbox" name="checkbox[]" value="2">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Supplier
                          <input type="checkbox" name="checkbox[]" value="3">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Unit
                          <input type="checkbox" name="checkbox[]" value="4">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Product
                          <input type="checkbox" name="checkbox[]" value="5">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Purchase
                          <input type="checkbox" name="checkbox[]" value="15">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Purchase Cash Return
                          <input type="checkbox" name="checkbox[]" value="6">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Purchase Repair
                          <input type="checkbox" name="checkbox[]" value="7">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Purchase Damage
                          <input type="checkbox" name="checkbox[]" value="17">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Purchase Management Report
                          <input type="checkbox" name="checkbox[]" value="13">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Sales
                          <input type="checkbox" name="checkbox[]" value="16">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Sales Cash Return
                          <input type="checkbox" name="checkbox[]" value="8">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Sales Repair
                          <input type="checkbox" name="checkbox[]" value="9">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Sales Damage
                          <input type="checkbox" name="checkbox[]" value="10">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">User Management Report
                          <input type="checkbox" name="checkbox[]" value="11">
                          <span class="checkmark"></span>
                        </label>
                        <label class="container">Sales Management Report 
                          <input type="checkbox" name="checkbox[]" value="12">
                          <span class="checkmark"></span>
                        </label>
                        
                        <label class="container">Inventory Management Report
                          <input type="checkbox" name="checkbox[]" value="14">
                          <span class="checkmark"></span>
                        </label>
                        <input type="submit" name="submit" value="Create User" class="btn btn-info">
                    </form>

                </div>

            </div>

        </div>

    </div>--->


@endsection