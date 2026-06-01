@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

@php
$userId = session('user_id');

$userCount = \App\Models\User::count();
$productCount = \App\Models\Product::count();

$myProducts = \App\Models\Product::where('user_id', $userId)->count();
$otherProducts = \App\Models\Product::where('user_id', '!=', $userId)->count();

$user = \App\Models\User::find($userId);
@endphp

<div style="min-height: 100vh; background: #f4fdf7; font-family: 'Segoe UI', sans-serif;">

    <nav style="
        background: #0f6b3d;
        height: 76px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 30px;
        color: white;
        box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    ">

        <div style="display: flex; align-items: center; gap: 40px;">

            <div style="display: flex; align-items: center; gap: 14px;">

                <div style="
                    width: 46px;
                    height: 46px;
                    border-radius: 14px;
                    background: #22c55e;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 22px;
                ">
                    <i class="bi bi-calendar-event"></i>
                </div>

                <h2 style="
                    margin: 0;
                    font-size: 20px;
                    font-weight: 700;
                    color: white;
                ">
                    EventLister
                </h2>

            </div>

            <div style="display: flex; align-items: center; gap: 10px;">

    <a href="{{ route('dashboard') }}"
       style="
        text-decoration: none;
        background: rgba(255,255,255,0.15);
        color: white;
        padding: 12px 18px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
       ">
        <i class="bi bi-grid"></i>
        Overview
    </a>

    <a href="{{ route('products') }}"
       style="
        text-decoration: none;
        color: white;
        padding: 12px 18px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
        transition: .3s;
       ">
        <i class="bi bi-calendar2-event"></i>
        Events
    </a>

                <a href="{{ route('users') }}"
                   style="
                    text-decoration: none;
                    color: white;
                    padding: 12px 18px;
                    border-radius: 12px;
                    display: flex;
                    align-items: center;
                    gap: 8px;
                    font-weight: 600;
                   ">
                    <i class="bi bi-people"></i>
                    Users
                </a>

                <a href="#"
                   style="
                    text-decoration: none;
                    color: white;
                    padding: 12px 18px;
                    border-radius: 12px;
                    display: flex;
                    align-items: center;
                    gap: 8px;
                    font-weight: 600;
                   ">
                    <i class="bi bi-question-circle"></i>
                    FAQ
                </a>

                <a href="{{ route('profile') }}"
                   style="
                    text-decoration: none;
                    color: white;
                    padding: 12px 18px;
                    border-radius: 12px;
                    display: flex;
                    align-items: center;
                    gap: 8px;
                    font-weight: 600;
                   ">
                    <i class="bi bi-gear"></i>
                    Settings
                </a>

            </div>

        </div>

<div style="display: flex; align-items: center; gap: 18px;">

    <div style="
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: rgba(255,255,255,0.12);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    ">
        <i class="bi bi-bell" style="font-size: 18px;"></i>
    </div>

<a href="{{ route('logout') }}"
   style="
    text-decoration:none;
    color:white;
    padding:12px 18px;
    border-radius:12px;
    display:flex;
    align-items:center;
    gap:8px;
    font-weight:600;
    background:#dc2626;
   ">
    <i class="bi bi-box-arrow-right"></i>
    Logout
