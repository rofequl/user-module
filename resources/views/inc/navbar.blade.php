<?php
/**
 * Created by PhpStorm.
 * User: Nayem
 * Date: 08-Nov-18
 * Time: 8:32 AM
 */
?>


<nav class="navbar navbar-expand navbar-dark bg-dark static-top" id="NavBar">
    <button type="button" id="sidebarCollapse" class="btn btn-sm text-white dark-btn">
        <i class="fa fa-bars"></i>
    </button>
    <ul class="navbar-nav ml-4">

    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow mx-1">
            <span class="nav-link search">
                            <input type="text" onkeyup="search()" class="search-input" placeholder="Search User">
                            <span class="fa fa-search search-btn" onclick="openSearch()"></span>
            </span>
            <div class="dropdown-menu dropdown-menu-right SearchDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
            </div>
        </li>
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
               aria-haspopup="true" aria-expanded="false">
                <img src="{{asset('storage/people').'/'.Session::get('userimg')}}" class="CImg rounded-circle">
                <span class="admin-name">{{Session::get('username')}}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right bg-dark animated flipInX" aria-labelledby="userDropdown">
                <a class="dropdown-item text-white" href="{{ route('department') }}"><span
                            class="adminpro-icon adminpro-home-admin mx-2"></span>Departments</a>
                <a class="dropdown-item text-white" href="{{url("users")."/".Session::get('userid')}}"><span
                            class="adminpro-icon adminpro-user-rounded mx-2"></span>Users</a>
                <a class="dropdown-item text-white" href="{{ route('Allusers') }}"><span
                            class="fas fa-users mx-2"></span>All Users</a>
                <a class="dropdown-item text-white" href="{{ route('Addusers') }}"><span
                            class="fas fa-user-plus mx-2"></span>Add New Users</a>
                <a class="dropdown-item text-white" href="{{ route('user_role') }}"><span
                            class="adminpro-icon adminpro-money mx-2"></span>User Role</a>
                <a class="dropdown-item text-white" href="{{ route('UserManagement') }}"><span
                            class="fas fa-users-cog mx-2"></span>User Permission</a>
                <a class="dropdown-item text-white" href="{{ route('Setting') }}"><span
                            class="adminpro-icon adminpro-settings mx-2"></span>Settings</a>
                <div class="dropdown-divider "></div>
                <a class="dropdown-item text-white" href="{{ route('logout') }}"><span
                            class="adminpro-icon adminpro-locked mx-2"></span>Log Out</a>
            </div>
        </li>
    </ul>
</nav>
