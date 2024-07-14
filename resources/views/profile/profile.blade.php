{{--@extends('layout.mian-dashbord')--}}

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .profile-card {
            margin-top: 20px;
        }
        .profile-sidebar {
            padding: 30px 0;
            background-color: #ffffff;
            border-right: 1px solid #e3e6f0;
            box-shadow: 0 0.15rem 1.75rem rgba(58, 59, 69, 0.15);
        }
        .profile-sidebar a {
            color: #333;
            padding: 10px;
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
        }
        .profile-sidebar a:hover {
            background-color: #f1f1f1;
            border-radius: 5px;
        }
        .profile-content {
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0.15rem 1.75rem rgba(58, 59, 69, 0.15);
        }
        .profile-img {
            border-radius: 50%;
            height: 120px;
            width: 120px;
            object-fit: cover;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        @foreach($data as $item)
        <nav class="col-md-3 profile-sidebar d-none d-md-block">
            <div class="text-center">
                <img src="https://via.placeholder.com/120" alt="Profile Picture" class="profile-img mb-3">
                <h4>{{$item->name}}</h4>
                <p class="text-muted">Administrator</p>
            </div>

        </nav>
        <!-- Main Content --> <div class="nav flex-column">
                <a href="#"><i class="bi bi-person-circle"></i> Profile</a>
                <a href="#"><i class="bi bi-gear-fill"></i> Settings</a>
                <a href="#"><i class="bi bi-bell-fill"></i> Notifications</a>
                <a href="{{route('logout')}}"><i class="bi bi-box-arrow-right"></i> Logout</a>
            </div>
        <main class="col-md-9 profile-content">
            <h2 class="mb-4">Admin Profile</h2>
            <div class="row">
                <!-- Profile Details -->
                <div class="col-md-6">
                    <p><strong>ID:</strong> {{$item->id}}</p>
                    <p><strong>Email:</strong> {{$item->email}}</p>
                    <p><strong>Phone:</strong> +1 234 567 890</p>
                    <p><strong>Address:</strong> 123 Admin St, City, Country</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Role:</strong> {{$item->type}}</p>
                    <p><strong>Joined:</strong> {{$item->created_at}}</p>
                    <p><strong>Status:</strong> {{$item->action}}</p>
                    <p><strong>Department:</strong> IT Department</p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{route('profile_info')}}" class="btn btn-primary me-2"><i class="bi bi-pencil-square"></i> Edit Profile</a>
{{--                <button {{route('profile_info')}} class="btn btn-primary me-2"><i class="bi bi-pencil-square"></i> Edit Profile</button>--}}
                <form action="{{route('logout')}}" method="post" style="display: inline">
                    @csrf
                    <button class="btn btn-danger" type="submit"><i class="bi bi-box-arrow-right"></i> Logout</button>
{{--                    <button class="btn " style="background-color: #6c3b3b; color: #ffffff" type="submit">log out</button>--}}
                </form>

            </div>
        </main>
            @endforeach
    </div>
</div>

<!-- Bootstrap JS and dependencies (Popper.js and jQuery) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>







{{--    <div class="user-details-container">--}}
{{--        @foreach($data as $item)--}}
{{--        <div class="user-details-item">--}}
{{--            <span class="user-details-label">ID:</span>--}}
{{--            <span class="user-details-value">{{$item->id}}</span>--}}
{{--        </div>--}}
{{--        <div class="user-details-item">--}}
{{--            <span class="user-details-label">Name:</span>--}}
{{--            <span class="user-details-value">{{$item->name}}</span>--}}
{{--        </div>--}}
{{--        <div class="user-details-item">--}}
{{--            <span class="user-details-label">Picture:</span>--}}
{{--            <img src="{{asset('storage/profiles/'.$item->picture)}}" width="20px" class="user-profile-picture">--}}
{{--        </div>--}}
{{--        <div class="user-details-item">--}}
{{--            <span class="user-details-label">Email:</span>--}}
{{--            <span class="user-details-value">{{$item->email}}</span>--}}
{{--        </div>--}}
{{--        <div class="user-details-item">--}}
{{--            <span class="user-details-label">Email Verified:</span>--}}
{{--            <span class="user-details-value">{{$item->email_verified_at}}</span>--}}
{{--        </div>--}}
{{--        <div class="user-details-item">--}}
{{--            <span class="user-details-label">Created At:</span>--}}
{{--            <span class="user-details-value">{{$item->created_at}}</span>--}}
{{--        </div>--}}
{{--        <div class="user-details-item">--}}
{{--            <span class="user-details-label">Updated At:</span>--}}
{{--            <span class="user-details-value">{{$item->updated_at}}</span>--}}
{{--        </div>--}}
{{--        @endforeach--}}
{{--        <div class="">--}}
{{--            <a href="{{route('profile_change')}}">edit</a>--}}
{{--        </div>--}}
{{--    </div>--}}

