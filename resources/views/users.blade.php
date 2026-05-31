@extends('layouts.main')

@section('title', 'Users Management')

@section('content')

<div style="
    min-height:100vh;
    background:#f4f7f6;
    font-family:'Segoe UI',sans-serif;
">

    <!-- NAVBAR -->
    <div style="
        height:72px;
        background:#0f6b43;
        display:flex;
        align-items:center;
        justify-content:space-between;
        padding:0 30px;
        box-shadow:0 2px 10px rgba(0,0,0,0.08);
    ">

        <!-- LEFT -->
        <div style="display:flex; align-items:center; gap:35px;">

            <!-- LOGO -->
            <div style="display:flex; align-items:center; gap:12px;">

                <div style="
                    width:42px;
                    height:42px;
                    border-radius:12px;
                    background:#22c55e;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    color:white;
                    font-size:20px;
                ">
                    <i class="bi bi-calendar-event"></i>
                </div>

                <div style="
                    color:white;
                    font-size:24px;
                    font-weight:700;
                ">
                    EventLister
                </div>

            </div>

            <!-- MENU -->
            <div style="display:flex; gap:12px;">

                <a href="{{ route('dashboard') }}" style="
                    text-decoration:none;
                    color:#d1fae5;
                    padding:10px 16px;
                    border-radius:10px;
                    display:flex;
                    align-items:center;
                    gap:8px;
                    font-weight:500;
                ">
                    <i class="bi bi-grid"></i>
                    Overview
                </a>

                <a href="{{ route('products') }}" style="
                    text-decoration:none;
                    color:#d1fae5;
                    padding:10px 16px;
                    border-radius:10px;
                    display:flex;
                    align-items:center;
                    gap:8px;
                    font-weight:500;
                ">
                    <i class="bi bi-calendar2-event"></i>
                    Events
                </a>

                <!-- ACTIVE -->
                <a href="{{ route('users') }}" style="
                    text-decoration:none;
                    color:white;
                    background:rgba(255,255,255,0.14);
                    padding:10px 16px;
                    border-radius:10px;
                    display:flex;
                    align-items:center;
                    gap:8px;
                    font-weight:600;
                ">
                    <i class="bi bi-people"></i>
                    Users
                </a>

                <a href="#" style="
                    text-decoration:none;
                    color:#d1fae5;
                    padding:10px 16px;
                    border-radius:10px;
                    display:flex;
                    align-items:center;
                    gap:8px;
                    font-weight:500;
                ">
                    <i class="bi bi-question-circle"></i>
                    FAQ
                </a>

                <a href="{{ route('profile') }}" style="
                    text-decoration:none;
                    color:#d1fae5;
                    padding:10px 16px;
                    border-radius:10px;
                    display:flex;
                    align-items:center;
                    gap:8px;
                    font-weight:500;
                ">
                    <i class="bi bi-gear"></i>
                    Settings
                </a>

            </div>

        </div>

        <!-- RIGHT -->
        <div style="display:flex; align-items:center; gap:16px;">

            <div style="
                width:42px;
                height:42px;
                border-radius:50%;
                background:rgba(255,255,255,0.15);
                display:flex;
                align-items:center;
                justify-content:center;
                color:white;
                cursor:pointer;
            ">
                <i class="bi bi-bell"></i>
            </div>

            @if($user && $user->profile_picture)

                <img src="{{ asset('uploads/' . $user->profile_picture) }}"
                     alt="Profile"
                     style="
                        width:42px;
                        height:42px;
                        border-radius:50%;
                        object-fit:cover;
                        border:2px solid rgba(255,255,255,0.2);
                     ">

            @else

                <div style="
                    width:42px;
                    height:42px;
                    border-radius:50%;
                    background:#22c55e;
                    display:flex;
                    align-items:center;
                    justify-content:center;
                    color:white;
                    font-weight:700;
                ">
                    {{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}
                </div>

            @endif

        </div>

    </div>

    <!-- MAIN -->
    <div style="padding:35px;">

        <!-- HEADER -->
        <div style="
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:28px;
        ">

            <div>

                <h1 style="
                    font-size:40px;
                    font-weight:700;
                    color:#1f2937;
                    margin:0;
                ">
                    User Management
                </h1>

                <p style="
                    margin-top:8px;
                    color:#6b7280;
                    font-size:17px;
                ">
                    Manage all registered users
                </p>

            </div>

            <!-- ADD BUTTON -->
            <button
                data-bs-toggle="modal"
                data-bs-target="#addUserModal"
                style="
                    background:#16a34a;
                    color:white;
                    border:none;
                    border-radius:12px;
                    padding:14px 22px;
                    font-weight:600;
                    display:flex;
                    align-items:center;
                    gap:10px;
                    box-shadow:0 4px 10px rgba(34,197,94,0.25);
                "
            >
                <i class="bi bi-plus-lg"></i>
                Add User
            </button>

        </div>

        <!-- TABLE -->
        <div style="
            background:white;
            border-radius:22px;
            overflow:hidden;
            box-shadow:0 2px 10px rgba(0,0,0,0.04);
        ">

            <table style="
                width:100%;
                border-collapse:collapse;
            ">

                <thead style="background:#f9fafb;">

                    <tr>

                        <th style="padding:18px; text-align:left;">ID</th>
                        <th style="padding:18px; text-align:left;">Name</th>
                        <th style="padding:18px; text-align:left;">Email</th>
                        <th style="padding:18px; text-align:left;">Created</th>
                        <th style="padding:18px; text-align:left;">Actions</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($users as $user)

                    <tr style="border-top:1px solid #f1f5f9;">

                        <td style="padding:18px;">
                            {{ $user->id }}
                        </td>

                        <td style="
                            padding:18px;
                            font-weight:600;
                            color:#111827;
                        ">
                            {{ $user->name }}
                        </td>

                        <td style="padding:18px;">
                            {{ $user->email }}
                        </td>

                        <td style="padding:18px;">
                            {{ $user->created_at->format('M d, Y') }}
                        </td>

                        <td style="padding:18px;">

                            <button
                                data-bs-toggle="modal"
                                data-bs-target="#editUserModal{{ $user->id }}"
                                style="
                                    border:none;
                                    background:#f3f4f6;
                                    color:#374151;
                                    padding:10px 18px;
                                    border-radius:12px;
                                    font-weight:600;
                                    margin-right:8px;
                                "
                            >
                                Edit
                            </button>

                            <form action="{{ route('users.delete', $user->id) }}"
                                  method="POST"
                                  style="display:inline;"
                                  onsubmit="return confirm('Delete this user?')">

                                @csrf

                                <button
                                    type="submit"
                                    style="
                                        border:none;
                                        background:#fee2e2;
                                        color:#dc2626;
                                        padding:10px 18px;
                                        border-radius:12px;
                                        font-weight:600;
                                    "
                                >
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                    <!-- EDIT USER MODAL -->
                    <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1">

                        <div class="modal-dialog">

                            <div class="modal-content" style="
                                border-radius:20px;
                                border:none;
                                overflow:hidden;
                            ">

                                <div class="modal-header" style="
                                    background:#0f6b43;
                                    color:white;
                                    border:none;
                                    padding:20px 24px;
                                ">

                                    <h5 class="modal-title">
                                        <i class="bi bi-pencil-square me-2"></i>
                                        Edit User
                                    </h5>

                                    <button type="button"
                                            class="btn-close btn-close-white"
                                            data-bs-dismiss="modal">
                                    </button>

                                </div>

                                <!-- FUNCTION NOT CHANGED -->
                                <form action="{{ route('users.update', $user->id) }}" method="POST">

                                    @csrf

                                    <div class="modal-body" style="padding:24px;">

                                        <div class="mb-3">

                                            <label class="form-label fw-semibold">
                                                Full Name
                                            </label>

                                            <!-- KEEP fullname -->
                                            <input type="text"
                                                   name="fullname"
                                                   class="form-control"
                                                   value="{{ $user->name }}"
                                                   required>

                                        </div>

                                        <div class="mb-3">

                                            <label class="form-label fw-semibold">
                                                Email
                                            </label>

                                            <input type="email"
                                                   name="email"
                                                   class="form-control"
                                                   value="{{ $user->email }}"
                                                   required>

                                        </div>

                                    </div>

                                    <div class="modal-footer" style="
                                        border:none;
                                        padding:20px 24px;
                                    ">

                                        <button type="button"
                                                class="btn btn-light"
                                                data-bs-dismiss="modal">
                                            Cancel
                                        </button>

                                        <button type="submit"
                                                class="btn"
                                                style="
                                                    background:#0f6b43;
                                                    color:white;
                                                ">
                                            Update User
                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- ADD USER MODAL -->
<div class="modal fade" id="addUserModal" tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content" style="
            border:none;
            border-radius:20px;
            overflow:hidden;
        ">

            <div class="modal-header" style="
                background:#0f6b43;
                color:white;
                border:none;
                padding:20px 24px;
            ">

                <h5 class="modal-title">
                    <i class="bi bi-plus-circle me-2"></i>
                    Add User
                </h5>

                <button type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <!-- FUNCTION NOT CHANGED -->
            <form action="/users" method="POST">

                @csrf

                <div class="modal-body" style="padding:24px;">

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Full Name
                        </label>

                        <!-- KEEP fullname -->
                        <input type="text"
                               name="fullname"
                               class="form-control"
                               required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Email
                        </label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               required>

                    </div>

                </div>

                <div class="modal-footer" style="
                    border:none;
                    padding:20px 24px;
                ">

                    <button type="button"
                            class="btn btn-light"
                            data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button type="submit"
                            class="btn"
                            style="
                                background:#16a34a;
                                color:white;
                            ">
                        Save User
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection