@extends('layouts.main')

@section('title', 'Profile Settings')

@section('content')

<div style="
    min-height:100vh;
    background:#f5f7f9;
    font-family:'Segoe UI',sans-serif;
">

 <!-- NAVBAR -->
<div style="
    height:76px;
    background:#0f6b3d;
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:0 30px;
    box-shadow:0 2px 10px rgba(0,0,0,0.08);
">

    <!-- LEFT -->
    <div style="display:flex; align-items:center; gap:40px;">

        <!-- LOGO -->
        <div style="display:flex; align-items:center; gap:14px;">

            <div style="
                width:46px;
                height:46px;
                border-radius:14px;
                background:#22c55e;
                display:flex;
                align-items:center;
                justify-content:center;
                color:white;
                font-size:22px;
            ">
                <i class="bi bi-calendar-event"></i>
            </div>

            <h2 style="
                margin:0;
                font-size:20px;
                font-weight:700;
                color:white;
            ">
                EventLister
            </h2>

        </div>

        <!-- MENU -->
        <div style="display:flex; align-items:center; gap:10px;">

            <!-- OVERVIEW -->
            <a href="{{ route('dashboard') }}"
               style="
                text-decoration:none;
                color:white;
                padding:12px 18px;
                border-radius:12px;
                display:flex;
                align-items:center;
                gap:8px;
                font-weight:600;
                transition:.3s;
               ">
                <i class="bi bi-grid"></i>
                Overview
            </a>

        <a href="{{ route('products') }}"
   style="
    text-decoration:none;
    color:white;
    padding:12px 18px;
    border-radius:12px;
    display:flex;
    align-items:center;
    gap:8px;
    font-weight:600;
    transition:.3s;
    background: {{ request()->routeIs('products') ? 'rgba(255,255,255,0.15)' : 'transparent' }};
   ">
    <i class="bi bi-calendar2-event"></i>
    Events
</a>

            <!-- USERS -->
            <a href="{{ route('users') }}"
               style="
                text-decoration:none;
                color:white;
                padding:12px 18px;
                border-radius:12px;
                display:flex;
                align-items:center;
                gap:8px;
                font-weight:600;
                transition:.3s;
               ">
                <i class="bi bi-people"></i>
                Users
            </a>

            <!-- FAQ -->
            <a href="#"
               style="
                text-decoration:none;
                color:white;
                padding:12px 18px;
                border-radius:12px;
                display:flex;
                align-items:center;
                gap:8px;
                font-weight:600;
                transition:.3s;
               ">
                <i class="bi bi-question-circle"></i>
                FAQ
            </a>
<a href="{{ route('profile') }}"
   style="
    text-decoration:none;
    color:white;
    padding:12px 18px;
    border-radius:12px;
    display:flex;
    align-items:center;
    gap:8px;
    font-weight:600;
    transition:.3s;
    background: {{ request()->routeIs('profile') ? 'rgba(255,255,255,0.15)' : 'transparent' }};
   ">
    <i class="bi bi-gear"></i>
    Settings
</a>

        </div>

    </div>

    <!-- RIGHT -->
    <div style="display:flex; align-items:center; gap:18px;">

        <!-- NOTIFICATION -->
        <div style="
            width:50px;
            height:50px;
            border-radius:50%;
            background:rgba(255,255,255,0.12);
            display:flex;
            align-items:center;
            justify-content:center;
            cursor:pointer;
            color:white;
        ">
            <i class="bi bi-bell" style="font-size:18px;"></i>
        </div>

        <!-- PROFILE -->
        @if($user && $user->profile_picture)

            <img src="{{ asset('uploads/' . $user->profile_picture) }}"
                 alt="Profile"
                 style="
                    width:50px;
                    height:50px;
                    border-radius:50%;
                    object-fit:cover;
                    border:2px solid rgba(255,255,255,0.2);
                 ">

        @else

            <div style="
                width:50px;
                height:50px;
                border-radius:50%;
                background:#22c55e;
                display:flex;
                align-items:center;
                justify-content:center;
                font-weight:700;
                font-size:18px;
                color:white;
            ">
                {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
            </div>

        @endif

    </div>

</div>
    <!-- CONTENT -->
    <div style="
        padding:40px;
        display:flex;
        justify-content:center;
    ">

        <div style="
            width:100%;
            max-width:800px;
            background:white;
            border-radius:24px;
            padding:35px;
            box-shadow:0 2px 10px rgba(0,0,0,0.04);
        ">

            @php
                $user = \App\Models\User::find(session('user_id'));
            @endphp

            <div style="text-align:center; margin-bottom:35px;">

                @if($user->profile_picture)

                    <img src="{{ asset('uploads/' . $user->profile_picture) }}"
                         style="
                            width:120px;
                            height:120px;
                            border-radius:50%;
                            object-fit:cover;
                            border:5px solid #dcfce7;
                         ">

                @else

                    <div style="
                        width:120px;
                        height:120px;
                        border-radius:50%;
                        background:#16a34a;
                        margin:auto;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        color:white;
                        font-size:42px;
                        font-weight:700;
                    ">
                        {{ strtoupper(substr($user->name,0,1)) }}
                    </div>

                @endif

                <h2 style="
                    margin-top:18px;
                    color:#111827;
                    font-size:30px;
                    font-weight:700;
                ">
                    {{ $user->name }}
                </h2>

                <p style="
                    color:#6b7280;
                    margin-top:6px;
                ">
                    {{ $user->email }}
                </p>

            </div>

            <!-- UPDATE INFO -->
            <form action="/profile/update" method="POST">

                @csrf

                <div style="margin-bottom:20px;">

                    <label style="
                        display:block;
                        margin-bottom:8px;
                        font-weight:600;
                        color:#374151;
                    ">
                        Full Name
                    </label>

                    <input type="text"
                           name="name"
                           value="{{ $user->name }}"
                           required
                           style="
                            width:100%;
                            padding:14px;
                            border:1px solid #d1d5db;
                            border-radius:12px;
                            outline:none;
                           ">

                </div>

                <div style="margin-bottom:20px;">

                    <label style="
                        display:block;
                        margin-bottom:8px;
                        font-weight:600;
                        color:#374151;
                    ">
                        Email
                    </label>

                    <input type="email"
                           name="email"
                           value="{{ $user->email }}"
                           required
                           style="
                            width:100%;
                            padding:14px;
                            border:1px solid #d1d5db;
                            border-radius:12px;
                            outline:none;
                           ">

                </div>

                <button type="submit"
                        style="
                            border:none;
                            background:#16a34a;
                            color:white;
                            padding:14px 22px;
                            border-radius:12px;
                            font-weight:600;
                        ">
                    Update Information
                </button>

            </form>

            <hr style="margin:35px 0;">

            <!-- PROFILE PICTURE -->
            <form action="/profile/picture"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div style="margin-bottom:20px;">

                    <label style="
                        display:block;
                        margin-bottom:8px;
                        font-weight:600;
                        color:#374151;
                    ">
                        Upload Profile Picture
                    </label>

                    <input type="file"
                           name="profile_picture"
                           required
                           style="
                            width:100%;
                            padding:14px;
                            border:1px solid #d1d5db;
                            border-radius:12px;
                           ">

                </div>

                <button type="submit"
                        style="
                            border:none;
                            background:#2563eb;
                            color:white;
                            padding:14px 22px;
                            border-radius:12px;
                            font-weight:600;
                        ">
                    Upload Picture
                </button>

            </form>

        </div>

    </div>

</div>

@endsection