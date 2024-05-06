<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        .login-container {
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

        input[type="text"],
        input[type="password"],
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
        .error-message {
            width:100%;
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
        }

    </style>
</head>
<body>
    <div class="login-container">
        <img src="{{asset('images/login.png')}}" alt="Logo">
        <h2>Login</h2>
        <form action="{{route('login')}}" method="POST">
            @csrf()
            @error('email')
                <div class="error-message">
                    {{$message}}
                </div>
            @enderror
            <input type="text" name="email" placeholder="Username or Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <a href="{{route('password.request')}}">Forgot Password?</a>
        <p>Don't have an account? <a href="{{route('register')}}">Register here</a></p>
    </div>
</body>
</html>