</a>

    @if($user && $user->profile_picture)

        <img src="{{ asset('uploads/' . $user->profile_picture) }}"
             alt="Profile"
             style="
                width: 50px;
                height: 50px;
                border-radius: 50%;
                object-fit: cover;
                border: 2px solid rgba(255,255,255,0.2);
             ">

    @else

        <div style="
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #22c55e;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 18px;
            color: white;
        ">
            {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
        </div>

    @endif

</div>  

    </nav>

    <div style="padding: 35px;">

        <div style="margin-bottom: 30px;">

            <h1 style="
                margin: 0;
                color: #166534;
                font-size: 34px;
                font-weight: 700;
            ">
                Welcome {{ $user->name ?? 'User' }} 👋
            </h1>

            <p style="
                margin-top: 8px;
                color: #64748b;
                font-size: 15px;
            ">
                Here's your dashboard overview.
            </p>

        </div>

        <div style="
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        ">

            <div style="
                background: white;
                border-radius: 20px;
                padding: 25px;
                border: 1px solid #dcfce7;
                box-shadow: 0 2px 12px rgba(0,0,0,0.04);
            ">

                <div style="
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                ">

                    <div>
                        <p style="margin:0; color:#64748b;">Total Users</p>

                        <h2 style="
                            margin-top: 10px;
                            font-size: 34px;
                            color: #166534;
                        ">
                            {{ $userCount }}
                        </h2>
                    </div>

                    <div style="
                        width: 58px;
                        height: 58px;
                        border-radius: 16px;
                        background: #dcfce7;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        color:#16a34a;
                        font-size:24px;
                    ">
                        <i class="bi bi-people-fill"></i>
                    </div>

                </div>

            </div>

            <div style="
                background: white;
                border-radius: 20px;
                padding: 25px;
                border: 1px solid #dcfce7;
                box-shadow: 0 2px 12px rgba(0,0,0,0.04);
            ">

                <div style="
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                ">

                    <div>
                        <p style="margin:0; color:#64748b;">Total Products</p>

                        <h2 style="
                            margin-top: 10px;
                            font-size: 34px;
                            color: #166534;
                        ">
                            {{ $productCount }}
                        </h2>
                    </div>

                    <div style="
                        width: 58px;
                        height: 58px;
                        border-radius: 16px;
                        background: #dcfce7;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        color:#16a34a;
                        font-size:24px;
                    ">
                        <i class="bi bi-box-seam"></i>
                    </div>

                </div>

            </div>

            <div style="
                background: white;
                border-radius: 20px;
                padding: 25px;
                border: 1px solid #dcfce7;
                box-shadow: 0 2px 12px rgba(0,0,0,0.04);
            ">

                <div style="
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                ">

                    <div>
                        <p style="margin:0; color:#64748b;">My Products</p>

                        <h2 style="
                            margin-top: 10px;
                            font-size: 34px;
                            color: #166534;
                        ">
                            {{ $myProducts }}
                        </h2>
                    </div>

                    <div style="
                        width: 58px;
                        height: 58px;
                        border-radius: 16px;
                        background: #dcfce7;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        color:#16a34a;
                        font-size:24px;
                    ">
                        <i class="bi bi-bag-check-fill"></i>
                    </div>

                </div>

            </div>

            <div style="
                background: white;
                border-radius: 20px;
                padding: 25px;
                border: 1px solid #dcfce7;
                box-shadow: 0 2px 12px rgba(0,0,0,0.04);
            ">

                <div style="
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                ">

                    <div>
                        <p style="margin:0; color:#64748b;">Other Products</p>

                        <h2 style="
                            margin-top: 10px;
                            font-size: 34px;
                            color: #166534;
                        ">
                            {{ $otherProducts }}
                        </h2>
                    </div>

                    <div style="
                        width: 58px;
                        height: 58px;
                        border-radius: 16px;
                        background: #dcfce7;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        color:#16a34a;
                        font-size:24px;
                    ">
                        <i class="bi bi-box-fill"></i>
                    </div>

                </div>

            </div>

        </div>

        <div style="
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 25px;
        ">

            <div style="
                background: white;
                border-radius: 22px;
                padding: 30px;
                border: 1px solid #dcfce7;
            ">

                <h2 style="margin-top:0; color:#166534;">
                    Dashboard Overview
                </h2>

                <div style="margin-top:25px;">

                    <div style="margin-bottom: 25px;">

                        <div style="
                            display:flex;
                            justify-content:space-between;
                            margin-bottom:10px;
                        ">
                            <span style="font-weight:600;">Users Activity</span>
                            <span style="color:#16a34a;">75%</span>
                        </div>

                        <div style="
                            height:12px;
                            background:#dcfce7;
                            border-radius:999px;
                            overflow:hidden;
                        ">
                            <div style="
                                width:75%;
                                height:100%;
                                background:linear-gradient(90deg,#16a34a,#22c55e);
                            "></div>
                        </div>

                    </div>

                    <div>

                        <div style="
                            display:flex;
                            justify-content:space-between;
                            margin-bottom:10px;
                        ">
                            <span style="font-weight:600;">Products Progress</span>
                            <span style="color:#16a34a;">60%</span>
                        </div>

                        <div style="
                            height:12px;
                            background:#dcfce7;
                            border-radius:999px;
                            overflow:hidden;
                        ">
                            <div style="
                                width:60%;
                                height:100%;
                                background:linear-gradient(90deg,#16a34a,#22c55e);
                            "></div>
                        </div>

                    </div>

                </div>

            </div>

            <div style="
                background: white;
                border-radius: 22px;
                padding: 30px;
                border: 1px solid #dcfce7;
            ">

                <h2 style="margin-top:0; color:#166534;">
                    Quick Actions
                </h2>

                <div style="
                    margin-top:25px;
                    display:flex;
                    flex-direction:column;
                    gap:15px;
                ">

                    <a href="{{ route('products') }}"
                       style="
                        text-decoration:none;
                        background:#f0fdf4;
                        padding:16px;
                        border-radius:14px;
                        color:#166534;
                        font-weight:600;
                        display:flex;
                        align-items:center;
                        gap:10px;
                       ">
                        <i class="bi bi-box-seam"></i>
                        View Products
                    </a>

                    <a href="{{ route('users') }}"
                       style="
                        text-decoration:none;
                        background:#f0fdf4;
                        padding:16px;
                        border-radius:14px;
                        color:#166534;
                        font-weight:600;
                        display:flex;
                        align-items:center;
                        gap:10px;
                       ">
                        <i class="bi bi-people-fill"></i>
                        Manage Users
                    </a>

                    <a href="{{ route('profile') }}"
                       style="
                        text-decoration:none;
                        background:#f0fdf4;
                        padding:16px;
                        border-radius:14px;
                        color:#166534;
                        font-weight:600;
                        display:flex;
                        align-items:center;
                        gap:10px;
                       ">
                        <i class="bi bi-gear-fill"></i>
                        Account Settings
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection