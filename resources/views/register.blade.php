@extends('layouts.main')

@section('title', 'Register - EventLister')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Segoe+UI:wght@400;500;600;700&display=swap');

    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }

    body{
        font-family:'Segoe UI',sans-serif;
    }

    .register-wrapper{
        min-height:100vh;
        background:#f4fdf7;
        display:flex;
        align-items:center;
        justify-content:center;
        padding:30px;
    }

    .register-card{
        width:100%;
        max-width:430px;
        background:white;
        border-radius:28px;
        padding:40px;
        border:1px solid #dcfce7;
        box-shadow:0 8px 30px rgba(0,0,0,0.05);
    }

    .logo-box{
        width:70px;
        height:70px;
        border-radius:20px;
        background:#22c55e;
        display:flex;
        align-items:center;
        justify-content:center;
        margin:0 auto 20px;
        color:white;
        font-size:30px;
    }

    .register-title{
        text-align:center;
        font-size:32px;
        font-weight:700;
        color:#166534;
        margin-bottom:8px;
    }

    .register-subtitle{
        text-align:center;
        color:#64748b;
        font-size:14px;
        margin-bottom:35px;
    }

    .input-group{
        margin-bottom:20px;
        position:relative;
    }

    .input-group i{
        position:absolute;
        left:16px;
        top:50%;
        transform:translateY(-50%);
        color:#94a3b8;
        font-size:16px;
    }

    .register-input{
        width:100%;
        height:55px;
        border-radius:16px;
        border:1px solid #dcfce7;
        padding:0 45px;
        font-size:14px;
        outline:none;
        background:#f8fafc;
        transition:.3s;
    }

    .register-input:focus{
        border-color:#22c55e;
        background:white;
    }

    .toggle-password{
        position:absolute;
        right:16px;
        top:50%;
        transform:translateY(-50%);
        cursor:pointer;
        color:#94a3b8;
    }

    .register-btn{
        width:100%;
        height:55px;
        border:none;
        border-radius:16px;
        background:#16a34a;
        color:white;
        font-size:15px;
        font-weight:700;
        cursor:pointer;
        transition:.3s;
        margin-top:10px;
        margin-bottom:25px;
    }

    .register-btn:hover{
        background:#15803d;
    }

    .login-text{
        text-align:center;
        color:#64748b;
        font-size:14px;
    }

    .login-text a{
        text-decoration:none;
        color:#16a34a;
        font-weight:700;
    }

    .alert-error{
        background:#fef2f2;
        border:1px solid #fecaca;
        color:#dc2626;
        padding:14px;
        border-radius:14px;
        margin-bottom:20px;
        font-size:14px;
    }
</style>

<div class="register-wrapper">

    <div class="register-card">

        <!-- LOGO -->
        <div class="logo-box">
            <i class="bi bi-person-plus-fill"></i>
        </div>

        <!-- TITLE -->
        <h1 class="register-title">
            Create Account
        </h1>

        <p class="register-subtitle">
            Register your account to continue to EventLister
        </p>

        <!-- ERRORS -->
        @if ($errors->any())

            <div class="alert-error">

                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach

            </div>

        @endif

        <!-- FORM -->
        <form action="/register" method="POST">

            @csrf

            <!-- FULL NAME -->
            <div class="input-group">

                <i class="bi bi-person"></i>

                <input type="text"
                       name="fullname"
                       class="register-input"
                       placeholder="Full Name"
                       value="{{ old('fullname') }}"
                       required>

            </div>

            <!-- EMAIL -->
            <div class="input-group">

                <i class="bi bi-envelope"></i>

                <input type="email"
                       name="email"
                       class="register-input"
                       placeholder="Email Address"
                       value="{{ old('email') }}"
                       required>

            </div>

            <!-- PASSWORD -->
            <div class="input-group">

                <i class="bi bi-lock"></i>

                <input type="password"
                       name="password"
                       id="password"
                       class="register-input"
                       placeholder="Password"
                       required>

                <span class="toggle-password"
                      onclick="togglePassword('password','toggleIcon1')">

                    <i class="bi bi-eye-slash"
                       id="toggleIcon1"></i>

                </span>

            </div>

            <!-- CONFIRM PASSWORD -->
            <div class="input-group">

                <i class="bi bi-lock-fill"></i>

                <input type="password"
                       name="confirmpassword"
                       id="confirmpassword"
                       class="register-input"
                       placeholder="Confirm Password"
                       required>

                <span class="toggle-password"
                      onclick="togglePassword('confirmpassword','toggleIcon2')">

                    <i class="bi bi-eye-slash"
                       id="toggleIcon2"></i>

                </span>

            </div>

            <!-- BUTTON -->
            <button type="submit" class="register-btn">
                Create Account
            </button>

            <!-- LOGIN -->
            <p class="login-text">

                Already have an account?

                <a href="{{ route('login') }}">
                    Login Here
                </a>

            </p>

        </form>

    </div>

</div>

<script>

function togglePassword(inputId, iconId){

    let password = document.getElementById(inputId);
    let icon = document.getElementById(iconId);

    if(password.type === 'password'){

        password.type = 'text';
        icon.className = 'bi bi-eye';

    }else{

        password.type = 'password';
        icon.className = 'bi bi-eye-slash';

    }

}

</script>

@endsection