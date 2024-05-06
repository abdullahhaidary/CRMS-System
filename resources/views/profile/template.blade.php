<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{asset('dist/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/font-awsome.css')}}">
    @yield('styles')
    <style type="text/tailwindcss">
        label {
            @apply block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2;
        }
        .form{
            @apply appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500;
        }
    </style>
</head>
<body>

@yield('main')

<script src="{{asset('dist/js/jquery .js')}}"></script>
<script src="{{asset('dist/js/script.js')}}"></script>
@yield('scripts')
</body>
</html>
