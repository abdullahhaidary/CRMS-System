<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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

        .forgot-password-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 400px; /* Set a fixed width for the container */
        }

        img {
            width: 100px;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center; /* Center align form elements */
        }

        input[type="password"], input[type="password_confirmation"],input[type="email"],
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box; /* Ensure padding does not affect width */
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }
        form label{
            width:100%;
            text-align:left;
            margin-bottom:4px;
        }
    </style>
</head>
<body>
    <div class="forgot-password-container">
        <img src="{{ asset('images/forget.png') }}" alt="Forgot Password Logo">
        <h2>Reset Password</h2>
        @if(session('status'))
        <div style="margin-bottom:20px">{{ session('status') }}</div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form method="POST" action="{{ route('password.update') }}" style="margin-bottom:10px">
        @csrf
        <input type="hidden" name="token" value = "{{ !empty($token) ? $token : '' }}">
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>


        <label for="password">New Password:</label>
        <input type="password" id="password" name="password" value="{{ old('password') }}" required>

        <label for="password_confirmation">Enter Password Again:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
        @error('password_confirmation')
            <div>{{ $message }}</div>
        @enderror
        <button type="submit">Update Password</button>
    </form>
        <p>Remembered your password? <a href="{{ route('login') }}">Login here</a></p>
    </div>
</body>
</html>
