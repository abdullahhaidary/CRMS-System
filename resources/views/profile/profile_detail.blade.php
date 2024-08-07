@extends('profile.template')

@section('title')
Profile Details
@endsection
@section('main')
<style>
    .container-fluid i{
        cursor:pointer;
    }
</style>
    @extends('layout.mian-dashbord')
    @section('content')
        <div class="">
            @include('massage')
        </div>
        <div class="wrapper h-auto">
            <div class="menu" style="height: 500px">
                <div class="profile_img" style="width: 250px">
                    <div class="upper_profile">
                        <img src="{{asset('storage/profiles/'.Auth::user()->picture)}}" alt="">
                        <div class="plus" onclick="openProfileImageDialog()">+</div>
                    </div>
                    <div class="d-flex justify-content-center" style="font-size:25pt;">
                        {{Auth::user()->name}}
                    </div>

                    <div class="link">
                        <ul class="">
                            <li class="ul-item"><a class="" href="{{url('change/password/'. \Illuminate\Support\Facades\Auth::user()->id)}}"> {{__('password_change')}} </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="information">

                <h3 class="header ">{{__('Personal Information')}}</h3>
                <div class="container-fluid">
                    <i class="fa fa-edit ml-auto" onclick="editForm()"></i>
                    <div class="personal_information_single">
                        <div>{{__('User ID')}}:</div>
                        <div>{{Auth::user()->id}}</div>
                    </div>
                    <div class="personal_information_single">
                        <div>{{__('Name')}}:</div>
                        <div>{{Auth::user()->name}}</div>
                    </div>
                    <div class="personal_information_single">
                        <div>{{__('Email')}}:</div>
                        <div>{{Auth::user()->email}}</div>
                    </div>
                    <div class="personal_information_single">
                        <div>{{__('Type')}}:</div>
                        @if(Auth::user()->type==1)
                        <div>Super Admin</div>
                        @elseif(Auth::user()->type==2)
                            <div> Admin</div>
                        @elseif(Auth::user()->type==3)
                            <div> Moder</div>
                        @endif
                    </div>
                    <div class="personal_information_single">
                        <div>{{__('Action')}}:</div>
                        <div>{{Auth::user()->action==1 ? 'Active' : 'InActive'}}</div>
                    </div>
                    <div class="personal_information_single">
                        <div>{{__('Date Created')}}:</div>
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
                        <br><br>
                        <h3 class="text-2xl mb-5">Edit Profile</h3>
                        <div class="form-group d-flex flex-column">
                            <label for="name" style="text-align:start;">Name: </label>
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
                        <img src="{{asset('storage/profiles/' . Auth::user()->picture) }}" alt="Profile Image" id="current-profile-image">
                        <label for="profile-image-upload" class="upload-btn">Choose Image</label>

                        <button type="submit" class="save-btn">Save</button>
                    </div>
                </div>
            </form>
        </div>
    @endsection
@endsection
