@extends('profile.template')
@section('title')
Profile Details
@endsection
@section('main')
    @extends('layout.mian-dashbord')
    @section('content')
        <div class="wrapper h-auto">
            <div class="menu" style="height: 500px">
                <div class="profile_img" style="width: 250px">
                    <div class="upper_profile">
                        <img src="{{ Storage::url('profiles/'. Auth::user()->picture) }}" alt="">
                        <div class="plus" onclick="openProfileImageDialog()">+</div>
                    </div>
                    <div class="d-flex justify-content-center" style="font-size:25pt;">
                        {{Auth::user()->name}}
                    </div>

                    <div class="link">
                        <ul class="">
                            <li class="ul-item"><a class="" href="{{url('change/password/'. \Illuminate\Support\Facades\Auth::user()->id)}}"> تغیر فاسورد</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="information">
                <h3 class="header ">Personal Information</h3>
                @if(session()->has('success'))
                    <div class="alert alert-success" style="background-color: #22ec8f; height: 30px; align-content: center;">
                        {{session('success')}}
                        yup
                    </div>
                @endif
                <div class="container-fluid">
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
                        <div>Type:</div>
                        <div>{{ Auth::user()->type }}</div>
                    </div>
                    <div class="personal_information_single">
                        <div>ACTION:</div>
                        <div>{{Auth::user()->action==1 ? 'Active' : 'InActive'}}</div>
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
                        <br><br>
                        <h3 class="text-2xl mb-5">Edit Profile</h3>
                        <div class="">
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
                        <img src="{{ asset('storage/profiles/' . Auth::user()->picture) }}" alt="Profile Image" id="current-profile-image">
                        <label for="profile-image-upload" class="upload-btn">Choose Image</label>

                        <button type="submit" class="save-btn">Save</button>
                    </div>
                </div>
            </form>
        </div>
    @endsection
@endsection

















{{--@extends('profile.template')--}}

{{--@section('title', 'Profile Details')--}}

{{--@extends('layout.mian-dashbord')--}}
{{--@section('main')--}}
{{--@section('content')--}}
{{--    <div class="container mt-4">--}}
{{--        <div class="row">--}}
{{--            <div class="col-md-4">--}}
{{--                <div class="card text-center">--}}
{{--                    <div class="card-body">--}}
{{--                        <img src="{{ Storage::url('profiles/' . Auth::user()->picture) }}" class="img-fluid rounded-circle mb-3" alt="Profile Image">--}}
{{--                        <button class="btn btn-primary btn-sm mb-3" onclick="openProfileImageDialog()">Change Image</button>--}}
{{--                        <h3 class="card-title">{{ Auth::user()->name }}</h3>--}}
{{--                        <ul class="list-group list-group-flush">--}}
{{--                            <li class="list-group-item"><a href="{{ url('change/password/' . Auth::user()->id) }}"><i class="fas fa-key text-danger"></i> تغیر فاسورد </a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        <h3>Personal Information</h3>--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        @if(session()->has('success'))--}}
{{--                            <div class="alert alert-success">--}}
{{--                                {{ session('success') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        <button class="btn btn-link float-right" onclick="editForm()">--}}
{{--                            <i class="fa fa-edit"></i>--}}
{{--                        </button>--}}
{{--                        <ul class="list-group">--}}
{{--                            <li class="list-group-item"><strong>User ID:</strong> {{ Auth::user()->id }}</li>--}}
{{--                            <li class="list-group-item"><strong>Name:</strong> {{ Auth::user()->name }}</li>--}}
{{--                            <li class="list-group-item"><strong>Email:</strong> {{ Auth::user()->email }}</li>--}}
{{--                            <li class="list-group-item"><strong>Type:</strong> {{ Auth::user()->type }}</li>--}}
{{--                            <li class="list-group-item"><strong>Action:</strong> {{ Auth::user()->action == 1 ? 'Active' : 'Inactive' }}</li>--}}
{{--                            <li class="list-group-item"><strong>Date Created:</strong> {{ Auth::user()->created_at ? Auth::user()->created_at->format('Y-m-d') : 'An Error Occurred' }}</li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <!-- Edit Profile Form -->--}}
{{--        <div class="modal fade" id="profile-edit-dialog" tabindex="-1" role="dialog" aria-labelledby="profileEditDialogLabel" aria-hidden="true">--}}
{{--            <div class="modal-dialog" role="document">--}}
{{--                <div class="modal-content">--}}
{{--                    <form action="{{ route('profile_info_edit') }}" method="POST">--}}
{{--                        @csrf--}}
{{--                        <div class="modal-header">--}}
{{--                            <h5 class="modal-title" id="profileEditDialogLabel">Edit Profile</h5>--}}
{{--                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                <span aria-hidden="true">&times;</span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                        <div class="modal-body">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="name">Name:</label>--}}
{{--                                <input type="text" class="form-control" name="name" id="name" value="{{ Auth::user()->name }}">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="email">Email:</label>--}}
{{--                                <input type="email" class="form-control" name="email" id="email" value="{{ Auth::user()->email }}">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="dob">Date of Birth:</label>--}}
{{--                                <input type="date" class="form-control" name="dob" id="dob" value="{{ Auth::user()->dob ? Auth::user()->dob->format('Y-m-d') : '' }}">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="modal-footer">--}}
{{--                            <button type="submit" class="btn btn-primary">Save</button>--}}
{{--                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <!-- Update Profile Image Form -->--}}
{{--        <div class="modal fade" id="profile-image-dialog" tabindex="-1" role="dialog" aria-labelledby="profileImageDialogLabel" aria-hidden="true">--}}
{{--            <div class="modal-dialog" role="document">--}}
{{--                <div class="modal-content">--}}
{{--                    <form action="{{ route('profile_change') }}" method="POST" enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        <div class="modal-header">--}}
{{--                            <h5 class="modal-title" id="profileImageDialogLabel">Update Profile Image</h5>--}}
{{--                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                <span aria-hidden="true">&times;</span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                        <div class="modal-body text-center">--}}
{{--                            <img src="{{ asset('storage/profiles/' . Auth::user()->picture) }}" class="img-fluid rounded-circle mb-3" id="current-profile-image" alt="Profile Image">--}}
{{--                            <label for="profile-image-upload" class="btn btn-secondary">Choose Image</label>--}}
{{--                            <input type="file" name="picture" id="profile-image-upload" class="d-none" onchange="previewProfileImage(event)">--}}
{{--                        </div>--}}
{{--                        <div class="modal-footer">--}}
{{--                            <button type="submit" class="btn btn-primary">Save</button>--}}
{{--                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}
{{--@endsection--}}
