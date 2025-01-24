<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Event Management')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
</head>
<body class="bg-gray-50 text-gray-800">
    @include('layouts.header')

    <main class="container mx-auto px-6 py-8">
        @yield('content')
    </main>

    @include('layouts.footer')
</body>
</html>
