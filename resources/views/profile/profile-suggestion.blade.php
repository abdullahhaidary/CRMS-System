<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Profile</title>
    <style>
        body {
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .form-title {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
        .form-group label {
            font-weight: 600;
        }
        .form-control {
            border-radius: 8px;
        }
        .custom-file-label::after {
            content: "Browse";
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 8px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-success {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .profile-image-preview {
            margin-top: 15px;
        }
        .profile-image-preview img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 50%;
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
        .profile-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /*text-align: center;*/
            width: 400px;
        }
        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        .profile-image:hover{
            cursor:pointer;
        }
        input[type="file"] {
            display: none;
        }
    </style>
    <link rel="stylesheet" href="{{asset('dist/css/font-awesome.css')}}">

    <link rel="stylesheet" href="{{@asset('dist2/css/app-dark.rtl.css')}}">
    <link rel="stylesheet" href="{{@asset('dist2/css/app.rtl.css')}}">
    <link rel="stylesheet" href="{{@asset('dist2/css/iconly.css')}}">

    <link rel="stylesheet" href="{{@asset('dist2/css/style.css')}}">
</head>
<body dir="rtl">
    <div class="profile-container">
        <i class="fa fa-user-circle fa-3x"></i>
        <h2 class="text-center">{{__('complit_profile')}}</h2>
        <div class="text-center">
        <img src="{{ asset('images/profile_avatar.png') }}" onclick="triggerFileInput()" alt="Profile Picture" class="profile-image" id="profile-preview">
        </div>
        @include('massage')
        @if($errors->any())
            <div>
                @foreach($errors->all() as $error)
                    <li> {{$error}} </li>
                @endforeach
            </div>
        @endif

                <form action="{{route('profile.complete')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Old Password -->
                    <input type="file" id="profile-image" name="profile_image" accept="image/*" onchange="previewProfileImage(event)" required>
                    <div class="form-group">
                        <label for="old_password">{{__('olde_password')}}:</label>
                        <input type="password" name="old_password" required class="form-control" id="old_password" placeholder=" {{__('olde_password')}}...">
                    </div>
                    <!-- New Password -->
                    <div class="form-group">
                        <label for="new_password">{{__('new_password')}}:</label>
                        <input type="password" name="new_password" required class="form-control" id="new_password" placeholder="{{__('new_password')}} ...">
                        <p style="color:red" >{{__('pass_8')}} !</p>
                    </div>
                    <!-- Date of Birth -->
                    <div class="form-group">
                        <label for="dob">{{__('date_of_birth')}}:</label>
                        <input type="date" name="dob" id="dob" class="form-control" placeholder="Date of Birth" required>
                    </div>
                    <button type="submit" class="btn btn-success">{{__('Complete')}}</button>
                </form>
            </div>

    <script>
                function triggerFileInput() {
            document.getElementById('profile-image').click();
        }
        function previewProfileImage(event) {

            const input = event.target;
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profile-preview').src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html> -->
