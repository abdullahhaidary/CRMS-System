<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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

        .register-container {
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
            background-color: #28a745; /* Use a different color for registration button */
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
        .form-select{
            background-color: #ffffff;
            padding: 10px;
            border-radius: 5px;
            width: 400px;
            margin-bottom: 10px;
        }
        .form-option-list{
            font-size: 16px;
            padding: 8px;
        }
    </style>
</head>
<body>
    <div class="register-container">
        <img src="{{asset('images/register.png')}}" alt="Logo">
        <h2>Register</h2>
        <form action="{{route('register')}}" method="POST">
            @csrf()
            @error('name')
                <div style="color:red">{{$message}}</div>
            @enderror
            <input type="text" name="name" placeholder="Full Name" required>
            @error('email')
                <div style="color:red">{{$message}}</div>
            @enderror
            <input type="text" name="email" placeholder="Email" required>

                <select class="form-select" name="postion" id="disabledSelect">
                    <option class="form-option-list" value="0">انتیخاب پوزیشن</option>
                    <option class="form-option-list" value="1">super admin</option>
                    <option class="form-option-list" value="2">admin</option>
                    <option class="form-option-list" value="3">moder</option>
                </select>
            <input type="hidden" name="action" value="1">
            @error('password')
                <div style="color:red">{{$message}}</div>
            @enderror
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Register</button>
        </form>
        <p> لیست تمام ادمین های در سیستم.  <a href="{{route('user')}}">اینجا کلیک کنید </a></p>
    </div>
</body>
</html>
