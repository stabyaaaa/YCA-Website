<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'World Bank × Yunus Center AIT')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-white text-gray-800">

    {{-- NAVBAR --}}
    @include('layouts.partials.public-navbar')

    {{-- PAGE CONTENT --}}
    <main>
        @yield('content')
    </main>

    {{-- FOOTER --}}
    @include('layouts.partials.public-footer')
    

</body>
</html>
