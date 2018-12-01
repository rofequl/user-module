<?php
/**
 * Created by PhpStorm.
 * User: Nayem
 * Date: 08-Nov-18
 * Time: 11:42 PM
 */
?>
        <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="{{asset('framework/custom/login/LoginStyle.css')}}">
    <link rel="stylesheet" href="{{asset('framework/iconfont.min.css')}}">

</head>
<body>

<div class="limiter">
    <div class="container-login100" style="background-image: url('{{asset('img/bg-01.jpg')}}');">
        <div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login
				</span>
            <form action="{{ url('LoginCheck') }}" method="post" class="login100-form validate-form p-b-33 p-t-5">
                {{ csrf_field() }}
                @if(session()->has('login_error'))
                    <div style="height: 50px; width: 100%; color: #FFF; background-color: rgba(255,0,0,.6); line-height:50px; text-align: center">
                        {{ session()->get('login_error') }}
                    </div>
                @endif
                <div class="wrap-input100 validate-input" data-validate = "Enter username">
                    <input class="input100" type="text" name="username" placeholder="User name" required>
                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    <input class="input100" type="password" name="passwords" placeholder="Password" required>
                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                </div>

                <div class="container-login100-form-btn m-t-32">
                    <button class="login100-form-btn">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
