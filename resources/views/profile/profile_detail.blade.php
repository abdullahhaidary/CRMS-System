@extends('profile.template')
@section('title')
Profile Details
@endsection
@section('main')
<div class="wrapper">
        <div class="menu">
            <div class="profile_img">
                <div class="upper_profile">
                    <a href="{{route('login')}}" class="back-button">
                        <i class="fas fa-arrow-left"></i>
                    </a>
                    <img src="{{ Storage::url('profiles/'. Auth::user()->picture) }}" alt="">

                    <div class="plus" onclick="openProfileImageDialog()">+</div>
                </div>
                <div class="d-flex justify-content-center" style="font-size:25pt;">
                    {{Auth::user()->name}}
                </div>

                <div class="profile_links">
                    <ul>
                        <li><a href="{{route('home')}}"> <i class="fas fa-home" style="color: #0a53be;font-size: 20px"></i> صفحه اصلی </a></li>
                        <li><a href="{{url('change/password/'. \Illuminate\Support\Facades\Auth::user()->id)}}"> <i class="fas fa-key" style="color: #e14439;font-size: 20px"></i>تغیر فاسورد </a></li>
                        <li><a href="">Friends</a></li>
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



{{--@extends('profile.template')--}}
{{--@section('title', 'Profile Details')--}}
{{--@section('main')--}}

{{--    <!-- Navbar -->--}}
{{--    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">--}}
{{--        <a class="navbar-brand" href="#">Profile</a>--}}
{{--        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}
{{--        <div class="collapse navbar-collapse" id="navbarNav">--}}
{{--            <ul class="navbar-nav ml-auto">--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{ route('home') }}">Home</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </nav>--}}

{{--    <div class="container mt-5">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-8">--}}
{{--                <div class="card">--}}
{{--                    <div class="card-body text-center">--}}
{{--                        <div class="position-relative d-inline-block mb-4">--}}
{{--                            <a href="{{ route('login') }}" class="btn btn-outline-primary position-absolute" style="top: 10px; left: 10px;">--}}
{{--                                <i class="fas fa-arrow-left"></i>--}}
{{--                            </a>--}}
{{--                            <img src="{{ Storage::url('profiles/' . Auth::user()->picture) }}" alt="Profile Picture" class="rounded-circle" width="150" height="150">--}}
{{--                            <button class="btn btn-outline-secondary position-absolute" style="bottom: 10px; right: 10px;" onclick="openProfileImageDialog()">--}}
{{--                                <i class="fas fa-edit"></i>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                        <h3>{{ Auth::user()->name }}</h3>--}}
{{--                        <div class="mt-3">--}}
{{--                            <a href="{{ route('home') }}" class="btn btn-primary">--}}
{{--                                <i class="fas fa-home"></i> Home--}}
{{--                            </a>--}}
{{--                            <a href="{{ url('change/password/' . Auth::user()->id) }}" class="btn btn-warning">--}}
{{--                                <i class="fas fa-key"></i> Change Password--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Personal Information Section -->--}}
{{--                <div class="card mt-4">--}}
{{--                    <div class="card-header">--}}
{{--                        Personal Information--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        @if(session()->has('success'))--}}
{{--                            <div class="alert alert-success">--}}
{{--                                {{ session('success') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                        <div class="d-flex justify-content-end">--}}
{{--                            <button class="btn btn-outline-primary" onclick="editForm()">--}}
{{--                                <i class="fas fa-edit"></i> Edit--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                        <div class="personal_information mt-3">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-4"><strong>User ID:</strong></div>--}}
{{--                                <div class="col-md-8">{{ Auth::user()->id }}</div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-4"><strong>Name:</strong></div>--}}
{{--                                <div class="col-md-8">{{ Auth::user()->name }}</div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-4"><strong>Email:</strong></div>--}}
{{--                                <div class="col-md-8">{{ Auth::user()->email }}</div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-4"><strong>Type:</strong></div>--}}
{{--                                <div class="col-md-8">{{ Auth::user()->type }}</div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-4"><strong>Action:</strong></div>--}}
{{--                                <div class="col-md-8">{{ Auth::user()->action == 1 ? 'Active' : 'Inactive' }}</div>--}}
{{--                            </div>--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-md-4"><strong>Date Created:</strong></div>--}}
{{--                                <div class="col-md-8">{{ Auth::user()->created_at ? Auth::user()->created_at->format('Y-m-d') : 'An Error Occurred' }}</div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <!-- Edit Profile Form -->--}}
{{--        <div class="modal fade" id="profileEditModal" tabindex="-1" aria-labelledby="profileEditModalLabel" aria-hidden="true">--}}
{{--            <div class="modal-dialog">--}}
{{--                <div class="modal-content">--}}
{{--                    <form action="{{ route('profile_info_edit') }}" method="POST">--}}
{{--                        @csrf--}}
{{--                        <div class="modal-header">--}}
{{--                            <h5 class="modal-title" id="profileEditModalLabel">Edit Profile</h5>--}}
{{--                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                <span aria-hidden="true">&times;</span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                        <div class="modal-body">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="name">Name:</label>--}}
{{--                                <input type="text" value="{{ Auth::user()->name }}" class="form-control" name="name" id="name">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="email">Email:</label>--}}
{{--                                <input type="email" value="{{ Auth::user()->email }}" class="form-control" name="email" id="email">--}}
{{--                            </div>--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="dob">Date of Birth:</label>--}}
{{--                                <input type="date" class="form-control" name="dob" id="dob" value="{{ Auth::user()->dob ? Auth::user()->dob->format('Y-m-d') : '' }}">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="modal-footer">--}}
{{--                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                            <button type="submit" class="btn btn-primary">Save changes</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <!-- Change Profile Image Form -->--}}
{{--        <div class="modal fade" id="profileImageModal" tabindex="-1" aria-labelledby="profileImageModalLabel" aria-hidden="true">--}}
{{--            <div class="modal-dialog">--}}
{{--                <div class="modal-content">--}}
{{--                    <form action="{{ route('profile_change') }}" method="POST" enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        <div class="modal-header">--}}
{{--                            <h5 class="modal-title" id="profileImageModalLabel">Update Profile Image</h5>--}}
{{--                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                <span aria-hidden="true">&times;</span>--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                        <div class="modal-body text-center">--}}
{{--                            <img src="{{ asset('storage/profiles/' . Auth::user()->picture) }}" alt="Profile Image" id="current-profile-image" class="img-thumbnail mb-3">--}}
{{--                            <input type="file" name="picture" id="profile-image-upload" onchange="previewProfileImage(event)" class="form-control-file">--}}
{{--                        </div>--}}
{{--                        <div class="modal-footer">--}}
{{--                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                            <button type="submit" class="btn btn-primary">Save changes</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>--}}
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>--}}
{{--    <script>--}}
{{--        function openProfileImageDialog() {--}}
{{--            $('#profileImageModal').modal('show');--}}
{{--        }--}}

{{--        function editForm() {--}}
{{--            $('#profileEditModal').modal('show');--}}
{{--        }--}}

{{--        function previewProfileImage(event) {--}}
{{--            var reader = new FileReader();--}}
{{--            reader.onload = function(){--}}
{{--                var output = document.getElementById('current-profile-image');--}}
{{--                output.src = reader.result;--}}
{{--            }--}}
{{--            reader.readAsDataURL(event.target.files[0]);--}}
{{--        }--}}
{{--    </script>--}}

{{--@endsection--}}
