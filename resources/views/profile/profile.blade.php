<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .user-details-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: left;
            width: 400px;
        }
        .user-details-item {
            margin-bottom: 15px;
        }
        .user-details-label {
            font-weight: bold;
            color: #333;
        }
        .user-details-value {
            color: #666;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .user-details-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: left;
            width: 400px;
        }

        .user-details-item {
            margin-bottom: 15px;
        }

        .user-details-label {
            font-weight: bold;
            color: #333;
        }

        .user-details-value {
            color: #666;
        }

        .user-profile-picture {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }

    </style>
</head>

</html>
@extends('layout.mian-dashbord')
@section('content')
    <body>
    <div class="user-details-container">
        @foreach($data as $item)

        <div class="user-details-item">
            <span class="user-details-label">ID:</span>
            <span class="user-details-value">{{$item->id}}</span>
        </div>
        <div class="user-details-item">
            <span class="user-details-label">Name:</span>
            <span class="user-details-value">{{$item->name}}</span>
        </div>
        <div class="user-details-item">
            <span class="user-details-label">Picture:</span>
            <img src="{{asset('profiles/').$item->picture}}" width="20px" class="user-profile-picture">
        </div>
        <div class="user-details-item">
            <span class="user-details-label">Email:</span>
            <span class="user-details-value">{{$item->email}}</span>
        </div>
        <div class="user-details-item">
            <span class="user-details-label">Email Verified:</span>
            <span class="user-details-value">{{$item->email_verified_at}}</span>
        </div>
        <div class="user-details-item">
            <span class="user-details-label">Created At:</span>
            <span class="user-details-value">{{$item->created_at}}</span>
        </div>
        <div class="user-details-item">
            <span class="user-details-label">Updated At:</span>
            <span class="user-details-value">{{$item->updated_at}}</span>
        </div>
        @endforeach
        <div class="">
            <a href="{{route('profile_change')}}">edit</a>
        </div>
    </div>
    </body>
@endsection
