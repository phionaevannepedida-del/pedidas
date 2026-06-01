@extends('layouts.main')

@section('title', 'Login - EventLister')

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

    .login-wrapper{
        min-height:100vh;
        background:#f4fdf7;
        display:flex;
        align-items:center;
        justify-content:center;
        padding:30px;
    }

    .login-card{
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

    .login-title{
        text-align:center;
        font-size:32px;
        font-weight:700;
        color:#166534;
        margin-bottom:8px;
    }

    .login-subtitle{
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

    .login-input{
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

    .login-input:focus{
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

    .login-row{
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:25px;
        font-size:14px;
    }

    .remember-box{
        display:flex;
        align-items:center;
        gap:8px;
        color:#475569;
    }

    .forgot-link{
        text-decoration:none;
        color:#16a34a;
        font-weight:600;
    }

    .login-btn{
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
        margin-bottom:25px;
    }

    .login-btn:hover{
        background:#15803d;
    }

    .register-text{
        text-align:center;
        color:#64748b;
        font-size:14px;
    }

    .register-text a{
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

<div class="login-wrapper">

    <div class="login-card">

        <div class="logo-box">
            <i class="bi bi-calendar-event"></i>
        </div>

        <h1 class="login-title">
            EventLister
        </h1>

        <p class="login-subtitle">
            Sign in to continue to your dashboard
        </p>

        @if ($errors->any())

            <div class="alert-error">

                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach

            </div>

        @endif

        <form action="/login" method="POST">

            @csrf

            <div class="input-group">

                <i class="bi bi-envelope"></i>

                <input type="email"
                       name="email"
                       class="login-input"
                       placeholder="Email Address"
                       value="{{ old('email') }}"
                       required>

            </div>

            <div class="input-group">

                <i class="bi bi-lock"></i>

                <input type="password"
                       name="password"
                       id="password"
                       class="login-input"
                       placeholder="Password"
                       required>

                <span class="toggle-password"
                      onclick="togglePassword()">

                    <i class="bi bi-eye-slash"
                       id="toggleIcon"></i>

                </span>

            </div>

            <div class="login-row">

                <label class="remember-box">

                    <input type="checkbox" name="remember">

                    Remember Me

                </label>

                <a href="#" class="forgot-link">
                    Forgot Password?
                </a>

            </div>

            <button type="submit" class="login-btn">
                Sign In
            </button>

            <p class="register-text">

                Don't have an account?

                <a href="{{ route('register') }}">
                    Register Here
                </a>

            </p>

        </form>

    </div>

</div>

<script>

function togglePassword(){

    let password = document.getElementById('password');
    let icon = document.getElementById('toggleIcon');

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