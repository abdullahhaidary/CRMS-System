{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>Register</title>--}}
{{--    <style>--}}
{{--        body {--}}
{{--            font-family: Arial, sans-serif;--}}
{{--            background-color: #f4f4f4;--}}
{{--            display: flex;--}}
{{--            justify-content: center;--}}
{{--            align-items: center;--}}
{{--            height: 100vh;--}}
{{--            margin: 0;--}}
{{--        }--}}

{{--        .register-container {--}}
{{--            background-color: #ffffff;--}}
{{--            padding: 20px;--}}
{{--            border-radius: 8px;--}}
{{--            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);--}}
{{--            text-align: center;--}}
{{--            width: 400px; /* Set a fixed width for the container */--}}
{{--        }--}}

{{--        img {--}}
{{--            width: 100px;--}}
{{--            margin-bottom: 15px;--}}
{{--        }--}}

{{--        form {--}}
{{--            display: flex;--}}
{{--            flex-direction: column;--}}
{{--            align-items: center; /* Center align form elements */--}}
{{--        }--}}

{{--        input[type="text"],--}}
{{--        input[type="password"],--}}
{{--        button {--}}
{{--            width: 100%;--}}
{{--            padding: 10px;--}}
{{--            margin-bottom: 15px;--}}
{{--            border: 1px solid #ddd;--}}
{{--            border-radius: 4px;--}}
{{--            box-sizing: border-box; /* Ensure padding does not affect width */--}}
{{--        }--}}

{{--        button {--}}
{{--            background-color: #28a745; /* Use a different color for registration button */--}}
{{--            color: #fff;--}}
{{--            border: none;--}}
{{--            cursor: pointer;--}}
{{--        }--}}

{{--        a {--}}
{{--            text-decoration: none;--}}
{{--            color: #007bff;--}}
{{--        }--}}

{{--        a:hover {--}}
{{--            text-decoration: underline;--}}
{{--        }--}}
        .form-select
            background-color: #ffffff
            padding: 10px;--}}
            border-radius: 5px
            width: 400px
            margin-bottom: 10px
        }--}}
        .form-option-list
            font-size: 16px
            padding: 8px
        }--}}
    </style>--}}
        @livewireStyle
        @livewireScript
</head>--}}
<body dir="rtl"
<div class="register-container"
    <img src="{{asset('images/register.png')}}" alt="Logo"
    <h2>Register</h2>--}}
    @livewire('register-form',['provinces' => $data]
    <p> لیست تمام ادمین های در سیستم.  <a href="{{route('province_liat')}}">اینجا کلیک کنید </a></p

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Profile</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Profile Section -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-center">
                    <div class="position-relative d-inline-block mb-4">
                        <img src="https://via.placeholder.com/150" alt="Profile Picture" class="rounded-circle" width="150" height="150">
                        <a href="#" class="position-absolute" style="bottom: 0; right: 0; background-color: rgba(0, 0, 0, 0.5); color: white; border-radius: 50%; padding: 5px;">
                            <i class="fas fa-edit"></i>
                        </a>
                    </div>
                    <h3>John Doe</h3>
                    <p class="text-muted">Action Type: Admin</p>
                    <p class="text-muted">Date: 2024-07-28</p>
                    <div class="mt-3">
                        <a href="#" class="btn btn-primary">Edit Profile</a>
                        <a href="#" class="btn btn-secondary">Settings</a>
                    </div>
                </div>
            </div>

            <!-- Additional Information Section -->
            <div class="card mt-4">
                <div class="card-header">
                    Additional Information
                </div>
                <div class="card-body">
                    <h5 class="card-title">Bio</h5>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ac ante mollis quam tristique convallis.</p>
                    <h5 class="card-title">Contact Information</h5>
                    <p class="card-text">Email: johndoe@example.com</p>
                    <p class="card-text">Phone: (123) 456-7890</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-3 mt-5">
    &copy; 2024 Profile Page. All rights reserved.
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>
</html>
