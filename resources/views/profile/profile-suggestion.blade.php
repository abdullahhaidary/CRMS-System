<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Profile</title>
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
        .profile-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 400px;
        }
        .profile-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }
        input[type="file"] {
            display: none;
        }
        label.upload-btn {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        label.upload-btn:hover {
            background-color: #0056b3;
        }
        button.submit-btn {
            background-color: #28a745;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button.submit-btn:hover {
            background-color: #218838;
        }
        /* Additional styling for form elements */
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>
    <link rel="stylesheet" href="{{asset('dist/css/font-awesome.css')}}">
</head>
<body>
    <div class="profile-container">
        <i class="fa fa-user-circle fa-3x"></i>
        <h2>Complete Your Profile</h2>
        <img src="{{ asset('images/profile_avatar.png') }}" alt="Profile Picture" class="profile-image" id="profile-preview">
        @if($errors->any())
            <div>
                @foreach($errors->all() as $error)
                    <li> {{$error}} </li>
                @endforeach
            </div>
        @endif
        <form action="{{route('profile.complete')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Date of Birth -->
            <input type="date" name="dob" id="dob" placeholder="Date of Birth" required>
            <!-- Country Selection -->
            <select name="country" id="country" required>
                <option value="" disabled selected>Select Country</option>
                <option value="USA">USA</option>
                <option value="UK">UK</option>
                <option value="Canada">Canada</option>
                <option value="Australia">Australia</option>
                <!-- Add more countries as needed -->
            </select>
            <hr>
            <!-- Upload Profile Picture -->
            <input type="file" id="profile-image" name="profile_image" accept="image/*" onchange="previewProfileImage(event)" required>
            <label for="profile-image" class="upload-btn">Upload Image</label>
            <!-- Submit Button -->
            <button type="submit" class="submit-btn">Complete</button>
        </form>
    </div>

    <script>
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
</html>
