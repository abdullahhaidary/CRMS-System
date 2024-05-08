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


        .background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 800%;
            overflow: hidden;
            z-index:-1;
            animation: float 80s linear infinite;
        }

        .number {
            position: absolute;
            display:flex;
            font-size: 18px;
            font-weight: bold;
            opacity: 0.3; /* Semi-transparent text */
            user-select: none; /* Prevent text selection */
            z-index:-1;
        }

        /* Additional styles for text animation */
        @keyframes float {
    0% {
        transform: translateY(0);
        opacity: 1;
    }

    100% {
        transform: translateY(-100%);
        opacity: 1;
    }
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

    <div class="background"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const numNumbers = 1600; // Number of numbers (0s and 1s) to display
            const container = document.querySelector('.background');
            const numberPool = ['1111','0000', '10','0011']; // Array of characters to randomly choose from

            for (let i = 0; i < numNumbers; i++) {
                const randomNumber = numberPool[Math.floor(Math.random() * numberPool.length)];

                const numberElement = document.createElement('span');
                numberElement.textContent = randomNumber;
                numberElement.classList.add('number');

                // Randomize position and styles
                const x = Math.random() * 100; // Random horizontal position (0-100%)
                const y = Math.random() * 100; // Random vertical position (0-100%)
                const animationDelay = Math.random() * 5; // Random animation delay (0-5s)

                numberElement.style.left = `${x}%`;
                numberElement.style.top = `${y}%`;
                numberElement.style.animationDelay = `${animationDelay}s`;

                container.appendChild(numberElement);
            }
        });
    </script>
</body>
</html>
