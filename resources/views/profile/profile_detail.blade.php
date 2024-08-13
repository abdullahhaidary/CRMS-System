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
        <div class="wrapper h-auto ">
            <div class="menu" style="height: 450px">
                <div class="profile_img" style="width: 250px">
                    <div class="upper_profile">
                        <img src="{{asset('storage/profiles/'.Auth::user()->picture)}}" alt="">
                        <div class="plus" onclick="openProfileImageDialog()">+</div>
                    </div>
                    <div class="text-center font-bold">
                        <h1 class="display-4">{{Auth::user()->name}}</h1>
                    </div>

                    <div class="link">
                        <ul class="">
                            <li class="mt-5"><a class="btn btn-primary" href="{{url('change/password/'. \Illuminate\Support\Facades\Auth::user()->id)}}"> {{__('Password_change')}}
                                    </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="information">

                <h3 class="header ">{{__('Personal_information')}}</h3>
                <div class="container-fluid">
                    <!-- فورم ایدیت کاربر -->
                    <i class="fa fa-edit ml-auto" onclick="editForm()" style="color: #0c63e4"></i>
                    <div class="personal_information_single">
                        <div class="font-bold">{{__('User_ID')}}:</div>
                        <div>{{Auth::user()->id}}</div>
                    </div>
                    <div class="personal_information_single">
                        <div class="font-bold">{{__('Name')}}:</div>
                        <div>{{Auth::user()->name}}</div>
                    </div>
                    <div class="personal_information_single">
                        <div class="font-bold">{{__('Email')}}:</div>
                        <div>{{Auth::user()->email}}</div>
                    </div>
                    <div class="personal_information_single">
                        <div class="font-bold">{{__('Type')}}:</div>
                        @if(Auth::user()->type==1)
                        <div>Super Admin</div>
                        @elseif(Auth::user()->type==2)
                            <div> Admin</div>
                        @elseif(Auth::user()->type==3)
                            <div> Moder</div>
                        @endif
                    </div>
                    <div class="personal_information_single">
                        <div class="font-bold">{{__('Action')}}:</div>
                        <div>{{Auth::user()->action==1 ? 'Active' : 'InActive'}}</div>
                    </div>
                    <div class="personal_information_single">
                        <div class="font-bold">{{__('Create_date')}}:</div>
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
                        <!-- ایدیت یوزر -->
                        <h3 class="text-2xl mb-5">{{__('Edit_profile')}}</h3>
                        <div class="form-group d-flex flex-column">
                            <label for="name" style="text-align:start;">{{__('Name')}}: </label>
                            <input type="text" value="{{Auth::user()->name}}" class="form" name="name" id="name">
                        </div>
                        <div class="form-group d-flex flex-column">
                            <label for="Email" class="w-100 mb-1" style="text-align:start;">{{__('Email')}}: </label>
                            <input type="email" value="{{Auth::user()->email}}" class="form" name="email" id="email">
                        </div>
                        <div class="form-group d-flex flex-column mb-5">
                            <label for="dob" class="w-100 mb-1" style="text-align:start;">{{__('Date_of_birth')}}: </label>
                            <input type="date" class="form" name="dob" id="dob" value="{{ Auth::user()->dob ? \Carbon\Carbon::parse(Auth::user()->dob)->format('Y-m-d') : '' }}">
                        </div>
                        <!-- ثبت کردن ایدیت کاربر -->

                        <button type="submit" class="save-btn">{{__('Save')}}</button>
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
