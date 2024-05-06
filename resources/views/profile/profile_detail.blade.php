@extends('profile.template')
@section('title')
Profile Details
@endsection
@section('main')
<div class="wrapper">
        <div class="menu">
            <div class="profile_img">
                <div class="upper_profile">
                    <a href="{{ url()->previous() }}" class="back-button">
                        <i class="fas fa-arrow-left"></i>
                    </a>

                    <img src="{{asset('storage/profiles/'.Auth::user()->picture)}}" alt="">
                    <div class="plus" onclick="openProfileImageDialog()">+</div>
                </div>
                <div class="d-flex justify-content-center" style="font-size:25pt;">
                    {{Auth::user()->name}}
                </div>

                <div class="profile_links">
                    <ul>
                        <li class="menu_active_link"><a href="">Home</a></li>
                        <li><a href="">Your Posts</a></li>
                        <li><a href="">Friends</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="information">
            <h3>Personal Information</h3>
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                        {{-- yup --}}
                    </div>
                @endif
                <div class="personal_information">
                    <i class="fa fa-edit ml-auto" onclick="editForm()"></i>
                    <div class="personal_information_single">
                        <div>Uesr ID:</div>
                        <div>{{Auth::user()->id}}</div>
                    </div>
                    <div class="personal_information_single">
                        <div>Name:</div>
                        <div>{{Auth::user()->name}}</div>
                    </div>
                    <div class="personal_information_single">
                        <div>Email:</div>
                        <div>{{Auth::user()->email}}</div>
                    </div>
                    <div class="personal_information_single">
                        <div>Date of birth:</div>
                        <div>{{Auth::user()->dob}}</div>
                    </div>
                    <div class="personal_information_single">
                        <div>Country:</div>
                        <div>{{Auth::user()->country}}</div>
                    </div>
                    <div class="personal_information_single">
                        <div>Date Created:</div>
                        <div>{{ Auth::user()->created_at ? \Carbon\carbon::parse(Auth::user()->created_at)->format('Y-m-d') : 'An Error Occured' }}</div>
                    </div>
                </div>
        </div>
    </div>

    <div class="extra">

        <form action="{{route('profile_info_edit')}}" method="POST">
            @csrf()

            <!-- Dialog Box Container -->
            <div class="profile-image-dialog py-5" id="profile-edit-dialog">
                <div class="dialog-content" id="profile-edit-content">
                    <span class="close-btn" onclick="closeProfileDialog()">&times;</span>
                    {{-- <br><br> --}}
                    <h3 class="text-2xl mb-5">Edit Profile</h3>
                    <div class="">
                        <label for="name"  for="grid-first-name" style="text-align:start;">Name: </label>
                        <input type="text" value="{{Auth::user()->name}}" class="form" name="name" id="name">
                    </div>
                    <div class="form-group d-flex flex-column">
                        <label for="Email" class="w-100 mb-1" style="text-align:start;">Email: </label>
                        <input type="email" value="{{Auth::user()->email}}" class="form" name="email" id="email">
                    </div>
                    <div class="form-group d-flex flex-column mb-5">
                        <label for="dob" class="w-100 mb-1" style="text-align:start;">Date of Birth: </label>
                        <input type="date" class="form" name="dob" id="dob" value="{{ Auth::user()->dob ? \Carbon\Carbon::parse(Auth::user()->dob)->format('Y-m-d') : '' }}">
                    </div>

                    <button type="submit" class="save-btn">Save</button>
                </div>
            </div>
        </form>




        <form action="{{route('profile_change')}}" method="POST" enctype="multipart/form-data">
            @csrf()
            <input type="file" name="picture" id="profile-image-upload" onchange="previewProfileImage(event)" style="display: none;">

            <!-- Dialog Box Container -->
            <div class="profile-image-dialog" id="profile-image-dialog">
                <div class="dialog-content">
                    <span class="close-btn" onclick="closeProfileImageDialog()">&times;</span>
                    <h3>Update Profile Image</h3>
                    <img src="{{ asset('storage/profiles/' . Auth::user()->picture) }}" alt="Profile Image" id="current-profile-image">
                    <label for="profile-image-upload" class="upload-btn">Choose Image</label>

                    <button type="submit" class="save-btn">Save</button>
                </div>
            </div>
        </form>
    </div>
@endsection
