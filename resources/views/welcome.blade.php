<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>
        Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect"
          href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap"
          rel="stylesheet"/>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
    .input-container {
        display: flex;
        align-items: center;
        width: 300px;
    }

    .input-container input[type="tel"] {
        flex: 1;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px 0 0 4px;
    }

    .input-container button {
        padding: 10px;
        border: 1px solid #ccc;
        border-left: none;
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
        border-radius: 0 4px 4px 0;
    }

    .input-container button:hover {
        background-color: #45a049;
    }
</style>
<body class="antialiased font-sans">
<a href="{{route('admin.dashboard')}}">to admin panel</a>

</body>
</html>