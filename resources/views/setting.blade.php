<?php
/**
 * Created by PhpStorm.
 * User: Nayem
 * Date: 11/24/2018
 * Time: 7:42 PM
 */
?>

@extends('layout.app')
@section('content')
    <div class="container mt-2">
        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="card bg-dark mx-auto mt-4" style="width: 28rem;">
            <div class="card-header">
                Change Password
            </div>
            <div class="card-body">
                <div class="userAllert" id="PassChangeAllert"></div>
                <form method="post" action="{{ url('PassChange') }}" id="PassChange">
                    {{csrf_field()}}
                    <input type="password" placeholder="Your Old Password" name="OldPass" maxlength="40"
                           class="w-100 mb-2 inputStyle" id="ChangePass1">
                    <input type="password" placeholder="Your New Password" name="NewPass" maxlength="40"
                           class="w-100 mb-2 inputStyle" id="ChangePass2">
                    <input type="password" placeholder="Re Enter New Password" maxlength="40"
                           class="w-100 mb-2 inputStyle" id="ChangePass3">
                    <button type="submit" class="btn btn-primary float-right shadow-none">Save Password</button>
                </form>
            </div>
        </div>
    </div>

@endsection



