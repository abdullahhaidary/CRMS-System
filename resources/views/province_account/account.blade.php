
    <style>
        body{
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
                    padding: 20px;
                    border-radius: 8px;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                    text-align: center;
                    width: 400px; /* Set a fixed width for the container */
            }

        img {
                    width: 100px;
                    margin-bottom: 15px;
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

<body dir="rtl">
<div class="register-container">
    <img src="{{asset('images/register.png')}}" alt="Logo">
    <h2>Register</h2>
    @livewire('register-form',['provinces' => $data])
    <p> لیست تمام ادمین های در سیستم.  <a href="{{route('province_liat')}}">اینجا کلیک کنید </a></p>

</div>


