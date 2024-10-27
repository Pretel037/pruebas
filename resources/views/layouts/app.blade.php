<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <ul>
                <li><a href="{{ route('login') }}">Home</a></li>
                <li><a href="{{ route('login')  }}">About</a></li>
               <li><a href="{{ route('login')  }}">Contact</a></li>
            </ul>
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
</html>
