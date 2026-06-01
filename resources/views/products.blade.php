
@extends('layouts.main')

@section('title', 'Event List')

@section('content')

<div style="
    min-height:100vh;
    background:#f4f7f6;
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

    <div style="display:flex; align-items:center; gap:40px;">

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

        <div style="display:flex; align-items:center; gap:10px;">

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
                background:rgba(255,255,255,0.15);
                color:white;
                padding:12px 18px;
                border-radius:12px;
                display:flex;
                align-items:center;
                gap:8px;
                font-weight:600;
               ">
                <i class="bi bi-calendar2-event"></i>
                Events
            </a>

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
               ">
                <i class="bi bi-gear"></i>
                Settings
            </a>

        </div>

    </div>

    <div style="display:flex; align-items:center; gap:18px;">

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

    <div style="padding:35px;">

        <div style="margin-bottom:28px;">

            <h1 style="
                font-size:40px;
                font-weight:700;
                color:#1f2937;
                margin:0;
            ">
                Event list
            </h1>

            <p style="
                margin-top:8px;
                color:#6b7280;
                font-size:17px;
            ">
                Manage and track all your scheduled events
            </p>

        </div>

        <div style="
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
            gap:20px;
            margin-bottom:30px;
        ">

            <div style="
                background:white;
                border-radius:18px;
                padding:24px;
                box-shadow:0 2px 10px rgba(0,0,0,0.04);
            ">

                <div style="
                    font-size:42px;
                    font-weight:700;
                    color:#111827;
                ">
                    {{ $products->count() }}
                </div>

                <div style="
                    margin-top:8px;
                    display:flex;
                    align-items:center;
                    gap:8px;
                    color:#6b7280;
                    font-size:18px;
                ">
                    <div style="
                        width:10px;
                        height:10px;
                        background:#16a34a;
                        border-radius:50%;
                    "></div>

                    Total events
                </div>

            </div>

            <div style="
                background:white;
                border-radius:18px;
                padding:24px;
                box-shadow:0 2px 10px rgba(0,0,0,0.04);
            ">

                <div style="
                    font-size:42px;
                    font-weight:700;
                    color:#111827;
                ">
                    {{ $products->where('status','Upcoming')->count() }}
                </div>

                <div style="
                    margin-top:8px;
                    display:flex;
                    align-items:center;
                    gap:8px;
                    color:#6b7280;
                    font-size:18px;
                ">
                    <div style="
                        width:10px;
                        height:10px;
                        background:#16a34a;
                        border-radius:50%;
                    "></div>

                    Upcoming
                </div>

            </div>

            <div style="
                background:white;
                border-radius:18px;
                padding:24px;
                box-shadow:0 2px 10px rgba(0,0,0,0.04);
            ">

                <div style="
                    font-size:42px;
                    font-weight:700;
                    color:#111827;
                ">
                    {{ $products->where('status','Registration Open')->count() }}
                </div>

                <div style="
                    margin-top:8px;
                    display:flex;
                    align-items:center;
                    gap:8px;
                    color:#6b7280;
                    font-size:18px;
                ">
                    <div style="
                        width:10px;
                        height:10px;
                        background:#d97706;
                        border-radius:50%;
                    "></div>

                    Registration open
                </div>

            </div>

            <div style="
                background:white;
                border-radius:18px;
                padding:24px;
                box-shadow:0 2px 10px rgba(0,0,0,0.04);
            ">

                <div style="
                    font-size:42px;
                    font-weight:700;
                    color:#111827;
                ">
                    {{ $products->where('status','Ongoing')->count() }}
                </div>

                <div style="
                    margin-top:8px;
                    display:flex;
                    align-items:center;
                    gap:8px;
                    color:#6b7280;
                    font-size:18px;
                ">
                    <div style="
                        width:10px;
                        height:10px;
                        background:#2563eb;
                        border-radius:50%;
                    "></div>

                    Ongoing
                </div>

            </div>

        </div>

        <div style="
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:28px;
            gap:20px;
        ">

            <button
                data-bs-toggle="modal"
                data-bs-target="#addEventModal"
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
                Create Event
            </button>

            <div style="
                width:330px;
                position:relative;
            ">

                <input type="text"
                    placeholder="Search events..."
                    style="
                        width:100%;
                        border:none;
                        outline:none;
                        background:#1f2937;
                        color:white;
                        border-radius:14px;
                        padding:14px 18px 14px 48px;
                        font-size:15px;
                    "
                >

                <i class="bi bi-search" style="
                    position:absolute;
                    left:18px;
                    top:50%;
                    transform:translateY(-50%);
                    color:#d1d5db;
                    font-size:18px;
                "></i>

            </div>

        </div>

        <div style="
            display:flex;
            flex-direction:column;
            gap:20px;
        ">

            @foreach($products as $product)

            @php

                $date = $product->event_date
                    ? \Carbon\Carbon::parse($product->event_date)
                    : null;

                $status = $product->status ?? 'Upcoming';

                $badgeStyle = match($status) {
                    'Upcoming' => 'background:#dcfce7;color:#166534;',
                    'Registration Open' => 'background:#fef3c7;color:#92400e;',
                    'Ongoing' => 'background:#dbeafe;color:#1d4ed8;',
                    'Completed' => 'background:#e5e7eb;color:#374151;',
                    'Cancelled' => 'background:#fee2e2;color:#991b1b;',
                    default => 'background:#dcfce7;color:#166534;',
                };

            @endphp

            <div style="
                background:white;
                border-radius:22px;
                padding:24px;
                display:flex;
                justify-content:space-between;
                align-items:center;
                gap:20px;
                box-shadow:0 2px 10px rgba(0,0,0,0.04);
            ">

                <div style="
                    display:flex;
                    align-items:center;
                    gap:22px;
                ">

                    <div style="
                        width:95px;
                        min-width:95px;
                        height:120px;
                        background:#f9fafb;
                        border:1px solid #e5e7eb;
                        border-radius:18px;
                        display:flex;
                        flex-direction:column;
                        align-items:center;
                        justify-content:center;
                    ">

                        <div style="
                            font-size:18px;
                            font-weight:600;
                            color:#6b7280;
                            text-transform:uppercase;
                        ">
                            {{ $date ? $date->format('M') : '---' }}
                        </div>

                        <div style="
                            font-size:44px;
                            font-weight:700;
                            color:#111827;
                            line-height:1;
                        ">
                            {{ $date ? $date->format('d') : '--' }}
                        </div>

                        <div style="
                            margin-top:4px;
                            color:#6b7280;
                            font-size:16px;
                        ">
                            {{ $date ? $date->format('Y') : '' }}
                        </div>

                    </div>

                    <div style="
                        width:72px;
                        height:72px;
                        border-radius:18px;
                        background:#dff7ea;
                        display:flex;
                        align-items:center;
                        justify-content:center;
                        color:#0f9f58;
                        font-size:28px;
                    ">
                        <i class="bi bi-laptop"></i>
                    </div>

                    <div>

                        <h3 style="
                            margin:0;
                            font-size:30px;
                            font-weight:700;
                            color:#111827;
                        ">
                            {{ $product->product_name }}
                        </h3>

                        <p style="
                            margin-top:8px;
                            margin-bottom:10px;
                            color:#6b7280;
                            font-size:17px;
                            line-height:1.6;
                            max-width:700px;
                        ">
                            {{ $product->description }}
                        </p>

                        <div style="
                            display:flex;
                            align-items:center;
                            gap:8px;
                            color:#4b5563;
                            font-size:16px;
                        ">
                            <i class="bi bi-geo-alt"></i>
                            {{ $product->place ?? 'No location' }}
                        </div>

                    </div>

                </div>

                <div style="
                    display:flex;
                    flex-direction:column;
                    align-items:flex-end;
                    gap:18px;
                ">

                    <div style="
                        padding:8px 16px;
                        border-radius:999px;
                        font-size:14px;
                        font-weight:600;
                        {{ $badgeStyle }}
                    ">
                        {{ $status }}
                    </div>

                    <div style="display:flex; gap:10px;">

                        <button
                            data-bs-toggle="modal"
                            data-bs-target="#editEvent{{ $product->id }}"
                            style="
                                border:none;
                                background:#f3f4f6;
                                color:#374151;
                                padding:10px 18px;
                                border-radius:12px;
                                font-weight:600;
                            "
                        >
                            Edit
                        </button>

                        <form action="/products/delete/{{ $product->id }}" method="POST">
                            @csrf

                            <button
                                type="submit"
                                onclick="return confirm('Delete this event?')"
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

                    </div>

                </div>

            </div>

            <div class="modal fade" id="editEvent{{ $product->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content" style="border-radius:20px; border:none; overflow:hidden;">

                        <div class="modal-header" style="
                            background:#0f6b43;
                            color:white;
                            border:none;
                            padding:20px 24px;
                        ">
                            <h5 class="modal-title">
                                <i class="bi bi-pencil-square me-2"></i>
                                Edit Event
                            </h5>

                            <button type="button"
                                class="btn-close btn-close-white"
                                data-bs-dismiss="modal">
                            </button>
                        </div>

                        <form action="/products/update/{{ $product->id }}" method="POST">
                            @csrf

                            <div class="modal-body" style="padding:24px;">

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Event Name</label>

                                    <input type="text"
                                        name="product_name"
                                        class="form-control"
                                        value="{{ $product->product_name }}"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Description</label>

                                    <textarea
                                        name="description"
                                        class="form-control"
                                        rows="3">{{ $product->description }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Place</label>

                                    <input type="text"
                                        name="place"
                                        class="form-control"
                                        value="{{ $product->place }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Event Date</label>

                                    <input type="date"
                                        name="event_date"
                                        class="form-control"
                                        value="{{ $product->event_date ? \Carbon\Carbon::parse($product->event_date)->format('Y-m-d') : '' }}">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Status</label>

                                    <select name="status" class="form-select">

                                        <option value="Upcoming" {{ ($product->status ?? '') == 'Upcoming' ? 'selected' : '' }}>
                                            Upcoming
                                        </option>

                                        <option value="Registration Open" {{ ($product->status ?? '') == 'Registration Open' ? 'selected' : '' }}>
                                            Registration Open
                                        </option>

                                        <option value="Ongoing" {{ ($product->status ?? '') == 'Ongoing' ? 'selected' : '' }}>
                                            Ongoing
                                        </option>

                                        <option value="Completed" {{ ($product->status ?? '') == 'Completed' ? 'selected' : '' }}>
                                            Completed
                                        </option>

                                        <option value="Cancelled" {{ ($product->status ?? '') == 'Cancelled' ? 'selected' : '' }}>
                                            Cancelled
                                        </option>

                                    </select>
                                </div>

                            </div>

                            <div class="modal-footer" style="border:none; padding:20px 24px;">

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
                                    Update Event
                                </button>

                            </div>

                        </form>

                    </div>
                </div>
            </div>

            @endforeach

        </div>

    </div>

</div>

<div class="modal fade" id="addEventModal" tabindex="-1">

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
                    Create Event
                </h5>

                <button type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal">
                </button>

            </div>

            <form action="/products" method="POST">
                @csrf

                <div class="modal-body" style="padding:24px;">

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Event Name
                        </label>

                        <input type="text"
                            name="product_name"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Description
                        </label>

                        <textarea
                            name="description"
                            class="form-control"
                            rows="3"></textarea>

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Place
                        </label>

                        <input type="text"
                            name="place"
                            class="form-control">

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Event Date
                        </label>

                        <input type="date"
                            name="event_date"
                            class="form-control">

                    </div>

                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Status
                        </label>

                        <select name="status" class="form-select">

                            <option value="Upcoming">Upcoming</option>
                            <option value="Registration Open">Registration Open</option>
                            <option value="Ongoing">Ongoing</option>
                            <option value="Completed">Completed</option>
                            <option value="Cancelled">Cancelled</option>

                        </select>

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
                        Save Event
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection

